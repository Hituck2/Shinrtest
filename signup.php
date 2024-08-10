<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $creation_date = date("Y-m-d");

    $user_data = "$username,$email,$password,$creation_date\n";

    $file = fopen("data.txt", "a");
    if ($file) {
        fwrite($file, $user_data);
        fclose($file);
        echo "User registered successfully!";
    } else {
        echo "Error opening the file!";
    }
}
?>
