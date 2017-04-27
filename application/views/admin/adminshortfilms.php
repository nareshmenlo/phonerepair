<div class="page-header">

    <h3>Admin Shortfilms</h3>

</div>



<button class="btn btn-primary btn-sm pull-right " data-toggle="modal" data-target="#addNewForm"> Add New Shortfilm</button>

<br><br>

 <div class="alert alert-success success_display fade in">

    <a href="#" class="close" aria-label="close">&times;</a>

    <div class="success_messages"></div>

 </div>

<table id="postnamestable" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>  

        <tr>

            <th width="5%">No</th>

            <th width="25%">Vedio</th>

            <th width="30%">Name</th>

            <th width="15%">Created At</th>  

            <th width="15%">Status</th>

            <th width="15%">Actions</th>

        </tr>  

    </thead>  

    <tbody class="record">  

        <?php

        $no=0;

        if (count($shortfilms) > 0) {

            foreach ($shortfilms as $vedio){

                $no++;

                ?>          

                <tr>  

                    <td><?php echo $no; ?></td>  

                    <td><iframe id="I1" allowfullscreen="" frameborder="0" height="200" width="250" name="I1" src="http://www.youtube.com/embed/<?php echo $vedio['vedio']; ?>"></iframe></td>  

                    <td><?php echo $vedio['vedio_name']; ?></td> 

                    <td><?php echo date('d/m/Y', strtotime($vedio['created'])); ?></td>  

                    <?php $ischecked = $vedio['is_active']==1 ? "checked=''" : ""; ?>

                    <td><input type="checkbox" vedio_id="<?php echo $vedio['id']; ?>" data-size="mini" value="<?php echo $vedio['is_active']; ?>" name="isactive" <?php echo $ischecked; ?>></td>  

                    <td>  

                        <div class="btn-group">  

                            <a vedioid="<?php echo $vedio['id']; ?>" class="editvedioBtn" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>            

                            <a  vedioid="<?php echo $vedio['id']; ?>"  data-toggle="modal" data-target="#confirm-delete"  ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>  

                        </div>  

                    </td>  

                </tr>  

        <?php } 

            } ?>    

    </tbody>

</table>



<div class="modal fade" id="addNewForm" tabindex="-1" role="dialog" 

     aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">

                <button type="button" class="close" 

                   data-dismiss="modal">

                       <span aria-hidden="true">&times;</span>

                       <span class="sr-only">Close</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">

                    Add New vedio

                </h4>

            </div>

                <form role="form" id="shortfilmsform" >

                

            <!-- Modal Body -->

            <div class="modal-body">

                <div class="alert alert-danger error_display fade in">

                   <a href="#" class="close" aria-label="close">&times;</a>

                   <div class="error_messages"></div>

                </div>

                  <div class="form-group">

                    <label for="name">vedio Name</label>

                      <input type="text" class="form-control" id="vedio_name" placeholder="Enter vedio Name" name="vedio_name"/>

                  </div>

                  <div class="form-group">

                    <label for="description">vedio Address</label>

                      <input type="text" class="form-control" id="full_vedio_url" placeholder="Enter vedio Address" name="full_vedio_url"/>

                  </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>

                <button type="submit" class="btn btn-primary" id="savevedio"> Save </button>

            </div>

               </form>

        </div>

    </div>

</div>



<div class="modal fade" id="editvedioModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <!-- Modal Header -->

            <div class="modal-header">

                <button type="button" class="close" 

                   data-dismiss="modal">

                       <span aria-hidden="true">&times;</span>

                       <span class="sr-only">Close</span>

                </button>

                <h4 class="modal-title" id="myModalLabel">

                    Edit vedio

                </h4>

            </div>

                <form role="form" id="editvedioForm" >

                

            <!-- Modal Body -->

            <div class="modal-body">

                <div class="alert alert-danger error_display fade in">

                   <a href="#" class="close" aria-label="close">&times;</a>

                   <div class="error_messages"></div>

                </div>

                  <div class="form-group">

                    <label for="name">vedio Name</label>

                      <input type="text" class="form-control" id="vedio_name" placeholder="Enter vedio Name" name="vedio_name"/>

                      <input type="hidden" class="form-control" id="vedio_id" value="0" name="vedio_id"/>

                  </div>

                  <div class="form-group">

                    <label for="description">vedio Address</label>

                      <input type="text" class="form-control" id="full_vedio_url" placeholder="Enter vedio Address" name="full_vedio_url"/>

                  </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>

                <button type="submit" class="btn btn-primary" id="updatevedio"> Save </button>

            </div>

        </form>

        </div>

    </div>

</div>



