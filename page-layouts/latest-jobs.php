<?php
/**
*
* Template Name: Latest Jobs
*
 */

get_header(); ?>


<div class="container main-container standard" >

	<div class="page-panel row" id="working-with-us">
		<h1 class="page-title"><?php the_title(); ?></h1>
        
			<div class="row">
				<div class="c12">
					<div class="cwp">
						<?php the_field('latest_jobs_intro'); ?>
						<br /><br />
						<a href="<?php the_field('current_vacancies_link'); ?>"> <!-- current vaccancy URL -->
                            <div class="btn btn-orange  wow fadeInUp"  data-wow-delay="0.3s" >
                                <span class="reveal-text"><?php the_field('button_current_vacancies'); ?></span> <!-- Current vacancies -->
                                <span class="glyphicons glyphicons-briefcase"></span>
                            </div><!-- /.btn btn-orange  -->
                        </a>
                        
                        <a href="<?php the_field('enquire_opportunities_link'); ?>&subject=Отправьте нам резюме"><!-- Enquire about opportunities mailto -->
							<div class="btn btn-orange  wow fadeInUp"  data-wow-delay="0.3s" data-toggle="tooltip" data-placement="top" title=" Становитесь частью команды Hays. Для этого присылайте резюме на почту careers@hays.ru. В теме письма, пожалуйста, укажите название позиции.">
                                <span class="reveal-text"><?php the_field('button_enquire_opportunities'); ?></span> <!-- Enquire about opportunities -->
                                <span class="glyphicons glyphicons-envelope hide-for-xs"></span>
                            </div><!-- /.btn btn-orange  -->
						</a>
                        
					</div><!-- /.cwp -->
				</div><!-- /c12 -->
			</div><!-- /.row -->
		</div><!-- /.page-panel row -->


		
		<div class="row">
			<h3><?php the_field('faq_section_heading'); ?></h3> <!-- FAQs -->
			<div class="c6 faq-boxes">

				<div class="faq-box">
					<div class="faq-btn  purple-bg"><?php the_field('faq_question_1'); ?>
						<span class="glyphicons glyphicons-chevron-down"></span>
					</div><!-- /.faq-btn green-bg -->

					<div class="faq-answer">
						<?php the_field('faq_answer_1'); ?>
					</div><!-- /.faq-answer -->
				</div><!-- /.faq-box -->


				<div class="faq-box">
					<div class="faq-btn  purple-bg"><?php the_field('faq_question_2'); ?>
						<span class="glyphicons glyphicons-chevron-down"></span>
					</div><!-- /.faq-btn green-bg -->

					<div class="faq-answer">
						<?php the_field('faq_answer_2'); ?>
					</div><!-- /.faq-answer -->
				</div><!-- /.faq-box -->

			</div>

			<div class="c6 faq-boxes">
                
				<div class="faq-box">
					<div class="faq-btn purple-bg"><?php the_field('faq_question_3'); ?>
						<span class="glyphicons glyphicons-chevron-down"></span>
					</div><!-- /.faq-btn green-bg -->

					<div class="faq-answer">
						<?php the_field('faq_answer_3'); ?>
					</div><!-- /.faq-answer -->
				</div><!-- /.faq-box -->                
                
				<div class="faq-box">
					<div class="faq-btn  purple-bg"><?php the_field('faq_question_4'); ?>
						<span class="glyphicons glyphicons-chevron-down"></span>
					</div><!-- /.faq-btn green-bg -->

					<div class="faq-answer">
						<?php the_field('faq_answer_4'); ?>
					</div><!-- /.faq-answer -->
				</div><!-- /.faq-box -->


			</div><!-- /.c12 -->
		</div><!-- /.row -->

		
		<div class="row">


			<div class="c6">
				<h3><?php the_field('cv_column_1_title'); ?></h3>
				<div class="cwp match">
					<?php the_field('cv_column_1_content'); ?>
				</div><!-- /.cwp -->
			</div><!-- /.c6 -->

			<div class="c6">
				<h3><?php the_field('cv_column_2_title'); ?></h3>
				<div class="cwp match">
					<?php the_field('cv_column_2_content'); ?>
				</div><!-- /.cwp -->
			</div><!-- /.c6 -->
		</div><!-- /.row -->



	</div>





	<!-- CONTAINER ENDS IN THE FOOTER.PHP -->
	<?php get_footer(); wp_footer(); ?>
