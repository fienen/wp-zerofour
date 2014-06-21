<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */
?>

			<div id="footer-wrapper">
				<footer id="footer" class="container">
					<div class="row">
						<div class="3u">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : 
							dynamic_sidebar( 'footer-1' ); 
						endif; ?>
						</div>  <!-- .3u -->

						<div class="3u">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : 
							dynamic_sidebar( 'footer-2' ); 
						endif; ?>
						</div>  <!-- .3u -->

						<div class="6u">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : 
							dynamic_sidebar( 'footer-3' ); 
						endif; ?>
							<!-- Contact -->
								<section>
									<h2>Get in touch</h2>
									<div>
										<div class="row">
											<div class="6u">
												<dl class="contact">
													<dt>Twitter</dt>
													<dd><a href="http://twitter.com/n33co">@n33co</a></dd>
													<dt>Dribbble</dt>
													<dd><a href="http://dribbble.com/n33">dribbble.com/n33</a></dd>
													<dt>WWW</dt>
													<dd><a href="http://n33.co">n33.co</a></dd>
													<dt>Email</dt>
													<dd><a href="mailto:aj%20-at-%20n33.co">aj -at- n33.co</a></dd>
												</dl>
											</div>
											<div class="6u">
												<dl class="contact">
													<dt>Address</dt>
													<dd>
														1234 Fictional Rd<br />
														Nashville, TN 00000-0000<br />
														USA
													</dd>
													<dt>Phone</dt>
													<dd>(000) 000-0000</dd>
												</dl>
											</div>
										</div>
									</div>
								</section>
						
						</div>  <!-- .6u -->
					</div>  <!-- .row -->

					<div class="row">
						<div class="12u">
							<div id="copyright">
								Site content &copy; <?php bloginfo( 'name' ); ?>. All rights reserved | Images: <a href="http://fotogrph.com/">fotogrph</a> | Theme: <a href="http://about.me/michaelfienen">Michael Fienen</a> | Design: <a href="http://html5up.net/">HTML5 UP</a>
							</div>  <!-- #copyright -->
						</div>  <!-- .12u -->
					</div>  <!-- .row -->
				</footer>
			</div>  <!-- #footer-wrapper -->
<?php
$gaID = get_option( 'gaID' );
if( isset( $gaID ) :
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $gaID; ?>', '<?php echo $_SERVER['SERVER_NAME']; ?>');
  ga('send', 'pageview');

</script>
<?php endif; ?>			

<?php wp_footer(); ?>
	</body>
</html>