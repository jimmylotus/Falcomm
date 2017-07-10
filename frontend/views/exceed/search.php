<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\exceedSearch */
/* @var $form yii\widgets\ActiveForm */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Exceeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>搜索</h1>
<div class="exceed-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'city') ?>

    <?= $form->field($model, 'major') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'ca_nums') ?>

    <?php // echo $form->field($model, 'valid') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
