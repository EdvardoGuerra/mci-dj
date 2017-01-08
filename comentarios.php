<?php 

	session_start();			//inicia sessão

	require "config.php";
	require "banco.php";
	require "ajudantes.php";
	require "classes/Disciplina.php";
	require "classes/Comentario.php";
	require "classes/Prerequisito.php";
	require "classes/RepositorioDisciplinas.php";
	require "classes/RepositorioComentarios.php";

	$repositorioDisciplinas = new RepositorioDisciplinas($conexao);
	$repositorioComentarios = new RepositorioComentarios($conexao);

	$temErros=false;						//variável que indica se há erros de validação no formulário
	$errosValidacao=[];						//vetor para registrar quais campos tiveram erros de validação

	$exibirTabelaComentarios=true;			//exibe tabela com as disciplinas já cadastradas

	$disciplina = new Disciplina();
	$comentario = new Comentario(); 

	if (temPOST()){				//se foi feito POST (nova disciplina) prosegue até gravação
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
		
		if (! $temErros) {											//só grava se não houver erros de validação
			$repositorioComentarios->gravarComentario($comentario);	//grava no banco de dados o vetor $comentario[]
			header('Location: comentarios.php');				//redireciona evitando gravar repetidamente qdo atualiza página
			die();
		} 
	}
	
	
	$comentarios = $repositorioComentarios->buscar();
	$disciplinas = $repositorioDisciplinas->buscar();

	require "template_comentarios.php";			//chama template para exibição das disciplinas
?>