<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">



            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>

            </div>



            <div class="modal-body">

                <p>You are about to delete this vedio</p>

                <p>Do you want to proceed?</p>

                <input type="hidden" name="shortfilmsid" id="shortfilmsid">

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

        var shortfilms=$.parseJSON('<?php echo addslashes(json_encode($shortfilms, JSON_HEX_QUOT)); ?>');

        $('.error_display').hide();

        $('.success_display').hide();

        $('a.close').click(function(e){

            e.preventDefault();

            $(this).parent().hide();

        });

        $('#postnamestable').DataTable();

        $("[name='isactive']").bootstrapSwitch();

        $("[name='isactiveplay']").bootstrapSwitch();

        $('body').on('click','.editvedioBtn',function(e){

            var vedioid = $(this).attr('vedioid');

            var singlevedio = get_single_vedio(shortfilms, vedioid);

            $('#editvedioModal #vedio_id').val(vedioid);

            $('#editvedioModal #vedio_name').val(singlevedio.vedio_name);

            $('#editvedioModal #full_vedio_url').val(singlevedio.full_vedio_url);

            $('#editvedioModal').modal('show');

        });

        $("#shortfilmsform").validate({

            rules: {

                vedio_name: "required",

                full_vedio_url:{

                    required:true,

                    url:true

                }

            },

            messages: {

                vedio_name: "please enter vedio name",

                full_vedio_url:"Please enter valid vedio address"

            },

            submitHandler: function(form) {

                $.ajax({

                    type: 'POST',

                    url: current_url+'/create',

                    data: $(form).serialize(),

                    dataType : 'json',

                    success: function(response){

                        if(response.error){

                            $('.error_display').show();

                            $('.error_messages').html(response.message);    

                            $('#addNewForm').modal('hide');

                            setTimeout(2000);

                            location.reload();                        

                        }else{

                            $('.success_display').show();

                            $('.success_messages').html(response.message);

                            $('#addNewForm').modal('hide');

                            setTimeout(2000);

                            location.reload();

                        }

                    }

                });

                return false;

            }

        });



        $("#editvedioForm").validate({

            rules: {

                vedio_name: "required",

                full_vedio_url:{

                    required:true,

                    url:true

                }

            },

            messages: {

                vedio_name: "please enter vedio name",

                full_vedio_url:"Please enter valid vedio address"

            },

            submitHandler: function(form) {

                $.ajax({

                    type: 'POST',

                    url: current_url+'/update',

                    data: $(form).serialize(),

                    dataType : 'json',

                    success: function(response){

                        if(response.error){

                            $('.error_display').show();

                            $('.error_messages').html(response.message);

                            $('#editvedioForm').modal('hide');

                            setTimeout(2000);

                            location.reload();

                        }else{

                            $('.success_display').hide();

                            $('.success_messages').html(response.message);

                            $('#editvedioForm').modal('hide');

                            setTimeout(2000);

                            location.reload();

                        }

                    }

                });

                return false;

            }

        });

        $('input[name="isactive"]').on('switchChange.bootstrapSwitch', function(event, state) {

            var isactive=$(this).val();

            $.ajax({

                url: current_url+"/make_active_not",

                method: 'POST',

                data: { 

                    vedio_id: $(this).attr('vedio_id'),

                    is_active:  isactive

                },

                dataType:"json",

                success: function(response){

                    if(response.success){

                        var status=$('input[vedio_id="'+response.postid+'"]').val();

                        $('input[vedio_id="'+response.postid+'"]').val((status==0)?1:0);

                        $('.success_display').show();

                        $('.success_messages').html('status update successfully...');

                    }                   

                }

            });

        });

        $('input[name="isactiveplay"]').on('switchChange.bootstrapSwitch', function(event, state) {

            var isactive=$(this).val();

            $.ajax({

                url: current_url+"/make_active_dashboard_play",

                method: 'POST',

                data: { 

                    vedio_id: $(this).attr('pvedio_id'),

                    is_active_play:  isactive

                },

                dataType:"json",

                success: function(response){

                    if(response.success){

                        var status=$('input[pvedio_id="'+response.postid+'"]').val();

                        $('input[pvedio_id="'+response.postid+'"]').val((status==0)?1:0);

                        $('.success_display').show();

                        $('.success_messages').html('home page status update successfully...');

                    }                   

                }

            });

        });



        $('#confirm-delete').on('show.bs.modal', function(e) {

            $('#shortfilmsid').val($(e.relatedTarget).attr('vedioid'));

        });



        $('body').on('click','a.btn-ok',function(e){

            var vedio_id=$('#shortfilmsid').val();

            $.ajax({

                url: current_url+"/delete_vedio",

                method: 'POST',

                data: { 

                    vedio_id: vedio_id

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

    function get_single_vedio(shortfilms, id){

        var vediodata="";

        if(shortfilms.length>0){

            $.each(shortfilms,function(key, value){

                if(value.id==id){

                    vediodata=value;

                }

            });

        }

        return vediodata;

    }



</script>









