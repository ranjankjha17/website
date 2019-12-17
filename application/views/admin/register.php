<?php include('header.php'); ?>

<div class="container" style="margin-top:40px;">
  <h1>Register Form</h1>

  <?php if($user=$this->session->flashdata('user')):
    $user_class=$this->session->flashdata('user_class');
     ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="alert <?= $user_class  ?>">
        <?php echo $user; ?>
      </div>
    </div>
  </div>
<?php endif; ?>
  <?php echo form_open('login/sendemail'); ?>

  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="username">User Name:</label>
        <?php echo form_input(['class'=>'form-control','name'=>'username','placeholder'=>'Enter User Name','value'=>set_value('username')]); ?>

      </div>
    </div>
    <div class="col-lg-6">
      <?php echo form_error("username"); ?>
    </div>
  </div>


  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="firstname">First Name:</label>
        <?php echo form_input(['class'=>'form-control','name'=>'firstname','placeholder'=>'Enter First Name','value'=>set_value('firstname')]); ?>

      </div>
    </div>
    <div class="col-lg-6">
      <?php echo form_error("firstname"); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="lastname">Last Name:</label>
        <?php echo form_input(['class'=>'form-control','name'=>'lastname','placeholder'=>'Enter Last Name','value'=>set_value('lastname')]); ?>

      </div>
    </div>
    <div class="col-lg-6">
      <?php echo form_error("lastname"); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="email">Email:</label>
        <?php echo form_input(['class'=>'form-control','name'=>'email','placeholder'=>'Enter Email id','value'=>set_value('email')]); ?>

      </div>
    </div>
    <div class="col-lg-6">
      <?php echo form_error("email"); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="password">Password:</label>
        <?php echo form_password(['class'=>'form-control','name'=>'password','placeholder'=>'Enter Password','value'=>set_value('password')]); ?>

      </div>
    </div>
    <div class="col-lg-6">
      <?php echo form_error("password"); ?>
    </div>
  </div>
  <?php echo form_submit(['class'=>'btn btn-secondary','type'=>'Submit','value'=>'Submit']); ?>
  <?php echo form_submit(['class'=>'btn btn-primary','type'=>'reset','value'=>'Reset']); ?>
</div>
<?php include('footer.php'); ?>
