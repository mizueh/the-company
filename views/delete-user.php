<?php


?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Delete User</title>
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
            <i class="text-center fa-solid fa-triangle-exclamation text-warning fs-1 d-block mb-2"></i>
            <h2 class="text-center mb-4">DELETE ACCOUNT</h2>
            <p class="fw-bold">Are you sure you want to delete this account?</p>
            
            <div class="row">
                <div class="col">
                    <a href="dashboard.php"
                    class="btn btn-secondary w-100">
                    Cancel
                </a>
                </div>
                <div class="col">
                    <form action="../actions/delete-user.php"
                    method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $_GET["user_id"]; ?>">
                    <button type="submit" class="btn btn-outline-danger w-100">
                        Delete
                    </button>
                    </form>
                </div>
            </div>
           
        </div>
    </main>
</body>