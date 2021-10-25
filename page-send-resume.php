<?php get_header(); ?>
<?php
echo "<h1>Begin</h1>";
hh_get_feedbacks();
echo "<h1>The End</h1>";
//get_header();
$request = $_GET;
$filename = '';
$section = 'search';
$page = 'search';

global $request, $wpdb;

$filename = get_template_directory() . "/pages/$section/$page.php";
if ( ! is_readable( $filename ) ) {
	throw new Exception( "404. Page '$filename' not found or the request is not supported.", 1 );
}
require_once get_template_directory() . '/config.php';

use RhyApp\Temporary\AppConfig;

global $cfg;
$cfg = new AppConfig( $section );
?>


<?php
include get_template_directory() . '/partials/layout/head.php';
//include $filename;

$vacancy = ($_GET['vacancy-code']);
if ( isset( $vacancy ) ) {
	$post = get_posts( array(
		'post_status' => array( 'publish' ),
		'post_type'   => 'jobs',
		'meta_key'    => 'job_id',
		'meta_value'  => $vacancy
	) );
	//    echo "<pre>";
	//    print_r($post);
	//    echo "</pre>";

	$edit_job_id = $post[0]->ID;

	$current_id = $post[0]->ID;
}

$cons_id = isset( $_GET["cons"] ) ? absint( $_GET["cons"] ) : false;
if($cons_id > 100 or $cons_id <1) $cons_id = false; 
?>
<style>
	.footer-menu li a {
		color: #333333;
		font-weight: normal !important;
	}
</style>

<!-- Header section -->
<header class="site-header">
	<?php include get_template_directory() . '/partials/header/header.php' ?>
</header>
<!-- end Header section -->

<!--script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script-->

<?php
// Get Additional params for Custom-X-Headers
//echo $current_id;
$admin_email = get_option( 'admin_email' );
$job_manger = get_field( 'job_manager', $current_id );
$user_info = get_userdata( $job_manger );
$job_manager_email = $user_info->user_email;
$job_title = get_field( 'job_title', $current_id );
$job_type_field = get_field_object( 'job_type', $current_id );
$job_type_value = get_field( 'job_type', $current_id );
$job_type_label = $job_type_field['choices'][ $job_type_value ];

$linkedin_job_id = $current_id ? $current_id : 0;
$linkedin_company_id = "3486";
$linkedin_api_key = "75n58p50otmo6b";


?>

