<?php include('header.php'); ?>



<div class="container" style="margin-top:50px;">
  <h1>All Articles</h1>
    <div  class="table table-bordered">
    <table>
      <thead>
        <tr>
          <th>S.No</th>
          <th>Article Image</th>
          <th>Article Title</th>
          <th>Published On</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <?php if(count($articles)):
          $count=$this->uri->segment(3);
          ?>
        <?php foreach($articles as $art): ?>
        <tr>
          <td><?=++$count;  ?></td>

          <?php if(!is_null($art->image_path))
          {?>
          <td><img src="<?php echo $art->image_path ?>" alt="" width="280" height="200"</td>
        <?php } ?>
          <td><?=anchor("admin/{$art->id}",$art->article_title);  ?></td>
          <td><?=date('d M y H:i:s',strtotime($art->created_at));  ?></td>
        </tr>
      <?php endforeach ?>
      <?php else: ?>
        <tr>
          <td colspan="3">Not Data available</td>
        </tr>
      <?php endif; ?>
      </tbody>
    </table>
<?php echo $this->pagination->create_links(); ?>
  </div>

</div>
<?php include('footer.php'); ?>
