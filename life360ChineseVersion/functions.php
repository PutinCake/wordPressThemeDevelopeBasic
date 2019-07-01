<?php 



/**
 * 截取正文
 * @param int $len   要截取的字符数量
 * @param string $suffix    如果发生截取，添加什么标记
 * @return string   
 */
function life_strim_post_content($len = 100, $suffix = '...') {
 
    // 获取正文信息，并做必要处理
    $content = get_the_content();
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    
    // 去除正文中的HTML标签
    $content = strip_tags($content);
    
    if ( mb_strlen($content) <= $len ) {
    // 字符数量少于要截取的长度，则展示全部
    return $content;
    } else {
    // 截取指定长度的字符
    return $content = mb_substr( $content, 0, $len ) . $suffix;
    }
   }


/**
 * 增加谁回复谁
 * 所有用到的钩子信息——
 *  apply_filters( 'get_comment_author_link', $return, $author, $comment->comment_ID );
 * @param string $out 未修改的评论数据，即wordpress默认提供的数据
 * @param int $comment_id 评论的编号
 * @return string
 */
function life_who_resp_who($out, $author, $comment_id) {
    $comment = get_comment($comment_id);
    // 如果没有父级评论，则正常返回，因为没有回复关系
    if ( empty($comment->comment_parent) ) {
    return $out;
    }
    /**
        * 如果有父级评论，则添加回复关系
        */
       // 获取父（原）评论
    $parent = get_comment($comment->comment_parent);
       // 获取父（原）评论作者
       $pauthor = get_comment_author($parent);
       // 构件回复关系
    $pcid = '#comment-' . $parent->comment_ID;
       $new = $out . ' 回复 '. "<a href='{$pcid}'>{$pauthor}</a>";
       // 返回修改后的评论数据
    return $new;
   }
   add_filter('get_comment_author_link', 'life_who_resp_who', 10, 3);


/**
 * 设置文章/页面 浏览次数
 * _wordpresskt_postviews是自定义栏目的名字
 * @param int $post_id  文章的ID编号
 */
function life_set_postviews($post_id) {
    // 详情页才处理
    if ( is_singular() && ! empty( $post_id ) ) {
        $views = get_post_meta($post_id, '_life_postviews', true);
        $views = ! empty( $views ) ? $views : 0;
        $views++;
        update_post_meta($post_id, '_life_postviews', $views);
    }
   }
    
   /**
    * 获取文章/页面 浏览次数
    * @param int 文章的ID编号
    * @return int 浏览次数
    */
   function life_get_postviews( $post_id ) {
    if ( ! empty( $post_id ) ) {
        $views = get_post_meta($post_id, '_life_postviews', true);
        $views = ! empty( $views ) ? (int)$views : 0;
        return $views;
    }
   }


/**
 * 加载自定义的菜单输出控制类文件
 */
function life_load_self_nav_walker() {
    // 加载walker类
 include get_theme_file_path() . '/inc/my-nav-walker.php';
}
add_action( 'after_setup_theme', 'life_load_self_nav_walker' );


/**
 * 获取用户当前访问的网址
 */
function life_get_current_url() {
    global $wp, $wp_rewrite;
    
    // 获取重写规则，朴素模式规则为空
    $rewrite = $wp_rewrite->wp_rewrite_rules();
    
    // 非朴素模式下，返回当前网址
    if ( !empty($rewrite) ) {
    return home_url( $wp->request );
    }
    
    // 在朴素模式下，返回当前网址
    return home_url( '?' . $wp->query_string );
       
   }




/**
 * 引入css和js文件
 */
function life_style(){
    wp_enqueue_style('main-css', get_theme_file_uri() . '/assets/css/app.css');

    wp_enqueue_script( 'require', get_theme_file_uri() .'/assets/js/require.js', array(), '', true);
    wp_enqueue_script( 'config', get_theme_file_uri() .'/assets/js/config.js', array(), '', true);
    wp_enqueue_script( 'app', get_theme_file_uri() .'/assets/js/app.js', array(), '', true);
    //嵌套评论设置
    if ( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'life_style');




//开启主题功能
function life_setup(){
    //页面标题
    add_theme_support('title-tag');
    //特色图像
    add_theme_support( 'post-thumbnails');
    //注册导航位置
    register_nav_menus(array(
        'nav-1' => '顶部导航',
        'nav-2' => '底部导航'
    ));

}
add_action('after_setup_theme', 'life_setup');



//开启边栏
function life_sidebar(){
    register_sidebar( array(
        'name'          => 'Sidebar1',
        'id'            => 'sidebar-1',
        'description'   => '第1个边栏',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
) );
}
add_action('widgets_init', 'life_sidebar')





?>