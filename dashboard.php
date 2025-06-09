<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            display: flex;
            background: #f0f2f5;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background: #2c3e50;
            padding: 20px;
            position: fixed;
        }

        .sidebar .logo {
            color: white;
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar .menu {
            list-style: none;
        }

        .sidebar .menu li {
            margin-bottom: 10px;
        }

        .sidebar .menu a {
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: 0.3s;
        }

        .sidebar .menu a:hover {
            background: #34495e;
        }

        .sidebar .menu i {
            margin-right: 10px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .schedule-table th, .schedule-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .schedule-table th {
            background: #f8f9fa;
        }

        .progress-bar {
            width: 100%;
            height: 10px;
            background: #e0e0e0;
            border-radius: 5px;
            margin-top: 10px;
        }

        .progress {
            height: 100%;
            background: #3498db;
            border-radius: 5px;
        }

        .user-profile {
            display: flex;
            align-items: center;
        }

        .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-graduation-cap"></i>
            <span>Student Portal</span>
        </div>
        <ul class="menu">
            <li><a href="#"><i class="fas fa-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="fas fa-book"></i> Courses</a></li>
            <li><a href="#"><i class="fas fa-calendar"></i> Schedule</a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i> Grades</a></li>
            <li><a href="#"><i class="fas fa-tasks"></i> Assignments</a></li>
            <li><a href="#"><i class="fas fa-user"></i> Profile</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> Settings</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Student Dashboard</h1>
            <div class="user-profile">
                <img src="https://via.placeholder.com/40" alt="Profile">
                <span>John Doe</span>
            </div>
        </div>

        <div class="cards-container">
            <div class="card">
                <h3>Current Semester</h3>
                <p>2023-2024 Second Semester</p>
                <p>Student ID: ST12345</p>
                <p>Program: Bachelor of Science in Computer Science</p>
            </div>

            <div class="card">
                <h3>Attendance Rate</h3>
                <p>Current Month: 95%</p>
                <div class="progress-bar">
                    <div class="progress" style="width: 95%"></div>
                </div>
            </div>

            <div class="card">
                <h3>GPA</h3>
                <p>Current: 3.8</p>
                <p>Previous: 3.7</p>
            </div>
        </div>

        <div class="card">
            <h3>Today's Schedule</h3>
            <table class="schedule-table">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Subject</th>
                        <th>Room</th>
                        <th>Instructor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>8:00 AM - 9:30 AM</td>
                        <td>Advanced Mathematics</td>
                        <td>Room 301</td>
                        <td>Dr. Smith</td>
                    </tr>
                    <tr>
                        <td>10:00 AM - 11:30 AM</td>
                        <td>Programming Fundamentals</td>
                        <td>Computer Lab 2</td>
                        <td>Prof. Johnson</td>
                    </tr>
                    <tr>
                        <td>1:00 PM - 2:30 PM</td>
                        <td>Database Management</td>
                        <td>Room 405</td>
                        <td>Ms. Davis</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
