
@isset($categories)
<div class="col-md-4" align="center">
    <div class="card">
        <div class="card-header">
            KATEGORİLER
        </div>
        <div class="list-group" >
            @foreach($categories as $category)
                <li class="list-group-item
                @if(Request::segment(2)==$category->id) active @endif">
                    <a href="{{route('category',$category->id)}}" >{{$category->name}} </a>
                    <span class="badge bg-danger float-right text-white">{{$category->articleCount->count()}}</span>
                </li>

            @endforeach

        </div>
    </div>
    </div>
@endif

