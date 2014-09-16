<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
	'Menus'=>array('menubackend/index'),
        'Menu Items'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List MenuItem', 'url'=>array('index')),
	array('label'=>'Create MenuItem', 'url'=>array('create')),
	array('label'=>'View MenuItem', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'List Menu', 'url'=>array('/menu/menubackend/index')),
);
?>

<h1>Update MenuItem <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>