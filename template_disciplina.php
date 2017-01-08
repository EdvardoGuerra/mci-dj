
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MCi-DJ - Disciplinas</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mci.css">
</head>
<body> 

	<div id="bloco_principal">									
		<h1>Disciplina: <?php echo $disciplina->getNomeDis(); ?></h1>
		<p><a href="disciplinas.php">Voltar</a></p>
		<p><strong>Código: </strong><?php echo $disciplina->getCodDis(); ?></p>
		<p><strong>Ementa: </strong><?php echo $disciplina->getEmentaDis(); ?></p>
		<p><strong>Sementre Ideal: </strong><?php echo $disciplina->getSemIdealDis(); ?></p>
		<p><strong>Carga Horária Teórica: </strong><?php echo $disciplina->getChTeorDis(); ?></p>
		<p><strong>Carga Horária Prática: </strong><?php echo $disciplina->getChPratDis(); ?></p>
		<p><strong>Tipo: </strong><?php echo traduzTipo($disciplina->getTipoDis()); ?></p>

		<h2>Pré-Requisitos</h2>
		<?php if (count($prerequisitos)>0) : ?>				<!-- Verica se há pré-requisitos para gerar tabela ou não -->
			<table>
				<tr>
					<th>Códido Pré-requisito</th>
					<th>Nome Pré-requisito</th>
					<th>Opções</th>
				<tr>
				<?php foreach ($prerequisitos as $prerequisito) : ?>
					<tr>
						
						<?php $aux=$repositorioDisciplinas->buscarDisciplina($prerequisito->getPrereqId()) ?>
						<td><?php echo $aux->getCodDis(); ?></td>
						<td><?php echo $aux->getNomeDis(); ?></td>
						<td><a href="remover_prerequisito.php?id=<?php echo $prerequisito->getId(); ?>">Excluir</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php else : ?>
			<p>Disciplina sem pré-requisitos</p>
		<?php endif; ?>

		<form method="POST">				<!-- Formulário para anexar novo pré-requisito -->
			<fieldset>
				<legend>Novo Pré-Requisito</legend>
				<input type="hidden" name="disciplinaId" value="<?php echo $disciplina->getId(); ?>">
				<select name="prereqId">
					<option value=""></option>
					<?php $prerequisitos=[]; ?>
					<?php $prerequisitos=$repositorioDisciplinas->buscar(); ?>
					<?php foreach ($prerequisitos as $prerequisito) : ?>
						<option value="<?php echo $prerequisito->getId(); ?>">
							<?php echo $prerequisito->getCodDis(); ?>|<?php echo $prerequisito->getNomeDis(); ?>
						</option>
					<?php endforeach; ?>
				</select>
				<input type="submit" value="Cadastrar">
			</fieldset>
		</form>
	</div>



</body>
<!--
<body>
	<div="bloco_principal">									<! Exibe dados da disciplina selecionada
		<h1>Disciplina: <?php echo $disciplina['nomeDis']; ?></h1>
		<p><a href="disciplinas.php">Voltar</a></p>
		<p><strong>Código: </strong><?php echo $disciplina['codDis'] ?></p>
		<p><strong>Ementa: </strong><?php echo $disciplina['ementaDis'] ?></p>
		<p><strong>Sementre Ideal: </strong><?php echo $disciplina['semIdealDis'] ?></p>
		<p><strong>Carga Horária Teórica: </strong><?php echo $disciplina['chTeorDis'] ?></p>
		<p><strong>Carga Horária Prática: </strong><?php echo $disciplina['chPratDis'] ?></p>
		<p><strong>Tipo: </strong><?php echo traduzTipo($disciplina['tipoDis']) ?></p>

		<h2>Pré-Requisitos</h2>
		<?php if (count($prerequisitos)>0) : ?>				<! Verica se há pré-requisitos para gerar tabela ou não
			<table>
				<tr>
					<th>Códido Pré-requisito</th>
					<th>Nome Pré-requisito</th>
					<th>Opções</th>
				<tr>
				<?php foreach ($prerequisitos as $prerequisito) : ?>
					<tr>
						
						<?php $aux=buscarDisciplina($conexao, $prerequisito['prereqId']) ?>
						<td><?php echo $aux['codDis']; ?></td>
						<td><?php echo $aux['nomeDis']; ?></td>
						<td><a href="remover_prerequisito.php?id=<?php echo $prerequisito['id']; ?>">Excluir</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php else : ?>
			<p>Disciplina sem pré-requisitos</p>
		<?php endif; ?>

		<form method="POST">				<! Formulário para anexar novo pré-requisito 
			<fieldset>
				<legend>Novo Pré-Requisito</legend>
				<input type="hidden" name="disciplinaId" value="<?php echo $disciplina['id']; ?>">
				<select name="prereqId">
					<option value=""></option>
					<?php $prerequisitos=[]; ?>
					<?php $prerequisitos=buscarDisciplinas($conexao); ?>
					<?php foreach ($prerequisitos as $prerequisito) : ?>
						<option value="<?php echo $prerequisito['id']; ?>"><?php echo $prerequisito['codDis']; ?>|<?php echo $prerequisito['nomeDis']; ?></option>
					<?php endforeach; ?>
				</select>
				<input type="submit" value="Cadastrar">
			</fieldset>
		</form>
	</div>
</body>
-->

</html>