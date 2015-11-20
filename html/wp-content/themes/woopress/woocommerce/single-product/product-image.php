<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $etheme_global, $product;
$zoom     = etheme_get_option('zoom_effect');
$lightbox = etheme_get_option('gallery_lightbox');
$slider   = etheme_get_option('images_slider');

if(!empty($etheme_global['zoom'])) {
	$zoom = $etheme_global['zoom'];
}

$has_video = false;

$video_attachments = array();
$videos = et_get_attach_video($product->id); 
//$videos = explode(',', $videos[0]);
if(isset($videos[0]) && $videos[0] != '') {
	$video_attachments = get_posts( array(
		'post_type' => 'attachment',
		'include' => $videos[0]
	) ); 
}


if(count($video_attachments)>0 || et_get_external_video($product->id) != '') {
	$has_video = true;
}

?>
<div class="images">

	<?php
		
            $data_rel = '';
			$image_title = esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  = wp_get_attachment_url( get_post_thumbnail_id() );
			$image       = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );
            $attachment_ids = $product->get_gallery_attachment_ids();
			$attachment_count = count( $attachment_ids );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}
            
            if($lightbox) $data_rel = 'data-rel="gallery' . $gallery . '"';
            
            ?>
            
            <div class="<?php if ($slider): ?>product-images-slider<?php else: ?>product-images-gallery<?php endif ?> main-images images-popups-gallery <?php if ($zoom != 'disable') { echo 'zoom-enabled'; } ?>">
            	<?php if ( has_post_thumbnail() ) { ?>
	            	<div>
<img src="<?php echo $image_link; ?>" class="design-png" />
		                <?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image product-image" data-o_href="%s" title="%s">%s</a>', $image_link, $image_link, $image_title, $image ), $post->ID ); ?>



	            	</div>
            	<?php } else { ?>
	            	<div>
		                <?php echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image product-image" data-o_href="%s"><img src="%s" /></a>', wc_placeholder_img_src(), wc_placeholder_img_src(), wc_placeholder_img_src() ), $post->ID ); ?>
	            	</div>
            	<?php } ?>
                <?php
                	$_i = 0;
                    if($attachment_count > 0) {
            			foreach($attachment_ids as $id) {
            				$_i++;
            				?>
            				<div>
	            				<?php 
	                            
	                			$image_title = esc_attr( get_the_title( $id ) );
	                			$image_link  = wp_get_attachment_url( $id );
	                            $image = wp_get_attachment_image_src($id, 'shop_single');
	                            
	                            echo sprintf( '<a href="%s" itemprop="image" class="woocommerce-additional-image product-image" title="%s"><img src="%s" class="lazyOwl"/></a>', $image_link, $image_title, $image[0] );  
	                            
	                            if($lightbox):
		                            ?>
		                            	<a href="<?php echo $image_link; ?>" class="product-lightbox-btn" <?php echo $data_rel; ?>>lightbox</a>
		                            <?php
	                            endif;
	            				?>
            				</div>
            				<?php 
                            
            			}
            		
            		}
                ?>
				<?php if(et_get_external_video($product->id)): ?>
					<div>
						<?php echo et_get_external_video($product->id); ?>
					</div>
				<?php endif; ?>
				
	
				<?php if(count($video_attachments)>0): ?>
						<div>
							<video controls="controls">
								<?php foreach($video_attachments as $video):  ?>
									<?php $video_ogg = $video_mp4 = $video_webm = false; ?>
									<?php if($video->post_mime_type == 'video/mp4' && !$video_mp4): $video_mp4 = true; ?>
										<source src="<?php echo $video->guid; ?>" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
									<?php endif; ?>
									<?php if($video->post_mime_type == 'video/webm' && !$video_webm): $video_webm = true; ?>
										<source src="<?php echo $video->guid; ?>" type='video/webm; codecs="vp8, vorbis"'>
									<?php endif; ?>
									<?php if($video->post_mime_type == 'video/ogg' && !$video_ogg): $video_ogg = true; ?>
										<source src="<?php echo $video->guid; ?>" type='video/ogg; codecs="theora, vorbis"'>
										<?php _e('Video is not supporting by your browser', ETHEME_DOMAIN); ?>
										<a href="<?php echo $video->guid; ?>"><?php _e('Download Video', ETHEME_DOMAIN); ?></a>
									<?php endif; ?>
								<?php endforeach; ?>
							</video>
						</div>
				<?php endif; ?>
            </div>
            
            
</div>
