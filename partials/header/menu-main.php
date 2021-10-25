<?php

/**
 * Header main menu block.
 */

?>
<?php
    if( have_rows('main_menu', 'option') ):
?>
      
<ul class="site__menu-main">

<?php 
    while ( have_rows('main_menu', 'option') ) : the_row();
    ?>

    <?php if(get_sub_field('has_submenu')==1){ ?>

        <li class="smm-submenu <?php if( get_sub_field('slug')=="international"){ echo " smm-submenu--international"; }?>">
            <a v-on:click.stop="toggler('<?php echo get_sub_field('slug'); ?>')" 
                v-bind:class="{'wj-expanded': togglers.<?php echo get_sub_field('slug'); ?>.ison}" 
                class="smm-submenu-toggler"><?php echo get_sub_field('title'); ?><i class="wj-icon-cm-arrow-down"></i></a>

                <div class="smm-submenu-wrapper">
                    <span class="wj-close"><a>&times;</a></span>
                    <ul class="site-menu-second-level">
                        <?php 

                         if( have_rows('submenu') ):
                            while ( have_rows('submenu') ) : the_row();
                                ?>
                                <a href="<?php echo get_sub_field('sublink'); ?>"><?php echo get_sub_field('subtitle'); ?></a>
                                <?php 
                            endwhile;
                        endif;
                        ?>

                        
                    </ul>
                </div>

        </li>

    <?php }else{ ?> 

        <li>
            <a href="<?php echo get_sub_field('link'); ?>"><?php echo get_sub_field('title'); ?></a>
        </li>

    <?php } ?>    
        
<?php endwhile; ?>
</ul>

<?php 
    endif;
?>


<?php /*
<ul class="site__menu-main">
	<li><a href="search">Все вакансии</a></li>
	<!-- <li><a href="applicants">Соискателю</a></li> -->

	<li class="smm-submenu">
		<a v-on:click.stop="toggler('applicants')" 
			v-bind:class="{'wj-expanded': togglers.applicants.ison}" 
			class="smm-submenu-toggler">Соиcкателю<i class="wj-icon-cm-arrow-down"></i></a>
		<?php include get_template_directory() . '/partials/header/menu-applicants.php'; ?>
	</li>

 
	<li class="smm-submenu">
		<a v-on:click.stop="toggler('employers')" 
			v-bind:class="{'wj-expanded': togglers.employers.ison}"
			class="smm-submenu-toggler">Работодателю<i class="wj-icon-cm-arrow-down"></i></a>
		<?php include get_template_directory() . "/partials/header/menu-employers.php" ?>
	</li>
	<!--<li><a href="https://ru.hays-careers.com/">Карьера в Hays </a></li>-->
	<li><a href="/about-hays/">О компании</a></li>
	<li><a href="/contacts/">Контакты</a></li>
	<li class="smm-submenu smm-submenu--international">
		<a v-on:click.stop="toggler('international')" 
			v-bind:class="{'wj-expanded': togglers.international.ison}"
			class="smm-submenu-toggler">Hays в мире<i class="wj-icon-cm-arrow-down"></i></a>
		<div class="smm-submenu-wrapper">
			<span class="wj-close"><a>&times;</a></span>

            <?php wp_nav_menu('menu_class=bmenu&theme_location=inworld'); ?>

<!--			<ul>-->
<!--                <li id="menu-item-1857" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1857"><a href="https://www.hays.com.au/">Австралия</a></li>-->
<!--                <li id="menu-item-1858" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1858"><a href="https://www.hays.at/">Австрия</a></li>-->
<!--                <li id="menu-item-1859" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1859"><a href="https://www.hays.co.uk/">Англия</a></li>-->
<!--                <li id="menu-item-1860" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1860"><a href="http://www.hays.com.br/">Бразилия</a></li>-->
<!--                <li id="menu-item-1861" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1861"><a href="http://www.hays.hu/">Венгрия</a></li>-->
<!--                <li id="menu-item-1862" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1862"><a href="https://www.hays.de/">Германия</a></li>-->
<!--                <li id="menu-item-1863" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1863"><a href="http://www.hays.com.hk/">Гонконг</a></li>-->
<!--                <li id="menu-item-1864" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1864"><a href="http://www.hays.dk/">Дания</a></li>-->
<!--                <li id="menu-item-1865" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1865"><a href="http://www.hays.ie/">Ирландия</a></li>-->
<!--                <li id="menu-item-1866" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1866"><a href="http://www.hays.es/">Испания</a></li>-->
<!--                <li id="menu-item-1867" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1867"><a href="http://www.hays.it/">Италия</a></li>-->
<!--                <li id="menu-item-1869" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1869"><a href="http://www.hays.ca/">Канада</a></li>-->
<!--                <li id="menu-item-1870" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1870"><a href="http://www.hays.cn/">Китай</a></li>-->
<!--                <li id="menu-item-1871" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1871"><a href="http://www.hays.com.co/">Колумбия</a></li>-->
<!--			</ul>-->
		</div>
	</li>
</ul>
*/ ?>
