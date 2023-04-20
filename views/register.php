<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 my-auto mx-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center text-uppercase">register</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/register.php" method="post">

                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control"
                        name="first_name" id="first_name" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control"
                        name="last_name" id="last_name" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label fq-bold">Username</label>
                        <input type="text" class="form-control fq-bold" name="username"
                        id="username" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fq-bold">Password</label>
                        <input type="password" class= "form-control"
                        name="password" id="password" minlength="8"
                        aria-describedby="password-info"required>
                        <div class="form-text" id="password-info">
                            Password must be at least 8 characters long.
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Register</button>
                    </form>
                    <p class="text-center mt-3 small">
                        Registered Already?<a href="../views">Log in.</a>
                    </p>

                </div>
            </div>
        </div>

    </div>
    
</body>
</html>