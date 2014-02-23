<div class="container-fluid">
    <div class="row-fluid ">
        <div class="span12">
            <div class="primary-head">
                <h3 class="page-header"><?php echo lang('edit_group_heading');?></h3>
            </div>
<p><?php echo lang('edit_group_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open(current_url());?>

      <p>
            <?php echo lang('create_group_name_label', 'group_name');?> <br />
            <?php echo form_input($group_name);?>
      </p>

      <p>
            <?php echo lang('edit_group_desc_label', 'description');?> <br />
            <?php echo form_input($group_description);?>
      </p>

            <button class="btn btn-succees" type="submit">Guardar</button>

            <?php echo form_close();?>

</div>
</div>
</div>
