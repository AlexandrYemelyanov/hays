<?php

/**
 * Social networks block with blue icons.
 */

?>


<div class="site-social-block">
    <ul>
    <?php if(get_field('link_fb', 'option')!=""){ ?>
        <li><a id="wj-share-fb" class="wj-icon-cm-fb" aria-label="Facebook"href="<?php echo get_field('link_fb', 'option'); ?>"rel="noopener" target="_blank"></a> </li>
    <?php } ?>
    <?php if(get_field('link_inst', 'option')!=""){ ?>
        <li><a id="wj-share-insta" class="wj-icon-cm-insta" aria-label="Instagram" href="<?php echo get_field('link_inst', 'option'); ?>" rel="noopener" target="_blank"></a></li>
    <?php } ?>
    <?php if(get_field('link_yt', 'option')!=""){ ?>
        <li><a id="wj-share-yt" class="wj-icon-cm-yt" aria-label="Youtube" href="<?php echo get_field('link_yt', 'option'); ?>" rel="noopener" target="_blank"></a></li>
    <?php } ?>
    <?php if(get_field('link_in', 'option')!=""){ ?>
        <li><a id="wj-share-lin" class="wj-icon-cm-lin" aria-label="Linkedin" href="<?php echo get_field('link_in', 'option'); ?>" rel="noopener" target="_blank"></a></li>
    <?php } ?>
    <?php if(get_field('link_email', 'option')!=""){ ?>
        <li><a id="wj-share-email" class="wj-icon-cm-email" aria-label="Email" href="<?php echo get_field('link_email', 'option'); ?>" target="_blank"></a></li>
    <?php } ?>
    <li><a class="fa fa-telegram" href="http://t.me/haysjobs" target="_blank"></a></li>
    </ul>
</div>
