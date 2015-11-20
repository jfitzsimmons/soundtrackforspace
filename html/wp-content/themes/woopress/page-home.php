<?php /* Template Name: Page Home */ ?>

<?php
	get_header();
?>

<?php 

	$l = et_page_config();

?>

<?php do_action( 'et_page_heading' ); ?>

	<div class="container content-page">
		<div class="page-content sidebar-position-full sidebar">


				<?php get_sidebar('Home-Section-1-SB'); ?>



		</div>

	</div><!-- end container -->


<?php
	get_footer();
?>
