<?php
	class Prerequisito {
		private $id;
		private $disciplinaId;
		private $prereqId;
		
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
		//prereqId
		public function setPrereqId($prereqId){
			$this->prereqId = $prereqId;
		}
		public function getPrereqId(){
			return $this->prereqId;
		}
	}
?>