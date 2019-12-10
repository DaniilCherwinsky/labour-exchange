<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="font.css">
    <link rel="stylesheet" href="style.css">
    <title>Биржа труда</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Job</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="#vacancies">Vakancies</a>
                <a class="nav-item nav-link" href="#">Pricing</a>
            </div>
        </div>
    </nav>

    <div class="cont container-fluid">
        <div class="row justify-content-center">
            <div class="info">
                <h2 id="clr">Best job search service<br>Open the road to a better life</h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="ico1 col-lg-4">
                <h2 id="forText">Search</h2>
                <p id="forTextP">Find a job suitable for you</p>
            </div>
            <div class="ico2 col-lg-4">
                <h2 id="forText">Resume for work</h2>
                <p id="forTextP">Ider resume and send to the employer</p>
            </div>
            <div class="ico3 col-lg-4">
                <h2 id="forText">Expect</h2>
                <p id="forTextP">Wait for a response to you resume</p>
            </div>
        </div>
    </div>
    <hr>

    <div class="registration container" id="vacancies">
        <?php
        require_once 'conection.php';

        $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

        $query = "SELECT * FROM Vakancies";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        if ($result) {
            $rows = mysqli_num_rows($result);

            //echo "<table><tr><th>City</th><th>Job</th><th>Salary</th><th>Time work</th><th></tr>";
            ?>
            <div class="row">
                <h1 id="vak">Vakancies</h1>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">City</th>
                            <th scope="col">Job</th>
                            <th scope="col">Salary, $</th>
                            <th scope="col">Time Work</th>
                            <th scope="col">Response</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        for ($i = 0; $i < $rows; ++$i) {
                            $row = mysqli_fetch_row($result);
                            echo "<tr>";
                            for ($j = 0; $j < 4; ++$j){
                                echo "<td>$row[$j]</td>";
                            }
                            echo "<td><button class=\"atuin-btn\">Response</button></td>";
                            echo "</tr>";
                        }
                        echo "</table>";

                        mysqli_free_result($result);
                    }

                    mysqli_close($link);


                    ?>
                    </tbody>
                </table>
            </div>
            
            <!--Modal Form-->
            <div id="myModal" class="modal row justify-content-start">
                    <form id="modal-content">
                    <span class="close">&times;</span>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Specialty</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your Specialty">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>