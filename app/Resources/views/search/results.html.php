<!-- app/Resources/views/default/results.html.php -->
<?php $view->extend('::layout.html.php') ?>

<table>
	<tr>
		<th>Descripción</th>
		<th>Tipo</th>
		<th>Pago aplazado (S/N)</th>
		<th>Pujar</th>
		<th>Cantidad en euros</th>
		<th>Aval</th>
	</tr>
	<?php foreach ($objetos as $producto): ?>
      <tr>
        <td><?php echo $producto->getDescripcion() ?></td>
        <td><?php echo $producto->getIdTipo()->getNombre() ?></td>
        <td><?php echo $producto->getPagoaplazosSn() ?></td>
        <td><?php
        		if ($producto->getDisponibleSn() == 'S' || $producto->getDisponibleSn() == 's'):
        			echo "";//pujar
        		else:
        			echo "-- no abierto --";
        		endif;
        	?>
        </td>
        <td><input type="number" id="cantidad" name="_cantidad" /></td>
        <td>
        	<?php
        		if ($producto->getAvalSn() == 'S' || $producto->getAvalSn() == 's'):
        			echo "";//pujar
        		else:
        			echo "-- no necesita --";
        		endif;
        	?>
        </td>
      </tr>
    <?php endforeach; ?>
</table>