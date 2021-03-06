<aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Phim sắp chiếu</span>

            </div>
        </div>
        {{--                Sidebar trending --}}
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">

                    @foreach($movie_trailer as $key=>$mov_trailer)
                        <div class="item post-37176">
                            <a href="{{ route('movie',['slug'=>$mov_trailer->slug,'id'=>$mov_trailer->id]) }}"
                               title="{{ $mov_trailer->title }}">
                                <div class="item-link">
                                    <img
                                        src="{{ asset('public/uploads/movie/'.$mov_trailer->image) }}"
                                        class="lazy post-thumb" alt="{{ $mov_trailer->title }}"
                                        title="{{ $mov_trailer->title }}"/>
                                    <span class="is_trailer">
                                         @if ($mov_trailer->resolution==0)
                                            HD
                                        @elseif($mov_trailer->resolution==1)
                                            SD
                                        @elseif($mov_trailer->resolution==2)
                                            CAM
                                        @elseif($mov_trailer->resolution==3)
                                            HDCam
                                        @elseif($mov_trailer->resolution==4)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $mov_trailer->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                      style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>


        {{--end sidebar trending--}}
    </div>
    <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Trending</span>

            </div>
        </div>
        {{--                Sidebar trending --}}
        <section class="tab-content">
            <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                <div class="halim-ajax-popular-post-loading hidden"></div>
                <div id="halim-ajax-popular-post" class="popular-post">

                    @foreach($phimhot_sidebar as $key=>$hot_sidebar)
                        <div class="item post-37176">
                            <a href="{{ route('movie',['slug'=>$hot_sidebar->slug,'id'=>$hot_sidebar->id]) }}"
                               title="{{ $hot_sidebar->title }}">
                                <div class="item-link">
                                    <img
                                        src="{{ asset('public/uploads/movie/'.$hot_sidebar->image) }}"
                                        class="lazy post-thumb" alt="{{ $hot_sidebar->title }}"
                                        title="{{ $hot_sidebar->title }}"/>
                                    <span class="is_trailer">
                                         @if ($hot_sidebar->resolution==0)
                                            HD
                                        @elseif($hot_sidebar->resolution==1)
                                            SD
                                        @elseif($hot_sidebar->resolution==2)
                                            CAM
                                        @elseif($hot_sidebar->resolution==3)
                                            HDCam
                                        @elseif($hot_sidebar->resolution==4)
                                            FullHD
                                        @else
                                            Trailer
                                        @endif
                                    </span>
                                </div>
                                <p class="title">{{ $hot_sidebar->title }}</p>
                            </a>
                            <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                            <div style="float: left;">
                                <span class="user-rate-image post-large-rate stars-large-vang"
                                      style="display: block;/* width: 100%; */">
                                    <span style="width: 0%"></span>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="clearfix"></div>
        <div class="section-bar clearfix">
            <div class="section-title">
                <span>Top View</span>

            </div>
        </div>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#ngay" role="tab"
                   aria-controls="pills-home" aria-selected="true">Ngày</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#tuan" role="tab"
                   aria-controls="pills-profile" aria-selected="false">Tuần</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#thang" role="tab"
                   aria-controls="pills-contact" aria-selected="false">Tháng</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="ngay" role="tabpanel"
                 aria-labelledby="pills-home-tab">
                <div class="item post-37176">
                    <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                        <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                 class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                 title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"/>
                            <span class="is_trailer">Trailer</span>
                        </div>
                        <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                    <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang"
                                       style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="tuan" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="item post-37176">
                    <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                        <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                 class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                 title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"/>
                            <span class="is_trailer">Trailer</span>
                        </div>
                        <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                    <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang"
                                       style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="thang" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="item post-37176">
                    <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                        <div class="item-link">
                            <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                 class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                 title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"/>
                            <span class="is_trailer">Trailer</span>
                        </div>
                        <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                    </a>
                    <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                    <div style="float: left;">
                                 <span class="user-rate-image post-large-rate stars-large-vang"
                                       style="display: block;/* width: 100%; */">
                                 <span style="width: 0%"></span>
                                 </span>
                    </div>
                </div>
            </div>
        </div>


        {{--end sidebar trending--}}
    </div>

</aside>

