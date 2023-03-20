<?php get_template_part('includes/header-page'); ?>

<?php $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>
<?php if($featured_image): ?>
    <div class="container-fluid ">
        <div class="img-container position-relative height-400">
            <img src="<?php echo esc_url($featured_image); ?>" class="img-custom-cover position-absolute" alt="<?php get_the_title(); ?>">
        </div>
    </div>
<?php endif; ?>
<div class="container pt-4 pb-4">
        <div class="row">
            <div class="col-12 col-md-10 pe-md-4">
                <h1 class="display-4 mb-5 pb-3 border-bottom"><?php the_title(); ?></h1>
                <div class="taxonomies pb-5">
                    <?php
                    $taxonomies = get_the_terms(get_the_ID(), 'category');
                    foreach ($taxonomies as $tax): ?>
                        <a href="<?php echo esc_url( get_term_link($tax->term_id) ); ?>" class="btn btn-outline-dark btn-sm"><?php echo esc_html($tax->name); ?></a>
                    <?php endforeach; ?>
                </div>

                <?php the_content(); ?>

                <div class="tags pt-5 pb-5">
                    <?php
                    $tags = get_the_terms(get_the_ID(), 'post_tag');
                    foreach ($tags as $tag): ?>
                        <a href="<?php echo esc_url( get_term_link($tag->term_id) ); ?>" class="btn btn-outline-dark btn-sm"><?php echo esc_html($tag->name); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-12 col-md-2 bg-light">
                <?php get_sidebar('posts'); ?>
            </div>
        </div>
    </div>
<?php get_template_part('includes/footer-page') ?>