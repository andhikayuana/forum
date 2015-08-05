<?php
/* @var $this ReputationController */
/* @var $model Reputation */

$this->breadcrumbs=array(
	'Reputations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reputation', 'url'=>array('index')),
	array('label'=>'Create Reputation', 'url'=>array('create')),
	array('label'=>'View Reputation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reputation', 'url'=>array('admin')),
);
?>

<h1>Update Reputation <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>