<?php global $product; ?>
<li class="firstItem">
	<div class="media">
		<a class="pull-left" href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>">
<?php
$image_link  = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
<img src="<?php echo $image_link; ?>" class="wp-post-image nelioefi" />

		</a>
		<div class="media-body">
			<h4 class="media-heading"><a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo $product->get_title(); ?></a></h4>
			<span class="small-coast"><?php echo $product->get_price_html(); ?></span>
			<div class="rating">
				<?php if ( ! empty( $show_rating ) ) echo $product->get_rating_html(); ?>
			</div>
		</div>
	</div>
</li>