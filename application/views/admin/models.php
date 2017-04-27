<div class="page-header">

    <h3>Models</h3>

</div>



<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('models/create'); ?>" > Add New Model</a>

<br><br>

 <div class="alert alert-success success_display fade in">

    <a href="#" class="close" aria-label="close">&times;</a>

    <div class="success_messages"></div>

 </div>

<table id="postnamestable" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>  

        <tr>

            <th width="20%">Model</th>
            <th width="25%">Brand</th>
            <th width="25%">Model</th>

            <th width="10%">Status</th>

            <th width="20%">Actions</th>

        </tr>  

    </thead>  

    <tbody class="record">  

        <?php

        $no=0;

        if (count($models) > 0) {

            foreach ($models as $model){

                $no++;

                ?>          

                <tr>  

                    <td><img src="<?php echo base_url(); ?>/useruploadfiles/modelimages/<?php echo $model['model_url']; ?>" style="width: 150px;"></td>
                    <td><?php echo $model['brand_name']; ?></td> 
                    <td><?php echo $model['model_name']; ?></td> 
                    <?php $ischecked = $model['is_active']==1 ? "checked=''" : ""; ?>
                    <td><input type="checkbox" model_id="<?php echo $model['model_id']; ?>" data-size="mini" value="<?php echo $model['is_active']; ?>" name="isactive" <?php echo $ischecked; ?>></td>  
                    <td>  

                        <div class="btn-group">  

                            <a href="<?php echo base_url('models/update'); ?>/<?php echo $model['model_id']; ?>" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>            

                            <a  modelid="<?php echo $model['model_id']; ?>"  data-toggle="modal" data-target="#confirm-delete"  ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>  

                        </div>  

                    </td>  

                </tr>  

        <?php } 

            } ?>    

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

                <p>You are about to delete this model</p>

                <p>Do you want to proceed?</p>

                <input type="hidden" name="modelsid" id="modelsid">

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

        var models=$.parseJSON('<?php echo addslashes(json_encode($models, JSON_HEX_QUOT)); ?>');

        $('.error_display').hide();

        $('.success_display').hide();

        $('a.close').click(function(e){

            e.preventDefault();

            $(this).parent().hide();

        });

        $('#postnamestable').DataTable();

        $("[name='isactive']").bootstrapSwitch();

        
        $('body').on('click','.editmodelBtn',function(e){

            var modelid = $(this).attr('modelid');

            var singlemodel = get_single_model(models, modelid);

            $('#editmodelModal #model_id').val(modelid);

            $('#editmodelModal #model_name').val(singlemodel.model_name);

           // $('#editmodelModal').modal('show');

        });

        $("#modelsform").validate({

            rules: {

                brand_id: "required",
                model_name: "required",
                modelimage: "required"

            },

            messages: {
                brand_id: "please select a brand",
                model_name: "please enter model name",
                modelimage: "please select a model image"
            },

            submitHandler: function(form) {
                var data =$(form).serialize();
                jQuery.each($('input[name^="modelimage"]')[0].files, function(i, file) {
                    data.append(i, file);
                });

                $.ajax({

                    type: 'POST',

                    url: current_url+'/create',

                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    //contentType : "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2),
                    //dataType:'json',

                    success: function(response){

                        if(response.error){

                            $('.error_display').show();

                            $('.error_messages').html(response.message);    

                            setTimeout(2000);

                            location.reload();                        

                        }else{

                            $('.success_display').show();

                            $('.success_messages').html(response.message);

                            setTimeout(2000);

                            location.reload();

                        }

                    }

                });

                return false;

            }

        });



        $("#editmodelForm").validate({

            rules: {

                model_name: "required"

            },

            messages: {

                model_name: "please enter model name",

                full_model_url:"Please enter valid model address"

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

                            $('#editmodelForm').modal('hide');

                            setTimeout(2000);

                            location.reload();

                        }else{

                            $('.success_display').hide();

                            $('.success_messages').html(response.message);

                            $('#editmodelForm').modal('hide');

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

                    model_id: $(this).attr('model_id'),

                    is_active:  isactive

                },

                dataType:"json",

                success: function(response){

                    if(response.success){

                        var status=$('input[model_id="'+response.postid+'"]').val();

                        $('input[model_id="'+response.postid+'"]').val((status==0)?1:0);

                        $('.success_display').show();

                        $('.success_messages').html('status update successfully...');

                    }                   

                }

            });

        });

        
        $('#confirm-delete').on('show.bs.modal', function(e) {

            $('#modelsid').val($(e.relatedTarget).attr('modelid'));

        });



        $('body').on('click','a.btn-ok',function(e){

            var model_id=$('#modelsid').val();

            $.ajax({

                url: current_url+"/delete_model",

                method: 'POST',

                data: { 

                    model_id: model_id

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

    function get_single_model(models, id){

        var modeldata="";

        if(models.length>0){

            $.each(models,function(key, value){

                if(value.model_id==id){

                    modeldata=value;

                }

            });

        }

        return modeldata;

    }



</script>









