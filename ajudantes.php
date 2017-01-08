<?php

	function temPOST(){				//verifica se há POST
		if (count($_POST)>0){
			return true;
		} else {
			return false;
		}
	}

	function traduzTipo($codigo){
		$tipoDis='';
		switch ($codigo) {
			case '1':
				$tipoDis="Obrigatória";
				break;
			case '2':
				$tipoDis="Eletiva";
				break;
			case '3':
				$tipoDis="Opcional";
				break;
		}
		return $tipoDis;
	}

?>