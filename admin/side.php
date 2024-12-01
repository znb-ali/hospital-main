<style>
/* Sidebar Styling */
.sidebar {
    width: 200px;
    background-color: #04304e;
    color: #fff;
    padding-top: 20px;
    height: 100%;
    overflow-y: auto;
    padding-left: 6px;
}

.sidebar a {
    display: block;
    padding: 10px 20px;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    margin-bottom: 10px;
    transition: background-color 0.3s;
}

.sidebar a:hover {
    background-color: #084d7b;
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
