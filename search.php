<?php get_template_part('includes/header-page');?>
    <div class="container pt-4 pb-4">
        <div class="row">
            <div class="col-12 col-md-10 pe-md-4">
                <?php if( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part('templates/list');
                    endwhile;?>
                    <nav>
                        <?php echo dv_bootstrap_paginate_links(); ?>
                    </nav>
                <?php endif; ?>
            </div>
            <div class="col-12 col-md-2 bg-light">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_template_part('includes/footer-page') ?>