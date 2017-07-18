<?php
/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 19/07/2017
 * Time: 06:35
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'sex') ?>
<?= $form->field($model, 'age') ?>
<?= $form->field($model, 'height')->label('Height(mm)') ?>
<?= $form->field($model, 'weight')->label('Weight(kg)') ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
</div>

<h1>
    <label>BMI:</label>
    <?= Html::encode($model->bmi) ?>
</h1>

<?php $form = ActiveForm::end(); ?>
