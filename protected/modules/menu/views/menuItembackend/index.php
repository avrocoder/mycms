<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */

$this->breadcrumbs=array(
	'Menus'=>array('menubackend/index'),
        'Items'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Item', 'url'=>array('create')),
	array('label'=>'List Menu', 'url'=>array('/menu/menubackend/index')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-item-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Menu Items</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'menu-item-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
                    'name' => 'menu_id',
                    'value' => '$data->menu->title',
                    'filter' => CHtml::activeDropDownList($model, 'menu_id', CHtml::listData(Menu::model()->findAll(), 'id', 'title'), array('empty' => ''))
                ),
		array(
                    'name' => 'parent_id',
                    'value' => '$data->getParentTitle()',
                    'filter' => CHtml::activeDropDownList($model, 'parent_id', CHtml::listData(MenuItem::model()->findAll(), 'id', 'title'), array('empty' => ''))
                ),
		'title',
		'link',
		'order',
		array(
                    'name' => 'status',
                    'value' => '$data->getStatusName($data->status)',
                    'filter' => CHtml::activeDropDownList($model, 'status', Menu::model()->getStatusList(), array('empty' => ''))
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
