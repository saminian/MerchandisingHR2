<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Performance Evaluation</title>
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
    
<div class="main-content">
        <h2>Performance Evaluation</h2>

        <div class="tab-buttons">
            <button class="tablinks" onclick="openTab(event, 'employeeList')">Employee List</button>
            <button class="tablinks" onclick="openTab(event, 'evaluatedEmployees')">Evaluated Employees</button>
        </div>

        <div id="employeeList" class="tabcontent">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <input type="text" id="searchBar" class="input" placeholder="Search for employees by name..." onkeyup="searchEmployees()">
                </div>
                <button id="addEmployeeBtn" class="add-employee" onclick="openAddEmployeeModal()">Add Employee</button>
            </div>

            <div class="table-container">
                <h2>Employee List</h2>
                <table id="employeeTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Performance Evaluation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Employee rows will be added here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div id="evaluatedEmployees" class="tabcontent" style="display:none;">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <input type="text" id="evaluatedSearchBar" class="input" placeholder="Search for evaluated employees by name..." onkeyup="searchEvaluatedEmployees()">
                </div>
            </div>
            <div class="table-container">
                <h2>Evaluated Employees</h2>
                <table id="evaluatedTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Additional Feedback</th>
                            <th>Total Percentage</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Evaluated employees will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div id="addEmployeeModal" class="employee-modal">
            <div class="employee-modal-content">
                <span class="close" onclick="closeAddEmployeeModal()">&times;</span>
                <h3>Add New Employee</h3>
                <label for="newEmployeeName">Name:</label>
                <input type="text" id="newEmployeeName" placeholder="Enter name">
                <label for="newEmployeeDepartment">Department:</label>
                <input type="text" id="newEmployeeDepartment" placeholder="Enter Department">
                <label for="newEmployeeEmail">Email:</label>
                <input type="email" id="newEmployeeEmail" required placeholder="Enter Email">
                <button class="button" onclick="addEmployee()">Add</button>
            </div>
        </div>

        <div id="performanceModal" class="performance-modal">
            <div class="performance-modal-content">
                <a href="evaluation.html"><span class="close" onclick="closeModal()">&times;</span></a>
                <h3>Performance Evaluation for <span id="employeeName"></span></h3>

                <table>
                    <tr>
                        <th></th>
                        <th>&nbsp;1</th>
                        <th>&nbsp;2</th>
                        <th>&nbsp;3</th>
                        <th>&nbsp;4</th>
                        <th>&nbsp;5</th>
                    </tr>
                    <tr>
                        <td>• Communication Skills:</td>
                        <td><input type="radio" name="communication" value="1"></td>
                        <td><input type="radio" name="communication" value="2"></td>
                        <td><input type="radio" name="communication" value="3"></td>
                        <td><input type="radio" name="communication" value="4"></td>
                        <td><input type="radio" name="communication" value="5"></td>
                    </tr>
                    <tr>
                        <td>• Teamwork:</td>
                        <td><input type="radio" name="teamwork" value="1"></td>
                        <td><input type="radio" name="teamwork" value="2"></td>
                        <td><input type="radio" name="teamwork" value="3"></td>
                        <td><input type="radio" name="teamwork" value="4"></td>
                        <td><input type="radio" name="teamwork" value="5"></td>
                    </tr>
                    <tr>
                        <td>• Punctuality:</td>
                        <td><input type="radio" name="punctuality" value="1"></td>
                        <td><input type="radio" name="punctuality" value="2"></td>
                        <td><input type="radio" name="punctuality" value="3"></td>
                        <td><input type="radio" name="punctuality" value="4"></td>
                        <td><input type="radio" name="punctuality" value="5"></td>
                    </tr>
                    <tr>
                        <td>• Customer Service:</td>
                        <td><input type="radio" name="customerService" value="1"></td>
                        <td><input type="radio" name="customerService" value="2"></td>
                        <td><input type="radio" name="customerService" value="3"></td>
                        <td><input type="radio" name="customerService" value="4"></td>
                        <td><input type="radio" name="customerService" value="5"></td>
                    </tr>
                    <tr>
                        <td>• Overall Job Performance:</td>
                        <td><input type="radio" name="jobPerformance" value="1"></td>
                        <td><input type="radio" name="jobPerformance" value="2"></td>
                        <td><input type="radio" name="jobPerformance" value="3"></td>
                        <td><input type="radio" name="jobPerformance" value="4"></td>
                        <td><input type="radio" name="jobPerformance" value="5"></td>
                    </tr>
                </table>

                <div class="padding-large">
                    <textarea class="rounded w-100" placeholder="Additional Comments..." id="comments" cols="30" rows="5"></textarea>
                    <center>
                        <button class="button" onclick="submitEvaluation()">Submit</button>
                    </center>
                </div>

                <div class="total-percentage-display">
                    <h4>Total Percentage: <span id="totalPercentage">0%</span></h4>
                </div>
            </div>
        </div>
    </div>


</body>
<script src="js/script.js"></script>
</html>


