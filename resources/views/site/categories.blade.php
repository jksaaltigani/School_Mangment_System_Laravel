@extends('layouts.site');
@section('title', __('layout.project name') . ' | ' . $category->name)

@section('content')
    <div class="margin_top"></div>
    <div class="container">
        <div class="col-12 mb-2 text-right">
            <h4 class="m-2">
                <a href="{{ route('landing') }}" class="">
                    {{ __('layout.name_of_website') }}
                </a> |
                <span class="color_main custom_font">
                    {{ $category->name }}
                </span>

            </h4>
        </div>
    </div>
    <div class="grid_template_categories ">
        @foreach ($articals as $index => $artical)
            <div class="artical ">
                @if ($index < 8)
                    <div>
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
                                    {{ $artical->content }}
                                </a>
                                <h6>{{ $artical->created_at }}</h6>

                            </div>
                        </div>
                    </div>
                @else
                    <div class="inline_artical">
                        <div class="inline_img">
                            <img src="{{ $artical->min_photo }}" alt="" class='inline_img_class'>
                        </div>
                        <div class="inline_artical_description">
                            <a href="">
                                <span class="inline_short_des">
                                    {{ $artical->short_desc }}
                                </span>
                                {{ $artical->name }}
                            </a>
                            <h6>{{ $artical->created_at }}</h6>

                        </div>
                    </div>
                @endif
            </div>
        @endforeach

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
