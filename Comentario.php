<?php
	class Comentario {
		private $id;
		private $disciplinaId;
		private $coment;
		private $nota;
		
		//id
		public function setId($id){
			$this->id = (int) $id;
		}
		public function getId(){
			return $this->id;
		}
		//disciplinaId
		public function setDisciplinaId($disciplinaId){
			$this->disciplinaId = $disciplinaId;
		}
		public function getDisciplinaId(){
			return $this->disciplinaId;
		}
		//comentario
		public function setComent($coment){
			$this->coment = $coment;
		}
		public function getComent(){
			return $this->coment;
		}
		//nota
		public function setNota($nota){
			$this->nota = $nota;
		}
		public function getNota(){
			return $this->nota;
		}
	}
?>