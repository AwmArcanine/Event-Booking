<?php
$host = "localhost";
$user = "root";
$pass = "";    
$dbname = "event_booking";


$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$event = $_POST['selected_event'];
$theme = $_POST['selected_theme'];
$cuisine = $_POST['selected_cuisine'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$start = $_POST['start_date'];
$end = $_POST['end_date'];

$sql = "INSERT INTO bookings (event, theme, cuisine, name, email, phone, start_date, end_date) 
        VALUES ('$event', '$theme', '$cuisine', '$name', '$email', '$phone', '$start', '$end')";

if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?status=success");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>
