<?php
/* @var $this ThreadController */
/* @var $model Thread */
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
		<?php echo $form->dropDownList($model,'user_id',$model->getUsername(),array('empty'=>'Pilih')); ?>
		
	</div>

	<div class="row">
		<?php echo $form->label($model,'kategori_id'); ?>
		<?php echo $form->dropDownList($model,'kategori_id',$model->getKategori(),array('empty'=>'Pilih')); ?>
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