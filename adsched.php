<?php
include 'connect.php';

$id = $_GET['id'];
  $query = "SELECT * FROM train where id='$id'";
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
                <a href="assessment.php" class="text-black">
                    <h3><i class="fas fa-file-alt"></i> Training Assessment</h3>
                </a></br>
                <h2>Performance Management</h2>
                <hr class="border-color border-bottom seperator">
                <a href="attendancestat.php" class="text-black">
                    <h3><i class="fas fa-users"></i> Attendance Statistics</h3>
                </a>
                <a href="performancestats.php" class="text-black">
                    <h3><i class="fas fa-chart-line"></i> Performance Statistics</h3>
                </a>
                <a href="evaluation.php" class="text-black">
                    <h3><i class="fas fa-star"></i> Performance Evaluation</h3>
                </a>
                <a href="status.php" class="text-black">
                    <h3><i class="fas fa-user-check"></i>Employee trainee Status</h3>
                </a>
    </div>
    <div class="main-content">
    <div class="container"><br>
           <a href="schedule.php"><span class="close1">x</span></a>
            <h2>Assign Task and Schedule</h2>
            <form action="" method="post">
                <input type="text" name="name" value="<?php echo $result['emname'];?>" readonly>
                <input type="text" name="depart" value="<?php echo $result['depart'];?>" readonly>
                <input type="email" name="email" value="<?php echo $result['email'];?>" readonly>

                <label for="task">Select Training:</label>
                <select id="task" name="task" style="width: 430px;" required>
                    <option value="" disabled selected>Select a task</option>
                    <option value="Typing test">Typing test</option>
                    <option value="24 personality test">24-Personality test</option>
                    <option value="Task 3">Task 3</option>
                    <option value="Task 4">Task 4</option>
                    <option value="Task 5">Task 5</option>
                </select>

                <input type="date" id="date" name="date" required>
                <input type="time" id="time" name="time" required>
                <button class="button button2" style="width: 87%; margin-left: 30px;" name="submit">Assign Training</button>
            </form>
    </div>
    <div id="successModal" class="custom-modal">
    <div class="custom-modal-content">
        <span class="close" onclick="closeSuccessModal()">&times;</span>
        <h2>Scheduling Successful!</h2>
        <p>Schedule has been successfully created</p>
        <button onclick="redirectToTasks()" class="btn">OK</button>
    </div>
</div>
    <?php
    include 'connect.php';
    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $depart = $_POST['depart'];
        $email = $_POST['email'];
        $task = $_POST['task'];
        $date = $_POST['date'];
        $time =$_POST['time'];

        $insert = mysqli_query($con, "insert into adtask (name,depart,email,task,date,time) values ('$name','$depart','$email','$task','$date','$time')");
       
        if($insert) {
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