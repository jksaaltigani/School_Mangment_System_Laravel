@extends('layouts.site')
@section('title', __('layout.project name') . ' | ' . 'الرئيسه')
@section('content')
    <div class="container">
        {{-- ######################## statrt slider section#################################### --}}
        <div class="margin_top"></div>
        <div class="grid_slider_section">
            <div class="slider_continer"></div>
            <div class="latest_post">
                <div class="latest_post_container">
                    @if (GetLatestPost()->count() > 1)
                        @foreach (GetLatestPost() as $artical)
                            <div class="latest_post_artical">
                                <div class="inline_artical">
                                    <div class="inline_img">
                                        <a href="{{ route('showpost', $artical->id) }}">
                                            <img src="{{ $artical->min_photo }}" alt="" class='inline_img_class'>
                                        </a>
                                    </div>
                                    <div class="inline_artical_description">
                                        <a href="{{ route('showpost', $artical->id) }}">
                                            <span class="inline_short_des">
                                                {{ $artical->short_des }}
                                            </span>
                                            {{ $artical->name }}
                                        </a>
                                        {{-- <h6>{{ $artical->created_at }}</h6> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        {{-- ######################## end slider section #################################### --}}


        {{-- ######################## start categoreis section ############################ --}}

        @foreach (GetCategory() as $category)
            <div class="landing_page_categoreis_div">
                <div class="margin_top"></div>
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title custom_head"> <span class="color_span"></span><span
                            class="head">{{ $category->name }}</span>
                    </h3>
                </div>
                <div class="landing_grid">
                    @foreach (getDataWIthCatId($category->id) as $artical)
                        <div>
                            <div class="artical">
                                <div class="block_artical">
                                    <div class="block_artical_img">
                                        <a href="{{ route('showpost', $artical->id) }}">
                                            <img src="{{ $artical->photo }}" alt="" class="block_artical_img_class">
                                        </a>
                                    </div>
                                    <div class="artical_descrption">
                                        <a href="{{ route('showpost', $artical->id) }}">
                                            <span class="short_des">
                                                {{ $artical->short_des }}
                                            </span>
                                            {{ $artical->name }}
                                        </a>
                                        <h6>{{ $artical->created_at }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="custom_hr_more">
                    <a href="{{ route('categories', $category->id) }}"><span
                            class='show_more'>{{ __('layout.show more') }}</span></a>
                </div>
            </div>
        @endforeach
        {{-- ##############################end silder section ######################### --}}
    </div>
@stop
