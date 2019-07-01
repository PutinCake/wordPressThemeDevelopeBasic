<?php get_header(); ?>

	<div class="container-fluid site-content" id="content">
		<div class="row">
            <div class="col-md-9 pdfix">
                <div class="content-area">
                    <!-- <div class="theiaStickySidebar"> -->
                    <main class="site-main">
					<!--设置浏览次数更新-->
					<?php life_set_postviews( get_queried_object_id() ); ?>
					<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post(); ?>
						<!--使用wordpress生成的class属性值-->
							<article <?php post_class() ; ?> >
								<header class="entry-header">
									<h1 class="entry-title"><?php the_title(); ?></h1>
									<div class="entry-meta">
										<a class="author-info"
											href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"
											<?php echo get_avatar( get_the_author_meta('ID'), 24); ?>
											<?php the_author() ?> </a>
										<span class="dot">•</span>
										<span class="fa fa-clock-o"></span><?php the_time('Y-m-d'); ?> <span class="dot">•</span>

										<!--详情页部分，有点难度-->
										<?php if (is_single() && !is_attachment() ) :?>
                                        	<?php the_category(','); ?> 
											<span class="dot">•</span>
										<?php endif; ?>							 
										<span class="fa fa-eye"></span><?php echo life_get_postviews( get_the_ID() ); ?>  </div><!-- .entry-meta -->
								</header><!-- .entry-header -->

								<div class="entry-content">
									<?php if( has_post_thumbnail() ): ?>
										<?php the_post_thumbnail('full'); ?>
									<?php endif; ?>
									<?php the_content(); ?>
								</div><!-- .entry-content -->

								<footer class="entry-footer">
									<div class="taglist">
										<a href="http://localhost/wp01/tag/content-2/" rel="tag">content</a> <a href="http://localhost/wp01/tag/read-more/" rel="tag">read more</a> <a href="http://localhost/wp01/tag/template/" rel="tag">template</a>                                                
									</div>
									<div class="postsnav">
										<div class="prev">
											<span>上一篇：</span> <a
												href="http://192.168.2.244/test/wordpress/wp-05/2019/04/03/%e4%b8%ba%e4%bb%80%e4%b9%88%ef%bc%8c%e5%8f%aa%e6%9c%89%e4%b8%ad%e5%9b%bd%e4%ba%ba%e6%89%8d%e9%9c%80%e8%a6%81%e5%8f%8c%e5%8d%a1%e5%8f%8c%e5%be%85%e6%89%8b%e6%9c%ba%ef%bc%9f%e7%9c%9f%e7%9b%b8%e5%85%b6/"
												rel="prev">为什么，只有中国人才需要双卡双待手机？真相其实很简单！</a> </div>
										<div class="next">
										</div>
									</div>
								</footer>
								<!-- .entry-footer -->
							</article>


							<div id="comments-area" class="entry-comments">

								<!-- You can start editing here. -->


								<!-- If comments are open, but there are no comments. -->


								<div id="respond" class="comment-respond">
									<h3 id="reply-title" class="comment-reply-title">发表评论 <small><a rel="nofollow"
												id="cancel-comment-reply-link"
												href="/test/wordpress/wp-05/2019/04/03/%e4%b8%8a%e7%8f%ad%e8%a2%ab%e5%85%ac%e5%8f%b8%e9%80%bc%e7%9d%80996%ef%bc%8c%e6%80%8e%e4%b9%88%e5%8a%9e%ef%bc%9f/#respond"
												style="display:none;">取消回复</a></small></h3>
									<form action="http://192.168.2.244/test/wordpress/wp-05/wp-comments-post.php"
										method="post" id="commentform" class="comment-form">
										<p class="logged-in-as"><a
												href="http://192.168.2.244/test/wordpress/wp-05/wp-admin/profile.php"
												aria-label="已登入为admin。编辑您的个人资料。">已登入为admin</a>。<a
												href="http://192.168.2.244/test/wordpress/wp-05/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2F192.168.2.244%2Ftest%2Fwordpress%2Fwp-05%2F2019%2F04%2F03%2F%25e4%25b8%258a%25e7%258f%25ad%25e8%25a2%25ab%25e5%2585%25ac%25e5%258f%25b8%25e9%2580%25bc%25e7%259d%2580996%25ef%25bc%258c%25e6%2580%258e%25e4%25b9%2588%25e5%258a%259e%25ef%25bc%259f%2F&amp;_wpnonce=edb96aa2fb">登出？</a>
										</p>
										<p class="comment-form-comment"><label for="comment">评论</label> <textarea
												id="comment" name="comment" cols="45" rows="8" maxlength="65525"
												required="required"></textarea></p>
										<p class="form-submit"><input name="submit" type="submit" id="submit" class="submit"
												value="发表评论" /> <input type='hidden' name='comment_post_ID' value='1815'
												id='comment_post_ID' />
											<input type='hidden' name='comment_parent' id='comment_parent' value='0' />
										</p><input type="hidden" id="_wp_unfiltered_html_comment_disabled"
											name="_wp_unfiltered_html_comment_disabled" value="2444857e5f" />
										<script>(function () { if (window === window.parent) { document.getElementById('_wp_unfiltered_html_comment_disabled').name = '_wp_unfiltered_html_comment'; } })();</script>
									</form>
								</div><!-- #respond -->
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
                    </main>
                    <!-- </div> -->
                </div>

            </div>
			<?php get_sidebar() ?>
		</div>
	</div>

<?php get_footer() ;?>