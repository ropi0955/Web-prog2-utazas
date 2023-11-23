<?php

$eredmeny = "";
try {
	$dbh = new PDO('mysql:host=localhost;dbname=utazasdb', 'root', '',
				  array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	$dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
	switch($_SERVER['REQUEST_METHOD']) {
		case "GET":
				$sql = "SELECT * FROM helyseg";     
				$sth = $dbh->query($sql);
				$eredmeny .= "<table style=\"border-collapse: collapse;\"><tr><th></th><th>NÉV</th><th>ORSZÁG</th></tr>";
				while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
					$eredmeny .= "<tr>";
					foreach($row as $column)
						$eredmeny .= "<td style=\"border: 1px solid black; padding: 3px;\">".$column."</td>";
					$eredmeny .= "</tr>";
				}
				$eredmeny .= "</table>";
			break;
		case "POST":
				$sql = "insert into helyseg values (0, :nev, :orsz)";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":nev"=>$_POST["nev"], ":orsz"=>$_POST["orsz"]));
				$newid = $dbh->lastInsertId();
				$eredmeny .= $count." beszúrt sor: ".$newid;
			break;
		case "PUT":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$modositando = "az=az"; $params = Array(":az"=>$data["az"]);
				if($data['nev'] != "") {$modositando .= ", nev = :nev"; $params[":nev"] = $data["nev"];}
				if($data['orsz'] != "") {$modositando .= ", orszag = :orsz"; $params[":orsz"] = $data["orsz"];}
				$sql = "update helyseg set ".$modositando." where az=:az";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute($params);
				$eredmeny .= $count." módositott sor. Azonosítója:".$data["az"];
			break;
		case "DELETE":
				$data = array();
				$incoming = file_get_contents("php://input");
				parse_str($incoming, $data);
				$sql = "delete from helyseg where az=:az";
				$sth = $dbh->prepare($sql);
				$count = $sth->execute(Array(":az" => $data["az"]));
				$eredmeny .= $count." sor törölve. Azonosítója:".$data["az"];
			break;
	}
}
catch (PDOException $e) {
	$eredmeny = $e->getMessage();
}
echo $eredmeny;

?>