<div class="page-header">
    <h3>Gallery Management</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('admingallery/create'); ?>"> Add New Gallery </a>
<br><br>
<?php if($this->session->flashdata('success')){ ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
    </div>
<?php }else if($this->session->flashdata('error')){  ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php }else if($this->session->flashdata('warning')){  ?>
    <div class="alert alert-warning">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Warning!</strong> <?php echo $this->session->flashdata('warning'); ?>
    </div>
<?php }else if($this->session->flashdata('info')){  ?>
    <div class="alert alert-info">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong>Info!</strong> <?php echo $this->session->flashdata('info'); ?>
    </div>
<?php } ?>
 <div class="alert alert-success success_display fade in">
    <a href="#" class="close" aria-label="close">&times;</a>
    <div class="success_messages"></div>
 </div>
<table id="poststable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>  
        <tr>  
            <th width="5%">No</th>  
            <th width="20%">Gallery Image</th>  
            <th width="40%">Title</th>  
            <th width="10%">Created At</th>  
            <th width="5%">Status</th>  
        </tr>  
    </thead>  
    <tbody class="record">  
        <?php $no=0;
        if (count($galleries) > 0) {
            foreach ($galleries as $gallery):
                $no++;
                ?>          
                <tr>  
                    <td><?php echo $no; ?></td>  
                    <td><img width="200px" height="200px" onerror="imgError(this);"  src="<?php echo base_url(); ?>useruploadfiles/galleryimages/<?php  echo $gallery->image; ?>"></td>  
                    <td><?php echo $gallery->title; ?></td>  
                    <td><?php echo date('d/m/Y', strtotime($gallery->date)); ?></td> 
                    <?php $ischecked = $gallery->status=="Active" ? "checked='checked'" : ""; ?>
                    <td><input type="checkbox" data-size="mini" galleryid="<?php echo $gallery->id; ?>" value="<?php echo $gallery->status; ?>" name="isactive" <?php echo $ischecked; ?>></td>   
                   
                </tr>  
        <?php endforeach; }?>    
    </tbody>  
</table>  
 <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
        </div>

        <div class="modal-body">
          <p>You are about to delete one post</p>
          <p>Do you want to proceed?</p>
          <input type="hidden" name="postid" id="deletepostid">
          <p class="debug-url"></p>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <a class="btn btn-danger btn-ok">Delete</a>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript" >
    $(document).ready(function(){
      $("[name='isactive']").bootstrapSwitch();
$('.error_display').hide();
        $('.success_display').hide();
       $('#poststable').DataTable();
        $('input[name="isactive"]').on('switchChange.bootstrapSwitch', function(event, state) {

            $.ajax({
                url: current_url+"/make_active_not",
                method: 'POST',
                data: { 
                    galleryid: $(this).attr('galleryid'),
                    status:$(this).val()
                },
                dataType:"json",
                success: function(response){
                    if(response.success){
                        var status=$('input[galleryid="'+response.postid+'"]').val();
                        $('input[galleryid="'+response.postid+'"]').val((status=="Active")?"Deactive":"Active");
                        $('.success_display').show();
                        $('.success_messages').html('Status changed successfully..!');
                    }                   
                }
            });
        });

        $('#confirm-delete').on('show.bs.modal', function(e) {
            $('#deletepostid').val($(e.relatedTarget).attr('postid'));
        });

        $('body').on('click','a.btn-ok',function(e){
            var postid=$('#deletepostid').val();
            $.ajax({
                url: current_url+"/delete_postxx",
                method: 'POST',
                data: { 
                    postid: postid
                },
                dataType:"json",
                success: function(response){
                    if(response.success){
                        $('#confirm-delete').modal('hide');
                        location.reload();
                    }                   
                }
            });
        });
    });
</script>