
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Gists</title>

    <!-- Custom styles for this template -->
    <link href="css/album.css" rel="stylesheet">

</head>

<body>

<div class="container">

    <div class="masthead">
        <h1 class="text-muted">Gists</h1>
        <nav>
            <ul class="nav nav-justified">
                <li><a href="gistsservices">Gist Service</a></li>
                <li><a href="profile">Profile</a></li>
                <li><a href="mygists">My Gists</a></li>
            </ul>
        </nav>
    </div>
    <div class="container-fluid">


    @yield('content')

    </div>
    <!-- Site footer -->
    <footer class="footer">
        <p>&copy; 2019 Step, Dnepr</p>
    </footer>

</div> <!-- /container -->

</body>
</html>


