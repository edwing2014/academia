<div class="row-fluid">

<h4>Esta es la factura que ud tiene pendiente por pagar.</h4>

</div>

<div class="row-fluid">

<div class="span2">
</div>

<style>

.block{
	border:1px solid #CCC;
	border-radius:3px; 
-moz-border-radius:3px; /* Firefox */ 
-webkit-border-radius:3px; /* Safari y Chrome */ 
padding:5px
	
}

</style>

<div class="span8 block">
<div class="row-fluid">
<div class="span4">
<b>Referencia</b>
</div>
<div class="span7">

454

</div>
</div>

<div class="row-fluid">
<div class="span4">
<b>Cliente</b>
</div>
<div class="span7">

454

</div>
</div>

<div class="row-fluid">
<div class="span4">
<b>Nit</b>
</div>
<div class="span7">

454

</div>
</div>

<div class="row-fluid">
<div class="span4">
<b>Fecha de pago</b>
</div>
<div class="span7">

454

</div>
</div>

<div class="row-fluid">
<div class="span4">
<b>Valor</b>
</div>
<div class="span7">

454

</div>
</div>
<div class="row-fluid">
<div class="span4">
<b>Iva</b>
</div>
<div class="span7">

454

</div>
</div>
<div class="row-fluid">
<div class="span4">
<b>Concepto</b>
</div>
<div class="span7">

454

</div>
</div>

<div class="row-fluid">
<div class="span4">
<b>Fichero adjunto</b>
</div>
<div class="span7">

454

</div>
</div>
<div class="row-fluid">
<div class="span12" align="center">


<form method="post" action="https://gateway2.pagosonline.net/apps/gateway/index.html" target="_self">
<input name="usuarioId" type="hidden" value="<?php echo $usuarioId?>">
<input name="descripcion" type="hidden" value="<?php echo $descripcion ?>" >
<input name="extra1" type="hidden" value="<?php echo $descripcion ?>" >
<input name="refVenta" type="hidden" value="<?php echo $refVenta ?>">
<input name="valor" type="hidden" value="<?php echo $valor ?>">
<input name="iva" type="hidden" value="<?php echo $iva ?>">
<input name="baseDevolucionIva" type="hidden" value="<?php echo $baseDevolucionIva ?>" >
<input name="firma" type="hidden" value="<?php echo $firma?>">
<input name="emailComprador" type="hidden" value="<?php echo $emailComprador?>">
<input name="prueba" type="hidden" value="1">
<input name="url_respuesta" type="hidden" value="<?php echo $url_respuesta?>">
<input name="Submit" type="submit" value="Pagar ahora" class="btn btn-info">
</form>
</div>
</div>
</div>


<div class="span2">
</div>

</div>

