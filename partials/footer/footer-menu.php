<?php

/**
 * The footer menu.
 */

?>

<div class="footer-menu">
    <?php
    wp_nav_menu( array(
        'theme_location' => 'footer_menu',
        )
    );
    ?>
</div>