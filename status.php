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
                    <h3><i class="fas fa-user-check"></i>Employee Trainee Status</h3>
                </a>
            </div>
                
            <div class="main-content">
                <h2>Employee trainee Status</h2>
                <div class="status-container">
                    <button class="add-status" onclick="openModal()">Add Status</button>
                    <h2>Employee trainee Status</h2>
                    <table class="statusTable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Training/Evaluation</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="statusTable">
                            <!-- Rows will be added here dynamically -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Add Status Modal -->
                <div class="modal" id="addStatusModal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>Add Status</h3>
                        </div>
                        <div class="modal-body">
                            <label>Status Name:</label>
                            <input type="text" id="statusName" required><br><br>
                            
                            <label>Department:</label>
                            <input type="text" id="department" required><br><br>
                            
                            <label>Position:</label>
                            <input type="text" id="position" required><br><br>
                            
                            <label>Training/Evaluation:</label>
                            <select id="training" required>
                                <option value="Training in Progress">Training in Progress</option>
                                <option value="Evaluation Pending">Evaluation Pending</option>
                                <option value="Completed">Completed</option>
                            </select>
                            
                            <label>Status:</label>
                            <select id="status" required>
                                <option value="Ongoing">Ongoing</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button class="close-btn" onclick="closeModal()">Close</button>
                            <button class="save-btn" onclick="addStatus()">Save</button>
                        </div>
                    </div>
                </div>

<script src="js/script.js"></script>
</body>
</html>