<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1 align="center">Lugares<h1>
<table id ='csslugares'><thead><tr><th>id</th><th>Lugar</th><th>Descripción</th><th>País</th><th>Provincia</th><th>Fecha</th></tr></thead>
	<?php foreach ($lugares as $lugar): ?>
        <tbody><tr>
           <td> <?= $lugar->id_lugar ?> </td>
           <td> <?= $lugar->lugar ?> </td>
           <td> <?= $lugar->descripcion ?> </td>
		   <td> <?=	$lugar->pais ?> </td>
           <td> <?=	$lugar->provincia ?> </td>
           <td> <?=	$lugar->fecha ?> </td>
        </tr></tbody>
    <?php endforeach; ?>
</table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

