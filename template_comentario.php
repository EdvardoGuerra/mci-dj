
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>MCi-DJ - Comentário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/mci.css">
</head>
<body> 

	<div id="bloco_principal">									
		<h1>Disciplina:
			<?php echo $disciplina->getNomeDis(); ?>			
			<?php  ?>
		</h1>
		<p><a href="comentarios.php">Voltar</a></p>
		

		<form method="POST">				<!-- Formulário para anexar novo pré-requisito -->
			<fieldset>
				<legend>Editar Comentário</legend>
				<input type="hidden" name="disciplinaId" value="<?php echo $disciplina->getId(); ?>">
				<textarea name="coment">
					<?php echo $comentario->getComent(); ?>
				</textarea>
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
	</div>



</body>
</html>