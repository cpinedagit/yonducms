<header class="header">
   <div class="container-fluid clearfix">
       <nav class="nav-holder">
           <ul class="list-unstyled header__nav-list clearfix">
              <!-- add "active" class -->
               @if(isset($objMenu))
                @foreach($objMenu as $siteMenu)

                <li>
                    @if(isset($fromHeader))
                      <a href="site/{!! $siteMenu->slug ? $siteMenu->slug : 'http://'.$siteMenu->external_link !!}">                         
                        {!! parentCssElement($siteMenu->menu_id, 'caret') !!} {!! $siteMenu->label !!}
                    </a> 
                    {!! getSubMenuSite($siteMenu->menu_id) !!}
                    @else
                      <a href="{!! $siteMenu->slug ? $siteMenu->slug : 'http://'.$siteMenu->external_link !!}"> 
                          {!! $siteMenu->label !!}
                          {!! parentCssElement($siteMenu->menu_id, 'caret') !!}
                      </a> 
                      {!! getSubMenuSite($siteMenu->menu_id) !!}
                    @endif
                    
                </li>
                @endforeach
                @endif
           </ul>
       </nav>
       <button type="button" class="tcon tcon-menu--xcross menu-toggle" aria-label="toggle menu">
          <span class="tcon-menu__lines" aria-hidden="true"></span>
          <span class="tcon-visuallyhidden">toggle menu</span>
        </button>
      
      <!-- <i class="fa fa-bars menu-toggle"></i>-->
       <h2 class="title-head">home</h2>
       
       <div class="fb-share-button pull-right" data-href="http://www.beam.com.ph/" data-layout="button" ></div>
   </div>
</header>