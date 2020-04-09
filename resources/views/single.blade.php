@extends('layouts.frontend')

@section('content')
    
        <!-- Post Details -->
    <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        <div class="post-thumb">
                            <img src="{{ asset($post->picture) }}" alt="{{$post->title}}">
                            <div class="overlay"></div>
                            <a href="{{ asset($post->picture) }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        <a href="{{ route('singlePage',['slug'=>$post->slug]) }}">{{ $post->title }}</a>
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{ $post->created_at->diffForHumans()}}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{ $post->category->name }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>

                </article>
            </div>
            <div class="col-lg-2"></div>
    </div>
    <div class="row medium-padding120">
                <main class="main">
                    <div class="col-lg-10 col-lg-offset-1">
                        <article class="hentry post post-standard-details">

                            <div class="post__content">


                                <div class="post-additional-info">

                                    <div class="post__author author vcard">
                                        Posted by

                                        <div class="post__author-name fn">
                                            <a href="#" class="post__author-link">Admin</a>
                                        </div>

                                    </div>

                                    <span class="post__date">

                                        <i class="seoicon-clock"></i>

                                        <time class="published" datetime="2016-03-20 12:00:00">
                                           {{$post->created_at->toFormattedDateString()}}
                                        </time>

                                    </span>

                                    <span class="category">
                                        <i class="seoicon-tags"></i>
                                        @foreach ($post->tags as $tag)
                                            <a href="#">{{ $tag->tags }}</a>
                                        @endforeach
                                        
                                       
                                    </span>

                                </div>

                                <div class="post__content-info">

                                    <p class="post__subtitle">{{$post->content}}
                                    </p>

                                 

                                    <div class="widget w-tags">
                                        <div class="tags-wrap">
                                             @foreach ($post->tags as $tag)
                                                <a href="#">{{ $tag->tags }}</a>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="socials">Share:
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-facebook"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-twitter"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-linkedin"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-google-plus"></i>
                                </a>
                                <a href="#" class="social__item">
                                    <i class="seoicon-social-pinterest"></i>
                                </a>
                            </div>

                        </article>

                        <div class="blog-details-author">

                            <div class="blog-details-author-thumb">
                                <img src="{{ asset('app/img/blog-details-author.png') }}" alt="Author">
                            </div>

                            <div class="blog-details-author-content">
                                <div class="author-info">
                                    <h5 class="author-name">Philip Demarco</h5>
                                    <p class="author-info">SEO Specialist</p>
                                </div>
                                <p class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy nibh euismod.
                                </p>
                                <div class="socials">

                                    <a href="#" class="social__item">
                                        <img src="{{asset ('app/svg/circle-facebook.svg')}}" alt="facebook">
                                    </a>

                                    <a href="#" class="social__item">
                                        <img src="{{asset ('app/svg/twitter.svg')}}" alt="twitter">
                                    </a>

                                    <a href="#" class="social__item">
                                        <img src="{{asset ('app/svg/google.svg')}}" alt="google">
                                    </a>

                                    <a href="#" class="social__item">
                                        <img src="{{asset ('app/svg/youtube.svg')}}" alt="youtube">
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="pagination-arrow">

                            @if($prev_post)
                                    <a href="{{ route('singlePage',['slug'=>$prev_post->slug]) }}" class="btn-prev-wrap">
                                        <svg class="btn-prev">
                                            <use xlink:href="#arrow-left"></use>
                                        </svg>
                                        <div class="btn-content">
                                            <div class="btn-content-title">Previous Post</div>
                                            <p class="btn-content-subtitle">{{ $prev_post->title }}</p>
                                        </div>
                                    </a>
                            @endif
                            @if($next_post)
                            <a href="{{ route('singlePage',['slug'=>$next_post->slug]) }}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{ $next_post->title }}</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                            @endif

                        </div>

                        <div class="comments">

                            <div class="heading text-center">
                                <h4 class="h1 heading-title">Comments</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                        </div>


                    </div>

                    <!-- End Post Details -->

                    <!-- Sidebar-->

                    <div class="col-lg-12">
                        <aside aria-label="sidebar" class="sidebar sidebar-right">
                            <div class="widget w-tags">
                                <div class="heading text-center">
                                    <h4 class="heading-title">ALL BLOG TAGS</h4>
                                    <div class="heading-line">
                                        <span class="short-line"></span>
                                        <span class="long-line"></span>
                                    </div>
                                </div>

                                <div class="tags-wrap">
                                    <a href="#" class="w-tags-item">SEO</a>
                                    <a href="#" class="w-tags-item">Advertising</a>
                                    <a href="#" class="w-tags-item">Business</a>
                                    <a href="#" class="w-tags-item">Optimization</a>
                                    <a href="#" class="w-tags-item">Digital Marketing</a>
                                    <a href="#" class="w-tags-item">Social</a>
                                    <a href="#" class="w-tags-item">Keyword</a>
                                    <a href="#" class="w-tags-item">Strategy</a>
                                    <a href="#" class="w-tags-item">Audience</a>
                                </div>
                            </div>
                        </aside>
                    </div>

                    <!-- End Sidebar-->

                </main>
            </div>
        
@endsection