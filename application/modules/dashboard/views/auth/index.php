<div id="infoMessage"><?php echo $message;?></div>
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><?php echo lang('index_heading');?></h3>
		<p><?php echo lang('index_subheading');?></p>
	</div>
	
	<div class="box-body">
		<a href="<?php echo base_url();?>dashboard/users/create_user">
			<button type="button" class="btn btn-primary btn-sm"><?php echo lang('index_create_user_link');?></button>
		</a>
		<a href="<?php echo base_url();?>dashboard/users/create_group">
			<button type="button" class="btn btn-primary btn-sm"><?php echo lang('index_create_group_link');?></button>
		</a>
		


		<table cellpadding=0 cellspacing=10 class="table table-bordered">
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
					<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
					<td>
						<?php foreach ($user->groups as $group):?>
							<?php echo anchor("dashboard/users/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
						<?php endforeach?>
					</td>
					<td><?php echo ($user->active) ? anchor("dashboard/users/deactivate/".$user->id, lang('index_active_link')) : anchor("dashboard/users/activate/". $user->id, lang('index_inactive_link'));?></td>
					<td><?php echo anchor("dashboard/users/edit_user/".$user->id, 'Edit') ;?></td>
				</tr>
			<?php endforeach;?>
		</table>


</div>
<!-- /.box-body -->
<div class="box-footer clearfix">
	
</div>
</div>




