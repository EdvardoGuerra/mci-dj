<?php

	require "config.php";
	require "banco.php";

	$ministrada=buscarMinistrada($conexao, $_GET['id']);
	$professor=$ministrada['professorId'];
	removerMinistrada($conexao, $_GET['id']);

	header('Location: professor.php?id='.$professor);
	
?>