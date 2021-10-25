<?php

/**
 * Vacancy details widget seen on sinigle Vacancy page.
 */


//echo get_the_ID();
?>

<div class="cpc-widget">
	<h6>Ключевая информация</h6>
	<ul class="cpc-widget__vacancy-details-list">
        <li>
            <p>Тип позиции</p>
            <?php
            $job_type_field = get_field_object('job_type',get_the_ID());
            $job_type_value = get_field('job_type',get_the_ID());
            $job_type_label = $job_type_field['choices'][ $job_type_value ];
            ?>

            <p><em><?php echo $job_type_label; ?></em></p>
        </li>


        <?php
        $current_industry = wp_get_post_terms(get_the_ID(), 'industry', array("fields" => "all"));
        //var_dump($current_industry);
        ?>
        <li>
            <p>Индустрия</p>
            <p><em><?php echo $current_industry[0]->name; ?></em></p>
        </li>


        <?php
        $current_locations = wp_get_post_terms(get_the_ID(), 'locations', array("fields" => "all"));
        //                                        echo "<pre>";
        //                                        print_r($current_locations);
        //                                        echo "</pre>";
        //
        //                                        echo get_the_ID();
        ?>
        <li>
            <p>Город</p>
            <p><em><?php echo $current_locations[1]->name; ?></em></p>
        </li>


        <?php
        $current_specialism = wp_get_post_terms(get_the_ID(), 'specialism', array("fields" => "all"));
        //var_dump($current_industry);
        ?>
        <li>
            <p>Направление</p>
            <p><em>

                    <?php echo $current_specialism[0]->name; ?>
                    <?php if($current_specialism[1]->name!=""){ ?>, <?php echo $current_specialism[1]->name; ?><?php } ?>
                    <?php if($current_specialism[2]->name!=""){ ?>, <?php echo $current_specialism[2]->name; ?><?php } ?>
                    <?php if($current_specialism[3]->name!=""){ ?>, <?php echo $current_specialism[3]->name; ?><?php } ?>
                    <?php if($current_specialism[4]->name!=""){ ?>, <?php echo $current_specialism[4]->name; ?><?php } ?>

                </em></p>
        </li>

		<li>
			<p>Номер</p>
			<p><em><?php echo get_field('job_id'); ?></em></p>
            <br>
		</li>

        <?php /*
        <?php
        $public_date = get_the_date('Y-m-d H:m:s');
        $monthes = array(
            1 => 'Января', 2 => 'Февраля', 3 => 'Марта', 4 => 'Апреля',
            5 => 'Мая', 6 => 'Июня', 7 => 'Июля', 8 => 'Августа',
            9 => 'Сентября', 10 => 'Октября', 11 => 'Ноября', 12 => 'Декабря'
        );
        ?>

 		<li>
			<p>Дата закрытия позиции</p>
            <?php //echo $public_date; ?>
            <?php //echo date('d m Y', strtotime($public_date. ' + 90 days')); ?>
			<p><em><?php echo date('d '. $monthes[(date('n'))] .' Y', strtotime($public_date. ' + 90 days')); ?></em></p>
            <br>
		</li>
        */ ?>
	</ul>
	<div class="cpc-widget__footer">
        <a href="/send-resume/?vacancy-code=<?php echo get_field('job_id'); ?>" class="wj-btn-standard orange">Откликнуться</a>
	</div>
</div>

