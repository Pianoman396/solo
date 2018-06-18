<?php require_once($_SERVER["DOCUMENT_ROOT"]."/archive2/sec.php"); pathcheck("MYPATH");

class Crud {

	public static function create($title,$link) {
		global $sql;
		try{
			$conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME ."", DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => true)); //dbname={DB_NAME} // charset=utf8mb4_unicode_ci
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES 'utf8mb4_unicode_ci'");

			$sql = "INSERT INTO https(title,link)
				VALUES ('" . $title . "','" . $link . "')";
			$conn->exec($sql);

			$res = "
					<div class='notice notice--create'>
						<span>Title and Link is saved , thanks.</span> </br>
						<a href='javascript:void(0)' class='link link--view-data'>View data</a>
					</div>";

		}catch(PDOException $e){
			print_r("<pre>");
			echo $sql . "<br>" . $e->getMessage();
			$res = "Data can't insert";
    	}
		$conn = null;//die(-1);
		echo $res;
	}

	public static function read() {
		try{
			$conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME ."", DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => true)); //dbname={DB_NAME} // charset=utf8mb4_unicode_ci
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES 'utf8mb4_unicode_ci'");

			$sql = $conn->prepare("SELECT * FROM https ORDER BY id DESC");
			$sql->execute();

			// session_start();
			// session_name("archive2");

			while($result = $sql->fetch(PDO::FETCH_ASSOC)){

				 // $_SESSION["title"] .= $result['title'];
				 // $_SESSION["link"] .= $result['link'];
				 // $_SESSION["dt"] .= $result['dt'];

				echo "<br><table><th><td><b>Title</b></td><td><b>Link</b></td><td><b>Date<small>&</small>Time</b></td></th><br>
    			<tr class='table-row'><td>". $result['title'] ."</td><td><a href='". $result['link'] ."' target='_blank'>". $result['link']."</a></td><td>". $result['dt']."</td></tr></table>";
					//$data[] .= $result;
				// $data[] = $result["title"];
				// $data[] = $result["link"];
				// $data[] = $result["dt"];
			}


		}catch(PDOException $e){
			print_r("<pre>");
			echo $sql . "<br>" . $e->getMessage();


    	}
		$conn = null;//die(-1);
	}

	public static function update() {}

	public static function delete() {}
}