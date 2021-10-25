<?php
/**
*
* Template Name: About us page
*
 */

get_header(); ?>


<div class="container main-container standard" >

  <div class="page-panel row" id="intro">
    <h1 class="page-title"><?php the_title( ); ?></h1>

      <div class="row">
        <div class="c12" style="position: relative;">

            <div class="embed-responsive embed-responsive-16by9">
            <iframe src="https://player.vimeo.com/video/255862264?autoplay=1&loop=1&background=1" width="100%" height="360" frameborder="0"  webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

            </div>

        </div><!-- /.c12 -->
      </div><!-- /.row -->

      <div class="row">
        <div class="c12">
          <div class="cwp">
            <div class="c8">
                <h1><?php the_field('intro_title_1'); ?><br /> <!-- intro_title_1 -->
                <span style="color: #009fda;"><?php the_field('intro_title_2'); ?></span> <!-- intro_title_2 -->
                </h1>
                <?php the_field('intro'); ?>
              <!-- <img src="<?php bloginfo('template_directory'); ?>/img/about-us/nigel-sign-off.png" style="width: 100%; max-width: 240px;" alt="Nigel sign off" /> -->
            </div><!-- /.c8 -->

            <div class="c3 pull-right" id="nigel-heap" >
              <img src="<?php bloginfo('template_directory'); ?>/img/managing-director.jpg" width="100%" alt="Managing Director" />
              <div class="module">
                <div class="text" style="padding: 15px 10px;">
                  <h1><?php the_field('nigel_name'); ?></h1> <!-- Nigel Heap --> 
                  <p><?php the_field('nigel_title'); ?></p><!-- Managing Director, UK &amp; Ireland --> 
                </div><!-- /.text -->
              </div><!-- /.module -->

            </div><!-- /.c3 -->
            <div class="clear"></div><!-- /.clear -->
          </div><!-- /.cwp -->

        </div><!-- /c12 -->
      </div><!-- /.row -->

    </div>





    <div class="row mobile-bg-fix" style="max-width: 100%; position: relative;"  id="stats">

      <div class="row">
        <h1><?php the_field('hays_in_numbers_title'); ?></h1> <!-- title: Hays in numbers -->

        <div class="stat-card wow fadeInUp">
          <span class="glyphicons glyphicons-target"></span>
          <h1 class="blue-stat" id="employees-stat">
