<?php

	require "config.php";
	include "banco.php";
	include "classes/Prerequisito.php";
	include "classes/RepositorioDisciplinas.php";

	$repositorioDisciplinas = new RepositorioDisciplinas($conexao);
	$prerequisito = new Prerequisito();

	$prerequisito = $repositorioDisciplinas->buscarPrerequisito($_GET['id']);
	$disciplinaId=$prerequisito->getDisciplinaId();
	$repositorioDisciplinas->removerPrerequisito($prerequisito->getId());

	/*
	$prerequisito=buscarPrerequisito($conexao, $_GET['id']);
	$disciplinaId=$prerequisito['disciplinaId'];
	removerPrerequisito($conexao, $prerequisito['id']);
	*/

	header('Location: disciplina.php?id='.$disciplinaId);
	
?>