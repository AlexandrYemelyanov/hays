<?php
function cookie_manager_shortcode( $atts )
{
    ob_start();
    include get_template_directory() . '/partials/cookie-manager.php';

    return ob_get_clean();
}

global $user_id;
function get_the_user_ip()
{
    if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        //check ip from share internet
        $user_id = $_SERVER['HTTP_CLIENT_IP'];
    } elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        //to check ip is pass from proxy
        $user_id = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $user_id = $_SERVER['REMOTE_ADDR'];
    }

    return apply_filters( 'wpb_get_ip', $user_id );
}

function send_resume_form_shortcode()
{
    $vacancy = ($_GET['vacancy-code']);
    if ( isset( $vacancy ) ) {
        $post = get_posts( array(
            'post_status' => array( 'publish' ),
            'post_type'   => 'jobs',
            'meta_key'    => 'job_id',
            'meta_value'  => $vacancy
        ) );

        $edit_job_id = $post[0]->ID;

        $current_id = $post[0]->ID;
    }

    $cons_id = isset( $_GET["cons"] ) ? absint( $_GET["cons"] ) : false;
    if($cons_id > 100 or $cons_id <1) $cons_id = false;

    $admin_email = get_option( 'admin_email' );
    $job_manger = get_field( 'job_manager', $current_id );
    $user_info = get_userdata( $job_manger );
    $job_manager_email = $user_info->user_email;
    $job_title = get_field( 'job_title', $current_id );
    $job_type_field = get_field_object( 'job_type', $current_id );
    $job_type_value = get_field( 'job_type', $current_id );
    $job_type_label = $job_type_field['choices'][ $job_type_value ];

    ?>
    <h3><?php _e('Отправить резюме', 'hayscareers'); ?></h3>

    <?php if ( isset( $vacancy ) ): ?>
    <div class="send-vacancy-detail">
        <h4><?php echo get_field( 'job_title', $edit_job_id ); ?></h4>
        <h5>
            <h3><?php _e('ID вакансии:', 'hayscareers'); ?> <?php echo $vacancy; ?></h5><br>
        <h5><?php _e('Тип позиции:', 'hayscareers'); ?> <?php echo $job_type_label; ?></h5>
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
                <input type="hidden" id="job_manager_name" name="job_manager_name" value="">

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
            <div class="wj-form__field">
                <label for="applicant-name"><?php _e('Имя', 'hayscareers'); ?></label>
                <input required type="text" name="userName" id="userName" required
                       placeholder="<?php _e('Пожалуйста, введите имя', 'hayscareers'); ?>"
                       title="от 1 до 30 знаков"
                       autocomplete="on" pattern=".{1,30}"
                       onchange="this.value=this.value.replace(/[^аА-яЯ aA-zZ ]/g,'');"

                       oninvalid="this.setCustomValidity('<?php _e('Пожалуйста, введите имя', 'hayscareers'); ?>')" oninput="setCustomValidity('')"
                    <?php echo (PERVEE_PREPROD?  " value='Test' " : ""); ?>
                >
            </div>
            <!--
            oninvalid="this.setCustomValidity('Пожалуйста, введите имя')"
            onkeyup="this.value=this.value.replace(/[^аА-яЯ aA-zZ ]/g,'');"-->

            <div class="wj-form__field">
                <label for="applicant-surname"><?php _e('Фамилия', 'hayscareers'); ?></label>
                <input type="text" name="userSurName" id="userSurName" required
                       placeholder="<?php _e('Пожалуйста, введите фамилию', 'hayscareers'); ?>"
                       title="<?php _e('от 1 до 50 знаков', 'hayscareers'); ?>"
                       maxlength="20" autocomplete="on" pattern=".{1,50}"
                       onchange="this.value=this.value.replace(/[^аА-яЯ aA-zZ ]/g,'');"

                       oninvalid="this.setCustomValidity('<?php _e('Пожалуйста, введите фамилию', 'hayscareers'); ?>')" oninput="setCustomValidity('')"
                    <?php echo (PERVEE_PREPROD?  " value='Test' " : ""); ?>
                >
            </div>
            <!-- onkeyup="this.value=this.value.replace(/[^аА-яЯ ][^aA-zZ ]/g,'');" -->

            <div class="wj-form__field applicant-email-row">
                <label for="applicant-email">
                    <p>E-mail</p>
                    <input type="email" name="userEmail" id="userEmail" required
                           placeholder="Введите Ваш e-mail"
                           title="в формате address@domain.ru"
                           autocomplete="on" pattern=".{1,50}"
                           oninvalid="this.setCustomValidity('Пожалуйста, проверьте корретность написания email.')" oninput="setCustomValidity('')"
                        <?php echo (PERVEE_PREPROD?  " value='test@pervee.ru' " : ""); ?>
                    >
                    <i class="wj-icon-cm-email"></i>
                </label>
            </div>

            <?php if ( $cons_id==false){ ?>
                <div class="wj-form__field wj-form__field--applicant-accepted">

                    <p style="color: #002776;"><strong>Мы ищем специалистов не только на постоянную работу, но и на временные проекты. Хотите, чтобы ваше резюме рассматривалось в том числе и на временные проекты? Поставьте галочку ниже.</strong></p>
                    <br><input type="checkbox" name="jobtemp" id="jobtemp"> <label for="jobtemp"> Да, я хочу, чтобы моё резюме рассматривали в том числе на временные проекты.</label>


                </div>
            <?php } ?>


            <div class="fsr-attach-resume">
                <p>Прикрепите резюме</p>
                <p>Если Вы хотели бы также направить нам сопроводительное письмо, пожалуйста, включите текст письма в своё резюме.</p>
                <p>
                    <small>Загрузите своё резюме в одном из форматов: .doc, .docx, .rtf, .txt, .pdf. Максимальный объем 4МБ</small>
                </p>
                <p v-if="fileselected">Прикреплен файл: <span v-text="filename" id="attachement-file"></span></p>
                <p>
                    <small>Рекомендуемая форма резюме доступна по <a href="/appropriate-cv/" target="_blank">ссылке</a></small>
                </p>
                <ul>
                    <li><i v-if="source==='dbox'" class="wj-icon-cm-check"></i><a v-on:click.stop="_dropbox" id="wj-dropbox-button"><img src="<?php echo get_template_directory_uri() ?>/assets/img/misc/cloud/icon-dropbox.png" width="50" height="50" alt="пиктограмма DropBox">
                            <p>Dropbox</p></a></li>
                    <li><i v-if="source==='gdrive'" class="wj-icon-cm-check"></i><a v-on:click.stop="_gdrive" id="wj-gdrive-button"><img src="<?php echo get_template_directory_uri() ?>/assets/img/misc/cloud/icon-googledrive.png" width="50" height="50" alt="пиктограмма Google Drive">
                            <p>Google Drive</p></a></li>
                    <li>
                        <i v-if="source==='local'" class="wj-icon-cm-check"></i>
                        <!-- Aplicant's resume in local file -->
                        <div class="wj-form__field wj-form__field--file">
                            <label for="applicant-local-file" id="resume_link">
                                <a>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/misc/cloud/icon-hdd.png" width="50" height="50" alt="пиктограмма HDD">
                                    <p>Свой компьютер</p>
                                </a>
                            </label>
                            <input v-on:change="_localFile" type="file" name="applicant-local-file" id="applicant-local-file" accept=".txt,.doc,.docx,.rtf,.pdf">
                        </div>
                    </li>
                </ul>
            </div>

            <?php if ( !isset($vacancy) and $cons_id!=2): ?>
                <!-- Select Sector -->
                <div class="wj-form__field">
                    <label for="applicant-sector">Сфера деятельности</label>
                    <select name="job_industry" id="job_industry" title="" required
                            oninvalid="this.setCustomValidity('Пожалуйста, выберите подходящую сферу деятельности.')" oninput="setCustomValidity('')"
                    >

                        <option value="">Выберите подходящую сферу деятельности</option>
                        <?php
                        $current_industry = wp_get_post_terms( $edit_job_id, 'specialism', array( "fields" => "all" ) );
                        $current_industry = $current_industry[0]->term_id;
                        $taxonomy = "specialism";
                        $terms = get_terms( $taxonomy, array(
                            'order'      => 'ASC',
                            'post_type'  => array( 'post', 'jobs' ),
                            'fields'     => 'all',
                            'hide_empty' => false
                        ) );
                        foreach ( $terms as $term ) {
                            ?>
                            <option <?php echo ((!next($terms) and PERVEE_PREPROD )? "selected ":"") ?>value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
                <!-- End Select Sector -->

                <!-- Aplicant's office -->
                <div class="wj-form__field">
                    <label for="applicant-sector">Города</label>
                    <select name="city" id="city" title="Выберите нужный офис HAYS" required>
                        <option value="msk">Москва</option>
                        <option value="spb">Санкт-Петербург</option>
                    </select>
                </div>
                <!-- End Aplicant's office -->

            <?php endif; ?>

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

    <?php
}

function hays_postjob__stats_shortcode( $atts )
{
    extract($atts);
    ?>
<div class="stats-block">
<div class="container">
<div class="row">
    <div class="item-stat col-md-2 legend">
       Job board
    </div>
    <div class="item-stat col-md-2 legend">
       Job Title
    </div>
    <div class="item-stat col-md-2 legend">
       Data public
    </div>
    <div class="item-stat col-md-2 legend">
       Expiry Date
    </div>
    <div class="item-stat col-md-2 legend">
       Status on Job board
    </div>
    <div class="item-stat col-md-2 last legend">
       Total response
    </div>

</div>
</div>
<div class="container stats-body">
<div class="row">
    <div class="item-stat col-md-2"><?php echo get_field('site', $edit_job_id); ?></div>
    <div class="item-stat col-md-2"><?php echo get_field('job_title', $edit_job_id); ?></div>
    <div class="item-stat col-md-2"><?php echo get_the_date('j F Y в H:i', $edit_job_id); ?></div>

    <div class="item-stat col-md-2">

        <?php
            $offset = 3; echo date('Y-m-d', strtotime("+$offset months", strtotime(get_the_date('Y-m-d', $edit_job_id))));
        ?>

    </div>
    <div class="item-stat col-md-2"><?php echo get_post_status($edit_job_id); ?></div>

    <?php
        $query = new WP_Query( array( 'post_type' => 'apply', 'meta_key' => 'post_job_id', 'meta_value' => $edit_job_id ) );
    ?>
    <div class="item-stat col-md-2 last">( <?php echo $query->found_posts; ?> )</div>


</div>
</div>
</div>
<?php
}

function hays_postjob__update_form_shortcode( $atts )
{
    extract($atts);
?>
    <div class="row">
        <div class="col-md-12 legend">

            Поля отмеченные <span class="red">*</span> обязательны для заполнения

        </div>
    </div>

    <form method="post" id="update_front_form_job">

        <input type="hidden" id="action" name="action" value="save_front_form_job">

        <input type="hidden" name="job_id" value="<?php echo $_GET['job_id']; ?>">

        <!-- Тип сайта -->
        <div class="row">
            <div class="col-md-2">
                Тип сайта <span class="red">*</span>
            </div>
            <div class="col-md-10">

                <div class="item">
                    <input type="radio" name="site" value="hays" <?php if(get_field('site', $edit_job_id)=="hays"){ echo "checked"; }?><?php if(get_field('site', $edit_job_id)==""){ echo "checked"; }?>>
                    Hays.ru
                </div>
                <div class="item">
                    <input type="radio" name="site" value="hays-response" <?php if(get_field('site', $edit_job_id)=="hays-response"){ echo "checked"; }?>>
                    Hays-response.ru
                </div>

            </div>
        </div>

        <input type="hidden" name="job_language" value="ru">


        <!-- Job ID -->
        <div class="row">
            <div class="col-md-2">
                Job ID (Reference) <span class="red">*</span>
            </div>
            <div class="col-md-10">
                <?php echo $_GET['job_id']; ?>
            </div>
        </div>

        <!-- Название позиции -->
        <div class="row">
            <div class="col-md-2">
                Название позиции <span class="red">*</span>
            </div>
            <div class="col-md-10 job-title">

                <div class="col-md-11 no-padding">

                    <input type="text" name="job_title" value="<?php echo get_field('job_title', $edit_job_id); ?>">

                </div>
                <div class="col-md-1 help-block text-center">

                    <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Somthing help information for Administrator"></span>

                </div>

            </div>
        </div>

        <!-- Страна / Город -->
        <div class="row">
            <div class="col-md-2">
                Страна / Город <span class="red">*</span>

            </div>
            <div class="col-md-10 job-title location-row">


                <div class="col-md-11 no-padding">


                    <?php
                    //Returns All Term Items for "my_taxonomy"
                    $current_locations = wp_get_post_terms($edit_job_id, 'locations', array("fields" => "all"));

                    foreach($current_locations as $val){
                        if ($val->parent == 0)
                            $current_locations_country = $val->term_taxonomy_id;
                        else
                            $current_locations_city = $val->term_taxonomy_id;
                    }

                    ?>

                    <div class="form-group">
                        <select name="country" id="locations">

                            <?php

                            /** The taxonomy we want to parse */
                            $taxonomy = "locations";
                            /** Get all taxonomy terms */
                            $terms = get_terms(array(
                                'taxonomy' => 'locations',
                                "orderby"  => "name",
                                "order"    => 'asc',

                                'post_type' => array('post', 'jobs'),
                                'fields' => 'all',
                                'hide_empty' => false
                            ));
                            $a = array();
                            foreach($terms as $term){
                                if ($term->name == 'Россия')
                                    $a['_'.$term->name] = $term;
                                else
                                    $a[$term->name] = $term;
                            }
                            ksort($a);
                            $terms = $a;

                            /** Get terms that have children */
                            $hierarchy = _get_term_hierarchy($taxonomy);
                            $child = [];
                            /** Loop through every term */
                            foreach($terms as $term) {
                                //Skip term if it has children
                                if($term->parent) {
                                    $child[$term->parent][$term->term_id] = ["name" => $term->name, "selected" =>($term->term_id == $current_locations_city? "1" : "0")];
                                    continue;
                                }
                                ?>
                                <option value="<?php echo $term->term_id; ?>" <?php if($term->term_id == $current_locations_country){ echo "selected"; } ?>><?php echo $term->name; ?></option>
                                <?php

                            }
                            ?>

                        </select>
                        <script>
                            var cityes = <?php print_r(json_encode($child)); ?>;
                        </script>

                        <select name="city" id="locations_2" > <!--class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Введите первые буквы ..."-->
                            <option></option>
                        </select>
                        <div class="col-md-12 description">
                            Если Вы не можете найти город из списка, пожалуйста, укажите ближайший город из списка
                        </div>
                    </div>
                </div>
                <div class="col-md-1 help-block text-center">

                    <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Somthing help information for Administrator"></span>

                </div>

            </div>
        </div>

        <!-- Направление -->
        <div class="row">
            <div class="col-md-2">
                Направление <span class="red">*</span>

            </div>
            <div class="col-md-10 job-title title-row">

                <div class="col-md-11 no-padding">

                    <?php

                    $current_specialism = wp_get_post_terms($edit_job_id, 'specialism', array("fields" => "all"));

                    $current_specialism_0 = $current_specialism[0]->term_id;
                    $current_specialism_1 = $current_specialism[1]->term_id;
                    $current_specialism_2 = $current_specialism[2]->term_id;
                    $current_specialism_3 = $current_specialism[3]->term_id;
                    $current_specialism_4 = $current_specialism[4]->term_id;

                    ?>

                    <select name="specialism[]" class="selectpicker" multiple  data-max-options="5">

                        <?php

                        /** The taxonomy we want to parse */
                        $taxonomy = "specialism";
                        /** Get all taxonomy terms */
                        $terms = get_terms($taxonomy, array(
                                //"orderby"    => "count",

                                'post_type' => array('post', 'jobs'),
                                'fields' => 'all',
                                'hide_empty' => false
                            )
                        );
                        /** Get terms that have children */
                        $hierarchy = _get_term_hierarchy($taxonomy);
                        /** Loop through every term */
                        foreach($terms as $term) {
                            //Skip term if it has children
                            if($term->parent) {
                                continue;
                            }

                            ?>


                            <option value="<?php echo $term->term_id; ?>"

                                <?php
                                if(
                                    $term->term_id == $current_specialism_0
                                    or
                                    $term->term_id == $current_specialism_1
                                    or
                                    $term->term_id == $current_specialism_2
                                    or
                                    $term->term_id == $current_specialism_3
                                    or
                                    $term->term_id == $current_specialism_4
                                ){ echo "selected";}
                                ?>
                            ><?php echo $term->name; ?></option>




                            <?php
                        }
                        ?>


                    </select>

                </div>
                <div class="col-md-1 help-block text-center">

                    <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Somthing help information for Administrator"></span>

                </div>
                <div class="col-md-12 description">
                    Вы можете выбрать не более 5 направлений, к которым относится позиция
                </div>

            </div>
        </div>



        <!-- Индустрия компании -->
        <div class="row">
            <div class="col-md-2">
                Индустрия компании <span class="red">*</span>

            </div>
            <div class="col-md-10">

                <div class="col-md-11 no-padding">
                    <div id="dialog-window">
                        <div id="scrollable-content industry-row">
                            <?php

                            $current_industry = wp_get_post_terms($edit_job_id, 'industry', array("fields" => "all"));
                            $current_industry = $current_industry[0]->term_id;

                            /** The taxonomy we want to parse */
                            $taxonomy = "industry";
                            /** Get all taxonomy terms */
                            $terms = get_terms($taxonomy, array(
                                    'order'        => 'ASC',

                                    'post_type' => array('post', 'jobs'),
                                    'fields' => 'all',
                                    'hide_empty' => false
                                )
                            );
                            /** Get terms that have children */
                            $hierarchy = _get_term_hierarchy($taxonomy);
                            /** Loop through every term */
                            $i = 0;
                            foreach($terms as $term) {

                                if (!($i%3)){?>
                                    <div class="clearfix"></div>
                                <?php }
                                $i++;
                                //Skip term if it has children
                                if($term->parent) {
                                    continue;
                                }
                                ?>

                                <div class="col-md-4 item-industry">
                                    <input id="<?php echo $term->term_id; ?>" type="radio" name="job_industry" value="<?php echo $term->term_id; ?>"
                                        <?php if($term->term_id == $current_industry){ echo " checked";} ?>
                                    > <label for="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></label></div>


                                <?php

                                /** If the term has children... */
                                if($hierarchy[$term->term_id]) {
                                    /** display them */
                                    foreach($hierarchy[$term->term_id] as $child) {
                                        /** Get the term object by its ID */
                                        $child = get_term($child, "industry");
                                        echo '--'.$child->name;
                                        echo "<br>";
                                    }
                                }
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <div class="col-md-1 help-block text-center">

                    <span class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Somthing help information for Administrator"></span>

                </div>



            </div>
        </div>


        <!-- Тип позиции -->
        <div class="row">
            <div class="col-md-2">
                Тип позиции <span class="red">*</span>
            </div>
            <div class="col-md-10 salary-block">

                <?php

                $job_type = get_field('job_type',$edit_job_id);

                $field_key = "field_5b6c4b3568855";
                $field = get_field_object($field_key);

                if( $field )
                {
                    echo '<select name="job_type">';
                    foreach( $field['choices'] as $k => $v )
                    {
                        ?>

                        <option value="<?php echo $k; ?>" <?php if($k == $job_type){ echo " selected"; } ?>><?php echo $v; ?></option>

                        <?php
                    }
                    echo '</select>';
                }

                ?>

            </div>
        </div>


        <!-- Уровень заработной платы -->
        <div class="row">
            <div class="col-md-2">
                Уровень заработной платы <span class="red">*</span>
            </div>
            <div class="col-md-10 salary salary-block">




                <div class="col-md-3  no-padding">
                    <input
                        placeholder="введите минимальную ЗП"
                        name="job_salary_from" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="job_salary_from" value="<?php echo get_field('job_salary_from', $edit_job_id); ?>">
                </div>
                <div class="col-md-3">
                    <input
                        placeholder="введите максимальную ЗП"
                        name="job_salary_to" type="text"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="job_salary_to" value="<?php echo get_field('job_salary_to', $edit_job_id); ?>">
                </div>

                <div class="col-md-3">

                    <?php
                    $job_salary_currency = get_field('job_salary_currency',$edit_job_id);

                    $field_key = "field_5b70322771859";
                    $field = get_field_object($field_key);

                    if( $field )
                    {
                        echo '<select name="job_salary_currency">';
                        foreach( $field['choices'] as $k => $v )
                        {
                            ?>
                            <option value="<?php echo $k; ?>" <?php if($k == $job_salary_currency){ echo " selected"; } ?>><?php echo $v; ?></option>
                            <?php
                        }
                        echo '</select>';
                    }
                    ?>

                </div>

                <div class="col-md-3">

                    <?php

                    $job_salary_period = get_field('job_salary_period',$edit_job_id);
                    if(!isset($job_salary_period)){
                        $job_salary_period = 2;
                    }

                    $field_key = "field_5b6c4bccdc950";
                    $field = get_field_object($field_key);

                    if( $field )
                    {
                        echo '<select name="job_salary_period">';
                        foreach( $field['choices'] as $k => $v )
                        {

                            ?>
                            <option value="<?php echo $k; ?>" <?php if($k == $job_salary_period){ echo " selected"; } ?>><?php echo $v; ?></option>
                            <?php
                        }
                        echo '</select>';
                    }
                    ?>

                </div>
                <div class="col-md-12 description">
                    Значение заработной платы не отображается на сайте, и соискатель его не видит. Значения позволяют правильно отфильтровать позицию по уровню заработной платы на сайте.
                </div>

            </div>
        </div>

        <input name="job_salary_desc" type="hidden" value="...">

        <!-- Контактное лицо -->
        <div class="row">
            <div class="col-md-2">
                Контактное лицо <span class="red">*</span>
            </div>
            <div class="col-md-10 salary-block">

                <?php
                $post_author_id = get_post_field( 'post_author', $edit_job_id );
                //echo $post_author_id;
                $job_manger = get_field('job_manager', $edit_job_id);
                $args = array(
                    'role'    => 'author',
                    'orderby' => 'user_nicename',
                    'order'   => 'ASC'
                );
                $users = get_users( $args );

                if($job_manger==""){
                    $job_manger =  get_current_user_id();
                }

                echo '<select name="job_manger">';
                foreach ( $users as $user ) {
                    ?>

                    <option value="<?php echo $user->id?>" <?php if( $user->id == $post_author_id){ echo " selected"; } ?>><?php echo esc_html( $user->user_email ); ?></option>

                    <?php
                }
                echo '</select>';
                //}
                ?>

            </div>

        </div>



        <!-- Описание -->
        <div class="row">
            <div class="col-md-2">Описание <span class="red">*</span></div>
            <div class="col-md-10">
                <style>
                    #wp-editpost-editor-tools{
                        display: none;
                    }
                </style>
                <?php

                //$post_id = 1355;
                $post = get_post( $edit_job_id, OBJECT, 'edit' );

                $content = $post->post_content;
                $editor_id = 'editpost';

                if($content==""){
                    $content = "<h6>О компании</h6> 
<p></p>
<p></p>

<h6>Описание позиции</h6> 
<p></p>
<p></p>

<h6>Что нужно, чтобы получить позицию</h6> 
<p></p>
<p></p>

<h6>Что мы предлагаем Вам</h6> 
<p></p>
<p></p>

<h6>Что необходимо сделать прямо сейчас</h6>
<p>Если Вас заинтересовала данная позиция, нажмите кнопку \"откликнуться сейчас\" и отправьте нам свое резюме.</p>

<p>Если данная позиция не подходит Вам и Вы планируете продолжить поиск, пожалуйста, свяжитесь с нами, чтобы мы конфиденциально обсудили возможности Вашего карьерного развития.</p>";
                }
                wp_editor( $content, $editor_id );



                ?>


            </div>

        </div>


        <!-- button -->
        <div class="text-right pt10">

            <?php if( get_post_status($edit_job_id) == 'draft' ){ ?>

                <button type="button" class="btn btn-primary btn-edit-job save-draft-job-btn">Сохранить в черновик</button>

                <a href="/?post_type=jobs&p=<?php echo $edit_job_id; ?>&preview=true" class="btn btn-primary open-page-job-to-site" target="_blank" data-job_id="<?php echo $edit_job_id; ?>&show_btn_prev=1">Просмотр на сайте</a>

                <button type="button" class="btn btn-primary btn-edit-job post-job-btn">Опубликовать</button>

            <?php } ?>


            <?php if(get_post_status($edit_job_id) == 'publish' ){ ?>

                <button type="button" class="btn btn-primary btn-edit-job post-job-btn">Сохранить изменения</button>


                <a href="<?php echo home_url('/jobs/'.$_GET['job_id'].'/'); ?>" class="btn btn-primary open-page-job-to-site" target="_blank"><i class="wj-icon-cm-check"></i> Просмотреть</a>

                <button type="button" class="btn btn-primary btn-edit-job save-draft-job-btn">Снять с публикации</button>

                <?php delete_post($edit_job_id); ?>


            <?php } ?>
            <a name="public-post"></a>

        </div>

    </form>

    <br>
    <br>
    <br>
<?php
}