<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Log in Horizontal | Dashboard UI Kit</title>
        <meta name="description" content="Dashboard UI Kit">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600" rel="stylesheet">

        <!-- Favicon -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="shortcut icon" href="<?php echo base_url('resources/') ?>favicon.ico" type="image/x-icon">

        <!-- Stylesheet -->
        <link rel="stylesheet" href="<?php echo base_url('resources/') ?>css/main.min.css">
    </head>
    <body class="o-page o-page--center">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <div class="o-page__card o-page__card--horizontal">
            <div class="c-card c-login-horizontal">
                <div class="c-login__content-wrapper">
                    <header class="c-login__header">
                        <a class="c-login__icon c-login__icon--rounded c-login__icon--left" href="#!">
                            <img src="<?php echo base_url('resources/'); ?>img/logo-login.svg" alt="Dashboard's Logo">
                        </a>

                        <h2 class="c-login__title">Sign In</h2>
                    </header>

                    <form class="c-login__content" method="post" action="<?php echo site_url('admin/login_administrator') ?>">
                        <div class="c-field u-mb-small">
                            <label class="c-field__label" for="input1">Email Address</label>
                            <input class="c-input" type="email" name="email" id="email" placeholder="Email">
                        </div>

                        <div class="c-field u-mb-small">
                            <label class="c-field__label" for="input2">Password</label>
                            <input class="c-input" type="password" name="password" id="password" placeholder="Password">
                        </div>

                        <button class="c-btn c-btn--success c-btn--fullwidth" type="submit">Sign in</button>
                    </form>
                </div>

                <div class="c-login__content-image">
                    <img src="<?php echo base_url('resources/'); ?>img/login2.jpg" alt="Welcome to Dashboard UI Kit">

                    <h3>Administrator Login</h3>
                    <p class="u-text-large">Silahkan login untuk mengakses menu administrator dan mulai mengelola web.</p>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url('resources/'); ?>js/main.min.js"></script>
    </body>
</html>
