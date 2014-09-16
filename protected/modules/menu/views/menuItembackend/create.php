<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
	'Menus'=>array('menubackend/index'),
        'Menu Items'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MenuItem', 'url'=>array('index')),
	array('label'=>'List Menu', 'url'=>array('/menu/menubackend/index')),
);
?>

<h1>Create MenuItem</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>