<div class="test">
	<h1>Привет, <?php if(isset($name)){echo $name; } ?></h1>
	<h2>Вопрос №: <?php if(isset($questions)){echo $questions['number']; } ?></h2>
	<p class="question">
		<?php if(isset($questions)){echo $questions['question']; } ?>
	</p>
	<form action="<?php echo base_url('testing?number=' . ($questions['number']+1) ); ?>" method="post">
		<input type="hidden" name="name" value="<?php if(isset($name)){echo $name; } ?>">
		<input type="hidden" name="id" value="<?php if(isset($id)){echo $id; } ?>">
		<p class="answer">
			<input type="radio" name="answer" value="1"/>
			<?php if(isset($questions)){echo $questions['answer1']; } ?>
		</p>
		<p class="answer">
			<input type="radio" name="answer" value="2"/>
			<?php if(isset($questions)){echo $questions['answer2']; } ?>
		</p>
		<p class="answer">
			<input type="radio" name="answer" value="3"/>
			<?php if(isset($questions)){echo $questions['answer3']; } ?>
		</p>
		<input type="submit" value="Следующий вопрос ->"/>
	</form>
</div>