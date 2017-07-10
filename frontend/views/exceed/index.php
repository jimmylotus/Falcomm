<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\exceedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '超量网元';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exceed-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
    <p class="text-right">
        <?//= Html::a('搜索', ['search'], ['class' => 'btn btn-success']) ?>


    </p>
         <div class="col-md-10">
            <p class="text-left"><?= Html::a(FA::icon('file-excel-o').' 导出为Excel', ['toexcel'], ['class' => 'btn btn-info']) ?></p>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [

                'date',
                'city',
                'major',
                'name',
                'ca_nums',
                // 'valid',

                ['class' => 'yii\grid\ActionColumn'],

            ],
            'filterRowOptions' => ['class' => 'hide'],
            'summary' => '<p>目前显示第{begin}到第{end}条记录，共{totalCount}条数据，共{pageCount}页</p>',
            'summaryOptions' => ['class' => 'text-right'],
            ]); ?>
         </div>
        <div class="col-md-2 ">
            <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        </div>
    </div>
</div>
<?
$session = \Yii::$app->session;
$session->set('dataobj' ,$dataProvider->query->all());
?>