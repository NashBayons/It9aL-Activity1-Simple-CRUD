<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>LogIn Page</title>
    <link rel="stylesheet" href="Styling/Style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3" align="center">
                <h1>Homework Tracker Sign in</h1>
                <form action="Handlers/LogIn_Handler.php" method="POST">
                    <input type="text" name="username" class="form-control" placeholder="Enter Username" required><br />
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required><br />
                    <button type="submit" class="btn btn-success">
                        <i class="fa-thin fa-right-to-bracket"></i> Log-In
                        </button>
                </form>
                <br />
                <p>Don't have an account?</p><a href="Register.php">Register Here</a>
            </div>
        </div>
    </div>
</body>
</html>
