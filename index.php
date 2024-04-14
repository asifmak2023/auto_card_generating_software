<?php

// Connect to the Database 
include('config.php');

$insert = false;
$update = false;
$empty = false;
$delete = false;
$already_card = false;



if (isset($_GET['delete'])) {
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `cards` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_POST['snoEdit'])) {
    // Update the record
    $sno = $_POST["snoEdit"];
    $name = $_POST["nameEdit"];
    $fname = $_POST["fnameEdit"];
    $gender = $_POST["genEdit"];
    $forum = $_POST["forumEdit"];
    $id_no = $_POST["id_noEdit"];
    $town = $_POST["townEdit"];
    $phone = $_POST["phoneEdit"];
    $cnic = $_POST["cnicEdit"];

    // Sql query to be executed
    $sql = "UPDATE `cards` SET `name` = '$name' , `id_no` = '$id_no' , `fname` = '$fname' , `gender` = '$gender' , `forum` = '$forum' , `town` = '$town' , `cnic` = '$cnic' , `phone` = '$phone' WHERE `cards`.`sno` = $sno";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $update = true;
    } else {
      echo "We could not update the record successfully";
    }
  } else {
    $name = $_POST["name"];
    $fname = $_POST["fname"];
    $gender = $_POST['gender'];
    $forum = $_POST['forum'];
    $id_no = $_POST['id_no'];
    $town = $_POST['town'];
    $phone = $_POST['phone'];
    $cnic = $_POST['cnic'];



    if ($name == '' || $id_no == '') {
      $empty = true;
    } else {
      //Check that Card no. is Already Registerd or not.
      $querry = mysqli_query($conn, "SELECT * FROM cards WHERE id_no= '$id_no' ");
      if (mysqli_num_rows($querry) > 0) {
        $already_card = true;
      } else {


        // image upload 
        $uploaddir = 'assets/uploads/';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);


        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
        } else {
          echo "Possible file upload attack!\n";
        }
        // Sql query to be executed
        $sql = "INSERT INTO `cards`(`name`, `fname`, `gender`, `forum`, `id_no`, `town`, `phone` , `cnic`,`image`) VALUES ('$name','$fname','$gender','$forum','$id_no','$town','$phone','$cnic','$uploadfile')";

        // $sql = "INSERT INTO `cards` (`name`, `id_no`) VALUES ('$name', '$id_no')";
        $result = mysqli_query($conn, $sql);




        if ($result) {
          $insert = true;
        } else {
          echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
        }
      }
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="icon" type="image/png" href="assets/images/logo3.png " />
  <title>Registration Aitkaf Karachi 2024</title>

</head>

