<?php
session_start();
 
// If not logged in, redirect to login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include "config/db.php";
 
$clients = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM clients"))['c'];
$services = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM services"))['c'];
$bookings = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM bookings"))['c'];
 
$revRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(amount_paid),0) AS s FROM payments"));
$revenue = $revRow['s'];
?>
<!doctype html>
<html>
<head>
  <link rel="stylesheet" href="/santi_assessment/style.css"> 
  <meta charset="utf-8">
  <title>Dashboard</title>
</head>
<body>
<?php include "nav.php"; ?>
 
<h2>Dashboard</h2>
<p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
 
<ul>
  <li>Total Clients: <b><?php echo $clients; ?></b></li>
  <li>Total Services: <b><?php echo $services; ?></b></li>
  <li>Total Bookings: <b><?php echo $bookings; ?></b></li>
  <li>Total Revenue: <b>₱<?php echo number_format($revenue,2); ?></b></li>
</ul>
 

 
</body>
</html>