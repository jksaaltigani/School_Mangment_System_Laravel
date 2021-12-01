{{-- <div class="z_index_2 "> --}}
<div class="top_nav data_line ">
    <div class="page_links">
        <div class="container">
            <div class="row  grid_tow_col ">
                <div class="col-md-6 text-left">
                    <ul class="top_nav_ul font_we text-left">
                        <li class="top_nav_li ">
                            <a href="{{ route('how_us') }}">
                                {{ __('layout.how us') }}
                            </a>
                        </li>
                        <li class="top_nav_li">
                            <a href="{{ route('privcy') }}">
                                {{ __('layout.prvicy') }}
                            </a>
                        </li>
                        <li class="top_nav_li">
                            <a href="{{ route('contact') }}">
                                {{ __('layout.contant us') }}
                            </a>
                        </li>
                        <li class="top_nav_li">
                            <a href="{{ route('RSS') }}">
                                RSS
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 data_list_div">
                    <ul class="top_nav_ul data_list">
                        <li class="top_nav_li">
                            {{ date('Y      - ') }}
                        </li>
                        <li class="top_nav_li">
                            {{ date(' M  - ') }}
                        </li>
                        <li class="top_nav_li">
                            {{ date('D  - ') }}
                        </li>
                        <li class="top_nav_li">
                            {{ date('i') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="middle_nav">

    <div class="container">
        <div class="row align_item_center">
            <div class="col-6 search_and_meun ">
                {{-- <i class="mdi mdi-menu-up"></i> --}}
                <div class="row">
                    <div class="icons_div">
                        <i class="mdi mdi-menu"></i>
                        <span class="search_icon_in_media">
                            <i class="mdi mdi-search-web"></i>
                        </span>
                    </div>
                    <div class="serach_form_div">
                        <form action="">
                            <input type="text" palceholde='search in my web site'>
                            <span class="serach_icon">
                                <i class="mdi mdi-search-web"></i>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 website_logo">
                <img src="{{ asset('public_img/logo.png') }}" alt="page conten" class="logo_img">
            </div>
            <div class="hidden_and_show_by_click">
                <div class="search_min_midea">
                    <form action="#" method="post">
                        <input type="search" ondblclick='this.form.submit()'>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticy ">
    <div class="buttom_links">
        <ul class="links_ul">
            <div class="container">
                <li class="links_li">
                    <a href="#" class="link_a">
                        {{ __('layout.dashboard') }}
                    </a>
                    <a href="{{ route('latest_artical') }}" class="link_a">
                        {{ __('layout.latest post') }}
                    </a>
                    @foreach (GetCategory() as $category)
                        <a href="{{ route('categories', $category->id) }}" class="link_a">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </li>
        </ul>
    </div>
</div>
</div>
</div>
