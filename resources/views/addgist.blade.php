
@extends ('layouts.default')

@section('content')

<form action="{{route("AddGist")}}" method="post">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Тема</label>
        <select class="custom-select custom-select-lg mb-3" name="categoryId">
            <option selected >Выберите тему</option>
            @forelse($categories as $category)
            <option value="{{$category->category_id}}" >{{$category->category_name}}</option>
            @empty
                <option value="{{route("AddCategory")}}"><a href="">Нет категорий</a></option>
            @endforelse
        </select>

        <label for="formGroupExampleInput">Название поста</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Введите название" name="gistName">


        <label for="formGroupExampleInput">Текст поста</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Веедите текст" name="gist_text">



    </div>
    <input type="submit">
</form>
@endsection