<?php if ( isset( $vacancy ) && ! isset( $current_id ) ) { ?>
	<!-- Check if isset Job Id -->
	<br>
	<main class="apply-content" style="min-height: 500px; background: #fff; margin-top: 0px; padding-top: 0px;">
		<br><br><br><br><br><br><br><br><br><br>

		<center><h2>Вакансии с указанным Job ID - не существует</h2></center>

	</main>
<?php } else { ?>

	<!-- Form Code -->
	<main class="blog-page-content wj-container-fixed send-resume-content-form">
		<h3><?php _e('Отправить резюме', 'hayscareers'); ?></h3>

		<?php if ( isset( $vacancy ) ): ?>
			<div class="send-vacancy-detail">
				<h4><?php echo get_field( 'job_title', $edit_job_id ); ?></h4>
				<h5>ID вакансии: <?php echo $vacancy; ?></h5><br>
				<h5>Тип позиции: <?php echo $job_type_label; ?></h5>
			</div>
		<?php endif ?>

		<section id="vm-send-resume" class="bpc-resume-wrapper send-form-content">
			<section class="wj-form-wrapper form-common-on-page">
				<div class="container">

					<div class="row">
						<div id="loader-icon" style="display:none;"><img src="/wp-content/themes/hays-careers/LoaderIcon.gif"/></div>
						<!--   onsubmit="return validation(this)"-->
						<form id="frmContact" action="" method="post" v-on:submit.prevent="_submit" onsubmit="ga('send','event','submit','resume');ym(52714453,'reachGoal','resume');fbq('trackCustom', 'resume'); return true;">

							<div id="mail-status"></div>

							<div id="formSending">
								<?php if ( isset( $vacancy ) ) { ?>
									<!-- Post Id -->
									<input type="hidden" id="job_id" name="job_id" value="<?php echo $current_id; ?>">
									<!-- Job Id -->
									<input type="hidden" name="apply_job_id" value="<?php echo get_field( 'job_id', $current_id ); ?>">
									<input type="hidden" id="admin_email" name="admin_email" value="<?php echo $admin_email; ?>">

									<input type="hidden" id="job_manager_email" name="job_manager_email" value="<?php echo $job_manager_email; ?>">
									<input type="hidden" id="job_manager_name" name="job_manager_name" value="<?php echo $job_manager_name; ?>">

									<input type="hidden" id="job_title" name="job_title" value="<?php echo $job_title; ?>">
									<input type="hidden" id="time" name="time" value="<?php echo date( "d/m/Y H:i:s" ); ?>">
									<input type="hidden" id="job_type" name="job_type" value="<?php echo $job_type_label; ?>">
									<input type="hidden" id="apply_type" name="apply_type" value="apply_job_id">

								<?php } else { ?>

									<input type="hidden" id="cons_id" name="cons_id" value="<?php echo $cons_id;?>">
									
									<input type="hidden" id="job_id" name="job_id" value="">
									<input type="hidden" name="apply_job_id" value="Без вакансии">

									<input type="hidden" id="job_title" name="job_title" value="Без вакансии">
									<input type="hidden" id="time" name="time" value="<?php echo date( "d/m/Y H:i:s" ); ?>">
									

								<?php } ?>

								<!-- Body Form -->
                                <div class="wj-form__wrap">

								<div class="wj-form__field">
									<label for="applicant-name">Имя*</label>
									<input required type="text" name="userName" id="userName" required
									       placeholder="Пожалуйста, введите имя"
									       title="от 1 до 30 знаков"
									       autocomplete="on" pattern=".{1,30}"
									       onchange="this.value=this.value.replace(/[^аА-яЯ aA-zZ ]/g,'');"

									       oninvalid="this.setCustomValidity('Пожалуйста, введите имя')" oninput="setCustomValidity('')"
											<?php echo (PERVEE_PREPROD?  " value='Test' " : ""); ?>
									>
								</div>
								<!--
								oninvalid="this.setCustomValidity('Пожалуйста, введите имя')"
								onkeyup="this.value=this.value.replace(/[^аА-яЯ aA-zZ ]/g,'');"-->

								<div class="wj-form__field">
									<label for="applicant-surname">Фамилия*</label>
									<input type="text" name="userSurName" id="userSurName" required
									       placeholder="Введите Вашу фамилию"
									       title="от 1 до 50 знаков"
									       maxlength="20" autocomplete="on" pattern=".{1,50}"
									       onchange="this.value=this.value.replace(/[^аА-яЯ aA-zZ ]/g,'');"

									       oninvalid="this.setCustomValidity('Пожалуйста, введите фамилию')" oninput="setCustomValidity('')"
											<?php echo (PERVEE_PREPROD?  " value='Test' " : ""); ?>
									>
								</div>
								<!-- onkeyup="this.value=this.value.replace(/[^аА-яЯ ][^aA-zZ ]/g,'');" -->

								<div class="wj-form__field">
									<label for="userEmail">E-mail*</label>
										<input type="email" name="userEmail" id="userEmail" required  
										       placeholder="Введите Ваш e-mail"
										       title="в формате address@domain.ru"
										       autocomplete="on" pattern=".{1,50}"
										       oninvalid="this.setCustomValidity('Пожалуйста, проверьте корретность написания email.')" oninput="setCustomValidity('')"
											   <?php echo (PERVEE_PREPROD?  " value='test@pervee.ru' " : ""); ?>
										>
								</div>


                                <div class="wj-form__field">
                                    <label for="userPhone">Телефон</label>
                                        <input type="text" name="userPhone" id="userPhone"
                                               placeholder="Введите Ваш телефон"
                                               title="в формате +7 123 456-78-90"
                                               autocomplete="on" pattern=".{1,50}"
                                               oninvalid="this.setCustomValidity('Пожалуйста, проверьте корретность номера телефона')" oninput="setCustomValidity('')"
                                            <?php echo (PERVEE_PREPROD?  " value='+7 987 234-45-23' " : ""); ?>
                                        >
                                </div>
                                    <?php if ( !isset( $vacancy ) ): ?>
                                <?php
                                $q = '
                                    select t.term_id id, t.name
                                    from '.$wpdb->terms.' t
                                    left join '.$wpdb->term_relationships.' tr on t.term_id=tr.term_taxonomy_id
                                    inner join '.$wpdb->term_taxonomy.' tt on t.term_id = tt.term_id and tt.parent=0 and tt.taxonomy="specialism"
                                    ';

                                $q .= '
                                    group by t.term_id
                                    order by name';

                                $specialism = $wpdb->get_results($q, ARRAY_A);

                                ?>

                                <div class="wj-form__field">
                                    <label for="userPhone">Профессиональная область*</label>
                                    <select name="userSpecialism" id="userSpecialism" required>
                                        <option value="">Выберите профессиональную область</option>
                                        <?php foreach ($specialism as $item) : ?>
                                            <option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> 


                        <!--        <?php

                                $spec_str = file_get_contents(TEMPLATEPATH.'/spec.txt');
                                $spec = explode("\n", $spec_str);
                                ?>

                                <div class="wj-form__field">
                                    <label for="userPhone">Профессиональная область*</label>
                                    <select name="userSpecialism" id="userSpecialism" required>
                                        <option value="">Выберите профессиональную область</option>
                                        <?php foreach ($spec as $i=>$item) : ?>
                                            <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div> -->

                                <?php
                                $q = '
                                    select p.ID `id`, pmt.meta_value `name`
                                    from '.$wpdb->posts.' p
                                    left join '.$wpdb->postmeta.' pmt on ( p.ID = pmt.post_id ) and pmt.meta_key = "job_title"
                                    where p.post_type = "jobs"
                                    AND (p.post_status = "publish" OR p.post_status = "acf-disabled")
                                ';
                                $q .= ' 
                                    group by name        
                                    order by name';

                                $all = $wpdb->get_results($q, ARRAY_A);
                                ?>

                                <div class="wj-form__field">
                                    <label for="userGrade">Желаемая должность*</label>
                                    <input type="text" name="userGrade" id="userGrade" required
                                           placeholder="Введите желаемую должность"
                                           autocomplete="on"
                                    >
                                </div>

                                <div class="wj-form__field">
                                    <label for="userIndustry">Индустрия</label>
                                    <select name="job_industry" id="userIndustry">

                                        <option value="">Выберите индустрию</option>
                                        <?php
                                        $taxonomy = "specialism";
                                        $terms = get_terms( $taxonomy, array(
                                            'order'      => 'ASC',
                                            'post_type'  => array( 'post', 'jobs' ),
                                            'fields'     => 'all',
                                            'hide_empty' => false
                                        ) );
                                        foreach ( $terms as $term ) {
                                            ?>
                                            <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <?php

                                $city_str = file_get_contents(TEMPLATEPATH.'/city.txt');
                                $city = explode("\n", $city_str);
                                ?>

                                <div class="wj-form__field">
                                    <label for="userPhone">Регион</label>
                                    <select name="city" id="city">
                                        <option value="">Выберите регион</option>
                                        <?php foreach ($city as $i=>$item) : ?>
                                            <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                    <?php endif; ?>
                                </div>
                                <?php if ( !isset( $vacancy ) ): ?>
                                <div class="wj-form__field">
                                    <label for="userPhone">Выберите тип работы*</label><br>

                                    <strong>
                                        <label for="type1"><input type="radio" name="workType" value="Perm" id="type1" checked>Постоянная</label>
                                        <label for="type2"><input type="radio" name="workType" value="Temp" id="type2">Временная работа</label>
                                        <label for="type3"><input type="radio" name="workType" value="Proj" id="type3">Проектная работа</label>
                                        <label for="type4"><input type="radio" name="workType" value="trai" id="type4">Стажировка</label>
                                    </strong>

                                </div>

                                <?php endif; ?>

                                <div class="wj-form__field">
                                    <label for="userMessage">Оставьте сопроводительное сообщение</label>
                                    <textarea name="userMessage" id="userMessage"></textarea>
                                </div>

                                <div class="wj-form__field fsr-attach-resume">
                                    <label for="applicant-surname">Прикрепите резюме*</label>
                                    <p>
                                        <small>Загрузите своё резюме в одном из форматов: .doc, .docx, .rtf, .txt, .pdf. Максимальный объем 4МБ</small>
                                    </p>

                                    <ul>
                                        <li class="file-btn">
                                            <!-- Aplicant's resume in local file -->
                                            <div id="wrap_resume_link" class="wj-form__field wj-form__field--file">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                <label for="applicant-local-file" id="resume_link">
                                                    Прикрепить файл
                                                </label>
                                                <input v-on:change="_localFile" type="file" name="applicant-local-file" id="applicant-local-file" accept=".txt,.doc,.docx,.rtf,.pdf">
                                            </div>
                                        </li>
                                    </ul>
                                    <p v-if="fileselected"><br>Прикреплен файл: <span v-text="filename" id="attachement-file"></span></p>
                                </div>

								<!-- Acceptance of personal data policy -->
								<div class="wj-form__field wj-form__field--applicant-accepted">
									<label for="applicant-accepted">
										<input type="checkbox" name="accept-terms" id="userAccept" required
										       oninvalid="this.setCustomValidity('Пожалуйста, подтвердите прочтение и принятие условий.')" oninput="setCustomValidity('')" <?php echo ((PERVEE_PREPROD )? "checked":"") ?>
										>
										<label for="userAccept">
											* Я прочитал и принимаю условия <a href="/oferta-trudoustroistvo/" target="_blank">Договора публичной оферты по содействию в трудоустройстве</a>, ознакомился с <a href="/wp-content/uploads/hays_-_private-policy.pdf" target="_blank">Политикой обработки персональных данных</a>.
										</label>
									</label>
									<label for="applicant-accepted">
										<input type="checkbox" name="accept-terms-recive" id="userAcceptInfo">
										<label for="userAcceptInfo">
											Я прочитал и принимаю <a href="/oferta-marketing/" target="_blank">условия Договора публичной оферты по осуществлению маркетинговых рассылок</a>.
										</label>
									</label>
								</div>

								<!-- Send BTN -->
								<section class="wj-form__submit-group">

									<button type="submit" id="submit-button" name="wj-send-resume-form" class="wj-btn-standard orange">
										<i class="wj-icon wj-icon-cr-check"></i>
										<span class="wfsg-send">Отправить</span>
										<i class="wfsg-spinner">
											<svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
										</i>
									</button>
								</section>
								<!-- End Send BTN -->

							</div>
						</form>

					</div>

				</div>
			</section>

		</section>
	</main>
<?php } ?>

<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script-->



<script src="<?php bloginfo( 'template_directory' ); ?>/js/vendor/bootstrap.js"></script>
<script src="<?php bloginfo( 'template_directory' ); ?>/js/plugins.js"></script>

<?php $footer_mini = true; ?>
<?php include get_template_directory() . '/partials/layout/footer.php'; ?>

<script>

	setTimeout(function () {

		console.log('Click event worked');

		var myfile = "";
		/*
				$('#resume_link').click(function( e ) {
					e.preventDefault();
					$('#applicant-local-file').trigger('click');
					console.log('click local');
				});

				$('#applicant-local-file').on( 'change', function() {
					myfile= $( this ).val();
					var ext = myfile.split('.').pop();
					//.doc, .docx, .rtf, .txt, .pdf
					if(ext=="pdf" || ext=="docx" || ext=="doc" || ext=="rtf" || ext=="txt"){
						//alert(ext);
					} else{
						alert('Выбранный файл в формате: '+ext+'.\r\n Загрузите своё резюме в одном из форматов: .doc, .docx, .rtf, .txt, .pdf.');
					}


					if( myfile.files[0].size > 500000){
						alert('Максимальный объем 500KB');
					}

				});
				*/
		console.log('Code file filter');

		// $('#frmContact').submit(function() {
		//     if($('#attachement-file').val() == ''){
		//         alert('Please fill out your initials.');
		//         return false;
		//     }
		// });

	}, 3000);
</script>