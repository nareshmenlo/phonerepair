<div class="page-header">
    <h3>Issues Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('issues'); ?>"> All Issues </a>
<br><br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Add New Issue</legend>

   
    <form role="form" id="issuesform" method="post" action="<?php echo base_url('issues/create'); ?>" enctype="multipart/form-data" >
 <?php if(validation_errors()!=""){?>
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php } ?>


        <div class="form-group">

            <label for="name">Type of issue</label>

              <label class="radio-inline">
                <input type="radio" class="issuetype" name="issue_type" value="TOP">Top Issue
              </label>
              <label class="radio-inline">
                <input type="radio" name="issue_type" value="SIDE" class="issuetype">Sidebar Item
              </label>
              <label class="radio-inline">
                <input type="radio" name="issue_type" value="COMMON" class="issuetype">Common Issue
              </label>
        </div>
        <div class="form-group commonissue  hide"  >

            <label for="name">Brand</label>

              <select class="form-control" id="brand_id" name="brand_id">
              <option value="">Select a Brand</option>
              <?php if(isset($brands) &&  count($brands)){ 
                    foreach ($brands as $brand) { ?>
                    <option value="<?php echo $brand['brand_id']; ?>"><?php echo $brand['brand_name']; ?></option>
                <?php    }
                 }?>
                
              </select>
              
        </div>

        <div class="form-group commonissue hide">

            <label for="name">Model</label>

              <select class="form-control" id="brand_id" name="brand_id">
              <option value="">Select a Model</option>
              </select>
              
        </div>
        <div class="form-group">

            <label for="name">Issue</label>

              <input type="text" class="form-control" id="issue_name" placeholder="Enter Issue Name" name="issue_name"/>

        </div>

        <div class="form-group">

            <label for="name">Description</label>

              <input type="text" class="form-control" id="issue_description" placeholder="Enter Issue Description" name="issue_description"/>

        </div>
        <div class="form-group">

            <label for="name">Price</label>

              <input type="number" class="form-control" id="issue_price" placeholder="Enter Issue Price" name="issue_rate"/>

        </div>

        <div class="form-group">
          <label for="modelimage">Issue Image(Optional)</label>
          <input type="file" class="form-control col-md-8" id="modelimage"  name="modelimage"/>
        </div>
        <div class="form-group" style="margin-top: 50px;">
        <button type="submit" class="btn btn-primary" id="savemodel"> Save </button>
        <button type="button" class="btn btn-white" > Cancel </button>
        </div>  
    </form>
</fieldset>

<script type="text/javascript">
  $(document).ready(function(){
    $('body').on('change','.issuetype',function(e){
        if(($(this).val()=='TOP' || $(this).val()=='SIDE') && $(this).prop('checked')){
          $('.commonissue').removeClass('hide');
        }else{
          $('.commonissue').addClass('hide');
        }
    });

    $('body').on('change','.brand_id',function(e){
        if($(this).val()==""){
          $('.model_id').html('');
          $('.model_id').append('<option value="">Select a Model</option>');
        }else{
          $('.model_id').html('');
          $('.model_id').append('<option value="">Select a Model</option>');
          $.ajax({
              url: current_url+"/models",
              method: 'POST',
              data: { 
                brand_id: brand_id
              },
              dataType:"json",
              success: function(response){
                if(response.success){
                    
                  }                   
                }
            });
        }
    });
  });
</script>
