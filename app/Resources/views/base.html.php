<!-- app/Resources/views/base.html.php -->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php $view['slots']->output('title', 'Aplicacion de subastas') ?></title>
    </head>
    <body>
        <?php $view['slots']->output('_content') ?>
    </body>
</html>
