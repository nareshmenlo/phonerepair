<div class="page-header">
    <h3>Issues Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('models'); ?>"> All Models </a>
<br><br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Update Model</legend>

   
    <form role="form" id="modelsform" method="post" action="<?php echo base_url('models/update'); ?>/<?php echo $id; ?>" enctype="multipart/form-data" >
 <?php if(validation_errors()!=""){?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php } ?>

        <div class="form-group">

            <label for="name">Brand Name</label>

              <select class="form-control" id="brand_id" name="brand_id">
              <option value="">Select a Brand</option>
              <?php if(isset($brands) &&  count($brands)){ 
                    foreach ($brands as $brand) { ?>
                    <option <?php echo ($brand['brand_id']==$model_data->brand_id)?'selected="selected"':''; ?> value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></option>
                <?php    }
                 }?>
                
              </select>
              
        </div>
        <div class="form-group">

            <label for="name">Model Name</label>

              <input type="text" value="<?php echo $model_data->model_name; ?>" class="form-control" id="model_name" placeholder="Enter Model Name" name="model_name"/>

        </div>

        <div class="form-group">
          <label for="modelimage">Model Image</label>
          <input type="file" onchange="readURL(this);" class="form-control col-md-8" id="modelimage"  name="modelimage"/>
        </div>
        <div class="form-group">
          <img id="blah" width="200px" height="200px" src="<?php echo base_url(); ?>/useruploadfiles/modelimages/<?php echo $model_data->model_url; ?>" alt="model image" onerror="imgError(this);" />
        </div>
       
        <button type="submit" class="btn btn-primary" id="savemodel"> Save </button>
        <button type="button" class="btn btn-white" > Cancel </button>
    </form>
</fieldset>
