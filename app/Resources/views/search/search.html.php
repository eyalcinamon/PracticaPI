<!-- app/Resources/views/search/search.html.php -->
<?php $view->extend('::layout.html.php') ?>

<h2>Buscador avanzado</h2>

<?php foreach ($view['session']->getFlash('notice') as $message): ?>
    <div class="flash-notice">
        <?php echo "<div class='flash-error'>$message</div>" ?>
    </div>
<?php endforeach ?>

<br>
<?php echo $view['form']->start($form) ?>
    <?php echo $view['form']->row($form['descripcion']) ?>
    <?php echo $view['form']->row($form['aval_sn']) ?>
    <?php echo $view['form']->row($form['pagoaplazos_sn']) ?>
    <?php echo $view['form']->row($form['idtipo']) ?>
    <?php echo $view['form']->row($form['search']) ?>
    <?php echo $view['form']->row($form['searchAll']) ?>
<?php echo $view['form']->end($form) ?>

<br>
<a href="<?php echo $view['router']->generate('homepage') ?>">
    Inicio
</a>
