<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>YONDU Web Services</title>
        <meta name="description" content="">
        <!--
        This has been remove because the page is not responsive
        <meta name="viewport" content="width=device-width, initial-scale=1">-->

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->


        <link href="{{ asset('public/css/normalize.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/css/menu_cms/nestable.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">

        <script src="{{ asset('public/js/vendor/modernizr-2.8.3.min.js') }}"></script>



    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        <header class='container-fluid header header--fixed'>
            <div class="row">
                <div class="pull-left header__logo">
                    <!--Change SRC to put logo-->
                    <img src="images/sample-logo.png" alt="CMS Logo">
                </div>
                <div class="pull-left header__search">
                    <a href="#"><i class="fa fa-globe"></i> View Site</a>
                    <div class="input-group">
                        <span class="input-group-addon" id="search-icon"><i class="fa fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Search..." id="search">
                    </div>
                </div>
                <ul class="pull-right list-unstyled header__menu-list">
                    <li class="header__menu-list__notification"></li>
                    <li class="header__menu-list__messages"></li>
                    <li class="header__menu-list__calendar"></li>
                    <li class="header__menu-list__account">
                        <div class="dropdown header__menu-list__account__dropdown">
                            <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                <div class="circle header__menu-list__account__dropdown__icon">
                                    <!-- INSERT IMAGE HERE 
                                     <img src="img/sample.jpeg" alt="">-->
                                </div>
                                <div class="header__menu-list__account__dropdown__name">
                                    <!--Current user firstname-->
                                    John
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                <!--Include menu content here-->
                                <li>Account Settings</li>
                                <li>Logout</li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div> 
        </header>

        <div class="main-container">
            <section class="main-container__navigation-container">
                <div class="main-container__navigation-container__toggle">
                    <i class="fa fa-bars" id="nav-toggle"></i>
                </div>
                <div class="main-container__navigation-container__welcome">
                    <div class="circle main-container__navigation-container__welcome__icon">
                        <!-- Put image here
                        <img src="img/sample.jpeg" alt="">-->
                    </div>
                    <div class='main-container__navigation-container__welcome__name'>
                        <h4>Welcome</h4>
                        <span>John Smith</span>
                        <div class="main-container__navigation-container__welcome__name__status">
                            <small>Status</small>
                            <i class="fa fa-circle-o"></i>
                            <span class='status'>Online</span>
                        </div>
                    </div>
                </div>
                <nav class='main-container__navigation-container__navigation'>
                    <ul class="list-unstyled main-container__navigation-container__navigation__nav-list">
                        <li >
                            <a href="#1"><i class="fa fa-tachometer"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <!-- use "open" class to expand
                             use "active" class to highlight the active main menu-->
                        <li class='open active'>
                            <a href="#2"><i class="fa fa-files-o"></i>
                                <span>Pages</span>
                            </a>
                            <ul class="list-unstyled">
                                <!-- use "active" to highlight the active submenu-->
                                <li>
                                    <a href="#viewlist">View List</a>
                                </li>
                                <li>
                                    <a href="#">Add New</a>
                                </li>
                                <li class='active'>
                                    <a href="#">Manage Pages</a>
                                </li>

                            </ul>
                        </li>
                        <li >
                            <a href="#3"><i class="fa fa-flag-o"></i>
                                <span>Banner</span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">View Banner</a>
                                </li>
                                <li>
                                    <a href="#">Add Banner</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#4"><i class="fa fa-newspaper-o"></i>
                                <span>News</span>
                            </a>
                        </li>
                        <li>
                            <a href="#5"><i class="fa fa-picture-o"></i>
                                <span>Media</span>
                            </a>
                        </li>
                        <li>
                            <a href="#6"><i class="fa fa-list-alt"></i>
                                <span>Modules</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sliders"></i>
                                <span>Editor</span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#5"><i class="fa fa-users"></i>
                                <span>Users</span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </li>
                        <li>    
                            <a href="#"><i class="fa fa-cogs"></i>
                                <span>Settings</span>
                            </a>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                                <li>
                                    <a href="#">Settings</a>
                                </li>
                            </ul>
                        </li>       
                    </ul>
                </nav>
            </section>
            <main class="container-fluid main-container__content">
                <div class='main-container__content__title'>
                    <h2>Pages</h2>
                </div>
                <div class="main-container__content__breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Manage Pages</li>
                    </ol>
                </div>
                <div class='main-container__content__info'>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default panel--custom">
                                <div class="panel-heading"><h4>Menu Structure</h4></div>
                                <div class="panel-body">
                                    <div class="panel-body__instruction">
                                        Drag each item into the order you prefer, or add a new menu
                                    </div>
                                    <div class="cf nestable-lists">
                                        <div class="dd" id="nestable">
                                            <ol class="dd-list">

                                                @if(isset($objMenu))
                                                @foreach($objMenu as $menu)
                                                <li id="idli_{{ $menu->menu_id }}" class="dd-item" data-menu_id="{{ $menu->menu_id }}" data-page_id="{{ $menu->page_id }}" data-parent_id="{{ $menu->parent_id }}" data-label="{{ $menu->label }}">
                                                    <div class="dd-handle" id="target_{{ $menu->menu_id }}">{{ $menu->label }} </div>
                                                    <button class='circle btn--remove-menu' onclick="delThis({{ $menu->menu_id }})"></button>
                                                    {!! getSubMenu($menu->menu_id) !!}
                                                </li>
                                                @endforeach
                                                @endif

                                            </ol>
                                        </div>
                                    </div>

                                    <form id="structure_menu" name="structure_menu">

                                        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                                        <input type="hidden" name="nestable-output" id="nestable-output">
                                    </form>

                                    {!! Form::submit('Save', array('class'=>'btn btn-add center-block', 'id' => 'saveMenuStructure')) !!}


                                </div>
                                <div class="alert alert-success" style="display: none" id="alertSaveData">
                                    Data Save :D
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="panel panel-default panel--custom main-container__content__info__properties">         

                                        <div class="panel-heading"><h4>Properties</h4></div>
                                        <div class="panel-body">
                                            <div class="panel-body__instruction">
                                                Click on a menu item to edit the properties
                                            </div>
                                            <div class="panel-body__textbox-holder">

                                                <form id="menu_form" name="menu_form">

                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                                    <input type="hidden" name="menu_id" class="form-control"  id="menu_id">
                                                    <input type="text"  name="menu_label" class="form-control" placeholder="Title" readonly="true" id="menu_label">
                                                    <input type="text" class="form-control" placeholder="Link" readonly id='menu-link'>                                    
                                                </form>
                                                <br>


                                                <button id="saveMenuChanges" disabled="true" class="btn btn-add">Apply Changes</button>
                                                <button class="btn btn-warning" disabled="true" id='clear_btn' onclick="autoClear()">Cancel</button>
                                            </div>

                                        </div>

                                    </div>


                                </div>
                                
                            </div>
                             
                            <div class="row">
                                <div class="main-container__content__info__tabpanel col-sm-8 center-block">
                                    <div role="tabpanel" class="center-block">

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#pages" aria-controls="home" role="tab" data-toggle="tab">Pages</a></li>
                                            <li role="presentation"><a href="#links" aria-controls="profile" role="tab" data-toggle="tab">Links</a></li>

                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane tab-pages active" id="pages">
                                                <input type="text" class='form-control' placeholder="Search page">
                                                <div class="page-list-holder">
                                                    <ol class="list-unstyled">

                                                        @if(isset($objPage))
                                                        @foreach($objPage as $pages)
                                                        <li>                                                                                                                                                             <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> {{ $pages->title }}
                                                                </label>
                                                            </div>
                                                        </li>

                                                        @endforeach
                                                        @endif
 
                                                    </ol>
                                                </div>
                                                <div class="btn-holder">
                                                    <button class="btn btn-add">Select All</button>
                                                    <button class="btn btn-add">Add to Navigation</button>
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="links">
                                                <div class="textbox-holder">
                                                    <input type="text" class="form-control" placeholder="URL">
                                                    <input type="text" class="form-control" placeholder="Navigation Label">
                                                </div>

                                                <button class="btn btn-add pull-right pull-bottom-right">Add to Navigation</button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                           
                        </div>
                    </div>
            </main>

        </div>
        <footer class='footer footer--fixed'>
            <small class='copyright'>&copy; 2015 Yondu Website Service</small>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')</script>

        <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('public/js/menu_cms/jquery.nestable.js') }}"></script>
        <script src="{{ asset('public/js/main.js') }}"></script>
        <script src="{{ asset('public/js/menu_cms/menu_app.js') }}"></script>

        <script type="text/javascript">
