@if(count($articles)>0)
@foreach($articles as $article)
    <!-- Post preview-->
    <div class="post-preview">
        <a href="{{route('single', [$article->getCategory->slug,$article->id])}}">
            <h2 class="post-title">
                {{$article->title}}
            </h2>
            <img src="{{asset($article->image)}} ">
            <h3 class="post-subtitle">
                {!!Str::limit($article->content,75)!!}
            </h3>
        </a>
        <p class="post-meta"> Kategori :
            <a href="#!">{{$article->getCategory->name}}</a >
            <br>
            <span class="float-right">{{$article->created_at->diffForHumans()}}</span></p>

    </div>
    @if(!$loop->last)
        <hr>
        @endif
        @endforeach
        </p>
        {{$articles->links('pagination::bootstrap-4')}}
        </div>
    @else
        <div class="alert ">
            <h2>Bu Kategoriye Ait Yazı Bulunamadı </h2>
        </div>
    @endif
