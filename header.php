<?php
  if (isset($_GET['anchore'])){
    $anchore = $_GET['anchore'];
    $url = str_replace('anchore=' . $anchore, '', $_SERVER['REQUEST_URI']);
    header('Location: ' . $url . '#' . $anchore);
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1" />
  <meta name="viewport" content="minimal-ui">
  <!-- Apple device hack starts -->
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
  <!-- Apple device hack ends -->
  <meta name="format-detection" content="telephone=no">
  
  <meta name="keywords" content="" />
  <meta name="description" content="Описание сайта для поисковых систем">
  <title>TEST</title>

  <link rel="icon" href="<?php bloginfo('template_directory'); ?> /favicon.ico">



  <!-- <link href="<?php bloginfo('template_directory'); ?>/css/lightbox.css" rel="stylesheet"> -->
  <!-- <link href="<?php bloginfo('template_directory'); ?>/css/jquery.bxslider.css" rel="stylesheet"> -->
  
  <link href="<?php bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>
<body>