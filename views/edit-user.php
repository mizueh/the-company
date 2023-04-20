<?php
session_start();
include "../classes/User.php";
$user = new User;
$user_details = $user->getUser($_GET['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" 
    style="margin-bottom: 80px;">
    <div class="container">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h3">The Company</h1>
        </a>
        <div class="navbar-nav">
            <span class="navbar-text"><?=$_SESSION['full_name']?></span>
            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                <button type="submit" class="text-danger bg-transparent border-0">Log out</button>
            </form>
        </div>
    </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-4">
            <h2 class="text-center mb-4">EDIT USER</h2>
            
            <form
                action="../actions/edit-user.php"
                method="POST"
                enctype="multipart/form-data"
            >
            <input type="hidden" name="user_id" value="<?php echo $_GET['user_id']?>">

                <!--picture Div-->
                <div class="row justify-content-center mb-3">
                    <!-- Image Input -->
                    <div class="col-6">
                        <img src="../assets/images/<?php echo $user_details["photo"];?>"
                        class="d-block mx-auto edit-photo" alt="Profile picture">
                        <input type="file" name="photo" class="form-control mt-2" accept="image/*">
                    </div>

                </div>
                 <!-- First Name Input -->
                 <div class="mb-3">
                    <label for="first-name" class="form-label">
                        First Name
                    </label>
                    <input type="text" name="first_name"
                    id="first-name" class="form-control"
                    value="<?php echo $user_details["first_name"]; ?>"
                    required
                    autofocus
                    >
                 </div>
                  <!-- Last Name Input -->
                  <div class="mb-3">
                    <label for="last-name" class="form-label">
                        Last Name
                    </label>
                    <input type="text" name="last_name"
                    id="last-name" class="form-control"
                    value="<?php echo $user_details["last_name"]; ?>"
                    required
                    >
                 </div>
                  <!-- Userame Input -->
                  <div class="mb-3">
                    <label for="username" class="form-label">
                        <b>Username</b>
                    </label>
                    <input type="text" name="username"
                    id="username" class="form-control fw-bold"
                    value="<?php echo $user_details["username"]; ?>"
                    required
                    maxlength="15"
                    >
                 </div>
                 <!-- Buttons -->
                 <div class="text-end">
                    <a href="dashboard.php" class="btn btn-secondary btn-sm">Cancel</a>
                    <button type="submit" class="btn btn-warning btn-sm px-5">Save</button>
                 </div>
            </form>
        </div>
    </main>
</body>