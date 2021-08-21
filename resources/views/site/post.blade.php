@extends('layouts.site')


@section('title', __('layout.project name') . ' | ' . $artical->name);
@section('content')
    <div class="container">
        <div class="margin_top"></div>
        <div class="content-header-left col-md-6 col-12 mb-2">
            <h3 class="content-header-title">{{ $artical->name }}</h3>
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('landing') }}">{{ __('layout.project name') }}</a>
                        </li>
                        <li class="breadcrumb-item active"> {{ $artical->name }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="show_post_grid">
            <div class="post_info">
                <div class="post_title">
                    <h1>
                        {{ $artical->name }}
                    </h1>
                    <h2>
                        {{ $artical->description }}
                    </h2>
                    <span class="short_desc">
                        {{ $artical->short_des }}
                    </span>
                </div>
                <div class="post_date">
                    <div class="views">
                        {{ __('layout.views') }}
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
            <div class="post_img">
                <img src="{{ asset('public_img/11.jpg') }}" alt="" class="post_img_class">
            </div>

        </div>
        <div class="post_info_ads">
            <div class="post_ads"></div>
            <div class='post_content'>
                <div class="margin_top"></div>
                <p> {{ $artical->content }}</p>
            </div>
        </div>
    </div>
@stop
