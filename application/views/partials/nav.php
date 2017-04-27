<?php
$controller = (strlen($this->uri->segment(1)) > 0) ? $this->uri->segment(1) : "";
?>
<div id="great_main_menu_panel"  style="z-index: 2;"><!-- great_main_menu_panel -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse padding0" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li ><a style="padding-top: 12px;" class="<?php echo active_link('home'); ?>" href="<?php echo base_url(); ?>"><i class="fa fa-home fa-lg"></i></a></li>
                <li><a class="<?php echo active_link('political'); ?> " href="<?php echo base_url('political'); ?>">Political</a></li>
                <li><a class="<?php echo active_link('movienews'); ?> " href="<?php echo base_url('movienews'); ?>">Movie News</a></li>
                <li><a class="<?php echo active_link('gossips'); ?> " href="<?php echo base_url('gossips'); ?>">Gossips</a></li>
                <li><a class="<?php echo active_link('moviereviews'); ?> " href="<?php echo base_url('moviereviews'); ?>">Movie Reviews</a></li>
                <li><a class="<?php echo active_link('gallery'); ?> " href="<?php echo base_url('gallery'); ?>">Stills</a></li>
                <li><a class="<?php echo active_link('videos'); ?> " href="<?php echo base_url('videos'); ?>">Videos</a></li>
                <li><a class="<?php echo active_link('videos'); ?> " href="<?php echo base_url('videos'); ?>">Short Films</a></li>
                <li><a class="<?php echo active_link('contactus'); ?> " href="<?php echo base_url('home/contactus'); ?>">Contact Us</a></li>
           </ul>
        </div>
    </nav>     
</div>