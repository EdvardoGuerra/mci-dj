<?php
	class Professor {

		private $id;
		private $nomeProf;
		private $emailProf;
		private $urlProf;
		private $ministradas=[];

		//$id
		public function setId($id){
			$this->id = (int) $id;
		}
		public function getId(){
			return $this->id;
		}
		//$nomeProf
		public function setNomeProf($nomeProf){
			$this->nomeProf = $nomeProf;
		}
		public function getNomeProf(){
			return $this->nomeProf;
		}
		//$email
		public function setEmailProf($emailProf){
			$this->emailProf = $emailProf;
		}
		public function getEmailProf(){
			return $this->emailProf;
		}
		//$urlProf
		public function setUrlProf($urlProf){
			$this->urlProf = $urlProf;
		}
		public function getUrlProf(){
			return $this->urlProf;
		}
		//$ministradas
		public function setMinistradas(array $ministradas){
			$this->ministradas=[];
			foreach ($ministradas as $ministrada) {
				$this->adicionarMinistrada($ministrada);
			}
		}
		public function adicionarMinistrada(Ministrada $ministrada){
			array_push($this->ministradas, $ministrada);
		}
		public function getMinistradas() {
			return $this->ministradas;
		}
	}
?>