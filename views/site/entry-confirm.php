<?php
/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 13/07/2017
 * Time: 08:31
 */
use yii\helpers\Html;
?>
<p>You have entered the following information</p>

<ul>
    <li><label>Name</label>:<?= Html::encode($model->name)?></li>
    <li><label>Email</label>:<?= Html::encode($model->email)?></li>
</ul>
