<?php
/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 14/07/2017
 * Time: 06:47
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>

<h1>Countries</h1>
<ul>
    <?php foreach ($countries as $country): ?>
        <li>
            <?= Html::encode("{$country->name}, ({$country->code})") ?>:
            <?= $country->population ?>
        </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
