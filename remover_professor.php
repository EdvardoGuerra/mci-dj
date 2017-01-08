<?php

	require "config.php";
	require "banco.php";
	require "classes/Professor.php";
	require "classes/RepositorioProfessores.php";
	require "classes/Ministrada.php";

	$repositorioProfessores=new RepositorioProfessores($conexao);

	$ministradas=$repositorioProfessores->buscarMinistradas($_GET['id']);	//antes de retirar o prof, verifica se existem 
	if (count($ministradas)>0){										//disciplinas cadastrados. Se houver, as apaga antes
		foreach ($ministradas as $ministrada) {						//de apagar o professor
			$repositorioProfessores->removerMinistrada($ministrada->getId());
		}
	}
	$repositorioProfessores->removerProfessor($_GET['id']);

	header('Location: professores.php');
?>