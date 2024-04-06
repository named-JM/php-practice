<?php
///notes!!!!
///this condition will checking uf the form has been submitted using POST method
if($_SERVER["REQUEST_METHOD"] == "POST"){

    ///this username and password varuable is to gget the form data
    ///we are retrieving the values of username and password fields from the form that
    ///submitted via POST method
    $username = $_POST['username'];
    $password = $_POST['password'];

    ///HERE ARE THE DATABASE CONNECTION it is where the phpmyadmin dbname which i called auth
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "auth";
    ///this $conn right here is an object that represent database connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    ///this is where the connectioin checking. if we fill up correct username and password or wrong
    if($conn->connect_error){
        die("Connection Failed: ". $conn->connect_error);

    }

    ///this part will validate or checcks if theres a row in the 'login' table that i created in myphpadmin
    ///where that table that matches i created which is 2 username and password
    $query = "SELECT *FROM `login` WHERE username='$username' AND password='$password'";
    $result = $conn->query($query);

    ///this part where only handle the result.
    /// if correct or wrong form and if we go submit where do that page go? 
    if($result->num_rows==1){
        //login success
        header("Location: success.html");
        exit();

    }
    else{
        //login failed
        header("Location: error.html");
        exit();
    }
    $conn->close();
}
?>