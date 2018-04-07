<?php
$host = "localhost";
$username = "root";
$password = "";
$data = "CSE356";

$table = "assists";

// $mem = new Memcached();
// $mem->addServer("127.0.0.1", 11211);

$pos = $_GET['pos'];
$club = $_GET['club']; 

$q = "SELECT a.Player AS player, a.Club as club, a.POS as pos, MAX(a.A) as max_assists, avg_assists FROM `assists` AS a, `assists` AS b INNER JOIN (SELECT AVG(c.A) AS avg_assists, c.POS, c.Club FROM `assists` c GROUP BY Club, POS) AS d WHERE a.GS > b.GS AND d.Club = a.Club AND a.Club = b.Club AND a.POS = b.POS AND d.POS = a.POS AND a.POS = '". $pos ."' AND a.Club = '" . $club ."'" ;

$key = $pos.'@'.$club;

$conn = mysqli_connect($host, $username, $password, $data);
$query = mysqli_query($conn, $q);

while ($row = mysqli_fetch_assoc($query)){
	echo json_encode($row);
}

// echo $q;

?>