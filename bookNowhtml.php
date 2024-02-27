<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Uchembele Wabwino Maternity Clinic</title>
</head>
<body>
  <header>
  </header>

  <nav>
    <a href="testing.html">Home</a>
    <a href="reviews.html">Reviews</a>
    <a href="bookings.html">My Bookings</a>
  </nav>

  <div class="hero">
    <h2>Welcome to Uchembele Wabwino Maternity Clinic</h2>
  </div>

  <div class="content">
    <div class="book appointment">
    <center><h2>Book an Appointment</h2></center>
<form action="confirm.php" method="post" onsubmit="submitForm(event)">
    <label for="patientID">Patient ID:</label>
    <input type="text" id="patientID" name="patientID" required>


    <label for="Preffered Date">Date:</label>
<input type="date" id="datePicked" name="datePicked" onchange="updateTimeSlots()" required>

<label for="timeSlot">Choose a Time Slot:</label>
<select id="timeSlot" name="timeSlot" required>
  <!-- Time slots will be dynamically added here -->
</select>


    <label for="reason">Reason for Appointment:</label>
    <select id="reason" name="reason" required>
        <option value="checkup">Routine Checkup</option>
        <option value="followup">Follow-up Appointment</option>
        <option value="consultation">Consultation</option>
        <!-- Add more options as needed -->
    </select>

    <center><button type="submit">Book Appointment</button></center>
</form>
        
    </div>
    <script src="appointment-scheduling.js"></script>

  <footer>
    &copy; 2024 Uchembele Wabwino Maternity Clinic. All rights reserved.
  </footer>
</body>
</html>
