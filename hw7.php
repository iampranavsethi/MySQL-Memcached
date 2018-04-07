<?php
$host = "localhost";
$username = "root";
$password = "";
$data = "CSE356";

$table = "assists";

$mem = new Memcached();
$mem->addServer("127.0.0.1", 11211);

$q = "SELECT a.Player AS player, a.Club AS club, a.POS AS pos, MAX(a.A) AS max_a, avg_assists FROM `assists` AS a, `assists` AS b INNER JOIN (SELECT AVG(c.A) AS avg_assists, c.POS, c.Club FROM `assists` c GROUP BY Club, POS) AS d WHERE a.GS > b.GS AND d.Club = a.Club AND a.Club = b.Club AND a.POS = b.POS AND d.POS = a.POS AND a.POS = ? AND a.Club = ?";

$pos = $_GET['pos'];
$club = $_GET['club'];

$key = $pos.'@'.$club;

$conn = new mysqli($host, $username, $password, $data);

$stmt = $conn->prepare($q);
$stmt = $conn->bind_param("ss", $pos, $club);
$stmt = $conn->execute();

$res = $stmt->get_result();

while ($row = $res->fetch_assoc()){
	print_r($row);
}

?>