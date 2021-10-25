<?php

/**
*
* Template Name: Welcome page
*
 */

get_header(); ?>



<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" id="report-header">
	

	<div class="strap-outer">
		<div class="strap-inner">
			<div class="wow fadeInUp hide-for-xs" id="pause">
				<span class="glyphicons glyphicons-pause"></span>
			</div><!-- /pause btn -->
			
			<div class="strapline" style="width: auto;">
				<div>
					<h1><?php the_field('slider_1_header_1'); ?></h1> <!-- Slider1: Header 1 -->
					<h2><?php the_field('slider_1_header_2'); ?></h2> <!-- Slider1: Header 2 -->
				</div>
				<div>
					<h1><?php the_field('slider_2_header_1'); ?></h1> <!-- Slider2: Header 1 -->
					<h2><?php the_field('slider_2_header_2'); ?></h2> <!-- Slider2: Header 2 -->
				</div>
				<div>
					<h1><?php the_field('slider_3_header_1'); ?></h1> <!-- Slider3: Header 1 -->
					<h2><?php the_field('slider_3_header_2'); ?></h2> <!-- Slider3: Header 2 -->
				</div>
			</div>
			<br /><br />
			<div class="strapline-buttons">
				<a href="<?php the_field('slider_button_link'); ?>">
					<div class="btn btn-orange  wow fadeInUp"  data-wow-delay="0.3s" >
						<span class="reveal-text"><?php the_field('slider_button_text'); ?></span><!-- Slider Button Text: Current vacancies -->
						<span class="glyphicons glyphicons-briefcase"></span>
					</div><!-- /.btn btn-orange  -->
				</a>

				</div><!-- /.strapline-buttons -->
				
			</div><!-- /container -->
		</div><!-- /#report-header -->
	</div><!-- /#report-header -->
	<div id="pad"></div><!-- /#pad -->

	<div id="grey-over">
		<div class="container" >


			<div class="row masonry" style="padding-top: 40px;">




				<div class="c4 module wow fadeInUp">
					<div class="module-hero">
					    <img src="<?php bloginfo('template_directory' ); ?>/img/your-hays-story/widget-one.jpg" alt="module image 3" /><!-- S_Nahrwold_Photo.jpg -->
					</div><!-- /.module-hero -->
					<div class="cwp match-cwp">
						<h1><?php the_field('widget_1_title'); ?></h1>
						<p><?php the_field('widget_1_blurb'); ?></p>
						<br />
                        
                        <?php if( get_field('widget_1_url') ): ?>
                                <a href="<?php the_field('widget_1_url'); ?>">
							        <div class="btn btn-orange"><?php the_field('widget_1_button'); ?></div>
                                    <!-- /.btn -->
						        </a>
                             <?php else: ?>    
                                <a href="<?php echo get_permalink(28); ?>">
							        <div class="btn btn-orange"><?php the_field('widget_1_button'); ?></div>
                                    <!-- /.btn -->
						        </a>
                        <?php endif; ?>
                        
					</div><!-- /.cwp -->
				</div><!-- /.c4 -->


				<div class="c4 module wow fadeInUp">
					<div class="module-hero">
						<img src="<?php bloginfo('template_directory'); ?>/img/modules/widget-two.jpg" alt="module image 1" /> <!--11.jpg-->
					</div><!-- /.module-hero -->
					<div class="cwp match-cwp">
						<h1><?php the_field('widget_2_title'); ?></h1>
						<p><?php the_field('widget_2_blurb'); ?></p>
						<br />

                        <?php if( get_field('widget_2_url') ): ?>
                                <a href="<?php the_field('widget_2_url'); ?>">
							        <div class="btn btn-orange"><?php the_field('widget_2_button'); ?></div>
							        <!-- /.btn -->
						        </a>
                             <?php else: ?>    
                                <a href="https://ru.hays-careers.com">
                                    <div class="btn btn-orange"><?php the_field('widget_2_button'); ?></div>
                                    <!-- /.btn text: Find out more -->
                                </a>
                        <?php endif; ?>

					</div><!-- /.cwp -->
				</div><!-- /.c4 -->

				<div class="c4 module wow fadeInUp">
					<div class="module-hero">
						<img src="<?php bloginfo('template_directory'); ?>/img/modules/widget-three.jpg" alt="module image 1" /> <!--11.jpg-->
					</div><!-- /.module-hero -->
					<div class="cwp match-cwp">
						<h1><?php the_field('widget_3_title'); ?></h1>
						<p><?php the_field('widget_3_blurb'); ?></p>
						<br />

                        <?php if( get_field('widget_3_url') ): ?>
                                <a href="<?php the_field('widget_3_url'); ?>">
							        <div class="btn btn-orange"><?php the_field('widget_3_button'); ?></div>
							        <!-- /.btn -->
						        </a>
                             <?php else: ?>    
                                <a href="http://hays-apply.hays-careers.com/haysUK/Search/Results/All/1">
                                    <div class="btn btn-orange"><?php the_field('widget_3_button'); ?></div>
                                    <!-- /.btn text: Find out more -->
                                </a>
                        <?php endif; ?>

					</div><!-- /.cwp -->
				</div><!-- /.c4 -->


				<!-- LINE TWO	 -->
			
						<!-- // ROW TWO -->
                                        
                        <div class="c4 module wow fadeInUp">
							<div class="module-hero">
								<img src="<?php bloginfo('template_directory'); ?>/img/modules/widget-six.jpg" alt="module image 13" /> <!-- 3.jpg-->
							</div><!-- /.module-hero -->
							<div class="cwp match-cwp">
								<h1><?php the_field('widget_6_title'); ?></h1>
								<p><?php the_field('widget_6_blurb'); ?></p>
								<br />
								
                                <?php if( get_field('widget_6_url') ): ?>
                                        <a href="<?php the_field('widget_6_url'); ?>">
                                            <div class="btn btn-orange"><?php the_field('widget_6_button'); ?></div>
                                            <!-- /.btn -->
                                        </a>
                                     <?php else: ?>    
                                        <a href="<?php echo get_permalink(543); ?>">
                                            <div class="btn btn-orange"><?php the_field('widget_6_button'); ?></div>
                                            <!-- /.btn text: Find out more -->
                                        </a>
                                <?php endif; ?>
								
								
							</div><!-- /.cwp -->
						</div><!-- /.c4 -->


				<div class="c4 module wow fadeInUp">
					<div class="module-hero">
						<img src="<?php bloginfo('template_directory'); ?>/img/modules/widget-four.jpg" alt="module image 2" /> <!--10.jpg-->
					</div><!-- /.module-hero -->
					<div class="cwp match-cwp">
						<h1><?php the_field('widget_4_title'); ?></h1>
						<p><?php the_field('widget_4_blurb'); ?></p>
						<br />

                        <?php if( get_field('widget_4_url') ): ?>
                                <a href="<?php the_field('widget_4_url'); ?>">
                                    <div class="btn btn-orange"><?php the_field('widget_4_button'); ?></div>
                                    <!-- /.btn -->
                                </a>
                             <?php else: ?>    
                                <a href="<?php echo get_permalink(31); ?>">
                                    <div class="btn btn-orange"><?php the_field('widget_4_button'); ?></div>
                                    <!-- /.btn text:Find out more -->
                                </a>
                        <?php endif; ?>						
						
					</div><!-- /.cwp -->
				</div><!-- /.c4 -->


               <div class="c4 module wow fadeInUp">
                    <div class="module-hero">
                        <img src="<?php bloginfo('template_directory'); ?>/img/modules/widget-five.jpg" alt="module image 13" /><!--12.jpg-->
                    </div><!-- /.module-hero -->
                    <div class="cwp match-cwp">
                        <h1><?php the_field('widget_5_title'); ?></h1> <!-- widget 5: title -->
                        <p>
                            <?php the_field('widget_5_blurb'); ?> <!-- widget 5: text -->
                        </p>
                        <br />

                        <?php if( get_field('widget_5_url') ): ?>
                                <a href="<?php the_field('widget_5_url'); ?>">
                                    <div class="btn btn-orange"><?php the_field('widget_5_button'); ?></div>
                                    <!-- /.btn -->
                                </a>
                             <?php else: ?>    
                                <a href="<?php echo get_permalink(31); ?>#career-progression">
                                    <div class="btn btn-orange"><?php the_field('widget_5_button'); ?></div>
                                    <!-- /.btn --> <!-- widget 5: button -->
                                </a>
                        <?php endif; ?>									

                    </div><!-- /.cwp -->
                </div><!-- /.c4 -->


					</div><!-- /row -->
				</div><!-- /row -->
			</div><!-- /row -->
			<?php get_footer(); wp_footer(); ?>
