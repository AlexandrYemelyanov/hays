<?php
/**
*
* Template Name: Working with us page
*	 LIFE AT HAYS PAGE
 */

get_header(); ?>


<div class="container main-container standard" >

	<div class="page-panel row" id="working-with-us">
		<h1 class="page-title hide"><?php the_title(); ?></h1>

		<div class="row">
			<div class="c12">
				<div id="image-header">
					<div class="strapline">
						<h1><?php the_title(); ?></h1>
					</div><!-- /.strapline -->
				</div><!-- /#image-header -->

			</div><!-- /.12 -->
		</div><!-- /.row -->
		

		<div class="row">
			<div class="c12">
				<div class="cwp">
					<?php the_field('intro'); ?>
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
						<?php the_field('inquisitive_content'); ?>
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
							<?php the_field('ambitious_content'); ?>
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
							<?php the_field('expert_content'); ?>
						</p>
					</div><!-- /.side-two -->
				</div><!-- /.values-card  orange-bg -->
			</div><!-- /.c4 -->


			

			<div class="c3">
				<div class="values-card pink-bg">
					<div class="side-one vert-align">
						<span class="glyphicons glyphicons-heart"></span>
						<br />
						<p><?php the_field('passionate_people_title'); ?></p> <!-- Passionate about people -->
					</div><!-- /.side-one -->

					<div class="side-two">
						<p>
							<?php the_field('passionate_people_content'); ?>
						</p>

					</div><!-- /.side-two -->
				</div><!-- /.values-card  orange-bg -->
			</div><!-- /.c4 -->
		</div><!-- /.row -->

    </div>


    <?php if(get_field('show_video_block')): ?> 
    <!-- defau;t=true; if true, then show. else hide-->
    
      <div class="page-panel" id="meet-our-people">
        <h1 class="page-title"><?php the_field('video_section_header'); ?></h1>

        <div class="row">

          <div class="col-md-12">
            <div class="cwp">

              <div class="row">
                    <div class="c8">
                        <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe src="https://ru.hays-careers.com/wp-content/themes/hays-careers/video/hays_meet_our_people.mp4" name="hays Meet our people Russia" width="720" height="405" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen="allowfullscreen">
                            <p style="text-align: center;">
                                Iframes are required to view this content.</p>
                            <p>&nbsp;</p>
                            </iframe>
                            </p>
                        </div>
                    </div>
                    <div class="c4">
                        <h1><?php the_field('video_subtitle'); ?></h1>
                        <p><?php the_field('video_content'); ?></p>
                    </div>
                </div>

            </div><!-- /.cwp -->
          </div><!-- /COL MD 12 -->


        </div><!-- /.row -->

      </div>
    
    <?php endif; ?>	
    
      <div class="page-panel" id="meet-our-people">
        <h1 class="page-title"><?php the_field('picture_section_header'); ?></h1>

        <div class="row">

          <div class="col-md-12">
            <div class="cwp">

              <div class="row">
                    <div class="c8">
                        <div class="embed-responsive embed-responsive-16by9">
                        <p><iframe src="https://ru.hays-careers.com/wp-content/themes/hays-careers/img/video/picture-block.jpg" name="Hays Meet our people Russia" width="720" height="405" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" allowfullscreen="allowfullscreen">
                            <p>&nbsp;</p>
                            </iframe>
                            </p>
                        </div>
                    </div>
                    <div class="c4">
                        <h1><?php the_field('picture_subtitle'); ?></h1>
                        <p><?php the_field('picture_content'); ?></p>
                    </div>
                </div>

            </div><!-- /.cwp -->
          </div><!-- /COL MD 12 -->


        </div><!-- /.row -->

      </div>    

</div> <!-- /container -->    
    


	<!-- GLOBE TROTTER SECTION  -->


	<?php get_template_part("page-layouts/ditl"); ?>


	<!-- CONTAINER ENDS IN THE FOOTER.PHP -->
	<?php get_footer(); wp_footer(); ?>
