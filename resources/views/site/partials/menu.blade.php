<header class="header">
   <div class="container clearfix">
       <nav>
           <ul class="list-unstyled header__nav-list clearfix">
              <!-- add "active" class -->
                
                @if(isset($objMenu))
                @foreach($objMenu as $siteMenu)

                <li>
                    <a href="{!! $siteMenu->slug ? $siteMenu->slug : 'http://'.$siteMenu->external_link !!}"> 
                        {!! $siteMenu->label !!}
                        {!! parentCssElement($siteMenu->menu_id, 'caret') !!}
                    </a> 
                    {!! getSubMenuSite($siteMenu->menu_id) !!}
                </li>
                @endforeach
                @endif
                
           </ul>
       </nav>
       <div class="fb-share-button pull-right" data-href="http://www.beam.com.ph/" data-layout="button"></div>
    </div>
 </header>