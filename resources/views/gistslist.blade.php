
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

@Auth
<div class="container-fluid">
    <a href="{{route("AddCategory")}}" class="col">К списку категорий</a>
    <h4>
        Category gists:  {{$gists[0]->category["category_name"]}}
    </h4>


<div class="row">
    @forelse($gists as $gist)

        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{$gist->gist_name}}</h4>
                    <p class="card-text">
                        {{$gist->gist_text}}
                    </p>
                </div>
                <div class="card-footer">
                    <form action="{{route("DelGist",["id"=>$gist->id])}}" method="post">
                        @method("delete")
                        @csrf
                        <input type="submit" value="Del" class="card-img-bottom">
                    </form>
                </div>
            </div>
        </div>

    @empty
        <li>Добавьте категорию</li>
    @endforelse
</div>
</div>
    @endauth




