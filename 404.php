<!DOCTYPE html>
<html lang="en">  

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404</title>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            background-image: linear-gradient(45deg, #00bcd4, transparent);
            position: relative;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }

        .not-found .home {
            display: flex;
            justify-content: center;
            margin-top: 15px;
        }

        .not-found .home a {
            background-color: #fff;
            color: #000;
            padding: 10px 50px;
            text-decoration: none;
            border-radius: 3px;
        }

        .not-found .home a:hover {
            background-image: linear-gradient(45deg, #ffc107, transparent);
        }

        .not-found .home a:focus {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="not-found" style="position:absolute; left: 37%;top:25%;">
        <h1 style="margin:0; font-size: 15rem;text-align: center;">404</h1>
        <h2 style="margin:0;text-align: center;">Sorry, Page Not Found</h2>
        <div class="home">
            <a href="<?php echo site_url() ?>">Home</a>
        </div>
    </div>
</body>

</html>