@extends('layouts.frontend')

@section('content')
    
        <!-- Post Details -->

       <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">Tag:{{ $tag->tags }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @foreach ($tag->posts as $post)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ asset($post->picture) }}" alt="{{ $post->title }}">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('singlePage',['slug'=>$post->slug]) }}">{{ $post->title }}</a></h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        
        
@endsection