<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">

<head>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>404 | OnlyTrade</title>

        <!-- GOOGLE FONTS -->
        <link href="<?php echo base_url() ?>/https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="<?php echo base_url() ?>/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
        <link href="<?php echo base_url() ?>/plugins/simplebar/simplebar.css" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="<?php echo base_url() ?>/plugins/nprogress/nprogress.css" rel="stylesheet" />

        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="css/style.css" />




        <!-- FAVICON -->
        <link href="<?php echo base_url() ?>/images/favicon.png" rel="shortcut icon" />

        <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
        <script src="<?php echo base_url() ?>/plugins/nprogress/nprogress.js"></script>
    </head>

</head>

<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center mt-5">
                <div class="text-center page-404">
                    <h1 class="error-title">404</h1>
                    <p class="pt-4 error-subtitle">Looks like something went wrong.</p>
                    <p class="pt-4 pb-5 font-weight-bold h4">
                        <?php if (ENVIRONMENT !== 'production') : ?>
                            <?= nl2br(esc($message)) ?>
                        <?php else : ?>
                            <?= lang('Errors.sorryCannotFind') ?>
                        <?php endif; ?>
                    </p>
                    <a href="/" class="btn btn-primary btn-pill">Back to Home</a>
                </div>
            </div>
        </div>
    </div>


</body>

</html>