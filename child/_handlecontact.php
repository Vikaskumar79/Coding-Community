<?php
include '_dbconnect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contactfname = $_POST['firstname'];
    $contact_num = $_POST['number'];
    $contactname = $_POST['Email'];
    $contactadd = $_POST['addr'];
    $cage = $_POST['age'];
    $cproblem = $_POST['problem'];

    $sql ="INSERT INTO `contact` ( `contact_name`, `contact_mob`, `contact_email`, `contact_address`, `contact_age`, `contact_problem`, `contact_time`) VALUES ( '$contactfname', '$contact_num ', '$contactname', '$contactadd  ', ' $cage', '$cproblem', current_timestamp())";
    $result = mysqli_query($conn, $sql);
    header("Location: /forums");
}
?>