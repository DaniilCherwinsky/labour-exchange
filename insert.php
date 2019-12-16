<?php
require_once 'conection.php'; 
 
if(isset($_POST['city']) && isset($_POST['job']) && isset($_POST['salary']) && isset($_POST['timework'])){

     
    
    $city = htmlentities(mysqli_real_escape_string($link, $_POST['city']));
    $job = htmlentities(mysqli_real_escape_string($link, $_POST['job']));
    $salary = htmlentities(mysqli_real_escape_string($link,$_POST['salary']));
    $timework = htmlentities(mysqli_real_escape_string($link,$_POST['timework']));

     
    
    $query ="INSERT INTO Vakancies(City, Job, Salary, `Time Work`) VALUES('$city','$job', '$salary', '$timework')";
     
    
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    
    mysqli_close($link);
    header('Location: ./adminpage.php');
}
?>

<h2>Добавить новую вакансию</h2>
<form method="POST">
<p>Введите Город:<br> 
<input type="text" name="city"/></p>
<p>Введите должность:<br> 
<input type="text" name="job"/></p>
<p>Введите зарплату:<br> 
<input type="text" name="salary"/></p>
<p>Введите время работы:<br> 
<input type="text" name="timework"/></p>
<input type="submit" value="Добавить">
</form>
