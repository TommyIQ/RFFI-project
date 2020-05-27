<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rffiproject
 */
?>

</div> <!-- main-content -->

<!-- footer -->
<footer class="section footer" id="footer">
	<div class="container">
		<div class="footer__content">

			<div class="footer__element">
				<h3 class="footer__title">Инфо-блок</h3>
				<div class="footer__item">
					<span class="footer__text">Lorem ipsum lorem</span>
					<span class="footer__text">Lorem ipsum lorem</span>
				</div>
			</div>

			<div class="footer__element">
				<h3 class="footer__title">Инфо-блок</h3>
				<div class="footer__item">
					<span class="footer__text">Lorem ipsum lorem</span>
					<span class="footer__text">Lorem ipsum lorem</span>
				</div>
			</div>

			<div class="footer__element">
				<h3 class="footer__title">Инфо-блок</h3>
				<div class="footer__item">
					<span class="footer__text">Lorem ipsum lorem</span>
					<span class="footer__text">Lorem ipsum lorem</span>
				</div>
			</div>

		</div>

		<div class="footer__rights">
			<span class="footer__rights-span">Copyright © <?php echo date("Y"); ?>. Все права защищены.</span>
		</div>
	</div>
</footer>


<?php 
 wp_footer();
?>