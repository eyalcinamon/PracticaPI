<!-- app/Resources/views/default/index.html.php -->
<?php $view->extend('::layout.html.php') ?>

<h1>Bienvenido a la página de subastas</h1>

<?php foreach ($view['session']->getFlash('notice') as $message): ?>
    <div class="flash-notice">
        <?php echo "<div class='flash-error'>$message</div>" ?>
    </div>
<?php endforeach ?>

<h2>Últimos objetos ofertados y disponibles</h2>
<?php foreach ($ofertados as $ofertado): ?>
	<?php echo $ofertado->getDescripcion() ?>
	<br>
<?php endforeach ?>

<br>
<a href="<?php echo $view['router']->generate('user_registration') ?>">
    Regístrate!
</a>
<br>
<?php if ($app->getUser()) { ?>
	<p> Usuario: <?php echo $app->getUser()->getNombre()?> </p>
	<a href="<?php echo $view['router']->generate('logout') ?>">
	    Cerrar sesión
	</a>
<?php } else {?>
	<br>
	<a href="<?php echo $view['router']->generate('login_route') ?>">
	    Iniciar sesión
	</a>
<?php } ?>
<br>
<br>
<a href="<?php echo $view['router']->generate('advance_search') ?>">
    Buscador avanzado
</a>
