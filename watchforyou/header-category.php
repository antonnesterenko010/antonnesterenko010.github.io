<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/png" href="img/favicon.png">
  <link rel="stylesheet" href="css/style.css">
  
  <?php
  wp_head();
  ?>
</head>

<body>
  
  <header class="header-section" id="top">
    <div class="container">
      <nav class="navbar">
        <a href="<?php bloginfo('url') ?>" class="navbar-logo">
          <div class="navbar-logo-card">
            <div class="navbar-logo-card__first">Watch</div>
            <div class="navbar-logo-card__second">You</div>
            <div class="navbar-logo-card__third">for</div>
          </div>

        </a>
        <?php wp_nav_menu( [
          'theme_location'  => 'header-telmenu',
          'container' => null,
          'menu_class'      => 'navbar-phonelist', 
        ] ); ?>
        <button type="button" class="button navbar-button"><img src="https://watchforyou.com.ua/wp-content/themes/watchforyou/assets/img/header/call.svg" alt="Order"><span>Заказать
            звонок</span></button>
        <button type="button" class="button navbar-button__burger"><span></span></button>

        <?php wp_nav_menu( [
          'theme_location'  => 'topmenu',
          'container' => null,
          'menu_class'      => 'navbar-list', 
        ] ); ?>
      </nav>
    </div>
  </header>
  <!-- header section -->
  <button class="recall-button">
  </button>
<div class="page">
  <h1 class="page-title"><?php
  the_title();
  ?></h1>
</div>