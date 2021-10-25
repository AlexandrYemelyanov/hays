<?php


class ApiHH {
	private $client_id;
	private $client_secret;
	private $api_url;
	private $token_url;
	public $access_token;
	public $refresh_token;
	public $access_token_file;
	public $refresh_token_file;

	public function __construct($client_id, $client_secret)
	{
		$this->client_id = $client_id;
		$this->client_secret = $client_secret;

		$this->token_url = 'https://hh.ru/';
		$this->api_url = 'https://api.hh.ru/';

		$this->access_token_file = __DIR__.'/access_token.php';
		$this->refresh_token_file = __DIR__.'/refresh_token.php';

		$this->setTocken();
	}

	private function setTocken()
	{
		$this->access_token = is_file($this->access_token_file) ? file_get_contents($this->access_token_file) : '';
		$this->refresh_token = is_file($this->refresh_token_file) ? file_get_contents($this->refresh_token_file) : '';

		if (empty($this->access_token)) {
			die("No token !!");
		} elseif (!$this->checkToken()) {
			$this->updateToken();
		}
	}

	public function checkToken()
	{
		$res = $this->getMe();
		return !empty($res['email']);
	}

	private function updateToken()
	{
		$data = [
			"grant_type"    => "refresh_token",
			"refresh_token"     => $this->refresh_token
		];
		$res = $this->request($data, 'oauth/token', $this->token_url);

		if (!empty($res['errors']) || !empty($res['error'])) {
			echo "<p><b>Error: Bad update. Request:</b><pre>";print_r($res);echo "</pre></p>";
			die;
		}

		if (!empty($res['access_token'])) {
			file_put_contents($this->access_token_file, $res['access_token']);
			file_put_contents($this->refresh_token_file, $res['refresh_token']);

			$this->access_token = $res['access_token'];
			$this->refresh_token = $res['refresh_token'];
		}
	}

	public function getFirtToken($authorization_code)
	{
		/**
		 * authorization_code получить по ссылке
		 * https://hh.ru/oauth/authorize?response_type=code&client_id={client_id}
		 * в ответе ?code=XXXXXX будет authorization_code
		 */
		$data = [
			"grant_type"    => "authorization_code",
			"client_id"     => $this->client_id,
			"client_secret" => $this->client_secret,
			'code'          => $authorization_code
		];
		$res = $this->request($data, 'oauth/token', $this->token_url);

		return $res;
	}

	public function getVacancies($manager_id)
	{
		$res = $this->request([], 'employers/247118/vacancies/active?manager_id='.$manager_id);
		return $res['items'] ?? [];
	}

	public function getUserSettings($manager_id)
	{
		$res = $this->request([], 'employers/247118/managers/'.$manager_id.'/settings');

		return $res;
	}

	public function getManagers()
	{
		$res = $this->request([], 'employers/247118/managers');
		return $res['items'] ?? [];
	}

	public function getMe()
	{
		$res = $this->request([], 'me');

		return $res;
	}

	public function getVacCollections($vacancy_id)
	{
		$res = $this->request([], 'negotiations?vacancy_id='.$vacancy_id);
		return $res['collections'] ?? [];
	}

	// Список откликов/приглашений
	public function getFeedbacks($collection_id, $vacancy_id)
	{
		$res = $this->request([], 'negotiations/'.$collection_id.'?vacancy_id='.$vacancy_id.'&order_by=created_at');
		return $res['items'] ?? [];
	}

	public function getByUrl($url)
	{
		return $this->request([], $url);
	}

	public function resumeDownload($url, $file)
	{
		$headers = [
			'Content-Type: application/x-www-form-urlencoded',
			'User-Agent: Feedbacks/1.0 (yemcoder@gmail.com)',
			'Authorization: Bearer '.$this->access_token,
		];
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL           => $url,
			CURLOPT_ENCODING      => "",
			CURLOPT_MAXREDIRS     => 10,
			CURLOPT_TIMEOUT       => 30,
			CURLOPT_HTTP_VERSION  => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_POSTFIELDS    => "",
			CURLOPT_FILE          => fopen($file, "a+"),
			CURLOPT_HTTPHEADER    => $headers,
		]);

		curl_exec($curl);
		curl_close($curl);
	}

	private function request($data, $method, $url = '')
	{
		$url = $url ? $url : $this->api_url;
		$url .= $method;

		$token_header = $this->access_token ? 'Authorization: Bearer '.$this->access_token : '';

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		if (!empty($data)) {
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		}
		$headers = [
			'Content-Type: application/x-www-form-urlencoded',
			'User-Agent: Feedbacks/1.0 (yemcoder@gmail.com)',
		];
		if ($token_header) {
			$headers[] = $token_header;
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		curl_close($ch);

		if (isset($result['error'])) {
			die('Error: '.$result['error'].' ('.$result['error_description'].')');
		}

		return json_decode($result, true);

	}

}