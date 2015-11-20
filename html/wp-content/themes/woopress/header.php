<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php global $etheme_responsive, $woocommerce; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    
    <meta name="viewport" content="<?php if($etheme_responsive): ?>width=device-width, initial-scale=1, maximum-scale=2.0<?php else: ?>width=1200<?php endif; ?>"/>
   
	<link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/number-polyfill.min.js"></script>
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
	<title><?php wp_title( '|', true, 'right' );?></title>
		<?php
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );

			wp_head();
		?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'et_after_body' ); ?>

<div id="st-container" class="st-container">

	<nav class="st-menu mobile-menu-block">
		<div class="nav-wrapper">
			<div class="st-menu-content">
				<div class="mobile-nav">
					<div class="close-mobile-nav close-block mobile-nav-heading"><i class="fa fa-bars"></i> <?php _e('Navigation', ETHEME_DOMAIN); ?></div>
					<?php 
						et_get_mobile_menu();						
					?>
					
					<?php if (etheme_get_option('top_links')): ?>
						<div class="mobile-nav-heading"><i class="fa fa-user"></i><?php _e('Account', ETHEME_DOMAIN); ?></div>
						<?php etheme_top_links(array('popups' => false)); ?>
					<?php endif; ?>	
					
					<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('mobile-sidebar')): ?>
						
					<?php endif; ?>	
				</div>
			</div>
		</div>
		
	</nav>
	
	<div class="st-pusher" style="background-color:#fff;">
	<div class="st-content">
	<div class="st-content-inner">
	<div class="page-wrapper fixNav-enabled">
	
		<?php $ht = ''; $ht = apply_filters('custom_header_filter',$ht); ?>
		<?php $hstrucutre = etheme_get_header_structure($ht); ?>

		<?php if (etheme_get_option('fixed_nav')): ?>
			<div class="fixed-header-area fixed-header-type-<?php echo esc_attr($ht); ?>">
				<div class="fixed-header">
					<div class="container">
					
						<div id="st-trigger-effects" class="column">
							<button data-effect="mobile-menu-block" class="menu-icon"></button>
						</div>
						    
						<div class="header-logo">
							<?php etheme_logo(true); ?>
						</div>

						<div class="collapse navbar-collapse">
								
							<?php 
								et_get_main_menu(); 
								et_get_main_menu('main-menu-right');
							?>
							
						</div><!-- /.navbar-collapse -->
						
						<div class="navbar-header navbar-right">
							<div class="navbar-right">
					            <?php if(class_exists('Woocommerce') && !etheme_get_option('just_catalog') && etheme_get_option('cart_widget')): ?>
				                    <?php etheme_top_cart(); ?>
					            <?php endif ;?>
						            
								<?php if(etheme_get_option('search_form')): ?>
									<?php etheme_search_form(); ?>
								<?php endif; ?>

							</div>
						</div>
						
						<div class="modal-buttons">
							<?php if (class_exists('Woocommerce') && etheme_get_option('top_links')): ?>
	                        	<a href="#cartModal" class="popup-btn shopping-cart-link hidden-lg">&nbsp;</a>
							<?php endif ?>
							<?php if (is_user_logged_in() && etheme_get_option('top_links')): ?>
								<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" class="my-account-link hidden-lg">&nbsp;</a>
							<?php elseif(etheme_get_option('top_links')): ?>
								<a href="#loginModal" class="popup-btn my-account-link hidden-lg">&nbsp;</a>
							<?php endif ?>
							
							<?php if(etheme_get_option('search_form')): ?>
								<?php etheme_search_form(); ?>
							<?php endif; ?>
						</div>
							
					</div>
				</div>
			</div>
		<?php endif ?>
		
		<?php get_template_part('headers/header-structure', $hstrucutre); ?>