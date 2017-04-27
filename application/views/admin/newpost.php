               <div class="page-header">
    <h3>Content Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('cms'); ?>"> All Posts </a>
<br><br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Add New Post</legend>

    <?php if(validation_errors()!=""){?>
    	<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php } ?>
                <form role="form" id="postform" action=""  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Category</label>
                      <select name="pagename[]"    class="form-control selectpicker" id="pagename" multiple="" size="6"> 
              <!-- <option value="flashnews">Flash News</option> -->
              <option value="latest">Latest News</option>
              <!-- <option value="editor_choice">Editor Choice</option> -->
              <option value="political">Political News</option>
              <option value="cinema">Movie News</option>    
              <option value="gossips">Gossips</option>    
              <option value="movie_reviews">Movie Reviews</option>
  <!--             <option value="crime">crime</option>
              <option value="special">special</option>
              <option value="business">business</option>
              <option value="panchangam">panchangam</option>
              <option value="edisangathi">Edi Sangathi</option>
             <option value="kokuroko">Kokuroko</option>
  -->             </select>
                  </div>
               <!--   <div class="form-group">
                    <label for="name">District</label>
                      <select name="district"    class="form-control" id="district"> 
                        <option value="">Select District</option>
                        <option value="anantapur">Anantapur</option>
                        <option value="adilabad">Adilabad</option>
                        <option value="chittoor">Chittoor</option>
                        <option value="eastgodavari">East Godavari</option>
                        <option value="guntur">Guntur</option>
                        <option value="hyderbad">Hyderbad</option>
                        <option value="kadapa">Kadapa</option>
                        <option value="karimnagar">Karimnagar</option>
                        <option value="khammam">Khammam</option>
                        <option value="krishna">Krishna</option>
                        <option value="kurnool">Kurnool</option>
                        <option value="mahbubnagar">Mahbubnagar</option>
                        <option value="medak">Medak</option>
                        <option value="nalgonda">Nalgonda</option>
                        <option value="nizamabad">Nizamabad</option>
                        <option value="nellore">Nellore</option>
                        <option value="rangareddy">Ranga Reddy</option>
                        <option value="prakasam">Prakasam</option>
                        <option value="srikakulam">Srikakulam</option>
                        <option value="visakhapatnam">Visakhapatnam</option>
                        <option value="vizianagaram">Vizianagaram</option>
                        <option value="warangal">Warangal</option>
          							<option value="westgodavari">West Godavari</option>
        						  </select>
                  </div>-->
                  <div class="form-group">
                    <label for="post_title">Title</label>
                      <input type="text" value="<?php echo set_value('post_title'); ?>" class="form-control" id="post_title" placeholder="Title" name="post_title"/>
                      <input type="hidden" class="form-control" id="post_id" value="0" name="post_id"/>
                  </div>
                    <div class="form-group">
                      <label for="postimage">Post Image</label>
                      <input type="file" onchange="readURL(this);" class="form-control col-md-8" id="postimage"  name="postimage"/>
                    </div>
                    <div class="form-group">
                      <img id="blah" width="200px" height="200px" src="#" alt="post image" onerror="imgError(this);" />
                    </div>

                     <div class="form-group">
                      <div class="checkbox">
                        <label><input type="checkbox" name="isbanner" value="1">Do You want to make a banner?</label>
                      </div>   
                     </div>
                  <div class="form-group">
                    <label for="youtubeurl">Youtube URL</label>
                      <input type="text" value="<?php echo set_value('youtubeurl'); ?>" class="form-control" id="youtubeurl" placeholder="Youtube URL" name="youtubeurl"/>
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