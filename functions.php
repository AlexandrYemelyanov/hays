<?php
function custom_mail($email) { return 'noreply@hays.ru'; }
function custom_name($email){ return 'HAYS.ru'; }
add_filter('wp_mail_from', 'custom_mail');
add_filter('wp_mail_from_name', 'custom_name');
/**
 * HAYS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package hays
 */

/**
 * Define constants for paths, globals, etc.
 */

define( 'THEMEROOT', get_template_directory_uri() );
define( 'THEME_DIST', THEMEROOT . '/dist' );

define( 'HAYS_SMTP_HOST', 'webmail.hays.ru' );
define( 'HAYS_SMTP_USERNAME', 'noreply@hays.ru' );
define( 'HAYS_SMTP_PASS', 'DLc&uQ3St' );
define( 'HAYS_SMTP_PORT', 26 );

add_action( 'init', 'setting_my_first_cookie' );

function setting_my_first_cookie() {
	setcookie( 'hays', 'user', 30 * DAY_IN_SECONDS, COOKIEPATH, COOKIE_DOMAIN );
}

//Add thumbnail support
add_theme_support( 'post-thumbnails' );

//Add menu support and register main menu
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus( array(
		'main_menu'   => 'Main Menu',
		'footer_menu' => 'Footer Tools Menu',
	) );
}

function home_page_menu_args( $args ) {
	$args['show_home'] = true;

	return $args;
}

add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

// hays_menu setup

//add_action( 'after_setup_theme', 'bootstrap_setup' );
//
//if ( ! function_exists( 'bootstrap_setup' ) ):
//
//	function bootstrap_setup(){
//
//		add_action( 'init', 'register_menu' );
//
//		function register_menu(){
//			register_nav_menu( 'top-bar', 'Bootstrap Top Menu' );
//		}
//
//
//		class hays_menu extends Walker_Nav_Menu {
//
//
//			function start_lvl( &$output, $depth ) {
//
//				$indent = str_repeat( "\t", $depth );
//				$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";
//
//			}
//
//			function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
//
//				$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
//
//				$li_attributes = '';
//				$class_names = $value = '';
//
//				$classes = empty( $item->classes ) ? array() : (array) $item->classes;
//				$classes[] = ($args->has_children) ? 'dropdown' : '';
//				$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
//				$classes[] = 'menu-item-' . $item->ID;
//
//
//				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
//				$class_names = ' class="' . esc_attr( $class_names ) . '"';
//
//				$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
//				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
//
//				$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';
//
//				$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
//				$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
//				$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
//				$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
//				$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
//
//				$item_output = $args->before;
//				$item_output .= '<a'. $attributes .'>';
//				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
//				$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
//				$item_output .= $args->after;
//
//				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
//			}
//
//			function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
//
//				if ( !$element )
//					return;
//
//				$id_field = $this->db_fields['id'];
//
//				//display this element
//				if ( is_array( $args[0] ) )
//					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
//				else if ( is_object( $args[0] ) )
//					$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
//				$cb_args = array_merge( array(&$output, $element, $depth), $args);
//				call_user_func_array(array(&$this, 'start_el'), $cb_args);
//
//				$id = $element->$id_field;
//
//				// descend only when the depth is right and there are childrens for this element
//				if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
//
//					foreach( $children_elements[ $id ] as $child ){
//
//						if ( !isset($newlevel) ) {
//							$newlevel = true;
//							//start the child delimiter
//							$cb_args = array_merge( array(&$output, $depth), $args);
//							call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
//						}
//						$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
//					}
//					unset( $children_elements[ $id ] );
//				}
//
//				if ( isset($newlevel) && $newlevel ){
//					//end the child delimiter
//					$cb_args = array_merge( array(&$output, $depth), $args);
//					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
//				}
//
//				//end this element
//				$cb_args = array_merge( array(&$output, $element, $depth), $args);
//				call_user_func_array(array(&$this, 'end_el'), $cb_args);
//			}
//		}
//
//	}
//	endif;

/*
function register_my_menu() {
  register_nav_menu('splash-menu',__( 'Splash Menu' ));
}
add_action( 'init', 'register_my_menu' );
*/

