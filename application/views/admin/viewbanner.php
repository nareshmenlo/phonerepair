<div class="page-header">
    <h3>Banners Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url('banners'); ?>"> All Banners </a>
<a class="btn btn-warning btn-sm pull-right  m-r-10" href="<?php echo base_url('banners/update'); ?>/<?php echo $bannerdata->id; ?>"> Edit Banner </a>
<br><br>  
<fieldset class="scheduler-border">
    <legend class="scheduler-border">View Banner</legend>
<dl class="dl-horizontal">
  <dt>Title</dt>
  <dd><?php echo $bannerdata->title; ?></dd>
  <dt>Content/Description</dt>
  <dd><?php echo $bannerdata->description; ?></dd>
  <?php if($bannerdata->image!=""){ ?>
  <dt>Image</dt>
  <dd><img width="200px" height="200px" onerror="imgError(this);"  src="<?php echo base_url(); ?>useruploadfiles/bannerimages/<?php  echo $bannerdata->image; ?>"></dd>
  <?php  } ?>
  <?php if($bannerdata->video!=""){ ?>
  <dt>Video</dt>
  <dd><br><iframe id="I1" allowfullscreen="" frameborder="0" height="250px" width="400px" name="I1" src="http://www.youtube.com/embed/<?php echo $bannerdata->video; ?>"></iframe></dd>
  <?php  } ?>
</dl>
    
</fieldset>
