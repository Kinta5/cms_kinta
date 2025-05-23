<?php

dibi::connect([
    'driver'   => 'mysqli',
    'host'     => 'localhost',
    'username' => 'root',
    'password' => '',       
    'database' => 'cms_kinta',
    'charset'  => 'utf8mb4',
]);

define('BASE_PATH', 'http://localhost/cms_kinta');
