</div> <!-- /container -->


<footer>
    <div class="container">
        <div class="row">


        </div><!-- /.row -->

        <div class="row">
            <p class="copyright">
                &copy; <?php the_field('copyright_text', 1071); ?>
                <!-- &copy; Copyright Hays plc ?php echo date('Y'); ?. HAYS, the Corporate and Sector H devices, Recruiting experts worldwide, the HAYS Recruiting experts worldwide logo and Powering the World of Work are trade marks of Hays plc.
                The Corporate and Sector H devices are original designs protected by registration in many countries. All rights are reserved. -->
            </p><!-- /.copyright -->
            <a style="color: #aaa; font-weight: normal; margin-top: 20px; display: inline-block;" href="<?php echo get_permalink('506'); ?>"><?php the_field('terms_text', 1071); ?> | </a> <!-- Terms of use / Cookie policy -->
            <a style="color: #aaa; font-weight: normal; margin-top: 20px; display: inline-block;" href="<?php echo get_permalink('1156'); ?>"><?php the_field('accessibility_text', 1071); ?> | </a><!-- accessibility  -->
            <a style="color: #aaa; font-weight: normal; margin-top: 20px; display: inline-block;" href="<?php echo get_permalink('989'); ?>"><?php the_field('privacy_text', 1071); ?></a> <!-- privacy policy  -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</footer>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.0/masonry.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/packery/1.4.3/packery.pkgd.min.js"></script> -->
<script src="<?php bloginfo('template_directory'); ?>/js/vendor/bootstrap.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/plugins.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/meet-our-people.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/main.js?<?php echo date("Ymd")?>"></script>
<!-- <script src="<?php bloginfo('template_directory'); ?>/js/locations.js"></script> -->

<script>
    var $buoop = {c:2};
    function $buo_f(){
        var e = document.createElement("script");
        e.src = "//browser-update.org/update.min.js";
        document.body.appendChild(e);
    };
    try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
    catch(e){window.attachEvent("onload", $buo_f)}
</script>

</body>
</html>
