
@extends('layouts.app')

@section('content')
<div class="addgistform">
    <div class="del"><a href="{{route("AddCategory")}}" class="lnk">x</a></div>
<form action="{{route("AddGist")}}" method="post">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Тема</label>
        <select class="custom-select custom-select-lg mb-3" name="categoryId">
            <option selected >Select category</option>
            @forelse($categories as $category)
            <option value="{{$category->id}}" >{{$category->category_name}}</option>
            @empty
                <option value="{{route("AddCategory")}}"><a href="">Нет категорий</a></option>
            @endforelse
        </select>

        <label for="formGroupExampleInput">Gist name</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите название" name="gistName">


        <label for="formGroupExampleInput">Text</label>
        <textarea name="gist_text" id="formGroupExampleInput" placeholder="Веедите текст" cols="100" rows="10"></textarea>
    </div>

    <input type="submit">


</form>


</div>

<div class="fon"></div>
@endsection
