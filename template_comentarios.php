<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MCi-DJ - Comentários</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mci.css">
</head>
<body>
	<div id="bloco_principal">
		<h1>Cadastro de Comentários</h1>
		<p><a href="index.html">Voltar</a></p>
		
		<?php include 'formulario_comentarios.php'; ?>
		
		<?php if ($exibirTabelaComentarios) : ?>
			<?php include 'tabela_comentarios.php'; ?>		
		<?php endif; ?>
		
	</div>
</body>
</html>