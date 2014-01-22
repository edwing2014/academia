<div class="container-fluid">


<div class="row-fluid">
<div class="span12">
<h3 class="page-header">Calificaciones de: <?=$estudiante->Nombre1.' '.$estudiante->Apellido1?></h3>
</div>
</div>


<div class="row-fluid">



</div>

<div class="row-fluid"><h4 class="widget-header">Notas actuales</h4>
<table class="table responsive">
<thead>
	<tr>
<th>Asignatura</th>
<th>Nota Parcial 1</th>
<th>Nota Parcial 5</th>
<th>Nota Practica 1</th>
<th>Nota Practica 2</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach ($asignaturas as $asignatura){?>
<form name="calificaion<?=$asignatura->Nombre?>" method="post">
<input type="hidden" name="idcal" value="<?=$asignatura->id?>"/> 
<tr class="success">
<td><?=$asignatura->Nombre?></td>
<td><input name="ParcialCalificacion1" value="<?=$asignatura->ParcialCalificacion1?>" class="span2"/></td>
<td><input name="ParcialCalificacion2" value="<?=$asignatura->ParcialCalificacion2?>" class="span2"/></td>
<td><input name="PractCalificacion1" value="<?=$asignatura->PractCalificacion1?>" class="span2"/></td>
<td><input name="PractCalificacion2" value="<?=$asignatura->PractCalificacion2?>" class="span2"/></td>
<td><input type="submit" value="Guardar" class="btn btn-info"/></td>
</tr>
</form>
<?php } ?>
</tbody>

</table>
<script type="application/javascript">
					function set_poscat(element, id){
						
						
					//$('#loading'+id).html('<img src="<?php //echo  base_url('iweb/themes/default/assets/img/Loading.gif"');?>">')
						
						//$.post("<?php //echo  site_url(ADMIN_FOLDER.'/categories/sethomepos');?>"+'/'+id, { "pos_val": element.value }).done(function(data) {

//$('#loading'+id).html('')

});
						
						
					}
					</script>
</div>

	</div>