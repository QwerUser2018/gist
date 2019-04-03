@extends ('layouts.default')
@section('content')

        <div class="row">
            <div class="col-md-4 col-lg-3 navbar-container bg-light">
                <!-- Вертикальное меню -->
                <nav class="navbar navbar-expand-md navbar-light">
                    <p class="navbar-brand addCategory">Category</p>
                    <form action="{{route("AddCategory")}}" method="post">
                        @csrf
                        <input type="text" name="CategoryName">
                        <input type="submit" value="Add">
                    </form>

                    <div class="collapse navbar-collapse" id="navbar">
                        <!-- Пункты вертикального меню -->
                        <ul class="navbar-nav">
                            @forelse($categories as $category)
                                <li class="nav-item">
                                    <a href="{{route("GetGists",["id"=>$category->category_id])}}">{{$category->category_name}}</a>
                                    <form action="{{route("DelCategory",["id"=>$category->category_id])}}" method="post">
                                    @method("delete")
                                    @csrf
                                        <input type="submit" value="x" class="del">
                                    </form>
                                </li>
                                @empty
                                <li>Добавьте категорию</li>
                                @endforelse
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col-md-8 col-lg-9 content-container">
                <!-- Основной контент страницы  -->
                <div class="blog">
                    <div class="container">
                        <div>
                            <a href="{{route("Gist")}}">Добавить новый гист</a>
                        </div>
                        @yield('gists')
                        <div class="row">
                            @if(isset($gists))
                                @forelse($gists as $gist)
                                    <h4 class="card-title">{{$gist->gist_name}}</h4>

                                    {{--<div class="col-md-4 col-lg-4 col-sm-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">{{$gist->gist_name}}</h4>
                                                <p class="card-text">
                                                    {{$gist->gist_text}}
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <a href="" class="card-link">Read more</a>
                                            </div>
                                        </div>
                                    </div>--}}

                                @empty
                                    <li>Добавьте категорию</li>
                                @endforelse
                            @endif




                        </div>


                    </div>
                </div>
            </div>

    </div>





    @endsection
