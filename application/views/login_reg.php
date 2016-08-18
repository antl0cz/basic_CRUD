<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="col-md-5">
        <form action="register" class="well" method="post">
            <div class="form-group">
                <label>Name:</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Username(Email):</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <h6>Password should be at least 8 characters long</h6>
            <div class="form-group">
                <label>Confirm PW:</label>
                <input type="password" class="form-control" name="password_confirm">
            </div>
            <button type="submit" class="btn btn-default">Register</button>
            <?php
            if($this->session->flashdata('reg_errors'))
            {
                echo($this->session->flashdata('reg_errors')[0]);
            }
            ?>
        </form>
    </div>
    <div class="col-md-5">
        <form action="login" class="well" method="post">
            <div class="form-group">
                <label>(Username)Email address:</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-default">Login</button>
            <?php
            if($this->session->flashdata('log_errors'))
            {
                echo($this->session->flashdata('log_errors'));
            }
            ?>
        </form>
    </div>
</div>
</body>
</html>