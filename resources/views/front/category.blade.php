@extends('front.layouts.master')
@section('title',$category->name.' Kategorisi ' )

@section('content')

    @include('front.widgets.categoryWidget')

    <div class="col-md-8 mx-auto ">

        @include('front.widgets.articleList')
</div>
@endsection

