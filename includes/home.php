<h2>Cadastrar User</h2>

<form method="post">

	<label>User</label>
	<input type="text" name="nome"  placeholder="Digite seu nome">
	<input type="hidden" name="cadastrar">
	<br/>
	<label>Idade</label>
	<input type="text" name="idade"  placeholder="Digite sua idade">
	<br/>
	<label>Sexo</label>
	<input type="text" name="sexo"  placeholder="Digite seu sexo">
	<br/>
	<button type="submit" class="btn btn-default">Cadastrar</button>	
</form>

<br/><br/>



<h2>Lista de Usuários cadastrados</h2>

<table class="table">
	<thead>
		<tr>
			<th>User</th>
			<th>Idade</th>
			<th>Sexo</th>
			<th>Editar</th>
			<th>Excluir</th>
		</tr>
	</thead>
	<tbody>
	<?php 
			$user = new app\models\UserModel;
			$users = $user->read();

			foreach ($users as $user):
	?>
		<tr>
			<td><?php echo $user->nome; ?></td>
			<td><?php echo $user->idade; ?></td>
			<td><?php echo $user->sexo; ?></td>
			<td><a class="btn btn-default" href="?page=editar&editar=true&id=<?php echo $user->id; ?>"/>Editar</td>
			<td><a class="btn btn-default" href="?excluir=true&id=<?php echo $user->id; ?>"/>Excluir</td>
		</tr>
		<?php 	
			endforeach;
		?>
	</tbody>
</table>
