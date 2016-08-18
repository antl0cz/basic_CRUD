<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Destination</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
    <style>
        .link{
            position: relative;
            left: 960px;
            top: 20px;
        }
        p{
            position: relative;
            left: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <a href="/main"><button class="btn btn-default link">Home</button></a>
            <a href="/logout"><button class="btn btn-default link">Log Out</button></a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h4><?= $trip_info['destination'] ?></h4>
            <p>Planned By: <?= $planner['name'] ?></p>
            <p>Description: <?= $trip_info['description'] ?></p>
            <p>Travel Date From: <?= $trip_info['start'] ?></p>
            <p>Travel Date To: <?= $trip_info['end'] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h4>Other users' joining the trip:</h4>
               <?php foreach ($others as $other) { ?>
                    <p><?= $other['name'] ?></p>
                <?php			} ?>
        </div>
    </div>
</div>
</body>
</html>