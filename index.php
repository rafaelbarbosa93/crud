<?php 

 require 'config/config.php';

//$app = new app\models\UserModel;


	if(isset($_POST['cadastrar'])){
		$user = new app\models\UserModel;
		$cadastrado = $user->create([
				'nome' => $_POST['nome'],
				'idade' => $_POST['idade'],
				'sexo' => $_POST['sexo']
			]);

		if($cadastrado){
			$mensagem = 'Usuário cadastrado com sucesso!';
		}else
		{
			$mensagem = 'Erro ao cadastrar usúario!';
		}

	}

	if(isset($_POST['atualizar'])){
		$user = new app\models\UserModel();
		$user->update($_POST['id'],[
				'nome' => $_POST['nome'],
				'idade' => $_POST['idade'],
				'sexo' => $_POST['sexo']
			]);
	
	}

	if(isset($_GET['excluir'])  && $_GET['excluir']){
		$user = new app\models\UserModel;
		$user ->delete('id',$_GET['id']);

		header('Location: /crud');
	}

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>Crud</title>
	<link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css" media="all"/>
	<script src="public/assets/js/bootstrap.js"></script>
</head>
<body>

	<div style="width: 800px; margin: 0 auto;">

		<?php require (isset($_GET['page'])) ? 'includes/'.$_GET['page'].'.php' : 'includes/home.php'; ?>
	</div>
</body>
</html>




