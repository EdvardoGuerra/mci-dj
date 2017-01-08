<?php
	class Disciplina {
		private $id;
		private $codDis;
		private $nomeDis;
		private $ementaDis;
		private $semIdealDis;
		private $chTeorDis;
		private $chPratDis;
		private $tipoDis;
		private $preRequisitos=[];
		private $media;
		

		//id
		public function setId($id){
			$this->id = (int) $id;
		}
		public function getId(){
			return $this->id;
		}
		//codDis
		public function setCodDis($codDis){
			$this->codDis = $codDis;
		}
		public function getCodDis(){
			return $this->codDis;
		}
		//nomeDis
		public function setNomeDis($nomeDis){
			$this->nomeDis = $nomeDis;
		}
		public function getNomeDis(){
			return $this->nomeDis;
		}
		//ementaDis
		public function setEmentaDis($ementaDis){
			$this->ementaDis = $ementaDis;
		}
		public function getEmentaDis(){
			return $this->ementaDis;
		}
		//semIdealDis
		public function setSemIdealDis($semIdealDis){
			$this->semIdealDis = $semIdealDis;
		}
		public function getSemIdealDis(){
			return $this->semIdealDis;
		}
		//chTeorDis
		public function setChTeorDis($chTeorDis){
			$this->chTeorDis = $chTeorDis;
		}
		public function getChTeorDis(){
			return $this->chTeorDis;
		}
		//chPratDis
		public function setChPratDis($chPratDis){
			$this->chPratDis = $chPratDis;
		}
		public function getChPratDis(){
			return $this->chPratDis;
		}
		//tipoDis
		public function setTipoDis($tipoDis){
			$this->tipoDis = $tipoDis;
		}
		public function getTipoDis(){
			return $this->tipoDis;
		}
		//preRequisitos
		public function setPreRequisitos(array $preRequisitos){
			$this->preRequisitos=[];
			foreach ($preRequisitos as $preRequisito) {
				$this->adicionarPrerequisito($preRequisito);
			}
		}
		public function adicionarPrerequisito(Prerequisito $preRequisito){
			array_push($this->preRequisitos, $preRequisito);
		}
		public function getPrerequisitos(){
			return $this->preRequisitos;
		}
		//média
		public function setMedia($media){
			$this->media = $media;
		}
		public function getMedia(){
			return $this->media;
		}

	}
?>