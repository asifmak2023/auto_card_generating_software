<?php
$notfound = false;
include 'config.php';
$html = '';
if (isset($_POST['search'])) {

    $id_no = $_POST['id_no'];

    $sql = "Select * from cards where id_no='$id_no' ";

    $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) > 0) {
        $html = "<div class='card' style='width:350px; padding:0;' >";

        $html .= "";
        while ($row = mysqli_fetch_assoc($result)) {

            $name = $row["name"];
            $fname = $row["fname"];
            $gender = $row["gender"];
            $forum = $row["forum"];
            $card_no = $row['id_no'];
            $town = $row['town'];
            $phone = $row['phone'];
            $cnic = $row['cnic'];
            $image = $row['image'];

            $html .= "
                                                        <!-- second id card  -->
                                                        <div class='container'>
                                                        <div class='header'>
                                                                                                                      
                                                        </div>
                                                        <br>
                                                        <div class='row'>
                                                          <div class='col-md-3'>
                                                            <div class='thumbnail profile1'>
                                                                <img src='$image' alt='Lights' style='width:100%; border:1px solid black'>
                                                              </a>
                                                            </div>
                                                          </div>
                                                          <div class='col-md-5'>
                                                            
                                                          <table class=`table`>
                                                          <tr class=`king`>
                                                            <th scope=`col`>$name </th>
                                                          </tr>
                                                          <tr class=`king`>
                                                            <th scope=`col`>$forum / $gender </th>
                                                          </tr>
                                                          <tr class=`king`>
                                                            <td scope=`col`>Father Name : $fname
                                                          </tr>
                                                          <tr class=`king`>
                                                            <td scope=`col`>Card Number : $id_no</td>
                                                          </tr>          
                                                          <tr class=`king`>
                                                            <td scope=`row`>Town : $town </td>
                                                          </tr>
                                              
                                                          <tr>
                                                            <td>Phone No. : $phone</td>
                                                          </tr>
                                                          <tr>
                                                            <td scope=`row`>CNIC No. : $cnic</td>
                                                            </tr>
                                                        </tbody>
                                                      </table>

                                                          </div>
                                                          <div class='col-md-2'>
                                                            <div class='thumbnail'>
                                                              
                                                                <img src='assets/images/logo3.png' alt='Fjords' style='width:150%;'>
                                                      
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                                  <!-- id card end -->
                                                        ";
        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="images/favicon.png" />
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="icon" href="assets/images/logo3.png" />
    <title>Registration Aitkaf Karachi 2024</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">



    <style>
        tr {
            font-family: Arial, Helvetica, sans-serif
        }

        body {
            font-family: 'arial';
        }







        /* second id card  */

        
        .container {
            width: 700px;
            height: 400px;
            margin: auto;
            background-color: white;
            box-shadow: 0 1px 10px rgb(146 161 176 / 50%);
            overflow: hidden;
            border-radius: 10px;
        }

        .header {
            /* border: 2px solid black; */
            width: 650px;
            height: 115px;
            margin: 10px auto;
            background-color: white;
            box-shadow: 0 1px 10px rgb(146 161 176 / 50%);
            border-radius: 10px;
            background-repeat: no-repeat;
            background-color: white;
            background-image: url(assets/images/logo10.png);
            background-size: 75%;
            background-position: center;
            overflow: hidden;
            font-family: 'Poppins', sans-serif;
        }




        .profile1 {
            width: 100%;
        }

        .card {
            border: none;
            background-color: #e3f2fd;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.js"></script>
</head>

<body>

    <!-- Navigation bar start  -->
    <nav class="navbar navbar-light bg-light justify-content-center">
        <a class="navbar-brand" href="index.php">
            <img src="/itkaf/assets/images/logo3.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Home
        </a>
    </nav>
    <!-- Navigation bar end  -->

    <br>

    <div class="row" style="margin: 0px 20px 5px 20px">
        <div class="col-sm-6">
            <div class="card jumbotron">
                <div class="card-body">
                    <form class="form" method="POST" action="id-card.php">.
                        <label for="exampleInputEmail1">Student Id Card No.</label>
                        <input class="form-control mr-sm-2" type="search" placeholder="Enter Id Card No." name="id_no">
                        <small id="emailHelp" class="form-text text-muted">Every student's should have unique Id no.</small>
                        <br>
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit" name="search">Generate</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="alert alert-warning alert-dismissible fade show text-dark" role="alert">
                    <strong>Here is your Id Card</strong>
                    <button type="button" class="close" data-dismixss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body" id="mycard">
                    <?php echo $html ?>
                </div>
                <br>

            </div>
        </div>
        <hr>
        <div class="d-flex flex-column">
            <button id="demo" class="downloadtable btn-lg btn-primary p-2" onclick="downloadtable()"> Download Id Card &nbsp;<i class="bi bi-download"></i></button>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <script>
            function downloadtable() {

                var node = document.getElementById('mycard');

                domtoimage.toPng(node)
                    .then(function(dataUrl) {
                        var img = new Image();
                        img.src = dataUrl;
                        downloadURI(dataUrl, "staff-id-card.png")
                    })
                    .catch(function(error) {
                        console.error('oops, something went wrong', error);
                    });

            }



            function downloadURI(uri, name) {
                var link = document.createElement("a");
                link.download = name;
                link.href = uri;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                delete link;
            }
        </script>
</body>

</html>