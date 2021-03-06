<?php
$data = [];
$oper = '';
$auth = false;
switch($_GET['_']) {
    case 'viewjob':
        $id = (int)$_GET['id'];
        if( !$id ) die;

        $dir = wp_get_upload_dir();
        $feeds = file_get_contents($dir['path'] . '/job_hays.xml');
        if( strpos($feeds, '<offer available="true" id="'.$id.'">') === false ) die;

        $oper = 'ViewJob';
        $data['viewProduct']['product']['ids']['website'] = $id;
        break;
    case 'otklikjob':
        $oper = 'OtklikJob.Hays';
        $data['addProductToList']['product']['ids']['website'] = (int)$_GET['id'];
        break;
    case 'resume':
        if (isset($_GET['apply_job_id']) && !empty($_GET['apply_job_id']) && intval($_GET['apply_job_id'])>0) {
            $data['addProductToList']['product']['ids']['website'] = (int)$_GET['apply_job_id'];
        }

        $data['customer'] = [
            "firstName" => $_GET['userName'],
            "lastName" => $_GET['userSurName'],
            "email" => $_GET['userEmail']
        ];

        if ($_GET['job_title'] != 'Без вакансии') {
            $oper = 'Resume.Hays';
            $data['customer']['customFields']['nameCompany'] = $_GET['job_title'];
        } else {
            $oper = 'OtpravkaResume.Hays';
        }

        if (isset($_GET['userSpecialism']) && !empty($_GET['userSpecialism'])) {
            $data['customer']['customFields']['sphereJob'] = $_GET['userSpecialism'];
        }

        if (isset($_GET['city'])) {
            $data['customer']['customFields']['city'] = $_GET['city'];
        }

        $data['customer']['subscriptions'][0] = [
            "brand" => "hays",
            "pointOfContact" => "Email",
            "isSubscribed" => "true"
        ];

        if (isset($_GET['accept-terms-recive']) && $_GET['accept-terms-recive'] == 'on') {
            $data['customer']['subscriptions'][0]['isSubscribed'] = "true";
        } else {
            $data['customer']['subscriptions'][0]['isSubscribed'] = "false";
        }

        $auth = true;
        break;
    case 'formclient':
        $oper = 'DirectionHays';
        $data['customer']['ids']['clientID'] = $_COOKIE['mindboxDeviceUUID'];
        $auth = true;
        break;
    case 'gotouslugi':
        $oper = 'TrakingUslugiHays';
        $data['customer']['ids']['clientID'] = $_COOKIE['mindboxDeviceUUID'];
        $auth = true;
        break;
    case 'gotopodbor':
        $oper = 'DirectionHays';
        $data['customer']['ids']['clientID'] = $_COOKIE['mindboxDeviceUUID'];
        $auth = true;
        break;
    case 'gotodiruslugi':
        $oper = 'DirectionUslugiHays';
        $data['viewProductCategory']['productCategory']['ids']['website'] = str_replace('_Website', '', $_GET['url']);
        break;
    case 'gotoresearch':
        $oper = 'ResearchHays';
        break;
    case 'offertheme':
        $oper = 'Klik.PredlogTem.ResearchHays';
        $data['customer']['ids']['clientID'] = $_COOKIE['mindboxDeviceUUID'];
        $auth = true;
        break;
    case 'gotoresearchmore':
        $oper = 'Klik.UznBolshe.ResearchHays';
        $data['customer']['ids']['clientID'] = $_COOKIE['mindboxDeviceUUID'];
        $auth = true;
        break;
    case 'formoffertheme':
        $oper = 'Rega.PredlogTem.ResearchHays';

        $data['customer'] = [
            "fullName" => $_GET['your-name'],
            "mobilePhone" => $_GET['your-telephone'],
            "email" => $_GET['your-email']
        ];

        $data['customer']['customFields']['nameCompany'] = $_GET['your-company'];

        $data['customer']['subscriptions'][0] = [
            "brand" => "hays",
            "pointOfContact" => "Email"
        ];

        if (isset($_GET['acceptance-228']) && $_GET['acceptance-228'] == 1) {
            $data['customer']['subscriptions'][0]['isSubscribed'] = "true";
        } else {
            $data['customer']['subscriptions'][0]['isSubscribed'] = "false";
        }

        $auth = true;
        break;
    case 'formservice':
        $oper = 'FormaHays';

        $data['customer'] = [
            "fullName" => $_GET['fio'],
            "mobilePhone" => $_GET['phone'],
            "email" => $_GET['email']
        ];

        $data['customer']['customFields']['nameCompany'] = $_GET['your-type'];

        $data['customer']['subscriptions'][0] = [
            "brand" => "hays",
            "pointOfContact" => "Email"
        ];

        if (isset($_GET['acceptance-terms'])) {
            $data['customer']['subscriptions'][0]['isSubscribed'] = "true";
        } else {
            $data['customer']['subscriptions'][0]['isSubscribed'] = "false";
        }

        $auth = true;
        break;
    case 'formclient':
	    $oper = 'FormaHaysClients';

	    $data['customer'] = [
		    "fullName" => $_GET['fio'],
		    "mobilePhone" => $_GET['phone'],
		    "email" => $_GET['email']
	    ];

	    if (isset($_GET['company'])) {
		    $data['customer']['customFields']['nameCompany'] = $_GET['company'];
	    }

	    if (isset($_GET['your-type'])) {
		    $data['customer']['customFields']['service'] = $_GET['your-type'];
	    }

	    $auth = true;
	    break;
}

sendToMindBox($oper, $data, $auth);
die;

function sendToMindBox($action, $data, $auth = false, $log=false)
{
    $UUID = $_COOKIE['mindboxDeviceUUID'];
    $secret_key = 'SdFe8LPljN8MSx1V5wXJ';
    $endpointId = 'hays';
    $api_url = 'https://api.mindbox.ru/v3/operations/async?endpointId='.$endpointId.'&operation=Website.'.$action.'&deviceUUID='.$UUID;

    $data_string = empty($data)?'{}':json_encode ($data, JSON_UNESCAPED_UNICODE);
    $headers = [
        'Content-Type: application/json; charset=utf-8',
        'Accept: application/json',
        'User-Agent: '.$_SERVER['HTTP_USER_AGENT'],
        'X-Customer-IP: '.$_SERVER['REMOTE_ADDR']
    ];

    if ($auth) {
        $headers[] = 'Authorization: Mindbox secretKey="'.$secret_key.'"';
    }

    $curl = curl_init($api_url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    $result = json_decode(curl_exec($curl), true);
    curl_close($curl);

    if ($log) {
        haysLog($api_url, 'curl');
        haysLog($data, 'curl', 1);
        haysLog($result, 'curl', 1);
    }

    return $result;
}