22 &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('specialist_areas'); ?></p>
          </strong>
        </div><!-- /.c3 -->


        <div class="stat-card wow fadeInUp" data-wow-delay="0.3s">
          <span class="glyphicons glyphicons-globe"></span>
          <h1 class="blue-stat">
            33 &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('countries_covered'); ?></p>
          </strong>
        </div><!-- /.c3 -->


        <div class="stat-card wow fadeInUp"  data-wow-delay="0.6s">
          <span class="glyphicons glyphicons-calendar"></span>
          <h1 class="blue-stat">
            <?php echo (date('Y') - 1968); ?> &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('years_of_experience'); ?></p>
          </strong>
        </div><!-- /.c3 -->

        <div class="stat-card wow fadeInUp" data-wow-delay="0.9s">
          <span class="glyphicons glyphicons-building"></span>
          <h1 class="blue-stat" id="employees-stat">
            250 &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('offices_worldwide'); ?></p>
          </strong>
        </div><!-- /.c3 -->

        <div class="stat-card wow fadeInUp" data-wow-delay="1.2s">
          <span class="glyphicons glyphicons-briefcase"></span>
          <h1 class="blue-stat" id="employees-stat">
            1000 &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('jobs_filled_every_working_day'); ?></p>
          </strong>
        </div><!-- /.c3 -->


        <div class="stat-card wow fadeInUp">
          <span class="glyphicons glyphicons-group"></span>
          <h1 class="blue-stat" id="employees-stat">
            9000 &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('global_employees'); ?></p>
          </strong>
        </div><!-- /.c3 -->


        <div class="stat-card wow fadeInUp"   data-wow-delay="0.3s">
          <span class="glyphicons glyphicons-handshake"></span>
          <h1 class="blue-stat">
            63000 &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('permanent_placements_made'); ?></p>
          </strong>
        </div><!-- /.c3 -->



        <div class="stat-card wow fadeInUp"   data-wow-delay="0.6s">
          <span class="glyphicons glyphicons-clock"></span>
          <h1 class="blue-stat">
            200000 &nbsp;
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('temporary_assignments'); ?></p>
          </strong>
        </div><!-- /.c3 -->



        <div class="stat-card wow fadeInUp"   data-wow-delay="0.9s">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/li-icon.png" style="width: 100%; max-width: 60px;" alt="LinkedIn logo" />
          <h1 class="blue-stat addM2">
            1
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('linkedin_followers'); ?></p>
          </strong>
        </div><!-- /.c3 -->


        <div class="stat-card wow fadeInUp"   data-wow-delay="1.2s">
          <span class="glyphicons glyphicons-gbp"></span>
          <h1 class="blue-stat addM">
            764 
          </h1><!-- /.blue-stat -->
          <strong>
            <p><?php the_field('net_fees_generated'); ?></p>
          </strong>
        </div><!-- /.c3 -->

      </div><!-- /.row -->

    </div><!-- /row -->




    <div class="page-panel" id="what-we-do">
      <h1 class="page-title"><?php the_field('what_we_do_heading'); ?></h1><!-- What we do -->

      <div class="row">


        <div class="c6" id="what-we-do-text-x">
          <div class="cwp match">
            <h1><?php the_field('column_one_title'); ?></h1> <!-- Column 1 title -->
            <p><?php the_field('column_one_content'); ?></p><!-- Column 1 content -->
          </div><!-- /.cwp -->
        </div><!-- /c12 -->
        <div class="c6">
          <div class="cwp match">
            <h1><?php the_field('column_two_title'); ?></h1> <!-- Column 2 title -->
            <p><?php the_field('column_two_content'); ?></p><!-- Column 2 content -->
          </div><!-- /.cwp -->
        </div><!-- /.c6 -->
      </div><!-- /.row -->

    </div>


    <div class="full-panel  mobile-bg-fix" id="expertise-areas">
      <div class="row">
        <h1><?php the_field('areas_of_expertise'); ?></h1> <!-- Areas of expertise -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/1.png" alt="Accountancy &amp; Finance" />
          <?php the_field('expertise_accountancy_finance'); ?><!-- Accountancy &amp; Finance -->
        </div>

        <!-- <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/2.png" alt="Banking &amp; Capital Markets" />
          <?php the_field('expertise_banking_capital'); ?>
        </div>--><!-- Banking &amp; Capital Markets -->

        <!-- <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/3.png" alt="Call Centres" />
          <?php the_field('expertise_call_centres'); ?>
        </div>--><!-- Call Centres -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/4.png" alt="Construction &amp; Property" />
          <?php the_field('expertise_construction'); ?><!-- Construction &amp; Property -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/5.png" alt="Consultancy, Strategy, Change" />
          <?php the_field('expertise_consultancy_strategy'); ?>
        </div>--><!-- Consultancy, Strategy, Change -->

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/11.png" alt="Education &amp; Teaching" />
          <?php the_field('expertise_education'); ?>
        </div>--><!-- Education &amp; Teaching -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/6.png" alt="Energy, Oil &amp; Gas" />
          <?php the_field('expertise_energy'); ?><!-- Energy, Oil &amp; Gas -->
        </div>

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/7.png" alt="Engineering" />
          <?php the_field('expertise_engineering'); ?><!-- Engineering -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/8.png" alt="Executive" />
          <?php the_field('expertise_executive'); ?>
        </div>--><!-- Executive -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/9.png" alt="Financial Services" />
          <?php the_field('expertise_financial_services'); ?><!-- Financial Services -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/10.png" alt="Healthcare" />
          <?php the_field('expertise_healthcare'); ?>
        </div>--><!-- Healthcare -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/12.png" alt="Human Resources" />
          <?php the_field('expertise_hr'); ?><!-- Human Resources -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/13.png" alt="Insurance" />
          <?php the_field('expertise_insurance'); ?>
        </div>--><!-- Insurance -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/14.png" alt="IT" />
          <?php the_field('expertise_it'); ?><!-- IT -->
        </div>

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/15.png" alt="Legal" />
          <?php the_field('expertise_legal'); ?><!-- Legal -->
        </div>

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/16.png" alt="Life Sciences" />
          <?php the_field('expertise_life_sciences'); ?><!-- Life Sciences -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/17.png" alt="Marketing" />
          <?php the_field('expertise_marketing'); ?>
        </div>--><!-- Marketing -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/19.png" alt="Office Administration" />
          <?php the_field('expertise_office_administration'); ?><!-- Office Administration -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/18.png" alt="PA &amp; Secretarial" />
          <?php the_field('expertise_pa_secretarial'); ?>
        </div>--><!-- PA &amp; Secretarial -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/20.png" alt="Procurement &amp; Supply Chain" />
          <?php the_field('expertise_procurement'); ?><!-- Procurement &amp; Supply Chain -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/21.png" alt="Retail" />
          <?php the_field('expertise_retail'); ?>
        </div>--><!-- Retail -->

        <div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/22.png" alt="Sales" />
          <?php the_field('expertise_sales'); ?><!-- Sales -->
        </div>

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/23.png" alt="Social Care" />
          <?php the_field('expertise_social_care'); ?>
        </div>--><!-- Social Care -->

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/24.png" alt="Tax &amp; Treasury" />
          <?php the_field('expertise_tax_treasury'); ?>
        </div>--><!-- Tax &amp; Treasury -->

        <!--<div class="expertise-card match wow fadeIn">
          <img src="<?php bloginfo('template_directory'); ?>/img/about-us/specialisms/25.png" alt="Telecoms" />
          <?php the_field('expertise_telecoms'); ?>
        </div>--><!-- Telecoms -->
      </div><!-- /.row -->


    </div><!-- /#expertise-areas.full-panel -->




  <div class="page-panel" id="our-culture">
    <h1 class="page-title"><?php the_field('our_cultures_title'); ?></h1> <!-- Our culture and values -->

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
            <p><?php the_field('passionate_people_title'); ?></p><!-- Passionate about people -->
          </div><!-- /.side-one -->

          <div class="side-two">
            <p>
              <?php the_field('passionate_about_people'); ?>
            </p>

          </div><!-- /.side-two -->
        </div><!-- /.values-card  orange-bg -->
      </div><!-- /.c4 -->


    </div>


  </div><!-- /.row -->


  </div> <!-- /.container main-container standard -->




  <div class="page-panel blue-panel"  id="map">
    <h1 class="page-title hide"><?php the_field('location_heading'); ?></h1>  <!-- Locations -->

    <div class="row">
      <div class="c6">
        <h1 class="page-title-alt"><?php the_field('location_heading'); ?></h1> <!-- Locations -->

        <p>
          <?php the_field('locations_intro'); ?>
        </p>
        <br /><br />
        <a href="<?php the_field('button_contact_us_link'); ?>"> <!-- <?php echo get_permalink(293); ?> -->
          <div class="btn btn-white-hover"><?php the_field('button_contact_us'); ?>  <span class="glyphicons glyphicons-conversation"></span></div><!-- /.btn Contact us -->
        </a>
        <a href="<?php the_field('button_office_locator_link'); ?>" target="blank"><!-- http://m.hays.co.uk/office-locator/ -->
          <div class="btn btn-white-hover"><?php the_field('button_office_locator'); ?>  <span class="glyphicons glyphicons-google-maps"></span></div><!-- /.btn Office locator-->
        </a>
      </div><!-- /.c6 -->
      <div class="c6">
        <!-- <div id="haysmap"></div> -->
        <!-- <div class="map-panel" > --> 
          <img src="<?php bloginfo('template_directory'); ?>/img/global-op/map.png" width="100%" alt="Map" /> 
          <!-- /img/about-us/map/map.png -->
        <!-- </div>--> <!-- /.map-panel -->
      </div><!-- /.c6 -->

    </div><!-- /.row -->
  </div><!-- /.page-panel blue-panel -->

</div><!-- /.??? undefined ??? --> 

<!-- CONTAINER ENDS IN THE FOOTER.PHP -->
<?php get_footer(); wp_footer(); ?>
