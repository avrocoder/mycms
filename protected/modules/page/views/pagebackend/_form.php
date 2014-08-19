<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */

Yii::app()->clientScript->registerScriptFile('/public/js/synctranslit/js/jquery.synctranslit.min.js');
Yii::import('ext.editor.imperavi-redactor-widget.ImperaviRedactorWidget');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255, 'data-toggle'=>"tooltip", 'title'=>"Page title", 'data-placement'=>"right")); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'slug'); ?>
		<?php echo $form->textField($model,'slug',array('size'=>60,'maxlength'=>255, 'data-toggle'=>"tooltip", 'title'=>"It uses in the url to this page.", 'data-placement'=>"right")); ?>
		<?php echo $form->error($model,'slug'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
                    <?php echo $form->textArea($model,'content',array('rows'=>16, 'cols'=>50, 'data-toggle'=>"tooltip", 'title'=>"Page content", 'data-placement'=>"right")); ?>
		<?php echo $form->error($model,'content'); ?>
	</div>

        <?php echo CHtml::link('Meta data','javascript:void(0)', array('class'=>'show-metadata', 'data-toggle'=>"tooltip", 'title'=>"Tooltip on right", 'data-placement'=>"right"))?>

        <div class='hidden_block'>
            <div class="row">
                    <?php echo $form->labelEx($model,'keywords'); ?>
                    <?php echo $form->textArea($model,'keywords',array('rows'=>6, 'cols'=>50, 'data-toggle'=>"tooltip", 'title'=>"Page keywords", 'data-placement'=>"right")); ?>
                    <?php echo $form->error($model,'keywords'); ?>
            </div>

            <div class="row">
                    <?php echo $form->labelEx($model,'description'); ?>
                    <?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'data-toggle'=>"tooltip", 'title'=>"Page description", 'data-placement'=>"right")); ?>
                    <?php echo $form->error($model,'description'); ?>
            </div>
        </div>        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php Yii::app()->clientScript->registerScriptFile('/public/bootstrap/js/bootstrap.min.js'); ?>

<script>
 


$(document).ready(function(){
    
    $('.show-metadata').click(function() {
        $('.hidden_block').toggle();    
    });   
    
    $('#Page_title').syncTranslit({destination: 'Page_slug'});

    $('.form .row input, .form .row textarea').tooltip();

});

</script>

    <?php
$this->widget('ImperaviRedactorWidget', array(
    // The textarea selector
    'selector' => 'textarea#Page_content',
    // Some options, see http://imperavi.com/redactor/docs/
    //'options' => array(),
    'options' => array(
        'lang' => 'ru',
        'toolbar' => true,
        'iframe' => true,
        'imageUpload' =>  $this->createUrl('pagebackend/upload'),
        'imageUploadErrorCallback'=>'js:function(obj, json){ alert(json.error); }', // function to show upload error to user
       
        
    ),
));

?>