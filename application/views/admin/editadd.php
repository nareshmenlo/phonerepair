               <div class="page-header">
    <h3>Adds Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('adds'); ?>"> All Adds </a>
<br><br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Edit Add</legend>

    <?php if(validation_errors()!=""){?>
    	<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php } ?>
                <form role="form" id="postform" action=""  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="add_title">Title</label>
                      <input type="text" value="<?php echo $adddata->title; ?>" class="form-control" id="add_title" placeholder="Title" name="add_title"/>
                  </div>
                  <div class="form-group">
                    <label for="addimage">Post Image</label>
                      <input type="file" onchange="readURL(this);"  class="form-control" id="addimage" placeholder="Post Image" name="addimage"/>
                  </div>
                  <div class="form-group">
                      <img id="blah" src="<?php echo base_url(); ?>useruploadfiles/addimages/<?php  echo $adddata->image; ?>" alt="post image" onerror="imgError(this);" />
                  </div>
              <input type="submit" name="savepost" value="Update Add" class="btn btn-primary" />
              </form>
              </fieldset>

        