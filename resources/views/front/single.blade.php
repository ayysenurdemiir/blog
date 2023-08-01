@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
    @include('front.widgets.categoryWidget')
            <div class="col-md-8 col-lg-8 col-xl-8">
                {!! $article->content!!}
                <br/><br/>
                <span class="text-danger">Okuma Sayısı : <b>{{$article->hit}}</b></span>
        </div>
@endsection

