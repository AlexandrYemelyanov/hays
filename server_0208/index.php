<?php

/**
 * The entry point for the mock back-end API for the front-end development stage.
 *
 * The below purpose is for:
 * - mocking up the definite interface to backend;
 * - developing and testing the front-end.
 */

require_once($_SERVER['DOCUMENT_ROOT'].'/wp-load.php');

global $request;

$request = getRequest();

/**
 * The stub request processor for the overall Hays site search endpoint.
 */
if (isset($request['path']) && $request['path'] === 'api/search/text') {
    echo "Принята строка поиска материалов по сайту на стороне сервера: {$request['header-search-field']}";
}

if (isset($request['path']) && $request['path'] === 'api/qconsent/write') {
    echo "Подтверждение посетителя сайта на использование cookies принято и записано.";
    writeQConsentLog();
}

/**
 * This is the backend imitation for the live look up for the banner & vacancy
 * search context search block's 'vacancy name' field value.
 */
if (isset($request['path']) && $request['path'] === 'api/search/lookup/') {
    $res = [
        'success' => true,
        'status'  => 200,
        'request' => $request,
        'dt'      => tve_get_results(),
    ];

    //print_r($res);

    /**
     * Imitate the found / not-found case for context search from banner &
     * vacancy search page.
     *
     * If [queryvars][text] contains the portion of the required word, then it
     * is a 'found' case. Otherwise the response is 'not found', so
     * $res['dt']['results']=NULL.
     */
    if (isset($request['queryvars']['text'])) {
        $foundtext = $request['queryvars']['text'];
        $res['dt']['foundtext'] = $foundtext;
        if ($foundtext === false) {
            $res['dt']['results'] = null;
        }
    }

    if (isset($request['queryvars']['location'])) {
        $foundtext = mb_strpos(mb_strtolower($request['queryvars']['location']), mb_strtolower($request['queryvars']['location']));
        $res['dt']['foundtext'] = $foundtext;

        if ( ! empty($request['queryvars']['location'])) {
            $q = '
			select t.term_id id, t.name, count(*) count
			from '.$wpdb->terms.' t
			left join '.$wpdb->term_relationships.' tr on t.term_id=tr.term_taxonomy_id
			inner join '.$wpdb->term_taxonomy.' tt on t.term_id = tt.term_id and tt.parent>0 and tt.taxonomy="locations"
			where t.name like "'.$request['queryvars']['location'].'%"
			group by t.term_id
			order by name';
            //echo $q;
            $res['dt']['results'] = $wpdb->get_results($q, ARRAY_A);
        }
        /*
        $foundtext = mb_strpos(mb_strtolower($request['queryvars']['text']), mb_strtolower($request['queryvars']['text']));
        $res['dt']['foundtext'] = $foundtext;
        if ($foundtext === FALSE) {
            $res['dt']['results'] = NULL;
        }
        */
    }
    echo json_encode($res);
}

/**
 * Make it the MockSearchController class in mock folder as it grow.
 */
if (isset($request['path']) && $request['path'] === 'api/search/vacancy/') {
    $res = [
        'success' => true,
        'status'  => 200,
        'request' => $request,
        'dt'      => [
            'results' => null,
        ],
    ];
    if (isset($request['more'])) {
        /**
         * Just to simulate 'no more data' case.
         *
         * $res['dt']['results'] must be NULL to signal to front-end there is no
         * more data.
         */
        if ($request['page'] < 5) {
            $res['dt'] = tve_get_results();
            if ( ! count($res['dt']['results'])) {
                $res['success'] = false;
                $res['status'] = 204;
            }
        }
    }

    /**
     * Simualte NOT FOUND case.
     */
    // if (isset($request['queryvars']) && isset($request['queryvars']['city']) && $request['queryvars']['city'] === "999") {
    // 	$res['success'] = FALSE;
    // 	$res['status'] = 204;
    // }

    /**
     * Simulate the request with filters and the normal response.
     *
     * As well simulate 'no more data' case with only 5 pages of data available
     * id DB.
     */
    if (isset($request['queryvars']) && ! isset($request['more'])) {
        $res['dt'] = tve_get_results();
        //print_r($res);
        if ( ! count($res['dt']['results'])) {
            $res['success'] = false;
            $res['status'] = 204;
        }
        //$res['dt']['city'] = json_decode(file_get_contents('./mock-data/data-sidebar-city.json'), TRUE);
        //$res['dt']['country'] = json_decode(file_get_contents('./mock-data/data-sidebar-country.json'), TRUE);
        //$res['dt']['industry'] = json_decode(file_get_contents('./mock-data/data-sidebar-industry.json'), TRUE);
    }

    if (isset($request['queryvars']) && isset($request['more']) && isset($request['page']) && $request['page'] < 15) {
        $res['dt'] = tve_get_results();
        if ( ! count($res['dt']['results'])) {
            $res['success'] = false;
            $res['status'] = 204;
        }
    }

    echo json_encode($res);
}

