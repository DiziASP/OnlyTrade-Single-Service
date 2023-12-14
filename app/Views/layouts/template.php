<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>OnlyTrade | Management System</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
    <link href="<?php echo base_url() ?>/plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>/plugins/simplebar/simplebar.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="<?php echo base_url() ?>/plugins/nprogress/nprogress.css" rel="stylesheet" />


    <link href="<?php echo base_url() ?>/plugins/prism/prism.css" rel="stylesheet" />


    <!-- MONO CSS -->
    <link id="main-css-href" rel="stylesheet" href="<?php echo base_url() ?>/css/style.css" />

    <!-- FAVICON -->
    <link href="<?php echo base_url() ?>/images/icon.png" rel="shortcut icon" />

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


<body class="navbar-fixed sidebar-fixed" id="body">
    <script>
        NProgress.configure({
            showSpinner: false
        });
        NProgress.start();
    </script>



    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>

        <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
        <div class="page-wrapper">

            <!-- Header -->
            <?php include 'header.php'; ?>

            <!-- ====================================
            ——— CONTENT WRAPPER
            ===================================== -->
            <div class="content-wrapper">
                <div class="content">
                    <?= $this->renderSection('content') ?>
                </div>

            </div>

            <!-- Footer -->
            <?php include 'footer.php'; ?>

        </div>
    </div>





    <script src="<?php echo base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>/plugins/simplebar/simplebar.min.js"></script>
    <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



    <script src="<?php echo base_url() ?>/plugins/prism/prism.js"></script>


    <script src="<?php echo base_url() ?>/js/mono.js"></script>
    <script src="<?php echo base_url() ?>/js/chart.js"></script>
    <script src="<?php echo base_url() ?>/js/map.js"></script>
    <script src="<?php echo base_url() ?>/js/custom.js"></script>




    <!--  -->


</body>

</html>