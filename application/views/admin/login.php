<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="" >
        <meta name="author" content="">
        <meta name="viewport" content="initial-scale=0">
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/bootstrap-theme.min.css">
                <link rel="stylesheet" type="text/css" href="<?php echo asset_url(); ?>css/adminstyle.css">

		<title>:: Admin Login ::</title>
	</head>
<body>
	<div class="container" >
	<div class="row top-buffer-60" >
	<div class="col-md-4"></div>
	<div class="col-md-4 loginbox">
		<form id="form1" name="form1" method="post" action="do_login">
<!-- 			<h3 class="text-center"><img src="<?php echo asset_url(); ?>img/nvn.jpg" style="width:250px;" /></h3>
 -->			
 <h2 class="text-center logodiv"><span style="color:green;font-weight:bold;">Repair</span></h2>

 				<?php if(isset($error_message)){ ?>
				<div class="alert alert-danger">
				  <strong>Error!</strong> <?php echo $error_message; ?>
				</div>
			<?php } ?>
				<div class="form-group">
				    <label for="name">Username</label>
				    <input type="text" class="form-control" id="name" name="name" placeholder="username">
				</div>
				<div class="form-group">
				    <label for="pwd">Password</label>
				    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="password">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary col-md-4 pull-right">Login</button>
				</div>
		</form>
		</div>
		<div class="col-md-4"></div>
		</div>
	</div> 
	<script src="<?php echo asset_url(); ?>js/jquery-1.11.3.min.js"></script>
	<script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo asset_url(); ?>js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$("#form1").validate({
		  	rules: {
			  	name: {
			      required: true
			    },
			    pwd: {
			      required: true
			    }
			},
		    messages: {
		    	name: {
			      required: "Username is required"
			    },
			    pwd: {
			      required: "Password is required"
			    }
		  	},
		  	submitHandler: function(form) {
			    // do other things for a valid form
			    form.submit();
		  	}
		});
	</script>
	</body>

</html>
