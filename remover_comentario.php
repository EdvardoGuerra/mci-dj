<?php

	require "config.php";
	require "banco.php";
	require "classes/RepositorioComentarios.php";

	$repositorioComentarios= new RepositorioComentarios($conexao);
	$repositorioComentarios->removerComentario($_GET['id']);

	header('Location: comentarios.php');
?>