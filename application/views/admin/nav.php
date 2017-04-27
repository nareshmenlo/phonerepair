
<div id="great_main_menu_panel"  style="z-index: 2;" ><!-- great_main_menu_panel -->



<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">

    

      <div class="container">

         

        <div class="navbar-header">

          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </button>

          <a class="navbar-brand" href="<?php echo base_url('dashboard'); ?>" >
         <h2 class="text-center logodiv" style="margin: 0;"><span style="color:#fff;font-weight:bold;">Repair</span></h2>

            <!-- <img src="<?php echo asset_url(); ?>img/teluguaksharamlogo.png" style="width:187px;" />-->

          </a>

        </div>

          

        <div id="navbar" class="navbar-collapse collapse" style="margin-top: 18px;">

          <ul class="nav navbar-nav">

                    <li><a class="<?php echo active_link('dashboard'); ?>" href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>

                    <li><a class="<?php echo active_link('brands'); ?> " href="<?php echo base_url('brands'); ?>">Brands</a></li>

                    <li><a class="<?php echo active_link('models'); ?> " href="<?php echo base_url('models'); ?>">Models</a></li>

                     <li><a class="<?php echo active_link('issues'); ?> " href="<?php echo base_url('issues'); ?>">Issues</a></li>
<!--
                    <li><a class="<?php echo active_link('adminvedios'); ?> " href="<?php echo base_url('adminvedios'); ?>">Vedios</a></li>
                    <li><a class="<?php echo active_link('adminshortfilms'); ?> " href="<?php echo base_url('adminshortfilms'); ?>">Short Films</a></li>-->
                </ul>
                <a href="<?php echo base_url('admin/logout'); ?>" class="pull-right logout"><i class="glyphicon glyphicon-log-out" ></i> logout</a>

        </div>

      </div>

    </nav>  

</div>