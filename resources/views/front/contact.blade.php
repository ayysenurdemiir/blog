@extends('front.layouts.master')
@section('title','İletişim')
@section('bg','https://st.depositphotos.com/1265075/2916/i/600/depositphotos_29165825-stock-photo-website-contact-us-icons-on.jpg')
@section('content')
<div class="col-md-8">
    @if(session('success'))
     <div class="alert alert-success">
        {{session('success')}}
     </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <h3>Bizimle iletişime geçebilirsiniz.</h3>
        <form method="post" action="{{route('contact.post')}}">
        @csrf
        <div class="control-group">
            <div class="control-group controls">
                <label>Ad Soyad</label>
                <input class="form-control" name="name" type="text" value="{{old('name')}}" placeholder="Ad Soyadınız" data-sb-validations="required" />

            </div>
            <label>Email adresiniz</label>
                <input class="form-control" name="email" type="email" value="{{old('email')}}"  placeholder="Email Adresiniz" data-sb-validations="required,email" />

            </div>
            <div class="control-group">
                <div class="form-group col-xs-12 controls">
                <label>Konu</label>
                <select class="form-control" name="topic" >
                    <option @if(old('topic')=="Bilgi") selected @endif>Bilgi </option>
                    <option @if(old('topic')=="Destek")selected @endif>Destek </option>
                    <option @if(old('topic')=="Genel") selected @endif>Genel </option>
                </select>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group ">
                    <labei>Mesajınız</labei>
                    <textarea rows="5" name="message" class="form-control" placeholder="Mesajınız.">{{old('message')}}</textarea>

            </div>
            </div>
            <br >

            <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Gönder</button>
        </form>
</div>

<div class="col-md-4"></div>
<div class="panel"></div>
</div>

@endsection
