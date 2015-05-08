<header class='container-fluid header header--fixed'>
   <div class="row">
    <div class="pull-left header__logo">
       <!--Change SRC to put logo-->
        <img src="{{ asset('public/img/sample-logo.png') }}" alt="CMS Logo">
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
                <div class="circle header__menu-list__account__dropdown__icon"></div>
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