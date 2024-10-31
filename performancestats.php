<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Statistics</title>
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
            <h2>Performance Statistics</h2>

        <div class="tab-buttons">
            <button class="tablinks" onclick="openTab(event, 'traineeCompletedTab')">Trainee Completed</button>
            <button class="tablinks" onclick="openTab(event, 'evaluatedEmployeeTab')">Evaluated Employees</button>
        </div>
     
            <div id="traineeCompletedTab" class="tabcontent" style="display:block;">
                <h2>Trainee Complete</h2>
                    <p>List of trainees who have completed their training sessions:</p>
                        <table class="trainee">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>Training Assigned</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>HR</td>
                                    <td>Typing test</td>
                                    <td>Completed</td>
                                </tr>
                             </tbody>
                        </table>
                   </div>
                
                    <div id="evaluatedEmployeeTab" class="tabcontent" style="display:none;">
                        <h2>Employee Evaluated</h2>
                        <p>Performance evaluation summary:</p>
                        <table class="trainee">
                            <thead>
                                <tr>
                                    <th>Employee</th>
                                    <th>Department</th>
                                    <th>Total Average (%)</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Alice</td>
                                    <td>HR</td>
                                    <td>65</td>
                                    <td class="category"></td>
                                </tr>
                                <tr>
                                    <td>David</td>
                                    <td>IT</td>
                                    <td>55</td>
                                    <td class="category"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <script>
                // Open Tab Functionality
                function openTab(evt, tabName) {
                    // Hide all tabs
                    const tabs = document.querySelectorAll(".tabcontent");
                    tabs.forEach(tab => {
                        tab.style.display = "none"; // Ensure all tabs are hidden
                    });
                
                    // Remove active class from all buttons
                    const tablinks = document.getElementsByClassName("tablinks");
                    for (let i = 0; i < tablinks.length; i++) {
                        tablinks[i].classList.remove("active");
                    }
                
                    // Show the selected tab
                    const activeTab = document.getElementById(tabName);
                    if (activeTab) {
                        activeTab.style.display = "block"; // Show the active tab
                    }
                    evt.currentTarget.classList.add("active"); // Add active class to the clicked button
                }
                
                // Function to categorize performance based on Total Average
                function categorizePerformance() {
                    const rows = document.querySelectorAll("#evaluatedEmployeeTab tbody tr");
                    rows.forEach(row => {
                        const average = parseInt(row.cells[2].textContent);
                        const categoryCell = row.cells[3];
                        if (average >= 60) {
                            categoryCell.textContent = "Highest";
                            categoryCell.style.color = "green";
                        } else {
                            categoryCell.textContent = "Lowest";
                            categoryCell.style.color = "red";
                        }
                    });
                }
                
                // Load default tab and categorize performance on page load
                document.addEventListener("DOMContentLoaded", () => {
                    categorizePerformance(); // Categorize performance
                });
                </script>
  <script src="js/script.js"></script>
</body>
</html>