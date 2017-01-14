<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package indvatx
 */

?>

	</div><!-- #content -->


</div><!-- #page -->

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container row">
	<?php
		// Check to see if there are any sidebars in the footer
		if(is_active_sidebar('footer')) {
			$footerColumns = array();
			array_push($footerColumns, 'footer');
			if(is_active_sidebar('footer-2')) { array_push($footerColumns, 'footer-2'); }
			if(is_active_sidebar('footer-3')) { array_push($footerColumns, 'footer-3'); }
			if(is_active_sidebar('footer-4')) { array_push($footerColumns, 'footer-4'); }

			$numCols = count($footerColumns);
			$colWidth = 12/$numCols;

			for ($i=0; $i < $numCols; $i++) {
				echo "<div class='col-md-$colWidth'>";
				dynamic_sidebar($footerColumns[$i]);
				echo "</div>";
			}
		}
	?>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
