<?php echo $view['form']->start($form) ?>
    <?php echo $view['form']->row($form['username']) ?>
    <?php echo $view['form']->row($form['email']) ?>

    <?php echo $view['form']->row($form['plainPassword']['first']) ?>
    <?php echo $view['form']->row($form['plainPassword']['second']) ?>

    <button type="submit">Registrar</button>
<?php echo $view['form']->end($form) ?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Registro</title>
</head>
<body>

<form method="post" action="/register">
	<div>
		<label for="form_username">Usuario: </label>
		<input type="text" id="form_username" name="<?php echo $view['form']->row($form['username']) ?>" />
		
		<label for="form_email">Email: </label>
		<input type="text" id="form_email" name="email" />
		
		<label for="form_password">Password: </label>
		<input type="text" id="form_password" name="form[plainPassword][first]" />
		
		<label for="form_password2">Repetir password: </label>
		<input type="text" id="form_password2" name="form[plainPassword][second]" />
		
		<button type="submit">Registrar</button>
	</div>
</form>

</body>
</html>