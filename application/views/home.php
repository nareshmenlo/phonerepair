<section class="home-page-search" ng-controller="PublicController as Public">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="banner-form-section">
                    <div class="table-cell">
                        <div class="banner-form-wrapper center-block" >
                            <div class="home-tag ">
                                <h2>
                                GET YOUR DEVICE REPAIRED
                                </h2>
                            </div>
                            <div class="home-repair-form hide_element" custominit ng-controller="PublicController">
                                <div ng-controller="AppController" class="row" ng-init="getHomeDropdown('brands/all', 'Brands')">
                                    <div  class="col-sm-4 col-xs-12">
                                        <div class="group">
                                            <span class="input-label floating_class_init">Select brand</span>
                                            <ui-select ng-click="helper.homeSelectFocus('floating_class_init')" on-select="getHomeDeviceModels(helper.device_id)" class="custom_ui_select" ng-model="helper.device_id" theme="selectize">
                                            <ui-select-match placeholder="Select brand" ng-bind="$select.selected.brand"></ui-select-match>
                                            <ui-select-choices repeat="item.device_id as item in Brands | filter: $select.search | orderBy: 'brand' ">
                                            <div ng-bind-html="item.brand | highlight: $select.search"></div>
                                            </ui-select-choices>
                                            </ui-select>
                                        </div>
                                        <span></span>
                                    </div>
                                    <div class="col-sm-1 col-xs-12 hidden-xs">
                                        <span class="border-right"></span>
                                    </div>
                                    <div class="col-sm-4 col-xs-12">
                                        <div class="group">
                                            <span class="input-label input-label floating_class_model_init">Select model</span>
                                            <img ng-if="helper.device_id && models.length === 0" src="https://justlikenew.in/img/loading-small.gif" class="dropdown_loading_home">
                                            <ui-select ng-disabled="models.length === 0" ng-click="helper.homeSelectFocus('floating_class_model_init')" class="custom_ui_select" ng-model="helper.model_id" theme="selectize">
                                            <ui-select-match placeholder="Select model" ng-bind="$select.selected.model"></ui-select-match>
                                            <ui-select-choices repeat="item.model_id as item in models | filter: $select.search | orderBy: 'model'">
                                            <div ng-bind-html="item.model | highlight: $select.search"></div>
                                            </ui-select-choices>
                                            </ui-select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-xs-12">
                                        <button type="button" ng-click="Public.goToRepairFromHome()" class="btn-orange pull-right">
                                        Repair
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="banner-footer-section">
            <div class="row">
                <div class="footer-item">
                    <div class="col-sm-4 col-xs-12">

                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="service-detail">
                            <h3>
                            <span ng-bind="Public.stats.smart_phone_repaired"></span> +
                            </h3>
                            <h4>
                            Smartphones Repaired
                            </h4>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-first bg-dark home-base">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="text-center work-process-tab">
                    <h3>
                    How It works
                    </h3>
                    <ul class="nav nav-pills nav-normalized center-block text-center">
                        <li class="active round-left-tab">
                            <div data-toggle="pill" href="#online_repair">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <h4>
                                REPAIR ONLINE
                                </h4>
                                <p>
                                    At the comfort of your home
                                </p>
                            </div>
                        </li>
                        <li class="round-right-tab">
                            <div data-toggle="pill" href="#visit_store">
                                <i class="fa fa-building-o" aria-hidden="true"></i>
                                <h4>
                                VISIT STORE
                                </h4>
                                <p>
                                    Walk in to your nearest store
                                </p>
                            </div>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="online_repair" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12">
                                    <div class="text-center work-card">
                                        <img src="https://justlikenew.in/img/jln-money-transfer.png" class="img-responsive center-block">
                                        <h4>
                                        ORDER
                                        </h4>
                                        <p>
                                            View prices upfront and book repair online. Pay by Card or Choose Cash on Delivery.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="work-card">
                                        <img src="https://justlikenew.in/img/jln-pickup.png" class="img-responsive center-block">
                                        <h4>
                                        FREE PICKUP
                                        </h4>
                                        <p>
                                            Relax while our executives pick the device from your place.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="work-card">
                                        <img src="https://justlikenew.in/img/jln-repair.png" class="img-responsive center-block">
                                        <h4>
                                        DIAGNOSIS & REPAIR
                                        </h4>
                                        <p>
                                            Get a 30 point quality check report on your mail while your device is repaired.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-xs-12">
                                    <div class="work-card">
                                        <img src="https://justlikenew.in/img/jln-pay.png" class="img-responsive center-block">
                                        <h4>
                                        RECEIVE & PAY CASH
                                        </h4>
                                        <p>
                                            Receive the device at your place and pay by Cash.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div >
                                        <p class="text-center city">
                                            Our workshop locations -  &nbsp; <span> BANGALORE , HYDERABAD</span>
                                        </p>
                                        <a class="btn-theme" href="https://justlikenew.in/booking/repair">
                                            REPAIR
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="visit_store" class="tab-pane fade visit_store center-block">
                            <div class="row">
                                <div class="col-sm-4 col-xs-12">
                                    <div class="text-center work-card">
                                        <img src="https://justlikenew.in/img/jln_shop-100.png" class="img-responsive center-block">
                                        <h4>
                                        VISIT STORE
                                        </h4>
                                        <p>
                                            Walk-in to your nearest store and handover the device.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="work-card">
                                        <img src="https://justlikenew.in/img/jln-repair.png" class="img-responsive center-block">
                                        <h4>
                                        DEVICE REPAIRED
                                        </h4>
                                        <p>
                                            You get a notification once device is Repaired &amp; ready for delivery.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="work-card">
                                        <img src="https://justlikenew.in/img/jln-pay.png" class="img-responsive center-block">
                                        <h4>
                                        COLLECT &amp; PAY
                                        </h4>
                                        <p>
                                            Collect device from store &amp; PAY by Cash / Card.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <div >
                                        <p class="text-center city">
                                            <span>VISIT YOUR NEARBY JUSTLIKENEW STORE</span>
                                        </p>
                                        <a class="btn-theme" href="https://justlikenew.in/stores">
                                            ALL STORES
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="home-first location-section home-base" ng-cloak>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="text-center">
                    <h3>
                    Drop into our store
                    </h3>
                    <p class="p-bold">
                        <span>
                            Walk into our store
                        </span>
                    </p>
                </div>
            </div>
        </div>
        <div ng-controller="AppController" ng-init="getHomeDropdown('stores/distance', 'stores', true)" class="hidden-xs" ng-cloak>

            <div class="carousel-reviews location-list">
                <div class="row">
                    <div id="carousel-location" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-location" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-location" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item" ng-class="{'active': $index === 0 && stores[$index].distance }" ng-repeat="store in stores" ng-if="$index % 3 == 0">
                                <div class="col-sm-4 col-xs-12" ng-if="stores[$index].name && !stores[$index].ignore">
                                    <div class="see-location" ng-class="{'home_page_store_selected': $index === 0 }">
                                        <div class="work-location">
                                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                                <div class="flipper">
                                                    <div class="front">
                                                        <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center=[[stores[$index].latitude]],[[stores[$index].longitude]]&markers=color:red%7Clabel:C%7C[[stores[$index].latitude]],[[stores[$index].longitude]]&zoom=12&size=250x150&key=AIzaSyCvJWtk_wzNV_okHbec4VzbPwc4Jc9Fm68" class="img-location">
                                                        <p>
                                                            [[stores[$index].name]]<br>
                                                            [[stores[$index].address]], [[stores[$index].city]], [[stores[$index].state]], [[stores[$index].pincode]]
                                                        </p>
                                                    </div>
                                                    <div class="back">
                                                        <img ng-src="[[stores[$index+2].icon]]" class="img-location">
                                                        <p>
                                                            [[stores[$index].name]]<br>
                                                            [[stores[$index].address]], [[stores[$index].city]], [[stores[$index].state]], [[stores[$index].pincode]]
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12"  ng-if="stores[$index+1].name && !stores[$index+1].ignore">
                                    <div class="see-location">
                                        <div class="work-location">
                                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                                <div class="flipper">
                                                    <div class="front">
                                                        <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center=[[stores[$index +1].latitude]],[[stores[$index +1].longitude]]&markers=color:red%7Clabel:C%7C[[stores[$index +1].latitude]],[[stores[$index +1].longitude]]&zoom=12&size=250x150&key=AIzaSyCvJWtk_wzNV_okHbec4VzbPwc4Jc9Fm68" class="img-location">
                                                        <p>
                                                            [[stores[$index +1].name]]<br>
                                                            [[stores[$index +1].address]], [[stores[$index +1].city]], [[stores[$index +1].state]], [[stores[$index +1].pincode]]
                                                        </p>
                                                    </div>
                                                    <div class="back">
                                                        <img ng-src="[[stores[$index+1].icon]]" class="img-location">
                                                        <p>
                                                            [[stores[$index +1].name]]<br>
                                                            [[stores[$index +1].address]], [[stores[$index +1].city]], [[stores[$index +1].state]], [[stores[$index +1].pincode]]
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12"  ng-if="stores[$index+2].name && !stores[$index+2].ignore">
                                    <div class="see-location">
                                        <div class="work-location">
                                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                                <div class="flipper">
                                                    <div class="front">
                                                        <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center=[[stores[$index+2].latitude]],[[stores[$index+2].longitude]]&markers=color:red%7Clabel:C%7C[[stores[$index+2].latitude]],[[stores[$index+2].longitude]]&zoom=12&size=250x150&key=AIzaSyCvJWtk_wzNV_okHbec4VzbPwc4Jc9Fm68" class="img-location">
                                                        <p>
                                                            [[stores[$index+2].name]]<br>
                                                            [[stores[$index+2].address]], [[stores[$index+2].city]], [[stores[$index+2].state]], [[stores[$index+2].pincode]]
                                                        </p>
                                                    </div>
                                                    <div class="back">
                                                        <img ng-src="[[stores[$index+2].icon]]" class="img-location">
                                                        <p>
                                                            [[stores[$index+2].name]]<br>
                                                            [[stores[$index+2].address]], [[stores[$index+2].city]], [[stores[$index+2].state]], [[stores[$index+2].pincode]]
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <a class="carousel-control" href="#carousel-location" role="button" data-slide="prev">
                        </a>
                        <a class="carousel-control" href="#carousel-location" role="button" data-slide="next">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div ng-controller="AppController" ng-init="getHomeDropdown('stores/distance', 'stores', true)" class="hidden-lg hidden-md">

            <div class="carousel-reviews">
                <div class="row">
                    <div id="carousel-location" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-4 col-xs-12" ng-if="!stores[0].ignore">
                                    <div class="see-location home_page_store_selected">
                                        <div class="work-location">
                                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                                <div class="flipper">
                                                    <div class="front">
                                                        <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center=[[stores[0].latitude]],[[stores[0].longitude]]&markers=color:red%7Clabel:C%7C[[stores[0].latitude]],[[stores[0].longitude]]&zoom=12&size=250x150&key=AIzaSyCvJWtk_wzNV_okHbec4VzbPwc4Jc9Fm68" class="img-location">
                                                        <p>
                                                            [[stores[0].name]]<br>
                                                            [[stores[0].address]], [[stores[0].city]], [[stores[0].state]], [[stores[0].pincode]]
                                                        </p>
                                                    </div>
                                                    <div class="back">
                                                        <img ng-src="[[stores[0].icon]]" class="img-location">
                                                        <p>
                                                            [[stores[0].name]]<br>
                                                            [[stores[0].address]], [[stores[0].city]], [[stores[0].state]], [[stores[0].pincode]]
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12" ng-if="!stores[1].ignore">
                                    <div class="see-location">
                                        <div class="work-location">
                                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                                <div class="flipper">
                                                    <div class="front">
                                                        <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center=[[stores[1].latitude]],[[stores[1].longitude]]&markers=color:red%7Clabel:C%7C[[stores[1].latitude]],[[stores[1].longitude]]&zoom=12&size=250x150&key=AIzaSyCvJWtk_wzNV_okHbec4VzbPwc4Jc9Fm68" class="img-location">
                                                        <p>
                                                            [[stores[1].name]]<br>
                                                            [[stores[1].address]], [[stores[1].city]], [[stores[1].state]], [[stores[1].pincode]]
                                                        </p>
                                                    </div>
                                                    <div class="back">
                                                        <img ng-src="[[stores[1].icon]]" class="img-location">
                                                        <p>
                                                            [[stores[1].name]]<br>
                                                            [[stores[1].address]], [[stores[1].city]], [[stores[1].state]], [[stores[1].pincode]]
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-xs-12" ng-if="!stores[2].ignore">
                                    <div class="see-location">
                                        <div class="work-location">
                                            <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
                                                <div class="flipper">
                                                    <div class="front">
                                                        <img ng-src="https://maps.googleapis.com/maps/api/staticmap?center=[[stores[2].latitude]],[[stores[2].longitude]]&markers=color:red%7Clabel:C%7C[[stores[2].latitude]],[[stores[2].longitude]]&zoom=12&size=250x150&key=AIzaSyCvJWtk_wzNV_okHbec4VzbPwc4Jc9Fm68" class="img-location">
                                                        <p>
                                                            [[stores[2].name]]<br>
                                                            [[stores[2].address]], [[stores[2].city]], [[stores[2].state]], [[stores[2].pincode]]
                                                        </p>
                                                    </div>
                                                    <div class="back">
                                                        <img ng-src="[[stores[2].icon]]" class="img-location">
                                                        <p>
                                                            [[stores[2].name]]<br>
                                                            [[stores[2].address]], [[stores[2].city]], [[stores[2].state]], [[stores[2].pincode]]
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control" href="#carousel-location" role="button" data-slide="prev">
                        </a>
                        <a class="carousel-control" href="#carousel-location" role="button" data-slide="next">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn-theme" href="https://justlikenew.in/stores">
                ALL STORES
            </a>
        </div>
    </div>
</section>