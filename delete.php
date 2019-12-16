<?php
require_once 'conection.php'; 

if (isset($_POST['id'])) {

    $id = mysqli_real_escape_string($link, $_POST['id']);

    $query = "DELETE FROM Vakancies WHERE id = '$id'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    mysqli_close($link);

    header('Location: ./adminpage.php');
}

if (isset($_GET['id'])) {
    $id = htmlentities($_GET['id']);
    echo "<h2>Удалить запись?</h2>
        <form method='POST'>
        <input type='hidden' name='id' value='$id' />
        <input type='submit' value='Удалить'>
        </form>";
}
