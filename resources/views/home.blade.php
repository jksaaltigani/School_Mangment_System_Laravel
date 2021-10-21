@extends('layouts.site')
@section('title', __('layout.project name') . ' | ' . 'الرئيسه')
@section('content')
    <div class="container">
        {{-- ######################## statrt slider section#################################### --}}
        <div class="margin_top"></div>
        <div class="grid_slider_section">
            <div class="slider_continer">
                <div class="slider_continer">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="{{ asset('articals/1/3hPJvLXpinw35s3q1COu7boa8eVJxTVtuVVmDEyj.png') }}"
                                    data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide"
                                    alt="First slide" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>
                                    <h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3>
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="{{ asset('articals/1/3hPJvLXpinw35s3q1COu7boa8eVJxTVtuVVmDEyj.png') }}"
                                    data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide"
                                    alt="Second slide" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>
                                    <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h3>
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100"
                                    src="{{ asset('articals/1/3hPJvLXpinw35s3q1COu7boa8eVJxTVtuVVmDEyj.png') }}"
                                    data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide"
                                    alt="Third slide" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Third slide label</h5>
                                    <p>
                                    <h3>Praesent commodo cursus magna, vel scelerisque nisl consectetur. </h3>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="latest_post">
                <div class="latest_post_container">
                    @if ($leatest_post->count() > 1)
                        @foreach ($leatest_post as $artical)
                            <div class="latest_post_artical">
                                <div class="inline_artical">
                                    <div class="inline_img">
                                        <a href="{{ route('show_artical', $artical->id) }}">
                                            <img src="{{ $artical->min_photo }}" alt="" class='inline_img_class'>
                                        </a>
                                    </div>
                                    <div class="inline_artical_description">
                                        <a href="{{ route('show_artical', $artical->id) }}">
                                            @if ($artical->short_desc != null)
                                                <span class="inline_short_des">
                                                    {{ $artical->short_desc }}
                                                </span>
                                            @endif
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

        @foreach ($categories as $category)
            <div class="landing_page_categoreis_div">
                <div class="margin_top"></div>
                <div class="col-md-12 col-12 mb-2">
                    <h3 class="custom_head">
                        <span>{{ $category['name'] }}</span>
                        {{-- <span class=" custom_head_name
                                        text-right">
                                        <span class='z_index'>{{ $category['name'] }}</span>


                                        <span></span>
                                        </span> --}}
                    </h3>
                </div>
                <div class="landing_grid">
                    @foreach ($category['articals'] as $artical)
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
                    <a href="{{ route('categories', $category['id']) }}"><span
                            class='show_more'>{{ __('layout.show more') }}</span></a>
                </div>
            </div>
        @endforeach
        {{-- ##############################end silder section ######################### --}}
    </div>
@stop
