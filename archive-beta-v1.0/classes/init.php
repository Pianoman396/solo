<?php  require_once($_SERVER["DOCUMENT_ROOT"]."/archive2/sec.php"); pathcheck("MYPATH");

class Init_db {

	public static function init() {
		global $sql;
		try{
			date_default_timezone_set("UTC");
			$conn = new PDO("mysql:host=". DB_HOST .";", DB_USER, DB_PASS, array(PDO::ATTR_PERSISTENT => true)); //dbname={DB_NAME} // charset=utf8mb4_unicode_ci
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES 'utf8mb4_unicode_ci'");

			$sql = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
			$conn->exec($sql);

			$sql = "use " . DB_NAME;
			$conn->exec($sql);

			$sql = "CREATE TABLE IF NOT EXISTS ". DB_NAME .". https (
					id BIGINT(50) AUTO_INCREMENT PRIMARY KEY,
    				title VARCHAR(300) NOT NULL,
    				link VARCHAR(700) NOT NULL,
    				dt TIMESTAMP NOT NULL
    				)";
			$conn->exec($sql);

			/* $sql = "ALTER TABLE `https` DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;";//SET NAMES  ""
			$conn->exec($sql); */

			$sql = "DESCRIBE `https`";
			$conn->exec($sql);
			//echo "<i><Space is created</i>";

		}catch(PDOException $e){
			echo $sql . "<br>" . $e->getMessage();
  		}
		$conn = null;//die(-1);

	}
}