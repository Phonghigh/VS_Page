<?php
global $theme_uri;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $theme_uri; ?>/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    <script src="<?= $theme_uri; ?>/js/jquery-3.6.0.min.js"></script>
    <title>Web bán hàng</title>
</head>
<body>
    <?php get_template_part('template-parts/header/header','top-bar') ?>
    <!-- Header Top -->
    <?php get_template_part('template-parts/header/header','main') ?>
    <!-- Header Main -->
    <?php get_template_part('template-parts/header/header','bottom') ?>
    <!-- Header bottom -->
    <?php get_template_part('template-parts/header/header','slider') ?>
    <!-- Header slider -->
    
    