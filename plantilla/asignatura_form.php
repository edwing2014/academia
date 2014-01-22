<script>

    var records;
    var recId2 = 0;
    var rd;

    Ext.onReady(function(){
    var readerbr = new Ext.data.JsonReader({root : 'data2'}, ['sede_relacion','carrera_relacion','facultad_relacion','semestre_relacion']);
    var proxybr  = new Ext.data.HttpProxy({url:base_url+'index.php/g_educativa/cargar_asignaciones'})

    records = new Ext.data.Store
    ({
        proxy: proxybr,
        reader: readerbr
    })




    records.on('load',function(store){
        //    alert('load')
    })
})
</script>
<?php

$idas = 1;

?>

<div class="container-fluid" xmlns="http://www.w3.org/1999/html">

    <form name="asignatura" method="post" id="FormID" action="<?php echo base_url(); ?>index.php/g_educativa/guardar_asignatura/<?php echo $auto_mat ?>" method="p
">




        <div class="row-fluid ">
        <div class="span12">
            <div class="primary-head">
                <h3 class="page-header hidden-phone">Asignatura</h3>

                <div class="btn-group">


                    <button type="button" class="btn btn-primary" id="clearf"><i class="icon-remove"></i> Limpiar</button>


                    <button type="submit" class="btn btn-success"><i class="icon-save"></i> Guardar</button>
                    <a href="<?php echo base_url('g_institucion/asignaturas')?>" class="btn btn-success"><i class="icon-reply"></i> Regresar a la lista</a>



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
            <label>Duración</label>
            <input name="duracion" value="<?php echo $asignatura_data->Duracion; ?>" required="required" type="text" class="span11 left-stripe">

        </div>



    </div>
            <?php
            if($id != '0'){

            if($asignaciones['num_rows'] == 0){?>

            <div class="row-fluid alertpanel" >
                <div class="alert">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <i class="icon-exclamation-sign"></i><strong>Importante!</strong> Aun no a definido las sedes, facultades, carreras, semetres.<br> donde se aplicara esta asignatura
                </div>
            </div>
                <div class="row-fluid " >
                    <div class="span4">
                    </div>

                    <div class="span4">
                        <button class="btn btn-warning" type="button" id="asignbtn1">Agregar Asiganción</button>
                    </div>

                    <div class="span4">
                    </div>

                </div>


            <?php } ?>
<div id="asignaciones_panel" class="well">
    <div class="row-fluid">
        <h5 style="margin-left: 25px">Asignaciones</h5>
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



                <div class="row-fluid " >
                    <div class="span4">
                    </div>

                    <div class="span4">
                        <button class="btn btn-warning" type="button" id="asignbtn">Agregar Asiganción</button>
                    </div>

                    <div class="span4">
                    </div>

                </div>



                <div class="row-fluid " >
                    <h5 style="margin-left: 25px" class="widget-header">Asígnaciones</h5>
                </div>

            <div class="row-fluid">
                <div class="span12">
                <table class="responsive table">
                   <thead>
                    <th>Sede</th>
                    <th>Facultad</th>
                    <th>Carrera</th>
                    <th>Semestre</th>
                    <th></th>
                   </thead>

                    <tbody id="tbodyasig">
                    <?php

                    foreach($asignaciones['data'] as $element){ ?>

                        <tr>

                            <td><?php echo $element->sede_relacion_name; ?></td><td><?php echo $element->facultad_relacion_name; ?></td><td><?php echo $element->carrera_relacion_name; ?></td><td><?php echo $element->semestre_relacion; ?></td><td><button type="button" class="btn btn-sucess" onclick="del_asignacion('<?php echo $idas; ?>')">Eliminar</button></td>

                        </tr>


                        <script>
                            Ext.onReady(function(){
                            var defaultData = {
                                sede_relacion: '<?php echo $element->sede_relacion; ?>',
                                carrera_relacion: '<?php echo $element->carrera_relacion; ?>',
                                facultad_relacion: '<?php echo $element->facultad_relacion; ?>',
                                semestre_relacion: '<?php echo $element->semestre_relacion; ?>',
                                asignatura_relacion: '<?php echo $element->asignatura_relacion; ?>'

                            };

                           var r = new records.recordType(defaultData, ++recId2); // create new record
                            records.insert(0,r);
                            })
                        </script>




                    <?php
                        $idas++;

                    } ?>

                    </tbody>

                </table>
                </div>
            </div>

</div>


            <?php } ?>


