<?php $view->extend('::layout.html.php') ?>

<?php echo $view['form']->start($form) ?>
    <?php echo $view['form']->row($form['nombre']) ?>
    <?php echo $view['form']->row($form['email']) ?>

    <?php echo $view['form']->row($form['plainPassword']['first']) ?>
    <?php echo $view['form']->row($form['plainPassword']['second']) ?>

    <button type="submit">Registrar</button>
<?php echo $view['form']->end($form) ?>

<br>
<a href="<?php echo $view['router']->generate('homepage') ?>">
    Volver
</a>