<?php
include 'connect.php';

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $depart = $_POST['depart'];
    $email = $_POST['email'];

    $insert = mysqli_query($con, "insert into train (emname,depart,email) values ('$name','$depart','$email')");

}
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
                <h2>Training Schedule</h2>

    <div class="tab-buttons">
        <button id="traineeTabBtn" onclick="openTab('traineeListTab')">Trainee List</button>
        <a href="task.php"><button id="scheduleTabBtn">View Scheduled Trainee</button></a>
    </div>

    <!-- Tab Content -->
    <div id="traineeListTab" class="tab-content">
        <h3>Trainee List</h3>
        <button class="button button1" onclick="openNewTraineeModal()" id="myBtn">Add New Trainee</button>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="traineeViewList">
                <?php
                include 'connect.php';
                $add = "SELECT * FROM train";
        $sql = mysqli_query($con,$add);
        while($row = mysqli_fetch_assoc($sql)) {
              echo "<tr>";
              echo "<td>".$row['emname']."</td>";
              echo "<td>".$row['depart']."</td>";
              echo "<td>".$row['email']."</td>";
              echo '<td>
                <a href="adsched.php?id='.$row['id'].'"><button><i class="fas fa-calendar-plus"></i></button></a>
                <a href="update.php?id='.$row['id'].'"><button><i class="fas fa-edit"></i></button></a>
                <a href="delsched.php?id='.$row['id'].'" role="button""><button><i class="fas fa-trash-alt"></i></button></a>
              </td>';
        }
                ?>
                    <!-- Trainees will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- View Scheduled Trainee Tab -->
    <div id="scheduleListTab" class="tab-content" style="display:none;">
        <h3>View Scheduled Trainee</h3>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Email</th>
                        <th>Assigned Training</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="scheduledEmployeesTable">
                    <!-- Scheduled employees-->
                </tbody>
            </table>
        </div>
    </div>


    <!-- New Trainee Modal -->
    <div class="modal" id="myModal" style="display:none;">
        <div class="modal-content" style="margin-left: 500px; margin-top: 200px;">
            <span class="close">&times;</span>
            <h2>Add New Trainee</h2>
            <form action="schedule.php" method="POST" enctype="multipart/form-data">
                <input type="text" id="" name="name" required placeholder="Name">
                <input type="text" id="" name="depart" required placeholder="Department">
                <input type="email" id="" name="email" required placeholder="Email">
                <button class="button button2" name="submit" style="margin-left: 0;">Add Trainee</button>
            </form>
        </div>
     </div>
        <script>
     var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
    

  <script src="js/script.js"></script>
  <script src="js/script2.js"></script>
</body>
</html>