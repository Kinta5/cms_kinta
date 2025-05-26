<?php 
require_once __DIR__ . '/bootstrap.php';

$model = new StructureModel();

/* AJAX */
if(isset($_POST['column_data'])) {
   $column = $_POST['column_data'];
   include __DIR__ .'/templates/create-table/column.tpl.php';
   exit;
}

/* FORM */
if(isset($_POST['column'])) {
   var_dump($_POST);
}

include 'templates/header.tpl.php';
include 'templates/create-table/page.tpl.php';