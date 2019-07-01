
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
	
</head>

<body class="post-template-default single single-post postid-1815 single-format-standard logged-in">
	<header class="navbar navbar-fixed-top wpkt-header" id="masthead">
		<div class="container-fluid">
			<div class="row">
				<div class="navbar-header">
					<button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#primary"
						aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="<?php bloginfo('url'); ?>" class="navbar-brand"><?php bloginfo('name') ?></a>
				</div>
				<nav id="primary" class="collapse navbar-collapse">
				<?php
					//调取顶部菜单
					wp_nav_menu(array(
						'theme_location' => 'nav-1',
						'container' => '',
						'fallback_cb' => null,
						'walker' => new Life_Nav_Walker(),
						'menu_class' => 'nav navbar-nav'
					)); ?>
				
					<ul class="nav narbar-nav navbar-right">
						<li class="login-out">
							<a href="<?php echo wp_registration_url(); ?> ">注册</a> | <a
								href="<?php echo wp_login_url( life_get_current_url()  ); ?>">登录</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>