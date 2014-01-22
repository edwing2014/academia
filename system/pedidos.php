
<div class="row-fluid">
	<div class="span12">
		<div class="widget">
			<div class="widget-header">
				<div class="title">

					<span class="mini-title"> </span>
				</div>
				<span class="tools"> <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a> </span>
			</div>
			<div class="widget-body">
				<div class='span12'>
					<form class="form-horizontal no-margin" action='<?=base_url() ?>welcome/pedidos/<?=$tipo ?>' method='post'>
						<div class="control-group">

							
						</div>

						

					</form>

				</div>

			</div>

		</div>

		<div class='span10'>

			<div class="widget">
				<div class="widget-header">
					<div class="title">
						Resultado
						<span class="mini-title"> </span>
					</div>
					<span class="tools"> <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a> </span>
				</div>
				<div class="widget-body">

<?php

if($tipo=='1')
{
?>
<table class="table table-condensed table-striped table-bordered table-hover no-margin">
	<thead>
		<tr>
			<th style="width:10%"> Id </th>
			<th style="width:15%"> Fecha </th>
			<th style="width:30%" class="hidden-phone"> Usuario </th>

			<th style="width:10%" class="hidden-phone"> Cliente </th>
			<th style="width:10%" class="hidden-phone"> Cuenta </th>
			<th style="width:10%" class="hidden-phone"> Estado </th>
			<th style="width:15%" class="hidden-phone"> Acciones </th>
		</tr>
	</thead>
	<tbody>

	<?php
		foreach ($consulta->result() as $row) {
			printf("<tr><td> %s </td>",$row->idPedido);
			printf("<td class='hidden-phone'> <span class='label label label-info'> %s </span></td>",$row->fecha);
			printf("<td class='hidden-phone'> %s </td>",$row->usuario);
			printf("<td class='hidden-phone '> %s </td>",$row->cliente);
			printf("<td class='hidden-phone'> %s </td>",$row->cuenta);
			printf("<td class='hidden-phone'> %s </td>",$row->estado);
		printf("<td class='hidden-phone'>
			<a href='".base_url()."welcome/verpedidos/%s' class='btn btn-warning2 btn-mini' data-original-title=''> View </a>
			<a href='".base_url()."welcome/verpedidos/%s' class='btn btn-info btn-mini' data-original-title=''> Edit </a>
			<a class='btn btn-warning2 btn-mini' href='#' id='confirm' data-original-title=''> Eliminar </a>
			</td></tr>",$row->idPedido,$row->idPedido);

		}?>

		<?php
}
		elseif($tipo=='2')
		{
?>
<table class="table table-condensed table-striped table-bordered table-hover no-margin">
	<thead>
		<tr>
			<th style="width:10%"> Id Orden</th>
			<th style="width:15%"> Fecha </th>
			<th style="width:30%" class="hidden-phone"> Usuario </th>
			<th style="width:10%" class="hidden-phone"> Cliente </th>
			<th style="width:10%" class="hidden-phone"> Cuenta </th>
			<th style="width:15%" class="hidden-phone"> Acciones </th>
		</tr>
	</thead>
	<tbody>
	
	<?php
		foreach ($consulta->result() as $row) {
			
			printf("<tr><td> %s </td>",$row->idOrden);
			printf("<td class='hidden-phone'> <span class='label label label-info'> %s </span></td>",$row->fecha);
			printf("<td class='hidden-phone'> %s </td>",$row->usuario);
			printf("<td class='hidden-phone '> %s </td>",$row->cliente);
			printf("<td class='hidden-phone'> %s </td>",$row->usuario);
			printf("<td class='hidden-phone'>
			<a href='".base_url()."welcome/verordenes/%s' class='btn btn-warning2 btn-mini' data-original-title=''> View </a>
			<a href='".base_url()."welcome/verordenes/%s' class='btn btn-info btn-mini' data-original-title=''> Edit </a>
			<a class='btn btn-warning2 btn-mini' href='#' id='confirm' data-original-title=''> Eliminar </a>
			</td></tr>",$row->idOrden,$row->idOrden);

		}
		?>
	
		<?
		}
		?>	
	</tbody>
</table>

			</div>

			</div>

		</div>
	</div>
</div>

