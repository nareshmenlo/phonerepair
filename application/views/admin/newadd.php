               <div class="page-header">
    <h3>Adds Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('adds'); ?>"> All Adds </a>
<br><br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Add New add</legend>

    <?php if(validation_errors()!=""){?>
    	<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php } ?>
      <form role="form" id="postform" action=""  method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="add_title">Title</label>
            <input type="text" value="<?php echo set_value('add_title'); ?>" class="form-control" id="add_title" placeholder="Title" name="add_title"/>
        </div>
          <div class="form-group">
            <label for="addimage">Add Image</label>
            <input type="file" onchange="readURL(this);" class="form-control col-md-8" id="addimage"  name="addimage"/>
          </div>
          <div class="form-group">
            <img id="blah" src="#" alt="post image" onerror="adminimgError(this);" />
          </div>
    <input type="submit" name="savepost" class="btn btn-primary" value="Create Add" />
    </form>
    </fieldset>
