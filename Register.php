<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register Page</title>
    <link rel="stylesheet" href="Styling/Style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <h1>Homework Tracker Register</h1>
                <form action="Handlers/Register_Handler.php" method="POST">
                    <input type="text" name="username_reg" class="form-control" placeholder="Enter Username"><br />
                    <input type="text" name="Email_reg" class="form-control" placeholder="Enter Email"><br />
                    <input type="password" name="password_reg" class="form-control" placeholder="Enter Password"><br />
                    <input type="password" name="password_reg_confirm" class="form-control" placeholder="Confirm Password"><br />
                    <button type="submit" class="btn btn-success">
                    <i class="fa-thin fa-right-to-bracket"></i> Register
                    </button>
                </form>
                <p>Already have an account?</p><a href="LogIn.php">Login Here</a>
            </div>
        </div>
    </div>
</body>
</html>