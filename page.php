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
                <?php the_content(); ?>
            </div>
            <div class="col-12 col-md-2 bg-light">
                <?php get_sidebar('pages'); ?>
            </div>
        </div>
    </div>
<?php get_template_part('includes/footer-page'); ?>