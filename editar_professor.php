<?php
	session_start();

	require "config.php";
	require "banco.php";
	require "ajudantes.php";
	require "classes/Professor.php";
	require "classes/RepositorioProfessores.php";

	$repositorioProfessores= new RepositorioProfessores($conexao);

	$exibirTabelaProfessores=false;
	$temErros=false;
	$errosValidacao=[];

	if (temPOST()){

		$professor= new Professor();

		$professor->setId($_POST['id']);
		if (array_key_exists('nomeProf', $_POST) && strlen($_POST['nomeProf'])>0) {
			$professor->setNomeProf($_POST['nomeProf']);	
		} else {
			$temErros=true;
			$errosValidacao['nomeProf']='O nome do(a) professor(a) é obrigatório';
		}
		if (array_key_exists('emailProf', $_POST)){
			$professor->setEmailProf($_POST['emailProf']);
		} else {
			$professor->setEmailProf('');
		}
		if (array_key_exists('urlProf', $_POST)){
			$professor->setUrlProf($_POST['urlProf']);
		} else {
			$professor->setUrlProf('');
		}
		
		if (! $temErros){
			$repositorioProfessores->editarProfessor($professor);
			header('Location: professores.php');				//direciona para a página professores.php
			die();
		}
		
	}

	$professor=$repositorioProfessores->buscarProfessor($_GET['id']);

	if (array_key_exists('nomeProf', $_POST)){
		$professor->setNomeProf($_POST['nomeProf']);
	} else {
		$professor->setNomeProf($professor->getNomeProf());
	}
	if (array_key_exists('emailProf', $_POST)){
		$professor->setEmailProf($_POST['emailProf']);
	} else {
		$professor->setEmailProf($professor->getEmailProf());
	}
	if (array_key_exists('urlProf', $_POST)){
		$professor->setUrlProf($_POST['urlProf']);
	} else {
		$professor->setUrlProf($professor->getUrlProf());
	}
	
	require "template_professores.php"
?>