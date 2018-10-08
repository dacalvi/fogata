<div id="infoMessage"><?php echo $message;?></div>
<?php echo form_open("dashboard/users/create_user");?>
      <div class="box">
            <div class="box-header with-border">
                  <h3 class="box-title"><?php echo lang('create_user_heading');?></h3>
                  <p><?php echo lang('create_user_subheading');?></p>
            </div>            
            <div class="box-body">
                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_user_fname_label', 'first_name');?></label>
                        <?php echo form_input($first_name , '', 'class="form-control" id="first_name" placeholder="First Name"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_user_lname_label', 'last_name');?></label>
                        <?php echo form_input($last_name , '', 'class="form-control" id="last_name" placeholder="Last Name"');?>
                  </div>

                  <?php
                        if($identity_column!=='email') {
                              echo '<p>';
                              echo lang('create_user_identity_label', 'identity');
                              echo '<br />';
                              echo form_error('identity');
                              echo form_input($identity);
                              echo '</p>';
                        }
                  ?>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_user_company_label', 'company');?></label>
                        <?php echo form_input($company , '', 'class="form-control" id="company" placeholder="Company"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_user_email_label', 'email');?></label>
                        <?php echo form_input($email , '', 'class="form-control" id="email" placeholder="Email"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_user_phone_label', 'phone');?></label>
                        <?php echo form_input($phone , '', 'class="form-control" id="phone" placeholder="phone"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_user_password_label', 'password');?></label>
                        <?php echo form_input($password , '', 'class="form-control" id="password" placeholder="password"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('create_user_password_confirm_label', 'password_confirm');?></label>
                        <?php echo form_input($password_confirm , '', 'class="form-control" id="password_confirm" placeholder="Password confirm"');?>
                  </div>
            </div>
            <div class="box-footer clearfix">
                  <?php echo form_submit('submit', lang('create_user_submit_btn'), 'class="btn btn-primary"');?>
            </div>
      </div>
<?php echo form_close();?>

     