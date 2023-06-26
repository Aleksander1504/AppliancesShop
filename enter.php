<?php
include('includes/base.php');
$header = "Войти & Регистрация";
$bread = '<a class="breadcrumb-item" href="index.php">Главная</a>
                                  <span class="brd-separetor">/</span>
                                  <span class="breadcrumb-item active">Войти & Регистрация</span>';


$includes['center_file']='includes/center/enter.php'; // путь к файлу центра страницы
include('includes/templates.php');
?>