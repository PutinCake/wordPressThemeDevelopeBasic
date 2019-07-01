<?php get_header() ;?>

    <div class="container-fluid site-content" id="content">
        <div class="error-page">
            <img src="<?php echo get_theme_file_uri() ;?> ./assets/img/404.jpg">
            <p><a href="<?php bloginfo("url") ;?>" class="error-btn">回到首页</a></p>
        </div>
    </div>
<?php get_footer(); ?>