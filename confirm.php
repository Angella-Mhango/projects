<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">

  <title>Appointment Confirmation</title>
  <script>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uchembele_wabwino";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve appointment data from POST
$patientID = isset($_POST['patientID']) ? $_POST['patientID'] : '';
$datePicked = isset($_POST['datePicked']) ? $_POST['datePicked'] : '';
$timeSlot = isset($_POST['timeSlot']) ? $_POST['timeSlot'] : '';
$reason = isset($_POST['reason']) ? $_POST['reason'] : '';

// Insert data into the database
$sql = "INSERT INTO appointments (patientID, datePicked, timeSlot, reason) VALUES ('$patientID', '$datePicked', '$timeSlot', '$reason')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>

function confirmAppointment() {
  // Get form data
  var patientID = '<?php echo $_POST['patientID']; ?>';
  var datePicked = '<?php echo $_POST['datePicked']; ?>';
  var timeSlot = '<?php echo $_POST['timeSlot']; ?>';
  var reason = '<?php echo $_POST['reason']; ?>';

  // Build the URL with parameters
  var url = 'appointments.php?patientID=' + encodeURIComponent(patientID) +
            '&datePicked=' + encodeURIComponent(datePicked) +
            '&timeSlot=' + encodeURIComponent(timeSlot) +
            '&reason=' + encodeURIComponent(reason);

  // Redirect to appointments.php with parameters
  window.location.href = url;
}


    function cancelAppointment() {
      // Show confirmation dialog
      var confirmCancel = confirm("Are you sure you want to cancel the appointment?");
      
      // If user confirms, redirect to the booking page
      if (confirmCancel) {
        window.location.href = 'bookNowhtml.php';
      }
    }

    function closePopup() {
      // Close the popup
      document.getElementById('popup').style.display = 'none';
    }
  </script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Appointment Confirmation</title>
  <script>
    function confirmAppointment() {
      // Get form data
      var patientID = '<?php echo $_POST['patientID']; ?>';
      var datePicked = '<?php echo $_POST['datePicked']; ?>';
      var timeSlot = '<?php echo $_POST['timeSlot']; ?>';
      var reason = '<?php echo $_POST['reason']; ?>';

      // Build the URL with parameters
      var url = 'appointments.php?patientID=' + encodeURIComponent(patientID) +
                '&datePicked=' + encodeURIComponent(datePicked) +
                '&timeSlot=' + encodeURIComponent(timeSlot) +
                '&reason=' + encodeURIComponent(reason);

      // Asynchronous (AJAX) request to appointments.php
      fetch(url, {
          method: 'GET', // or 'POST' based on your server-side handling
      })
      .then(response => response.text())
      .then(data => {
          // Display a successful notification
          alert("Appointment confirmed successfully!");
          
          // Optionally, you can handle additional actions based on the response from appointments.php
          console.log('Response from appointments.php:', data);
      })
      .catch(error => {
          console.error('Error during appointment confirmation:', error);
      });
    }

    function cancelAppointment() {
      // Show confirmation dialog
      var confirmCancel = confirm("Are you sure you want to cancel the appointment?");
      
      // If user confirms, redirect to the booking page
      if (confirmCancel) {
        window.location.href = 'bookNowhtml.php';
      }
    }

    function closePopup() {
      // Close the popup
      document.getElementById('popup').style.display = 'none';
    }
  </script>
</head>
<body>
  <div class="confirmation-box">
    <h2>Appointment Details</h2>
    <p>Patient ID: <?php echo $_POST['patientID']; ?></p>
    <p>Date: <?php echo $_POST['datePicked']; ?></p>
    <p>Time Slot: <?php echo $_POST['timeSlot']; ?></p>
    <p>Reason for Appointment: <?php echo $_POST['reason']; ?></p>

    <div class="confirmation-buttons">
      <button onclick="confirmAppointment()">Confirm</button>
      <button onclick="cancelAppointment()">Cancel</button>
    </div>
  </div>

  <div id="popup" class="popup">
    <p>You will receive an SMS confirming the appointment.</p>
    <button onclick="closePopup()">Close</button>
  </div>
</body>
</html>

  

  <div id="popup" class="popup">
    <p>You will receive an SMS confirming the appointment.</p>
    <button onclick="closePopup()">Close</button>
  </div>
</body>
</html>
