<?php get_header() ;?>

	<div class="container-fluid site-content" id="content">
		<div class="row">
            <div class="col-md-9 pdfix">
                <div class="content-area">
                    <main class="site-main">
                        <header class="list-header">
                            <h1>
                    
                            <span>Search Result of "<?php  echo get_search_query(); ?>" </span>
                            </h1>
                        </header>

                        <?php if(have_posts() ) : ?>
                            <?php while(have_posts()): the_post() ;?>
                                <article class="postlist-item">
                                    <div class="post-img">
                                        <!--图片 -->
                                        <a href="<?php the_permalink() ;?>">
                                            <?php if(has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('thumbnail'); ?>
                                                <?php else :?>
                                                    <img src="<?php echo get_theme_file_uri(); ?>/assets/img/default-thumbnail.png ">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title">
                                            <a
                                                href="<?php the_permalink() ;?>"><?php the_title() ;?></a>
                                        </h2>
                                        <p class="post-des">
                                            <!--判断有没有摘要-->
                                            <?php if(has_excerpt() ): ?>
                                                <?php echo get_the_excerpt(); ?>
                                                <?php else:?>
                                                <?php life_strim_post_content(); ?>
                                            <?php endif ;?>
                                        </p>
                                        <div class="post-meta">
                                            <div class="post-meta-it author">
                                                <!--访问作者归档页 -->
                                                <a class="avatar"
                                                
                                                    href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>">
                                                    <?php echo get_avatar( get_the_author_meta('ID'), 24); ?> </a>
                                                <a class="nickname"
                                                    href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>">
                                                    <?php the_author() ;?> </a>
                                            </div>

                                            <span class="post-meta-it dtime">
                                                <i class="fa fa-clock-o"></i><?php the_time('Y-m-d'); ?> </span>
                                            <span class="post-meta-it cats">
                                                
                                                <?php the_category(','); ?> 
                                                
										       
                                            </span>
                                            <span class="post-meta-it views">
                                                <i class="fa fa-eye"></i><?php echo life_get_postviews( get_the_ID() ); ?></span>
                                        </div>
                                    </div>
                                </article>
                            <?php endwhile ;?>
                        <?php endif ;?>
                     
                    

                        <div class="posts-nav">
                           	
                            <?php the_posts_pagination(); ?>
                        </div>
                    </main>
                </div>
            </div>
			<?php get_sidebar() ;?>
		</div>
	</div>

<?php get_footer() ;?>