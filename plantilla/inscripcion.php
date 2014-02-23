<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <form name="inscripcion" method="post" id="FormID" action="<?php echo base_url(); ?>index.php/g_administrativa/guardar_inscripcion/<?php echo $auto_mat ?>" method="p
">




        <div class="row-fluid ">
        <div class="span12">
            <div class="primary-head">
                <h3 class="page-header hidden-phone">Inscripción de alumno</h3>

                <div class="btn-group">


                    <button type="button" class="btn btn-primary" id="clearf"><i class="icon-remove"></i> Limpiar</button>

                    <?php if($id){ ?>
                    <button onclick="window.open ('<?php echo base_url()?>g_estudiantes/imprimir_f_alumno/<?php echo $estudiante_data->id; ?>','printinscripcion','menubar=1,resizable=1,width=950,height=800');" type="button" class="btn btn-info"><i class="icon-print"></i> Imprimir</button>
                    <?php } ?>
                    <button type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar Alumno</button>

                   <?php if($auto_mat != 'matricula'){ ?>

                    <button type="button" class="btn btn-success" id="saven"><i class="icon-save"></i> Guardar e Inscribir otro</button>
                    <?php } ?>

                </div>

            </div>

        </div>
    </div>
<br>
        <div class="widget-container light-gray">



    <div class="row-fluid">
        <h5 style="margin-left: 25px">Datos Personales</h5>


    </div>

            <div id="panelcamera"></div>


           <div class="row-fluid">
               <div class="span3">
            <div class="control-group" >
        <label class="control-label">Foto</label>
        <div class="controls" >


            <div class="portraid" style="width: 200px; height: 150px; border: 1px #000 solid;">

                <img src="<?php echo $estudiante_data->foto; ?>" width="200" height="150" id="foto">
                <br>


            </div>
            <button type="button" id="cambiar" class="btn btn-info">Cambiar</button>

        </div>
    </div>
               </div>

    <div class="span9">
        <div class="row-fluid">
            <label>Nombre/s</label>
            <input name="nombre1" required="required" class="span11 left-stripe" type="text" value="<?php echo $estudiante_data->Nombre1; ?>">

        </div>

        <div class="row-fluid">
            <label>Apellido/s</label>
            <input name="apellido1" required="required" class="span11 left-stripe" type="text" value="<?php echo $estudiante_data->Apellido1; ?>">

            </div>


        <div class="row-fluid">



            <label>Nro de identificación</label>
            <input name="numCi" required="required" type="number" class="span11 left-stripe" type="text" value="<?php echo $estudiante_data->numCI; ?>">



        </div>


    </div>

