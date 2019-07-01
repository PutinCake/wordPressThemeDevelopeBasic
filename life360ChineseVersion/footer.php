<footer id="footer">
		<div class="container-fluid">
			<?php wp_nav_menu(array (
				'theme_location' => 'nav-2',
				'container' => '',
				'menu_class' => 'footer-nav'
			)) ; ?>

			<p class="copy">
				Copyright © 2019 life360 版权所有 华ICP备9999999号
			</p>
		</div>
	</footer>

	<div class="back2top">
		<span class="fa fa-angle-up"></span>
	</div>

    <?php wp_footer() ?>
</body>

</html>