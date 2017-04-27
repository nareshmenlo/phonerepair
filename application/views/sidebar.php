<aside id="ccr-right-section" class="col-md-4 ccr-home">

    <div class="sortable-item_style_2 " >
        <div class="headingBtm" style="background: #994340;">

            <p class="title_color" style="color: #FFF;"><strong>POLITICAL NEWS</strong></p>

        </div>
     <section id="sidebar-popular-post" class="highlights">

   

         <!-- .ccr-gallery-ttile -->

         <ul class="mostpopular_news news_style">

         <?php $highlights=politicalNews();

         ?>

            <?php if (count($highlights) > 0) { ?> 

                <?php foreach ($highlights as $popular): ?>

                    <li>

                        <a href="<?php echo base_url().'political/single/'.$popular->id; ?>"><?php echo $popular->title; ?></a>

                    </li>

                <?php endforeach; ?>

            <?php }else { ?>
                
                <li><a>News are not available</a></li>

            <?php } ?> 

        </ul>        

    </section> <!-- /#sidebar-popular-post -->



    </div>

    <div class="sortable-item_style_2">
<img src="<?php echo asset_url(); ?>img/A1 NEWS ADVT.jpg" />
     <!--<div data-WRID="WRID-144418450934651661" data-widgetType="staticBanner" data-responsive="yes" data-class="affiliateAdsByFlipkart" height="250" width="300"></div><script async src="//affiliate-static.flixcart.com/affiliate/widgets/FKAffiliateWidgets.js"></script>
-->
     </div>

</aside><!-- / .col-md-4  / #ccr-right-section -->