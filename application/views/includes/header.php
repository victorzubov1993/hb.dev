<!DOCTYPE html>
<html lang="ru">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="shortcut icon" href="<?=base_url()."/assets/ico/favicon.ico"?>">
      <title>Домашняя бухгалтерия</title>
      <!-- Bootstrap core CSS -->
      <link href="<?=base_url()."assets/css/bootstrap.min.css?231е4"?>" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="<?=base_url()."assets/css/bootstrap-datepicker3.css"?>" rel="stylesheet">
      <script src="<?=base_url()."assets/js/jquery-1.10.2.js"?>"></script>
      <script src="<?=base_url()."assets/js/bootstrap.js"?>"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
      <script src="<?=base_url()."assets/js/bootstrap-datepicker.js"?>"></script>
      <script src="http://bootstrap-ru.com/204/assets/js/bootstrap-tab.js"></script>
      <script src="<?=base_url()."assets/js/my.js"?>"></script>
      
      <style id="holderjs-style" type="text/css">
      </style>
   </head>
   <body>
      <div class="navbar navbar-inverse" role="navigation">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="http://hb.dev/">HB.DEV</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="http://hb.dev/">Главная</a></li>
                  <li class=""><a href="http://hb.dev/main/report">Отчеты</a></li>
                  <li class=""><a href="http://traty.dev/?controller=budget&amp;action=view">Бюджет</a></li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">Настройки<b class="caret"></b></a>
                     <ul class="dropdown-menu">
                        <li class=""><a href="http://traty.dev/?controller=category&amp;action=view">Категории</a></li>
                        <li class=""><a href="http://traty.dev/?controller=family&amp;action=view">Мой профайл</a></li>
                        <li class="divider"></li>
                        <li class=""><a href="http://traty.dev/?controller=user&amp;action=logout">Выйти</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
      </div>