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
    padding: 12px 20px;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    margin-bottom: 10px;
    transition: background-color 0.3s, padding-left 0.3s;
}

.sidebar a:hover {
    background-color: #69b0efa9;
    padding-left: 30px; /* Added padding animation for a sliding effect */
}

/* Profile Section Styling */
.sidebar .profile-section {
    text-align: center;
    padding: 10px 0;
    border-bottom: 1px solid #084d7b;
    margin-bottom: 10px;
    height: 100px;
}
.sidebar .profile-section h4 {
    font-size: 16px;
    margin: 5px 0 10px;
    color: #fff;
}

.sidebar .profile-section p {
    font-size: 14px;
    color: #ccc;
    margin: 0;
    word-wrap: break-word; /* Ensures email breaks properly if too long */
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
        <h4><?php echo htmlspecialchars($admin_name); ?></h4> <!-- Username -->
        <p><?php echo htmlspecialchars($admin_email); ?></p> <!-- Email -->
    </div>

    <!-- Navigation Links -->
    
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <li class="nav-item ">
    <a class="nav-link active" aria-current="page" href="index.php">Dashboard</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link active" href="doctor_management.php">Doctors Requests</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link active" href="appointments.php">Doc-Patient Appointments</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link active" href="cities.php">Cities</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link active" href="specialization.php">Specialization</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link active" href="blog_crud.php">Blogs</a>
  </li>
</ul>
</div>
