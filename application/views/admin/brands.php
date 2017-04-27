<div class="page-header">

    <h3>Brands</h3>

</div>



<button class="btn btn-primary btn-sm pull-right " data-toggle="modal" data-target="#addNewForm"> Add New Brand</button>

<br><br>

 <div class="alert alert-success success_display fade in">

    <a href="#" class="close" aria-label="close">&times;</a>

    <div class="success_messages"></div>

 </div>

<table id="postnamestable" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>  

        <tr>

            <th width="70%">brand</th>

            <th width="10%">Status</th>

            <th width="20%">Actions</th>

        </tr>  

    </thead>  

    <tbody class="record">  

        <?php

        $no=0;

        if (count($brands) > 0) {

            foreach ($brands as $brand){

                $no++;

                ?>          

                <tr>  

                    <td><?php echo $brand['brand_name']; ?></td> 

                    <?php $ischecked = $brand['is_active']==1 ? "checked=''" : ""; ?>

                    <td><input type="checkbox" brand_id="<?php echo $brand['brand_id']; ?>" data-size="mini" value="<?php echo $brand['is_active']; ?>" name="isactive" <?php echo $ischecked; ?>></td>  

                    <td>  

                        <div class="btn-group">  

                            <a brandid="<?php echo $brand['brand_id']; ?>" class="editbrandBtn" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>            

                            <a  brandid="<?php echo $brand['brand_id']; ?>"  data-toggle="modal" data-target="#confirm-delete"  ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>  

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

                    Add New Brand

                </h4>

            </div>

                <form role="form" id="brandsform" >

                

            <!-- Modal Body -->

            <div class="modal-body">

                <div class="alert alert-danger error_display fade in">

                   <a href="#" class="close" aria-label="close">&times;</a>

                   <div class="error_messages"></div>

                </div>

                  <div class="form-group">

                    <label for="name">Brand Name</label>

                      <input type="text" class="form-control" id="brand_name" placeholder="Enter brand Name" name="brand_name"/>

                  </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>

                <button type="submit" class="btn btn-primary" id="savebrand"> Save </button>

            </div>

               </form>

        </div>

    </div>

</div>



<div class="modal fade" id="editbrandModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

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

                    Edit brand

                </h4>

            </div>

                <form role="form" id="editbrandForm" >

                

            <!-- Modal Body -->

            <div class="modal-body">

                <div class="alert alert-danger error_display fade in">

                   <a href="#" class="close" aria-label="close">&times;</a>

                   <div class="error_messages"></div>

                </div>

                  <div class="form-group">

                    <label for="name">Brand Name</label>

                      <input type="text" class="form-control" id="brand_name" placeholder="Enter brand Name" name="brand_name"/>

                      <input type="hidden" class="form-control" id="brand_id" value="0" name="brand_id"/>

                  </div>

            </div>

            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>

                <button type="submit" class="btn btn-primary" id="updatebrand"> Save </button>

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

                <p>You are about to delete this brand</p>

                <p>Do you want to proceed?</p>

                <input type="hidden" name="brandsid" id="brandsid">

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

        var brands=$.parseJSON('<?php echo addslashes(json_encode($brands, JSON_HEX_QUOT)); ?>');

        $('.error_display').hide();

        $('.success_display').hide();

        $('a.close').click(function(e){

            e.preventDefault();

            $(this).parent().hide();

        });

        $('#postnamestable').DataTable();

        $("[name='isactive']").bootstrapSwitch();

        
        $('body').on('click','.editbrandBtn',function(e){

            var brandid = $(this).attr('brandid');

            var singlebrand = get_single_brand(brands, brandid);

            $('#editbrandModal #brand_id').val(brandid);

            $('#editbrandModal #brand_name').val(singlebrand.brand_name);

            $('#editbrandModal #full_brand_url').val(singlebrand.full_brand_url);

            $('#editbrandModal').modal('show');

        });

        $("#brandsform").validate({

            rules: {

                brand_name: "required"

            },

            messages: {

                brand_name: "please enter brand name"
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



        $("#editbrandForm").validate({

            rules: {

                brand_name: "required"

            },

            messages: {

                brand_name: "please enter brand name",

                full_brand_url:"Please enter valid brand address"

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

                            $('#editbrandForm').modal('hide');

                            setTimeout(2000);

                            location.reload();

                        }else{

                            $('.success_display').hide();

                            $('.success_messages').html(response.message);

                            $('#editbrandForm').modal('hide');

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

                    brand_id: $(this).attr('brand_id'),

                    is_active:  isactive

                },

                dataType:"json",

                success: function(response){

                    if(response.success){

                        var status=$('input[brand_id="'+response.postid+'"]').val();

                        $('input[brand_id="'+response.postid+'"]').val((status==0)?1:0);

                        $('.success_display').show();

                        $('.success_messages').html('status update successfully...');

                    }                   

                }

            });

        });

        
        $('#confirm-delete').on('show.bs.modal', function(e) {

            $('#brandsid').val($(e.relatedTarget).attr('brandid'));

        });



        $('body').on('click','a.btn-ok',function(e){

            var brand_id=$('#brandsid').val();

            $.ajax({

                url: current_url+"/delete_brand",

                method: 'POST',

                data: { 

                    brand_id: brand_id

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

    function get_single_brand(brands, id){

        var branddata="";

        if(brands.length>0){

            $.each(brands,function(key, value){

                if(value.brand_id==id){

                    branddata=value;

                }

            });

        }

        return branddata;

    }



</script>









