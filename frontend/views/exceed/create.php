<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\exceed */

$this->title = 'Create Exceed';
$this->params['breadcrumbs'][] = ['label' => 'Exceeds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exceed-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
