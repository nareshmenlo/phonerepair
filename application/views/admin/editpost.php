               <div class="page-header">
    <h3>Content Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('cms'); ?>"> All Posts </a>
<br><br>
<fieldset class="scheduler-border">
    <legend class="scheduler-border">Edit Post</legend>

    <?php if(validation_errors()!=""){?>
    	<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo validation_errors(); ?>
    </div>
    <?php } ?>
                <form role="form" id="postform" action=""  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Category</label>
                    <select name="pagename"    class="form-control selectpicker" id="pagename" size="6"> 
        							<!-- <option <?php echo ($postdata->pagename=="flashnews")?"selected='selected'":"";  ?> value="flashnews">Flash News</option> -->
        							<option <?php echo ($postdata->pagename=="latest")?"selected='selected'":"";  ?> value="latest">Latest News</option>
        							<option <?php echo ($postdata->pagename=="gossips")?"selected='selected'":"";  ?> value="gossips">Gossips</option>
        							<option <?php echo ($postdata->pagename=="political")?"selected='selected'":"";  ?> value="political">Political News</option>
        							<option <?php echo ($postdata->pagename=="cinema")?"selected='selected'":"";  ?> value="cinema">Movie News</option>    
        							<option <?php echo ($postdata->pagename=="movie_reviews")?"selected='selected'":"";  ?> value="movie_reviews">Movie Reviews</option>
        							
                    </select>
                  </div>
                 <!-- <div class="form-group">
                    <label for="name">District</label>
                      <select name="district"    class="form-control" id="district"> 
                        <option value="">Select District</option>
                        <option <?php echo ($postdata->district=="anantapur")?"selected='selected'":"";  ?> value="anantapur">Anantapur</option>
                        <option <?php echo ($postdata->district=="adilabad")?"selected='selected'":"";  ?> value="adilabad">Adilabad</option>
                        <option <?php echo ($postdata->district=="chittoor")?"selected='selected'":"";  ?> value="chittoor">Chittoor</option>
                        <option <?php echo ($postdata->district=="eastgodavari")?"selected='selected'":"";  ?> value="eastgodavari">East Godavari</option>
                        <option <?php echo ($postdata->district=="guntur")?"selected='selected'":"";  ?> value="guntur">Guntur</option>
                        <option <?php echo ($postdata->district=="hyderbad")?"selected='selected'":"";  ?> value="hyderbad">Hyderbad</option>
                        <option <?php echo ($postdata->district=="kadapa")?"selected='selected'":"";  ?> value="kadapa">Kadapa</option>
                        <option <?php echo ($postdata->district=="karimnagar")?"selected='selected'":"";  ?> value="karimnagar">Karimnagar</option>
                        <option <?php echo ($postdata->district=="khammam")?"selected='selected'":"";  ?> value="khammam">Khammam</option>
                        <option <?php echo ($postdata->district=="krishna")?"selected='selected'":"";  ?> value="krishna">Krishna</option>
                        <option <?php echo ($postdata->district=="kurnool")?"selected='selected'":"";  ?> value="kurnool">Kurnool</option>
                        <option <?php echo ($postdata->district=="mahbubnagar")?"selected='selected'":"";  ?> value="mahbubnagar">Mahbubnagar</option>
                        <option <?php echo ($postdata->district=="medak")?"selected='selected'":"";  ?> value="medak">Medak</option>
                        <option <?php echo ($postdata->district=="nalgonda")?"selected='selected'":"";  ?> value="nalgonda">Nalgonda</option>
                        <option <?php echo ($postdata->district=="nizamabad")?"selected='selected'":"";  ?> value="nizamabad">Nizamabad</option>
                        <option <?php echo ($postdata->district=="nellore")?"selected='selected'":"";  ?> value="nellore">Nellore</option>
                        <option <?php echo ($postdata->district=="rangareddy")?"selected='selected'":"";  ?> value="rangareddy">Ranga Reddy</option>
                        <option <?php echo ($postdata->district=="prakasam")?"selected='selected'":"";  ?> value="prakasam">Prakasam</option>
                        <option <?php echo ($postdata->district=="srikakulam")?"selected='selected'":"";  ?> value="srikakulam">Srikakulam</option>
                        <option <?php echo ($postdata->district=="visakhapatnam")?"selected='selected'":"";  ?> value="visakhapatnam">Visakhapatnam</option>
                        <option <?php echo ($postdata->district=="vizianagaram")?"selected='selected'":"";  ?> value="vizianagaram">Vizianagaram</option>
                        <option <?php echo ($postdata->district=="warangal")?"selected='selected'":"";  ?> value="warangal">Warangal</option>
                        <option <?php echo ($postdata->district=="westgodavari")?"selected='selected'":"";  ?> value="westgodavari">West Godavari</option>
                      </select>
                  </div>-->
                  <div class="form-group">
                    <label for="post_title">Title</label>
                      <input type="text" value="<?php echo $postdata->title; ?>" class="form-control" id="post_title" placeholder="Title" name="post_title"/>
                      <input type="hidden" class="form-control" id="post_id" value="0" name="post_id"/>
                  </div>
                  <div class="form-group">
                    <label for="postimage">Post Image</label>
                      <input type="file" onchange="readURL(this);"  class="form-control" id="postimage" placeholder="Post Image" name="postimage"/>
                  </div>
                  <div class="form-group">
                      <img id="blah" width="200px" height="200px" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php  echo $postdata->image; ?>" alt="post image" onerror="imgError(this);" />
                  </div>
                  <div class="form-group">
                    <label for="youtubeurl">Youtube URL</label>
                      <input type="text" value="<?php echo $postdata->full_video_url; ?>" class="form-control" id="youtubeurl" placeholder="Youtube URL" name="youtubeurl"/>
                  </div>
                  <div class="form-group">
                    <label for="description">Content</label>
                      <textarea cols="80" id="editor1" class="form-control" name="editor1" rows="10"><?php echo $postdata->description; ?></textarea>
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