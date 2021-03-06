<?php

/**
 * Temporary config file to facilitate client side mocking up.
 */

namespace RhyApp\Temporary;

require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

class AppConfig {

	public $sitedir;
	public $siteuri;
	public $data;
	public $variables = [];

	public function __construct(string $page) {
		$this->sitedir = __DIR__;
		$this->siteuri = $this->getSiteUri();
		// $this->data = $this->requireToVar('../server/mock-data/data-sidebar-industry.json');
		$this->variables = (object) [
			'page' => $page, // Put page name here to globally indicate which page is now;
			'apiuri' => get_template_directory_uri().'/server/api/search/vacancy/?',
			'apilookup' => get_template_directory_uri().'/server/api/search/lookup/?',
		];
		$this->data = $this->getData();
	}

	private function getSiteUri($value = '') {
		return substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], 'index.php'));
	}

	/**
	 * Just helper for future use.
	 */
	private function requireToVar($file) {
		ob_start();
		require_once $file;
		return ob_get_clean();
	}

	private function getData() {
		if (isset($_GET['city']))
			$_GET['queryvars']['city'] = $_GET['city'];
		if (isset($_GET['country']))
			$_GET['queryvars']['country'] = $_GET['country'];
		if (isset($_GET['industry']))
			$_GET['queryvars']['industry'] = $_GET['industry'];
		if (isset($_GET['text']))
			$_GET['queryvars']['text'] = $_GET['text'];
		if (isset($_GET['location']))
			$_GET['queryvars']['location'] = $_GET['location'];
        if (isset($_GET['specialism']))
            $_GET['queryvars']['specialism'] = $_GET['specialism'];
        if (isset($_GET['source']))
            $_GET['queryvars']['source'] = $_GET['source'];
		
		
		include_once (dirname(__FILE__) . '/server/index.php');
		$r = tve_get_results();


       // include_once (get_template_directory() . '/server/mock-data/data-controlbar-vactype.php');
       // include_once (get_template_directory() . '/server/mock-data/data-controlbar-source.php');

        //print_r($r);
		$r['payment'] = json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-controlbar-payment.json'), TRUE);
		$r['sorting'] = json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-controlbar-sorting.json'), TRUE);
		$r['vactype'] = json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-controlbar-vactype.json'), TRUE);
        $r['source'] = json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-controlbar-source.json'), TRUE);;
		$r['contextsearch'] = [
			'text' => (isset($_GET['text']) ? $_GET['text'] : NULL),
			'location' => (isset($_GET['location']) ? $_GET['location'] : NULL),
            'industry' => (isset($_GET['industry']) ? $_GET['industry'] : NULL),
            'specialism' => (isset($_GET['specialism']) ? $_GET['specialism'] : NULL),
            'source' => (isset($_GET['source']) ? $_GET['source'] : NULL),
		];

		$res = [
			'variables' => $this->variables,
			'vacsearch' => $r, //[
			/*
                'contextsearch' => [
                    'text' => (isset($_GET['text']) ? $_GET['text'] : NULL),
                    'location' => (isset($_GET['location']) ? $_GET['location'] : NULL),
                ],
				'city' => json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-sidebar-city.json'), TRUE),
				'country' => json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-sidebar-country.json'), TRUE),
				'industry' => json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-sidebar-industry.json'), TRUE),
				'payment' => json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-controlbar-payment.json'), TRUE),
				'sorting' => json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-controlbar-sorting.json'), TRUE),
				'vactype' => json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-controlbar-vactype.json'), TRUE),
				
				'results' => json_decode(file_get_contents(get_template_directory() . '/server/mock-data/data-results.json'), TRUE),
				
			],
			*/
		];

        //file_put_contents($_SERVER['DOCUMENT_ROOT']."/debug.log", print_r($res, true)."\n\n", 8);

		return json_encode($res);
	}



}
