<?php
/* @var $this ThreadController */
/* @var $model Thread */

$this->breadcrumbs=array(
	'Thread'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Thread', 'url'=>array('index')),
	array('label'=>'Create Thread', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#thread-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kelola Threads</h1>

<div class="search-form"">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'thread-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'Judul',
			'type'=>'raw',
			'value'=>'CHtml::link($data->judul,array("/thread/view","id"=>$data->id))'
		),
		array(
			'name'=>'By',
			'type'=>'raw',
			'htmlOptions'=>array('style'=>'text-align:center'),
			'value'=>'User::model()->findByPk($data->user_id)->username',
		),
		array(
			'name'=>'Kategori',
			'type'=>'raw',
			'htmlOptions'=>array('style'=>'text-align:center'),
			'value'=>'CHtml::link(Kategori::model()->findByPk($data->kategori_id)->kategori,array("/thread/index","id"=>$data->kategori_id))',
		),
		'tanggalPost',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