<body>


  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this card</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-row">
              <div class="col">
                <label for="name">Name :</label>
                <input type="text" class="form-control" id="nameEdit" name="nameEdit">
              </div>
              <div class="col">
                <label for="fname">Father Name :</label>
                <input type="text" class="form-control" id="fnameEdit" name="fnameEdit">
              </div>
            </div>
            <br>
            <div class="form-row">
              <div class="col">
                <label for="gender">Gender :</label>
                <select type="text" class="form-control" id="genEdit" name="genEdit">
                  <option selected>Choose...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="col">
                <label for="forum">Forum :</label>
                <select class="form-control" id="forumEdit" name="forumEdit">
                  <option selected>Choose...</option>
                  <option value="TMQ">TMQ</option>
                  <option value="PAT">PAT</option>
                  <option value="MWL">MWL</option>
                  <option value="MSM">MSM</option>
                  <option value="MYL">MYL</option>
                  <option value="MUC">MUC</option>
                  <option value="other">other..</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <br>
              <label for="town">Town</label>
              <select class="form-control" id="townEdit" name="townEdit">
                <option selected>Choose...</option>
                <option value="Baldia Town">Baldia Town</option>
                <option value="Bin Qasim Town">Bin Qasim Town</option>
                <option value="Gadap Town">Gadap Town</option>
                <option value="Gulberg Town">Gulberg Town</option>
                <option value="Gulshan Town">Gulshan Town</option>
                <option value="Jamshed Town">Jamshed Town</option>
                <option value="Keamari Town">Keamari Town</option>
                <option value="Korangi Town">Korangi Town</option>
                <option value="Korangi Town">Landhi Town</option>
                <option value="Liaquatabad Town">Liaquatabad Town</option>
                <option value="Lyari Town">Lyari Town</option>
                <option value="Malir Town">Malir Town</option>
                <option value="Nazimabad Town">Nazimabad Town</option>
                <option value="New Karachi Town">New Karachi Town</option>
                <option value="North Nazimabad Town">North Nazimabad Town</option>
                <option value="Orangi Town">Orangi Town</option>
                <option value="Saddar Town">Saddar Town</option>
                <option value="Malir Town">Malir Town</option>
                <option value="Shah Faisal Town">Shah Faisal Town</option>
                <option value="SITE Town">SITE Town</option>
                <option value="Surjani Town">Surjani Town</option>
              </select>
            </div>
            <div class="form-row">
              <div class="col">
                <label for="phone">Phone :</label>
                <input type="text" class="form-control" id="phoneEdit" name="phoneEdit">
              </div>
              <div class="col">
                <label for="cnic">Cnic</label>
                <input type="text" class="form-control" id="cnicEdit" name="cnicEdit">
              </div>
            </div>
            <br>
            <div class="form-group">
              <label for="id_no">ID Card Number:</label>
              <input class="form-control" id="id_noEdit" name="id_noEdit"></input>
            </div>
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Navigation bar start  -->
  <nav class="navbar navbar-light bg-light justify-content-center">
    <a class="navbar-brand" href="index.php">
      <img src="/itkaf/assets/images/logo3.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Home
    </a>
  </nav>
  <!-- Navigation bar end  -->

  <?php
  if ($insert) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Card has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($delete) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Card has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($update) {
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your Card has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($empty) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> The Fields Cannot Be Empty! Please Give Some Values.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if ($already_card) {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> This Card is Already Added.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <div class="jumbotron jumbotron-fluid ">
    <div class="container">
      <h1 class="display-4">Minhaj ul Quran Aitkaf Registration 2024</h1>
      <p class="lead">Aitkaf Registration Portal Karachi Division</p>
    </div>
  </div>
  <div class="container my-4">
    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      <i class="fa fa-plus"></i> Add New Card
    </button>
    <a href="id-card.php" class="btn btn-primary">
      <i class="fa fa-address-card"></i> Generate ID Card
    </a>
    </p>
    <div class="collapse" id="collapseExample">
      <div class="card card-body">

        <form method="POST" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="Name">Name</label>
              <input type="text" name="name" class="form-control" id="inputCity">
            </div>

            <div class="form-group col-md-6">
              <label for="inputCity">Father Name</label>
              <input type="text" name="fname" class="form-control" id="inputCity">
            </div>

            <div class="form-group col-md-6">
              <label for="inputState">Gender</label>
              <select name="gender" class="form-control">
                <option selected>Choose...</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="inputState">Forum</label>
              <select name="forum" class="form-control">
                <option selected>Choose...</option>
                <option value="TMQ">TMQ</option>
                <option value="PAT">PAT</option>
                <option value="MWL">MWL</option>
                <option value="MSM">MSM</option>
                <option value="MYL">MYL</option>
                <option value="MUC">MUC</option>
                <option value="other">other..</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="inputState">Town</label>
              <select name="town" class="form-control">
                <option selected>Choose...</option>
                <option value="Baldia Town">Baldia Town</option>
                <option value="Bin Qasim Town">Bin Qasim Town</option>
                <option value="Gadap Town">Gadap Town</option>
                <option value="Gulberg Town">Gulberg Town</option>
                <option value="Gulshan Town">Gulshan Town</option>
                <option value="Jamshed Town">Jamshed Town</option>
                <option value="Keamari Town">Keamari Town</option>
                <option value="Korangi Town">Korangi Town</option>
                <option value="Korangi Town">Landhi Town</option>
                <option value="Liaquatabad Town">Liaquatabad Town</option>
                <option value="Lyari Town">Lyari Town</option>
                <option value="Malir Town">Malir Town</option>
                <option value="Nazimabad Town">Nazimabad Town</option>
                <option value="New Karachi Town">New Karachi Town</option>
                <option value="North Nazimabad Town">North Nazimabad Town</option>
                <option value="Orangi Town">Orangi Town</option>
                <option value="Saddar Town">Saddar Town</option>
                <option value="Malir Town">Malir Town</option>
                <option value="Shah Faisal Town">Shah Faisal Town</option>
                <option value="SITE Town">SITE Town</option>
                <option value="Surjani Town">Surjani Town</option>
              </select>
            </div>

            <div class="form-group col-md-6">
              <label for="inputZip">CNIC</label>
              <input type="text" name="cnic" class="form-control">
            </div>

          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="id_no">ID Card No.</label>
              <input class="form-control" id="id_no" name="id_no"></input>
            </div>
            <div class="form-group col-md-6">
              <label for="phone">Phone No.</label>
              <input class="form-control" id="phone" name="phone"></input>
            </div>
            <div class="form-group col-md-4">
              <label for="photo">Photo</label>
              <input type="file" name="image" />
            </div>
          </div>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add Card</button>
        </form>
      </div>
    </div>

    <div class="container my-4">


      <table class="table" id="myTable">
        <thead>
          <tr>
            <th scope="col">S.No</th>
            <th scope="col">Name</th>
            <th scope="col">Father Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Forum</th>
            <th scope="col">Card Number</th>
            <th scope="col">Town</th>
            <th scope="col">Phone/Mobile No.</th>
            <th scope="col">CNIC</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `cards` order by 1 DESC";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>" . $sno . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['fname'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['forum'] . "</td>
            <td>" . $row['id_no'] . "</td>
            <td>" . $row['town'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['cnic'] . "</td>
            <td> <button class='edit btn btn-sm btn-outline-primary' id=" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-outline-danger' id=d" . $row['sno'] . ">Delete </button>  </td>
          </tr>";
          }
          ?>


        </tbody>
      </table>
    </div>
    <hr>
    <a href="https://www.facebook.com/ASIFENTERPRISES20" type="button" class="btn btn-success btn-lg btn-block" target="_blank">
      <div class="spinner-grow text-danger" role="status">
        <span class="visually-hidden"></span>
      </div>
      <div class="spinner-grow text-danger" role="status">
        <span class="visually-hidden"></span>
      </div>
      <b>Please Follow and Share [ Asif Enterprises phone : 0330-3696062 / 0321-2364024 ]</b>
      <div class="spinner-grow text-danger" role="status">
        <span class="visually-hidden"></span>
      </div>
      <div class="spinner-grow text-danger" role="status">
        <span class="visually-hidden"></span>
      </div>  
    </a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#myTable').DataTable();

      });
    </script>
    <script>
      edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
          console.log("edit ");
          tr = e.target.parentNode.parentNode;
          name = tr.getElementsByTagName("td")[0].innerText;
          fname = tr.getElementsByTagName("td")[1].innerText;
          gender = tr.getElementsByTagName("td")[2].innerText;
          forum = tr.getElementsByTagName("td")[3].innerText;
          id_no = tr.getElementsByTagName("td")[4].innerText;
          town = tr.getElementsByTagName("td")[5].innerText;
          phone = tr.getElementsByTagName("td")[6].innerText;
          cnic = tr.getElementsByTagName("td")[7].innerText;
          // console.log(name, id_no, fname, gender, forum);
          nameEdit.value = name;
          fnameEdit.value = fname;
          genEdit.value = gender;
          forumEdit.value = forum;
          id_noEdit.value = id_no;
          townEdit.value = town;
          phoneEdit.value = phone;
          cnicEdit.value = cnic;
          snoEdit.value = e.target.id;
          console.log(e.target.id)
          $('#editModal').modal('toggle');
        })
      })

      deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
          console.log("edit ");
          sno = e.target.id.substr(1);

          if (confirm("Are you sure you want to delete this note!")) {
            console.log("yes");
            window.location = `index.php?delete=${sno}`;
            // TODO: Create a form and use post request to submit a form
          } else {
            console.log("no");
          }
        })
      })
    </script>
    <style>

    </style>
</body>

</html>