<input type="hidden" value="<?php echo $asignatura_data->id; ?>" name="id" id="ida">
            <input type="hidden" name="sedesx" id="sedesx" value="0">

</div>
</form>
</div>
<style>

    legend{display: none}
</style>
<script>



    Ext.onReady(function(){





        var rt = new Ext.data.Record.create([
            {name: 'sede_relacion'},
            {name: 'carrera_relacion'},
            {name: 'facultad_relacion'},
            {name: 'semestre_relacion'}
        ]);
        var store_relaciones = new Ext.data.Store({
            // explicitly create reader
            reader: new Ext.data.ArrayReader(
                {
                    idIndex: 0  // id for each record will be the first element
                },
                rt // recordType
            )
        });

        $('#asignbtn1').click(function(){


            $('#asignbtn1').fadeOut('slow');
            $('.alert').fadeOut('slow');
            $('#asignaciones_panel').slideDown();




        })



        ////////////

    var ds = new Ext.data.SimpleStore({
        data: [

            <?php

$sep = '';

$sedes_arr =  explode(',',$asignatura_data->sede);
//print_r($sedes_arr);
            foreach($sedes_data as $sedec){

          //  if(!in_array($sedec->id,$sedes_arr)){
                          echo $sep."['".$sedec->id."','".$sedec->Nombre."']";
                          $sep = ',';
            //                }

                }
          ?> ],
        fields: ['id','Nombre'],
        sortInfo: {
            field: 'Nombre',
            direction: 'ASC'
        }
    });

//dsfac

        var storebr = new Ext.data.SimpleStore({
            data: [

                <?php

    $sep = '';

    $sedes_arr =  explode(',',$asignatura_data->facultad);
    //print_r($sedes_arr);
                foreach($facultades_data as $sedec){

              //  if(!in_array($sedec->id,$sedes_arr)){
                              echo $sep."['".$sedec->id."','".$sedec->Nombre."']";
                              $sep = ',';
                //                }

                    }
              ?> ],
            fields: ['id','Nombre'],
            sortInfo: {
                field: 'Nombre',
                direction: 'ASC'
            }
        });
        //


//dscarrera
        var storecarrera = new Ext.data.SimpleStore({
            data: [

                <?php

    $sep = '';

    $sedes_arr =  explode(',',$asignatura_data->carrera);
    //print_r($sedes_arr);
                foreach($carreras_data as $sedec){

              //  if(!in_array($sedec->id,$sedes_arr)){
                              echo $sep."['".$sedec->id."','".$sedec->Nombre."']";
                              $sep = ',';
                //                }

                    }
              ?> ],
            fields: ['id','Nombre'],
            sortInfo: {
                field: 'Nombre',
                direction: 'ASC'
            }
        });
        //

        var combo_sede = new Ext.form.ComboBox({
            fieldLabel: 'Sedes',
            name: 'sede',
            width:'250',
            renderTo:'selsede',
            typeAhead: true,
            loadingText : 'Buscando...',
            mode: 'local',
            triggerAction: 'all',
            emptyText:'Seleccione sede..',
            selectOnFocus:true,
            displayField : "Nombre",
            minChars : 3,
            valueField : "id",
            //value:'NINGUNO',
            allowBlank:false,
            //tabIndex : 7,
            store: ds,
            listeners:{
                select:{fn:function(combo, value) {

                   // combo_area.setValue('')
                 //   combo_area.store.load({params:{filter: 'true', campo: 'id', value: combo.getValue()}});


                    storebr.load({params:{
                        option_combo:  value.get('id')
                    }})

                }}}

        });

        var combo_facultad = new Ext.form.ComboBox({
            fieldLabel: 'Facultades',
            name: 'facultad',
            anchor:'98%',
            renderTo:'selfac',
            typeAhead: true,
            loadingText : 'Buscando...',
            mode: 'local',
            triggerAction: 'all',
            emptyText:'Seleccione facultad.',
            selectOnFocus:true,
            displayField : "Nombre",
            minChars : 3,
            valueField : "id",
            //value:'NINGUNO',
            allowBlank:false,
            //tabIndex : 7,
            store: storebr,
            listeners:{
                select:{fn:function(combo, value) {

                    // combo_area.setValue('')
                    //   combo_area.store.load({params:{filter: 'true', campo: 'id', value: combo.getValue()}});

                }}}

        });


        var combo_carrera = new Ext.form.ComboBox({
            fieldLabel: 'Carreras',
            name: 'carrera',
            anchor:'98%',
            renderTo:'selcar',
            id:'cbcar',
            typeAhead: true,
            loadingText : 'Buscando...',
            mode: 'local',
            triggerAction: 'all',
            emptyText:'Seleccione carrera.',
            selectOnFocus:true,
            displayField : "Nombre",
            minChars : 3,
            valueField : "id",
            //value:'NINGUNO',
            allowBlank:false,
            //tabIndex : 7,
            store: storecarrera,
            listeners:{
                select:{fn:function(combo, value) {

                    // combo_area.setValue('')
                    //   combo_area.store.load({params:{filter: 'true', campo: 'id', value: combo.getValue()}});
                    combo_semestres.store.load({params:{
                        carrera:  value.get('id')


                    }})

                 //   alert(storesem.getCount())




                }}}

        });


        var readerbr = new Ext.data.JsonReader({root : 'data2'}, ['id','Nombre']);
        var proxybr  = new Ext.data.HttpProxy({url:'multicombo/semestres'})
        var storesem = new Ext.data.Store
        ({
            proxy: proxybr,
            reader: readerbr

        })


        var combo_semestres = new Ext.form.ComboBox({
            fieldLabel: 'Semestres',
            name: 'semestre',
            loadingText : 'Buscando...',
            width: 150,
            renderTo:'selsem',
            typeAhead: true,
            mode: 'local',
            triggerAction: 'all',
            emptyText:'Seleccione el semestre..',
            selectOnFocus:true,
            displayField : "Nombre",
            //minChars : 1,
            //value:'NINGUNO',
            valueField : "id",
            allowBlank:false,
            store: [  <?php  $sedes_arr =  explode(',',$asignatura_data->sede);
            $sep = '';
               for($i=0;$i<=11;$i++){



                     echo $sep."['".($i+1)."','"."Semestre ".($i+1)."']";
                    $sep = ',';

                    }
             ?>]

            ,
            listeners:{
                select:{fn:function(combo, value) {

                }}}
        });


        combo_semestres.store.on('load',function(){


          //  alert(combo_semestres.store.getCount())

        })

var rec, rec1, rec2,rec3






        function validate_records(rec1,record){

            if(rec1.get('sede_relacion')== record.get('sede_relacion') && rec1.get('carrera_relacion')== record.get('carrera_relacion') && rec1.get('facultad_relacion')== record.get('facultad_relacion') && rec1.get('semestre_relacion')== record.get('semestre_relacion') ){


                alert("existe en datastore")

                return true;

            }else{

            return false

            }



        }

        Ext.get('asignbtn').on('click',function(){

          if(combo_sede.validate() && combo_facultad.validate() && combo_carrera.validate() && combo_semestres.validate()){

              var recId2 = records.getCount()-1

            var str = '<tr class="info" id="tr-'+recId2+'">';
           var rec =  combo_sede.store.query('id',combo_sede.getValue());
            rec = rec.get(0);

            var rec1 =  combo_facultad.store.query('id',combo_facultad.getValue());
            rec1 = rec1.get(0);

            var rec2 =  combo_carrera.store.query('id',combo_carrera.getValue());
            rec2 = rec2.get(0);



            var defaultData = {
                sede_relacion: combo_sede.getValue(),
                carrera_relacion: combo_carrera.getValue(),
                facultad_relacion: combo_facultad.getValue(),
                semestre_relacion: combo_semestres.getValue(),
                asignatura_relacion: document.getElementById('ida').value

            };


              var r = new records.recordType(defaultData, ++recId2); // create new record
           // alert(records.getCount());


              if(records.getCount() >= 1 ){

var flag = 0;
                  records.each(function(record){
               if(validate_records(record,r)){

                        flag = 1
                     alert("existe en datastore")

                    }

                  })

              if(flag == 0){
                    //  alert('ingresado2')
                      Ext.Ajax.request({
                          waitMsg: 'Creando asignacion..',
                          url: base_url+'g_educativa/crear_asignacion',
                          timeout: 5000,

                          params: defaultData,
                          success: function(response){



                              records.insert(0,r);


                              str += '<td>'+rec.get('Nombre')+'</td><td>'+rec1.get('Nombre')+'</td><td>'+rec2.get('Nombre')+'</td><td>'+combo_semestres.getValue()+'</td><td><button type="button" class="btn btn-sucess delbtn" onclick="del_asignacion('+r.id+')">Eliminar</button></td>'

                              str += '</tr>';
                              document.getElementById('sedesx').value++;





                              $('#rwasig').show()
                              $('#tbodyasig').append(str)



                          },
                          failure: function(response){



                              var result=response.responseText;
                              Ext.MessageBox.alert('Error','Error en la consulta');
                          }
                      });


                  }




              }


              if(records.getCount()==0){
                  alert('ingresado1')
                  Ext.Ajax.request({
                      waitMsg: 'Creando asignacion..',
                      url: base_url+'g_educativa/crear_asignacion',
                      timeout: 5000,

                      params: defaultData,
                      success: function(response){



                          records.insert(0,r);


                          var rd = records.getAt(r.id);
                       //   alert(rd.get('sede_relacion'))

                          str += '<td>'+rec.get('Nombre')+'</td><td>'+rec1.get('Nombre')+'</td><td>'+rec2.get('Nombre')+'</td><td>'+combo_semestres.getValue()+'</td><td><button type="button" class="btn btn-sucess delbtn" onclick="del_asignacion('+ r.id+')">Eliminar</button></td>'
                          str += '</tr>';
                          document.getElementById('sedesx').value++;
                          $('#rwasig').show()
                          $('#tbodyasig').append(str)


                      },
                      failure: function(response){



                          var result=response.responseText;
                          Ext.MessageBox.alert('Error','Error en la consulta');
                      }
                  });

                }




}else{
              Ext.MessageBox.alert('Error','Seleccionar todos los valores');


        }



        })

//alert(records.getCount())

    })









    function del_asignacion(record){

         rd = records.getById(record);

       // alert(rd.get('carrera_relacion'))

        var defaultDataDel = {
            sede_relacion: rd.get('sede_relacion'),
            carrera_relacion: rd.get('carrera_relacion'),
            facultad_relacion: rd.get('facultad_relacion'),
            semestre_relacion: rd.get('semestre_relacion'),
            asignatura_relacion: document.getElementById('ida').value

        };

        Ext.Ajax.request({
            waitMsg: 'Eliminando asignacion..',
            url: base_url+'g_institucion/elimina_asignacion',
            timeout: 5000,

            params: defaultDataDel,
            success: function(response){

               location.reload()

            },
            failure: function(response){



                var result=response.responseText;
                Ext.MessageBox.alert('Error','Error en la consulta');
            }
        });

    }

    function load_grid(){

        records.load({params:{
            asignatura:'0'
        }})


    }

    $(document).ready(function(e) {

        <?php if($asignaciones['num_rows'] == 0){?>

        $('#asignaciones_panel').hide('fast');

        <?php  } ?>





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