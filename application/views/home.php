<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Travel Dashboard</title>
    <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <style>
        .logout{
            position: relative;
            left: 960px;
            top: 20px;
        }
        .add{
            position: relative;
            left: 960px;
            bottom: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <a href="/logout" class="btn btn-default logout">Logout</a>
        </div>
    </div>
    <div class="col-xs-12">
        <h2>Hello, <?= $this->session->userdata('name') ?>!</h2>
        <h4>Your Trip Schedules</h4>
        <table class="table table-bordered table-striped ">
            <thead>
            <tr>
                <td>Destination</td>
                <td>Travel Start Date</td>
                <td>Travel End Date</td>
                <td>Plan</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($trips as $trip) { ?>
                    <tr>
                        <td><a href="/destination/<?= $trip['trip_id'] ?>/<?= $this->session->userdata('id') ?>">
                                <?= $trip['destination'] ?></a></td>
                        <td><?= $trip['start'] ?></td>
                        <td><?= $trip['end'] ?></td>
                        <td><?= $trip['description'] ?></td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h4>Other User's Travel Plans</h4>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Destination</td>
                    <td>Travel Start Date</td>
                    <td>Travel End Date</td>
                    <td>Do You Want to Join?</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach($other_trips as $other) { ?>
                        <tr>
                            <td><?= $other['name'] ?></td>
                            <td><a href="/destination/<?= $other['trip_id']?>/<?= $this->session->userdata('id')?>">
                                    <?= $other['destination'] ?></a></td>
                            <td><?= $other['start'] ?></td>
                            <td><?= $other['end'] ?></td>
                            <td><a href="/join_trip/<?= $this->session->userdata('id')?>/<?= $other['trip_id'] ?>">Join</a></td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="/mains/add"><button class="btn btn-default add">Add Travel Plan</button></a>
        </div>
    </div>

</div>
</body>
</html>