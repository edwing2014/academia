<div class="container-fluid">
    <div class="row-fluid ">
        <div class="span12">
            <div class="primary-head">
                <h3 class="page-header hidden-phone"><?php echo lang('index_heading');?></h3>


                <div class="btn-group">


                    <a class="btn btn-success" href="<?php echo base_url('auth/create_user') ?>"><i class="icon-plus"></i> Nuevo usuario</a>
                    <a class="btn btn-success" href="<?php echo base_url('auth/create_group') ?>"><i class="icon-plus"></i> Nuevo Grupo</a>


                </div>


                </div>

           </div>
        </div>
    </div>





<div class="row-fluid ">
    <div class="span12">
        <div id="infoMessage" class="label"><?php echo $message;?></div>
        </div>
</div>


<div class="row-fluid">
    <div class="span12">

<table class="table">
	<tr>
		<th><?php echo lang('index_fname_th');?></th>
		<th><?php echo lang('index_lname_th');?></th>
		<th><?php echo lang('index_email_th');?></th>
		<th><?php echo lang('index_groups_th');?></th>
		<th><?php echo lang('index_status_th');?></th>
		<th><?php echo lang('index_action_th');?></th>
	</tr>
	<?php foreach ($users as $user):?>
		<tr>
			<td><?php echo $user->first_name;?></td>
			<td><?php echo $user->last_name;?></td>
			<td><?php echo $user->email;?></td>
			<td>
				<?php foreach ($user->groups as $group):?>
					<?php echo anchor("auth/edit_group/".$group->id, $group->name) ;?><br />
                <?php endforeach?>
			</td>
			<td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
			<td><?php echo anchor("auth/edit_user/".$user->id, 'Editar') ;?></td>
		</tr>
	<?php endforeach;?>
</table>

 </div>


    </div>


</div>
