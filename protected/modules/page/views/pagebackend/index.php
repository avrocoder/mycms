<?php
/* @var $this PageController */
/* @var $model Page */

$this->breadcrumbs=array(
	'Pages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>List Pages</h1>

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
<?php Yii::import('bootstrap.widgets.*')?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
                array(
                     'name' => 'category',
                     'value' => '$data->category->name',
                     'filter' => CHtml::activeDropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'name'), array('encode' => false, 'empty' => ''))
                ),
                'slug',
		//'content',
		//'keywords',
		//'description',
                'status',
		array(
                 'name' => 'user',
                 'value' => '$data->user->username',
                    
                ),
		array(
                 'header' => 'Url',
                 'type' => 'raw',
                 'value' => 'CHtml::link($data->getUrl(), array("/page/$data->slug"))',
                    
                ),
		/*
		'created_at',
		'updated_at',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
