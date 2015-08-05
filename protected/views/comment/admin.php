<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comment'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Comment', 'url'=>array('index')),
	array('label'=>'Create Comment', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#comment-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Komentar</h1>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		'id',
		// 'judul',
		array(
			'name'=>'Judul',
			'type'=>'raw',
			'value'=>'Chtml::link($data->judul,array("/comment/view","id"=>$data->id))',
		),
		// 'isi',
		array(
			'name'=>'By',
			'type'=>'raw',
			'htmlOptions'=>array('style'=>'text-align:center'),
			'value'=>'User::model()->findByPk($data->user_id)->username',
		),
		// 'thread_id',
		array(
			'name'=>'Thread',
			'type'=>'raw',
			'htmlOptions'=>array('style'=>'text-aliign:center'),
			'value'=>'Chtml::link(Thread::model()->findByPk($data->thread_id)->judul,array("/thread/view","id"=>$data->thread_id))',
		),
		'tanggalPost',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
