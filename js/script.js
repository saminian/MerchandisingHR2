// Sidebar Functionality
document.getElementsByClassName("sidebar")[0].style.width = "350px";

function onToggle() {
    const sidebar = document.getElementsByClassName("sidebar")[0];
    sidebar.style.width = sidebar.style.width === "0px" || sidebar.style.width === "" ? "350px" : "0";
}

// Profile Dropdown Functionality
function toggleDropdown() {
    const dropdown = document.getElementById("profileDropdown");
    dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
}

window.onclick = function(event) {
    if (!event.target.matches('#profile-icon img')) {
        const dropdown = document.getElementById("profileDropdown");
        if (dropdown && dropdown.style.display === "block") {
            dropdown.style.display = "none";
        }
    }
}

// Evaluation Functionality
let employees = [];
let evaluatedEmployees = [];
let currentEmployee = {};

function openAddEmployeeModal() {
    document.getElementById('addEmployeeModal').style.display = 'flex';
}

function closeAddEmployeeModal() {
    document.getElementById('addEmployeeModal').style.display = 'none';
}

function addEmployee() {
    const name = document.getElementById('newEmployeeName').value;
    const department = document.getElementById('newEmployeeDepartment').value;
    const email = document.getElementById('newEmployeeEmail').value;

    if (name && department && email) {
        const employee = { name, department, email };
        employees.push(employee);
        addEmployeeToTable(employee);
        closeAddEmployeeModal();
    } else {
        alert("Please fill in all fields.");
    }
}

function addEmployeeToTable(employee) {
    const table = document.getElementById('employeeTable').getElementsByTagName('tbody')[0];
    const row = table.insertRow();

    row.insertCell(0).innerText = employee.name;
    row.insertCell(1).innerText = employee.department;
    row.insertCell(2).innerText = employee.email;
    row.insertCell(3).innerHTML = `<button onclick="openPerformanceModal('${employee.name}', '${employee.department}', '${employee.email}')">Evaluate</button>`;
}

function openPerformanceModal(employeeName, employeeDepartment, employeeEmail) {
    currentEmployee = { name: employeeName, department: employeeDepartment, email: employeeEmail };
    document.getElementById('employeeName').textContent = employeeName;
    document.getElementById('performanceModal').style.display = 'flex';
    resetEvaluationForm();
}

function closePerformanceModal() {
    document.getElementById('performanceModal').style.display = 'none';
}

function resetEvaluationForm() {
    document.querySelectorAll('input[type="radio"]:checked').forEach(radio => radio.checked = false);
    document.getElementById('comments').value = '';
    document.getElementById('totalPercentage').textContent = '0%';
}

function submitEvaluation() {
    const scores = {
        communication: getScore('communication'),
        teamwork: getScore('teamwork'),
        punctuality: getScore('punctuality'),
        customerService: getScore('customerService'),
        jobPerformance: getScore('jobPerformance')
    };

    const totalScore = Object.values(scores).reduce((a, b) => a + b, 0);
    const totalPercentage = (totalScore / (5 * Object.keys(scores).length)) * 100;

    const feedback = document.getElementById('comments').value;

    evaluatedEmployees.push({
        name: currentEmployee.name,
        department: currentEmployee.department,
        email: currentEmployee.email,
        feedback,
        totalPercentage: totalPercentage.toFixed(2) + '%',
        status: totalPercentage >= 60 ? 'Passed' : 'Failed'
    });

    addEvaluatedEmployeeToTable(evaluatedEmployees[evaluatedEmployees.length - 1]);
    closePerformanceModal();
}

function getScore(name) {
    const radios = document.getElementsByName(name);
    for (let radio of radios) {
        if (radio.checked) {
            return parseInt(radio.value);
        }
    }
    return 0;
}

function addEvaluatedEmployeeToTable(employee) {
    const table = document.getElementById('evaluatedTable').getElementsByTagName('tbody')[0];
    const row = table.insertRow();

    row.insertCell(0).innerText = employee.name;
    row.insertCell(1).innerText = employee.department;
    row.insertCell(2).innerText = employee.email;
    row.insertCell(3).innerText = employee.feedback;
    row.insertCell(4).innerText = employee.totalPercentage;
    row.insertCell(5).innerText = employee.status;
}

function openTab(evt, tabName) {
    const tabcontent = document.getElementsByClassName("tabcontent");
    for (let i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    const tablinks = document.getElementsByClassName("tablinks");
    for (let i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function searchEmployees() {
    const input = document.getElementById('searchBar');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('employeeTable');
    const tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        const td = tr[i].getElementsByTagName('td')[0]; // Name column
        if (td) {
            const txtValue = td.textContent || td.innerText;
            tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
        }
    }
}

function searchEvaluatedEmployees() {
    const input = document.getElementById('evaluatedSearchBar');
    const filter = input.value.toLowerCase();
    const table = document.getElementById('evaluatedTable');
    const tr = table.getElementsByTagName('tr');

    for (let i = 1; i < tr.length; i++) {
        const td = tr[i].getElementsByTagName('td')[0]; // Name column
        if (td) {
            const txtValue = td.textContent || td.innerText;
            tr[i].style.display = txtValue.toLowerCase().indexOf(filter) > -1 ? "" : "none";
        }
    }
}

//status
function openModal() {
    document.getElementById('addStatusModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('addStatusModal').style.display = 'none';
}

function addStatus() {
    // Get input values
    const name = document.getElementById('statusName').value;
    const department = document.getElementById('department').value;
    const position = document.getElementById('position').value;
    const training = document.getElementById('training').value;
    const status = document.getElementById('status').value;

    // Create a new row in the table
    const table = document.getElementById('statusTable');
    const row = table.insertRow();

    row.innerHTML = `
        <td>${name}</td>
        <td>${department}</td>
        <td>${position}</td>
        <td>${training}</td>
        <td><span class="status-${status.toLowerCase()}">${status}</span></td>
    `;

    // Clear input fields and close modal
    document.getElementById('statusName').value = '';
    document.getElementById('department').value = '';
    document.getElementById('position').value = '';
    document.getElementById('training').value = '';
    document.getElementById('status').value = 'Ongoing';
    closeModal();
}
  
// confirmation modal 
function openModal() {
    document.getElementById("confirmationModal").style.display = "block";
}

function closeModal() {
    document.getElementById("confirmationModal").style.display = "none";
}

document.getElementById("confirmBtn").onclick = function() {
    document.forms[0].submit(); // Submit the form
    closeModal(); // Close the confirmation modal
}

function closeSuccessModal() {
    document.getElementById("successModal").style.display = "none";
}

function redirectToTasks() {
    window.location.href = 'task.php'; // Redirect to task.php
}

// Close the confirmation modal if the user clicks outside of it
window.onclick = function(event) {
    if (event.target == document.getElementById("confirmationModal")) {
        closeModal();
    }
}
// update info in sched
function closeSuccessModal() {
    document.getElementById("successModal").style.display = "none";
}

function redirectToSchedule() {
    window.location.href = 'schedule.php'; 
}