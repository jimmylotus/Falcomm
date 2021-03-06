<?php
use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FA;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SuperbaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '超级基站';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="superbase-index">

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(FA::icon('plus').' 新增超级基站', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(FA::icon('file-excel-o').' 全部导出为Excel', ['excel', 'title'=>$this->title], ['class' => 'btn btn-info']) ?>

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
        'options' => ['class' => 'table-striped table-condensed'],
        'headerRowOptions' => ['class' => 'active'],
    ]); ?>
</div>
