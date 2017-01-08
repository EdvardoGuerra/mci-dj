<form method="POST">			<!-- Formulário com método POST que retornará para comentarios.php -->
	
	<input type="hidden" name="id" value="<?php echo $comentario->getId(); ?> ">
	
	<fieldset>
		<legend>Novo Comentario</legend>
		<label>Disciplina 
			<select name="disciplinaId">
				<option value=""></option>
				<?php $disciplinas=[]; ?>
				<?php $disciplinas=$repositorioDisciplinas->buscar(); ?> 
				<?php foreach ($disciplinas as $disciplina) : ?>
					<option value="<?php echo $disciplina->getId(); ?>">
						<?php echo $disciplina->getCodDis(); ?>|<?php echo $disciplina->getNomeDis(); ?>
					</option>
				<?php endforeach; ?>
			</select>
		</label> <br/>
		<label>Comentário
			<input type="text" name="coment">
		</label><br/>
		<label>Nota
			<input type="radio" name="nota" value="1" 
				<?php echo ($comentario->getNota()==1) ? 'checked' : '' ?> 
			/>1
			<input type="radio" name="nota" value="2" 
				<?php echo ($comentario->getNota()==2) ? 'checked' : '' ?> 
			/>2
			<input type="radio" name="nota" value="3" 
				<?php echo ($comentario->getNota()==3) ? 'checked' : '' ?> 
			/>3
			<input type="radio" name="nota" value="4" 
				<?php echo ($comentario->getNota()==4) ? 'checked' : '' ?> 
			/>4
			<input type="radio" name="nota" value="5" 
				<?php echo ($comentario->getNota()==5) ? 'checked' : '' ?> 
			/>5
		</label>	
		<input type="submit" value="<?php echo ($comentario->getId() > 0) ? 'Atualizar' : 'Cadastrar'; ?>" class="botao" />
	</fieldset>
</form>