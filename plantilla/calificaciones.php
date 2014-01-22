<div class="container-fluid">

<div class="row-fluid">
<h2>Gestión de Calificaciones</h2>

</div>
<br />

<?php if(isset($error)){?>
<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<i class="icon-minus-sign"></i><?=$error?>
					</div>
<?php } ?>

<br />
<div class="row-fluid" align="center">
<h4>Buscar un estudiante para consultar</h4>

</div>

<div class="row-fluid">
<div class="span3"></div>
<div class="span6"><div class="well">

<form action="<?php echo base_url('g_estudiantes/planilla_calificacion/0')?>" method="post">
<label>Nro de matricula</label><input type="text" name="idmatricula" class="span12"/>

<label>Nro de identificacion</label><input type="text" name="identificacion" class="span12"/>

<input type="submit" class="btn btn-success" value="Buscar Estudiante"/>

</form>
</div></div>
<div class="span3"></div>

</div>


	</div> 