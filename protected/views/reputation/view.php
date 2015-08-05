<?php
/* @var $this ReputationController */
/* @var $model Reputation */

$this->breadcrumbs=array(
	'Reputations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reputation', 'url'=>array('index')),
	array('label'=>'Create Reputation', 'url'=>array('create')),
	array('label'=>'Update Reputation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reputation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reputation', 'url'=>array('admin')),
);
?>

<h1>View Reputation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tanggal',
		'jenis',
		'pemberi_id',
		'penerima_id',
	),
)); ?>
