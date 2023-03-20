        <?php wp_footer(); ?>
        <footer class="py-3 my-4">
            <?php
            $args = array(
                'container'     => '',
                'theme_location'=> 'footer',
                'depth'         => 1,
                'fallback_cb'   => false,
                'add_li_class'  => 'nav-item',
                'link_class'  => 'nav-link px-2 text-muted',
                'menu_class'    => 'nav justify-content-center border-bottom pb-3 mb-3'
            );
            wp_nav_menu($args);
            ?>
            <p class="text-center text-muted">© <?php echo get_the_date() ?> <?php echo get_bloginfo(); ?></p>
        </footer>

    </body>
</html>