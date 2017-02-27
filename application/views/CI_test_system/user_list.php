<ul class="list-group">
<?php foreach ($users as $key => $value):?>

	<li class="list-group-item">

	<div class="row">
		<div class="col-md-10 col-sm-10 col-xs-10">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">Имя:</div>
				<div class="col-md-6 col-sm-6 col-xs-6"><?php echo $value['name']; ?></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-6">Пароль:</div>
				<div class="col-md-6 col-sm-6 col-xs-6"><?php echo $value['password']; ?></div>
			</div>
		</div>
		
		<div class="col-md-2 col-sm-2 col-xs-2">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					<a href="#" class="btn btn-xs btn-primary">test<!-- <i class="fa fa-plus"></i> --></a>
					<a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
			</div>
			
		</div>
			
	</div>
		
	</li>
<?php endforeach; ?>
</ul>