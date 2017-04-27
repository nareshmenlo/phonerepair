<div class="page-header">
    <h3>Content Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('cms'); ?>"> All Posts </a>
<a class="btn btn-warning btn-sm pull-right  m-r-10" href="<?php echo base_url('cms/update'); ?>/<?php echo $postdata->id; ?>"> Edit Post </a>
<br><br>  
<fieldset class="scheduler-border">
    <legend class="scheduler-border">View Post</legend>
<dl class="dl-horizontal">
  <dt>Category</dt>
  <dd><?php echo ucfirst($postdata->pagename); ?></dd>
  <dt>Title</dt>
  <dd><?php echo $postdata->title; ?></dd>
  <dt>Content/Description</dt>
  <dd><?php echo $postdata->description; ?></dd>
  <?php if($postdata->image!=""){ ?>
  <dt>Image</dt>
  <dd><img width="200px" height="200px" onerror="imgError(this);"  src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php  echo $postdata->image; ?>"></dd>
  <?php  } ?>
  <?php if($postdata->video!=""){ ?>
  <dt>Video</dt>
  <dd><br><iframe id="I1" allowfullscreen="" frameborder="0" height="250px" width="400px" name="I1" src="http://www.youtube.com/embed/<?php echo $postdata->video; ?>"></iframe></dd>
  <?php  } ?>
</dl>
    
</fieldset>
