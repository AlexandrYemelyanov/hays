<?php

function hh_get_feedbacks() {

define("HH_API_DIR", get_template_directory() . '/api/hh');
require_once(HH_API_DIR.'/ApiHH.class.php');

$client_id = 'H969GO6FJ1063F6N0U47FOS4AA0JA9H01M4N3G2N19JP7HG3URR9IECP3V169KI5';
$client_secret = 'LIDHSUGSIG2P9QDD2QMV05VHHKVUOMKBNJJ4UUI5B7UPP3D0TE2LDUR27S0SSQLF';
$authorization_code = 'R7SV09KUROL7TE5DBPRINGDQCFQIFAMENL5S12187EGQNGN7KLVGR7PS1AI1HCRR';
$logger = ['Старт: '.date('H:i d.m.Y')];
$log_file = HH_API_DIR.'/logs/hh_feedbacks.log';
$api = new ApiHH($client_id, $client_secret);

///require __DIR__ . '../../../../../../wp-load.php';
//////////////////////////////////////
/// Получение отправленных отзывов ///
//////////////////////////////////////
global $wpdb;
// улаляем старые записи
$wpdb->query("DELETE FROM `hh_feed_send` WHERE `send` < DATE_SUB(NOW(), INTERVAL 3 MONTH)");

$res = $wpdb->get_results("SELECT `id` FROM `hh_feed_send`");
$feeds_send = [];
foreach ($res as $row) {
	$feeds_send[] = $row->id;
}
// echo "уже отправлено = ".count($feeds_send); die;
///////////////////////////////
/// Получение всех откликов ///
//////////////////////////////
$timer = microtime(true);
// Получаем список менеджеров
$managers = $api->getManagers();

$vacancies = [];
$feeds = [];
$vac_cnt = 0;
if (!empty($managers)) {
	foreach ($managers as $manager) {
		//if (count($feeds) > 100) break;
		if (!empty($manager['vacancies_count'])) {
			// Получаем вакансии
			$_vacancies = $api->getVacancies($manager['id']);
			$vac_cnt += count($_vacancies);

			if (!empty($_vacancies)) {
				foreach ($_vacancies as $vacancy) {
					// Получаем коллекции
					$collections = $api->getVacCollections($vacancy['id']);
					if (!empty($collections)) {
						foreach ($collections as $collection) {
							// проверяем наличие откликов в коллекции
							if (!empty($collection['counters']['total'])) {
								// Получаем отклики
								$feedbacks = $api->getFeedbacks($collection['id'], $vacancy['id']);
								if (!empty($feedbacks)) {
									foreach ($feedbacks as $feedback) {
										// проверяем что отклик а не приглашение
										if ($feedback['state']['id'] == 'response') {
											$feeds[ $feedback['id'] ] = [
												'vacancy' => $vacancy['name'],
												'email' => $manager['email'],
												'first_name' => $feedback['resume']['first_name'] ?? '',
												'last_name' => $feedback['resume']['last_name'] ?? '',
												'resume' => $feedback['resume']['download']['pdf']['url'] ?? ''
											];
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

$timer_part = explode('.',round((microtime(true)-$timer),3));

$logger[] = 'Запросы к API выполнены за: '.date("i мин s.".$timer_part[1]." сек", $timer_part[0]);
$logger[] = 'Всего откликов: '.count($feeds);

/////////////////////////////
/// Находим новые отклики ///
/////////////////////////////
$feeds_new = [];
foreach ($feeds as $id => $feed) {
	if (!in_array($id, $feeds_send)) {
		$feeds_new[ $id ] = $feed;
	}
}

if (empty($feeds_new)) {
	die("Новых откликов нет");
}

$logger[] = 'Новых откликов: '.count($feeds_new);

//die;
$wpdb->query("INSERT INTO `hh_feed_send` (`id`) VALUES (".implode('), (', array_keys($feeds_new)).")");

$timer = microtime(true);
// исключаем первый запуск
if (empty($_GET['first_start']) && !empty($feeds_send)) {
	array_map('unlink', glob(HH_API_DIR.'/tmp/*'));
	foreach ($feeds_new as $id => $feed) {
		// скачиваем резюме
		$resume_file = HH_API_DIR.'/tmp/resume-'.$id.'.pdf';
		if (!empty($feed['resume'])) {
			$api->resumeDownload($feed['resume'], $resume_file);
			if (is_file($resume_file)) {
				sendResumeEmail($feed['first_name'].' '.$feed['last_name'], $resume_file);
			}
		}
	}
}
$timer_part = explode('.',round((microtime(true)-$timer),3));
$logger[] = 'Скачано и отправлены резюме за:'.date("i мин s.".$timer_part[1]." сек", $timer_part[0]);
file_put_contents($log_file, implode("\n\n", $logger));
}

function sendResumeEmail($name, $attach)
{
	$attach = [$attach];
	$industry_email = [
		'Финансы и бухгалтерия'	=> 'Moscow.accountancy_perm@hays.ru',
		'Строительство и недвижимость'	=> 'Moscow.construction_perm@hays.ru',
		'Финансовые институты'	=> 'Moscow.fininstitution_perm@hays.ru',
		'FMCG'	=> 'Moscow.fmcg_perm@hays.ru',
		'Продажи и маркетинг:B2B'	=> 'Moscow.B2B_perm@hays.ru',
		'Административный персонал'	=> 'Moscow.officesupport_perm@hays.ru',
		'Юриспруденция'	=> 'Moscow.legal_perm@hays.ru',
		'Управление персоналом'	=> 'Moscow.hr_perm@hays.ru',
		'Инжиниринг и EPC'	=> 'Moscow.EPCengineering_perm@hays.ru',
		'Автобизнес' => 'Moscow.automotive_perm@hays.ru',
		'Производство'	=> 'Moscow.industry_perm@hays.ru',
		'IT и Телеком'	=> 'Moscow.it_perm@hays.ru',
		'Маркетинг (Фармацевтика)'	=> 'Moscow.LSMarketing_perm@hays.ru',
		'Медицинское и лабораторное оборудование'	=> 'Moscow.medicaldeviced_perm@hays.ru',
		'Ветеринария'	=> 'Moscow.animalhealth_perm@hays.ru',
		'Фармацевтика'	=> 'Moscow.lifesciences_perm@hays.ru',
		'Tоп-менеджемент (Фармацевтика)' => 'Moscow.LSSocialCare_perm@hays.ru',
		'Люкс'	=> 'Moscow.lux_perm@hays.ru',
		'Digital&E-Commerce' => 'Moscow.digital_perm@hays.ru',
		'Медиа'	=> 'Moscow.media_perm@hays.ru',
		'MARCOM PR'	=> 'Moscow.salesmarketing_perm@hays.ru',
		'Нефтегазовый сектор' => 'Moscow.oilgas_perm@hays.ru',
		'Ритейл' => 'Moscow.retail_perm@hays.ru',
		'Логистика и закупки' => 'Moscow.logistics_perm@hays.ru'
	];

	$job_manager_email_resume = 'Moscow.accountancy_perm@hays.ru';

	$headers[] = 'From: '.$name. "\r\n";
	$headers[] = 'X-Aplitrak-Original-Ref: ' . "\r\n";
	$headers[] = 'X-Aplitrak-Original-Consultant: '. $job_manager_email_resume . "\r\n";

	return wp_mail("mahteev@pervee.ru", 'Резюме от '.$name, 'Резюме во вложении', $headers, $attach );
}
