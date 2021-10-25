<?php

// example: [salary-checker id="2"]
class SalaryChecker {
    private $template_dir = '';
	private $root = 'salary-checker';
    private $version = 'v1';
	
    public function __construct() 
    {
        $this->initalize();
    }

    public function initalize() 
    {
        $this->template_dir = get_template_directory_uri(); 
        $this->register_routes();

        add_action( 'admin_post_sc_data_import', array($this, 'handle_data_import') );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_frontend_assets'), 11 );
        add_shortcode( 'salary_checker', array($this, 'shortcode') );
    }

    public function handle_data_import() 
    {
        if (isset($_FILES["data"]) && isset($_FILES["data"]["tmp_name"])) {
            $csv = file_get_contents( $_FILES["data"]["tmp_name"] );
            SalaryChecker::import_data($csv);
        }

       wp_redirect( admin_url('options-general.php?page=hays-options') );
    }

    public static function import_data( $csv )
    {
        setlocale(LC_ALL, 'ru_RU.UTF-8');
        global $wpdb;
        $data = str_getcsv( $csv );

        $data = array_chunk($data, 9);
        array_shift($data);

        // remove all existing positions
        $wpdb->query("TRUNCATE TABLE {$wpdb->prefix}positions");
        
        $added_terms = array();
        foreach ($data as $index => $row) {
            $is_valid_row = true;

            for ($i = 0; $i <= 8; $i++) {
                $is_valid_row = $is_valid_row && array_key_exists($i, $row);
            }

            $industry = trim($row[0]);
            $location = $row[1];
            $sector = trim($row[2]);
            $company_type = trim($row[3]);
            $experience = trim($row[4]);
            $position_title = trim($row[5]);
            $salary_min = absint($row[6]);
            $salary_avg = absint($row[7]);
            $salary_max = absint($row[8]);

            $table = $wpdb->prefix.'positions';
            $data = array(
                'industry' => $industry,
                'location' => $location,
                'sector' => $sector,
                'company_type' => $company_type,
                'experience' => $experience,
                'position_title' => $position_title,
                'salary_min' => $salary_min,
                'salary_avg' => $salary_avg,
                'salary_max' => $salary_max
            );
            $format = array('%s','%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d');
            $wpdb->insert($table, $data, $format);
        }
    }

    public function shortcode( $atts ) 
    {
        wp_enqueue_script('salary-checker-scripts');

        return hm_get_template_part('partials/shortcodes/salary-checker/index', array(
            'return' => true
        ));
    }

    public function enqueue_frontend_assets() 
    {
        wp_register_script('salary-checker-scripts',  $this->template_dir . "/dist/SalaryChecker.js", array(), true);
        wp_enqueue_style('salary-checker-styles', $this->template_dir . "/dist/SalaryChecker.css");
        
        global $wpdb;
        $industries = array();
        $query_result = $wpdb->get_results("SELECT DISTINCT industry FROM {$wpdb->prefix}positions WHERE NULLIF(industry, '') IS NOT NULL", ARRAY_A);
        foreach ($query_result as $row) {
            $industries[] = array(
                "label" => $row['industry'],
                "id" => $row['industry']
            );
        }

        $checker_data = array( 
            'themeRoot' => $this->template_dir,
            'industries' => $industries
        );
        wp_localize_script( 'salary-checker-scripts', 'salaryCheckerWP', $checker_data );
    }
	
	public function route_sectors() {
		register_rest_route( "{$this->root}/{$this->version}", '/sectors', array(
				array(
					'methods'  => \WP_REST_Server::READABLE,
					'callback' => array( $this, 'getSectors' ),
					'args'     => array(
						'industry' => array(
							"type" => "string"
						)
					),
				),
			)
		);
	} 
	
	public function route_positions() {
		register_rest_route( "{$this->root}/{$this->version}", '/positions', array(
				array(
					'methods'  => \WP_REST_Server::READABLE,
					'callback' => array( $this, 'getPositions' ),
					'args'     => array(
						'industry' => array(
							"type" => "string"
						),
						'sector' => array(
							"type" => "string"
						)
					),
				),
			)
		);
	}
	
	public function route_submit() {
		register_rest_route( "{$this->root}/{$this->version}", '/submit', array(
				array(
					'methods'  => \WP_REST_Server::CREATABLE,
					'callback' => array( $this, 'handleFormSubmission' ),
					'args'     => array(
						'data' => array(
							"type" => "array"
						),
						'email' => array(
							"required" => true,
							"type" => "string",
							"sanitize_callback" => 'sanitize_email'
						)
					),
				),
			)
		);
	}
	
    public function register_routes() 
    {
		add_action( 'rest_api_init', array( $this, 'route_sectors'));
		add_action( 'rest_api_init', array( $this, 'route_positions'));
		add_action( 'rest_api_init', array( $this, 'route_submit'));
    }

    public function handleFormSubmission( $request ) {
        $data = $request['data'];
        $email = $request['email'];
    }

    public function getSectors( $request ) {
        global $wpdb;
        $industry_id = $request['industry'];

        $sectors = array();
        $query_result = $wpdb->get_results("SELECT DISTINCT sector FROM {$wpdb->prefix}positions WHERE NULLIF(sector, '') IS NOT NULL AND industry = '$industry_id'", ARRAY_A);
        foreach ($query_result as $row) {
            $sectors[] = array(
                "label" => $row['sector'],
                "id"    => $row['sector']
            );
        }

        return array(
            'industryId' => $industry_id,
            'sectors' => $sectors
        );
    }

    public function getPositions( $request ) {
        global $wpdb;

        $industry_id = $request['industry'];
        $sector_id = $request['sector'];

        $query_result = $wpdb->get_results("SELECT id, industry, sector, position_title as label, `location`, company_type as companyType, experience, salary_min as minSalary, salary_avg as averageSalary, salary_max as maxSalary FROM {$wpdb->prefix}positions WHERE industry = '$industry_id' AND sector = '$sector_id'", ARRAY_A);

        $experiences = array();
        $locations = array();
        $companyTypes = array();
        $positions = array();
        foreach ($query_result as $row) {
            $experiences[] = $row['experience'];
            $locations[] = $row['location'];
            $companyTypes[] = $row['companyType'];
            $positions[] = array(
                'id' =>  $row['id'],
                'label' => $row['label'],
                'location' =>  $row['location'],
                'companyType' =>  $row['companyType'],
                'experience' =>  $row['experience'],
                'minSalary' =>  $row['minSalary'],
                'averageSalary' =>  $row['averageSalary'],
                'maxSalary' => $row['maxSalary']
            );
        }
        $experiences = array_values(array_unique($experiences));
        $locations = array_values(array_unique($locations));
        $companyTypes = array_values(array_unique($companyTypes));

        foreach ($experiences as $index => $experience) {
            $experiences[$index] = array(
                'label' => $experience,
                'id'    => $experience
            );
        }
        foreach ($locations as $index => $location) {
            $locations[$index] = array(
                'label' => $location,
                'id'    => $location
            );
        }
        foreach ($companyTypes as $index => $companyType) {
            $companyTypes[$index] = array(
                'label' => $companyType,
                'id'    => $companyType
            );
        }

        return array(
            'experiences' => $experiences,
            'locations' => $locations,
            'companyTypes' => $companyTypes,
            'positions' => $positions,
        );
    }
}




$salaryChecker = new SalaryChecker;