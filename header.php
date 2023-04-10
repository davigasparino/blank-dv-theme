<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<?php wp_head(); ?>
</head>
<body>
<?php
$logo = get_bloginfo();

if(!empty(get_custom_logo())){
    $logo = get_custom_logo();
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top shadow mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $logo; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php do_action('dv_blank_navbar_coll'); ?>
        </div>

    </div>
</nav>