<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];

    $file = fopen("data.txt", "r");
    if ($file) {
        $valid_user = false;
        while (($line = fgets($file)) !== false) {
            list($stored_username, $stored_email, $stored_password, $creation_date) = explode(",", trim($line));
            if ($stored_username == $username && password_verify($password, $stored_password)) {
                $valid_user = true;
                break;
            }
        }
        fclose($file);

        if ($valid_user) {
            echo "Login successful!";
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "Error opening the file!";
    }
}
?>
