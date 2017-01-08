<?php

	//Cria conexão ao banco de dados
	$conexao=mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);
	//Testa conexão
	if (mysqli_connect_errno($conexao)){							//verifica se tem erro e qual o seu número
		echo "Problemas na conexão com o banco de dados. Erro: ";
		mysqly_connect_error();										//exibe número do erro, caso haja
		die();														//encerra o programa caso haja erro
	}

	function buscarDisciplinas($conexao){
		$sqlBusca="SELECT * FROM disciplinas ORDER BY codDis";					//String de pesquisa do SQL
		$resultado=mysqli_query($conexao, $sqlBusca);			//Realiza pesquisa no banco através da conexão do comando SQL

		$disciplinas=[];										//inicializa o vetor $disciplinas[]

		while ($disciplina=mysqli_fetch_assoc($resultado)) {	//percorre resultado da busca e coloca em $disciplina
			$disciplinas[]=$disciplina;							//até ler todos os registros e alimentar $disciplinas[]
		}

		return $disciplinas;									//retorna todos os valores pesquisados
	}

	function buscarDisciplina($conexao, $id){
		$sqlBusca='SELECT * FROM disciplinas WHERE id='.$id; 	//string de pesquisa
		$resultado=mysqli_query($conexao, $sqlBusca);			//realiza pesquisa específica de uma disciplina

		return mysqli_fetch_assoc($resultado);					//retorna uma disciplina
	}

	function gravarDisciplina($conexao, $disciplina){
		$sqlGravar="INSERT INTO disciplinas (codDis, nomeDis, ementaDis, semIdealDis, chTeorDis, chPratDis, tipoDis)
			VALUES
			('{$disciplina['codDis']}', '{$disciplina['nomeDis']}', '{$disciplina['ementaDis']}',
			{$disciplina['semIdealDis']}, {$disciplina['chTeorDis']}, {$disciplina['chPratDis']},
			{$disciplina['tipoDis']})";									//string de gravação do SQL

		mysqli_query($conexao, $sqlGravar);	//executa comando SQL de gravação 

	}

	function editarDisciplina($conexao, $disciplina){
		$sqlEditar="UPDATE disciplinas SET
			codDis='{$disciplina['codDis']}',
			nomeDis='{$disciplina['nomeDis']}',
			ementaDis='{$disciplina['ementaDis']}',
			semIdealDis={$disciplina['semIdealDis']},
			chTeorDis={$disciplina['chTeorDis']},
			chPratDis={$disciplina['chPratDis']},
			tipoDis={$disciplina['tipoDis']}
			WHERE id={$disciplina['id']}
		";														//string para atualizar dados
		mysqli_query($conexao, $sqlEditar);						//executa comando
	}

	function removerDisciplina($conexao, $id){
		$sqlRemover="DELETE FROM disciplinas WHERE id={$id}";  	//string para remoção
		mysqli_query($conexao, $sqlRemover);					//executa remoção
	}

	function gravarPrerequisito($conexao, $prerequisito){
		$sqlGravar="INSERT INTO prereqs (disciplinaId, prereqId)
			VALUES ({$prerequisito['disciplinaId']}, {$prerequisito['prereqId']})";
		$resultado=mysqli_query($conexao, $sqlGravar);
	}

	function buscarPrerequisitos($conexao, $disciplinaId){
		$sqlBusca="SELECT * FROM prereqs WHERE disciplinaId={$disciplinaId} ORDER BY prereqId";
		$resultado=mysqli_query($conexao, $sqlBusca);

		$prerequisitos=[];

		while ($prerequisito = mysqli_fetch_assoc($resultado)) {
			$prerequisitos[]=$prerequisito;
		}

		return $prerequisitos;
	}

	function buscarPrerequisito($conexao, $id){
		$sqlBusca="SELECT * FROM prereqs WHERE id=".$id;
		$resultado=mysqli_query($conexao, $sqlBusca);

		return mysqli_fetch_assoc($resultado);
	}

	function removerPrerequisito($conexao, $id){
		$sqlRemover="DELETE FROM prereqs WHERE id=".$id;
		mysqli_query($conexao, $sqlRemover);
	}

	function buscarProfessores($conexao){
		$sqlBusca="SELECT * FROM professores ORDER BY nomeProf";//String de pesquisa do SQL
		$resultado=mysqli_query($conexao, $sqlBusca);			//Realiza pesquisa no banco através da conexão do comando SQL

		$professores=[];										//inicializa o vetor $professores[]

		while ($professor=mysqli_fetch_assoc($resultado)) {		//percorre resultado da busca e coloca em $professor
			$professores[]=$professor;							//até ler todos os registros e alimentar $professores[]
		}
		return $professores;									//retorna todos os valores pesquisados
	}

	function buscarProfessor($conexao, $id){
		$sqlBusca='SELECT * FROM professores WHERE id='.$id; 	//string de pesquisa
		$resultado=mysqli_query($conexao, $sqlBusca);			//realiza pesquisa específica de uma disciplina

		return mysqli_fetch_assoc($resultado);					//retorna um professor
	}

	function gravarProfessor($conexao, $professor){
		$sqlGravar="INSERT INTO professores (nomeProf, emailProf, urlProf)
			VALUES
			('{$professor['nomeProf']}', '{$professor['emailProf']}', '{$professor['urlProf']}')";	//string de gravação do SQL

		mysqli_query($conexao, $sqlGravar);	//executa comando SQL de gravação 
	}

	function editarProfessor($conexao, $professor){
		$sqlEditar="UPDATE professores SET
			nomeProf='{$professor['nomeProf']}',
			emailProf='{$professor['emailProf']}',
			urlProf='{$professor['urlProf']}'
			WHERE id={$professor['id']}
		";														//string para atualizar dados
		mysqli_query($conexao, $sqlEditar);						//executa comando
	}

	function removerProfessor($conexao, $id){
		$sqlRemover="DELETE FROM professores WHERE id={$id}";  	//string para remoção
		mysqli_query($conexao, $sqlRemover);					//executa remoção
	}

	function gravarMinistrada($conexao, $ministrada){
		$sqlGravar="INSERT INTO profdis (professorId, disciplinaId)
			VALUES ({$ministrada['professorId']}, {$ministrada['disciplinaId']})";
		$resultado=mysqli_query($conexao, $sqlGravar);
	}

	function buscarMinistradas($conexao, $professorId){
		$sqlBusca="SELECT * FROM profdis WHERE professorId={$professorId} ORDER BY disciplinaId";
		$resultado=mysqli_query($conexao, $sqlBusca);

		$ministradas=[];

		while ($ministrada = mysqli_fetch_assoc($resultado)) {
			$ministradas[]=$ministrada;
		}

		return $ministradas;
	}

	function buscarMinistrada($conexao, $id){
		$sqlBusca="SELECT * FROM profdis WHERE id=".$id;
		$resultado=mysqli_query($conexao, $sqlBusca);

		return mysqli_fetch_assoc($resultado);
	}

	function removerMinistrada($conexao, $id){
		$sqlRemover="DELETE FROM profdis WHERE id=".$id;
		mysqli_query($conexao, $sqlRemover);
	}
?>