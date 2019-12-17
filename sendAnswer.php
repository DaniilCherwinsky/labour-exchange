<?php 

require_once 'conection.php';

if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['job_id'])){

    $email = htmlentities(mysqli_real_escape_string($link, $_POST['email']));
    $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    $job_id = htmlentities(mysqli_real_escape_string($link, $_POST['job_id']));

    $query = "INSERT INTO response(Email, Name, JobId) VALUES('$email', '$name', $job_id)";
    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    
    mysqli_close($link);
    header("Location: ./index.php");
}
?>