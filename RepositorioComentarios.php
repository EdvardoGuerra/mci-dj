<?php

	class RepositorioComentarios{

		private $conexao;
		public function __construct($conexao){
			$this->conexao = $conexao;
		}

		public function gravarComentario(Comentario $comentario){
			$disciplinaId= $comentario->getDisciplinaId();
			$coment = $this->conexao->escape_string($comentario->getComent());
			$nota=$comentario->getNota();

			$sqlGravar = "INSERT INTO comentarios 
				(disciplinaId, coment, nota)
				VALUES ({$disciplinaId}, '{$coment}', {$nota})";		//string de gravação do SQL

			$this->conexao->query($sqlGravar);
		}

		public function editarComentario(Comentario $comentario){
			$id=$comentario->getId();
			$disciplinaId= $comentario->getDisciplinaId();
			$coment=$this->conexao->escape_string($comentario->getComent());
			$nota=$comentario->getNota();

			$sqlEditar = "UPDATE comentarios SET
				disciplinaId={$disciplinaId},
				coment='{$coment}',
				nota={$nota}
				WHERE id={$id}
			";							//string para atualizar dados
			$this->conexao->query($sqlEditar);

		}

		public function buscar($id = 0){
			if ($id>0){
				return $this->buscarComentario($id);
			} else {
				return $this->buscarComentarios();
			}
		}

		public function buscarComentarios(){
			$sqlBusca = 'SELECT * FROM comentarios ORDER BY disciplinaId';
			$resultado = $this->conexao->query($sqlBusca);

			$comentarios=[];

			while ($comentario = $resultado->fetch_object('Comentario')){
				$comentarios[]=$comentario;
			}
			return $comentarios;
		}

		public function buscarComentario($id){
			$sqlBusca = "SELECT * FROM comentarios WHERE id={$id}";
			$resultado = $this->conexao->query($sqlBusca);

			$comentario = $resultado->fetch_object('Comentario');
			return $comentario;
		}

		public function removerComentario($id){
			$sqlRemover = "DELETE FROM comentarios WHERE id={$id}";
			$this->conexao->query($sqlRemover);
		}

	}
?>