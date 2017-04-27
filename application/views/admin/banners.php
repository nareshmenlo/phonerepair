<div class="page-header">
    <h3>All Banners</h3>
</div>
<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('banners/create'); ?>"> Add New Banner </a>
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
<table id="poststable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>  
        <tr>  
            <th width="5%">No</th>  
            <th width="20%">Banner</th>  
            <th width="35%">Banner Title</th>  
            <th width="10%">Created At</th>  
            <th width="10%">Status</th>  
            <th width="10%">Actions</th>  
        </tr>  
    </thead>  
    <tbody class="record">  
        <?php $no=0;
        if (count($banners) > 0) {
            foreach ($banners as $banner):
                $no++;
                ?>          
                <tr>  
                    <td><?php echo $no; ?></td>  
                    <td><img id="blah" width="200px" height="200px" src="<?php echo base_url(); ?>useruploadfiles/postimages/<?php  echo $banner->image; ?>" alt="banner image" onerror="imgError(this);" /></td>
                    <td><?php echo $banner->title; ?></td>  
                    <td><?php echo date('d/m/Y', strtotime($banner->date)); ?></td> 
                    <?php $ischecked = $banner->status=="Active" ? "checked='checked'" : ""; ?>
                    <td><input type="checkbox" data-size="mini" bannerid="<?php echo $banner->id; ?>" value="<?php echo $banner->status; ?>" name="isactive" <?php echo $ischecked; ?>></td>   
                    <td>  
                        <div class="btn-group">  
                            <a href="<?php echo base_url('banners/viewbanner/'.$banner->id); ?>" ><i class="fa fa-eye fa-lg" aria-hidden="true"></i></a>  
                            <a href="<?php echo base_url('banners/update/'.$banner->id); ?>"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                            <a bannerid="<?php echo $banner->id; ?>"  data-toggle="modal" data-target="#confirm-delete" ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>  
                        </div>  
                    </td>  
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
          <input type="hidden" name="bannerid" id="deletebannerid">
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

       $('#poststable').DataTable();
        $('input[name="isactive"]').on('switchChange.bootstrapSwitch', function(event, state) {
            $.ajax({
                url: current_url+"/make_active_not",
                method: 'POST',
                data: { 
                    bannerid: $(this).attr('bannerid'),
                    status:$(this).val()
                },
                dataType:"json",
                success: function(response){
                    if(response.success){
                        var status=$('input[bannerid="'+response.bannerid+'"]').val();
                        $('input[bannerid="'+response.bannerid+'"]').val((status=="Active")?"Deactive":"Active");
                    }                   
                }
            });
        });

        $('#confirm-delete').on('show.bs.modal', function(e) {
            $('#deletebannerid').val($(e.relatedTarget).attr('bannerid'));
        });

        $('body').on('click','a.btn-ok',function(e){
            var bannerid=$('#deletebannerid').val();
            $.ajax({
                url: current_url+"/delete_post",
                method: 'POST',
                data: { 
                    bannerid: bannerid
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