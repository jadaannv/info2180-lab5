<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
// Accept and sanitize GET variables
$country = isset($_GET['country']) ? $_GET['country'] : '';
$country = '%'.filter_var($country, FILTER_SANITIZE_STRING).'%';

//Changed query
$stmt = $conn->prepare("SELECT * FROM countries WHERE name LIKE :country");

//Combine and execute 
$stmt->bindParam(':country', $country, PDO::PARAM_STR);
$stmt->execute();

//Display all countries
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Display info in table format
?>
<table>
  <tr>
    <th> Name </th>
    <th> Continent </th>
    <th> Independence </th>
    <th> Head of State </th>
  </tr>

<?php foreach ($results as $row): ?>
  
  <tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['continent']; ?></td>
    <td><?php echo $row['independence_year']; ?></td>
    <td><?php echo $row['head_of_state']; ?></td>
  </tr>

<?php endforeach; ?>
</table>
