<header class="header">
  <div class="top-header__inner">
    @if (has_nav_menu('top_header_menu'))
      {!! wp_nav_menu(
          [
              'theme_location'  => 'top_header_menu',
              'menu'            => 'Header',
              'container'       => 'nav',
              'container_class' => 'top-header__menu',
              'container_id'    => '',
              'menu_class'      => 'top-header__menu__list',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
              'depth'           => 0,
              'walker'          => '',
          ]
      ); !!}
    @endif

    @include( 'partials.header-search' )

  </div>
  <div class="header__inner">
      <a href="/" class="header__logo">
        <img class="header__logo__image" srcset="{{$get_header['logo']}}" alt="{{$site_name}}">
      </a>
      @if (has_nav_menu('header_menu'))
        {!! wp_nav_menu(
            [
                'theme_location'  => 'header_menu',
                'menu'            => 'Header',
                'container'       => 'nav',
                'container_class' => 'header__menu',
                'container_id'    => '',
                'menu_class'      => 'header__menu__list',
                'menu_id'         => '',
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '<span>',
                'link_after'      => '</span>',
                'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                'depth'           => 0,
                'walker'          => '',
            ]
        ); !!}
      @endif
    <div class="header__burger" id="header__burger">
      <span class="header__burger__item"></span>
      <span class="header__burger__item"></span>
      <span class="header__burger__item"></span>
      <span class="header__burger__item"></span>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div class="header__mob">

    @include( 'partials.header-search' )

    @if (has_nav_menu('header_menu'))
      {!! wp_nav_menu(
          [
              'theme_location'  => 'header_menu',
              'menu'            => 'Header',
              'container'       => 'nav',
              'container_class' => 'header__menu header__menu--mob',
              'container_id'    => '',
              'menu_class'      => 'header__menu__list',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="headerSlinky" class="%2$s">%3$s</ul>',
              'depth'           => 0,
              'walker'          => '',
          ]
      ); !!}
    @endif

    @if (has_nav_menu('top_header_menu'))
      {!! wp_nav_menu(
          [
              'theme_location'  => 'top_header_menu',
              'menu'            => 'Header',
              'container'       => '',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'header__menu__small border-bottom hideSlinky',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
              'depth'           => 0,
              'walker'          => '',
          ]
      ); !!}
    @endif

    @if (has_nav_menu('header_menu_mobile_help'))
      <h5>{{ _e( 'Need Help?' ) }}</h5>
      {!! wp_nav_menu(
          [
              'theme_location'  => 'header_menu_mobile_help',
              'menu'            => 'Header',
              'container'       => '',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'header__menu__small',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
              'depth'           => 0,
              'walker'          => '',
          ]
      ); !!}
    @endif

  </div>
  <!-- End Mobile Menu -->

</header>
