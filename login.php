<?php
session_start();

$errors = [
    "email" => "",
    "password" => "",
    "phone" => "",
    "toc" => ""
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = trim($_POST["name"]);
    $email    = trim($_POST["email"]);
    $password = $_POST["password"];
    $phone    = trim($_POST["phone"]);
    $toc      = isset($_POST["toc"]);

    $email_pattern    = "/^[\w\.-]+@[\w\.-]+\.\w+$/";
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&]).{8,}$/";
    $phone_pattern    = "/^[0-9]{10}$/";

    if (!preg_match($email_pattern, $email)) {
        $errors["email"] = "Invalid email format.";
    }

    if (!preg_match($password_pattern, $password)) {
        $errors["password"] = "Password must be at least 8 characters and include a capital letter, number, and special character.";
    }

    if (!preg_match($phone_pattern, $phone)) {
        $errors["phone"] = "Phone number must contain exactly 10 digits.";
    }

    if (empty(array_filter($errors))) {
        header("Location: booking.html");
        exit();
    } else {
        $_SESSION["errors"] = $errors;
        $_SESSION["old"] = [
            "name" => $name,
            "email" => $email,
            "phone" => $phone
        ];
        header("Location: index.html");
        exit();
    }
}
?>
