<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styleAdmin.css">   
    <title>AdminPage</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1>Admin Page</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h1>Job postings</h1>
        <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Name User</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">City</th>
                        <th scope="col">Job</th>
                        <th scope="col">Salary, $</th>
                        </tr>
                    </thead>
            <tbody>
                <tr>
                        <td>Daniil</td>
                        <td>@mail.daniil</td>
                        <td>Brest</td>
                        <td>Front-end developer</td>
                        <td>900</td>
                </tr>
            </tbody>
        </table>
            </div>
            <div class="col-lg-6">
            <?php
        require_once 'conection.php';


        $query = "SELECT * FROM Vakancies";

        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {
            $rows = mysqli_num_rows($result);}
            ?>

            <div class="row">
                <h1 id="vak" class="mb-2">Vakancies</h1>
                <a id = "addButton" class="mb-2" href="./insert.php">add</a>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">City</th>
                            <th scope="col">Job</th>
                            <th scope="col">Salary, $</th>
                            <th scope="col">Time Work</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0; $i < $rows; ++$i) {
                            $row = mysqli_fetch_row($result);
                            echo "<tr>";
                            for ($j = 1; $j < 5; ++$j){
                                echo "<td>$row[$j]</td>";
                            }
                            echo "<td><a href=\"edit.php?id=$row[0]\" id=\"buttonDel\">edit</a></td>";
                            echo "<td><a href=\"delete.php?id=$row[0]\" id=\"buttonDel\">del</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";

                        mysqli_free_result($result);
                    

                    mysqli_close($link);


                    ?>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>