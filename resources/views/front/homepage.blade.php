@extends('front.layouts.master')
    @section('title','MERHABA')

@section('content')
    @include('front.widgets.categoryWidget')
        <div class="col-md-8 mx-auto ">
@include('front.widgets.articleList')
            <!-- Divider-->
        </div>


@endsection