</div>



    <div class="row-fluid ">


        <div class="span4"  align="center">
            <label>Lugar de nacimiento</label>
            <input name="lugNacimiento"  value="<?php echo $estudiante_data->lugNacimiento; ?>" type="text" required="required" class="span11 left-stripe">

        </div>

        <div class="span4">
            <label>Lugar de residencia</label>
            <input name="domicilio" value="<?php echo $estudiante_data->domicilio; ?>" required="required" type="text" class="span11 left-stripe">

        </div>

        <div class="span4">
            <label>Teléfono</label>
            <input name="telefono" value="<?php echo $estudiante_data->telefono; ?>" required="required" type="number" class="span11 left-stripe">

        </div>

    </div>

    <div class="row-fluid">
        <h5 style="margin-left: 25px">Datos Academicos</h5>
    </div>
    <div class="row-fluid">


        <div class="span4"  align="center">
            <label>Sede</label>
            <select name="sede_insc" id="sede" class="span11 left-stripe chzn-select chzn-done">
                <option value="0">Seleccione...</option>

                <?php foreach($sedes_data as $sedec){   ?>
                    <option <?php if($estudiante_data->sede_insc == $sedec->id){ echo 'selected="selected"'; }?> value="<?php echo $sedec->id?>"><?php echo $sedec->Nombre?></option>
                <?php } ?>
            </select>

        </div>

        <div class="span4">
            <label>Facultad</label>
            <select name="facultad_insc" id="facultad" class="span11 left-stripe">
                <option value="0">Seleccione...</option>
                <?php foreach($facultades_data as $fac){   ?>
                    <option <?php if($estudiante_data->facultad_insc == $fac->id){ echo 'selected="selected"'; }?>value="<?php echo $fac->id?>"><?php echo $fac->Nombre?></option>
                <?php } ?>
            </select>

        </div>

        <div class="span4">
            <label>Carrera</label>
            <select name="carrera_insc" id="carrera" class="span11 left-stripe">
                <option value="0">Seleccione...</option>
                <?php foreach($carreras_data as $car){   ?>
                    <option <?php if($estudiante_data->carrera_insc == $car->id){ echo 'selected="selected"'; }?>value="<?php echo $car->id?>"><?php echo $car->Nombre?></option>
                <?php } ?>
            </select>

        </div>

    </div>

   <!-- <div class="row-fluid">
        <div class="span4"  align="center">
            <label>Semestre</label>
            <select name="semestre_insc" id="curso" class="span11 left-stripe">
                <option value="0">Seleccione...</option>
                <?php /*for($i = 1;$i<= $carrera_sl; $i++){   */?>
                    <option <?php /*if($estudiante_data->semestre_insc == $i){ echo 'selected="selected"'; }*/?>value="<?php /*echo $i*/?>"><?php /*echo "Semestre: ".$i;*/?></option>
                <?php /*} */?>
            </select>

        </div>

        <div class="span4">
            <label>Código de procedencia</label>
            <input name="codProcedencia" value="<?php /*echo $estudiante_data->codProcedencia; */?>" required="required" class="span11 left-stripe" type="text">

        </div>

        <div class="span4">
            <label>Bachiller culminado</label>
            <input type="text" name="bachiller_terminado" value="<?php /*echo $estudiante_data->bachiller_terminado; */?>" required="required" class="span11 left-stripe" type="text">

        </div>



    </div>-->


    <div class="row-fluid">
        <h5 style="margin-left: 25px">Tipo de ingreso a la institución</h5>
    </div>
    <div class="row-fluid">


        <div class="span2"  align="center">
            <label>Normal</label>
            <input type="radio" name="tipo_ingreso" required="required" class="span11" value="Normal" <?php if($estudiante_data->tipo_ingreso == 'Normal'){ echo 'checked="checked"'; }?>>

        </div>

        <div class="span2" align="center">
            <label>Pago de matricula</label>
            <input type="radio" name="tipo_ingreso" required="required" class="span11" value="Pago Matricula" <?php if($estudiante_data->tipo_ingreso == 'Pago Matricula'){ echo 'checked="checked"'; }?>>

        </div>

        <div class="span8">

            <label>Email</label>
            <input name="email"  value="<?php echo $estudiante_data->email; ?>" type="email" required="required" class="span11 left-stripe" >
        </div>

    </div>

    <div class="row-fluid">


        <div class="span2"  align="center">
            <label>Convalidación</label>
            <input type="radio" name="tipo_ingreso" required="required" class="span11" value="convalidacion" <?php if($estudiante_data->tipo_ingreso == 'convalidacion'){ echo 'checked="checked"'; }?>>

        </div>

        <div class="span2" align="center">
            <label>Matricula Exonerada</label>
            <input type="radio" name="tipo_ingreso" required="required" class="span11" value="mat_exon" <?php if($estudiante_data->tipo_ingreso == 'mat_exon'){ echo 'checked="checked"'; }?>>

        </div>

        <div class="span8">


        </div>

    </div>
<input type="hidden" value="<?php echo $estudiante_data->id; ?>" name="id">
    <input type="hidden" value="<?php echo $estudiante_data->foto; ?>" name="foto" id="fotofl">

</div>
</form>
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

            $("#curso").jCombo("<?php echo base_url('g_institucion/load_combo/?option=semestres&id=')?>"+$('#carrera').val(), {
                parent: "#carrera",
                selected_value: '0' });




            //	alert($('#sede').val())

        })




        /*====Select Box====*/
        $(function () {
            $(".chzn-select").chosen();
            $(".chzn-select-deselect").chosen({
                allow_single_deselect: true
            });
        });


    });


</script>

