<div class="container-fluid">

<div class="row-fluid">
<h2>Gestión de Matrículas</h2>

</div>
<br />
<div id="errr_msg">
<?php if(isset($error)){?>
<div class="alert alert-error">
						<button type="button" class="close" data-dismiss="alert">×</button>
						<i class="icon-minus-sign"></i><?=$error?>
					</div>
<?php } ?>
</div>
<br />
<div class="row-fluid" align="center">
<h4>Buscar un estudiante para consultar</h4>

</div>

<div class="row-fluid">
<div class="span3"></div>
<div class="span6"><div class="well">

<form action="<?php echo base_url('g_administrativa/matriculas/0')?>" method="post" id="fomarm">
<div id="selector1"><label>Nro de matricula</label><input type="text" name="idmatricula" class="span12"/></div>

<label>Nro de identificacion</label><input type="text" name="identificacion" class="span12" id="identificacion_form"/>

<input type="submit" class="btn btn-success" value="Buscar Estudiante"/> <input type="button" onclick="nueva_matricula()" class="btn btn-info" value="Nueva matricula"/>

</form>
</div></div>
<div class="span3"></div>

</div>


	</div>

<script>

    function nueva_matricula(){

        if(document.getElementById('identificacion_form').value == ''){
            document.getElementById('selector1').style = 'display:none;';

            alert('Debe indicar la indentificación de un alumno a matricular');
        }else{




            $.ajax({
                type: "post",
                url: '<?php echo base_url('g_administrativa/get_estudiante_id') ?>/'+document.getElementById('identificacion_form').value+'\'',
                success: function(datos){


                    if(datos != 'RWwgbnVtZXJvIGRlIGlkZW50aWZpY2FjaW9uIGluZ3Jlc2FkbyBubyBzZSBlbmN1ZW50cmEgc3Vic2NyaXRvIGVuIGVsIHNpc3RlbWEgPGEgaHJlZj0iaHR0cDovL2xvY2FsaG9zdC9hY2FkZW1pYS9nX2FkbWluaXN0cmF0aXZhL2luc2NyaXBjaW9uLzAvbWF0cmljdWxhIj5JbnNjcmliaXIgZGUgYWx1bW5vPzwvYT4='){
                    location.href = '<?php echo base_url('g_administrativa/formulario/0') ?>/'+datos;
                }else{

                //      location.reload()

                        document.getElementById('errr_msg').innerHTML = '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><i class="icon-minus-sign"></i>El numero de identificacion ingresado no se encuentra subscrito en el sistema <a href="http://localhost/academia/g_administrativa/inscripcion/0/matricula">Inscribir de alumno?</a></div>';


                    }

                }});


        }

    }

</script>