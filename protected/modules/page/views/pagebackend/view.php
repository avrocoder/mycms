<?php
$this->breadcrumbs=array(
	'Pages'=>array('index'),
	$data->title,
);

$this->menu=array(
	array('label'=>'List Page', 'url'=>array('index')),
	array('label'=>'Create Page', 'url'=>array('create')),
	array('label'=>'Update Page', 'url'=>array('update', 'id'=>$data->id)),
	array('label'=>'Delete Page', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$data->id),'confirm'=>'Are you sure you want to delete this item?')),
);

        $this->pageTitle=Yii::app()->name . " - {$data->title}";
        $this->pageKeywords = $data->keywords;
        $this->pageDescription = $data->description;

        echo '<h2 class="page_header">' . $data->title . '</h2>';
        echo $data->content;
?>
