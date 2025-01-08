<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Select Role</title>
  <link rel="shortcut icon" href="/assets/images/pets.png" type="image/x-icon">

  <!-- Bootstrap CSS -->
  <link
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    rel="stylesheet" />
  <style>
    body,
    html {
      height: 100%; 
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    .main{
      height: 100vh;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      /* background-image: url(assets/images/bg-img.jpg); */
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .role-selection {
      text-align: center;
    }

    .circle-button {
      width: 350px;
      height: 350px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 20px;
      font-size: 30px;
      font-weight: bold;
      color: #fff;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .circle-button.user {
      background-image: url(assets/images/pet-owner.jpg);
      background-size: cover;
      color: #fff;
    }

    .circle-button.user:hover {
      background-color: #007bff;
      color: #fff;
    }

    .circle-button.doctor {
      background-image: url(assets/images/doctor-img.jpg);
      background-size: cover;
      color: #000;
    }

    .circle-button.doctor:hover {
      background-color: #1e7e34;
      color: #fff;

    }

  </style>
</head>

<body>
  <div class="main">
    <div class="role-selection">
      <h1 class="text-dark mb-5">Select Your Role</h1>
      <div class="d-flex justify-content-center">
        <a href="user_registration.php" class="circle-button user"> User </a>
        <a href="doctor_registration.php" class="circle-button doctor">
          Doctor
        </a>
      </div>
    </div>
  </div>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>