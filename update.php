<?php
include 'connect.php';

$id = $_GET['id'];
  $query = "SELECT * FROM train WHERE id='$id'";
  $data = mysqli_query($con,$query);
  
  $result = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Schedule</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body style="overflow: hidden;">
    <nav class="d-flex bg-primary border-color border-bottom flex-align-center padding-medium view-height-10 justify-content-between nav-shadow">
        <div class="d-flex flex-align-center">
            <button onclick="onToggle()" class="btn border-none bg-transparent">
                <img src="img/menu.png" height="20" width="30" alt="menu">
            </button>
            <a href=""><img src="img/gwamlogo.png" width="40" alt="logo"></a>
            <span><h3>Great Wall Art</h3></span>
        </div>

        <div class="navbar-right ml-auto">
            <!-- Font Awesome bell icon -->
            <button class="notification">
                <i class="fa-regular fa-bell" style="font-size: 20px;"></i>
            </button>

            <!-- Profile Icon with Dropdown -->
            <div class="dropdown">
                <a href="#" onclick="toggleDropdown()" id="profile-icon">
                    <img src="img/gwamlogo.png" alt="profile" width="27" height="27" class="border-radius-full">
                </a>
                <div id="profileDropdown" class="dropdown-content">
                    <a href="#">HR DEPT.</a>
                    <a href="index.php">Log Out</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex bg-primary view-height-100">
            <div id="sidebar" class="sidebar text-black border-right text-center border-color"></br>
                <a href="dashboard.php" class="dashboard">
                    <h1><i class="fas fa-tachometer-alt"></i>Dashboard</h1>
                </a>
                <h2>Learning Management</h2>
                <hr class="border-color border-bottom seperator">
                <a href="schedule.php" class="text-black">
                    <h3><i class="fas fa-calendar-alt"></i> Training Schedule</h3>
                </a>
                <a href="assessment.html" class="text-black">
                    <h3><i class="fas fa-file-alt"></i> Training Assessment</h3>
                </a></br>
                <h2>Performance Management</h2>
                <hr class="border-color border-bottom seperator">
                <a href="attendancestat.html" class="text-black">
                    <h3><i class="fas fa-users"></i> Attendance Statistics</h3>
                </a>
                <a href="performancestats.html" class="text-black">
                    <h3><i class="fas fa-chart-line"></i> Performance Statistics</h3>
                </a>
                <a href="evaluation.html" class="text-black">
                    <h3><i class="fas fa-star"></i> Performance Evaluation</h3>
                </a>
                <a href="status.html" class="text-black">
                    <h3><i class="fas fa-user-check"></i>Employee Trainee Status</h3>
                </a>
    </div>
    <div class="main-content">
<div class="container">
<a href="schedule.php"><span class="close1">x</span></a> 
            <h2>Update Trainee</h2>
            <form action="#" method="POST" enctype="multipart/form-data">
                <input type="text" id="" name="name" value="<?php echo $result['emname'];?>" required placeholder="Name">
                <input type="text" id="" name="depart" value="<?php echo $result['depart'];?>" required placeholder="Department">
                <input type="email" id="" name="email" value="<?php echo $result['email'];?>" required placeholder="Email"><br><br>
                <button class="button button2" style="width: 87%; margin-left: 30px;" name="submit">Update Traine</button>
            </form><br> 
        </div>
<div id="successModal" class="custom-modal">
    <div class="custom-modal-content">
        <span class="close" onclick="closeSuccessModal()">&times;</span>
        <h2>Update Successful!</h2>
        <p>The trainee's information has been updated.</p>
        <button onclick="redirectToSchedule()" class="btn">OK</button>
    </div>
</div>
      
    <?php
   if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $depart = $_POST['depart'];
    $email = $_POST['email'];

    $update = "UPDATE train SET emname='$name',depart='$depart', email='$email' where id='$id'";
    $up = mysqli_query($con,$update);
    
    if (!$up) {
        echo "<script>alert('Update failed: " . mysqli_error($con) . "');</script>";
    } else {
        // Show success message modal
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('successModal').style.display = 'block';
            });
        </script>";
    }
}
?>
<script src="js/script.js"></script>
</body>
</html>