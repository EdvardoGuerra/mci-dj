<?php

	require "config.php";
	require "banco.php";
	require "ajudantes.php";
	require "classes/Professor.php";
	require "classes/Disciplina.php";
	require "classes/RepositorioProfessores.php";
	require "classes/RepositorioDisciplinas.php";
	require "classes/Ministrada.php";

	$repositorioProfessores = new RepositorioProfessores($conexao);
	$repositorioDisciplinas = new RepositorioDisciplinas($conexao);
	$novaMinistrada = new Ministrada();

	$temErros=false;
	$errosValidacao=[];
	
	if (temPOST()){   		//se teve POST, cadastra nova disciplina ministrada
		//$disciplina=buscarDisciplina($conexao, $_GET['id']);
		if (array_key_exists('professorId', $_POST)){
			$novaMinistrada->setProfessorId($_POST['professorId']);
			$novaMinistrada->setDisciplinaId($_POST['disciplinaId']);
		} else {
			$temErros=true;
			$errosValidacao['ministrada']="erro!!";
		}
		
		if (! $temErros){
			$repositorioProfessores->gravarMinistrada($novaMinistrada);
		}
	}

	$professor=$repositorioProfessores->buscar($_GET['id']);		//exibe detalhes da disciplina atual
	$ministradas=$repositorioProfessores->buscarMinistradas($_GET['id']);	//exibe pré-requisitos, se houver

	include "template_professor.php";
?>