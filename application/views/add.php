<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Plan</title>
    <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <style>
        .link{
            position: relative;
            left: 960px;
            top: 20px;
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
        <div class="col-md-5">
            <h1>Add a Trip</h1>
            <form action="/add_trip/<?= $this->session->userdata('id') ?>" method="post" class="well">
                <div class="form-group">
                    <label>Destination:</label>
                    <input type="text" name="destination" id="destination" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description:</label>
                    <input type="text" name="description" id="description" class="form-control">
                </div>
                <div class="form-group">
                    <label>Travel Date From:</label>
                    <input type="date" name="start" id="start" class="form-control">
                </div>
                <div class="form-group">
                    <label>Travel Date To:</label>
                    <input type="date" name="end" id="end" class="form-control">
                </div>
                <a href="/add_trip/<?= $this->session->userdata('id') ?>"><button class="btn btn-default">Add</button></a>
            </form>
        </div>
    </div>
</div>
</body>
</html>