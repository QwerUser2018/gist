
@extends('layouts.app')

@section('content')
    <div class="addgistform">
        <div class="del"><a href="{{route("AddCategory")}}" class="lnk">x</a></div>
        <form action="{{route("AddGist")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput">Тема</label>
                <input type="text" class="form-control" id="formGroupExampleInput" value="{{$category->category_name}}">
                <input type="hidden" name="categoryId" value="{{$category->id}}">
                <input type="hidden" name="gistId" value="{{$gist->id}}">


                <label for="formGroupExampleInput">Название поста</label>
                <input type="text" class="form-control" id="formGroupExampleInput" value="{{$gist->gist_name}}" name="gistName">


                <label for="formGroupExampleInput">Текст поста</label>
                <textarea name="gist_text" id="formGroupExampleInput" placeholder="Веедите текст" cols="100" rows="10" >{{$gist->gist_text}}</textarea>

            </div>

            <input type="submit">


        </form>


    </div>

    <div class="fon"></div>
@endsection
