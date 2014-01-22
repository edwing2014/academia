<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <form name="asignatura" method="post" id="FormID" action="<?php echo base_url(); ?>index.php/g_administrativa/guardarripcion/<?php echo $auto_mat ?>" method="p
">




        <div class="row-fluid ">
        <div class="span12">
            <div class="primary-head">
                <h3 class="page-header hidden-phone">Asignatura</h3>

                <div class="btn-group">


                    <button type="button" class="btn btn-primary" id="clearf"><i class="icon-remove"></i> Limpiar</button>

                    <?php if($id){ ?>
                    <button type="button" class="btn btn-info"><i class="icon-print"></i> Imprimir</button>
                    <?php } ?>
                    <button type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar</button>

                   <?php if($auto_mat == 'nueva'){ ?>

                    <button type="button" class="btn btn-success" id="saven"><i class="icon-save"></i> Guardar y registrar otra</button>
                    <?php } ?>

                </div>

            </div>

        </div>
    </div>
<br>
        <div class="widget-container light-gray">



    <div class="row-fluid">
        <h5 style="margin-left: 25px">Información de la asignatura</h5>


    </div>




    <div class="row-fluid ">


        <div class="span8"  align="center">
            <label>Nombre</label>
            <input name="Nombre"  value="<?php echo $asignatura_data->Nombre; ?>" type="text" required="required" class="span11 left-stripe">

        </div>

        <div class="span4">
            <label>Duracion</label>
            <input name="Duracion" value="<?php echo $asignatura_data->Duracion; ?>" required="required" type="text" class="span11 left-stripe">

        </div>



    </div>

    <div class="row-fluid">
        <h5 style="margin-left: 25px">Datos Academicos</h5>
    </div>
    <div class="row-fluid">


        <div class="span4"  align="center">
            <label>Sede</label>
            <select name="sede"  class="span11  sede" multiple="multiple" data-placeholder="Seleccione...">


                <?php foreach($sedes_data as $sedec){   ?>

                <?php

                    $sedes_arr =  explode(',',$asignatura_data->sede);


                    foreach($sedes_arr as $ids){

                        if($ids == $sedec->id){

                        ?>
                    <option selected="selected" value="<?php echo $sedec->id?>"><?php echo $sedec->Nombre?></option>

                         <?php }else{ ?>

                    <option  value="<?php echo $sedec->id?>"><?php echo $sedec->Nombre?></option>

                    <?php   }?>

                <?php }

                }?>
            </select>

        </div>

        <div class="span4">
            <label>Facultad</label>
            <select name="facultad" id="facultad" class="span11 " multiple="multiple" data-placeholder="Seleccione...">

                <?php foreach($facultades_data as $fac){   ?>
                    <option <?php if($asignatura_data->facultad == $fac->id){ echo 'selected="selected"'; }?>value="<?php echo $fac->id?>"><?php echo $fac->Nombre?></option>
                <?php } ?>
            </select>

        </div>

        <div class="span4">
            <label>Carrera</label>
            <select name="carrera" id="carrera" class="span11 " multiple="multiple" data-placeholder="Seleccione...>

                <?php foreach($carreras_data as $car){   ?>
                    <option <?php if($asignatura_data->carrera == $car->id){ echo 'selected="selected"'; }?>value="<?php echo $car->id?>"><?php echo $car->Nombre?></option>
                <?php } ?>
            <optgroup label="Sede">
                <option>Edwin</option>
            </optgroup>
            </select>

        </div>

    </div>

    <div class="row-fluid">
        <div class="span4"  align="center">
            <label>Semestre</label>
            <select name="semestre" id="curso" class="span11 left-stripe">
                <option value="0">Seleccione...</option>
                <?php for($i = 1;$i<= $carrera_sl; $i++){   ?>
                    <option <?php if($asignatura_data->semestre == $i){ echo 'selected="selected"'; }?>value="<?php echo $i?>"><?php echo "Semestre: ".$i;?></option>
                <?php } ?>
            </select>

        </div>






    </div>
<input type="hidden" value="<?php echo $asignatura_data->id; ?>" name="id">


</div>
</form>
</div>

<script>

    $(document).ready(function(e) {




        /*====Select Box====*/
        $(function () {
            $(".chzn-select").chosen();
            $(".chzn-select-deselect").chosen({
                allow_single_deselect: true
            });
        });


    })







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

        $('#FormID').attr('action','<?php echo base_url(); ?>index.php/g_administrativa/guardarripcion/nuevo');

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

    $(".sede").click(function(){


        alert(this.select())
    })



</script>