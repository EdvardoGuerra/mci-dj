<?php

	class RepositorioDisciplinas{

		private $conexao;
		public function __construct($conexao){
			$this->conexao = $conexao;
		}

		public function gravar(Disciplina $disciplina){
			$codDis= $this->conexao->escape_string($disciplina->getCodDis());
			$nomeDis= $this->conexao->escape_string($disciplina->getNomeDis());
			$ementaDis= $this->conexao->escape_string($disciplina->getEmentaDis());
			$semIdealDis=$disciplina->getSemIdealDis();
			$chTeorDis=$disciplina->getChTeorDis();
			$chPratDis=$disciplina->getChPratDis();
			$tipoDis=$disciplina->getTipoDis();
		
			$sqlGravar = "INSERT INTO disciplinas 
				(codDis, nomeDis, ementaDis, semIdealDis, chTeorDis, chPratDis, tipoDis)
				VALUES ('{$codDis}', '{$nomeDis}', '{$ementaDis}', {$semIdealDis}, 
						{$chTeorDis}, {$chPratDis}, {$tipoDis}
						)";		//string de gravação do SQL

			$this->conexao->query($sqlGravar);
		}

		public function editarDisciplina(Disciplina $disciplina){
			$id=$disciplina->getId();
			$codDis= $this->conexao->escape_string($disciplina->getCodDis());
			$nomeDis=$this->conexao->escape_string($disciplina->getNomeDis());
			$ementaDis=$this->conexao->escape_string($disciplina->getEmentaDis());
			$semIdealDis=$disciplina->getSemIdealDis();
			$chTeorDis=$disciplina->getChTeorDis();
			$chPratDis=$disciplina->getChPratDis();
			$tipoDis=$disciplina->getTipoDis();

			$sqlEditar = "UPDATE disciplinas SET
				codDis='{$codDis}',
				nomeDis='{$nomeDis}',
				ementaDis='{$ementaDis}',
				semIdealDis={$semIdealDis},
				chTeorDis={$chTeorDis},
				chPratDis={$chPratDis},
				tipoDis={$tipoDis}
				WHERE id={$id}
			";							//string para atualizar dados
			$this->conexao->query($sqlEditar);

		}

		public function buscar($disciplinaId = 0){
			if ($disciplinaId>0){
				return $this->buscarDisciplina($disciplinaId);
			} else {
				return $this->buscarDisciplinas();
			}
		}

		public function buscarDisciplinas(){
			$sqlBusca = 'SELECT * FROM disciplinas ORDER BY codDis';
			$resultado = $this->conexao->query($sqlBusca);

			$disciplinas=[];

			while ($disciplina = $resultado->fetch_object('Disciplina')){
				$disciplina->setPrerequisitos($this->buscarPrerequisitos($disciplina->getId()));
				$disciplinas[]=$disciplina;
			}
			return $disciplinas;
		}

		public function buscarDisciplina($disciplinaId){
			$disciplinaId=$this->conexao->escape_string($disciplinaId);
			$sqlBusca = "SELECT * FROM disciplinas WHERE id={$disciplinaId}";
			$resultado = $this->conexao->query($sqlBusca);

			$disciplina = $resultado->fetch_object('Disciplina');
			return $disciplina;
		}

		public function removerDisciplina($disciplinaId){
			$disciplinaId=$this->conexao->escape_string($disciplinaId);
			$sqlRemover = "DELETE FROM disciplinas WHERE id={$disciplinaId}";
			$this->conexao->query($sqlRemover);
		}

		public function buscarPrerequisitos($disciplinaId){
			$disciplinaId=$this->conexao->escape_string($disciplinaId);
			$sqlBusca="SELECT * FROM prereqs WHERE disciplinaId={$disciplinaId} ORDER BY prereqId";
			$resultado=$this->conexao->query($sqlBusca);

			$prerequisitos=[];

			while ($prerequisito = $resultado->fetch_object('Prerequisito')){
				$prerequisitos[]=$prerequisito;
			}

			return $prerequisitos;
		}

		public function buscarPrerequisito($id){
			$id=$this->conexao->escape_string($id);
			$sqlBusca="SELECT * FROM prereqs WHERE id={$id}";
			$resultado=$this->conexao->query($sqlBusca);

			return $resultado->fetch_object('Prerequisito');
		}

		public function gravarPrerequisito(Prerequisito $prerequisito){
			$sqlGravar="INSERT INTO prereqs (disciplinaId, prereqId)
			VALUES ({$prerequisito->getDisciplinaId()}, {$prerequisito->getPrereqId()})";
			$this->conexao->query($sqlGravar);
		}

		public function removerPrerequisito($id){
			$id=$this->conexao->escape_string($id);
			$sqlRemover="DELETE FROM prereqs WHERE id=".$id;
			$this->conexao->query($sqlRemover);
		}

		public function calcularMedia($disciplinaId){
			$sqlBusca="SELECT nota FROM comentarios WHERE disciplinaId={$disciplinaId}";
			$resultado=$this->conexao->query($sqlBusca);
			$qtdNotas=count($resultado);
			$notaTotal=0;
			foreach ($disciplinas as $disciplina) {
				$notaTotal=$notaTotal+$discipina->getNota();
			}
			if ($qtdNotas>0){
				return $notaTotal/$qtdNotas;
			} else {
				return 0;
			}
		}

	}
?>