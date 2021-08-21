@extends('layouts.site')
@section('title', __('layout.project name') . ' | ' . __('layout.contant us'))


@section('content')

    <div class="container">
        <div class="margin_top"></div>
        <div class="col-12 mb-2 text-right">
            <h4 class="m-2">
                <a href="{{ route('landing') }}" class="">
                    {{ __('layout.name_of_website') }}
                </a> |
                <a href="{{ route('landing') }}" class="color_main custom_font">
                    {{ __('layout.contant us') }}
                </a>
            </h4>
        </div>

        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="desc_word text-right">
                    <h1> <span class="cl_main"> alwefage </span> aleparia</h1>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perferendis reprehenderit
                        repellat aspernatur culpa libero voluptate atque neque, perspiciatis amet mollitia ad alias
                        nisi? Quo iste pariatur adipisci error labore?
                    </p>
                    <div class="alert alert-info">the page is un from this news in side </div>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="text-left"> {{ __('layout.soical media') }}</h4>
                <div class="socil_media_box">
                    <div class="media face">
                        <div class="media_img"> <img src="{{ asset('public_img/new_img/face.svg') }}" alt="whats app"
                                title="whats app">
                        </div>
                        <div class="media_data"> mohammed@altigani.com </div>
                    </div>
                    <div class="media whats">
                        <div class="media_img "> <img src="{{ asset('public_img/new_img/tel.svg') }}" alt="whats app"
                                title="whats app">
                        </div>
                        <div class="media_data"> mohammed@altigani.com </div>
                    </div>
                    <div class="media twitter">
                        <div class="media_img"> <img src="{{ asset('public_img/new_img/twitter.svg') }}" alt="whats app"
                                title="whats app"></div>
                        <div class="media_data"> mohammed@altigani.com </div>
                    </div>
                    <div class="media email">
                        <div class="media_img"> <img src="{{ asset('public_img/new_img/email.svg') }}" alt="whats app"
                                title="whats app"></div>
                        <div class="media_data"> mohammed@altigani.com </div>
                    </div>
                    <div class="media tel">
                        <div class="media_img"> <img src="{{ asset('public_img/new_img/whats.svg') }}" alt="whats app"
                                title="whats app"></div>
                        <div class="media_data"> mohammed@altigani.com </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@section('viewsAndChose')

@endsection
