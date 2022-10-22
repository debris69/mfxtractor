<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="site.css" rel="stylesheet">
    <title>Multiple Feature Extractor</title>

</head>

<body>



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-md">
            <a class="navbar-brand" href="#">MFxtractor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link" href="#">About Us</a>
                    <a class="nav-link" href="application.php">Application</a>
                    <a class="nav-link" href="#">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container result">

        <h1>Your Results....</h1>

        <?php

        $username = $_POST['username'];
        $tweetcount = $_POST['tweetcount'];

        $command = escapeshellcmd("python python/Main.py {$username} {$tweetcount}");
        try {

            $output = shell_exec($command);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        echo $output;

        $command = escapeshellcmd("python python/Preprocess.py {$username} {$tweetcount}");
        try {

            $output = shell_exec($command);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        echo $output;

        $command = escapeshellcmd("python python/SA.py {$username} {$tweetcount}");
        try {

            $output = shell_exec($command);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        echo $output;

        $command = escapeshellcmd("python python/Emoji.py {$username} {$tweetcount}");
        try {

            $output = shell_exec($command);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        echo $output;

        $command = escapeshellcmd("python python/SA_report.py {$username} {$tweetcount}");
        try {

            $output = shell_exec($command);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        echo $output;

        $command = escapeshellcmd("python python/Personality.py {$username} {$tweetcount}");
        try {

            $output = shell_exec($command);
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }

        echo $output;

        echo "<a href='data/{$username}.csv'  download><button class='btn btn-success'>Download Tweets</button></a>";
        echo "<a href='data/{$username}_data.csv' download><button class='btn btn-success t'>Download Data</button></a>";
        echo "<form method='post' action='output.php'> <input type='hidden' name='file' value='data/{$username}_data.csv'> <button class='btn btn-primary t' type='submit'>View Output</button></form>"
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>