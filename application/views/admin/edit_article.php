<?php include('header.php'); ?>

<div class="container">
<h1>Edit Articles</h1>
<?php echo form_open("admin/update_article/{$article->id}"); ?>
  <?php if($user=$this->session->flashdata('user')):
    $user_class=$this->session->flashdata('user_class');
    ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="alert <?= $user_class ?>">
        <?php echo $user; ?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <?php echo form_open_multipart('admin/userValidation'); ?>
  <?php echo form_hidden('user_id',$this->session->userdata('id')); ?>
  <?php echo form_hidden('created_at',date('Y-m-d H:i:s')); ?>
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="title">Article Title</label>
        <?php echo form_input(['class'=>'form-control','placeholder'=>'Enter Article title','name'=>'article_title','value'=>set_value('article_title',$article->article_title)]); ?>

      </div>
    </div>
    <div class="col-lg-6" style="margin-top:40px;">
      <?php echo form_error('article_title'); ?>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="title">Article Body</label>
        <?php echo form_textarea(['class'=>'form-control','placeholder'=>'Enter Article Body','name'=>'article_body','value'=>set_value('article_body',$article->article_body)]); ?>

      </div>
    </div>
    <div class="col-lg-6" style="margin-top:40px;">
      <?php echo form_error('article_body'); ?>
    </div>
  </div>




  <?php echo form_submit(['class'=>'btn btn-secondary','type'=>'submit','value'=>'Submit']); ?>
  <?php echo form_reset(['class'=>'btn btn-primary','type'=>'reset','value'=>'Reset']); ?>


</div>
<?php include('footer.php'); ?>
