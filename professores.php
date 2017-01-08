<?php 

	session_start();			//inicia sessão

	require "config.php";
	require "banco.php";
	require "ajudantes.php";
	require "classes/Professor.php";
	require "classes/Ministrada.php";
	require "classes/RepositorioProfessores.php";

	$repositorioProfessores = new RepositorioProfessores($conexao);

	$temErros=false;			//variável que indica se há erros de validação no formulário
	$errosValidacao=[];			//vetor para registrar quais campos tiveram erros de validação

	$exibirTabelaProfessores=true;			//exibe tabela com os professores já cadastrados

	$professor = new Professor();

	if (temPOST()){				//se foi feito POST (novo professor) prosegue até gravação
		if (array_key_exists('nomeProf', $_POST) && strlen($_POST['nomeProf'])>0) {
			$professor->setNomeProf($_POST['nomeProf']);	
		} else {
			$temErros=true;
			$errosValidacao['nomeProf']='O nome do(a) professor(a) é obrigatório';
		}
		if (array_key_exists('emailProf', $_POST)){
			$professor->setEmailProf($_POST['emailProf']);
		} else {
			$professor->setEmailProf('');
		}
		if (array_key_exists('urlProf', $_POST)){
			$professor->setUrlProf($_POST['urlProf']);
		} else {
			$professor->setUrlProf('');
		}
		
		if (! $temErros) {												//só grava se não houver erros de validação
			$repositorioProfessores->gravarProfessor($professor);		//grava no banco de dados o vetor $professor[]
			header('Location: professores.php');			//redireciona evitando gravar repetidamente qdo atualiza página
			die();
		}
	}
	
	$professores = $repositorioProfessores->buscarProfessores(); 	//busca os professores já cadastradas para exibir
	
	//$numProfs=count($professores);
	require "template_professores.php";			//chama template para exibição das disciplinas
?>
