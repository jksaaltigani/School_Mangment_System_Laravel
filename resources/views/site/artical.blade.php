@extends('layouts.site')
@section('title', __('layout.project name') . ' | ' . $artical->name);
@section('main_color', 'gray')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/site/showpost.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="margin_top"></div>
        <div class="col-12 mb-2 text-right">
            <h4 class="m-2">
                <a href="{{ route('landing') }}" class="">
                    {{ __('layout.name_of_website') }}
                </a> |
                <a href="{{ route('landing') }}" class="color_main">
                    {{ $category->name }}
                </a> |
                <span class="custom_font">{{ $artical->name }}</span>
            </h4>
        </div>
        <div class="show_post_grid mt-5">
            <div class="post_img">
                <img src="{{ $artical->photo }}" alt="" class="post_img_class">
            </div>
            <div class="post_info">
                <div class="post_title">
                    <h1>
                        {{ $artical->name }}
                    </h1>
                    <h2>
                        {{ $artical->description }}
                    </h2>
                    @if ($artical->short_desc != null)
                        <span class="short_desc">
                            {{ $artical->short_desc }}
                        </span>
                    @endif
                </div>
                <div class="post_date">
                    <div class="views">
                        <i class="mdi mdi-eye"></i>
                    </div>
                    <div>
                        {{ $artical->view + 1000 }}
                    </div>
                    <div class="created_at">{{ __('layout.created done') }}</div>
                    <div class="date">
                        <h6 class='date'>{{ $artical->created_at }}</h6>
                    </div>
                    <div class="updated_at"> {{ __('layout.updated at') }} <i class="ion-eye"></i></div>
                    <div class="date">
                        <h6 class='date'>{{ $artical->created_at }}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="post_info_ads">
            <div class="pupular_articals">
                <h4 class="custom_head">
                    <span>
                        <span>
                            <i class="angle fe fe-chevron-left"></i>
                        </span>
                        {{ __('layout.watch too') }}
                    </span>
                </h4>
                @if ($watch_to->count() > 1)
                    @foreach ($watch_to as $artical)
                        <div class="latest_post_artical">
                            <div class="inline_artical">
                                <div class="inline_img">
                                    <a href="{{ route('show_artical', $artical->id) }}">
                                        <img src="{{ $artical->min_photo }}" alt="" class='inline_img_class'>
                                    </a>
                                </div>
                                <div class="inline_artical_description">
                                    <a href="{{ route('show_artical', $artical->id) }}">
                                        <span class="inline_short_des">
                                            {{ $artical->short_desc }}
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
            <div class='post_content'>
                <div class="margin_top"></div>
                <p> {{ $artical->content }}</p>
            </div>
            <div class="post_ads"></div>
        </div>
        <div class="wirter_chose">
            <h4 class="custom_head">
                <span>
                    <span>
                        <i class="angle fe fe-chevron-left"></i>
                    </span>
                    {{ __('layout.wirter chose') }}
                </span>
            </h4>
            <div class="gird_wirter_chose">
                @foreach ($wirter_chsose as $artical)
                    <div>
                        <div class="artical">
                            <div class="block_artical">
                                <div class="block_artical_img">
                                    <a href="{{ route('show_artical', $artical->id) }}">
                                        <img src="{{ $artical->photo }}" alt="" class="block_artical_img_class">
                                    </a>
                                </div>
                                <div class="artical_descrption">
                                    <a href="{{ route('show_artical', $artical->id) }}">
                                        <span class="short_des">
                                            {{ $artical->short_desc }}
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
        </div>

        <div class="pupular_view">
            <h4 class="custom_head">
                <span>
                    <span>
                        <i class="angle fe fe-chevron-left"></i>
                    </span>
                    {{ __('layout.pupular view') }}
                </span>
            </h4>
            <div class="landing_grid">
                @foreach ($pupular_view as $artical)
                    <div>
                        <div class="artical">
                            <div class="block_artical">
                                <div class="block_artical_img">
                                    <a href="{{ route('show_artical', $artical->id) }}">
                                        <img src="{{ $artical->photo }}" alt="" class="block_artical_img_class">
                                    </a>
                                </div>
                                <div class="artical_descrption">
                                    <a href="{{ route('show_artical', $artical->id) }}">
                                        <span class="short_des">
                                            {{ $artical->short_desc }}
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
        </div>
    </div>
@stop
