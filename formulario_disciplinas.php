<form method="POST">			<!-- Formulário com método POST que retornará para disciplinas.php -->
	<input type="hidden" name="id" value="<?php echo $disciplina->getId(); ?> ">
	<fieldset>
		<legend>Nova Disciplina</legend>
		<label>Código da Disciplina 
			<?php if ($temErros && array_key_exists('codDis', $errosValidacao)) : ?>
				<span class="erro">
					<?php echo $errosValidacao['codDis']; ?>
				</span>
			<?php endif; ?>
		</label>
		<input type="text" name="codDis" value="<?php echo htmlentities($disciplina->getCodDis()); ?>" />
		<label>Nome da disciplina</label>
		<input type="text" name="nomeDis" value="<?php echo htmlentities($disciplina->getNomeDis()); ?>"/>
		<label>Ementa da Disciplina</label>
		<textarea name="ementaDis">
			<?php echo htmlentities($disciplina->getEmentaDis()); ?>
		</textarea>
		<label>Semestre Ideal</label>
		<input type="number" name="semIdealDis" value="<?php echo $disciplina->getSemIdealDis(); ?>"/>
		<fieldset>
			<legend>Carga Horária</legend>
			<label>
				Teórica <input type="number" name="chTeorDis" value="<?php echo $disciplina->getChTeorDis(); ?>"/>
				Prática <input type="number" name="chPratDis" value="<?php echo $disciplina->getChPratDis(); ?>"/>
			</label>
		</fieldset>
		<fieldset>
			<legend>Tipo</legend>
			<label>
				<input type="radio" name="tipoDis" value="1" 
					<?php echo ($disciplina->getTipoDis()==1) ? 'checked' : '' ?> />Obrigatória
				<input type="radio" name="tipoDis"	value="2"
					<?php echo ($disciplina->getTipoDis()==2) ? 'checked' : '' ?> />Eletiva
				<input type="radio" name="tipoDis"	value="3"
					<?php echo ($disciplina->getTipoDis()==3) ? 'checked' : '' ?> />Opcional
			</label>
		</fieldset><br/>
		<input type="submit" value="<?php echo ($disciplina->getId() > 0) ? 'Atualizar' : 'Cadastrar'; ?>" class="botao" />
	</fieldset>
</form>