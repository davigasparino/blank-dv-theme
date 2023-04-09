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
            <?php get_search_form(); ?>
            <button type="button" class="btn btn-outline-dark border-0" data-bs-target="#mdLogin" data-bs-toggle="modal"><span class="material-symbols-outlined">account_circle</span></button>
            <div class="modal fade" style="z-index: 99;" id="mdLogin" aria-hidden="true" aria-labelledby="mdLoginLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="mdLoginLabel">Login</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="loginUsers" class="row g-3 needs-validation" novalidate>
                                <div class="mb-3">
                                    <label for="usermail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="usermail" aria-describedby="emailHelp" value="jhowlett@gmail.com"required>
                                    <div id="emailHelp" class="form-text">Well never share your email with anyone else.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="userpass" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="userpass" value="123456789" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="userRemember">
                                    <label class="form-check-label" for="userRemember">Salvar credenciais</label>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-outline-dark" type="button" id="loginSend">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Entrar
                            </button>
                            <button class="btn btn-outline-dark" type="button" id="userLogout">
                                <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                Sair
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</nav>