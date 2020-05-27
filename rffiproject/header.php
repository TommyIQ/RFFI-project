<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rffiproject
 */
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php the_title(); ?></title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
	
	<?php  wp_head(); ?>
</head>

<body>


<!-- header -->
<header class="header">
	<div class="container">
		<div class="header__content">

			<div class="header__left">
				<a href="/" class="header__logo">Logo</a>
			</div>

			<?php 
				wp_nav_menu(array(
					'theme_location'  => 'homepage-menu',
					'container'       => false,
					'menu_class'      => 'header__menu'
				)); 
			?>

			<div class="header__burger">
				<span class="header__burger-elem"></span>
				<span class="header__burger-elem"></span>
				<span class="header__burger-elem"></span>
			</div>

		</div>
	</div>
</header>

<div class="main-content">
