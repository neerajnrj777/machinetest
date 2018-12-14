<?php $sidebar = SiteHelpers::menus('sidebar') ;?>
<div id="sidebar-navigation">
    <div class="logo">
         <a href="<?php echo url('dashboard') ;?>">           
            @if(file_exists(public_path().'/uploads/images/'.config('bzbuilder.cnf_logo') ) && config('bzbuilder.cnf_logo') !='')
                <img src="{{ asset('uploads/images/'.config('bzbuilder.cnf_logo')) }}" alt="{{ config('bzbuilder.cnf_appname') }}"  />
            @else
            {{ config('bzbuilder.cnf_appname')}} 
            @endif  
        </a>    
    </div>
    <div class="sidebar-collapse">
    <nav role="navigation" class="navbar-default ">
       <ul id="sidemenu" class="nav expanded-menu">
           <?php echo \CrmLib::CRM_menu_list(); ?>
        @foreach ($sidebar as $menu)
            

             <li @if(Request::segment(1) == $menu['module']) class="active" @endif>

            @if($menu['module'] =='separator')
            <li class="separator"> <span> {{$menu['menu_name']}} </span></li>
                
            @else
                <a data-toggle="tooltip" title="{{  $menu['menu_name'] }}" data-placement="right"
                    @if($menu['menu_type'] =='external')
                        href="{{ $menu['url'] }}" 
                    @else
                        href="{{ URL::to($menu['module'])}}" 
                    @endif              
                
                 @if(count($menu['childs']) > 0 ) class="expand level-closed" @endif>
                    <i class="{{$menu['menu_icons']}}"></i> 
                    <span class="nav-label">                    
                        {{ (isset($menu['menu_lang']['title'][session('lang')]) ? $menu['menu_lang']['title'][session('lang')] : $menu['menu_name']) }}
                    </span> 
                    @if(count($menu['childs']))<span class="fa arrow"></span> @endif    
                </a> 
                @endif  
                @if(count($menu['childs']) > 0)
                    <ul class="nav nav-second-level">
                        @foreach ($menu['childs'] as $menu2)
                         <li @if(Request::segment(1) == $menu2['module']) class="active" @endif>
                            <a  
                                @if($menu2['menu_type'] =='external')
                                    href="{{ $menu2['url']}}" 
                                @else
                                    href="{{ URL::to($menu2['module'])}}"  
                                @endif                                  
                            >
                            
                            <i class="{{$menu2['menu_icons']}}"></i>
                           {{ (isset($menu2['menu_lang']['title'][session('lang')]) ? $menu2['menu_lang']['title'][session('lang')] : $menu2['menu_name']) }}
                            </a> 
                            @if(count($menu2['childs']) > 0)
                            <ul class="nav nav-third-level">
                                @foreach($menu2['childs'] as $menu3)
                                    <li @if(Request::segment(1) == $menu3['module']) class="active" @endif>
                                        <a 
                                            @if($menu['menu_type'] =='external')
                                                href="{{ $menu3['url'] }}" 
                                            @else
                                                href="{{ URL::to($menu3['module'])}}" 
                                            @endif                                      
                                        
                                        >
                                       
                                        <i class="{{$menu3['menu_icons']}}"></i> 
                                        {{ (isset($menu3['menu_lang']['title'][session('lang')]) ? $menu3['menu_lang']['title'][session('lang')] : $menu3['menu_name']) }}                                         
                                            
                                        </a>
                                    </li>   
                                @endforeach
                            </ul>
                            @endif                          
                        </li>                           
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach

    </ul>   
    </nav>
    </div>
</div>