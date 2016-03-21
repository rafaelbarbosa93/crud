<?php 

	if(isset($_GET['editar']) && $_GET['editar']):
		$user = new app\models\UserModel;
		$userEncontrado = $user->findBy('id', $_GET['id']);

 ?>

 <form method="post">
 	
	<label>User</label>
	<input type="text" name="nome" value="<?php echo $userEncontrado->nome; ?>"/>
	<input type="hidden" name="atualizar"/>
	<input type="hidden" name="id" value="<?php echo $userEncontrado->id; ?>" />


	<label>Idade</label>
	<input type="text" name="idade" value="<?php echo $userEncontrado->idade; ?>" />

	<label>Sexo</label>
	<input type="text" name="sexo" value="<?php echo $userEncontrado->sexo; ?>" />
	
	<br/>
	<button class="btn btn-default" type="submit">Atualizar</button>
 </form>

<?php endif; ?>