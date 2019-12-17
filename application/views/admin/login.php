<?php include('header.php'); ?>
<div class="container" style="margin-top:40px;">
  <h1>Admin Form</h1>
  <?php if($error=$this->session->flashdata('Login_failed')): ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="alert alert-danger">
        <?php echo $error; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
  <?php echo form_open('login/index'); ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="username">User Name:</label>
        <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Username','name'=>'username','value'=>set_value('username')]); ?>
      </div>
    </div>
    <div class="col-lg-6" style="margin-top:40px">
      <?php echo form_error('username'); ?>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6">
        <div class="form-group">
          <label for="password">Password</label>
          <?php echo form_password(['class'=>'form-control','placeholder'=>'Enter Password','name'=>'password','value'=>set_value('password')]); ?>
        </div>
    </div>
    <div class="col-lg-6" style="margin-top:40px;">
      <?php echo form_error('password'); ?>
    </div>
  </div>
  <?php echo form_submit(['class'=>'btn btn-secondary','type'=>'submit','value'=>'Submit']); ?>
  <?php echo form_reset(['class'=>'btn btn-primary','type'=>'reset','value'=>'Reset']); ?>
  <?php echo anchor('login/register/','Sign up?','class="link-class"') ?>
</div>
<?php include('footer.php'); ?>
