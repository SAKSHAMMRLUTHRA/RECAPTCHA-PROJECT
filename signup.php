<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Secret key from Google reCAPTCHA
    $secretKey = "6Lc_YGMqAAAAAIkKZAh9-mtP46o6QqGusimotJli";
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$recaptchaResponse");
    $responseKeys = json_decode($response, true);

    if (intval($responseKeys["success"]) !== 1) {
        echo "Please complete the reCAPTCHA.";
    } else {
        // Here, you can proceed to save user data to your database.
        // For example:
        // $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Save $name, $email, and $hashedPassword to the database.

        echo "Thank you for signing up, " . htmlspecialchars($name) . "!";
    }
}
?>
