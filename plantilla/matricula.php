<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>index.php/g_administrativa/guardar_matricula">
<div class="container-fluid">
<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header hidden-phone">Gestión de matriculas</h3>
                        <div class="btn-group">


                            <button type="button" class="btn btn-primary" id="clearf"><i class="icon-remove"></i> Limpiar</button>

                            <?php if($estudiante->idMatricula != '0'){ ?>
                                <button type="button" class="btn btn-info"><i class="icon-print"></i> Imprimir</button>
                            <?php } ?>

                            <?php if(count($cuotas_matricula) == '0'){ ?>
                            <button type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar</button>
                            <?php } ?>

                            <?php if(count($cuotas_matricula) > '0'){ ?>
                                <button type="submit" class="btn btn-success"><i class="icon-trash"></i> Eliminar</button>
                            <?php } ?>

                            <a class="btn btn-success" href="<?php echo base_url('g_administrativa/matriculas/0/'.$estudiante->numCI) ?>"><i class="icon-reply"></i> Regresar a la lista</a>


					</div>
					
				</div>
			</div>


</div><br>
<div class="row-fluid">
<div class="span8">
<div class="content-widgets light-gray">

<div class="widget-container">

<div class="control-group">
    <label class="control-label">Identificación</label>
    <div class="controls">
        <input  disabled type="text" class="span10" placeholder="Text Input" value="<?php echo $estudiante->numCI?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Nombres</label>
    <div class="controls">
        <input type="text"  disabled class="span10" placeholder="" value="<?php echo $estudiante->Nombre1?>">
    </div>
</div>
<div class="control-group">
    <label class="control-label">Apellidos</label>
    <div class="controls">
        <input type="text"  disabled class="span10" placeholder="Text Input" value="<?php echo $estudiante->Apellido1?>">
    </div>
</div>

</div>

</div>
</div>
<div class="span4">

<div class="content-widgets light-gray">

    <div class="widget-container" style="height: 150px; width: 150px; border: #a0a0a0 solid 1px; margin-left: 20%; margin-bottom: 10px">
        <img src="<?php echo $estudiante->foto?>">

        </div>
</div>
    </div>

