{{-- @todo extends admin.layouts.default template --}}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <base href="">
  <meta charset="utf-8"/>
  <title>Protavel Admin</title>
  <meta name="description" content="Updates and statistics">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!--begin::Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
  <!--end::Fonts -->
  
  <!--begin::Page Vendors Styles(used by this page) -->
  <link href="{{ asset('1') }}" rel="stylesheet" type="text/css"/>
  <!--end::Page Vendors Styles -->
  
  <!--begin::Global Theme Styles(used by all pages) -->
  <link href="{{ asset('assets/metronic/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
  <!--end::Global Theme Styles -->
  
  <!--begin::Layout Skins(used by all pages) -->
  <link href="{{ asset('assets/metronic/css/skins/header/base/dark.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/metronic/css/skins/header/menu/dark.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/metronic/css/skins/brand/dark.css') }}" rel="stylesheet" type="text/css"/>
  <link href="{{ asset('assets/metronic/css/skins/aside/dark.css') }}" rel="stylesheet" type="text/css"/>
  <!--end::Layout Skins -->
  
  <link rel="shortcut icon" href="{{ asset('assets/metronic/media/logos/favicon.ico') }}"/>
</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
  <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
      <a href=""><img alt="Logo" src="{{ asset('assets/metronic/media/logos/logo-light.png') }}"/></a>
    </div>
    <div class="kt-header-mobile__toolbar">
      <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
      <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
      <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
    </div>
  </div>
  
  <div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
      <!-- Nav -->
      <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
        <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
          <div class="kt-aside__brand-logo">
            <a href="">
              <img alt="Logo" src="{{ asset('assets/metronic/media/logos/logo-light.png') }}"/>
            </a>
          </div>
          <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
                  </g>
                </svg>
              </span>
              <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"/>
                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/> </g>
                </svg>
              </span>
            </button>
          </div>
        </div>

        <!-- Nav -->
        <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
          <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
              
            </ul>
          </div>
        </div>
      </div>
      
      <!-- MainBody -->
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
        <!-- Header -->
        <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
          <!--
          <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
          -->
      
          <!-- begin:: Header Menu -->
          <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
              <ul class="kt-menu__nav ">
                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel">
                  <a href="/" target="_blank" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">前台</span><i class="kt-menu__ver-arrow la la-external-link"></i>
                  </a>
                </li>
                <li class="kt-menu__item kt-menu__item--submenu kt-menu__item--rel">
                  <a href="/" target="_blank" class="kt-menu__link kt-menu__toggle">
                    <span class="kt-menu__link-text">获取帮助</span><i class="kt-menu__ver-arrow la la-external-link"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
      
          <!-- begin:: Header Topbar -->
          <div class="kt-header__topbar">
            <!--begin: Search -->
            <div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
              <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
                  <span class="kt-header__topbar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                      </g>
                    </svg> </span>
              </div>
              <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
                <div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
                  <form method="get" class="kt-quick-search__form">
                    <div class="input-group">
                      <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
                      <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
                      <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
                    </div>
                  </form>
                  <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">
                  </div>
                </div>
              </div>
            </div>
        
            <!--begin: User Bar -->
            <div class="kt-header__topbar-item kt-header__topbar-item--user">
              <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
                <div class="kt-header__topbar-user">
                  <span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
                  <span class="kt-header__topbar-username kt-hidden-mobile">Sean</span>
                  <img class="kt-hidden" alt="Pic" src="{{ asset('assets/metronic/media/users/300_25.jpg') }}" />
              
                  <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                  <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">S</span>
                </div>
              </div>
              <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">
            
                <!--begin: Head -->
                <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(/assets/metronic/media/misc/bg-1.jpg)">
                  <div class="kt-user-card__avatar">
                    <img class="kt-hidden" alt="Pic" src="{{ asset('assets/metronic/media/users/300_25.jpg') }}" />
                
                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success">S</span>
                  </div>
                  <div class="kt-user-card__name">
                    Sean Stone
                  </div>
                  <div class="kt-user-card__badge">
                    <span class="btn btn-success btn-sm btn-bold btn-font-md">超级管理员</span>
                  </div>
                </div>
            
                <!--begin: Navigation -->
                <div class="kt-notification">
                  <a href="{{ '#' }}" class="kt-notification__item">
                    <div class="kt-notification__item-icon">
                      <i class="flaticon2-calendar-3 kt-font-success"></i>
                    </div>
                    <div class="kt-notification__item-details">
                      <div class="kt-notification__item-title kt-font-bold">
                        My Profile
                      </div>
                      <div class="kt-notification__item-time">
                        Account settings and more
                      </div>
                    </div>
                  </a>
                  <div class="kt-notification__custom kt-space-between">
                    <a href="{{ ('#') }}" class="btn btn-label btn-label-brand btn-sm btn-bold">退出</a>
                    <a class="btn btn-clean btn-sm btn-bold">欢迎登录</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
        <!-- Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
          <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
              <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">登录</h3>
              </div>
              <div class="kt-subheader__toolbar">
                
              </div>
            </div>
          </div>
          
          <div class="kt-container  kt-grid__item kt-grid__item--fluid">
            <div class="row">
              <div class="col-md-6">
              <div class="kt-portlet__body kt-portlet__body--fit">
                  <form class="kt-form kt-form--label-right" method="post" action="{{ route('admin.hack.login') }}">

                    {{-- @todo 代码缩进 --}}
                  <div class="form-group">
                    <label></label>
                    <div class="kt-checkbox-inline">
                      @foreach ($admins as $id=>$name)
                      <label class="kt-checkbox">
                        <input type="radio" name="login_user" 
                          @if($login_user && $login_user->id == $id)
                            checked="checked"
                          @endif
                         value="{{ $id }}"> {{ $name }}
                        
                        {{-- @todo
                        <input type="radio" name="login_user" {{ ($login_user && $login_user->id == $id) ? 'checked' : '' }} value="{{ $id }}"> {{ $name }}
                        --}}
                        <span></span>
                      </label>
                      @endforeach
                    </div>
                    
                  </div>

                  {{ csrf_field() }}
                  <span class="form-text text-muted"><button type="submit" class="btn btn-success px-4">登录</button></span>
                  </form>
                </div>
            </div>
          </div>
        </div>
    
        <!-- Footer -->
        <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
          <div class="kt-container  kt-container--fluid ">
            <div class="kt-footer__copyright">
              2019&nbsp;&copy;&nbsp;<a href="http://keenthemes.com/metronic" target="_blank" class="kt-link">Protavel</a>
            </div>
            <div class="kt-footer__menu">
              <a href="#" target="_blank" class="kt-footer__menu-link kt-link">About</a>
              <a href="#" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
              <a href="#" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scrolltop -->
  <div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
  </div>

  <!-- begin::Global Config(global config for global JS sciprts) -->
  <script>
    var KTAppOptions = {
      "colors": {
        "state": {
          "brand": "#5d78ff",
          "dark": "#282a3c",
          "light": "#ffffff",
          "primary": "#5867dd",
          "success": "#34bfa3",
          "info": "#36a3f7",
          "warning": "#ffb822",
          "danger": "#fd3995"
        },
        "base": {
          "label": [
            "#c5cbe3",
            "#a1a8c3",
            "#3d4465",
            "#3e4466"
          ],
          "shape": [
            "#f0f3ff",
            "#d9dffa",
            "#afb4d4",
            "#646c9a"
          ]
        }
      }
    };
  </script>
  <!-- end::Global Config -->

  <!--begin::Global Theme Bundle(used by all pages) -->
  <script src="{{ asset('assets/metronic/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/metronic/js/scripts.bundle.js') }}" type="text/javascript"></script>
  <!--end::Global Theme Bundle -->

  <!--begin::Page Vendors(used by this page) -->
  <script src="{{ asset('assets/metronic/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
  <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
  <script src="{{ asset('assets/metronic/plugins/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
  <!--end::Page Vendors -->

  <!--begin::Page Scripts(used by this page) -->
  <script src="{{ asset('assets/metronic/js/pages/dashboard.js') }}" type="text/javascript"></script>
  <!--end::Page Scripts(used by this page) -->
</body>
</html>
