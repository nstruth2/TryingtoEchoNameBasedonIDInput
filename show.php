<style>
.mycssquote{
    color: blue;
    border:1px solid red;
    padding: 5px;
}

#wrapper {
  width: 100%;
}

tr:nth-child(even) { background: #00FFFF; 
} 

tr:nth-child(odd) { background: white;
}

table {
  width: 100%;
  text-align: center;
  border-collapse: separate; /* Don't collapse */
  border-spacing: 1;
  font: 12px Arial, sans-serif;
  color: black;
}

table th {
  /* Apply both top and bottom borders to the <th> */
  border-top: 1px solid;
  border-bottom: 1px solid;
  border-right: 1px solid;
}

table td {
  /* For cells, apply the border to one of each side only (right but not left, bottom but not top) */
  border-bottom: 1px solid;
  border-right: 1px solid;
}

table th:first-child,
table td:first-child {
  /* Apply a left border on the first <td> or <th> in a row */
  border-left: 1px solid;
}

table thead th {
  position: sticky;
  top: 0;
  background-color: #FF9900;
}
</style>
<?php
include 'database.php';
$query = $con->prepare("SELECT name, email FROM crud WHERE id=?"); // prepate a query
$query->bind_param('s', $_POST['identification']); // binding parameters via a safer way than via direct insertion into the query. 'i' tells mysql that it should expect an integer.
$query->execute(); // actually perform the query
$result = $query->get_result(); // retrieve the result so it can be used inside PHP
$r = $result->fetch_array(MYSQLI_ASSOC); // bind the data from the first result row to $r
echo $r['name']; // will return the price
// Check connection

$sql = "SELECT name, email, id FROM crud";
$sql2 = "SELECT name, email FROM crud WHERE id=?id";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

echo "<div id=\"wrapper\">";
echo "<table>";
echo "<thead><tr style=\"position: sticky; top: 0px; background-color: #FF9900;\"><th style=\"border: 1px solid black;\">Name</th><th>Email</th></thead>";            
echo "<tbody>";         
while ($row = $result->fetch_assoc()) {

 echo "<tr><td>&nbsp;" . htmlspecialchars($row["name"], ENT_QUOTES, 'UTF-8') . "</td><td>" . htmlspecialchars($row["email"], ENT_QUOTES, 'UTF-8') . "</td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";

echo "</div>";
} else {
  echo "0 results";
}
?>