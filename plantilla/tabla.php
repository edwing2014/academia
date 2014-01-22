<div class="container-fluid">
	<div class="content-widgets light-gray">
		<div class="widget-head orange">
			<h3><?=$title?></h3>
		</div>
		<div class="widget-container">
			 <?php
foreach($output->css_files as $file){?>
<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php break;}  ?>
<?php foreach($output->js_files as $file){ ?>
<script src="<?php echo $file; ?>"></script>
<?php } ?>
			<?php
			 echo $output->output;
			?>
			 <div style="clear:both"></div>
		</div>
	</div>

</div>