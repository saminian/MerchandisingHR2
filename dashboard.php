<?php
session_start();

// Check if the user is logged in, if not redirect them to login page
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gwamerchandise</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
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
            <div class="main text-black1" style="overflow: auto; padding-bottom: 100px;">
                <h1>Dashboard</h1>
                <div class="d-flex flex-gap">
                    <div class="card bg-primary1 padding-large ">
                        <span class="text-bold">Total New Hired</span> <span
                            class="text-bold padding-small bg-green round-sm "> ↗ 0%</span>
                        <h1>0</h1>
                        Trainees
                    </div>
                    <div class="card bg-primary1 padding-large ">
                        <span class="text-bold">Training</span> <span
                            class="text-bold padding-small bg-green round-sm "> ↗ 0%</span>
                        <h1>0</h1>
                        Completed
                    </div>
                    <div class="card bg-primary1 padding-large ">
                        <span class="text-bold">Total Employee</span> <span
                            class="text-bold padding-small bg-green round-sm "> ↗ 0%</span>
                        <h1>0</h1>
                        Employee list
                    </div>
                    <div class="card bg-primary1 padding-large ">
                        <span class="text-bold">Employee Evaluted</span> <span
                            class="text-bold padding-small bg-green round-sm "> ↗ 0%</span>
                        <h1>0</h1>
                        Completed
                    </div>
                    
                    
                </div>
                <br>
                <div class="d-flex flex-gap">
                    <div style="width:60%;" class="card  bg-primary1 padding-large">
                        <div class="d-flex">
                            <div class="w-100">
                                <h2> &emsp;Performance Statistics</h2>
                            </div>


                            <div class=" d-flex flex-align-center" style="width: 15%;">
                                <select class="card padding-medium bg-secondary text-black border-color" id="">
                                    <option value="">This Month</option>
                                </select>
                            </div>
                        </div>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div style="width:30%;" class="card bg-primary1 padding-large">
                        <h2>&emsp;Attendance Statistics</h2>
                        <center>
                            <div style="width:85%">
                                <canvas id="myDoughnutChart"></canvas>
                            </div>
                        </center>
                    </div>
                    </div>
                <br>
                <div class="d-flex flex-gap">
                    <div style="width:60%;" class="card  bg-primary1 padding-large1">
                        <div class="d-flex flex-align-center">
                            <div class="w-100">
                                <h2>&emsp;Employee Trainee Status</h2>

                            </div>
                            <div class="" style="width: 15%;">
                                <h5>View All(15)</h5>

                            </div>
                        </div>

                        <table>
                            <tr>
                                <th>Employee Name</th>
                                <th>Department</th>
                                <th>&emsp;Position</th>
                                <th>Training/Evalution</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td class="d-flex flex-align-center"><img src="img/ali.png" height="40px" alt=""
                                        style="margin-right: 10px;">Ali Mujeed</td>
                                <td>Finance</td>
                                <td>Trainee</td>
                                <td>completed </td>
                                <td>
                                    <span class=" padding-small bg-secondary  rounded"> <medium>Completed</medium></span>
                                </td>
                            <tr>
                        </table>
                    </div>
                    <div style="width: 30%;" class="card bg-primary1 padding-large">
                        <h2 class="text-center ">TOP3 -Performance Evaluation</h2>

                        <span class="name"></span> - Performance: 0%
                        <div class="bg-secondary rounded" style="width: 100%;">
                            <div class="bg-primary padding-large rounded" style="width: 1%;background-color:#FF8500;">
                            </div>
                        </div>
                        <br>
                        <span class="name"></span> - Performance: 0%
                        <div class="bg-secondary rounded" style="width: 100%;">
                            <div class=" padding-large rounded" style="width: 1%;background-color: #f5d10d;"></div>
                        </div>
                        <br>
                         <span class="name"></span> - Performance: 0%
                        <div class="bg-secondary rounded" style="width: 100%;">
                            <div class="bg-primary1 padding-large rounded" style="width: 1%;background-color: #2832c4;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>





</body>
<script>
    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Trainee completed',

                data: [20,0,0,0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: '#FF8500', 
                borderRadius: 3,

                order: 0

            },
            {
                label: 'Evaluation lowest average',

                data: [20, 0, 0, 0,0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: '#ddb70e', 
                borderRadius: 3,

                order: 1

            },
            {
                label: 'Evaluation highest average',
                color: '#ffffff',
                data: [20, 0, 0,0, 0, 0, 0, 0, 0, 0, 0, 0],
                backgroundColor: '#212121', 
                borderRadius: 3,
                order: 2
            }
        ]
    };
    

    const config = {
        type: 'bar',
        data: data,
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: "black",
                        font: {
                            size: 14
                        }
                    },
                    display: true // Display the legend
                }
            },

            scales: {
                y: {

                    min: 10, // Set minimum y-axis value
                    max: 100, // Set maximum y-axis value
                    grid: {
                        color: 'rgba(200, 200, 200, 0.1)' // Light grid color
                    },
                    ticks: {
                        color: "black",
                        callback: function (value) {
                            // Custom labels for y-axis
                            if (value % 10 === 0) {
                                return value; // Show labels for 5, 10, 20, 30,40,50,60,70,80,90, 100
                            }
                        }
                    }
                },
                x: {
                    ticks: {
                        color: "black",
                    },
                    grid: {
                        display: false // Remove vertical grid lines
                    }
                }
            }
        }
    };

    // Render the chart
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );


    const ctx = document.getElementById('myDoughnutChart').getContext('2d');
    const myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Half day', 'Time-In', 'Late'],
            datasets: [{
                label: 'Attendance',
                data: [1, 1, 1], // corresponding data values
                backgroundColor: [
                    '#f8a10e', // Half day
                    '#f5d10d', // Time-In
                    '#ffc057', // Late 
                ],
                borderWidth: 0
            }]
        },
        options: {
            plugins: {
                legend: {
                    labels: {
                        color: "black",
                        font: {
                            size: 14
                        }
                    },
                    display: true 
                },
                datalabels: {
                    formatter: (value, context) => {
                        let total = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                        let percentage = (value / total * 100).toFixed(2) + '%';
                        return percentage;
                    },
                    color: 'black', // Text color 
                    font: {
                        weight: 'bold',
                        size: 10
                    }
                }
            }
        },
        plugins: [ChartDataLabels] 
    });

</script>
<script src="js/script.js"></script>
</html>