/**
 * Helper to get the HTTP request into the single variable.
 * @return array The array with either $_GET or $_POST array content depending
 * on the HTTP verb used.
 */
function getRequest()
{
    global $_POST;
    global $_GET;
    global $_SERVER;
    $verb = $_SERVER['REQUEST_METHOD'];

    if ($verb === 'GET') {
        return $_GET;
    } elseif ($verb === 'POST') {
        return $_POST;
    }
    throw new Exception("WJ: No request for verbs other than 'GET' or 'POST'");
}

/**
 * Write the record of cookies acceptance by the site visitor to a log file.
 */
function writeQConsentLog()
{
    $logname = 'qconsent.log';
    $referer = $_SERVER['HTTP_REFERER'];
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $raddr = $_SERVER['REMOTE_ADDR'];
    $rport = $_SERVER['REMOTE_PORT'];
    $rtime = date('d-m-Y H:i:s', $_SERVER['REQUEST_TIME']);
    $str = "Cookies Policy accepted. User data: referer: $referer, user agent: $ua, remote address: $raddr, time: $rtime\n";

    $res = (object) [
        'success'   => true,
        'message'   => 'success',
        'exception' => null,
    ];

    try {
        $bytes = file_put_contents($logname, $str, FILE_APPEND | LOCK_EX);
    } catch (Exception $e) {
        $res->success = false;
        $res->message = 'Exception raised.';
        $res->exception = $e->__toString();
    }

    if ($bytes === false) {
        $res->success = false;
        $res->message = 'Could not write anything. Some error happened.';
    }

    echo json_encode($res);
}

