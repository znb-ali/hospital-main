<style>
/* Sidebar Styling */
.sidebar {
    width: 200px; /* Increased width for better space */
    background-color: #04304e;
    color: #fff;
    padding-top: 20px;
    height: 100%;
    overflow-y: auto;
    padding-left: 10px; /* Increased padding for better spacing */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Added shadow for a more distinct look */
}

.sidebar a {
    display: block;
    padding: 12px 20px; /* Increased padding for more clickable area */
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    margin-bottom: 12px; /* Increased margin for spacing between links */
    transition: background-color 0.3s, padding-left 0.3s;
}

.sidebar a:hover {
    background-color: #69b0efa9;
    padding-left: 30px; /* Added padding animation for a sliding effect */
}

/* Profile Section Styling */
.sidebar .profile-section {
    text-align: center;
    padding: 20px 0; /* Increased padding for better profile section */
    border-bottom: 1px solid #084d7b;
    margin-bottom: 20px; /* Increased margin to give more space */
}

.sidebar .profile-section h4 {
    font-size: 18px; /* Increased font size for visibility */
    margin: 10px 0; /* Adjusted margin for spacing */
    color: #fff;
}

.sidebar .profile-section p {
    font-size: 14px;
    color: #ccc;
    margin: 0;
    word-wrap: break-word; /* Ensures email breaks properly if too long */
}

/* Profile Image Styling */
.sidebar .profile-image {
    width: 90px; /* Increased width of profile image */
    height: 90px; /* Increased height of profile image */
    border-radius: 50%;
    background-color: #ccc; /* Keeps image circular */
    object-fit: contain; /* Ensures the image covers the area without distortion */
    margin-bottom: 15px; /* More space between image and text */
}

/* Navbar Links Styling */
.navbar-nav {
    list-style-type: none;
    padding-left: 0;
    margin-top: 20px; /* Added margin for spacing above navbar */
}

.nav-item {
    margin-bottom: 10px; /* Added margin for spacing between items */
}


</style>
<div class="sidebar">
    <div class="profile-section">
        
    <img src="../<?= htmlspecialchars($doctor['file_name']); ?>" alt="Doctor Profile Image" class="profile-image">

        <h4><?php echo htmlspecialchars($doctor['doctor_name']); ?></h4> <!-- Doctor's name -->
        <p><?php echo htmlspecialchars($doctor['doctor_email']); ?></p> <!-- Doctor's email -->
    </div>

    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="approved_appointments.php">Approved Appointments</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="doc_appointments.php">Appointment Requests</a>
        </li>
    </ul>
</div>