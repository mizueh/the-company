<?php

require_once "Database.php";

class User extends Database{

    public function getUser($user_id){
        $sql = "SELECT `id`, `first_name`, `last_name`, `username`,
        `photo` FROM `users` WHERE `id` = $user_id";

        if($result = $this->conn->query($sql)){
            //expecting one row only
            return $result->fetch_assoc();
        }else{
            die("Error retrieving user: ". $this->conn->error);
        }
        
    }

    public function delete($post){
        //input
        $id = $post["user_id"];

        //sql
        $sql = "DELETE FROM users WHERE id = '$id'";

        //query
        if($this->conn->query($sql)){
            header("Location:../views/dashboard.php");
            exit;
        }else{
            exit("Error deleting account " . $this->conn->error);
        }
    }

    public function update($request, $files){
        session_start();
        //Inputs
        $id = $request["user_id"];
        $first_name = $request["first_name"];
        $last_name = $request["last_name"];
        $username = $request["username"];

        $photo = $files["photo"]["name"];
        $tmp_photo = $files["photo"]["tmp_name"];
        // die($tmp_photo);
        //sql
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name',
        username = '$username' WHERE id = '$id'";
        //Runs the update query of first_name. last_name, and username
        if($this->conn->query($sql)){
            $_SESSION['username'] = $username;
            $_SESSION['full_name'] = "$first_name $last_name";
        
            //check if user changed profile picture
            if($photo){
                $sql = "UPDATE users SET photo = '$photo' WHERE id = '$id'";
                $destination = "../assets/images/$photo";
                //THis query updates the photo field in the database
                if($this->conn->query($sql)){
                    //Move the file
                    if(move_uploaded_file($tmp_photo, $destination)){
                        //if the files was moved, go back to the dashboard
                        header("Location:../views/dashboard.php");
                        exit;
                    }else{
                        //If the file is not moved
                        exit("Error moving the photo");
                    }
                }else{
                    exit("Error updating photo". $this->conn->error);
                }
                 
            }
            //If name update worked and picture is not changed
            header("Location:../views/dashboard.php");
            exit;

        } else{
            //If cannot update names and username
            exit("Error updating your account". $this->conn->error);
        }
    }

    public function store($request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $username = $request['username'];
        $password = $request['password'];

        //encrypt the password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //sql command
        $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`,
        `password`)VALUES('$first_name','$last_name','$username','$password')";

        //execute the sql command
        if($this->conn->query($sql))
        {
            //if success
            header("location:../views");//go to login page
            exit; // same as die/kill the script
        }else{
            //if fail
            die('Error creating the user:'.$this->conn->error);
        }
    }

    public function login($request)
    {

        #request holds now the data coming from $_POST in actions/login.php
        
        $username = $request['username'];
        $password = $request['password'];

        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->conn->query($sql);

        #check the username
        if($result->num_rows == 1)
        {
            $user = $result->fetch_assoc();
            //$user = ['id' => 1, 'username' -> 'john', 'password' => '$2y$10....']

             #check if the password is correct
            if(password_verify($password, $user['password']))
            {
                #create session variables for future use.
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username']=$user['username'];
                $_SESSION['full_name']=$user['frist_name']. " ".$user['last_name'];
                
                header('location: ../views/dashboard.php');
                exit;
            }
            else
            {
                die('Password if incorrect');
            }
        }
        else
        {
            die('Username not found.');
        }
    }//end login


    //logout()
    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('location: ../views');
    }//end logout()

    //getAllUsers()
    public function getAllUsers()
    {
        $sql = "SELECT * FROM users";

        if($result = $this->conn->query($sql)){
            //expecting one or more rows
            return $result;
        }else{
            die("Error retrieving all users: ". $this->conn->error);
        }
    }
}



?>