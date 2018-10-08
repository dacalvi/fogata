<div id="infoMessage"><?php echo $message;?></div>
<?php echo form_open("dashboard/users/create_group");?>
      <div class="box">
            <div class="box-header with-border">
                  <h3 class="box-title"><?php echo lang('create_group_heading');?></h3>
                  <p><?php echo lang('create_group_subheading');?></p>
            </div>            
            <div class="box-body">
                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_group_name_label', 'group_name');?></label>
                        <?php echo form_input($group_name , '', 'class="form-control" id="group_name" placeholder="Group name"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('edit_group_desc_label', 'description');?></label>
                        <?php echo form_input($description , '', 'class="form-control" id="description" placeholder="Group description"');?>
                  </div>

            </div>
            <div class="box-footer clearfix">
                  <?php echo form_submit('submit', lang('create_group_submit_btn'), 'class="btn btn-primary"');?>
            </div>
      </div>
<?php echo form_close();?>




      

    


