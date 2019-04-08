@extends('layouts.app')

@section('content')
    @Auth
    <div class="row">
        <div class="form-group col-md-10 col-md-offset-4">
            <form action="{{route("AddCategory")}}" method="post">
                @csrf
                <p >Add new category</p>
                <input type="text" name="CategoryName">
                <input type="submit" value="Add">
            </form>
        </div>
        <a href="{{route("Gist")}}" >Добавить новый гист</a>
    </div>


    <div class="row">
        @forelse($categories as $category)
            <div class="col-md-4 col-lg-4 col-sm-12">
                <div class="card catlist">
                    <div class="card-body">
                        <h4 class="card-title">
                            <a  href="{{route("GetGists",["id"=>$category->id])}}">{{$category->category_name}}</a>

                        </h4>
                        <p class="card-text">
                            Has gists: {{count($category->gists)}}
                        </p>
                    </div>
                    <div class="card-footer">
                        <form action="{{route("DelCategory",["id"=>$category->id])}}" method="post">
                            @method("delete")
                            @csrf
                            <input type="submit" value="Delete" class="card-link">
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <li>Добавьте категорию</li>
        @endforelse
    </div>
    @endauth
@endsection
