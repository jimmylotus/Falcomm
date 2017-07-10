<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\exceed;

/* @var $this yii\web\View */
/* @var $model frontend\models\exceedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exceed-search">

    <div class="panel panel-info">
        <div class="panel-heading">
            <h5 class="panel-title"><i class="fa fa-search" aria-hidden="true"></i> 搜索</h5>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?//= $form->field($model, 'id') ?>
            <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::className(), [
                // if you are using bootstrap, the following line will set the correct style of the input field
                'options' => ['class' => 'form-control'],
                'language' => 'zh-CN',
                'dateFormat' => 'yyyy-MM-dd',
                // ... you can configure more DatePicker properties here
            ]) ?>

          <?
          $cities = exceed::find()->select('city')->groupBy('city')->all();
          $items[''] = "所有地市";
          foreach ($cities as $city) {
             //$i=$i+1;
            $items[$city->city] =  $city->city;
          }
          $devices = exceed::find()->select('major')->groupBy('major')->all();
          $device[''] = "所有设备";
          foreach ($devices as $i) {
              //$i=$i+1;
              $device[$i->major] = $i->major;
          }

          ?>

            <?= $form->field($model, 'city') ->dropDownList($items)?>

            <?= $form->field($model, 'major')->dropDownList($device) ?>

            <?= $form->field($model, 'name') ?>

            <?=  $form->field($model, 'ca_nums')->label('告警数量大于')?>

            <?php // echo $form->field($model, 'valid') ?>

            <div class="form-group">
                <?= Html::submitButton('搜素', ['class' => 'btn btn-primary']) ?>
                <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>

            <?php ActiveForm::end(); ?>


        </div>
    </div>




</div>
