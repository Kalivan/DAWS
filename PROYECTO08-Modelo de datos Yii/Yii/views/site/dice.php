<?php
use yii\helpers\Html;
?>
<?= Html::encode($mensaje) ;


echo 'Tu dirección IP es: ' . $_SERVER['REMOTE_ADDR'];

?>