</div>


    
    <div class="row-fluid">
				<div class="span12">
					<div class="content-widgets light-gray">

						<div class="widget-container">


                                
                                <div class="control-group">
									<label class="control-label">Sede</label>
									<div class="controls">
										 <select name="sede" id="sede">
                                     	<option value="0">Seleccione...</option>
                                        
               <?php foreach($sedes_data as $sedec){   ?>                         
                           <option <?php if($estudiante->sede_insc == $sedec->id){ echo 'selected="selected"'; }?>value="<?php echo $sedec->id?>"><?php echo $sedec->Nombre?></option>
               <?php } ?>                   
                                     </select>
									</div>
								</div>
                                
                                <div class="control-group">
									<label class="control-label">Facultad</label>
									<div class="controls">
									 <select name="facultad" id="facultad">
                                     	<option value="0">Seleccione...</option>
                                         <?php foreach($facultades_data as $fac){   ?>
                                             <option <?php if($estudiante->facultad_insc == $fac->id){ echo 'selected="selected"'; }?>value="<?php echo $fac->id?>"><?php echo $fac->Nombre?></option>
                                         <?php } ?>
                                     </select>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Carrera</label>
									<div class="controls">
										 <select name="carrera" id="carrera">
                                     	<option value="0">Seleccione...</option>
                                             <?php foreach($carreras_data as $car){   ?>
                                                 <option <?php if($estudiante->carrera_insc == $car->id){ echo 'selected="selected"'; }?>value="<?php echo $car->id?>"><?php echo $car->Nombre?></option>
                                             <?php } ?>
                                     </select>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Semestre</label>
									<div class="controls">
										 <select name="semestre" id="curso">
                                     	<option value="0">Seleccione...</option>
                                             <?php for($i = 1;$i<= $carrera_sl; $i++){   ?>
                                                 <option disabled="disabled" <?php if($estudiante->semestre_insc == $i){ echo 'selected="selected"'; }?>value="<?php echo $i?>"><?php echo "Semestre: ".$i;?></option>
                                             <?php } ?>
                                     </select>
									</div>
								</div>
                                <div class="row-fluid">
                                <div class="span5"><div class="control-group">
									<label class="control-label">Monto matrícula</label>
									<div class="controls">
										<input required type="text" class="span12" value="<?php echo $estudiante->monto_matricula; ?>" placeholder="Text Input" name="monto_matricula">
									</div>
								</div></div>
                                
                                 <div class="span7"><div class="control-group">
									<label class="control-label">Matrícula Exon</label>
									<div class="controls">
										<input required type="text" class="span7" value="<?php echo $estudiante->matricula_exon; ?>" placeholder="Text Input" name="matricula_exon">
									</div>
								</div></div>
								
								</div>
                                <div class="row-fluid">
                                <div class="span5"><div class="control-group">
									<label class="control-label">Monto de la Cuota</label>
									<div class="controls">
										<input required type="text" class="span12" id="monto" name="monto_cuota" value="<?php echo $estudiante->monto_cuota; ?>" >
									</div>
								</div></div>
                                
                                 <div class="span7"><div class="control-group">
									<label class="control-label">Cantidad de Cuotas</label>
									<div class="controls">
										<input required type="text" class="span7" id="cuotas" name="cantidad_cuotas"  value="<?php echo $estudiante->cantidad_cuotas; ?>">
									</div>
								</div></div>
								
								</div>
                                <div class="row-fluid">
                                <div class="span5"><div class="control-group">
									<label class="control-label">Fecha de vencimiento</label>
									<div class="controls">

                                        <div  class="input-append" id="datetimepicker4">

                                       <input required type="date" placeholder="AAAA-MM-DD" data-format="yyyy-MM-dd" class="span12 input-append" name="fecha_vence_cuota"  value="<?php echo $estudiante->fecha_vence_cuota; ?>">
                                          </div>
                                    </div>
								</div></div>
                                
                                 <div class="span7"><div class="control-group">
									<label class="control-label">Interés por Mora</label>
									<div class="controls">
										<input required type="text" class="span7" placeholder="Text Input" name="int_mora"  value="<?php echo $estudiante->int_mora; ?>">
									</div>
								</div></div>
								
								</div>
                                <?php if(count($cuotas_matricula) > '0'){ ?>
                     <div class="row-fluid">
                                
                          <table width="99%" class="responsive table table-striped table-bordered" id="cuotas_t">
							<thead>
							<tr>
								<th>
									# De Cuota
								</th>
								<th>
									Fecha de Vencimiento
								</th>
								<th>
									Cuotas que corresponden a los meses
								</th>
								<th>
									Total
								</th>
                                <th>
                                    Pagada
                                </th>
							</tr>
							</thead>
							<tbody>

                            <?php

                            $total_cuotas = 0;

                            foreach($cuotas_matricula as $cuota_m){ ?>
							<tr>
								<td>
									<?php echo $cuota_m->Nrodecuota; ?>
								</td>
								<td>
                                    <?php echo $cuota_m->fecha_vence; ?>
								</td>
								<td>
                                    <?php echo $cuota_m->descripcion; ?>
								</td>
								<td style="text-align:right;">
                                    <?php echo number_format($cuota_m->total,0,'.','.'); ?>
								</td>
                                <td style="text-align:center;">
                                    <?php if($cuota_m->cancelada == '0'){ ?>
                                    <a href="<?php echo base_url('g_administrativa/pagar_cuota/'.$cuota_m->id.'/'.$cuota_m->idMatricula)?>" class="btn btn-success btn-small">Pagar</a>
                                    <?php }else{ ?>
                                    <span class="label-info label">Pagada</span>
                                    <?php } ?>

                                </td>
							</tr>

                            <?php

                                $total_cuotas += $cuota_m->total;

                            } ?>

							<tr>
							  <td>&nbsp;</td>
							  <td>&nbsp;</td>
							  <td >Total:</td>
							  <td id="total_div" style="text-align:right;"><?php echo number_format($total_cuotas,0,'.','.'); ?></td>
							  </tr>
							</tbody>
							</table>
                                
                                </div>
							<?php } ?>

                              <input type="hidden" value="<?php echo $estudiante->idMatricula; ?>" name="idMatricula">
                                <input type="hidden" value="<?php echo $estudiante->estudiante; ?>" name="estudiante">


						</div>
					</div>
				</div>
			</div>
            
            	</div>
</form>
      <script>
	  
	  $(document).ready(function(e) {
        
	$("#facultad").jCombo("<?php echo base_url('g_institucion/load_combo/facultades-')?>", { 
					parent: "#sede"
				});	
					
	$('#sede').change(function(e){			
				
    $("#carrera").jCombo("<?php echo base_url('g_institucion/load_combo/carreras-')?>"+$('#sede').val()+'-', { 
					parent: "#facultad",  
					selected_value: '0' });
			
					
		
			
			//alert($('#sede').val())
			
		})
		
	$('#carrera').change(function(e){

        var Car = $('#carrera').val();

        $("#curso").jCombo("<?php echo base_url('g_institucion/load_combo/?option=semestres&id=')?>"+Car+'&', {
            parent: "#carrera",
            selected_value: '0' });

					
		
			

			
		})
		

		
		
    });
	  
	  
	  </script>          