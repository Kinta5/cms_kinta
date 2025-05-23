<?php
require_once __DIR__ . '/bootstrap.php';

$model = new UserModel();

if(isset($_POST['password'])) { $user_id = $model->createUser($_POST); }

include 'templates/header.tpl.php';
include 'templates/install/page.tpl.php';