<?php
require_once __DIR__ . '/bootstrap.php';

$model = new UserModel();

if(isset($_POST['password'])) { $user_id = $model->login($_POST['username'], $_POST['password']); }
if((isset($user_id) && $user_id>0) || isset($_SESSION['user_id'])) header('Location: '.BASE_PATH);

include 'templates/header.tpl.php';
include 'templates/login/page.tpl.php';