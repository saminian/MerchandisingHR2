<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Statistics</title>
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

            <!-- Profile -->
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
                <h2>Attendance Statistics</h2>
                <!--Para sa Attendance-->
                <div id="attendanceModal" class="modal-attendance">
                    <div class="attendancemodal-content">
                        <span class="close" id="closeModal">&times;</span>
                        <h2>Attendance Form</h2>
                        <form id="attendanceForm">
                            <label for="employeeName">Employee Name</label>
                            <input type="text" id="employeeName" required>
        
                            <label for="department">Department</label>
                            <input type="text" id="department" required>
        
                            <label for="halfday">Half Day</label>
                            <input type="checkbox" id="halfday">
        
                            <label for="timein">Time In</label>
                            <input type="time" id="timein" required>
        
                            <label for="timeout">Time Out</label>
                            <input type="time" id="timeout" required>
        
                            <label for="late">Late (Minutes)</label>
                            <input type="number" id="late" required>
        
                            <button type="submit" class="btn-primary">Submit</button>
                            <button type="button" class="btn-primary" id="closeModalBtn">Cancel</button>
                        </form>
                    </div>
                </div>
                <div class="stats-container">
                    <div id="attendanceStats">
                        <button class="btn-primary" id="openModalBtn">Mark Attendance</button>
                        <p>Total Employees: <span id="totalEmployees">0</span></p>
                        <p>Half Day: <span id="halfDayCount">0</span></p>
                        <p>Late Count: <span id="lateCount">0</span></p>
                    </div>

                <div class="attendancetable-container">
                <table class="attendance" id="attendanceTable">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Department</th>
                            <th>Half Day</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Late Minutes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows will be inserted here dynamically -->
                    </tbody>
                </table>
            </div>
        </main>
    <script>let totalEmployees = 0;
        let halfDayCount = 0;
        let lateCount = 0;
        
        document.getElementById("openModalBtn").onclick = function() {
            document.getElementById("attendanceModal").style.display = "flex";
        }
        
        document.getElementById("closeModal").onclick = function() {
            document.getElementById("attendanceModal").style.display = "none";
        }
        
        document.getElementById("closeModalBtn").onclick = function() {
            document.getElementById("attendanceModal").style.display = "none";
        }
        
        document.getElementById("attendanceForm").addEventListener("submit", function(e) {
            e.preventDefault(); 
        
            // Get form values
            const employeeName = document.getElementById("employeeName").value;
            const department = document.getElementById("department").value;
            const halfDay = document.getElementById("halfday").checked;
            const timeIn = document.getElementById("timein").value;
            const timeOut = document.getElementById("timeout").value;
            const late = parseInt(document.getElementById("late").value) || 0;
        
            // Update statistics
            totalEmployees++;
            if (halfDay) halfDayCount++;
            if (late > 0) lateCount++;
        
            // Insert data 
            const table = document.getElementById("attendanceTable").getElementsByTagName("tbody")[0];
            const newRow = table.insertRow();
            newRow.insertCell(0).innerHTML = employeeName;
            newRow.insertCell(1).innerHTML = department;
            newRow.insertCell(2).innerHTML = halfDay ? "Yes" : "No";
            newRow.insertCell(3).innerHTML = timeIn;
            newRow.insertCell(4).innerHTML = timeOut;
            newRow.insertCell(5).innerHTML = late;
        
            
            document.getElementById("totalEmployees").innerText = totalEmployees;
            document.getElementById("halfDayCount").innerText = halfDayCount;
            document.getElementById("lateCount").innerText = lateCount;
        
            
            document.getElementById("attendanceModal").style.display = "none";
        
            document.getElementById("attendanceForm").reset();
        });
        

    </script>
</body>
<script src="js/script.js"></script>
</html>