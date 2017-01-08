<form method="POST">			<!-- Formulário com método POST que retornará para disciplinas.php -->
	<input type="hidden" name="id" value="<?php echo $professor->getId(); ?> ">
	<fieldset>
		<legend>Novo(a) Professor(a)</legend>
		<label>Nome do Professor(a) 
			<?php if ($temErros && array_key_exists('nomeProf', $errosValidacao)) : ?>
				<span class="erro">
					<?php echo $errosValidacao['nomeProf']; ?>
				</span>
			<?php endif; ?>
		</label>
		<input type="text" name="nomeProf" value="<?php echo htmlentities($professor->getNomeProf()); ?>" />
		<label>E-mail de contato</label>
		<input type="email" name="emailProf" value="<?php echo htmlentities($professor->getEmailProf()); ?>" />
		<label>Site</label>
		<input type="url" name="urlProf" value="<?php echo htmlentities($professor->getUrlProf()); ?>" />
		<input type="submit" class="botao" value="<?php echo ($professor->getId()>0) ? 'Atualizar' : 'Cadastrar'; ?>"/>
		<br/>
	</fieldset>
</form>