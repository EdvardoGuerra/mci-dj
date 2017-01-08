<table>
	<tr>
		<td>Código</td>
		<td>Nome</td>
		<td>Ementa</td>
		<td>Sem. Ideal</td>
		<td>CH Teórica</td>
		<td>CH Prática</td>
		<td>Tipo</td>
		<td>Opções</td>
	</tr>

	<?php foreach ($disciplinas as $disciplina) : ?>
		<tr>
			<td><?php echo htmlentities($disciplina->getCodDis()); ?></td>
			<td><?php echo htmlentities($disciplina->getNomeDis()); ?></td>
			<td><?php echo htmlentities($disciplina->getEmentaDis()); ?></td>
			<td><?php echo $disciplina->getSemIdealDis(); ?></td>
			<td><?php echo $disciplina->getChTeorDis(); ?></td>
			<td><?php echo $disciplina->getChPratDis(); ?></td>
			<td><?php echo traduzTipo($disciplina->getTipoDis()); ?></td>
			<td>
				<a href="editar_disciplina.php?id=<?php echo $disciplina->getId(); ?>">Editar</a>
				<a href="remover_disciplina.php?id=<?php echo $disciplina->getId(); ?>">Remover</a>
				<a href="disciplina.php?id=<?php echo $disciplina->getId(); ?>">Detalhes</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>