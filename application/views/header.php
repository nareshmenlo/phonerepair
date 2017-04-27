<!doctype html>
<html class="no-js" lang="" ng-app="app">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="" />

    <meta name="description" content="Online booking in India. ✓ Fix Display, Battery Issues ✓ Get Replacement Parts ✓ Diagnostic etc">
    <meta name="keywords" content="">

    <meta name="robots" content="noodp">

    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home | JustLikeNew">

    <meta name="og:description" content="Online booking in India. ✓ Fix Display, Battery Issues ✓ Get Replacement Parts ✓ Diagnostic etc">

    <meta property="og:image" content="">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="JustLikeNew">
    <meta property="fb:app_id" content=""/>

    <title>Home | Company name</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link media="all" type="text/css" rel="stylesheet" href="https://justlikenew.in/css/vendor.css?v=0.0.10">
    <link media="all" type="text/css" rel="stylesheet" href="https://justlikenew.in/css/app.css?v=0.0.10">

        <link rel="shortcut icon" href="https://justlikenew.in/img/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700|Source+Sans+Pro:100,300,400,600,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Montserrat:400,700|Josefin+Sans:300i,400" rel="stylesheet">

    <link href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css" rel="stylesheet">
    
    <base href="/" />

</head>

<body class="hold-transition sidebar-mini">
<header class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 col-xs-12">
                <a href="https://justlikenew.in" class="header-logo">
                    <img src="https://justlikenew.in/img/justlikenew-logo.png" class="img-responsive">
                </a>
            </div>
            <div class="col-sm-4 col-xs-12 no-padding-sm">
                <div class="header-right">
                    <ul class="list-inline">
                        <li>
                            <a href="https://justlikenew.in/booking/repair">
                                Repair
                            </a>
                        </li>
                                                <li>
                            <a ng-click="openPopup('page', 'signin', 'signup', 'popup_sign_in')">
                                Track
                            </a>
                        </li>
                                                
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Help<span class="caret" style="margin-left: 10px;
                            "></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="https://justlikenew.in/about">About Us</a></li>
                            <li><a href="https://justlikenew.in/contact">Contact Us</a></li>
                            <li><a href="https://justlikenew.in/career">Careers</a></li>
                            <li><a href="https://justlikenew.in/faqs">Faq</a></li>
                        </ul>
                        </li>
                            <li>
                            <a href="https://justlikenew.in/business">
                                Corporate
                            </a>
                        </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-4 col-xs-12" id="search_block" click-off="Search.showAction = false" ng-controller="SearchController as Search">
            <div class="search-btn">
                <input type="text" class="search-input" id="search-input" name="search" placeholder="Search" ng-model="Search.search_input" ng-change="Search.getSearchData('devices/search?k=', Search.search_input)" >
                <i class="fa fa-search" aria-hidden="true"></i>
                <div class="hide_element" custominit ng-if="Search.showAction">
                    <ul class="search-result">
                        <li ng-repeat="search in Search.results | filter: search_result">
                            <a ng-href="[[ root + '/booking/repair/' + search.device_id + '/' + search.model_id ]]">
                                [[search.model]]
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-2 col-xs-12 no-padding-sm">
            <nav class="header-navigation navbar-collapse collapse text-right">
                <ul class="list-unstyled list-inline no-margin">
                    <li class="nav-item">
                                                <div class="btn-header">
                            <ul class="list-inline no-margin">
                                <li class="nav-item">
                                    <a class="btn-theme-header"  data-toggle="modal" data-target="#loginModal" >
                                        Log In
                                    </a>
                                </li>
                            </ul>
                        </div>
                                            </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
</header>