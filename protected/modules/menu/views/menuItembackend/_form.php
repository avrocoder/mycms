<?php
/* @var $this MenuItemController */
/* @var $model MenuItem */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'menu-item-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

       <div class="row">
                <?php echo $form->labelEx($model,'menu_id'); ?>
                <?php echo $form->dropDownList($model,'menu_id',CHtml::listData(Menu::model()->findAll(), 'id', 'title'),array('empty'=>'Menu...')); ?>
		<?php echo $form->error($model,'menu_id'); ?>

	</div>
       <div class="row">
                <?php echo $form->labelEx($model,'parent_id'); ?>
                <?php echo $form->dropDownList($model,'parent_id',$model->getListData(),array('empty'=>'Корень')); ?>
		<?php echo $form->error($model,'parent_id'); ?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isInternalRoute'); ?>
		<?php echo $form->dropDownList($model,'isInternalRoute',array(0=>'No',1=>'Yes')); ?>
		<?php echo $form->error($model,'isInternalRoute'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'order'); ?>
		<?php echo $form->textField($model,'order'); ?>
		<?php echo $form->error($model,'order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'description'); ?>
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
     $('#MenuItem_menu_id').change(function(){
        $.ajax({
            type: 'post',
            url: '<?php echo Yii::app()->urlManager->createUrl('menu/MenuItembackend/ajaxGetChildItems');?>',
            data: ({menu_id: $('#MenuItem_menu_id').val()}),
            success: function(data){
                var $eParent = $('#MenuItem_parent_id');
                $eParent.html(data);
            }
        });
     })
</script>