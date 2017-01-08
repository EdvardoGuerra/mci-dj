<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MCi-DJ - Professores</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mci.css">
</head>
<body>
	<div id="bloco_principal">
		<h1>Cadastro de Professores</h1>
		<p><a href="index.html">Voltar</a></p>
		
		<?php include 'formulario_professores.php'; ?>
		
		<?php if ($exibirTabelaProfessores) : ?>
			<?php include 'tabela_professores.php'; ?>		<!--exibe tabela se váriavel $exibirTabela for verdadeira -->
		<?php endif; ?>	

		
	</div>
</body>
</html>