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

            <div class="row-fluid" style="padding-top: 10px">
                <div class="span6">
                    <h6 style="margin-left: 25px">Sedes:</h6>
                <div id="selsede" style="margin-left: 25px"></div>
                </div>

                <div class="span6">
                    <h6 style="margin-left: 25px">Facultades:</h6>
                    <div id="selfac" style="margin-left: 25px"></div>
                </div>

                </div>

            <br>
            <div class="row-fluid" style="padding-top: 10px">
                <div class="span6">
                    <h6 style="margin-left: 25px">Carreras:</h6>
                    <div id="selcar" style="margin-left: 25px"></div>
                </div>

                <div class="span6">
                    <h6 style="margin-left: 25px">Semestres:</h6>
                    <div id="selsem" style="margin-left: 25px"></div>
                </div>

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
<style>

    legend{display: none}
</style>
<script>



    Ext.onReady(function(){

    var ds = new Ext.data.SimpleStore({
        data: [

            <?php

$sep = '';

$sedes_arr =  explode(',',$asignatura_data->sede);
//print_r($sedes_arr);
            foreach($sedes_data as $sedec){

            if(!in_array($sedec->id,$sedes_arr)){
                          echo $sep."['".$sedec->id."','".$sedec->Nombre."']";
                          $sep = ',';
                            }

                }
          ?> ],
        fields: ['id','Nombre'],
        sortInfo: {
            field: 'Nombre',
            direction: 'ASC'
        }
    });

//dsfac
        var readerbr = new Ext.data.JsonReader({root : 'data2'}, ['id', 'Nombre','sedes']);
        var proxybr  = new Ext.data.HttpProxy({url:'<?php echo base_url(); ?>g_institucion/asignaturas_form/multicombo/sedes'})
        var storebr = new Ext.data.Store
        ({
            proxy: proxybr,
            reader: readerbr
        })
        //


//dscarrera
        var readercarrera = new Ext.data.JsonReader({root : 'data2'}, ['id', 'Nombre','sedes']);
        var proxycarrera  = new Ext.data.HttpProxy({url:'<?php echo base_url(); ?>g_institucion/asignaturas_form/multicombo/facultades'})
        var storecarrera = new Ext.data.Store
        ({
            proxy: proxycarrera,
            reader: readercarrera
        })
        //



    var isForm = new Ext.ux.form.ItemSelector({
        xtype: 'itemselector',
        name: 'itemselector',

       renderTo:'selsede',

        fieldLabel: 'ItemSelector',
        // imagePath: '../ux/images/',
        multiselects: [{
            width: 200,
            height: 200,
            store: ds,
            displayField: 'Nombre',
            valueField: 'id'
        },{
            width: 200,
            height: 200,
            store: [
            <?php  $sedes_arr =  explode(',',$asignatura_data->sede);
            $sep = '';
               foreach($sedes_arr as $ids){

               $item = $this->db->query("select id, Nombre from sedes where id = '$ids'")->row();

                     echo $sep."['".$item->id."','".$item->Nombre."']";
                    $sep = ',';

                    }
             ?>

            ]
        }]
    });

        isForm.toMultiselect.store.on('add',function(record,rec){

               // Ext.Msg.alert('Submitted Values', 'The following will be sent to the server: <br />'+
                 //   isForm.getValue(true));

            storebr.load({params:{
                option_combo:  isForm.getValue(true)
            }})


        })

        isForm.toMultiselect.store.on('remove',function(record,rec){

           // Ext.Msg.alert('Submitted Values', 'The following will be sent to the server: <br />'+
             //   isForm.getValue(true));
            if(isForm.toMultiselect.store.getCount() == 0){
                storebr.removeAll()

            }else{
                storebr.load({params:{
                    option_combo:  isForm.getValue(true)
                }})
            }

        })

        isForm.toMultiselect.view.on('mouseenter',function(record,rec){

         //   alert(record.get('text'))

            new Ext.ToolTip({
                target: 'trackCallout',
                anchor: 'right',
                trackMouse: true,
                html: 'Tracking while you move the mouse'
            });


        })
///


       if(ds.getCount()>0){

        for(i=0;i<=ds.getCount()-1;i++){

            record = ds.getAt(i);

//alert(isForm.toMultiselect.store.find('value',record.get('value')))

        if(isForm.toMultiselect.store.find('Nombre',record.get('id')) != '-1'){

           // alert(record.id)
            ds.remove(record);

        }



        }



       }


        ///



        if(isForm.toMultiselect.store.getCount() > 0){

            storebr.load({params:{
                option_combo:  isForm.getValue(true)
            }})

        }
/////////////////////////////////////////////////2form////////////////////////////////////////
        var isForm2 = new Ext.ux.form.ItemSelector({
            xtype: 'itemselector',
            name: 'facultadesls',
            renderTo:'selfac',

            fieldLabel: 'ItemSelector',
            // imagePath: '../ux/images/',
            multiselects: [{
                width: 250,
                height: 200,
                store: storebr,
                displayField: 'Nombre',
                valueField: 'id'
            },{
                width: 200,
                height: 200,
                store: [
                    <?php  $sedes_arr =  explode(',',$asignatura_data->facultad);
                    $sep = '';
                       foreach($sedes_arr as $ids){

                       $item = $this->db->query("select id, Nombre from facultades where id = '$ids'")->row();

                             echo $sep."['".$item->id."','".$item->Nombre."']";
                            $sep = ',';

                            }
                     ?>

                ]

            }]
        });


        /////////////////////////////////



        var isForm3 = new Ext.ux.form.ItemSelector({

            name: 'carreras',
            renderTo:'selcar',

            fieldLabel: 'carreras',
            // imagePath: '../ux/images/',
            multiselects: [{
                width: 200,
                height: 200,
                store: storecarrera,
                displayField: 'Nombre',
                valueField: 'id'
            },{
                width: 200,
                height: 200,
                store: [
                    <?php  $sedes_arr =  explode(',',$asignatura_data->facultad);
                    $sep = '';
                       foreach($sedes_arr as $ids){

                       $item = $this->db->query("select id, Nombre from facultades where id = '$ids'")->row();

                             echo $sep."['".$item->id."','".$item->Nombre."']";
                            $sep = ',';

                            }
                     ?>]

            }]
        });


        if(isForm2.toMultiselect.store.getCount() > 0){

            storecarrera.load({params:{
                option_combo:  isForm2.getValue(true),
                sedes:isForm.getValue(true)
            }})
        }



        isForm2.toMultiselect.store.on('add',function(record,rec){

            // Ext.Msg.alert('Submitted Values', 'The following will be sent to the server: <br />'+
            //   isForm.getValue(true));

            storecarrera.load({params:{
                option_combo:  isForm2.getValue(true),
                sedes:isForm.getValue(true)
            }})


        })

        isForm2.toMultiselect.store.on('remove',function(record,rec){

            // Ext.Msg.alert('Submitted Values', 'The following will be sent to the server: <br />'+
            //   isForm.getValue(true));
            if(isForm2.toMultiselect.store.getCount() == 0){
                storecarrera.removeAll()

            }else{
                storecarrera.load({params:{
                    option_combo:  isForm2.getValue(true),
                    sedes:isForm.getValue(true)
                }})
            }

        })


        var ds = new Ext.data.ArrayStore({
            data: [[123,'One Hundred Twenty Three'],
                ['1', 'One'], ['2', 'Two'], ['3', 'Three'], ['4', 'Four'], ['5', 'Five'],
                ['6', 'Six'], ['7', 'Seven'], ['8', 'Eight'], ['9', 'Nine']],
            fields: ['value','text'],
            sortInfo: {
                field: 'value',
                direction: 'ASC'
            }
        });


        var isForm4 = new Ext.ux.form.ItemSelector({

            name: 'semestresls',
            renderTo:'selsem',

            fieldLabel: 'ItemSelector',
            // imagePath: '../ux/images/',
            multiselects: [{
                width: 200,
                height: 200,
                store: ds,
                displayField: 'text',
                valueField: 'value'
            },{
                width: 200,
                height: 200,
                store: [['10','Diez']],
                tbar:[{
                    text: 'Limpiar lista',
                    pressed:true,
                    handler:function(){
                        isForm.getForm().findField('itemselector').reset();
                    }
                }]
            }]
        });
        Ext.QuickTips.init();


    })

    $(document).ready(function(e) {







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


})


</script>