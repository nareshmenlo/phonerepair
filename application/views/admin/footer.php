    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="@" target="_blank"></a> Teluguaksharam news - <?php echo date('Y') ?></p>
    </footer>
</div><!--/.fluid-container-->

<!-- external javascript -->
<script src="<?php echo asset_url(); ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo asset_url(); ?>js/bootstrap-switch.min.js"></script>
<script src="<?php echo asset_url(); ?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo asset_url(); ?>js/bootstrap-select.min.js"></script>
<script src="<?php echo asset_url(); ?>js/common.js"></script>
<script type="text/javascript">
    
        function checkImg(img) {
        if (img.naturalHeight <= 1 && img.naturalWidth <= 1) {
            // undersize image here
            img.src = "<?php echo asset_url(); ?>img/noimage.png";
        }
    }

    $("img").each(function() {
        // if image already loaded, we can check it's height now
        if (this.complete) {
            checkImg(this);
        } else {
            // if not loaded yet, then set load and error handlers
            $(this).load(function() {
                checkImg(this);
            }).error(function() {
                // img did not load correctly
                // set new .src here
                this.src = "<?php echo asset_url(); ?>img/noimage.png";
            });

        }
    });
</script>
</body>
</html>
