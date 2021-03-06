<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
				
                'brandLabel' =>Html::a(Html::img('./img/tituloTheeve2.png'),Url::toRoute('site/index')),
				//'brandLabel' => 'My Company',
                //'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],
                    //['label' => 'Sobre...', 'url' => ['/site/about']],
                    //['label' => 'Contacto', 'url' => ['/site/contact']],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Entrar', 'url' => ['/site/entrada']] :
                        ['label' => 'Salir (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
					['label' => 'Registro', 'url' => ['/site/registro']],
					['label' => 'Eventos', 'url' => ['/eventos']],
					
                ],
            ]);
            NavBar::end();
        ?>
	
    	<div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
	</div>
    
    <footer class="footer">
        <div class="container">
            <!--<p class="pull-left">&copy; Mi Empresa <?= date('Y') ?></p>-->
            <?php echo Html::a(Html::img('./img/Unetealeventoblanco.png'),Url::toRoute('site/evento')); ?>
        </div>
    </footer>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>