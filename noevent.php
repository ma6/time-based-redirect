<?php
    $event = $_GET["event"];
    $doesnotexist = $_GET["doesnotexist"];
?>

<html>

<head>
    <?
      $randomstring = isset($_GET["r"]) ? rand() : "";
      $changephotoevery = 15;
      $photo = "//picsum.photos/seed/".md5($event.date("-dmYH").floor(date("i")/$changephotoevery).$randomstring)."/1024/768/";
    ?>
    <title>Event redirect</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style type="text/css" media="screen">
        <!--
        body {
            font-family: Montserrat, Helvetica, Arial, sans-serif;
            color: #333;
            text-align: center;
            background: #eee;
            background-image: url("<?=$photo;?>");
            background-size: cover;
            font-weight: 400;
        }

        h1 {
            font-size: 2em;
            font-weight: 400;
        }

        h2 {
            font-size: 1.5em;
            color: #777;
            font-weight: 400;
        }

        a,
        a:visited,
        a:link,
        a:hover {
            text-decoration: underline;
            color: #333;
        }

        h1 a,
        h1 a:visited,
        h1 a:link {
            background: #f9f9f9;
        }

        h1 a:hover,
        h1 a:active {
            text-decoration: none;
            color: #fff;
            background: #333;
        }

        .thebox {
            position: absolute;
            border: 1px solid #999;
            background: #fff;
            border-radius: 7px;
            width: 90%;
            z-index: 15;
            left: 5%;
            top: 40%;
            margin: -75px 0 0 0px;
        }

        @media (min-width: 666px) {
            .thebox {
                width: 600px;
                margin: -75px 0 0 -300px;
                left: 50%;
            }
        }

        .small {
            font-size: 0.75em;
        }

        .photo_by {
            position: absolute;
            right: 0;
            bottom: 0;
            padding: 5px;
            padding-left: 10px;
            border: 0px solid #333;
            background: rgba(255, 255, 255, 0.65);
            border-radius: 0px;
            border-top-left-radius: 5px;

        }

        -->
    </style>
</head>

<body>
    <div class="thebox">
      <?php if ($event && $doesnotexist) { ?>
        <h1>Event does not exist</h1>
        <p>The event you tried to dial in to is not available.</p>
        <p>Please check the event URL. </p>
        <?php } elseif ($event) { ?>
        <h1>Event not live</h1>
        <p>The event you tried to dial in to is not live at the moment.</p>
        <p>Please <a href="/?event=<?= $event; ?>">try again at the right time</a>. </p>
      <?php } else { ?>
        <h1>No Event specified</h1>
        <p>You did not specifiy an event.</p>
      <?php } ?>
    </div>

    <div class="photo_by small">
        <a href="https:<?=$photo;?>">Photo</a>: <a href="https://picsum.photos/">Lorem Picsum</a>
    </div>
</body>

</html>
