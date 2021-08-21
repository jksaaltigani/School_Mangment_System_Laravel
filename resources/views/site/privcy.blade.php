@extends('layouts.site')
@section('title', __('layout.project name') . ' | ' . __('layout.prvicy'))
@section('content')
    <div class="container">
        <div class="margin_top"></div>
        <div class="col-12 mb-2 text-right">
            <h4 class="m-2">
                <a href="{{ route('landing') }}" class="">
                    {{ __('layout.name_of_website') }}
                </a> |
                <a href="{{ route('landing') }}" class="color_main custom_font">
                    {{ __('layout.how us') }}
                </a>
            </h4>
        </div>
    </div>
    {{-- <h3 class="text-right mr-3"> <b>{{ __('layout.home') }} </b> <i class="fa fa-chevron-left ml-2 mr-2"></i>
            <b>{{ __('layout.prvicy') }}</b>
        </h3> --}}
    <div class="margin_top_bottom">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="img_svg_des">
                    <img src="{{ asset('public_img/new_img/face.svg') }}" alt="">
                </div>
            </div>
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
        </div>
    </div>
    </div>
@stop
@section('viewsAndChose')

@endsection
