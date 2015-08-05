<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Profile'=>array('index'),
	$model->username,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User <?php echo $model->username; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		// 'id',
		'username',
		// 'password',
		// 'saltPassword',
		'email',
		'joinDate',
		// 'level_id',
		array(
			'label'=>'Level',
			'type'=>'raw',
			'value'=>Level::model()->with('users')->findByPk($model->level_id)->level,
		),
		// 'avatar',
		array(
			'label'=>'avatar',
			'type'=>'raw',
			'value'=>CHtml::image(Yii::app()->baseUrl.'/avatar/'.$model->avatar),
		),
	),
)); ?>