$('#saveMenuChanges').on('click', function () {
    var data = $("#menu_form").serialize();
    $.ajax({
        type: 'POST',
        url: "{!! URL::route('updatetitle') !!}",
        data: data,
        success: function () {
            data_id = $('#menu_id').val();
            $("div #target_" + data_id).html($('#menu_label').val());
            autoClear();
        },
        error: function () { // if error occured
            alert("Error: select menu and try again");
        },
    });
});


$('#saveMenuStructure').on('click', function () {
    var data = $("#structure_menu").serialize();
    $.ajax({
        type: 'POST',
        url: "{!! URL::route('admin.menu.store') !!}",
        data: data,
        success: function () {
            $("#alertSaveData").show().delay(1000).fadeOut();
        },
        error: function () { // if error occured
            alert("Error: try again");
        },
    });
});

function autoClear() {
    $('#menu_id').val('');
    $('#menu_label').val('');

    $('#saveMenuChanges').attr('disabled', true);
    $('#menu_label').attr('readonly', true);
    $("#clear_btn").attr('disabled', true);


}

function delThis(idMenu){
    autoClear();

    if(confirm('this action will effect to db permanently, are you sure of this? if yes, why? . .. . . to be continued on May 18, 2015')){
            $( "#idli_"+idMenu ).remove();
    }
    }
        </script>  

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <!--<script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>-->
    </body>
</html>
