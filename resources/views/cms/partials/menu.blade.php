
<nav class='main-container__navigation-container__navigation'>
    <ul class="list-unstyled main-container__navigation-container__navigation__nav-list">

    @foreach(modules() as $module)
    
      @if(!empty($module->module_path))


      @foreach(accesses(Auth()->user()->role_id) as $access)
          
        @if($module->id == $access->module_id && $access->isactive == 1)      

            <li class="{!! ((Session::get('module') == $module->module_path) ? 'open active' : '') !!}">
               
               <a href="{!! URL::route($module->module_path) !!}">
                  <i class="fa {!! $module->module_icon !!}"></i>
                    <span>{!! $module->module_name !!}</span>
               </a>

                <!-- Submenu section  -->
                <ul class="list-unstyled">
                    
                  @foreach(submenus() as $submenu)

                    @if($submenu->module_id == $module->id && !empty($submenu->submenu_path))

                      <li class="{!! ((Session::get('submenu') == $submenu->submenu_path) ? 'active' : '') !!}">

                        <a href="{!! URL::route($submenu->submenu_path) !!}">
                           {!! $submenu->submenu_name !!}
                        </a>

                      </li>

                    @endif

                  @endforeach

                 </ul>

           </li>   

           @endif

        @endforeach

       @endif

    @endforeach

   </ul>
</nav>
