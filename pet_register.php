<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Pet Registration</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
  <link rel="shortcut icon" href="/assets/images/pets.png" type="image/x-icon">


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Fonts and icons -->
  <script src="/assets/js/dashboard_js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["/assets/css/dashboard_css/fonts.min.css"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

  <!-- CSS Files -->
  <link rel="stylesheet" href="/assets/css/dashboard_css/bootstrap.min.css" />
  <link rel="stylesheet" href="/assets/css/dashboard_css/plugins.min.css" />
  <link rel="stylesheet" href="/assets/css/dashboard_css/kaiadmin.min.css" />
  <!-- <link rel="stylesheet" href="//assets/css/dashboard_css/"> -->

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="/assets/css/dashboard_css/demo.css" />

</head>

<body>
  <div class="wrapper">

    <?php
    include("common/sidebar.php");

    if (isset($_POST['submit'])) {
      $petname = $_POST['petname'];
      $species = $_POST['species'];
      $breed = $_POST['breed'];
      $dob = $_POST['dob'];
      $gender = $_POST['gender'];
      $color = $_POST['color'];
      $weight = $_POST['weight'];
      $color = $_POST['color'];
      $image = $_FILES['image']['name'];
      $medical = $_POST['medical'];
      $note = $_POST['notes'];
      $user_id = $row['user_id'];
      $tempname = $_FILES["image"]["tmp_name"];
      $check = "SELECT * FROM pets WHERE name='$petname';";

      $check_result = mysqli_query($conn, $check);

      if (mysqli_num_rows($check_result) > 0) {
        echo "<script>alert('Pet Already Exists');
        window.location.href='pet_register.php'</script>";
      } else {

        $folder = "assets/images/pets/" . basename($image);

        $sql = "INSERT INTO pets (name,`type`,breed,dob,gender,color,weight,image,medical,note,user_id,status) VALUES ('$petname', '$species', '$breed','$dob', '$gender', '$color', '$weight', '$image', '$medical', '$note', '$user_id','active');";

        $insert = mysqli_query($conn, $sql);

        if ($insert) {
          if (move_uploaded_file($tempname, $folder)) {
            echo "<script>alert('$petname Added Successfully');
            window.location.href='main-dashboard.php'</script>";
          } else {
            echo "<script>alert('Error Uploading Image');
            window.location.href='pet_register.php'</script>";
          }
        } else {
          echo "<script>alert('Error occurred while Registering pet');
          window.location.href='pet_register.php'</script>";
        }
      }


    }
    ?>

    <div class="container">
      <div class="page-inner">
        <div class="page-header">
          <h3 class="fw-bold mb-3">Pet Registration</h3>

        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">Pet Information</div>
              </div>
              <div class="card-body">
                <form id="pets" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="petname">Pet Name</label>
                        <input type="text" class="form-control" id="petname" name="petname"
                          placeholder="Enter Your Pet Name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="species">Pet Species</label>
                        <select name="species" onchange="EnableDisableTextBox(this)" class="form-select" id="ddlModels">
                          <option value="">Select Species</option>
                          <option value="Dog">Dog</option>
                          <option value="Cat">Cat</option>
                          <option value="Bird">Bird</option>
                          <option value="Reptile">Reptile</option>
                        </select>


                      </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="breed">Breed : </label>
                        <input type="text" name="breed" placeholder="Enter Pet's Breed" id="breed" class="form-control">
                      </div>
                    </div>



                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="dob">Date of Birth :</label>
                        <input type="date" name="dob" id="dob" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Gender</label><br />
                        <div class="d-flex">
                          <div class="form-check">
                            <input class="form-check-input" type="radio" value="male" name="gender" id="gender" />
                            <label class="form-check-label" for="male">
                              Male
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female" />
                            <label class="form-check-label" for="female">
                              Female
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="color">Color</label>
                        <input type="text" name="color" id="color" placeholder="Enter Pet Color" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="number" name="weight" id="weight" placeholder="Enter Pet Weight in Kgs"
                          class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="image">Pet Image : </label>
                        <input type="file" name="image" id="image" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="medical">Medical Condition :</label>
                        <textarea name="medical" id="medical" rows="5" class="form-control"></textarea>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="notes">Additional Note :</label>
                        <textarea name="notes" id="notes" rows="5" class="form-control"></textarea>
                      </div>

                    </div>
                  </div>
                  <div class="card-action">
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    <button class="btn btn-danger" type="reset">Reset</button>
                  </div>
                </form>
              </div>



            </div>
          </div>
        </div>
      </div>

      <?php
      include("common/footer.php");

      ?>
    </div>


  </div>

  <script src="assets/jquery/jquery-3.7.1.min.js"></script>
  <script src="assets/jquery/jquery.validate.min.js"></script>
  <script src="assets/jquery/jquery-ui.min.js"></script>
  <script src="assets/js/pet_register_js/script.js"></script>