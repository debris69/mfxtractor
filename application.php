<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="main.css" rel="stylesheet" />
    <link rel="stylesheet" href="site.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-md">
            <a class="navbar-brand" href="index.php">MFxtractor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="about.php">About Us</a>
                    <a class="nav-link active" href="application.php">Application</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="s01">
        <form action="program.php" method="post">

            <div class="inner-form">
                <div class="input-field first-wrap">
                    <input id="search" type="text" name="username" placeholder="Username" />
                </div>
                <div class="input-field second-wrap">
                    <input id="location" type="number" name="tweetcount" placeholder="Tweet Count" />
                </div>
                <div class="input-field third-wrap">
                    <button class="btn-search" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
</body>


</html>