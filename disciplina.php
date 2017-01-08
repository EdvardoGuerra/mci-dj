<?php

	require "config.php";
	include "banco.php";
	include "ajudantes.php";
	include "classes/Disciplina.php";
	include "classes/RepositorioDisciplinas.php";
	include "classes/Prerequisito.php";

	$repositorioDisciplinas= new RepositorioDisciplinas($conexao);
	$novoPrerequisito=new Prerequisito();

	$temErros=false;
	$errosValidacao=[];
	
	if (temPOST()){   		//se teve POST, cadastra novo pré-requisito
		
		if (array_key_exists('prereqId', $_POST)){
			$novoPrerequisito->setDisciplinaId($_POST['disciplinaId']);
			$novoPrerequisito->setPrereqId($_POST['prereqId']);
		} else {
			$temErros=true;
			$errosValidacao['prerequisito']="erro!!";
		}
		
		if (! $temErros){
			$repositorioDisciplinas->gravarPrerequisito($novoPrerequisito);
		}
	}


	$disciplina=$repositorioDisciplinas->buscar($_GET['id']);		//exibe detalhes da disciplina atual
	$prerequisitos=$repositorioDisciplinas->buscarPrerequisitos($_GET['id']);	//exibe pré-requisitos, se houver

	include "template_disciplina.php";
?>