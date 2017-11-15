<footer class="space-default footer default">
<div class="container">
	<div class="column">
		<div class="sm-4-12">
			<div class="footer-item">
				<h3 class="footer-title">Super Components</h3>
				<p>
					TMT Engenharia orem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptas possimus, culpa
					spernatur fugiat atque odio.
				</p>
			</div>
		</div>
		<div class="sm-4-12">
			<div class="nav-footer  footer-item">
				<h3 class="footer-title">Mapa do Site</h3>
				<?php $let = array(
					'menu' => 'primary',
					'menu_class' => 'nav-list',
					'container' => 'nav',
					'container_class' => 'nav-content'
				);
				wp_nav_menu($let); ?>
			</div>
		</div>
		<div class="sm-4-12">
			<div class="footer-social footer-item">
				<h3 class="footer-title font-libre">Nossas Redes Sociais</h3>
				<div class="icon">
					<a href="#">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						facebook.com.br/arena-offline
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</footer>

		<?php wp_footer(); ?>
	</body>
</html>