<script type="text/javascript">
    function hasGetUserMedia() {
        navigator.getUserMedia = navigator.getUserMedia || // Opera
            navigator.webkitGetUserMedia || // Chrome, Safari
            navigator.mozGetUserMedia || // Mocilla nightly
            navigator.msGetUserMedia;
        if (navigator.getUserMedia) {
            return true
        }
        return false;
    } // fin de hasGetUserMedia();
    function hasURL() {
        window.URL = window.URL || window.webkitURL
            || window.mozURL || window.msURL;
        if (window.URL && window.URL.createObjectURL) {
            return true;
        }
        return false;
    } // fin de hasURL();
    function error(e) {
        alert("Fallo en la aplicación. "+e);
    } // fin de error();
    function setStream(stream) {
        var webcam = document.getElementById("webcam");
        webcam.src = window.URL.createObjectURL(stream);
        webcam.play();
    } // fin de getStream();
    function onLoad () {
        if (!hasGetUserMedia() || !hasURL()) {
            alert("Tu navegador no soporta getUserMedia()");
        } else {
            navigator.getUserMedia(
                {video: true, audio: false},
                setStream,
                error
            );
        }


        canvas = document.getElementById("canvas"),
            context = canvas.getContext("2d"),
            video = document.getElementById("webcam");




    } // fin de onLoad();



    // onLoad()

var url


    $(document).on("click", "#cambiar", function (e) {


    var  capture_panel = '<div class="row-fluid"><div class="well span12"><div class="span4"><label>Camara</label><video id="webcam" width="200" height="150">Tu navegador no es compatible con la etiqueta video de HTML5.</video></div><div class="span4" align="center"><button type="button" id="captura" class="btn btn-warning btn-small">Tomar instantanea </button><br><br><button type="button" id="aceptarp" class="btn btn-success ">Aceptar </button><br><br><button type="button" id="cancelarp" class="btn btn-success ">Cancelar </button></div><div class="span4"> <label>Captura</label><canvas id="canvas" width="200" height="150" style="border: 1px #000 solid;">Tu navegador no es compatible con la etiqueta canvas de HTML5.</canvas></div></div></div>';

   var panel_camera = document.getElementById('panelcamera');
        $('#panelcamera').slideDown();
        panel_camera.innerHTML =  capture_panel;

        onLoad()

        $('#captura').click(function(){
        context.drawImage(video, 0, 0, 200, 150);

        url = canvas.toDataURL();
        })

        $('#aceptarp').click(function(){
            $('#panelcamera').slideUp();
            $('#fotofl').val(url);
            $('#foto').attr('src',url);
        })

        $('#cancelarp').click(function(){
            $('#panelcamera').slideUp();

        })





    });


    function clearForm(form) {
        // iterate over all of the inputs for the form
        // element that was passed in
        $(':input', form).each(function() {
            var type = this.type;
            var tag = this.tagName.toLowerCase(); // normalize case
            // it's ok to reset the value attr of text inputs,
            // password inputs, and textareas



            if (type == 'email' || type == 'text' || type == 'password' || tag == 'textarea'){
                this.value = "";
                this.style = 'background-color:#FFF';
            // checkboxes and radios need to have their checked state cleared
            // but should *not* have their 'value' changed
            }else if (type == 'checkbox' || type == 'radio'){
                this.checked = false;
                this.style = 'background-color:#FFF';
            // select elements need to have their 'selectedIndex' property set to -1
            // (this works for both single and multiple select elements)
            }else if (tag == 'select'){
                this.selectedIndex = -1;
            }
        });
    };



    $('#clearf').click(function(){


        clearForm('#FormID')
        $('#foto').attr('src','');

    })

    $('#saven').click(function(){

        $('#FormID').attr('action','<?php echo base_url(); ?>index.php/g_administrativa/guardar_inscripcion/nuevo');

       if(document.getElementById('FormID').checkValidity()){
        $('#FormID').submit();
       }else{


           $(':input', '#FormID').each(function() {
               var type = this.type;

            if (type != 'button' && type != 'submit'){

                   if(this.value == ''){
                   this.style = 'background-color:#FF6600';
                   }
               }

           });
           alert('Debe llenar los campos requeridos')
       }
       })



</script>