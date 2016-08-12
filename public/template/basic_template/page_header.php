<?php
defined('SAFE_CALL') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title><?php echo $page_title; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo $base_url .constant('ASSETS_DIR'); ?>css/bootstrap.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?php echo $base_url .constant('ASSETS_DIR'); ?>css/html5shiv.min.js"></script>
          <script src="<?php echo $base_url .constant('ASSETS_DIR'); ?>css/respond.min.js"></script>
        <![endif]-->
        <!--		background-color: #FF5F01; -->
        <style>
            .row-padded {
                font-style:oblique;
                size : 20px;
            }
            h4{
                color: #000000
            }
        </style>
    </head>
    <body>
        <div id="container">
            <div class="row text-center">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10 text-center">