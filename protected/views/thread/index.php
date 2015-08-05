<?php
/* @var $this ThreadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Threads',
);

$this->menu=array(
	array('label'=>'Create Thread', 'url'=>array('create')),
	array('label'=>'Manage Thread', 'url'=>array('admin')),
);
?>

<h1>Threads</h1>

<?php 
	$form = $this->beginWidget('CActiveForm',array());
	echo CHtml::link('Buat Thread Baru',array('thread/create','id'=>$id));	
	$this->endWidget();
?>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>

<?php
	$this->widget('zii.widgets.grid.CGridView',array(
		'dataProvider'=>$dataProvider,
		'emptyText'=>'Belum ada Thread pada Kategori ini',
		'summaryText'=>'',
		'columns'=>array(
			array(
				'name'=>'Judul',
				'type'=>'raw',
				'value'=>'CHtml::link($data->judul,array("/thread/view","id"=>$data->id))',
			),
			array(
				'name'=>'Rate',
				'type'=>'raw',
				'value'=>'',
			),
			array(
				'name'=>'By',
				'type'=>'raw',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'User::model()->findByPk($data->user_id)->username',
			),
			array(
				'name'=>'Total Komentar',
				'type'=>'raw',
				'htmlOptions'=>array('style'=>'text-align:center'),
				'value'=>'Comment::model()->countByAttributes(array("thread_id"=>$data->id))',
			),
		),
	));
?>