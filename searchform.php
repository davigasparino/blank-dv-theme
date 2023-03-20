

<form class="d-flex search-form" role="search" method="get" action="<?php home_url( '/' ); ?>">
    <input class="form-control me-2" name="s" type="search" placeholder="Search" aria-label="Search" value="<?php get_search_query(); ?>">
    <input type="hidden" value="post" name="post_type" id="post_type">
    <button class="btn btn-outline-dark" type="submit">Search</button>
</form>