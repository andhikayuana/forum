<?php
/* @var $this KategoriController */
/* @var $data Kategori */
?>

<div class="view">

	<h3>
		<?php echo CHtml::link(CHtml::encode($data->kategori).' ('.$this->countThread($data->id).')',array('/thread/index','id'=>$data->id)); ?>
	</h3>

</div>