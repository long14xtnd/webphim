{{-- trang chủ --}}
@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        {{--        <div class="col-xs-12 carausel-sliderWidget">--}}
        {{--            <section id="halim-advanced-widget-4">--}}
        {{--                <div class="section-heading">--}}
        {{--                    <a href="danhmuc.php" title="Phim Chiếu Rạp">--}}
        {{--                        <span class="h-text">Phim Chiếu Rạp</span>--}}
        {{--                    </a>--}}
        {{--                    <ul class="heading-nav pull-right hidden-xs">--}}
        {{--                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"--}}
        {{--                            data-widgetid="halim-advanced-widget-4" data-layout="6col"><span--}}
        {{--                                data-text="Chiếu Rạp"></span>--}}
        {{--                        </li>--}}
        {{--                    </ul>--}}
        {{--                </div>--}}
        {{--                <div id="halim-advanced-widget-4-ajax-box" class="halim_box">--}}
        {{--                    <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">--}}
        {{--                        <div class="halim-item">--}}
        {{--                            <a class="halim-thumb" href="{{ route('movie') }}" title="GÓA PHỤ ĐEN">--}}
        {{--                                <figure><img class="lazy img-responsive"--}}
        {{--                                             src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg"--}}
        {{--                                             alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>--}}
        {{--                                <span class="status">HD</span><span class="episode"><i class="fa fa-play"--}}
        {{--                                                                                       aria-hidden="true"></i>Vietsub</span>--}}
        {{--                                <div class="icon_overlay"></div>--}}
        {{--                                <div class="halim-post-title-box">--}}
        {{--                                    <div class="halim-post-title ">--}}
        {{--                                        <p class="entry-title">GÓA PHỤ ĐEN</p>--}}
        {{--                                        <p class="original_title">Black Widow</p>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </a>--}}
        {{--                        </div>--}}
        {{--                    </article>--}}


        {{--                </div>--}}
        {{--            </section>--}}
        {{--            <div class="clearfix"></div>--}}
        {{--        </div>--}}

        {{--        SLIDER PHIM HOT --}}
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 class="section-title"><span>PHIM HOT</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach($phim_hot as $key=>$hot)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie',['slug'=>$hot->slug,'id'=>$hot->id]) }}"
                               title="{{ $hot->title }}">
                                <figure><img class="lazy img-responsive"
                                             src="{{ asset('public/uploads/movie/'.$hot->image) }}"
                                             alt="{{ $hot->title }}" title="{{ $hot->title }}"></figure>
                                <span class="status">
                                    @if ($hot->resolution==0)
                                        HD
                                    @elseif($hot->resolution==1)
                                        SD
                                    @elseif($hot->resolution==2)
                                        CAM
                                    @elseif($hot->resolution==3)
                                        HDCam
                                    @elseif($hot->resolution==4)
                                        FullHD
                                    @else
                                        Trailer
                                    @endif


                                </span><span class="episode"><i class="fa fa-play" aria-hidden="true"></i>

                                    @if($hot->phude==0)


                                        @if($hot->season!=0)
                                            Việt Sub - Season {{ $hot->season }}
                                        @else
                                            Việt Sub
                                        @endif
                                    @else
                                        @if($hot->season!=0)
                                            Thuyết minh - Season {{ $hot->season }}
                                        @else
                                            Thuyết minh
                                        @endif
                                    @endif
                                </span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{ $hot->title }}
                                        @if($hot->eng_name )
                                            <p class="original_title">{{ $hot->eng_name }}</p>
                                        @else

                                        @endif

                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>

                @endforeach
            </div>

        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach($category_home as $key=>$cate_home)
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <a href="{{ route('category',$cate_home->slug) }}" title="{{ $cate_home->title }}">
                            <span class="h-text">{{ $cate_home->title }}</span>
                        </a>
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @foreach($cate_home->movie->take(12) as $key=>$movie_home)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                <div class="halim-item">
                                    <a class="halim-thumb"
                                       href="{{ route('movie',['slug'=>$movie_home->slug,'id'=>$movie_home->id]) }}">
                                        <figure><img class="lazy img-responsive"
                                                     src="{{ asset('public/uploads/movie/'.$movie_home->image) }}"
                                                     alt="{{ $movie_home->title }}" title="{{ $movie_home->title }}">
                                        </figure>
                                        <span class="status">
                                            @if ($movie_home->resolution==0)
                                                HD
                                            @elseif($movie_home->resolution==1)
                                                SD
                                            @elseif($movie_home->resolution==2)
                                                CAM
                                            @elseif($movie_home->resolution==3)
                                                HDCam
                                            @elseif($movie_home->resolution==4)
                                                FullHD
                                            @else
                                                Trailer
                                            @endif
                                        </span>
                                        <span class="episode"><i class="fa fa-play"
                                                                 aria-hidden="true"></i>
                                        @if($movie_home->phude==0)


                                                @if($movie_home->season!=0)
                                                    Việt Sub - Season {{ $movie_home->season }}
                                                @else
                                                    Việt Sub
                                                @endif
                                            @else
                                                @if($movie_home->season!=0)
                                                    Thuyết minh - Season {{ $movie_home->season }}
                                                @else
                                                    Thuyết minh
                                                @endif
                                            @endif
                                        </span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $movie_home->title }}</p>
                                                @if($movie_home->eng_name )
                                                    <p class="original_title">{{ $movie_home->eng_name }}</p>
                                                @else

                                                @endif

                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>

                        @endforeach
                    </div>
                </section>
                <div class="clearfix"></div>

            @endforeach
        </main>
        @include('pages.include.sidebar')

    </div>
@endsection
