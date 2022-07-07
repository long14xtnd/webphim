{{-- danh mục --}}

@extends('layout')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="yoast_breadcrumb hidden-xs"><span><span><a
                                        href="{{ route('homepage') }}">Trang chủ</a> » <span><a
                                            href="">Kết quả tìm kiếm với : {{ $search }}</a></span></span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            <section>
                <div class="section-bar clearfix">
                    <h1 class="section-title"><span>{{ $search }}</span></h1>
                </div>
                <div class="halim_box">
                    @foreach($movie as $key=>$mov)
                        <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-27021">
                            <div class="halim-item">
                                <a class="halim-thumb" href="{{ route('movie',['slug'=>$mov->slug,'id'=>$mov->id]) }}"
                                   title="{{ $mov->title }}">
                                    <figure><img class="lazy img-responsive"
                                                 src="{{ asset('public/uploads/movie/'.$mov->image) }}"
                                                 alt="{{ $mov->title }}" title="{{ $mov->title }}"></figure>
                                    <span class="status">
                                           @if ($mov->resolution==0)
                                            HD
                                        @elseif($mov->resolution==1)
                                            SD
                                        @elseif($mov->resolution==2)
                                            CAM
                                        @elseif($mov->resolution==3)
                                            HDCam
                                        @elseif($mov->resolution==4)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                    <span class="episode"><i class="fa fa-play"
                                                             aria-hidden="true"></i>
                                       @if($mov->phude==0)


                                            @if($mov->season!=0)
                                                Việt Sub - Season {{ $mov->season }}
                                            @else
                                                Việt Sub
                                            @endif
                                        @else
                                            @if($mov->season!=0)
                                                Thuyết minh - Season {{ $mov->season }}
                                            @else
                                                Thuyết minh
                                            @endif
                                        @endif
                                    </span>
                                    <div class="icon_overlay"></div>
                                    <div class="halim-post-title-box">
                                        <div class="halim-post-title ">
                                            <p class="entry-title">{{ $mov->title }}</p>
                                            @if($mov->eng_name )
                                                <p class="original_title">{{ $mov->eng_name }}</p>
                                            @else

                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </article>

                    @endforeach
                </div>
                <div class="clearfix"></div>
                <div class="text-center">
                    {{--                    <ul class='page-numbers'>--}}
                    {{--                        <li><span aria-current="page" class="page-numbers current">1</span></li>--}}
                    {{--                        <li><a class="page-numbers" href="">2</a></li>--}}
                    {{--                        <li><a class="page-numbers" href="">3</a></li>--}}
                    {{--                        <li><span class="page-numbers dots">&hellip;</span></li>--}}
                    {{--                        <li><a class="page-numbers" href="">55</a></li>--}}
                    {{--                        <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>--}}
                    {{--                    </ul>--}}
                    {!! $movie->links("pagination::bootstrap-4") !!}
                </div>
            </section>
        </main>
        @include('pages.include.sidebar')
    </div>
@endsection
