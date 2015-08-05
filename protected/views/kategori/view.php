<?php
/* @var $this KategoriController */
/* @var $model Kategori */

$this->breadcrumbs=array(
	'Kategori'=>array('index'),
	$model->kategori,
);

$this->menu=array(
	array('label'=>'List Kategori', 'url'=>array('index')),
	array('label'=>'Create Kategori', 'url'=>array('create')),
	array('label'=>'Update Kategori', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Kategori', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Kategori', 'url'=>array('admin')),
);
?>

<h1>Kategori <?php echo $model->kategori; ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'kategori',
	),
)); */?>
<?php 
	$form = $this->beginWidget('CActiveForm',array());
	echo CHtml::link('Buat Thread Baru',array('thread/create','id'=>$model->id));
	
	$this->endWidget();
?>