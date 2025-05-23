<?php

// Error reporting
error_reporting(E_ALL);

// Start session, if not active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Config + autoload
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/model/BaseModel.php';
require_once __DIR__ . '/model/StructureModel.php';
require_once __DIR__ . '/model/UserModel.php';
require_once __DIR__ . '/model/Template.php';

if (!StructureModel::checkInstall()) {
    StructureModel::install();
}

// Check login
if (!isset($_SESSION['user_id']) && !in_array(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)), array('login', 'install'))) {
    header('Location: '.BASE_PATH.'/login');
    exit;
}

$t = BaseModel::getDict();