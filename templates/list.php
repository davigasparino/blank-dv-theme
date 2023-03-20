<div class="card mb-4">
    <div class="row g-0">
        <?php
            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
            $col = 12;
        ?>
        <?php if($featured_image): $col = 8; ?>
            <div class="col-md-4">
                <a href="<?echo get_permalink(); ?>">
                    <img src="<?php echo esc_url($featured_image); ?>" class="img-custom-cover" alt="<?php echo esc_attr(the_title()); ?>">
                </a>
            </div>
        <?php endif; ?>

        <div class="col-md-<?php echo esc_attr($col); ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo esc_html(the_title()); ?></h5>
                <p class="card-text"><?php echo esc_html(the_excerpt()); ?></p>
                <p class="card-text"><small class="text-muted"><?php echo esc_html(the_date()); ?></small></p>
                <a href="<?echo get_permalink(); ?>" class="btn btn-outline-dark">Saiba Mais</a>
            </div>
        </div>
    </div>
</div>