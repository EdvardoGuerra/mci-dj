<table>
	<tr>
		<td>Nome</td>
		<td>E-Mail</td>
		<td>Site</td>
		<td>Opções</td>
	</tr>
		<?php foreach ($professores as $professor) : ?>
		<tr>
			<td><?php echo $professor->getNomeProf(); ?></td>
			<td><?php echo $professor->getEmailProf(); ?></td>
			<td><?php echo $professor->getUrlProf(); ?></td>
			<td>
				<a href="editar_professor.php?id=<?php echo $professor->getId(); ?>">Editar</a>
				<a href="remover_professor.php?id=<?php echo $professor->getId(); ?>">Remover</a>
				<a href="professor.php?id=<?php echo $professor->getId(); ?>">Detalhes</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>