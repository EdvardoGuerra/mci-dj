<table>
	<tr>
		<td>Código</td>
		<td>Nome</td>
		<td>Comentario</td>
		<td>Nota</td>
	</tr>

	<?php foreach ($comentarios as $comentario) : ?>
		<tr>
			<?php $aux=$repositorioDisciplinas->buscar($comentario->getDisciplinaId()); ?>
			<td><?php echo $aux->getCodDis(); ?></td>
			<td><?php echo $aux->getNomeDis(); ?></td>
			<td><?php echo $comentario->getComent(); ?></td>
			<td><?php echo $comentario->getNota(); ?></td>
			<td>
				<a href="editar_comentario.php?id=<?php echo $comentario->getId(); ?>">Editar</a>
				<a href="remover_comentario.php?id=<?php echo $comentario->getId(); ?>">Remover</a>
				<!--
				<a href="disciplina.php?id=<?php echo $disciplina->getId(); ?>">Detalhes</a>
				-->
			</td>
		</tr>
	<?php endforeach; ?>
</table>