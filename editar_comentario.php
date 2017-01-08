<?php
	session_start();

	require "config.php";
	require "banco.php";
	require "ajudantes.php";
	require "classes/Disciplina.php";
	require "classes/Comentario.php";
	require "classes/RepositorioComentarios.php";
	require "classes/RepositorioDisciplinas.php";

	$repositorioDisciplinas = new RepositorioDisciplinas($conexao);
	$repositorioComentarios = new RepositorioComentarios($conexao);

	$exibirTabelaComentarios=false;
	$temErros=false;
	$errosValidacao=[];

	if (temPOST()){
		
		$comentario= new Comentario();

		$comentario->setId($_POST['id']);
		if (array_key_exists('disciplinaId', $_POST)) {
			$comentario->setDisciplinaId($_POST['disciplinaId']);	
		} else {
			$temErros=true;
			$errosValidacao['codDis']='O código da disciplina é obrigatório';
		}
		if (array_key_exists('coment', $_POST)){
			$comentario->setComent($_POST['coment']);
		} else {
			$comentario->setComent('');
		}
		if (array_key_exists('nota', $_POST)){
			$comentario->setNota($_POST['nota']);
		} else {
			$comentario->setNota('');
		}
		
		if (! $temErros){
			$repositorioComentarios->editarComentario($comentario);
			header('Location: comentarios.php');				    //direciona para a página disciplinas.php
			die();
		}
		
	}

	$comentario = $repositorioComentarios->buscar($_GET['id']);
	$disciplina = $repositorioDisciplinas->buscar($comentario->getDisciplinaId());

	if (array_key_exists('disciplinaId', $_POST)){
		$comentario->setDisciplinaId($_POST['disciplinaId']);
	} else {
		$comentario->setDisciplinaId($comentario->getDisciplinaId());
	}
	if (array_key_exists('coment', $_POST)){
		$comentario->setComent($_POST['coment']);
	} else {
		$comentario->setComent($comentario->getComent());
	}
	if (array_key_exists('nota', $_POST)){
		$comentario->setNota($_POST['nota']);
	} else {
		$comentario->setNota($comentario->getNota());
	}
	
	require "template_comentario.php"
?>