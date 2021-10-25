<?php 

function hays_generate_csv_report() {
    $jobsQuery = new WP_Query;
	
	$afterQuery = array();
	$beforeQuery = array();
	$dateStart = isset($_GET['date-start']) ? $_GET['date-start'] : null; 
	$dateStop = isset($_GET['date-stop']) ? $_GET['date-stop'] : null;

	if (isset($dateStart)) {
		$date = date($dateStart);
		$afterQuery = array( // после этой даты
			'year'  => date("Y", strtotime($date)),
			'month' => date("m", strtotime($date)),
			'day'   => date("d", strtotime($date)),
		);
	}
	
	if (isset($dateStop)) {
		$date = date($dateStop);
		$beforeQuery = array( // после этой даты
			'year'  => date("Y", strtotime($date)),
			'month' => date("m", strtotime($date)),
			'day'   => date("d", strtotime($date)),
		);
	}

	$args = array(
		'post_type' => 'jobs',
		'posts_per_page' => -1,
		'orderby' => 'comment_count',
		'post_status' => 'publish',
	);
	
	if (isset($afterQuery) || isset($beforeQuery)) {
		$args['date_query'] = array(
			array(
				'after'     => $afterQuery,
				'before'    => $beforeQuery,
			)
		);
	}
	
	// делаем зmапрос
	$jobPosts = $jobsQuery->query( $args );
	
	$ECHO = "DATE OF PUBLICATION;JOB ID;JOB SITE;AUTHOR;JOBS LOCATION;JOBS SPECIALSM 1;JOBS SPECIALSM 2;JOBS SPECIALSM 3;JOBS SPECIALSM 4;JOBS SPECIALSM 5;JOBS INDUSTRY";
	$ECHO .= PHP_EOL;
	
	foreach( $jobPosts as $post ){
		$specialism = array();
		 
		if ($specialisms =  get_the_terms($post->ID, 'specialism'))
			foreach ( $specialisms as $term ) {
				$specialism[]= $term->name;
			}
	
		if ( $industry = get_the_terms($post->ID, 'industry') )
			$industry = array_shift( $industry );
		
		$city = '';
		$country = ''; 
	
		foreach ( get_the_terms($post->ID, 'locations') as $loc ) {
			if ($loc->parent){
				$city = $loc->name;
			} else {
				$country = strtoupper($loc->slug);
			}
		}
		
		$user =  get_the_terms($post->ID, 'post_author_override');
		$user = get_field('job_manager', $post->ID);
		 
		if ( ! ($user = get_field('job_manager', $post->ID) ) )
			$user = $post->post_author;
		//Если Довгун
			if ($user == 9)
				$user = '0';
		$user = get_userdata($user);

		$specialism[0] = isset($specialism[0]) ? $specialism[0] : '';
		$specialism[1] = isset($specialism[1]) ? $specialism[1] : '';
		$specialism[2] = isset($specialism[2]) ? $specialism[2] : '';
		$specialism[3] = isset($specialism[3]) ? $specialism[3] : '';
		$specialism[4] = isset($specialism[4]) ? $specialism[4] : '';

		$industryName = !empty($industry) ? $industry->name : '';
		
		$ECHO .= $post->post_date .';';					//01. Date of publication
		$ECHO .= get_field('job_id', $post->ID).';';	//02. JOB ID
		$ECHO .= get_field('site', $post->ID).';';		//03. JOB SITE
		$ECHO .= $user->user_email.';';					//04. AUTHOR
		//$ECHO .= $locations->name.';';					//05. JOBS LOCATION
		$ECHO .= $country.', '.$city.';';					//05. JOBS LOCATION
		$ECHO .= '"'.$specialism[0].'";';					//06. JOBS SPECIALSM 1
		$ECHO .= '"'.$specialism[1].'";';					//07. JOBS SPECIALSM 2
		$ECHO .= '"'.$specialism[2].'";';					//08. JOBS SPECIALSM 3
		$ECHO .= '"'.$specialism[3].'";';					//09. JOBS SPECIALSM 4
		$ECHO .= '"'.$specialism[4].'";';					//10. JOBS SPECIALSM 5
		$ECHO .= $industryName.';';					    //11. JOBS INDUSTRY
		$ECHO .= PHP_EOL;
	}

	if (!empty($dateStart) || !empty($_GET['published'])) {
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header("Content-Disposition: attachment; filename=report.csv");
		echo "\xEF\xBB\xBF"; // UTF-8 BOM
		echo $ECHO;
		die();
	}
}

add_action( 'admin_post_generate_csv_report', 'hays_generate_csv_report' );

