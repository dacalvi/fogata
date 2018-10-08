<div id="infoMessage"><?php echo $message;?></div>
<?php echo form_open(uri_string());?>
      <div class="box">
            <div class="box-header with-border">
                  <h3 class="box-title"><?php echo lang('create_user_heading');?></h3>
                  <p><?php echo lang('create_user_subheading');?></p>
            </div>            
            <div class="box-body">
                  <div class="form-group">
                        <label for="group_name"><?php echo lang('edit_user_fname_label', 'first_name');?></label>
                        <?php echo form_input($first_name , '', 'class="form-control" id="first_name" placeholder="First Name"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('edit_user_lname_label', 'last_name');?></label>
                        <?php echo form_input($last_name , '', 'class="form-control" id="last_name" placeholder="Last Name"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('edit_user_company_label', 'company');?></label>
                        <?php echo form_input($company , '', 'class="form-control" id="company" placeholder="Company"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('edit_user_phone_label', 'phone');?></label>
                        <?php echo form_input($phone , '', 'class="form-control" id="phone" placeholder="phone"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('edit_user_password_label', 'password');?></label>
                        <?php echo form_input($password , '', 'class="form-control" id="password" placeholder="password"');?>
                  </div>

                  <div class="form-group">
                        <label for="group_name"><?php echo lang('edit_user_password_confirm_label', 'password_confirm');?></label>
                        <?php echo form_input($password_confirm , '', 'class="form-control" id="password_confirm" placeholder="Password confirm"');?>
                  </div>

                  <?php if ($this->ion_auth->is_admin()): ?>
                        <div class="form-group">
                              <label for="group_name"><?php echo lang('edit_user_groups_heading');?></label>
                              <?php foreach ($groups as $group):?>
                                    <div class="checkbox">
                                    <label>
                                          <?php
                                                $gID=$group['id'];
                                                $checked = null;
                                                $item = null;
                                                foreach($currentGroups as $grp) {
                                                if ($gID == $grp->id) {
                                                      $checked= ' checked="checked"';
                                                break;
                                                }
                                                }
                                          ?>
                                          <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                                          <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                    </label>
                                    </div>
                              <?php endforeach?>
                        </div>
                  <?php endif ?>

                  <?php echo form_hidden('id', $user->id);?>
                  <?php echo form_hidden($csrf); ?>

            </div>
            <div class="box-footer clearfix">
                  <?php echo form_submit('submit', lang('edit_user_submit_btn'), 'class="btn btn-primary"');?>
            </div>
      </div>
<?php echo form_close();?>