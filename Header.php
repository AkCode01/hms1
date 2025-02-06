<nav class="navbar navbar-expand-sm navbar-light bg-custom" aria-label="Third navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">HMS</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
<li class="nav-item">
    <a class="nav-link" href="index.php">Dashboard</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="hospitals.php">Hospitals</a>
</li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Doctors</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="doctors.php">List of Doctors</a></li>
              <li><a class="dropdown-item" href="doctor_schedule.php">Doctor Schedule</a></li>
              <li><a class="dropdown-item" href="AddDoctor.php">Add New Doctor</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Patients</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="patients.php">List of Patients</a></li>
              <li><a class="dropdown-item" href="AddPatient.php">Add New Patient</a></li>
              </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">OPD</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="visit_log.php">Visit Log</a></li>
              <li><a class="dropdown-item" href="pre_assesment.php">Pre Assesment</a></li>
              <li><a class="dropdown-item" href="doctors_assesment.php">Doctors Assesment</a></li>
              <li><a class="dropdown-item" href="decision_making.php">Decision Making</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">IPD</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="admission.php">Admission</a></li>
              <li><a class="dropdown-item" href="lab_test_type.php">Lab Test Type</a></li>
              <li><a class="dropdown-item" href="lab_test_sub_type.php">Lab Test Sub Type</a></li>
              <li><a class="dropdown-item" href="lab_test.php">Lab Test</a></li>
              <li><a class="dropdown-item" href="treatment_plan.php">Treatment Plan</a></li>
              <!-- <li><a class="dropdown-item" href="discharge_card.php">Discharge Card	</a></li>
              <li><a class="dropdown-item" href="discharge_medicine.php">Discharge Medicine	</a></li>
              <li><a class="dropdown-item" href="follow_up.php">Follow Up</a></li> -->
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Surgery</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="surg_pre_op_assessment.php">Pre Operation Assesment</a></li>
              <li><a class="dropdown-item" href="surg_operation.php">Operation</a></li>
              
            </ul>
          </li>
        </ul>
        <div class="d-lg-flex col-lg-3 justify-content-lg-end">
            <span><?php echo $_SESSION['logeduser']; ?>
            </span>&nbsp; <a href="logout.php">Logout</a>
          </div>
      </div>
    </div>
  </nav>