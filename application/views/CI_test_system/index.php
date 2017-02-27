<?php 
	echo form_open(base_url('login'),'class="login"'); 
?>
<!-- <form action="#" method="post" class="login"> -->
	<p>Введите имя:</p>
	<input type="text" name="name" placeholder="Вася"/>
	<input type="submit" value="Пройти тест">
<!-- </form> -->
<?php echo form_close(); ?>