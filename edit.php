<?php
require_once 'conection.php'; 
     

if(isset($_POST['city']) && isset($_POST['job']) && isset($_POST['salary']) && isset($_POST['timework'])){
    
    $id = mysqli_real_escape_string($link, $_POST['id']);
    $city = htmlentities(mysqli_real_escape_string($link, $_POST['city']));
    $job = htmlentities(mysqli_real_escape_string($link, $_POST['job']));
    $salary = htmlentities(mysqli_real_escape_string($link,$_POST['salary']));
    $timework = htmlentities(mysqli_real_escape_string($link,$_POST['timework']));
     
    $query ="UPDATE Vakancies SET city='$city', job='$job', salary='$salary', timework='$timework' WHERE id='$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
}
 

if(isset($_GET['id']))
{   
    $id = htmlentities(mysqli_real_escape_string($link, $_GET['id']));
     
    
    $query ="SELECT * FROM Vakancies WHERE id = '$id'";
    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); 
        $city = $row[1];
        $job = $row[2];
        $salary = $row[3];
        $timework = $row[4];
         
        echo "<h2>Изменить модель</h2>
            <form method='POST'>
            <input type='hidden' name='id' value='$id' />
            <p>Введите Город:<br> 
            <input type='text' name='city' value='$city' /></p>
            <p>Введите специальность: <br> 
            <input type='text' name='job' value='$job' /></p>
            <p>Введите специальность: <br> 
            <input type='text' name='salary' value='$salary' /></p>
            <p>Введите специальность: <br> 
            <input type='text' name='timework' value='$timework' /></p>
            <input type='submit' value='Сохранить'>
            </form>";
         
        mysqli_free_result($result);
    }
}

mysqli_close($link);
header('Location: ./adminpage.php');
?>