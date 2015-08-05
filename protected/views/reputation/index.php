<?php
/* @var $this ReputationController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reputations',
);

$this->menu=array(
	array('label'=>'Create Reputation', 'url'=>array('create')),
	array('label'=>'Manage Reputation', 'url'=>array('admin')),
);
?>

<h1>Reputations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
