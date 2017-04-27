<!doctype html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta name="description" content="" >

        <meta name="author" content="">

        <meta name="viewport" content="initial-scale=0">

        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

        <title>Phone Repair Administration</title>

        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/dataTables.bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap-theme.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap-switch.min.css">

        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/adminstyle.css">

        <link href='http://fonts.googleapis.com/css?family=Yesteryear' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap-select.min.css">



        <script src="<?php echo asset_url(); ?>js/jquery-1.11.3.min.js"></script>

        <script src="<?php echo asset_url(); ?>js/jquery.validate.min.js"></script>

        <script src="<?php echo asset_url(); ?>/js/bootstrap.min.js"></script>



        <!--[if lt IE 9]>

                <script src="js/html5shiv.js"></script>

        <![endif]-->

        <script type="text/javascript">

             var current_url="<?php echo current_url(); ?>";

             var base_url="<?php echo base_url(); ?>";

        </script>

   

    </head>

    <body >

        <header id="ccr-header">

            <section id="ccr-site-title">

                <div class="container main">

                    <div class="site-logo col-md-12 col-sm-12 col-xs-12 padding0" >

                        <a href="<?php echo base_url(); ?>" class="navbar-brand">                           

                        </a>

                    </div>

                </div>

            </section> <!-- / #ccr-site-title -->

        </header> <!-- /#ccr-header -->

        <section id="ccr-main-section"  style="margin-top: 20px;">

            <div class="container main">

                <?php $this->load->view('admin/nav'); ?>

            </div>

            <div class="container">