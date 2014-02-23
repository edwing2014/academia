<div class="container-fluid">

<script type="application/javascript">
var selected = new Array();
</script>
<div class="row-fluid">
<h2>Calificaciones de: <?=$estudiante->Nombre1.' '.$estudiante->Apellido1?></h2>

</div>

<div class="row-fluid">
<h3>Asignar Materias (asignaturas):</h3>

</div>

<div class="row-fluid">
<div class="container-fluid well">

<div class="span4"><label>Matricula: </label><select id="matriculacmb" size="4">

<?php foreach($matriculas as $matricula){?>

<option value="<?=$matricula->idMatricula?>"><?='Matricula No: '.$matricula->idMatricula?></option>
<?php } ?>
</select></div>

<div class="span8"><div id="result_matricula"></div></div>

</div>
</div>

<div class="row-fluid">
<div class="span5"><label>Asignaturas:</label><select size="20" style="width:85%" id="asignaturassl1" size="4"  multiple="multiple"></select></div>

<div class="span2">
<br />

<br />

<br />

<button class="btn btn-success" id="pasarbt"> >> </button>

<br /><br />

<button class="btn btn-success" id="eliminarbt"> << </button>


</div>

<div class="span5"><label>Asignaturas de este estudiante:</label><select size="20" style="width:85%"  id="asignadasest" multiple="multiple" name="asignaturas[]">
<?php
foreach($asignaturas as $asignatura){

    $semestre_r =  $this->db->query("select semestre_relacion from relaciones_core where id = '$asignatura[id_relacion]'")->row();

    ?>


    <option value="<?php echo $asignatura['id_relacion']; ?>"><?php echo $asignatura['asignatura'].' Semestre: '.$semestre_r->semestre_relacion; ?></option>

    <script>

        //si no esta en array
        if($.inArray('<?php echo $asignatura['id_relacion']; ?>', selected) == -1){
            selected.push('<?php echo $asignatura['id_relacion']; ?>');

            //$("#asignaturassl1 option[value='"+$(this).val()+"']").remove();

            $('#asignadasest').append("<option value=\""+$(this).val()+"\">"+$(this).text()+"</option>")
        }
    </script>

<?php } ?>
</select>
<button class="btn btn-success" id="clearbtn">Limpiar</button>
<button class="btn btn-info" id="savebtn">Guardar</button>
</div>
</div>

	</div>
    
  
  <script type="application/javascript">
  
  $(document).ready(function(e) {
    
	//carrera
	var estudiante = '<?php echo $estudiante->id ?>';
	
	
	$('#facultadsl').change(function(e) {
   
  
    $("#facultadsl option:selected").each(function () {

   
	$.ajax({
  url: "<?php echo base_url(); ?>g_institucion/get_carreras_combo/"+$(this).val(),
  cache: false
}).done(function( html ) {
  $("#carrerassl").html(html);
});

});

    });
	
	//curso
	$('#carrerassl').change(function(e) {
   
  
    $("#carrerassl option:selected").each(function () {

   
	$.ajax({
  url: "<?php echo base_url(); ?>g_institucion/get_curso_combo/"+$(this).val(),
  cache: false
}).done(function( html ) {
  $("#cursosl").html(html);
});

});

    });

	//amterias
	$('#cursosl').change(function(e) {
   
  
    $("#cursosl option:selected").each(function () {

   
	$.ajax({
  url: "<?php echo base_url(); ?>g_institucion/get_asignaturas_combo/"+$(this).val(),
  cache: false
}).done(function( html ) {
            $("#asignaturassl1").html('');
  $("#asignaturassl1").html(html);
});

});

    });
	
	
	$('#pasarbt').click(function(e) {
        
		$("#asignaturassl1 option:selected").each(function () {
			
			
			//si no esta en array
			if($.inArray($(this).val(), selected) == -1){
			selected.push($(this).val());
			
			//$("#asignaturassl1 option[value='"+$(this).val()+"']").remove();
			
			$('#asignadasest').append("<option value=\""+$(this).val()+"\">"+$(this).text()+"</option>")
			}else{
			 bootbox.alert("Esta materia ya ese encuentra asignada.", function () {
                    //callback
                });	
			}
			
			
		})
		
		
    });
	
	
	$('#eliminarbt').click(function(e) {
		
	$("#asignadasest option:selected").each(function () {	
	var itemtoRemove = $(this).val();
    selected.splice($.inArray(itemtoRemove, selected),1);
	
	$("#asignadasest option[value='"+itemtoRemove+"']").remove();
	//$('#asignaturassl1').append("<option value=\""+$(this).val()+"\">"+$(this).text()+"</option>")
	
	});
	
	})

//select matricula
        $('#matriculacmb').change(function(e) {

            $("#matriculacmb option:selected").each(function () {


                $.ajax({
                    url: "<?php echo base_url(); ?>g_institucion/get_matricula_panel/"+$(this).val(),
                    cache: false
                }).done(function( html ) {


                        $("#result_matricula").html(html);







                    });


                $.ajax({
                    url: "<?php echo base_url(); ?>g_institucion/asignaturas_matricula_combo/"+$(this).val(),
                    cache: false
                }).done(function( html ) {

                        $("#asignaturassl1").html('');
                        $("#asignaturassl1").append(html);







                    });



            });


            })




	$('#clearbtn').click(function(e) {
	
	$("#asignadasest").html('')
	selected = new Array()
	
	
	})
	
	$('#savebtn').click(function(e) {
		
	if(selected.length > 0){	
		$.ajax({
  url: "<?php echo base_url(); ?>g_institucion/asignar_asignaturas/"+estudiante+'/'+$('#matriculacmb').val(),
  cache: false,
  type:'post',
  data:{'asignaturas':selected.join(","),'estudiante':estudiante}
}).done(function( html ) {
//  $("#asignaturassl1").html(html);

 bootbox.alert("Se ha guardado la informacion para este Estudiante.", function () {
                    //callback
                });		

});	
		
		
	}else{
		
	 bootbox.alert("Se requiere almenos una asignatura para este Estudiante.", function () {
                    //callback
                });		
	}
		
	})
	
});
  
  
  </script>  