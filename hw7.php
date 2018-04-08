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

// $q = "SELECT a.Player AS player, a.Club as club, a.POS as pos, MAX(a.A) as max_assists, avg_assists FROM `assists` AS a, `assists` AS b INNER JOIN (SELECT AVG(c.A) AS avg_assists, c.POS, c.Club FROM `assists` c GROUP BY Club, POS) AS d WHERE a.GS > b.GS AND d.Club = a.Club AND a.Club = b.Club AND a.POS = b.POS AND d.POS = a.POS AND a.POS = '". $pos ."' AND a.Club = '" . $club ."'" ;

$q = "SELECT *, (SELECT AVG(A) FROM assists WHERE club = '" .$club. "' AND pos = '".$pos."') AS AVG_A FROM assists WHERE club = '".$club."' AND pos = '".$pos."' order by A DESC, GS DESC, Player ASC limit 1";

$key = $pos.'@'.$club;

$conn = mysqli_connect($host, $username, $password, $data);
$query = mysqli_query($conn, $q);

$results = array();
$assists = 0;
$count = 0;
$max_assists_index = 0;
$max_assists = -1;

while ($row = mysqli_fetch_assoc($query)){
	$results = array('pos' => $row['POS'],
						'player' => $row['Player'],
						'club' => $row['Club'],
						'max_assists' => $row['A'] + 0,
						'avg_assists' => $row['AVG_A'] + 0);
}


// $a = array('pos' => $results[$max_assists_index]['pos'] ,
// 			'player' => $results[$max_assists_index]['player'],
// 			'club' => $results[$max_assists_index]['club'],
// 			'max_assists' => $results[$max_assists_index]['max_assists'] + 0,
// 			'avg_assists' => ($assists / $count) );

echo json_encode($results);

?>