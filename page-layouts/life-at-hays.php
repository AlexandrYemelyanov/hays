<?php
/**
*
* Template Name: Life at Hays
*
 */

get_header(); ?>

<!--  Former Template Name: What we offer -->


<div class="container main-container standard" >

	<h1 class="page-title-no-menu"><?php the_title(); ?></h1> <!-- Life at Hays -->

	<div class="row">
		<div class="c12">
			<video width="100%"  controls autoplay loop>
				<source src="https://player.vimeo.com/external/144862673.hd.mp4?s=75fa5ed1f4c00cd20aa6a752559bfa46717b9eed&profile_id=113" type="video/mp4">
					Your browser does not support the video tag.
				</video>

			</div>
		</div><!-- /.row -->



		<div class="page-panel" id="training">
			<h1 class="page-title"><?php the_field('training_title'); ?></h1> <!-- Training &amp; development -->

			<div class="row">
				<div class="c12">
					<div class="cwp">
						<?php the_field('training_intro'); ?>
					</div><!-- /.cwp -->
				</div><!-- /c12 -->


				<div class="row value-hovers" >
					<div class="c4">
						<div class="values-card green-bg">
							<div class="side-one vert-align">
								<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/training&development/training.png" alt="Consultant training" />
								<br />
								<p><?php the_field('consultant_title'); ?></p> <!-- Consultant training title-->
							</div><!-- /.side-one -->

							<div class="side-two">
								<p>
									<?php the_field('consultant_content'); ?>
								</p> 
							</div><!-- /.side-two -->
						</div><!-- /.values-card  orange-bg -->
					</div><!-- /.c4 -->



					<div class="c4">
						<div class="values-card pink-bg">
							<div class="side-one vert-align">
								<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/training&development/training2.png" alt="Management training" />
								<br />
								<p><?php the_field('management_title'); ?></p> <!-- Management training -->
							</div><!-- /.side-one -->

							<div class="side-two">
								<p>
									<?php the_field('management_content'); ?>
								</p>
							</div><!-- /.side-two -->
						</div><!-- /.values-card  orange-bg -->
					</div><!-- /.c4 -->


					<div class="c4">
						<div class="values-card orange-bg">
							<div class="side-one vert-align">
								<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/training&development/training4.png" alt="Leadership development" />
								<br />
								<p><?php the_field('leadership_title'); ?></p> <!-- Leadership development -->
							</div><!-- /.side-one -->

							<div class="side-two">
								<p>
									<?php the_field('leadership_content'); ?>
								</p>
							</div><!-- /.side-two -->
						</div><!-- /.values-card  orange-bg -->
					</div><!-- /.c4 -->


				</div><!-- /.row -->

			</div><!-- /.row -->
		</div>


		<div class="page-panel" id="rewards" >
			<h1 class="page-title"><?php the_field('rewards_title'); ?></h1> <!-- Rewards &amp; benefits -->

			<div class="row">

				<div class="cwp">
					<div class="row">
						<div class="c12">
							                            
                            <h2><?php the_field('p1_title'); ?></h2>
                            <p><?php the_field('p1_content'); ?></p>
                            <h2><?php the_field('p2_title'); ?></h2>
                            <p><?php the_field('p2_content'); ?></p>
                            <h2><?php the_field('p3_title'); ?></h2>
                            <p><?php the_field('p3_content'); ?></p>
                                
						</div><!-- /.c6 -->

					</div><!-- /.row -->
				</div><!-- /.cwp -->

			</div><!-- /.row -->



		</div>

		<div class="full-panel  mobile-bg-fix" id="benefits-area">
			<div class="row">

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/16.png" alt="Labour Legislation" />
					<?php the_field('icon_labour_legislation'); ?> <!-- Labour Legislation 7-->
				</div>
                
				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/13.png" alt="Uncapped commission" />
					<?php the_field('icon_uncapped_commission'); ?>  <!-- Uncapped commission 1-->
				</div>

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/3.png" alt="Health schemes" />
					<?php the_field('icon_health_schemes'); ?> <!-- Health schemes 3-->
				</div>                

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/10.png" alt="Discounts on restaurants" />
					<?php the_field('icon_discounts_restaurants'); ?> <!-- Discounts on restaurants 6-->
				</div>

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/18.png" alt="communication expenses" />
					<?php the_field('icon_communication_expenses'); ?> <!-- communication expenses 9-->
				</div>                
                
				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/13.png" alt="Life assurance" />
					<?php the_field('icon_life_assurance'); ?> <!-- Life assurance 2-->
				</div>

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/5.png" alt="Season ticket loan" />
					<?php the_field('icon_ticket_loan'); ?> <!-- Season ticket loan 4-->
				</div>

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/7.png" alt="Gym membership" />
					<?php the_field('gym_membership'); ?> <!-- Gym membership 5-->
				</div>

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/17.png" alt="Learning English" />
					<?php the_field('icon_learning_english'); ?> <!-- Learning English 8-->
				</div>

				<div class="benefit-card match wow fadeIn">
					<img src="<?php bloginfo('template_directory'); ?>/img/what-we-offer/benefits/19.png" alt="corporate training" />
					<?php the_field('icon_corporate_training'); ?> <!-- corporate training 10-->
				</div>                

			</div><!-- /.row -->

		</div><!-- /#expertise-areas.full-panel -->

	<div class="page-panel" id="career-progression">
		<h1 class="page-title"><?php the_field('career_progression_header'); ?></h1> <!-- Career progression -->

		<div class="row">
			<div class="c12">
				<div class="cwp">
            
                    <p><strong><?php the_field('career_progression_p1_title'); ?></strong></p> 
                    <p></p>
                    <p><?php the_field('career_progression_p1_content'); ?></p>
                    <p></p>
                    <div class="row">
                        <div class="c6">
                            <p><strong><?php the_field('column_1_title'); ?></strong></p>  <!-- You -->
                            <?php the_field('column_1_content'); ?>
                        </div>

                        <div class="c6">
                            <p><strong><?php the_field('column_2_title'); ?></strong></p> <!-- We -->
                            <?php the_field('column_2_content'); ?>
                        </div>
                    </div>
                    
				</div><!-- /.cwp -->
			</div><!-- /c12 -->
		</div><!-- /.row -->

	</div>

  <div class="page-panel" id="our-culture">
    <h1 class="page-title"><?php the_field('our_culture_and_values_title'); ?></h1> <!-- Our culture and values -->

    <div class="row">
      <div class="c12">
        <div class="cwp">
          <?php the_field('our_cultures_and_values'); ?>
        </div><!-- /.cwp -->
      </div><!-- /c12 -->
    </div><!-- /.row -->

    <div class="row value-hovers" >

      <div class="c3">
        <div class="values-card green-bg">
          <div class="side-one vert-align">
            <span class="glyphicons glyphicons-circle-question-mark"></span>
            <br />
            <p><?php the_field('inquisitive_title'); ?></p> <!-- Inquisitive -->
          </div><!-- /.side-one -->

          <div class="side-two">
            <?php the_field('inquisitive'); ?>
          </div><!-- /.side-two -->
        </div><!-- /.values-card  orange-bg -->
      </div><!-- /.c4 -->

      <div class="c3">
        <div class="values-card cyan-bg">
          <div class="side-one vert-align">
            <span class="glyphicons glyphicons-star"></span>
            <br />
            <p><?php the_field('ambitious_title'); ?></p> <!-- Ambitious -->
          </div><!-- /.side-one -->

          <div class="side-two">
            <p>
              <?php the_field('ambitious'); ?>
            </p>
          </div><!-- /.side-two -->
        </div><!-- /.values-card  orange-bg -->
      </div><!-- /.c4 -->



      <div class="c3">
        <div class="values-card orange-bg">
          <div class="side-one vert-align">
            <span class="glyphicons glyphicons-book-open"></span>
            <br />
            <p><?php the_field('expert_title'); ?></p> <!-- Expert -->
          </div><!-- /.side-one -->

          <div class="side-two">
            <p>
              <?php the_field('expert'); ?>
            </p>
          </div><!-- /.side-two -->
        </div><!-- /.values-card  orange-bg -->
      </div><!-- /.c4 -->


      <div class="c3">
        <div class="values-card pink-bg">
          <div class="side-one vert-align">
            <span class="glyphicons glyphicons-heart"></span>
            <br />
            <p><?php the_field('passionate_about_people_title'); ?></p> <!-- Passionate about people -->
          </div><!-- /.side-one -->

          <div class="side-two">
            <p>
              <?php the_field('passionate_about_people'); ?>
            </p>

          </div><!-- /.side-two -->
        </div><!-- /.values-card  orange-bg -->
      </div><!-- /.c4 -->


    </div>


  </div><!-- /.row career-progression -->

</div>

<!-- CONTAINER ENDS IN THE FOOTER.PHP -->
<?php get_footer(); wp_footer(); ?>
