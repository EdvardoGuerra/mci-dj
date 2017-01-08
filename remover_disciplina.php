<?php

	require "config.php";
	require "banco.php";
	require "classes/RepositorioDisciplinas.php";
	require "classes/Prerequisito.php";

	$repositorioDisciplinas= new RepositorioDisciplinas($conexao);

	$prerequisitos= $repositorioDisciplinas->buscarPrerequisitos($_GET['id']);  //antes de retirar a dis., verifica se existem 
	if (count($prerequisitos)>0){								//pré-requisitos cadastrados. Se houver, os apaga antes
		foreach ($prerequisitos as $prerequisito) {				//de apagar a disciplina
			$repositorioDisciplinas->removerPrerequisito($prerequisito->getId());
		}
	}
	$repositorioDisciplinas->removerDisciplina($_GET['id']);

	/*
	$prerequisitos=buscarPrerequisitos($conexao, $_GET['id']);  //antes de retirar a disciplina, verifica se existem 
	if (count($prerequisitos)>0){								//pré-requisitos cadastrados. Se houver, os apaga antes
		foreach ($prerequisitos as $prerequisito) {				//de apagar a disciplina
			removerPrerequisito($conexao, $prerequisito['id']);
		}
	}
	removerDisciplina($conexao, $_GET['id']);
	*/

	header('Location: disciplinas.php');
?>