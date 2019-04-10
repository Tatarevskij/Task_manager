<?php

/* @var $this yii\web\View */
/* @var $product \app\models\Product */

$this->title = 'Test';
?>
<?=
\yii\widgets\DetailView::widget(['model' => $product])
?>
