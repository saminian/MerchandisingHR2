// List of trainees
let trainees = JSON.parse(localStorage.getItem('trainees')) || [];
let schedules = [];

// Update Trainee List Table
function updateTraineeList() {
    const traineeViewList = document.getElementById('traineeViewList');
    traineeViewList.innerHTML = '';
    trainees.forEach((trainee, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${trainee.name}</td>
            <td>${trainee.department}</td>
            <td>${trainee.email}</td>
            <td>
                <button class= "schedule" onclick="openModal(${index})"><i class="fas fa-calendar-plus"></i></button>
                <button class= "edit" onclick="editTrainee(${index})"><i class="fas fa-edit"></i></button>
                <button class="delete" onclick="deleteTrainee(${index})"><i class="fas fa-trash-alt"></i></button>
            </td>
        `;
        traineeViewList.appendChild(row);
    });
} 

// Open New Trainee Modal
function openNewTraineeModal() {
    document.getElementById('newTraineeModal').style.display = 'flex';
}

// Add New Trainee
document.getElementById('newTraineeForm').onsubmit = function (e) {
    e.preventDefault();
    const newTrainee = {
        name: document.getElementById('newTraineeName').value,
        department: document.getElementById('newTraineeDepartment').value,
        email: document.getElementById('newTraineeEmail').value
    };
    trainees.push(newTrainee);
    localStorage.setItem('trainees', JSON.stringify(trainees));
    updateTraineeList();
    document.getElementById('newTraineeModal').style.display = 'none';
};

// Open Tab Function
function openTab(tabId) {
    const tabs = document.querySelectorAll('.tab-content');
    tabs.forEach(tab => tab.style.display = 'none');
    document.getElementById(tabId).style.display = 'block';
}

// Edit Trainee Function
function editTrainee(index) {
    const trainee = trainees[index];
    document.getElementById('editTraineeName').value = trainee.name;
    document.getElementById('editTraineeDepartment').value = trainee.department;
    document.getElementById('editTraineeEmail').value = trainee.email;

    document.getElementById('editTraineeModal').style.display = 'flex';

    document.getElementById('editTraineeForm').onsubmit = function (e) {
        e.preventDefault();
        trainees[index] = {
            name: document.getElementById('editTraineeName').value,
            department: document.getElementById('editTraineeDepartment').value,
            email: document.getElementById('editTraineeEmail').value
        };

        localStorage.setItem('trainees', JSON.stringify(trainees));
        updateTraineeList();
        document.getElementById('editTraineeModal').style.display = 'none';
    };
}

// Close Edit Trainee Modal
document.getElementById('closeEditTraineeModal').addEventListener('click', function () {
    document.getElementById('editTraineeModal').style.display = 'none';
});

// Delete Trainee
function deleteTrainee(index) {
    trainees.splice(index, 1);
    localStorage.setItem('trainees', JSON.stringify(trainees));
    updateTraineeList();
}

// Open Schedule Modal
function openModal(index) {
    const trainee = trainees[index];
    document.getElementById('modalName').value = trainee.name;
    document.getElementById('modalDepartment').value = trainee.department;
    document.getElementById('modalEmail').value = trainee.email;

    document.getElementById('taskScheduleModal').style.display = 'flex';

    document.getElementById('taskScheduleForm').onsubmit = function (e) {
        e.preventDefault();
        schedules.push({
            name: trainee.name,
            department: trainee.department,
            email: trainee.email,
            task: document.getElementById('task').value,
            date: document.getElementById('date').value,
            time: document.getElementById('time').value
        });
        localStorage.setItem('schedules', JSON.stringify(schedules));
        document.getElementById('taskScheduleModal').style.display = 'none';
        updateScheduledTrainees();
    };
}

// Close Task Schedule Modal
document.getElementById('closeTaskScheduleModal').addEventListener('click', function () {
    document.getElementById('taskScheduleModal').style.display = 'none';
});

// Update Scheduled Trainees Table
function updateScheduledTrainees() {
    const scheduledEmployeesTable = document.getElementById('scheduledEmployeesTable');
    scheduledEmployeesTable.innerHTML = '';
    schedules.forEach((schedule, index) => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${schedule.name}</td>
            <td>${schedule.department}</td>
            <td>${schedule.email}</td>
            <td>${schedule.task}</td>
            <td>${schedule.date}</td>
            <td>${schedule.time}</td>
            <td>
                <button onclick="editScheduled(${index})"><i class="fas fa-edit"></i></button>
                <button onclick="deleteScheduled(${index})"><i class="fas fa-trash-alt"></i></button>
            </td>
        `;
        scheduledEmployeesTable.appendChild(row);
    });
}

// Edit Scheduled Task
function editScheduled(index) {
    const schedule = schedules[index];
    document.getElementById('modalName').value = schedule.name;
    document.getElementById('modalDepartment').value = schedule.department;
    document.getElementById('modalEmail').value = schedule.email;
    document.getElementById('task').value = schedule.task;
    document.getElementById('date').value = schedule.date;
    document.getElementById('time').value = schedule.time;

    document.getElementById('taskScheduleModal').style.display = 'flex';

    document.getElementById('taskScheduleForm').onsubmit = function (e) {
        e.preventDefault();
        schedules[index] = {
            name: document.getElementById('modalName').value,
            department: document.getElementById('modalDepartment').value,
            email: document.getElementById('modalEmail').value,
            task: document.getElementById('task').value,
            date: document.getElementById('date').value,
            time: document.getElementById('time').value
        };
        localStorage.setItem('schedules', JSON.stringify(schedules));
        updateScheduledTrainees();
        document.getElementById('taskScheduleModal').style.display = 'none';
    };
}

// Delete Scheduled Task
function deleteScheduled(index) {
    schedules.splice(index, 1);
    localStorage.setItem('schedules', JSON.stringify(schedules));
    updateScheduledTrainees();
}

// Initialize the Trainee List and Scheduled List on page load
document.addEventListener('DOMContentLoaded', function () {
    updateTraineeList();
    schedules = JSON.parse(localStorage.getItem('schedules')) || [];
    updateScheduledTrainees();
});
