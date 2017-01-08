<?php 

	session_start();			//inicia sessão

	require "config.php";
	require "banco.php";
	require "ajudantes.php";
	require "classes/Disciplina.php";
	require "classes/RepositorioDisciplinas.php";
	require "classes/Prerequisito.php";

	$repositorioDisciplinas = new RepositorioDisciplinas($conexao);

	$temErros=false;						//variável que indica se há erros de validação no formulário
	$errosValidacao=[];						//vetor para registrar quais campos tiveram erros de validação

	$exibirTabelaDisciplinas=true;			//exibe tabela com as disciplinas já cadastradas

	$disciplina = new Disciplina();
	$disciplina->setTipoDis(1);

	if (temPOST()){				//se foi feito POST (nova disciplina) prosegue até gravação
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

		if (! $temErros) {									//só grava se não houver erros de validação
			$repositorioDisciplinas->gravar($disciplina);	//grava no banco de dados o vetor $disciplina[]
			header('Location: disciplinas.php');			//redireciona evitando gravar repetidamente qdo atualiza página
			die();
		}
	}
	
	
	$disciplinas = $repositorioDisciplinas->buscarDisciplinas();
	require "template_disciplinas.php";			//chama template para exibição das disciplinas
?>
