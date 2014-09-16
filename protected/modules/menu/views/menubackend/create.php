<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Menu', 'url'=>array('index')),
        array('label'=>'List Menu Items', 'url'=>array('menuItembackend/index')),
    );
?>

<h1>Create Menu</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>