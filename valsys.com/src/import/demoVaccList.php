<?php
require 'dbh.conn.php';
$sql = "SELECT * FROM VaccineList";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "<table border='1'>
  <tr>
  <th>id</th>
  <th>Name</th>
  <th>Receiving Age</th>
  <th>Dose Number</th>
  <th>Maximum Number of Dose</th>
  </tr>" ;

  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" .$row["id"]."</td>";
    echo "<td>" .$row["name"]."</td>";
    echo "<td>" .$row["ageOfReceive"]."</td>";
    echo "<td>" .$row["DoseNum"]."</td>";
    echo "<td>" .$row["lastDose"]."</td>";
    echo "</tr>";
    }
} else {
  echo "0 results";
}
$conn->close();
?>
