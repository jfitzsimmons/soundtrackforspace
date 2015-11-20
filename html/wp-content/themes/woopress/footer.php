<?php
global $etheme_responsive;
$fd = etheme_get_option('footer_demo');
$fbg = etheme_get_option('footer_bg');
$fcolor = etheme_get_option('footer_text_color');
$ft = ''; $ft = apply_filters('custom_footer_filter',$ft);
$custom_footer = etheme_get_custom_field('custom_footer', et_get_page_id());
?>

<?php if($custom_footer != 'without'): ?>
<?php if((is_active_sidebar('footer1') || $fd) && empty($custom_footer)): ?>
<div class="footer-top footer-top-<?php echo esc_attr($ft); ?>">
<div class="container">
<?php if ( !is_active_sidebar( 'footer1' ) ) : ?>
<?php if($fd) etheme_footer_demo('footer1'); ?>
<?php else: ?>
<?php dynamic_sidebar( 'footer1' ); ?>
<?php endif; ?>
</div>
</div>
<?php endif; ?>


<?php if((is_active_sidebar('footer2') || $fd) && empty($custom_footer)): ?>
<footer class="main-footer main-footer-<?php echo esc_attr($ft); ?> text-color-<?php echo $fcolor; ?>" <?php if($fbg != ''): ?>style="background-color:<?php echo $fbg; ?>"<?php endif; ?>>
<div class="container">
<?php if ( !is_active_sidebar( 'footer2' ) ) : ?>
<?php if($fd) etheme_footer_demo('footer2'); ?>
<?php else: ?>
<?php dynamic_sidebar( 'footer2' ); ?>
<?php endif; ?>
<?php do_action('etheme_after_footer_widgets'); ?>
</div>

</footer>
<?php endif; ?>

<?php if(!empty($custom_footer)): ?>
<footer class="main-footer main-footer-<?php echo esc_attr($ft); ?> text-color-<?php echo $fcolor; ?>" <?php if($fbg != ''): ?>style="background-color:<?php echo $fbg; ?>"<?php endif; ?>>
<div class="container">
<?php echo et_get_block($custom_footer); ?>
</div>
</footer>
<?php endif; ?>

<?php if((is_active_sidebar('footer9') || is_active_sidebar('footer10') || $fd) && empty($custom_footer)): ?>
<div class="copyright copyright-<?php echo esc_attr($ft); ?> text-color-<?php echo $fcolor; ?>" <?php if($fbg != ''): ?>style="background-color:<?php echo $fbg; ?>"<?php endif; ?>>
<div class="container">
<div class="row-copyrights">
<div class="pull-left">
<?php if(is_active_sidebar('footer9')): ?>
<?php dynamic_sidebar('footer9'); ?>
<?php else: ?>
<?php if($fd) etheme_footer_demo('footer9'); ?>
<?php endif; ?>
</div>
<div class="clearfix visible-xs"></div>
<div class="copyright-payment pull-right">
<?php if(is_active_sidebar('footer10')): ?>
<?php dynamic_sidebar('footer10'); ?>
<?php else: ?>
<?php if($fd) etheme_footer_demo('footer10'); ?>
<?php endif; ?>
</div>
</div>
</div>
</div>
<?php endif; ?>
<?php endif; ?>

</div> <!-- page wrapper -->
</div> <!-- st-content-inner -->
</div>
</div>
<?php do_action('after_page_wrapper'); ?>
</div> <!-- st-container -->


<?php if (etheme_get_option('loader')): ?>
<script type="text/javascript">
if(jQuery(window).width() > 1200) {
    jQuery("body").queryLoader2({
                                barColor: "#111",
                                backgroundColor: "#fff",
                                percentage: true,
                                barHeight: 2,
                                completeAnimation: "grow",
                                minimumTime: 500,
                                onLoadComplete: function() {
                                jQuery('body').addClass('page-loaded');
                                }
                                });
}
</script>
<?php endif; ?>

<?php if (etheme_get_option('to_top')): ?>
<div id="back-top" class="back-top <?php if(!etheme_get_option('to_top_mobile')): ?>visible-lg<?php endif; ?> bounceOut">
<a href="#top">
<span></span>
</a>
</div>
<?php endif ?>


<?php
/* Always have wp_footer() just before the closing </body>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to reference JavaScript files.
 */

wp_footer();
?>
<script>





jQuery(function() {
       String.prototype.toCamel = function(){
       return this.charAt(0).toUpperCase() + this.slice(1).replace(/(\-[a-z])/g, function($1){return $1.toUpperCase();});
       };
       jQuery('select#pa_color').on( 'change', function( event ) {
                                    var bg = jQuery('.wp-post-image').css('background-image');
                                    var src = bg.replace('url(','').replace(')','');
                                
                                    console.log('1st src: ' + src);
                                    $val=jQuery(this).val();
                                    jQuery(this).children('option').each(function(){
                                                                         $childVal = jQuery(this).val();
                                                                         if ( $childVal == $val ) {
                                                                         jQuery(this).attr('selected', 'selected');
                                                                         } else {
                                                                         jQuery(this).removeAttr('selected');
                                                                         }
                                                                         });
                                    $colorVal = jQuery('option:selected',this).val();
                                    //$colorVal = $colorVal.replace(/%20/g, "-");
                                    $nwclrval = $colorVal.toCamel();
                                    console.log('cval to camel: ' + $nwclrval);
                                    
                                    var resrc = src.match("lab_shirts(.*)-111");
                                    console.log('resrc: ' + resrc[1]);
                                    newsrc=src.replace(resrc[1],("/" + $nwclrval));
                                    console.log('newsrc: ' + newsrc);
                                   
                                
                                    jQuery('.wp-post-image').css("background-image", "url(" +newsrc + ")");
                                    });
       });


</script>
</body>

</html>