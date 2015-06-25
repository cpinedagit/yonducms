<div id="fb-root"></div>
<script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=1480129802245390";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<header class="header">
   <div class="container clearfix">
       <nav>
           <ul class="list-unstyled header__nav-list clearfix">
              <!-- add "active" class -->
                
                @if(isset($objMenu))
                @foreach($objMenu as $siteMenu)

                <li>
                    @if(isset($fromHeader))
                      <a href="site/{!! $siteMenu->slug ? $siteMenu->slug : 'http://'.$siteMenu->external_link !!}"> 
                        {!! $siteMenu->label !!}
                        {!! parentCssElement($siteMenu->menu_id, 'caret') !!}
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
       <div class="fb-share-button pull-right" data-href="http://www.beam.com.ph/" data-layout="button"></div>
    </div>
 </header>