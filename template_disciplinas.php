<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MCi-DJ - Disciplinas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mci.css">
</head>
<body>
	<div id="bloco_principal">
		<h1>Cadastro de Disciplinas</h1>
		<p><a href="index.html">Voltar</a></p>
		
		<?php include 'formulario_disciplinas.php'; ?>
		
		<?php if ($exibirTabelaDisciplinas) : ?>
			<?php include 'tabela_disciplinas.php'; ?>		
		<?php endif; ?>
		
	</div>
</body>
</html>