</div>

<div class="row">
	<div class="twelve columns">
		<div class="navbar" id="nav2" role="navigation">
			<div class="row">
				<a class="toggle" gumby-trigger="#nav2 ul.menu" href="#"><i class="icon-menu"></i></a>
				<?php wp_nav_menu( array( 'theme_location' => 'footermenu', 'container' => false, 'walker' => new Walker_Page_Custom ) ); ?>
			</div>
		</div>
	</div>
</div>

<footer class="row">
	<div class="nine columns">
		&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> • <em><?php bloginfo('description'); ?></em>
	</div>
	<div class="three columns">
		<small class="alignright">Site by <a href="http://prydonian.digital/" target="_blank">Prydonian Digital</a></small>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>