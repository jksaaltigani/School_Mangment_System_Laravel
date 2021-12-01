@extends('layouts.site')
@section('title', __('layout.project name') . ' | ' . __('layout.latest post'))
@section('content')
    <div class="container">
        <div class="margin_top"></div>
        <div class="container">
            <div class="col-12 mb-2 text-right">
                <h4 class="m-2">
                    <a href="{{ route('landing') }}" class="">
                        {{ __('layout.name_of_website') }}
                    </a> |
                    <a href="{{ route('landing') }}" class="color_main custom_font">
                        {{ __('layout.latest post') }}
                    </a>
                </h4>
            </div>
            <div class="grid_template_categories ">
                @foreach ($articals as $index => $artical)
                    <div class="artical ">
                        @if ($index < 8)
                            <div>
                                <div class="block_artical">
                                    <div class="block_artical_img">
                                        <a href="{{ route('show_artical', $artical->slug) }}">
                                            <img src="{{ $artical->photo }}" alt="" class="block_artical_img_class">
                                        </a>
                                    </div>
                                    <div class="artical_descrption">
                                        <a href="{{ route('show_artical', $artical->slug) }}">
                                            <span class="short_des">
                                                {{ $artical->short_desc }}
                                            </span>
                                            {{ $artical->name }}
                                        </a>
                                        <h6>{{ $artical->created_at->diffForHumans() }}</h6>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="inline_artical">
                                <div class="inline_img">
                                    <img src="{{ $artical->photo }}" alt="" class='inline_img_class'>
                                </div>
                                <div class="inline_artical_description">
                                    <a href="">
                                        <span class="inline_short_des">
                                            {{ $artical->short_desc }}
                                        </span>

                                        {{ $artical->name }} </a>
                                    <h6>{{ $artical->created_at }}</h6>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            {{ $articals->links() }}
        </div>
    </div>
@stop
