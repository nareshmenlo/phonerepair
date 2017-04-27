               <div class="page-header">
    <h3>Banners Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('banners'); ?>"> All Bannners </a>
<br><br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Add New Banner</legend>

    <?php if(validation_errors()!=""){?>
    	<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php } ?>
                <form role="form" id="postform" action=""  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="banner_title">Title</label>
                      <input type="text" value="<?php echo set_value('banner_title'); ?>" class="form-control" id="banner_title" placeholder="Title" name="banner_title"/>
                  </div>
                    <div class="form-group">
                      <label for="bannerimage">Banner Image</label>
                      <input type="file" onchange="readURL(this);" class="form-control col-md-8" id="bannerimage"  name="bannerimage"/>
                    </div>
                    <div class="form-group">
                      <img id="blah" width="200px" height="200px" src="#" alt="post image" onerror="imgError(this);" />
                    </div>
                  <div class="form-group">
                    <label for="youtubeurl">Youtube URL</label>
                      <input type="text" value="<?php echo set_value('youtubeurl'); ?>" class="form-control" d="youtubeurl" placeholder="Youtube URL" name="youtubeurl"/>
                  </div>
                  <div class="form-group">
                    <label for="description">Content</label>
                      <textarea cols="80" id="editor1" class="form-control" name="editor1" rows="10"><?php echo set_value('editor1'); ?></textarea>
                  </div>
              <input type="submit" name="savepost" class="btn btn-primary" />
              </form>
              </fieldset>
<script src="<?php echo asset_url(); ?>js/ckeditor/ckeditor.js"></script>
<script type="text/javascript" >

    $(document).ready(function(){
	CKEDITOR.replace( 'editor1',{
filebrowserUploadUrl  :'js/ckeditor/filemanager/connectors/php/upload.php',
});

	$('.selectpicker').selectpicker();
    
});
</script>