<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Trainee Status</title>
    <link rel="stylesheet" href="css/style.css">
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
            <button class="notification">
                <i class="fa-regular fa-bell" style="font-size: 20px;"></i>
            </button>

            <!-- Profile-->
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
                    <h3><i class="fas fa-user-check"></i>Employee Trainee Status</h3>
                </a>
            </div>
            <div class="main-content ">
                <h2>Training Assessment</h2>
                <div class="container1">
                    <div class="card1">
                        <img class="card-img-top" src="img/Meeting.png">
                        <h1>Meeting Link</h1>
                            <p> Training Seminar program</br>via zoom </p></br>
                        </br>
                            <a href="#" class="start-button">JOIN</a>      
                    </div>
                    
                    <div class="card1">
                        <img class="card-img-top1" src="img/typingtest.png" alt="">
                        <h1>Typing test</h1>
                            <p> Typing Test measures an individual's typing speed and accuracy.</p></br>
                    </br>
                            <a href="#" class="start-button">Start</a>
                    </div>
            
            
                    <div class="card1">
                        <img class="card-img-top1" src="img/product.jpg" alt="Typing Test Image">
                        <h1>Product Training</h1>
                        <p>employees with essential knowledge and skills to effectively understand, use, and promote a company's products</p>
                        <a href="#" class="start-button">Start</a>
                      </div>
                    </div>
                </section>
                </div>

</body>
<script src="js/script.js"></script>

</html>