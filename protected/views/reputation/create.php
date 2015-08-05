<?php
/* @var $this ReputationController */
/* @var $model Reputation */

$this->breadcrumbs=array(
	'Reputations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reputation', 'url'=>array('index')),
	array('label'=>'Manage Reputation', 'url'=>array('admin')),
);
?>

<h1>Create Reputation</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>