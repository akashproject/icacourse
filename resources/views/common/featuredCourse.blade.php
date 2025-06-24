@php
    $featuredCourse = getCourseById(1);
@endphp
<section class="featured_course my-5" id="featured_course">
    <div class="container">
        <div class="sec-title sec-title--center wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
            <h3 class="sec-title__title">Most <span class="sec-title__title__text" >Demanding </span><span class="sec-title__title__shape">Course</span></h3>
        </div><!-- /.sec-title -->
        <div class="row gutter-y-50 align-items-center">
            <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                <div class="about-one__image">
                    <div class="video-one wow fadeInUp" data-wow-duration="1500ms">
                        <div class="video-one__bg course-video" style="background-image: url(/assets/frontend/images/courses/featured-course.webp);">
                            <a href="{{ $featuredCourse->course_video_link }}" class="video-one__video-btn video-btn video-popup">
                                <i class="icon-play"></i>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </a><!-- /.video-one__video-btn -->
                        </div><!-- /.video-one__bg -->
                    </div><!-- /.video-one -->
                </div><!-- /.about-one__image -->
            </div><!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <div class="about-two__content">
                    <div class=" wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <h3 class="sec-title__title">{{ $featuredCourse->name }}</h3><!-- /.sec-title__title -->
                    </div><!-- /.sec-title -->
                    <div class="about-two__description wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        {{ $featuredCourse->excerpt }}
                    </div><!-- /.about-two__description -->
                    <div class="course-details__info-wrapper">
                        <div class="course-details__class">
                            <span class="course-details__class__icon">
                                <i class="icon-video"></i>
                            </span><!-- /.course-details__class__icon -->
                            <p class="course-details__class__text">{{ $featuredCourse->number_of_enrolled }} Enrolled</p><!-- /.course-details__class__text -->
                        </div><!-- /.course-details__class -->
                        <div class="course-details__review">
                            <span class="course-details__review__icon">
                                <i class="icon-star"></i>
                            </span><!-- /.course-details__review__icon -->
                            <p class="course-details__review__text"><span>5</span> <span>( {{ $featuredCourse->number_of_rating }} Reviews)</span></p><!-- /.course-details__review__text -->
                        </div><!-- /.course-details__review -->
                    </div>
                    <div class="row">
                        <div class="course_highlights">
                            {!! $featuredCourse->highlights !!}
                        </div>
                    </div>
                   
                    <div class="about-two__button wow fadeInUp mt-3" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <a href="#lead-generate-popup" class="eduhive-btn open-popup-link">
                            <span>Book Free Demo Class</span>
                            <span class="eduhive-btn__icon">
                                <span class="eduhive-btn__icon__inner"><i class="icon-right-arrow"></i></span>
                            </span>
                        </a><!-- /.eduhive-btn -->
                    </div><!-- /.about-two__button -->
                </div><!-- /.about-two__content -->
            </div>
        </div>
    </div>
</section>