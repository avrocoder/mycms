<?php
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
Yii::import('ext.editor.imperavi-redactor-widget.ImperaviRedactorWidget');
Yii::app()->clientScript->registerScriptFile('/public/js/synctranslit/js/jquery.synctranslit.min.js');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'category-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_id'); ?>
                <?php echo $form->dropDownList($model,'parent_id',CHtml::listData(Category::model()->findAll(), 'id', 'name'),array('empty'=>'Category...')); ?>
		<?php echo $form->error($model,'parent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

        <div class="row">
            <?php echo $form->labelEx($model, 'description'); ?>
            <?php
            $this->widget(
                'ImperaviRedactorWidget', array(
                    'model'       => $model,
                    'attribute'   => 'description',
                    'options'     => array(
                        'lang' => 'ru',
                        'imageUpload' =>  $this->createUrl('categorybackend/upload'),
                    ),
                )
            ); ?>
            <?php echo $form->error($model,'description'); ?>
        </div>
        <div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>

	<div class="row">
                <?php echo $form->labelEx($model,'status'); ?>
                <?php echo $form->dropDownList($model,'status',$model->getStatusList(),
                        array('options' => array(1 => array('selected' => 'selected')))); ?>
                <?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">

$(document).ready(function(){
    $('#Category_name').syncTranslit({destination: 'Category_slug'});
});

</script>