function tve_get_results()
{
    global $request, $wpdb;
    $offset = (empty($request['more']) or empty($request['page'])) ? 0 : $request['page'];

    $query = '
		select p.ID
		from '.$wpdb->posts.' p
		left join '.$wpdb->postmeta.' pmt on ( p.ID = pmt.post_id ) and pmt.meta_key = "job_title"
	';
    $where = '
		where p.post_type = "jobs"
		AND (p.post_status = "publish" OR p.post_status = "acf-disabled")
	';

    if ( ! empty($request['queryvars']['city'])) {
        $query .= '
			inner JOIN '.$wpdb->term_relationships.' trsh1 ON (p.ID = trsh1.object_id) and trsh1.term_taxonomy_id = '.(int) $request['queryvars']['city'].'
		';
    }
    if ( ! empty($request['queryvars']['location']) and empty($request['queryvars']['city'])) {
        $query .= '
			inner JOIN '.$wpdb->term_relationships.' trsh6 ON (p.ID = trsh6.object_id)
			inner join '.$wpdb->terms.' t on trsh6.term_taxonomy_id = t.term_id and t.name like "'.$request['queryvars']['location'].'%"
		';
    }

    // выборка городов и итогов по ним
    $q = '
		select t.term_id id, t.name, count(*) count
		from '.$wpdb->terms.' t
		left join '.$wpdb->term_relationships.' tr on t.term_id=tr.term_taxonomy_id
		inner join '.$wpdb->term_taxonomy.' tt on t.term_id = tt.term_id and tt.parent'.(empty($request['queryvars']['country']) ? '>0' : '='.(int) $request['queryvars']['country']).' and tt.taxonomy="locations"
		inner join '.$wpdb->posts.' p on tr.object_id = p.ID and p.post_type = "jobs" AND (p.post_status = "publish" OR p.post_status = "acf-disabled")';
    if ( ! empty($request['queryvars']['industry'])) {
        $q .= '
				inner join '.$wpdb->term_relationships.' tr2 on p.ID=tr2.object_id and tr2.term_taxonomy_id='.$request['queryvars']['industry'].'
				inner join '.$wpdb->term_taxonomy.' tt2 on tr2.term_taxonomy_id = tt2.term_taxonomy_id and tt2.taxonomy="industry"
			';
    }

    if ( ! empty($request['queryvars']['text'])) {
        $q .= '
				INNER JOIN '.$wpdb->postmeta.' pm4 ON ( p.ID = pm4.post_id ) and pm4.meta_key = "job_title"
				INNER JOIN '.$wpdb->postmeta.' pm5 ON ( p.ID = pm5.post_id ) and pm5.meta_key = "job_id"
				where (pm4.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (pm5.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (p.post_content like "%'.$request['queryvars']['text'].'%")
			';
    }
    $q .= '
		group by t.term_id
		order by name';
    //echo $q;
    $city = $wpdb->get_results($q, ARRAY_A);
    //print_r($city);

    // выборка стран и итогов по ним
    $q = '
		select t.term_id id, t.name, count(*) count
		from '.$wpdb->terms.' t
		left join '.$wpdb->term_relationships.' tr on t.term_id=tr.term_taxonomy_id
		inner join '.$wpdb->term_taxonomy.' tt on t.term_id = tt.term_id and tt.parent=0 and tt.taxonomy="locations"
		inner join '.$wpdb->posts.' p on tr.object_id = p.ID and p.post_type = "jobs" AND (p.post_status = "publish" OR p.post_status = "acf-disabled")';
    if ( ! empty($request['queryvars']['industry'])) {
        $q .= '
				inner join '.$wpdb->term_relationships.' tr2 on p.ID=tr2.object_id and tr2.term_taxonomy_id='.$request['queryvars']['industry'].'
				inner join '.$wpdb->term_taxonomy.' tt2 on tr2.term_taxonomy_id = tt2.term_taxonomy_id and tt2.taxonomy="industry"
			';
    }

    if ( ! empty($request['queryvars']['text'])) {
        $q .= '
				INNER JOIN '.$wpdb->postmeta.' pm4 ON ( p.ID = pm4.post_id ) and pm4.meta_key = "job_title"
				INNER JOIN '.$wpdb->postmeta.' pm5 ON ( p.ID = pm5.post_id ) and pm5.meta_key = "job_id"
				where (pm4.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (pm5.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (p.post_content like "%'.$request['queryvars']['text'].'%")
			';
    }
    $q .= '
		group by t.term_id
		order by name';
    //echo $q;
    $country = $wpdb->get_results($q, ARRAY_A);
    //print_r($city);

    // выборка индустрии и итогов по ним
    $q = '
		select t.term_id id, t.name, count(*) count
		from '.$wpdb->terms.' t
		left join '.$wpdb->term_relationships.' tr on t.term_id=tr.term_taxonomy_id
		inner join '.$wpdb->term_taxonomy.' tt on t.term_id = tt.term_id and tt.parent=0 and tt.taxonomy="industry"
		inner join '.$wpdb->posts.' p on tr.object_id = p.ID and p.post_type = "jobs" AND (p.post_status = "publish" OR p.post_status = "acf-disabled")';
    if ( ! empty($request['queryvars']['country'])) {
        $q .= '
				inner join '.$wpdb->term_relationships.' tr2 on p.ID=tr2.object_id and tr2.term_taxonomy_id='.$request['queryvars']['country'].'
				inner join '.$wpdb->term_taxonomy.' tt2 on tr2.term_taxonomy_id = tt2.term_taxonomy_id and tt2.taxonomy="locations"
			';
    }

    if ( ! empty($request['queryvars']['text'])) {
        $q .= '
				INNER JOIN '.$wpdb->postmeta.' pm4 ON ( p.ID = pm4.post_id ) and pm4.meta_key = "job_title"
				INNER JOIN '.$wpdb->postmeta.' pm5 ON ( p.ID = pm5.post_id ) and pm5.meta_key = "job_id"
				where (pm4.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (pm5.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (p.post_content like "%'.$request['queryvars']['text'].'%")
			';
    }
    $q .= '
		group by t.term_id
		order by name';
    //echo $q;
    $industry = $wpdb->get_results($q, ARRAY_A);
    //print_r($city);

    // выборка индустрии и итогов по ним
    $q = '
		select t.term_id id, t.name, count(*) count
		from '.$wpdb->terms.' t
		left join '.$wpdb->term_relationships.' tr on t.term_id=tr.term_taxonomy_id
		inner join '.$wpdb->term_taxonomy.' tt on t.term_id = tt.term_id and tt.parent=0 and tt.taxonomy="specialism"
		inner join '.$wpdb->posts.' p on tr.object_id = p.ID and p.post_type = "jobs" AND (p.post_status = "publish" OR p.post_status = "acf-disabled")';
    if ( ! empty($request['queryvars']['country'])) {
        $q .= '
				inner join '.$wpdb->term_relationships.' tr2 on p.ID=tr2.object_id and tr2.term_taxonomy_id='.$request['queryvars']['country'].'
				inner join '.$wpdb->term_taxonomy.' tt2 on tr2.term_taxonomy_id = tt2.term_taxonomy_id and tt2.taxonomy="locations"
			';
    }

    if ( ! empty($request['queryvars']['text'])) {
        $q .= '
				INNER JOIN '.$wpdb->postmeta.' pm4 ON ( p.ID = pm4.post_id ) and pm4.meta_key = "job_title"
				INNER JOIN '.$wpdb->postmeta.' pm5 ON ( p.ID = pm5.post_id ) and pm5.meta_key = "job_id"
				where (pm4.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (pm5.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (p.post_content like "%'.$request['queryvars']['text'].'%")
			';
    }
    $q .= '
		group by t.term_id
		order by name';
    //echo $q;
    $specialism = $wpdb->get_results($q, ARRAY_A);
    //print_r($city);

    if ( ! empty($request['queryvars']['country'])) {
        $query .= '
			inner JOIN '.$wpdb->term_relationships.' trsh2 ON (p.ID = trsh2.object_id) and trsh2.term_taxonomy_id = '.(int) $request['queryvars']['country'].'
		';
    }

    if ( ! empty($request['queryvars']['industry'])) {
        $query .= '
			inner JOIN '.$wpdb->term_relationships.' trsh3 ON (p.ID = trsh3.object_id) and trsh3.term_taxonomy_id = '.(int) $request['queryvars']['industry'].'
		';
    }

    if ( ! empty($request['queryvars']['specialism'])) {
        $query .= '
			inner JOIN '.$wpdb->term_relationships.' trsh3 ON (p.ID = trsh3.object_id) and trsh3.term_taxonomy_id = '.(int) $request['queryvars']['specialism'].'
		';
    }

    /*Тип зароботной платы*/
    if ( ! empty($request['queryvars']['vactype'])) {
        $query .= '
			INNER JOIN '.$wpdb->postmeta.' pm1 ON ( p.ID = pm1.post_id ) and (pm1.meta_key = "job_type") AND (pm1.meta_value = '.$request['queryvars']['vactype'].')
		';
    }

    /*Период*/
    if ( ! empty($request['queryvars']['payment'])) {
        $query .= '
			INNER JOIN '.$wpdb->postmeta.' pm2 ON ( p.ID = pm2.post_id ) and (pm2.meta_key = "job_salary_period") AND (pm2.meta_value = '.$request['queryvars']['payment'].')
		';
    }

    /*Коридор*/
    if ( ! empty($request['queryvars']['paymentrange'])) {
        $payments = json_decode(file_get_contents(dirname(__FILE__).'/mock-data/data-controlbar-payment.json'));
        //print_r($payments);
        $salary_max = $salary_min = 0;
        foreach ($payments as $t1) {
            if ($t1->id == $request['queryvars']['payment']) {
                foreach ($t1->ranges as $t2) {
                    if ($t2->id == $request['queryvars']['paymentrange']) {
                        $ra = explode('-', $t2->name);
                        $salary_min = (int) str_replace(' ', '', $ra[0]);
                        if (isset($ra[1])) {
                            $salary_max = (int) str_replace(' ', '', $ra[1]);
                        }
                        //print_r($ra);
                        //print_r($salary_min);
                        //print_r($salary_max);
                    }
                }
            }
        }

        if ($salary_max) {
            $query .= '
				INNER JOIN '.$wpdb->postmeta.' pm3 ON ( p.ID = pm3.post_id ) and (pm3.meta_key = "job_salary_from") AND (CONVERT(pm3.meta_value, SIGNED INTEGER) <= '.$salary_max.')
			';
        }
        if ($salary_min) {
            $query .= '
				INNER JOIN '.$wpdb->postmeta.' pm6 ON ( p.ID = pm6.post_id ) and (pm6.meta_key = "job_salary_to") AND (CONVERT(pm6.meta_value, SIGNED INTEGER) >= '.$salary_min.')
			';
        }
    }

    if ( ! empty($request['queryvars']['text'])) {
        $query .= '
			INNER JOIN '.$wpdb->postmeta.' pm4 ON ( p.ID = pm4.post_id ) and pm4.meta_key = "job_title"
			INNER JOIN '.$wpdb->postmeta.' pm5 ON ( p.ID = pm5.post_id ) and pm5.meta_key = "job_id"
		';
        $where .= '
			and (
				(pm4.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (pm5.meta_value LIKE "%'.$request['queryvars']['text'].'%")
				or (p.post_content like "%'.$request['queryvars']['text'].'%")
			)
		';
    }

    $query .= $where;
    $query .= '
		GROUP BY p.ID 
	';

    /*Сортировка*/
    if ( ! empty($request['queryvars']['sorting'])) {
        if ($request['queryvars']['sorting'] == 1) {
            $query .= '
				ORDER BY p.post_date DESC 
			';
        } elseif ($request['queryvars']['sorting'] == 2) {
            $query .= '
				ORDER BY pmt.meta_value
			';
        } elseif ($request['queryvars']['sorting'] == 3) {
            $query .= '
				ORDER BY p.post_date DESC 
			';
        }
    }

    if ($offset) {
        $query .= '
			limit '.($offset * 10).', 10
		';
    } else {
        $query .= '
			limit 0, 10
		';
    }

    //echo $query;

    $posts = $wpdb->get_results($query);

    $result = [];
    $result_specialism = '';
    foreach ($posts as $post) {
        $c = '';
        $locations = get_the_terms($post->ID, 'locations');
        $current_industry = wp_get_post_terms($post->ID, 'industry', array("fields" => "all"));
        $current_specialism = wp_get_post_terms($post->ID, 'specialism', array("fields" => "all"));

        //print_r($current_specialism->name);
        $key = 1;
        foreach ($current_specialism as $current_spec) {
            if ($key == 1) {
                $result_specialism .= $current_spec->name;
            } else {
                $result_specialism .= ' / '.$current_spec->name;
            }
            $key++;
        }

        if ( ! empty($current_specialism[0]->name)) {
            $specialism_0 = str_replace('&amp;', '&', $current_specialism[0]->name);
        }

        if ( ! empty($current_specialism[1]->name)) {
            $specialism_1 = ' | '.str_replace('&amp;', '&', $current_specialism[1]->name);
        }

        if ( ! empty($current_specialism[2]->name)) {
            $specialism_2 = ' | '.str_replace('&amp;', '&', $current_specialism[2]->name);
        }

        if ( ! empty($current_specialism[3]->name)) {
            $specialism_3 = ' | '.str_replace('&amp;', '&', $current_specialism[3]->name);
        }

        if ( ! empty($current_specialism[4]->name)) {
            $specialism_4 = ' | '.str_replace('&amp;', '&', $current_specialism[4]->name);
        }
        //' / '.$current_specialism[1]->name .' / '. $current_specialism[2]->name .' / '. $current_specialism[3]->name .' / '. $current_specialism[4]->name

        foreach ($locations as $l) {
            if ($l->parent) {
                $c = $l->name;
            }
        }
        $result[] = [
            "id"         => $post->ID,
            "name"       => get_field('field_5b6e863cb5392', $post->ID),
            "industry"   => ! empty($current_industry[0]->name) ? $current_industry[0]->name : '',
            //'specialism' => !empty($current_specialism[0]->name)? $current_specialism[0]->name : '',
            'specialism' => $specialism_0.$specialism_1.$specialism_2.$specialism_3.$specialism_4,
            "link"       => get_permalink($post->ID),
            "city"       => $c,
            'site'       => get_field('site', $post->ID)
        ];
    }
    
    return [
        'results'    => $result,
        'city'       => $city,
        'country'    => $country,
        'industry'   => $industry,
        'specialism' => $specialism
    ];
}

