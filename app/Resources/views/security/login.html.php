<?php $view->extend('::layout.html.php') ?>

<?php if ($error): ?>
    <div><?php echo $error->getMessage() ?></div>
<?php endif ?>

<form action="<?php echo $view['router']->generate('login_check') ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="_username" value="<?php echo $last_username ?>" />

    <label for="password">Password:</label>
    <input type="password" id="password" name="_password" />

    <button type="submit">login</button>
</form>