add_action( 'init', 'register_post_types' );
function register_post_types() {
	register_post_type( 'jobs', array(
		'label'               => null,
		'labels'              => array(
			'name'               => 'Вакансии', // основное название для типа записи
			'singular_name'      => 'Job', // название для одной записи этого типа
			'add_new'            => 'Add Job', // для добавления новой записи
			'add_new_item'       => 'Добавление Job', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Job', // для редактирования типа записи
			'new_item'           => 'Новое Job', // текст новой записи
			'view_item'          => 'Смотреть Jobs', // для просмотра записи этого типа.
			'search_items'       => 'Искать Jobs', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Вакансии', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => null, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array( 'title', 'editor', 'author' ), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );

	register_post_type( 'apply', array(
		'label'               => null,
		'labels'              => array(
			'name'               => 'Отклики', // основное название для типа записи
			'singular_name'      => 'Apply', // название для одной записи этого типа
			'add_new'            => 'Добавить', // для добавления новой записи
			'add_new_item'       => 'Добавление Apply', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование Apply', // для редактирования типа записи
			'new_item'           => 'Новое Apply', // текст новой записи
			'view_item'          => 'Смотреть Apply', // для просмотра записи этого типа.
			'search_items'       => 'Искать Apply', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Отклики на вакансии', // название меню
		),
		'description'         => '',
		'public'              => true,
		'publicly_queryable'  => null, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		'show_in_admin_bar'   => null, // по умолчанию значение show_in_menu
		'show_in_nav_menus'   => null, // зависит от public
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => array( 'title' ), // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array(),
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
}

/*
function job_title_taxonomy() {
    register_taxonomy(
        'job_title',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'jobs',        //post type name
        array(
            'hierarchical' => true,
            'label' => 'Jobs Title',  //Display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'job_title', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before
            )
        )
    );
}
add_action( 'init', 'job_title_taxonomy');
*/
function locations_taxonomy() {
	register_taxonomy( 'locations',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'jobs',        //post type name
		array(
			'hierarchical' => true,
			'label'        => 'Jobs locations',  //Display name
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'locations', // This controls the base slug that will display before each term
				'with_front' => false // Don't display the category base before
			)
		) );
}

add_action( 'init', 'locations_taxonomy' );

function industry_taxonomy() {
	register_taxonomy( 'industry',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'jobs',        //post type name
		array(
			'hierarchical' => true,
			'label'        => 'Jobs industry',  //Display name
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'industry', // This controls the base slug that will display before each term
				'with_front' => false // Don't display the category base before
			)
		) );
}

add_action( 'init', 'industry_taxonomy' );

function specialism_taxonomy() {
	register_taxonomy( 'specialism',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'jobs',        //post type name
		array(
			'hierarchical' => true,
			'label'        => 'Jobs specialism',  //Display name
			'query_var'    => true,
			'rewrite'      => array(
				'slug'       => 'specialism', // This controls the base slug that will display before each term
				'with_front' => false // Don't display the category base before
			)
		) );
}

add_action( 'init', 'specialism_taxonomy' );

if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page();
}

add_action( 'wp_ajax_save_front_form_job', 'save_front_form_job' );
function save_front_form_job() {
	if ( empty( $_POST['job_id'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указан job_id' ] ) );
	}
	if ( empty( $_POST['job_language'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указан Язык' ] ) );
	}
	if ( empty( $_POST['job_title'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указано Название позиции' ] ) );
	}
	if ( empty( $_POST['country'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указана Страна' ] ) );
	}
	if ( empty( $_POST['job_salary_desc'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указано Описание ЗП' ] ) );
	}
	//if (empty($_POST['job_manger']))
	//	die(json_encode(['status' => 'fail', 'mess' => 'Не указано Контактное лицо']));

	$post = get_posts( array(
		'post_status' => array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash' ),
		'numberposts' => 1,
		'post_type'   => 'jobs',
		'meta_key'    => 'job_id',
		'meta_value'  => $_POST['job_id'],
		'post_author' => $_POST['job_manger']
	) );

	if ( ! count( $post ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Запись не найдена' ] ) );
	}

	//print_r($_POST);

	$post_id = $post[0]->ID;

	wp_set_post_terms( $post_id, [ $_POST['country'], $_POST['city'] ], 'locations', false );
	wp_set_post_terms( $post_id, [ $_POST['job_industry'] ], 'industry', false );
	wp_set_post_terms( $post_id, $_POST['specialism'], 'specialism', false );

	$country = get_term_by( 'id', $_POST['country'], 'locations' );
	$city = get_term_by( 'id', $_POST['city'], 'locations' );

	update_field( 'field_5bb985695d81c', $_POST['site'], $post_id ); // сайт
	update_field( 'field_5b6e863cb5392', $_POST['job_title'], $post_id ); // титл 
	update_field( 'field_5b6e8d2a690b9', $country->name . ', ' . $city->name, $post_id ); // описание текстом локации
	update_field( 'field_5b6c4b3568855', $_POST['job_type'], $post_id ); // тип ЗП
	update_field( 'field_5b6c4baddc94e', $_POST['job_salary_from'], $post_id ); // ЗП от
	update_field( 'field_5b6c4bbcdc94f', $_POST['job_salary_to'], $post_id ); // ЗП до
	update_field( 'field_5b70322771859', $_POST['job_salary_currency'], $post_id ); // валюта
	update_field( 'field_5b6c4bccdc950', $_POST['job_salary_period'], $post_id ); // период

	if ( $_POST['job_salary_period'] == 1 ) {
		/*"name": "Годовая",*/
		if ( $_POST['job_salary_from'] >= 0 AND $_POST['job_salary_from'] <= 500000 ) {
			update_field( 'field_5b86701bebaa9', 101, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 500000 AND $_POST['job_salary_from'] <= 1000000 ) {
			update_field( 'field_5b86701bebaa9', 102, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 1000000 AND $_POST['job_salary_from'] <= 1500000 ) {
			update_field( 'field_5b86701bebaa9', 103, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 1500000 AND $_POST['job_salary_from'] <= 2000000 ) {
			update_field( 'field_5b86701bebaa9', 104, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 2000000 AND $_POST['job_salary_from'] <= 3000000 ) {
			update_field( 'field_5b86701bebaa9', 105, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 3000000 ) {
			update_field( 'field_5b86701bebaa9', 106, $post_id );
		}
	} elseif ( $_POST['job_salary_period'] == 2 ) {
		/*"name": "Месячная",*/

		if ( $_POST['job_salary_from'] >= 0 AND $_POST['job_salary_from'] <= 50000 ) {
			update_field( 'field_5b86701bebaa9', 201, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 50000 AND $_POST['job_salary_from'] <= 100000 ) {
			update_field( 'field_5b86701bebaa9', 202, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 100000 AND $_POST['job_salary_from'] <= 200000 ) {
			update_field( 'field_5b86701bebaa9', 203, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 200000 AND $_POST['job_salary_from'] <= 200000 ) {
			update_field( 'field_5b86701bebaa9', 204, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 300000 AND $_POST['job_salary_from'] <= 400000 ) {
			update_field( 'field_5b86701bebaa9', 205, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 400000 ) {
			update_field( 'field_5b86701bebaa9', 206, $post_id );
		}
	} elseif ( $_POST['job_salary_period'] == 3 ) {
		/*"name": "Дневная",*/

		if ( $_POST['job_salary_from'] >= 0 AND $_POST['job_salary_from'] <= 500 ) {
			update_field( 'field_5b86701bebaa9', 301, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 500 AND $_POST['job_salary_from'] <= 1000 ) {
			update_field( 'field_5b86701bebaa9', 302, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 1500 AND $_POST['job_salary_from'] <= 2000 ) {
			update_field( 'field_5b86701bebaa9', 303, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 2000 AND $_POST['job_salary_from'] <= 2500 ) {
			update_field( 'field_5b86701bebaa9', 304, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 2500 ) {
			update_field( 'field_5b86701bebaa9', 305, $post_id );
		}
	} elseif ( $_POST['job_salary_period'] == 4 ) {
		/*"name": "Почасовая",

			 "ranges": [
			 {
				 "name": "0 - 100",
				 "id": 401
			 },
			 {
				 "name": "100 - 150",
				 "id": 402
			 },
			 {
				 "name": "150 - 200",
				 "id": 403
			 },
			 {
				 "name": "200 - 250",
				 "id": 404
			 },
			 {
				 "name": "250 - 300",
				 "id": 405
			 },
			 {
				 "name": "300 +",
				 "id": 406
			 }]

		*/
		/*
		401         0
		402         100
		403         150
		404         200
		405         250
		406         300
		>
		*/
		if ( $_POST['job_salary_from'] >= 0 AND $_POST['job_salary_from'] <= 100 ) {
			update_field( 'field_5b86701bebaa9', 401, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 100 AND $_POST['job_salary_from'] <= 150 ) {
			update_field( 'field_5b86701bebaa9', 402, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 150 AND $_POST['job_salary_from'] <= 200 ) {
			update_field( 'field_5b86701bebaa9', 403, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 200 AND $_POST['job_salary_from'] <= 250 ) {
			update_field( 'field_5b86701bebaa9', 404, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 250 AND $_POST['job_salary_from'] <= 300 ) {
			update_field( 'field_5b86701bebaa9', 405, $post_id );
		}
		if ( $_POST['job_salary_from'] >= 300 ) {
			update_field( 'field_5b86701bebaa9', 406, $post_id );
		}
	}

	//echo $_POST['job_salary_from'];
	//echo $_POST['job_salary_to'];

	//update_field( 'field_5b6c4bccdc950', $_POST['job_salary_period'], $post_id ); // период
	//update_field( 'field_5b6f0eec5c3a6', $_POST['job_salary_desc'], $post_id ); // описание ЗП
	//update_field( 'field_5b7034972d400', $_POST['job_manger'], $post_id ); // манагер

	// описание вакансии
	wp_update_post( [
		'ID'           => $post_id,
		'post_status'  => 'publish',
		'post_content' => $_POST['editpost'],
		'post_author'  => $_POST['job_manger']
	] );

	die( json_encode( [ 'status' => 'success' ] ) );
}

add_action( 'wp_ajax_save_draft_front_form_job', 'save_draft_front_form_job' );
function save_draft_front_form_job() {
	if ( empty( $_POST['job_id'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указан job_id' ] ) );
	}
	if ( empty( $_POST['job_language'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указан Язык' ] ) );
	}
	if ( empty( $_POST['job_title'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указано Название позиции' ] ) );
	}
	if ( empty( $_POST['country'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указана Страна' ] ) );
	}
	if ( empty( $_POST['job_salary_desc'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указано Описание ЗП' ] ) );
	}
	if ( empty( $_POST['job_manger'] ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Не указано Контактное лицо' ] ) );
	}

	$post = get_posts( array(
		'post_status' => array( 'publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash' ),
		'numberposts' => 1,
		'post_type'   => 'jobs',
		'meta_key'    => 'job_id',
		'meta_value'  => $_POST['job_id'],
	) );

	if ( ! count( $post ) ) {
		die( json_encode( [ 'status' => 'fail', 'mess' => 'Запись не найдена' ] ) );
	}

	print_r( $_POST );

	$post_id = $post[0]->ID;

	wp_set_post_terms( $post_id, [ $_POST['country'], $_POST['city'] ], 'locations', false );
	wp_set_post_terms( $post_id, [ $_POST['job_industry'] ], 'industry', false );
	wp_set_post_terms( $post_id, $_POST['specialism'], 'specialism', false );

	$country = get_term_by( 'id', $_POST['country'], 'locations' );
	$city = get_term_by( 'id', $_POST['city'], 'locations' );

	update_field( 'field_5bb985695d81c', $_POST['site'], $post_id ); // Сайт
	update_field( 'field_5b6e863cb5392', $_POST['job_title'], $post_id ); // титл
	update_field( 'field_5b6e8d2a690b9', $country->name . ', ' . $city->name, $post_id ); // описание текстом локации
	update_field( 'field_5b6c4b3568855', $_POST['job_type'], $post_id ); // тип ЗП
	update_field( 'field_5b6c4baddc94e', $_POST['job_salary_from'], $post_id ); // ЗП от
	update_field( 'field_5b6c4bbcdc94f', $_POST['job_salary_to'], $post_id ); // ЗП до
	update_field( 'field_5b70322771859', $_POST['job_salary_currency'], $post_id ); // валюта
	update_field( 'field_5b6c4bccdc950', $_POST['job_salary_period'], $post_id ); // период
	update_field( 'field_5b6f0eec5c3a6', $_POST['job_salary_desc'], $post_id ); // описание ЗП
	//update_field( 'field_5b7034972d400', $_POST['job_manger'], $post_id ); // манагер

	// описание вакансии
	wp_update_post( [
		'ID'           => $post_id,
		'post_status'  => 'draft',
		'post_content' => $_POST['editpost'],
	] );

	die( json_encode( [ 'status' => 'success' ] ) );
}

add_filter( 'get_the_archive_title', function ( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>';
	}

	return $title;
} );

add_filter( 'default_content', 'my_editor_content' );
function my_editor_content( $content ) {
	$content = "<h4>О компании</h4> 
<p></p>
<p></p>

<h4>Описание позиции</h4> 
<p></p>
<p></p>

<h4>Что нужно, чтобы получить позицию</h4> 
<p></p>
<p></p>

<h4>Что мы предлагаем Вам</h4> 
<p></p>
<p></p>

<h4>Что необходимо сделать прямо сейчас</h4>
<p>Если Вас заинтересовала данная позиция, нажмите кнопку \"откликнуться сейчас\" и отправьте нам свое резюме.</p>

<p>Если данная позиция не подходит Вам и Вы планируете продолжить поиск, пожалуйста, свяжитесь с нами, чтобы мы конфиденциально обсудили возможности Вашего карьерного развития.</p>";

	return $content;
}

// Delete post
function delete_post($post_id=0) {

    if(empty($post)) {
        global $post;
        $post_id = empty($post->ID) && isset($post[0]) ? $post[0]->ID : $post->ID;
    }
    
	$deletepostlink = add_query_arg( 'frontend', 'true', get_delete_post_link( $post_id ) );
	if ( current_user_can( 'edit_post', $post_id ) ) {
		echo '<span><a class="wj-btn-standard" onclick="return confirm(\'Are you sure to delete?\')" href="' . $deletepostlink . '">Удалить</a></span>';
	}
}

//Redirect after delete post in frontend
add_action( 'trashed_post', 'trash_redirection_frontend' );
function trash_redirection_frontend( $post_id ) {
	if ( filter_input( INPUT_GET, 'frontend', FILTER_VALIDATE_BOOLEAN ) ) {
		wp_redirect( get_option( 'siteurl' ) . '/post-job/' );
		exit;
	}
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method', 11 );
function my_scripts_method() {
    wp_enqueue_style('libs', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), null);
	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js' );
	wp_enqueue_script( 'jquery' );

	wp_register_script( 'metric-events', get_template_directory_uri() . '/assets/js/metric_events.js', array( 'jquery' ), true );

	wp_enqueue_script( 'metric-events' );

    wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), null, true);
    wp_enqueue_script('select2-ru', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/i18n/ru.min.js', array('jquery'), null, true);
	wp_enqueue_script('cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js', array('jquery'), null, true);
}

function cae_scripts() {
	$ver = current_time( 'timestamp' );
	wp_enqueue_script( 'cae_js', get_template_directory_uri() . '/assets/js/cae_js.js', array( 'jquery' ), $ver, true );
	wp_localize_script( 'cae_js', 'caeajax', [ 'url' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce( 'caeajax' ) ] );
}

add_action( 'wp_enqueue_scripts', 'cae_scripts' );
add_action( 'wp_ajax_cae_favorite', 'cae_ajax_favorites_user' );
add_action( 'wp_ajax_nopriv_cae_favorite', 'cae_ajax_favorites_user' );
function cae_ajax_favorites_user() {
	$ver = current_time( 'timestamp' );
	$user['email'] = $_POST['email'];
	$user['search'] = $_POST['search'];
	$user['city'] = $_POST['city'];
	$user['time'] = $ver;
	$newSubscribe = json_encode( $user ) . PHP_EOL;

	$answer = file_put_contents( ABSPATH . 'wp-content/themes/hays-careers/newSubscribe.txt', $newSubscribe, FILE_APPEND );

	wp_die( $answer );
}



/* === Cookie management === */

function cookie_enabled( $type ) {
	return isset( $_SESSION['cookie_manager'][ $type ] ) ? $_SESSION['cookie_manager'][ $type ] : true;
}

function cookie_manager() {
	$type = isset( $_REQUEST['type'] ) ? $_REQUEST['type'] : null;
	$state = isset( $_REQUEST['state'] ) ? $_REQUEST['state'] : null;
	if ( $type ) {
		$_SESSION['cookie_manager'][ $type ] = (bool) $state;
		wp_send_json_success();
	}
}

add_action( 'wp_ajax_cookie_manager', 'cookie_manager' );
add_action( 'wp_ajax_nopriv_cookie_manager', 'cookie_manager' );

add_action( 'init', 'start_session', 1 );

function start_session() {
	if ( ! session_id() ) {
		session_start();
	}
}

add_action( 'init', 'clear_cookies', 1 );
function clear_cookies() {
	if ( cookie_enabled( 'functionality' ) ) {
		return;
	}
	if ( isset( $_SERVER['HTTP_COOKIE'] ) ) {
		$cookies = explode( ';', $_SERVER['HTTP_COOKIE'] );
		foreach ( $cookies as $cookie ) {
			$parts = explode( '=', $cookie );
			$name = trim( $parts[0] );
			// Skip PHPSESSID cookie
			if ( in_array( $name, array( 'PHPSESSID', 'cookie_notice_accepted' ) ) ) {
				continue;
			}
			setcookie( $name, '', time() - 1000 );
			setcookie( $name, '', time() - 1000, '/' );
		}
	}
}

register_nav_menus( array(
	'inworld' => 'Hays в мире',
) );

function my_login_logo() { ?>
	<style type="text/css">
		body {
			background: #fff !important;
		}

		#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/hays-logo.gif);
			height: 30px;
			width: 235px;
			background-size: 235px 30px;
			background-repeat: no-repeat;
			padding-bottom: 30px;
		}
	</style>
<?php }

add_action( 'login_enqueue_scripts', 'my_login_logo' );

add_action( 'admin_init', 'disable_dashboard' );

function disable_dashboard() {
	if ( current_user_can( 'author' ) ) {
		// wp_redirect("/post-job/?job_id=");
		//   exit;
	}
}

if ( current_user_can( 'author' ) ) {
	add_action( 'admin_menu', 'linked_url' );
	function linked_url() {
		add_menu_page( 'linked_url', 'Post Job', 'read', 'my_slug', '', 'dashicons-text', 1 );
	}

	add_action( 'admin_menu', 'linkedurl_function' );
	function linkedurl_function() {
		global $menu;
		$menu[1][2] = "/post-job/";
	}

	function remove_menus() {
		remove_menu_page( 'index.php' );                  //Dashboard
		remove_menu_page( 'jetpack' );                    //Jetpack*
		remove_menu_page( 'edit.php' );                   //Posts
		remove_menu_page( 'upload.php' );                 //Media

		remove_menu_page( 'edit-comments.php' );          //Comments
		remove_menu_page( 'themes.php' );                 //Appearance
		remove_menu_page( 'plugins.php' );                //Plugins
		remove_menu_page( 'users.php' );                  //Users
		remove_menu_page( 'tools.php' );                  //Tools
		remove_menu_page( 'options-general.php' );        //Settings
		remove_menu_page( 'admin.php?page=acf-options' );        //Settings
		remove_menu_page( 'edit.php?post_type=apply' );        //Settings
		remove_menu_page( 'edit.php?post_type=jobs' );    //Pages

		echo "<style>#toplevel_page_acf-options, #toplevel_page_wpcf7, #wp-admin-bar-new-content, #wp-admin-bar-comments, #wp-admin-bar-wp-logo{display: none;}</style>";
	}

	add_action( 'admin_menu', 'remove_menus' );
}

// Function to change email address

// function wpb_sender_email( $original_email_address ) {
//     return 'infor@hays.ru';
// }

// // Function to change sender name
function wpb_sender_name( $original_email_from ) {
	return 'Hays.ru';
}

// Hooking up our functions to WordPress filters
// add_filter( 'wp_mail_from', 'wpb_sender_email' );
// add_filter( 'wp_mail_from_name', 'wpb_sender_name' );

add_action( 'after_setup_theme', 'remove_admin_bar' );

function remove_admin_bar() {
	if ( ! current_user_can( 'administrator' ) ) {
		show_admin_bar( false );
	}
}



/**
 * Custom Nav Classes
 * https://v123.tw
 */
add_filter( 'nav_menu_css_class', 'v123_nav_class', 10, 2 );
function v123_nav_class( $classes, $item ) {
	if ( in_array( 'menu-item-has-children', $classes ) ) {
		$classes[] = 'smm-submenu';
	}

	return $classes;
}
 
function send_xml_to_ftp() {
	 
	//var_dump( '<div hidden>hello world</div>' );
	$wpb_all_query = new WP_Query( array( 'post_type' => 'jobs', 'post_status' => 'publish', 'posts_per_page' => -1 ) );
	 
	//header("Content-Type: application/xml; charset=utf-8");

	$xmlDoc = new DOMDocument( '1.0', 'utf-8' );
	$jobs_xml = $xmlDoc->appendChild( $xmlDoc->createElement( "source" ) );

	$xmlDoc->formatOutput = true;

	$job = $jobs_xml->appendChild( $xmlDoc->createElement( "publisher", get_bloginfo( 'name' ) ) );

	$job = $jobs_xml->appendChild( $xmlDoc->createElement( "publisherurl", get_bloginfo( 'url' ) ) );

	// $job = $jobs_xml->appendChild(
	//     $xmlDoc->createElement("lastBuildDate", 'Fri, 10 Dec 2008 22:49:39 GMT'));
	
	 
	logTxt("Подготавливаю файл", "xmltoftp");
	
	while ( $wpb_all_query->have_posts() ) {
		$wpb_all_query->the_post();
		
		$item = get_post( get_the_ID() );
		$country = '';
		$city = '';
		$industry = '';
		$category = '';
		$direct_url = get_permalink( $item->ID ) . '?jobSource=XMLFeed';

		$field = get_field_object( 'job_type', $item->ID );
		$value = get_field( 'job_type', $item->ID );
		$label = $field['choices'][ $value ];
		$meta = get_post_meta( $item->ID, '', true );
		$desc = $item->post_content;

		$user = get_userdata( $meta['job_manager'][0] );
		
		$tmpArr = get_the_terms( $item->ID, 'locations' );
		if( is_array( $tmpArr ) ){
			foreach ( $tmpArr as $loc ) {
				if ( $loc->parent ) {
					$city = $loc->name;
				} else {
					$country = strtoupper( $loc->slug );
				}
			}
		}
		$tmpArr = get_the_terms( $item->ID, 'specialism' );
		if( is_array( $tmpArr ) ){
			foreach ( $tmpArr as $i => $loc ) {
				$space = ( count( get_the_terms( $item->ID, 'specialism' ) ) > $i + 1 ? ' ' : '' );
				$category .= ' ' . $loc->name . $space;
			}
		}
		
		$tmpArr = get_the_terms( $item->ID, 'industry' );
		if( is_array( $tmpArr ) ){
			foreach (  $tmpArr as $i => $loc ) {
				$space = ( get_the_terms( $item->ID, 'industry' ) > $i + 1 ? ' ' : '' );
				$industry .= $loc->name . $space;
			}
		}

		$job = $jobs_xml->appendChild( $xmlDoc->createElement( "job" ) );

		$job->appendChild( $xmlDoc->createElement( "title", htmlspecialchars( $meta['job_title'][0] ) ) //$xmlDoc->createElement("title", $meta['job_title'][0])
		);

		$job->appendChild( $xmlDoc->createElement( "date", get_the_date( 'd/m/Y  H:i:s', $item->id ) ) );

		$job->appendChild( $xmlDoc->createElement( "referencenumber", $meta['job_id'][0] ) );

		$job->appendChild( $xmlDoc->createElement( "url", $direct_url ) );

		$job->appendChild( $xmlDoc->createElement( "company", '' ) );

		$job->appendChild( $xmlDoc->createElement( "city", $city ) );

		$job->appendChild( $xmlDoc->createElement( "state", '' ) );

		$job->appendChild( $xmlDoc->createElement( "country", $country ) );

		$job->appendChild( $xmlDoc->createElement( "postalcode", '' ) );

		$cdata = $xmlDoc->createCDATASection( $desc );
		$description = $job->appendChild( $xmlDoc->createElement( "description" ) );
		$description->appendChild( $cdata );

		$job->appendChild( $xmlDoc->createElement( "salary", '' ) );

		$job->appendChild( $xmlDoc->createElement( "education", '' ) );

		$job->appendChild( $xmlDoc->createElement( "jobtype", $label ) );

		$job->appendChild( $xmlDoc->createElement( "category", $category . ' ' . $industry ) );

		$job->appendChild( $xmlDoc->createElement( "experience", '' ) );

		// $job->appendChild(
		//     $xmlDoc->createElement("ContactEmail", $user->user_email));

		//  $job->appendChild(
		//      $xmlDoc->createElement("ModifyDate", get_the_modified_date('d/m/Y  H:i:s',$item->id)));

		/**/
	}
	 
	$str = $xmlDoc->saveXML();
	logTxt("saveXML", "xmltoftp");
	
	$dir = wp_get_upload_dir();
	$dir = $dir['path'];
	$filename = $dir . '/xml_upload_to_ftp.xml';
	file_put_contents( $filename, $str );
	//logTxt("file_put_contents", "xmltoftp");
	
	$fp = fopen( $filename, 'r' );
	logTxt("fopen", "xmltoftp");
	$ch = curl_init();
	
	curl_setopt( $ch, CURLOPT_URL, 'ftp://hays:H4y$S0lut10n@hays.nazwa.pl/' . '/RussiaJo.xml' );
	curl_setopt( $ch, CURLOPT_UPLOAD, 1 );
	curl_setopt( $ch, CURLOPT_INFILE, $fp );
	curl_setopt( $ch, CURLOPT_INFILESIZE, filesize( $filename ) );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	
	$content = curl_exec( $ch );
	logTxt("curl_exec", "xmltoftp");
	
	if ( curl_errno( $ch ) ) {
		logTxt('File upload error: '. curl_error( $ch ), "xmltoftp");
	} else {
		logTxt("File uploaded", "xmltoftp");
	}
	curl_close( $ch );
	//unlink( $filename );
}

function create_jobs_yml() {
    $xmlDoc = new DOMDocument( '1.0', 'utf-8' );
    $xmlDoc->formatOutput = true;

    $yml_catalog = $xmlDoc->appendChild( $xmlDoc->createElement( "yml_catalog" ) );
    $yml_catalog->setAttribute("date", date('Y-m-d H:i'));
    $shop = $yml_catalog->appendChild( $xmlDoc->createElement( "shop" ) );

    $shop->appendChild( $xmlDoc->createElement( "name" , "HAYS" ) );
    $shop->appendChild( $xmlDoc->createElement( "company" , "https://www.hays.ru/" ) );

    //--- Categories
    $industry = get_terms( [
        'taxonomy' => 'industry',
        'hide_empty' => false,
    ]);
    $categories = $shop->appendChild( $xmlDoc->createElement( "categories" ) );
    foreach ($industry as $item) {
        $category = $categories->appendChild( $xmlDoc->createElement( "category" , $item->name ) );
        $category->setAttribute("id", $item->name);
    }

    //--- Offers
    $offers = $shop->appendChild( $xmlDoc->createElement( "offers" ) );
    $wpb_all_query = new WP_Query( array( 'post_type' => 'jobs', 'post_status' => 'publish', 'posts_per_page' => -1 ) );
    while ( $wpb_all_query->have_posts() ) {
        $wpb_all_query->the_post();

        $item = get_post( get_the_ID() );
        $country = '';
        $city = '';
        $industry = '';
        $category = '';
        $direct_url = get_permalink( $item->ID );

        $field = get_field_object( 'job_type', $item->ID );
        $value = get_field( 'job_type', $item->ID );
        $label = $field['choices'][ $value ];
        $meta = get_post_meta( $item->ID, '', true );
        $desc = $item->post_content;

        $tmpArr = get_the_terms( $item->ID, 'locations' );
        if( is_array( $tmpArr ) ){
            foreach ( $tmpArr as $loc ) {
                if ( $loc->parent ) {
                    $city = $loc->name;
                } else {
                    $country = strtoupper( $loc->slug );
                }
            }
        }
        $tmpArr = get_the_terms( $item->ID, 'specialism' );
        if( is_array( $tmpArr ) ){
            $category = $tmpArr[0]->name;
        }

        $tmpArr = get_the_terms( $item->ID, 'industry' );
        if( is_array( $tmpArr ) ){
            $industry = $tmpArr[0]->name;
        }

        $job = $offers->appendChild( $xmlDoc->createElement( "offer" ) );
        $job->setAttribute("available", "true");
        $job->setAttribute("id", $meta['job_id'][0]);

        $job->appendChild( $xmlDoc->createElement( "categoryId", $industry ) );
        $job->appendChild( $xmlDoc->createElement( "url", $direct_url ) );
        $job->appendChild( $xmlDoc->createElement( "name",  htmlspecialchars( $meta['job_title'][0] ) ) );
        $job->appendChild( $xmlDoc->createElement( "direction", $category ) );
        $job->appendChild( $xmlDoc->createElement( "typeposition", $label ) );
        $job->appendChild( $xmlDoc->createElement( "city", $city ) );
        $job->appendChild( $xmlDoc->createElement( "number", $meta['job_id'][0] ) );

        $cdata = $xmlDoc->createCDATASection( $desc );
        $description = $job->appendChild( $xmlDoc->createElement( "descriptionposition" ) );
        $description->appendChild( $cdata );

        $job->appendChild( $xmlDoc->createElement( "urlforma", "https://hays.ru/send-resume/?vacancy-code=".$meta['job_id'][0] ) );
    }

    $str = $xmlDoc->saveXML();
    $dir = wp_get_upload_dir();
    $filename = $dir['path'] . '/job_hays.xml';
    file_put_contents( $filename, $str );
}

function create_articles_yml() {
    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/cron.log', date('d.m.y H:i:s').' cron srart');

    $xmlDoc = new DOMDocument( '1.0', 'utf-8' );
    $xmlDoc->formatOutput = true;

    $yml_catalog = $xmlDoc->appendChild( $xmlDoc->createElement( "yml_catalog" ) );
    $yml_catalog->setAttribute("date", date('Y-m-d H:i'));
    $shop = $yml_catalog->appendChild( $xmlDoc->createElement( "shop" ) );

    $shop->appendChild( $xmlDoc->createElement( "name" , "HAYS" ) );
    $shop->appendChild( $xmlDoc->createElement( "company" , "https://www.hays.ru/" ) );

    //--- Categories
    $categories = $shop->appendChild( $xmlDoc->createElement( "categories" ) );

    $post = get_post( 9359, ARRAY_A);
    $category = $categories->appendChild( $xmlDoc->createElement( "category" , $post['post_title'] ) );
    $category->setAttribute("id", $post['ID']);
    $category->setAttribute("url", get_permalink( $post['ID'] ));

    $post = get_post( 43002, ARRAY_A);
    $category = $categories->appendChild( $xmlDoc->createElement( "category" , $post['post_title'] ) );
    $category->setAttribute("id", $post['ID']);
    $category->setAttribute("url", get_permalink( $post['ID'] ));
    $category->setAttribute("parentId", 9359);

    //--- Offers
    $offers = $shop->appendChild( $xmlDoc->createElement( "offers" ) );
    $wpb_all_query = new WP_Query( array( 'post_parent' => 9359, 'post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => -1 ) );
    while ( $wpb_all_query->have_posts() ) {
        $wpb_all_query->the_post();

        $item = get_post( get_the_ID() );
        $direct_url = get_permalink( $item->ID );

        $job = $offers->appendChild( $xmlDoc->createElement( "offer" ) );
        $job->setAttribute("available", "true");
        $job->setAttribute("id", $item->ID);

        $job->appendChild( $xmlDoc->createElement( "categoryId", 9359 ) );
        $job->appendChild( $xmlDoc->createElement( "url", $direct_url ) );
        $job->appendChild( $xmlDoc->createElement( "name",  $item->post_title ) );

        $cdata = $xmlDoc->createCDATASection( $item->post_content );
        $description = $job->appendChild( $xmlDoc->createElement( "description" ) );
        $description->appendChild( $cdata );
    }

    $wpb_all_query = new WP_Query( array( 'post_parent' => 43002, 'post_type' => 'page', 'post_status' => 'publish', 'posts_per_page' => -1 ) );
    while ( $wpb_all_query->have_posts() ) {
        $wpb_all_query->the_post();

        $item = get_post( get_the_ID() );
        $direct_url = get_permalink( $item->ID );

        $job = $offers->appendChild( $xmlDoc->createElement( "offer" ) );
        $job->setAttribute("available", "true");
        $job->setAttribute("id", $item->ID);

        $job->appendChild( $xmlDoc->createElement( "categoryId", 43002 ) );
        $job->appendChild( $xmlDoc->createElement( "url", $direct_url ) );
        $job->appendChild( $xmlDoc->createElement( "name",  $item->post_title ) );

        $cdata = $xmlDoc->createCDATASection( $item->post_content );
        $description = $job->appendChild( $xmlDoc->createElement( "description" ) );
        $description->appendChild( $cdata );
    }

    $str = $xmlDoc->saveXML();
    $dir = wp_get_upload_dir();
    $filename = $dir['path'] . '/articles_hays.xml';
    file_put_contents( $filename, $str );
}

function create_blog_yml() {
    // Рубрики блога
    $rubrics = [601,617,619,623,1,620,624,628,409,621,629,590,592,622,593,594,595,591];

    file_put_contents($_SERVER['DOCUMENT_ROOT'].'/cron.log', date('d.m.y H:i:s').' cron srart');

    $xmlDoc = new DOMDocument( '1.0', 'utf-8' );
    $xmlDoc->formatOutput = true;

    $yml_catalog = $xmlDoc->appendChild( $xmlDoc->createElement( "yml_catalog" ) );
    $yml_catalog->setAttribute("date", date('Y-m-d H:i'));
    $shop = $yml_catalog->appendChild( $xmlDoc->createElement( "shop" ) );

    $shop->appendChild( $xmlDoc->createElement( "name" , "HAYS" ) );
    $shop->appendChild( $xmlDoc->createElement( "company" , "https://www.hays.ru/" ) );

    //--- Categories
    $categories = $shop->appendChild($xmlDoc->createElement("categories"));
    foreach ($rubrics as $cat_id) {

        $category = $categories->appendChild($xmlDoc->createElement("category", get_cat_name($cat_id)));
        $category->setAttribute("id", $cat_id);
        $category->setAttribute("url", "https://www.hays.ru/blog/");
        $parent = wp_get_term_taxonomy_parent_id( $cat_id, 'category' );
        if( $parent ) {
            $category->setAttribute("parentId", $parent);
        }

    }

    //--- Offers
    $offers = $shop->appendChild( $xmlDoc->createElement( "offers" ) );
    foreach ($rubrics as $cat_id) {


        $wpb_all_query = new WP_Query([
            'post_status' => 'publish',
            'tax_query' => [
                [
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $cat_id
                ]
            ]

        ]);

        while ($wpb_all_query->have_posts()) {
            $wpb_all_query->the_post();

            $item = get_post(get_the_ID());
            $direct_url = get_permalink($item->ID);

            $job = $offers->appendChild($xmlDoc->createElement("offer"));
            $job->setAttribute("available", "true");
            $job->setAttribute("id", $item->ID);

            $job->appendChild($xmlDoc->createElement("categoryId", $cat_id));
            $job->appendChild($xmlDoc->createElement("name", $item->post_title));
            $job->appendChild($xmlDoc->createElement("url", $direct_url));
            $picture = get_the_post_thumbnail_url($item->ID);
            if( $picture ) {
                $job->appendChild($xmlDoc->createElement("picture", $picture));
            }

            $job->appendChild($xmlDoc->createElement("datenews", get_the_date('d.m.Y',$item->ID)));

            $cdata = $xmlDoc->createCDATASection($item->post_content);
            $description = $job->appendChild($xmlDoc->createElement("descriptionnews"));
            $description->appendChild($cdata);
        }

    }



    $str = $xmlDoc->saveXML();
    $dir = wp_get_upload_dir();
    $filename = $dir['path'] . '/blog_hays.xml';
    file_put_contents( $filename, $str );
}


/**
 * Функция похожие вакансии
 * Rodin, 19.11.2018
 */
function simular_vacancies( $current_job_id ) {
	$post__not_in[] = $current_job_id;
	$job_title = get_field( 'job_title', $current_job_id );
	$locations = get_the_terms( $current_job_id, 'locations' );
	if ( $locations ) {
		foreach ( $locations as $v ) {
			$location[] = $v->term_id;
		}
	}
	$industrys = get_the_terms( $current_job_id, 'industry' );
	if ( $industrys ) {
		foreach ( $industrys as $v ) {
			$industry[] = $v->term_id;
		}
	}
	$job_salary_from = get_field( 'job_salary_from', $current_job_id );
	$job_salary_to = get_field( 'job_salary_to', $current_job_id );

	$args = array(
		'post_type'        => 'jobs',
		'post__not_in'     => $current_job_id,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'suppress_filters' => false,
		'tax_query'        => array(
			'relation' => 'AND',
			array(
				'taxonomy' => 'locations',
				'field'    => 'term_id',
				'terms'    => $location,
			),
			array(
				'taxonomy' => 'industry',
				'field'    => 'term_id',
				'terms'    => $industry,
			)
		),
		'meta_query'       => array(
			'relation' => 'AND',
			array(
				'key'     => 'job_salary_from',
				'value'   => $job_salary_from,
				'compare' => '>='
			),
			array(
				'key'     => 'job_salary_to',
				'value'   => $job_salary_to,
				'compare' => '<='
			),
			array(
				'key'     => 'job_title',
				'value'   => $job_title,
				'compare' => 'LIKE'
			)
		),
		'posts_per_page'   => 5,
	);
	$query = new WP_Query( $args );
	$AllQuery = $query->posts;

	if ( count( $AllQuery ) < 5 ) {
		foreach ( $AllQuery as $item ) {
			$post__not_in[] = $item->ID;
		}
		wp_reset_query();
		wp_reset_postdata();
		$args = array(
			'post_type'        => 'jobs',
			'post__not_in'     => $post__not_in,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'suppress_filters' => false,
			'tax_query'        => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'locations',
					'field'    => 'term_id',
					'terms'    => $location,
				),
				array(
					'taxonomy' => 'industry',
					'field'    => 'term_id',
					'terms'    => $industry,
				)
			),
			'meta_query'       => array(
				'relation' => 'AND',
				array(
					'key'     => 'job_salary_from',
					'value'   => $job_salary_from,
					'compare' => '>='
				),
				array(
					'key'     => 'job_salary_to',
					'value'   => $job_salary_to,
					'compare' => '<='
				)
			),
			'posts_per_page'   => 5 - count( $AllQuery )
		);
		$query = new WP_Query( $args );
		$AllQuery = array_merge( $AllQuery, $query->posts );
	}
	if ( count( $AllQuery ) < 5 ) {
		foreach ( $AllQuery as $item ) {
			$post__not_in[] = $item->ID;
		}
		wp_reset_query();
		wp_reset_postdata();
		$args = array(
			'post_type'        => 'jobs',
			'post__not_in'     => $post__not_in,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'suppress_filters' => false,
			'tax_query'        => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'locations',
					'field'    => 'term_id',
					'terms'    => $location,
				),
				array(
					'taxonomy' => 'industry',
					'field'    => 'term_id',
					'terms'    => $industry,
				)
			),
			'meta_query'       => array(
				'relation' => 'OR',
				array(
					'key'     => 'job_salary_from',
					'value'   => $job_salary_from,
					'compare' => '>='
				),
				array(
					'key'     => 'job_salary_to',
					'value'   => $job_salary_to,
					'compare' => '<='
				)
			),
			'posts_per_page'   => 5 - count( $AllQuery )
		);
		$query = new WP_Query( $args );
		$AllQuery = array_merge( $AllQuery, $query->posts );
	}
	if ( count( $AllQuery ) < 5 ) {
		foreach ( $AllQuery as $item ) {
			$post__not_in[] = $item->ID;
		}
		wp_reset_query();
		wp_reset_postdata();
		$args = array(
			'post_type'        => 'jobs',
			'post__not_in'     => $post__not_in,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'suppress_filters' => false,
			'tax_query'        => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'locations',
					'field'    => 'term_id',
					'terms'    => $location,
				),
				array(
					'taxonomy' => 'industry',
					'field'    => 'term_id',
					'terms'    => $industry,
				)
			),
			'posts_per_page'   => 5 - count( $AllQuery )
		);
		$query = new WP_Query( $args );
		$AllQuery = array_merge( $AllQuery, $query->posts );
	}
	if ( count( $AllQuery ) < 5 ) {
		foreach ( $AllQuery as $item ) {
			$post__not_in[] = $item->ID;
		}
		wp_reset_query();
		wp_reset_postdata();
		$args = array(
			'post_type'        => 'jobs',
			'post__not_in'     => $post__not_in,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'suppress_filters' => false,
			'tax_query'        => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'locations',
					'field'    => 'term_id',
					'terms'    => $location,
				)
			),
			'posts_per_page'   => 5 - count( $AllQuery )
		);
		$query = new WP_Query( $args );
		$AllQuery = array_merge( $AllQuery, $query->posts );
	}
	if ( count( $AllQuery ) < 5 ) {
		foreach ( $AllQuery as $item ) {
			$post__not_in[] = $item->ID;
		}
		wp_reset_query();
		wp_reset_postdata();
		$args = array(
			'post_type'        => 'jobs',
			'post__not_in'     => $post__not_in,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'suppress_filters' => false,
			'tax_query'        => array(
				'relation' => 'AND',
				array(
					'taxonomy' => 'industry',
					'field'    => 'term_id',
					'terms'    => $industry,
				)
			),
			'posts_per_page'   => 5 - count( $AllQuery )
		);
		$query = new WP_Query( $args );
		$AllQuery = array_merge( $AllQuery, $query->posts );
	}

	//echo (count($AllQuery));
	return $AllQuery;
} //end function 

function logTxt( $text, $file ) {
	$fp2 = fopen( "/var/www/html/" . "$file-log.txt", 'a' );
	fwrite( $fp2,  date( "Y-m-d H:i:s", strtotime("+3 hours")) . ' ' . $text . PHP_EOL );
	fclose( $fp2 );
}

require 'includes/utils.php';
require 'includes/shortcodes.php';
require 'includes/cron-events.php';
require 'includes/admin-actions.php';
require 'includes/admin-options.php';
require 'includes/subscribe.php';
require 'includes/hooks.php';
require 'includes/send-resume/ajax.php';
require 'includes/log.php';


function icl_post_languages() {
	//$languages = icl_get_languages( 'skip_missing=0&orderby=code' );
    $languages = '';
	if ( ! empty( $languages ) ) {
		$list = '';
		$missing = true;
		foreach ( $languages as $l ) {
			if ( isset($l['missing']) && $l['missing'] == 1 ) {
				$missing = false;
			}
			$list .= '<li>';
			if ( $l['country_flag_url'] ) {
				if ( ! $l['active'] ) {
					$list .= '<a href="' . $l['url'] . '">';
				}
				$list .= '<img src="' . $l['country_flag_url'] . '" height="12" alt="' . $l['language_code'] . '" width="18" />';
				if ( ! $l['active'] ) {
					$list .= '</a>';
				}
			}
			if ( ! $l['active'] ) {
				$list .= '<a href="' . $l['url'] . '">';
			}
			// echo icl_disp_language($l['native_name'], $l['translated_name']);
			if ( ! $l['active'] ) {
				$list .= '</a>';
			}
			$list .= '</li>';
		}
		if ( $missing ) {
			echo $list;
		}
	}
}


function display_simular_post($atts){
    // Получаем значения атрибутов
    // если значения не были указаны определяем свои
	$all_categories = get_the_category();
	$category_id = $all_categories[0]->cat_ID;
    // extract( shortcode_atts( array(
        // 'numberofpost' => '15', // количество запрашиваемых записей
        // 'categoryid' => $category_id, // id категории
    // ), $atts ) );
    // формируем текст запроса
    $querystring = 'posts_per_page='.$numberofpost;
	//$querystring .= '&post__not_in='.get_the_ID();
    if(strlen($categoryid) > 0)
        $querystring .= '&cat='.$categoryid;
	
	 
	
	$category_id = get_the_category()[count(get_the_category())-1]->term_id;
	$queryarr = array(
		'cat' => $category_id,
		'post__not_in' => array(get_the_ID()),
		'posts_per_page' => $numberofpost,
		//'meta_key'  => 'avada_post_views_count',
		//'meta_value_num' => array('avada_post_views_count'),
		'orderby' => 'meta_value_num',
		'order' => 'DESC'
	);
    // выполняем запрос
    $query = new WP_Query( $queryarr );
	//$wp_query = add_query_meta($query);
    // объявляем переменную для возврата
    $result = '<ul id="display_post"> ';
    // Цикл, пока есть записи
	$i=0;
    while ( $query->have_posts() ) : $query->the_post();
		$i++;
		 
		// Check if the custom field has a value.
		// if ( ! empty( $key_1_value ) ) {
			// echo $key_1_value;
		// }	 
        
		// формируем список
        $result.= '<a class="dlp" href="'.get_permalink().'"><li>'.get_the_post_thumbnail( get_the_ID(), array(300,300) );
        //$result.= '<a class="dlp" onClick="_gaq.push([\'_trackEvent\', \'Slider post\', \''.$_SERVER['REQUEST_URI'].'\', \''.get_permalink().'\', \''.$i.'\'])"  href="'.get_permalink().'">'.get_the_title().'</a>';
		//$result.= '<a class="dlp" href="'.get_permalink().'">'.get_the_title().'</a>';
		//$result.= "$category_id  / $i / $key_1_value / ";
		$result.= "".get_the_title().'';
        $result.= '</li></a>';
    endwhile;
	$result.= '</ul>';
    // После цикла, восстанавливаем текущую запись в $post
    wp_reset_postdata();
 
    // Возвращаем результат - список
    return $result;
}


add_action('wp_ajax_career_send_grade_site', 'career_send_grade_site');
add_action('wp_ajax_nopriv_career_send_grade_site', 'career_send_grade_site');
function career_send_grade_site()
{
	global $wpdb;
	$rate = (int)$_POST['rate'];
	$comment = strip_tags($_POST['recom']);

	if (!empty($rate) || !empty($comment)) {
		//$mess = !empty($rate) ? '<p>Оценка: '.$rate.'</p>' : '';
		///$mess .= !empty($comment) ? '<p>Рекомендации: '.$comment.'</p>' : '';

		global $wpdb;
		$wpdb->query("INSERT INTO `wp_career_grade_site` (`rate`, `comment`) VALUES ('".$rate."', '".$comment."')");

		//echo wp_mail("mahteev@pervee.ru", 'Оценка сайта', $mess ) ? 'sended' : 'error';
	}
}

require_once (get_template_directory() . '/shortcodes/index.php');

require_once (get_template_directory() . '/api/hh/index.php');