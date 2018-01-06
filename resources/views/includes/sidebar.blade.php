<div class="list-group">
    <li class="list-group-item active">Category</li>
        @foreach (\App\Http\Controllers\HomeController::categories() as $c)
            <a href="{{ URL::to('/'.$c->id) }}" class="list-group-item list-group-item-action">{{$c->english}}</a>
        @endforeach
</div>