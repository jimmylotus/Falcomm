<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\superbase */

$this->title = 'Create Superbase';
$this->params['breadcrumbs'][] = ['label' => 'Superbases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="superbase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
