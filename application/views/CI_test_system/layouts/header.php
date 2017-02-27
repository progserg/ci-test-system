<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-theme.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js'); ?>"></script>
</head>
<body>
<header>
	<div id="logo"></div>
	<div class="logo_menu">
		<ul>
			<li><a href="<?php echo base_url(''); ?>">Начать тест сначала</a></li>
			<li><a href="/index.php?view=welcome">Начать под новым именем</a></li>
			<li><a href="<?php echo base_url('results'); ?>">Просмотреть все результаты</a></li>
		</ul>
	</div>
</header>
<div class="wrapper">
	<div class="main">
	<?php if(validation_errors()!=null):?>
	<div class="label-danger img-rounded errors">
		<?php echo validation_errors(); ?>	
	</div>
	<?php endif; ?>
	<?php if(isset($success)): ?>
		<div class="label-success img-rounded errors">
		<?php echo $success; ?>	
		</div>
	<?php endif; ?>