<?php 
ini_set('display_errors',1);

/*
	* Método de carregamento automático de classes
	* @param class $c classe que será instanciada
	*/
	function __autoload($c){
		$diretorios =  array(
			'./',
			'./app/',
			'./app/controllers',
			'./app/interfaces',
			'./app/models',
			'./app/views',
			'./cofing/',
			'./data/',
			'./includes/',
			'./public/',
			'./src/'
		);
		foreach ($diretorios as $dir) {
			if(file_exists($dir.$c.'.php')){
				require_once $dir.$c.'.php';
			}
		}
	}	