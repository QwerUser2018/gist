@extends ('layouts.default')

@section('content')
    <script>
        addEventListener("click", (e) => {
            if (e.target.matches(".addCategorybtn")) {
                //document.querySelector('.addCategory').className="visible";
                alert("hello")
            }
        });
        document.querySelector("btn").onclick=function () {
            document.querySelector('.addCategory');
        }
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-3 navbar-container bg-light">
                <!-- Вертикальное меню -->
                <nav class="navbar navbar-expand-md navbar-light">
                    <p class="navbar-brand">Category
                        <button type="button" class="btn btn-primary btn-circle bg-success addCategorybtn"><i>+</i></button>

                    </p>
                    <div class="collapse navbar-collapse" id="navbar">
                        <!-- Пункты вертикального меню -->
                        <ul class="navbar-nav">
                            <li class="nav-item addCategory" {{--style="display: none"--}}>
                                <form action="category" method="post">
                                    <input type="text" name="CategoryName">
                                    <input type="submit" value="Add">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#link-1">JS</a>
                                <a class="del" href="">x</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#link-2">Java</a>
                                <a class="del" href="">x</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#link-3">PHP</a>
                                <a class="del" href="">x</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#link-4">C++</a>
                                <a class="del" href="">x</a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#link-5">Python</a>
                                <a class="del" href="">x</a>

                            </li>
                        </ul>

                    </div>
                </nav>

            </div>
            <div class="col-md-8 col-lg-9 content-container">
                <!-- Основной контент страницы  -->
                <div class="blog">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Post Title</h4>
                                        <p class="card-text">
                                            Текст
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="" class="card-link">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Post Title</h4>
                                        <p class="card-text">
                                            Текст
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="" class="card-link">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Post Title</h4>
                                        <p class="card-text">

                                            Текст
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="" class="card-link">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection
