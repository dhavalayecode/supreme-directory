<?php get_header();

do_action('dt_page_before_main_content');

global $dt_blog_sidebar_position,$sd_sidebar_class;
$dt_enable_blog_sidebar = esc_attr(get_theme_mod('dt_enable_blog_sidebar', DT_ENABLE_BLOG_SIDEBAR));
if($dt_enable_blog_sidebar){
    $dt_blog_sidebar_position = esc_attr(get_theme_mod('dt_blog_sidebar_position', DT_BLOG_SIDEBAR_POSITION));
    $sd_sidebar_class = 'sidebar-active sidebar-'.$dt_blog_sidebar_position;
}else{
    $dt_blog_sidebar_position = '';
    $sd_sidebar_class = '';
}

?>

        <div class="sd-container">
            <div class="content-box content-single">
                <?php if (!have_posts()) : ?>
                    <div class="alert-error">
                        <p><?php _e('Sorry, no results were found.', 'supreme-directory'); ?></p>
                    </div>
                    <?php get_search_form(); ?>
                <?php endif; ?>
                <header>

                    <div class="featured-area <?php if (is_singular()) { echo "woosingle-featured-area"; } ?>">
                        <div class="featured-img" <?php
                        if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                            $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        }else{
                            $full_image_url[0] = SD_DEFAULT_FEATURED_IMAGE;
                        }
                        ?> style="background-image: url('<?php echo esc_url($full_image_url[0]); ?>');" <?php
                        ?>>

                        </div>
                        <div class="header-wrap">
                            <?php
                            if (is_singular()) {
                                ?>
                                <h1 class="entry-title"><?php the_title(); ?></h1>
                                <?php
                            } elseif (is_shop()) {
                                ?>
                                <h1 class="entry-title"><?php woocommerce_page_title(); ?></h1>
                                <?php
                            } else {
                                ?>
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </header>
                <div class="container woo-container">
                <?php
                woocommerce_content();
                ?>
                </div>
            </div>
        </div>
<?php get_footer(); ?>