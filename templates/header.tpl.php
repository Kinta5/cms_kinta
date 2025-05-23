<!DOCTYPE html>
<html class="">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title><?=(isset($title))?$title:"CMS"?></title>
	<meta name="description" content="<?=isset($description)?$description:''?>">
	<meta name="keywords" content="<?=isset($keywords)?$keywords:''?>">
	<!-- CSS -->
	<link rel="stylesheet" href="<?=BASE_PATH?>/assets/css/tailwind.css" />
	<link rel="stylesheet/less" type="text/css" href="<?=BASE_PATH?>/assets/css/style.less" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
	<!-- JS -->
	<script src="https://cdn.jsdelivr.net/npm/less" ></script>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
	<script type='text/javascript' src='<?=BASE_PATH?>/assets/js/main.js'></script>
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</head>
<body>