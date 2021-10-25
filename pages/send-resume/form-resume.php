<?php

/**
 * Form for sending a resume.
 */

?>



<script type="text/javascript">
    jQuery(document).ready(function (e){
        jQuery("#frmContact").on('submit',(function(e){

            /*
            e.preventDefault();
            jQuery('#loader-icon').show();
            //var valid;
            //valid = validateContact();
            if(valid) {
                jQuery.ajax({
                    url: "/wp-content/themes/hays-careers/contact_send_mail.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        jQuery("#mail-status").html(data);
                        jQuery('#loader-icon').hide();
                    },
                    error: function(){}

                });
                */
            //}
        }));


    });
</script>


<section class="wj-form-wrapper form-common-on-page">
    <form id="wj-send-resume-form" class="wj-form" enctype="multipart/form-data" action="/send-resume/ok/" method="post">



        <section class="wj-form-data-fields">



                <input type="hidden" id="job_id" name="job_id" value="">
                <input type="hidden" name="apply_job_id" value="Без вакансии">

                <input type="hidden" id="job_title" name="job_title" value="Без вакансии">
                <input type="hidden" id="time" name="time" value="<?php echo date("d/m/Y H:i:s"); ?>">


                <!-- Applicant's name -->
            <div class="wj-form__field">
                <label for="applicant-name">Имя</label>
                <input required type="text" name="userName" id="userName"
                	placeholder="Введите Ваше имя" 
                	title="от 1 до 30 знаков" 
                	autocomplete="on" pattern=".{1,30}">
            </div>
            <!-- Aplicant's surname -->
            <div class="wj-form__field">
                <label for="applicant-surname">Фамилия</label>
                <input required type="text"  name="userSurName" id="userSurName"
                	placeholder="Введите Вашу фамилию" 
                	title="от 1 до 50 знаков" 
                	maxlength="20" autocomplete="on" pattern=".{1,50}">
            </div>
            <!-- Aplicant's email -->
            <div class="wj-form__field">
                <label for="applicant-email">
                    <p>E-mail</p>
                    <input required type="email" name="userEmail" id="userEmail"
                           placeholder="Введите Ваш e-mail"
                        title="в формате address@domain.ru" 
                        autocomplete="on" pattern=".{1,50}">
                        <i class="wj-icon-cm-email"></i>
                </label>
            </div>


			<?php include get_template_directory() . '/pages/send-resume/attach-resume.php'; ?>

            <!-- If the response is for the specific vacancy do not include 'sector' and 'office' fields -->
            <?php if (!isset($vacancy)): ?>
                <!-- Aplicant's sector -->
                <div class="wj-form__field">
                    <label for="applicant-sector">Сектор</label>
                    <select required name="job_industry" id="job_industry"  title="Выберите подходящий сектор">
                        <option value="">Выберите подходящий сектор</option>

                        <?php

                        $current_industry = wp_get_post_terms($edit_job_id, 'specialism', array("fields" => "all"));
                        $current_industry = $current_industry[0]->term_id;

                        $taxonomy = "specialism";

                        $terms = get_terms($taxonomy, array(
                                'order'        => 'ASC',
                                'post_type' => array('post', 'jobs'),
                                'fields' => 'all',
                                'hide_empty' => false
                            )
                        );



                        foreach($terms as $term) {
                            ?>
                            <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>

                <div class="wj-form__field">
                    <label for="applicant-sector">Офисы HAYS</label>
                    <select required name="city" id="city" title="Выберите нужный офис HAYS">
                        <option value="msk">Москва</option>
                        <option value="spb">Санкт-Петербург</option>
                    </select>
                </div>

            <?php endif ?>
            
			<?php include get_template_directory() . '/partials/forms/acceptance-checkbox.php'; ?>
        </section>
        <!-- For WP the 'action' field with my php custom AJAX handler name is must here -->
        <section>
            <input type="hidden" name="action" value="put_wp_ajax_hanler_func_here">
            <input type="hidden" name="hays-nonce" value="wp_nonce_here">
            <input class="wj-intellihide" name="wj-timehash" value="">
            <input type="hidden" name="applicant-cloudlink" v-model="cloudfile" value="null">
        </section>
        <!-- Submit button -->
        <section class="wj-form__submit-group">
            <button type="submit" id="submit-button" name="wj-send-resume-form" class="wj-btn-standard" style="background-color: #e98300;">
                <i class="wj-icon wj-icon-cr-check"></i>
                <span class="wfsg-send">Отправить</span>
                <i class="wfsg-spinner">
                    <svg class="spinner" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg"> <circle class="path" fill="none" stroke-width="12" stroke-linecap="round" cx="36" cy="36" r="30"></circle> </svg>
                </i>
            </button>
        </section>




    </form>
</section>
