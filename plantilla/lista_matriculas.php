<div class="container-fluid">
<div class="row-fluid ">
				<div class="span12">
					<div class="primary-head">
						<h3 class="page-header hidden-phone">Matriculas de alumno</h3>
						<ul class="top-right-toolbar">
							<li>
								<a data-toggle="dropdown" class="dropdown-toggle blue-violate" href="#" data-original-title="Users"><i class="icon-user"></i></a>
							</li>
							<li>
								<a href="#" class="green" data-original-title="Upload"><i class=" icon-upload-alt"></i></a>
							</li>
							<li>
								<a href="#" class="bondi-blue" data-original-title="Settings"><i class="icon-cogs"></i></a>
							</li>
						</ul>
					</div>
					
				</div>
			</div>

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
						<div class="widget-head blue">
							<h3>Matriculas Registradas</h3>
						</div>
						<div class="widget-container">

                            <table class="table table-bordered responsive">
                                <thead>
                                <tr>
                                    <th>
                                       Matricula No.
                                    </th>
                                    <th>
                                        Carrera
                                    </th>
                                    <th>
                                        Semestre
                                    </th>
                                    <th>
                                        Vl. Matricula
                                    </th>
                                    <th>
                                        Vl. Cuota
                                    </th>
                                    <th>
                                        No. Cuotas
                                    </th>
                                    <th>
                                       Saldo
                                    </th>
                                    <th>

                                    </th>

                                </tr>
                                </thead>
                                <tbody>

                               <?php foreach($matriculas as $item){ ?>
                                <tr>
                                    <td >
                                       <?php echo $item->idMatricula; ?>
                                    </td>
                                    <td>
                                        <?php echo $item->carrera; ?>
                                    </td>
                                    <td>
                                        <?php echo $item->semestre; ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($item->monto_matricula,0,'.','.'); ?>
                                    </td>

                                    <td>
                                        <?php echo number_format($item->monto_cuota,0,'.','.'); ?>
                                    </td>

                                    <td>
                                        <?php echo $item->cantidad_cuotas; ?>
                                    </td>
                                    <td>
                                        458000
                                    </td>
                                    <td>


                                     <a href="<?php echo base_url();?>g_administrativa/formulario/<?php echo $item->idMatricula; ?>" class="btn btn-info" data-original-title="Upload"><i class=" icon-edit"></i></a>

                                    </td>
                                </tr>
                                  <?php  } ?>
                                </tbody>
                            </table>

						</div>
					</div>
				</div>
			</div>
            
            	</div>
                
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
				
    $("#curso").jCombo("<?php echo base_url('g_institucion/load_combo/semestres-')?>"+$('#carrera').val()+'-', {
					parent: "#carrera",  
					selected_value: '0' });
			
					
		
			
		//	alert($('#sede').val())
			
		})
		
		var total;
		
	$('#cuotas').change(function(e) {
        
	if($('#monto').val()){
		
		total = $('#monto').val() * $('#cuotas').val()
		
		$('#cuotas_t > tbody:last').append('<tr><td>tt</td><td></td><td></td><td></td></tr>');
		
		$('#total_div').html(total)
		
	}
		
    });	
		
		
    });
	  
	  
	  </script>          