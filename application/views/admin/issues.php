<div class="page-header">

    <h3>Issues</h3>

</div>



<a class="btn btn-primary btn-sm pull-right " href="<?php echo base_url('issues/create'); ?>" > Add New Issue</a>

<br><br>

 <div class="alert alert-success success_display fade in">

    <a href="#" class="close" aria-label="close">&times;</a>

    <div class="success_messages"></div>

 </div>

<table id="postnamestable" class="table table-striped table-bordered" cellspacing="0" width="100%">

    <thead>  

        <tr>

            <th width="20%">issue</th>
            <th width="25%">Brand</th>
            <th width="25%">issue</th>

            <th width="10%">Status</th>

            <th width="20%">Actions</th>

        </tr>  

    </thead>  

    <tbody class="record">  

        <?php

        $no=0;

        if (count($issues) > 0) {

            foreach ($issues as $issue){

                $no++;

                ?>          

                <tr>  

                    <td><img src="<?php echo base_url(); ?>/useruploadfiles/issueimages/<?php echo $issue['issue_url']; ?>" style="width: 150px;"></td>
                    <td><?php echo $issue['brand_name']; ?></td> 
                    <td><?php echo $issue['issue_name']; ?></td> 
                    <?php $ischecked = $issue['is_active']==1 ? "checked=''" : ""; ?>
                    <td><input type="checkbox" issue_id="<?php echo $issue['issue_id']; ?>" data-size="mini" value="<?php echo $issue['is_active']; ?>" name="isactive" <?php echo $ischecked; ?>></td>  
                    <td>  

                        <div class="btn-group">  

                            <a href="<?php echo base_url('issues/update'); ?>/<?php echo $issue['issue_id']; ?>" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>            

                            <a  issueid="<?php echo $issue['issue_id']; ?>"  data-toggle="modal" data-target="#confirm-delete"  ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>  

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

                <p>You are about to delete this issue</p>

                <p>Do you want to proceed?</p>

                <input type="hidden" name="issuesid" id="issuesid">

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

        var issues=$.parseJSON('<?php echo addslashes(json_encode($issues, JSON_HEX_QUOT)); ?>');

        $('.error_display').hide();

        $('.success_display').hide();

        $('a.close').click(function(e){

            e.preventDefault();

            $(this).parent().hide();

        });

        $('#postnamestable').DataTable();

        $("[name='isactive']").bootstrapSwitch();

        
        $('body').on('click','.editissueBtn',function(e){

            var issueid = $(this).attr('issueid');

            var singleissue = get_single_issue(issues, issueid);

            $('#editissueModal #issue_id').val(issueid);

            $('#editissueModal #issue_name').val(singleissue.issue_name);

           // $('#editissueModal').modal('show');

        });

        $("#issuesform").validate({

            rules: {

                brand_id: "required",
                issue_name: "required",
                issueimage: "required"

            },

            messages: {
                brand_id: "please select a brand",
                issue_name: "please enter issue name",
                issueimage: "please select a issue image"
            },

            submitHandler: function(form) {
                var data =$(form).serialize();
                jQuery.each($('input[name^="issueimage"]')[0].files, function(i, file) {
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



        $("#editissueForm").validate({

            rules: {

                issue_name: "required"

            },

            messages: {

                issue_name: "please enter issue name",

                full_issue_url:"Please enter valid issue address"

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

                            $('#editissueForm').modal('hide');

                            setTimeout(2000);

                            location.reload();

                        }else{

                            $('.success_display').hide();

                            $('.success_messages').html(response.message);

                            $('#editissueForm').modal('hide');

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

                    issue_id: $(this).attr('issue_id'),

                    is_active:  isactive

                },

                dataType:"json",

                success: function(response){

                    if(response.success){

                        var status=$('input[issue_id="'+response.postid+'"]').val();

                        $('input[issue_id="'+response.postid+'"]').val((status==0)?1:0);

                        $('.success_display').show();

                        $('.success_messages').html('status update successfully...');

                    }                   

                }

            });

        });

        
        $('#confirm-delete').on('show.bs.modal', function(e) {

            $('#issuesid').val($(e.relatedTarget).attr('issueid'));

        });



        $('body').on('click','a.btn-ok',function(e){

            var issue_id=$('#issuesid').val();

            $.ajax({

                url: current_url+"/delete_issue",

                method: 'POST',

                data: { 

                    issue_id: issue_id

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

    function get_single_issue(issues, id){

        var issuedata="";

        if(issues.length>0){

            $.each(issues,function(key, value){

                if(value.issue_id==id){

                    issuedata=value;

                }

            });

        }

        return issuedata;

    }



</script>









