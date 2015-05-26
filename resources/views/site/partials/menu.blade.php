<div class="masthead masthead--custom home-container">
    <div class="inner">
        {!! HTML::image('public/site/images/sample-main-logo.png','',array('class' => 'img-responsive logo-mini')) !!}
        <div class="home-container__navigation pull-right tcon tcon-menu--xcross" id="togglenav">
            <span class="tcon-menu__lines" aria-hidden="true"></span>
            <span class="tcon-visuallyhidden">toggle menu</span>
            <!-- <i class="fa fa-bars" id="togglenav"></i>-->
        </div>
        <nav>
            <ul class="nav masthead-nav">
            @if(isset($objMenu))
            @foreach($objMenu as $siteMenu)

              <li {!! parentElement($siteMenu->menu_id, 'dropdown') !!} >
                  <a href="{!! $siteMenu->slug ? $siteMenu->slug : 'http://'.$siteMenu->external_link !!}"> 
                <span class="link-title">{!! $siteMenu->label !!}</span> 
                {!! parentElement($siteMenu->menu_id, 'caret') !!}
                </a> 
                {!! getSubMenuSite($siteMenu->menu_id) !!}
              </li>
              @endforeach
              @endif
            </ul>
        </nav>
    </div>
</div>