<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Lugares;

class LugaresController extends Controller
{
	public function actionIndex()
	{
		$query = Lugares::find();
		
		$pagination = new Pagination([
			'defaultPageSize' => 12,
			'totalCount' => $query->count(),
		]);
		
		$lugares = $query->orderBy('id_lugar')
			->offset($pagination->offset)
			->limit($pagination->limit)
			->all();
			
		return $this->render('index', [
			'lugares' => $lugares,
			'pagination' => $pagination,
			
		]);
	} 
}
?>