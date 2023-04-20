<?php
    session_start();
    include "../classes/user.php";
    $userObj = new User;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
    <main class="container" style="padding-top: 80px">
        <h2 class="text-muted display-6">USER LIST</h2>
        <table class="table table-hover">
            <thead class="table-secondary">
                <tr>
                    <th>#</th>
                    <th>Frist Name</th>
                    <th class="fw-bold">Last Name</th>
                    <th>Username</th>
                    <th></th> <!-- for action buttons -->
                </tr>
            </thead>
            <tbody class="lead">
                <?php
                    $users = $userObj->getAllUsers($_SESSION["user_id"]);

                    if($users->num_rows>0)
                    {
                        while($row = $users->fetch_assoc())
                        {
                    ?>
                
                     <tr>
                            <td><?= $row["id"]?></td>
                            <td><?= $row["first_name"]?></td>
                            <td><?= $row["last_name"]?></td>
                            <td><?= $row["username"]?></td>
                            <td>
                                <a href="edit-user.php?user_id=<?= $row["id"]?>" 
                                class="btn btn-outline-warning">
                                <i class="fa-solid fa-pencil"></i></a>
                                <a href="delete-user.php?user_id=<?= $row["id"]?>"
                                 class="btn btn-outline-danger">
                                <i class="fa-solid fa-trash-can"></i></a>
                            <td>
                    </tr>

                <?php
                        }
                    }
                    else
                    {
                ?>
                    <tr><td class="text-center text-muted fst-italic"
                    colspan="5">No records to display</td></tr>
                <?php
                    }
                ?>
               
            </tbody>
        </table>
        </main>

</body>
</html>