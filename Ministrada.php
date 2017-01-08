<?php
	class Ministrada {

		private $id;
		private $professorId;
		private $disciplinaId;

		//$id
		public function setId($id){
			$this->id = (int) $id;
		}
		public function getId(){
			return $this->id;
		}
		//$professorId
		public function setProfessorId($professorId){
			$this->professorId = $professorId;
		}
		public function getProfessorId(){
			return $this->professorId;
		}
		//$disciplinaId
		public function setDisciplinaId($disciplinaId){
			$this->disciplinaId = $disciplinaId;
		}
		public function getDisciplinaId(){
			return $this->disciplinaId;
		}
	}
?>