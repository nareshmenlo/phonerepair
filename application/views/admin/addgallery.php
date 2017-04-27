<div class="page-header">
    <h3>Gallery Management</h3>
</div>
<!-- blueimp Gallery styles -->
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/blueimp-gallery.min.css">
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery.fileupload.css">
<link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<noscript><link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery.fileupload-noscript.css"></noscript>
<noscript><link rel="stylesheet" href="<?php echo asset_url(); ?>css/jquery.fileupload-ui-noscript.css"></noscript>

<div class="container">
    <fieldset class="scheduler-border">
    <legend class="scheduler-border">Add New Gallery</legend>

    <?php if(validation_errors()!=""){?>
        <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>  
    <?php } ?>
    <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category</label>
                    <select name="category" title="Please select gallery category"   class="form-control selectpicker" id="category" size="6"> 
                        <?php foreach($categories as $key => $single_cat){ ?>
                        <option value="<?php echo $single_cat->id; ?>"><?php echo $single_cat->category; ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" value="<?php echo set_value('title'); ?>" class="form-control" id="title" placeholder="Title" name="title"/>
                </div>
                <div class="form-group">
                    <label for="title">Photos</label>
                    <input type="file"  class="form-control" multiple id="title" placeholder="Title" name="photo[]"/>
                </div>
                
              <input type="submit" name="Submit" class="btn btn-primary" />
      </fieldset>
    <!-- The file upload form used as target for the file upload widget -->
</div>

</form>
