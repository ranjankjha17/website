<?php include('header.php'); ?>
<!-- <?php echo"<pre>"; ?>
<?php print_r($articles); ?> -->
<div class="container" style="margin-top:50px;">

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

  <div class="row">
    <a href="adduser" class="btn btn-lg btn-primary">Add Articles</a>
  </div>

  <div class="table">
    <table>

        <thead>
          <tr>
            <th>Serial No</th>
            <th>Article Title</th>
            <th>Article Body</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>

          <?php if(count($articles)):
            $count=$this->uri->segment(3);
            // echo $count;
            // exit();
          ?>
            <?php foreach($articles as $art): ?>

              <tr>
                <td><?= ++ $count; ?></td>
                <td><?php echo $art->article_title; ?></td>
                <td><?php echo $art->article_body; ?></td>
                <td><?= anchor("admin/edituser/{$art->id}",'Edit',['class'=>'btn btn-primary']);  ?></td>
                <td><?=anchor("admin/delarticle/{$art->id}",'Delete',['class'=>'btn btn-secondary']);  ?></td>
              </tr>
            <?php endforeach ?>
          <?php else: ?>
            <tr>
              <td colspan="3">Not data available</td>
            </tr>
          <?php endif; ?>

        </tbody>

    </table>
    <?php echo $this->pagination->create_links(); ?>
  </div>
</div>

<?php include('footer.php'); ?>
