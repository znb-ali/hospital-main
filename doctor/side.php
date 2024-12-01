<style>
/* Profile Image Styling */
.sidebar .profile-image {
    width: 90px; /* Increased width of profile image */
    height: 90px; /* Increased height of profile image */
    border-radius: 50%;
    background-color: #ccc; /* Keeps image circular */
    object-fit: contain; /* Ensures the image covers the area without distortion */
    margin-bottom: 15px; /* More space between image and text */
}

/* Sidebar Styling */
.sidebar {
    width: 250px; /* Wider sidebar for better spacing */
    background-color: #04304e; /* Darker shade for a more modern look */
    color: #fff;
    padding: 20px 10px; /* Consistent padding */
    height: 100vh; /* Full height for a fixed layout */
    overflow-y: auto; /* Scrollable if content overflows */
    position: fixed; /* Stays fixed on the screen */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Adds a subtle shadow */
}

/* Sidebar Links */
.sidebar a {
    display: block;
    padding: 12px 20px;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    margin-bottom: 15px; /* Adds more space between links */
    border-radius: 5px; /* Rounded corners for links */
    transition: all 0.3s ease;
}

.sidebar a:hover {
    background-color: #084d7b; /* Darker hover effect */
    color: #e3e3e3; /* Lightened text on hover */
}

/* Profile Section Styling */
.sidebar .profile-section {
    text-align: center;
    padding: 15px 0;
    border-bottom: 2px solid #084d7b; /* Thicker border for separation */
    margin-bottom: 20px;
}

.sidebar .profile-section h4 {
    font-size: 18px;
    margin: 10px 0 5px;
    color: #fff; /* Consistent color for text */
    font-weight: bold; /* Bold name */
}

.sidebar .profile-section p {
    font-size: 14px;
    color: #ccc;
    margin: 0;
    word-wrap: break-word; /* Ensures email breaks properly */
    font-style: italic; /* Makes the email visually distinct */
}

/* Responsive Design */
@media (max-width: 768px) {
    .sidebar {
        width: 200px; /* Narrower sidebar on smaller screens */
        padding: 15px 5px;
    }

    .sidebar .profile-image {
        width: 80px;
        height: 80px; /* Smaller profile image */
    }

    .sidebar a {
        font-size: 14px; /* Smaller font for links */
        padding: 10px 15px;
    }
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