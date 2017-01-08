<?php

	class RepositorioProfessores {

		private $conexao;
		public function __construct($conexao){
			$this->conexao = $conexao;
		}

		public function gravarProfessor(Professor $professor){
			$nomeProf=$this->conexao->escape_string($professor->getNomeProf());
			$emailProf=$this->conexao->escape_string($professor->getEmailProf());
			$urlProf=$this->conexao->escape_string($professor->getUrlProf());
			
			$sqlGravar = "INSERT INTO professores 
				(nomeProf, emailProf, urlProf)
				VALUES ('{$nomeProf}', '{$emailProf}', '{$urlProf}')";		//string de gravação do SQL

			$this->conexao->query($sqlGravar);
		}

		public function editarProfessor(Professor $professor){
			$id=$professor->getId();
			$nomeProf=$this->conexao->escape_string($professor->getNomeProf());
			$emailProf=$this->conexao->escape_string($professor->getEmailProf());
			$urlProf=$this->conexao->escape_string($professor->getUrlProf());
			
			$sqlEditar = "UPDATE professores SET
				nomeProf='{$nomeProf}',
				emailProf='{$emailProf}',
				urlProf='{$urlProf}'
				WHERE id={$id}
			";				//string para atualizar dados

			$this->conexao->query($sqlEditar);
		}

		public function buscar($professorId = 0){
			if ($professorId>0){
				return $this->buscarProfessor($professorId);
			} else {
				return $this->buscarProfessores();
			}
		}

		public function buscarProfessores(){
			$sqlBusca = 'SELECT * FROM professores ORDER BY nomeProf';
			$resultado = $this->conexao->query($sqlBusca);

			$professores=[];

			while ($professor = $resultado->fetch_object('Professor')){
				$professor->setMinistradas($this->buscarMinistradas($professor->getId()));
				$professores[]=$professor;
			}
			return $professores;
		}

		public function buscarProfessor($professorId){
			$professorId=$this->conexao->escape_string($professorId);
			$sqlBusca = "SELECT * FROM professores WHERE id={$professorId}";
			$resultado = $this->conexao->query($sqlBusca);

			$professor = $resultado->fetch_object('Professor');
			return $professor;
		}

		public function removerProfessor($professorId){
			$professorId=$this->conexao->escape_string($professorId);
			$sqlRemover = "DELETE FROM professores WHERE id={$professorId}";
			$this->conexao->query($sqlRemover);
		}

		public function buscarMinistradas($professorId){
			$professorId=$this->conexao->escape_string($professorId);
			$sqlBusca="SELECT * FROM profdis WHERE professorId={$professorId} ORDER BY disciplinaId";
			$resultado=$this->conexao->query($sqlBusca);

			$ministradas=[];

			while ($ministrada = $resultado->fetch_object('Ministrada')){
				$ministradas[]=$ministrada;
			}

			return $ministradas;
		}

		public function buscarMinistrada($id){
			$id=$this->conexao->escape_string($id);
			$sqlBusca="SELECT * FROM profdis WHERE id={$id}";
			$resultado=$this->conexao->query($sqlBusca);

			return $resultado->fetch_object('Ministrada');
		}

		public function gravarMinistrada(Ministrada $ministrada){
			$sqlGravar="INSERT INTO profdis (professorId, disciplinaId)
			VALUES ({$ministrada->getProfessorId()}, {$ministrada->getDisciplinaId()})";
			$this->conexao->query($sqlGravar);
		}

		public function removerMinistrada($id){
			$id=$this->conexao->escape_string($id);
			$sqlRemover="DELETE FROM profdis WHERE id=".$id;
			$this->conexao->query($sqlRemover);
		}

		public function buscarDisciplinas(){
			$sqlBusca = 'SELECT * FROM disciplinas ORDER BY codDis';
			$resultado = $this->conexao->query($sqlBusca);

			$disciplinas=[];

			while ($disciplina = $resultado->fetch_object('Disciplina')){
				$disciplinas[]=$disciplina;
			}
			return $disciplinas;
		}

	}
?>