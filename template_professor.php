<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MCi-DJ - Professor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mci.css">
</head>
<body>
	<div id="bloco_principal">									<!-- Exibe dados do professor selecionado -->
		<h1>Professor: <?php echo $professor->getNomeProf(); ?></h1>
		<p><a href="professores.php">Voltar</a></p>
		<p><strong>E-Mail: </strong><?php echo $professor->getEmailProf(); ?></p>
		<p><strong>Site: </strong><?php echo $professor->getUrlProf(); ?></p>

		<h2>Disciplinas Ministradas</h2>
		<?php if (count($ministradas)>0) : ?>				<!-- Verica se há pré-requisitos para gerar tabela ou não -->
			<table>
				<tr>
					<th>Código da disciplina</th>
					<th>Nome da disciplina</th>
					<th>Opções</th>
				<tr>
				<?php foreach ($ministradas as $ministrada) : ?>
					<tr>
						<?php $aux = $repositorioDisciplinas->buscarDisciplina($ministrada->getDisciplinaId()); ?>
						<td><?php echo $aux->getCodDis(); ?></td>
						<td><?php echo $aux->getNomeDis(); ?></td>
						<td><a href="remover_ministrada.php?id=<?php echo $ministrada->getId(); ?>">Excluir</a></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php else : ?>
			<p>Professor(a) ainda sem disciplinas cadastradas</p>
		<?php endif; ?>



		<form method="POST">				<!-- Formulário para anexar disciplina ministrada -->
			<fieldset>
				<legend>Nova Disciplina Ministrada</legend>
				<input type="hidden" name="professorId" value="<?php echo $professor->getId(); ?>">
				<select name="disciplinaId">
					<option value=""></option>
					<?php $disciplinas=[]; ?>
					<?php $disciplinas=$repositorioProfessores->buscarDisciplinas(); ?> <!-- Problema -->
					<?php foreach ($disciplinas as $disciplina) : ?>
						<option value="<?php echo $disciplina->getId(); ?>">
							<?php echo $disciplina->getCodDis(); ?>|<?php echo $disciplina->getNomeDis(); ?>
						</option>
					<?php endforeach; ?>
					

				</select>
				<input type="submit" value="Cadastrar">
			</fieldset>
		</form>

	</div>
</body>
</html>