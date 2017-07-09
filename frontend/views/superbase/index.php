<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SuperbaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$objectPHPExcel = new PHPExcel();
$this->title = '超级基站';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="superbase-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增超级基站', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('导出为Excel', ['excel'], ['class' => 'btn btn-info']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'city',
            'area',
            'name',
            'manu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
