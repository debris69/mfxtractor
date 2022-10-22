<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="site.css" rel="stylesheet">
    <title>Output</title>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>


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
                    <a class="nav-link" href="application.php">Application</a>
                </div>
            </div>
        </div>
    </nav>

    <?php

    $file = $_POST['file'];
    $rows   = array_map('str_getcsv', file($file));
    $header = array_shift($rows);
    $csv    = array();
    foreach ($rows as $row) {
        $csv[] = array_combine($header, $row);
    }
    ?>

    <section class="section about-section gray-bg" id="about">
        <div class="container">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color"><?php echo $csv[0]['name']; ?></h3>
                        <h6 class="theme-color lead">@<?php echo $csv[0]['username']; ?></h6>
                        <p><?php echo $csv[0]['bio']; ?></p>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>Join Date</label>
                                    <p><?php echo $csv[0]['join_date'] ?></p>
                                </div>
                                <div class="media">
                                    <label>Verified</label>
                                    <p><?php echo $csv[0]['verified'] ?></p>
                                </div>
                                <div class="media">
                                    <label>Location</label>
                                    <p><?php echo $csv[0]['location']; ?></p>
                                </div>
                                <div class="media">
                                    <label>Retrieved</label>
                                    <p><?php echo $csv[0]['total tweets'] ?> tweets</p>
                                </div>
                                <div class="media">
                                    <label>Emoticons</label>
                                    <p><?php echo $csv[0]['total emojis'] ?></p>
                                </div>
                                <div class="media">
                                    <label>Most Used Emoticons</label>
                                    <p><?php echo $csv[0]['most used emojis'] ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="media">
                                    <label>Emoticons per post</label>
                                    <p><?php echo $csv[0]['emoji per post'] ?></p>
                                </div>
                                <div class="media">
                                    <label>Average positive polarity</label>
                                    <p><?php echo $csv[0]['average positive polarity'] ?></p>
                                </div>
                                <div class="media">
                                    <label>Average negative polarity</label>
                                    <p><?php echo $csv[0]['average negative polarity'] ?></p>
                                </div>
                                <div class="media">
                                    <label>Positive tweets</label>
                                    <p><?php echo $csv[0]['% of positive tweets'] ?>%</p>
                                </div>
                                <div class="media">
                                    <label>Negative tweets</label>
                                    <p><?php echo $csv[0]['% of negative tweets'] ?>%</p>
                                </div>
                                <div class="media">
                                    <label>Neutral tweets</label>
                                    <p><?php echo $csv[0]['% of neutral tweets'] ?>%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img src="<?php echo $csv[0]['profile_image_url'] ?>" heigth="500px" width="500px" title="" alt="">
                    </div>
                </div>
            </div>
            <div class="counter">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="<?php echo $csv[0]['tweets'] ?>" data-speed="1500"><?php echo $csv[0]['tweets'] ?></h6>
                            <p class="m-0px font-w-600">Total Tweets</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="<?php echo $csv[0]['following'] ?>" data-speed="150"><?php echo $csv[0]['following'] ?></h6>
                            <p class="m-0px font-w-600">Following</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="<?php echo $csv[0]['followers'] ?>" data-speed="850"><?php echo $csv[0]['followers'] ?></h6>
                            <p class="m-0px font-w-600">Followers</p>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="count-data text-center">
                            <h6 class="count h2" data-to="<?php echo $csv[0]['likes'] ?>" data-speed="190"><?php echo $csv[0]['likes'] ?></h6>
                            <p class="m-0px font-w-600">Likes</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-light">
                    <thead>
                        <tr class="table table-primary">
                            <th scope="col">Pessimist</th>
                            <th scope="col">Optimist</th>
                            <th scope="col">Aggreable</th>
                            <th scope="col">Spectator</th>
                            <th scope="col">Active and Social</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table table-light">
                            <td><?php echo $csv[0]['pessimist'] ?></td>
                            <td><?php echo $csv[0]['optimist'] ?></td>
                            <td><?php echo $csv[0]['aggreable'] ?></td>
                            <td><?php echo $csv[0]['spectator'] ?></td>
                            <td><?php echo $csv[0]['active and social'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style type="text/css">
        .section {
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 60px 0;
            margin-left: 10%;
            width: 80%;
        }

        .gray-bg {
            background-color: #f5f5f5;
        }

        img {
            max-width: 100%;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        .table {
            width: 90%;
            margin-left: 60px;
            margin-top: 20px;
            text-align: center;
        }

        /* About Me 
---------------------*/
        .about-text h3 {
            font-size: 45px;
            font-weight: 700;
            margin: 0 0 6px;
        }

        @media (max-width: 767px) {
            .about-text h3 {
                font-size: 35px;
            }
        }

        .about-text h6 {
            font-weight: 600;
            margin-bottom: 15px;
        }

        @media (max-width: 767px) {
            .about-text h6 {
                font-size: 18px;
            }
        }

        .about-text p {
            font-size: 18px;
            max-width: 450px;
        }

        .about-text p mark {
            font-weight: 600;
            color: #20247b;
        }

        .about-list {
            padding-top: 10px;
        }

        .about-list .media {
            padding: 5px 0;
        }

        .about-list label {
            color: #20247b;
            font-weight: 600;

            margin: 0;
            position: relative;
        }



        .about-list p {
            margin: 0;
            font-size: 15px;
        }

        @media (max-width: 991px) {
            .about-avatar {
                margin-top: 30px;
            }
        }

        .about-section .counter {
            margin-top: 50px;
            padding: 22px 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
        }

        .about-section .counter .count-data {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .about-section .counter .count {
            font-weight: 700;
            color: #20247b;
            margin: 0 0 5px;
        }

        .about-section .counter p {
            font-weight: 600;
            margin: 0;
        }

        mark {
            background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
            background-size: 100% 3px;
            background-repeat: no-repeat;
            background-position: 0 bottom;
            background-color: transparent;
            padding: 0;
            color: currentColor;
        }

        .theme-color {
            color: #fc5356;
        }

        .dark-color {
            color: #20247b;
        }
    </style>
</body>

</html>