<?php
	session_start();

	require "config.php";
	require "banco.php";
	require "ajudantes.php";
	require "classes/Disciplina.php";
	require "classes/RepositorioDisciplinas.php";

	$repositorioDisciplinas = new RepositorioDisciplinas($conexao);

	$exibirTabelaDisciplinas=false;
	$temErros=false;
	$errosValidacao=[];

	if (temPOST()){
		
		$disciplina= new Disciplina();

		$disciplina->setId($_POST['id']);
		if (array_key_exists('codDis', $_POST) && strlen($_POST['codDis'])>0) {
			$disciplina->setCodDis($_POST['codDis']);	
		} else {
			$temErros=true;
			$errosValidacao['codDis']='O código da disciplina é obrigatório';
		}
		if (array_key_exists('nomeDis', $_POST)){
			$disciplina->setNomeDis($_POST['nomeDis']);
		} else {
			$disciplina->setNomeDis('');
		}
		if (array_key_exists('ementaDis', $_POST)){
			$disciplina->setEmentaDis($_POST['ementaDis']);
		} else {
			$disciplina->setEmentaDis('');
		}
		if (array_key_exists('semIdealDis', $_POST)){
			$disciplina->setSemIdealDis($_POST['semIdealDis']);
		} else {
			$disciplina->setSemIdealDis('');
		}
		if (array_key_exists('chTeorDis', $_POST)){
			$disciplina->setChTeorDis($_POST['chTeorDis']);
		} else {
			$disciplina->setChTeorDis('');
		}
		if (array_key_exists('chPratDis', $_POST)){
			$disciplina->setChPratDis($_POST['chPratDis']);
		} else {
			$disciplina->setChPratDis('');
		}

		$disciplina->setTipoDis($_POST['tipoDis']);

		if (! $temErros){
			$repositorioDisciplinas->editarDisciplina($disciplina);
			header('Location: disciplinas.php');				    //direciona para a página disciplinas.php
			die();
		}
		
	}

	$disciplina = $repositorioDisciplinas->buscar($_GET['id']);

	if (array_key_exists('codDis', $_POST)){
		$disciplina->setCodDis($_POST['codDis']);
	} else {
		$disciplina->setCodDis($disciplina->getCodDis());
	}
	if (array_key_exists('nomeDis', $_POST)){
		$disciplina->setNomeDis($_POST['nomeDis']);
	} else {
		$disciplina->setNomeDis($disciplina->getNomeDis());
	}
	if (array_key_exists('ementaDis', $_POST)){
		$disciplina->setEmentaDis($_POST['ementaDis']);
	} else {
		$disciplina->setEmentaDis($disciplina->getEmentaDis());
	}
	if (array_key_exists('semIdealDis', $_POST)){
		$disciplina->setSemIdealDis($_POST['semIdealDis']);
	} else {
		$disciplina->setSemIdealDis($disciplina->getSemIdealDis());
	}
	if (array_key_exists('chTeorDis', $_POST)){
		$disciplina->setChTeorDis($_POST['chTeorDis']);
	} else {
		$disciplina->setChTeorDis($disciplina->getChTeorDis());
	}
	if (array_key_exists('chPratDis', $_POST)){
		$disciplina->setChPratDis($_POST['chPratDis']);
	} else {
		$disciplina->setChPratDis($disciplina->getChPratDis());
	}
	if (array_key_exists('tipoDis', $_POST)){
		$disciplina->setTipoDis($_POST['tipoDis']);
	} else {
		$disciplina->setTipoDis($disciplina->getTipoDis());
	}

	require "template_disciplinas.php"
?>