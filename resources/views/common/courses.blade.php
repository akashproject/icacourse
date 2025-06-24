<section class="courses-one pt-5" id="digital-marketing-courses">
    <div class="container">
        <div class="sec-title wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
            <h3 class="sec-title__title"><span>Explore Our</span> <span class="sec-title__title__shape">Top-Rated</span> <span class="sec-title__title__text">Courses</span></h3><!-- /.sec-title__title -->
        </div><!-- /.sec-title -->
    </div><!-- /.container -->
    <div class="container">
        <div class="courses-one__carousel eduhive-owl__carousel--with-shadow eduhive-owl__carousel eduhive-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
                "items": 1,
                "margin": 5,
                "loop": true,
                "smartSpeed": 700,
                "dots": false,
                "navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
                "autoplay": false,
                "responsive": {
                    "0": {
                        "items": 1,
                        "margin": 10
                    },
                    "768": {
                        "items": 2,
                        "margin": 10
                    },
                    "992": {
                        "items": 3,
                        "margin": 10
                    },
                    "1200": {
                        "items": 3.3,
                        "margin": 10
                    },
                    "1400": {
                        "items": 3.4,
                        "margin": 10
                    },
                    "1536": {
                        "items": 3.5,
                        "margin": 10
                    },
                    "1600": {
                        "items": 3.7,
                        "margin": 10
                    },
                    "1800": {
                        "items": 3.94,
                        "margin": 10
                    }
                }
            }'>
            @foreach(get_courses() as $course)
            <div class="item">
                <div class="course-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='100ms'>
                    <div class="course-card__image">
                        <img src="{{ url('assets/frontend/images/courses/'.$course->slug.'.gif')}}" alt="The Data Science Revolution: Upgrading Your Skills">
                        
                    </div><!-- /.course-card__image -->
                    <div class="course-card__content">
                        <div class="course-card__content__top">
                            <div class="course-card__category">{{ $course->no_of_module }} Modules</div><!-- /.course-card__category -->
                            <div class="course-card__duration">
                                <span class="course-card__duration__icon">
                                    <i class="icon-clock"></i>
                                </span><!-- /.course-card__duration__icon -->
                                {{ $course->duration }}
                            </div><!-- /.course-card__duration -->
                        </div><!-- /.course-card__content__top -->
                        <h3 class="course-card__title"><a href="{{ route('view-courses',$course->slug) }}">{{ $course->name }}</a></h3><!-- /.course-card__title -->
                        
                    </div><!-- /.course-card__content -->
                    <div class="course-card__hover" style="background-image: url(/assets/frontend/images/shapes/course-card-bg-1-1.png);">
                            <div class="course-card__hover__content">
                                <div class="course-card__info">
                                <div class="course-card__lessons">
                                    <span class="course-card__lessons__icon">       
                                        <i class="icon-open-book"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    {{ $course->no_of_module }} lessons
                                </div><!-- /.course-card__lessons -->
                                <div class="course-card__students">
                                    <span class="course-card__students__icon">
                                        <i class="icon-multiple-users-silhouette"></i>
                                    </span><!-- /.course-card__lessons__icon -->
                                    {{ $course->number_of_enrolled }} Students
                                </div><!-- /.course-card__students -->
                            </div><!-- /.course-card__info -->
                            <h3 class="course-card__title course-card__title--hover"><a href="{{ route('view-courses',$course->slug) }}">{{ $course->name }}</a></h3><!-- /.course-card__title -->
                            <p class="course-card__text">{{ substr($course->excerpt, 0, 100) }}...</p><!-- /.course-card__text -->
                            <div class="course-card__ratings course-card__ratings--hover">
                            <div class="eduhive-ratings">
                                <span class="eduhive-ratings__icon">
                                    <i class="fa fa-star"></i>
                                </span><!-- /.eduhive-ratings__icon -->
                                <span class="eduhive-ratings__icon">
                                    <i class="fa fa-star"></i>
                                </span><!-- /.eduhive-ratings__icon -->
                                <span class="eduhive-ratings__icon">
                                    <i class="fa fa-star"></i>
                                </span><!-- /.eduhive-ratings__icon -->
                                <span class="eduhive-ratings__icon">
                                    <i class="fa fa-star"></i>
                                </span><!-- /.eduhive-ratings__icon -->
                                <span class="eduhive-ratings__icon">
                                    <i class="fa fa-star"></i>
                                </span><!-- /.eduhive-ratings__icon -->
                            </div><!-- /.product-ratings -->
                            <p class="course-card__ratings__text">{{$course->number_of_rating}} Ratings</p><!-- /.course-card__ratings__text -->
                        </div><!-- /.course-card__ratings -->
                            <a href="#lead-generate-popup" class="course-card__btn eduhive-btn eduhive-btn--border open-popup-link">
                                <span>Enquire Now</span>
                                <span class="eduhive-btn__icon">
                                    <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                                </span>
                            </a><!-- /.course-card__btn eduhive-btn -->
                        </div><!-- /.course-card__hover__content -->
                    </div><!-- /.course-card__hover -->
                </div><!-- /.course-card -->
            </div><!-- /.item -->
            @endforeach
        </div><!-- /.courses-one__carousel -->
    </div><!-- /.courses-one__container container -->
    <img src="{{ url('/assets/frontend/images/shapes/courses-shape-1-1.png')}}" alt="shape" class="courses-one__shape">
</section><!-- /.courses-one section-space-top2 -->