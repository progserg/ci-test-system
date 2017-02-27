<table class="table">
	<thead>
	<th>
		Имя
	</th>
	<th>
		Время начала теста
	</th>
	<th>
		Время окончания теста
	</th>
	<th>
		Результат
	</th>
	</thead>
	<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['time_start']; ?></td>
			<td><?php echo $user['time_stop']; ?></td>
			<td><?php echo $user['user_result']; ?></td>

		</tr>
	<?php endforeach; ?>
</table>