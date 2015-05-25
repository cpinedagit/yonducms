<header class='container-fluid header header--fixed'>
   <div class="row">
    <div class="pull-left header__logo">
       <!--Change SRC to put logo-->
       {!! HTML::image(asset('public/images/'.env('APP_LOGO')), 'CMS Logo', ['class'=>'app_logo_header']); !!}
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
      <!--   <li class="header__menu-list__messages"></li>
        <li class="header__menu-list__calendar"></li> -->
         <li class="header__menu-list__account">
            <div class="dropdown header__menu-list__account__dropdown">
              <a id="dLabel" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                <div class="circle header__menu-list__account__dropdown__icon">
                  {!! HTML::image('public/images/profile/' . \Auth()->user()->profile_pic, \Auth()->user()->username) !!}
                </div>
               <div class="header__menu-list__account__dropdown__name">
                    <!--Current user firstname-->
                    {{ \Auth()->user()->first_name }}                    
                    <i class="fa fa-chevron-down"></i>
                </div>
              </a>
              <ul class="dropdown-menu header__menu-list__account__dropdown__options" role="menu" aria-labelledby="dLabel">
              <!--Include menu content here-->
                <li class='header__menu-list__account__dropdown__options__acct-info'>
                   <div class="circle header__menu-list__account__dropdown__options_icon">
                      <!-- PUT IMAGE IF AVAILABLE -->
                      {!! HTML::image('public/images/profile/' . \Auth()->user()->profile_pic, \Auth()->user()->username) !!}
                   </div>
                    <div class="header__menu-list__account__dropdown__options_account-name">
                         {{ \Auth()->user()->first_name }}
                    </div>
                    <div class="header__menu-list__account__dropdown__options_account-email">
                         {{ \Auth()->user()->email }}
                    </div>
                </li>
               <li><a href="#">Account Settings</a></li>
               <li> {!! HTML::link('auth/logout','Log-out') !!}</li>
               <li><a href="#">Help</a></li>
              </ul>
            </div>
        </li>
    </ul>
   </div> 
</header>