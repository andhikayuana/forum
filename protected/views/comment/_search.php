<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'judul'); ?>
		<?php echo $form->textField($model,'judul',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->dropDownList($model,'user_id',Thread::getUsername(),array('empty'=>'Pilih')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'thread_id'); ?>
		<?php echo $form->dropDownList($model,'thread_id',$model->getJudul(),array('empty'=>'Pilih')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggalPost'); ?>
		<?php echo $form->dateField($model,'tanggalPost'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->