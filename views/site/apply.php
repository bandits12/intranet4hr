<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApplyForm */
/* @var $form ActiveForm */

$this->title = 'Apply Form';
?>
<div class="site-apply">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        You are applying for <b><?= Html::encode($idInView->name) ?></b> position.
        <br>
        Please enter all necessary information below:
    </p>

    <div>
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'surname') ?>
            <?= $form->field($model, 'phone_number') ?>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div><!-- site-apply -->