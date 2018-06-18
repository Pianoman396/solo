<?php ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require_once($_SERVER["DOCUMENT_ROOT"]."/archive2/sec.php"); pathcheck("MYPATH"); require_once("../config.php"); require_once("../classes/init.php"); require_once("../classes/crud.php");

// Testing PDO Driver

if (!defined('PDO::ATTR_DRIVER_NAME')) {
		echo 'PDO unavailable';
}else{
	// Creating Database

	if(isset($_GET["create"]) && $_GET["create"] == 1){
		$init = new Init_db();
		$init::init();
		echo "<i> Welcome. Please insert data. </i>";
	}else{
		require_once("../excaption.php");
	}

	if(isset($_POST["title"]) && $_POST["title"] && isset($_POST["link"]) && $_POST["link"]) {

		// session_start();
		// session_name("archive");
		// $_SESSION["title"] = $_POST["title"];
		// $_SESSION["link"] = $_POST["link"];
		// $_SESSION["dt"] = $_POST["link"];

		function is_url($uri){
			if(preg_match( '/^(http|https):\\/\\/[a-z0-9]+([\\-\\.]{1}[a-z0-9]+)*\\.[a-z]{2,5}'.'((:[0-9]{1,5})?\\/.*)?$/i' ,$uri)){ return $uri; }else{ return false; }
	    }

		$crud = new Crud();
		is_url($_POST["link"]) ? $crud::create($_POST["title"],$_POST["link"]) : "";

		$crud::read();

	}else{
		require_once("../excaption.php");
	}
	if(isset($_GET["view"]) && $_GET["view"] == 1){
		echo "<i>Loading...</i>";
	}

	if(isset($_GET["read"]) && $_GET["read"] == 1){
		$crud = new Crud();
		$crud::read();
	}
	//else{
	// 	require_once("../excaption.php");
	// }
}


/*


$sql = $conn->prepare("SELECT * FROM https ORDER BY id DESC");
$sql->execute();

while($result = $sql->fetch(PDO::FETCH_ASSOC)){
			// if(!session_name("Archive")){
			// 	session_start();
			// }
				echo "<br><th><td><b>Title</b></td><td><b>Link</b></td><td><b>Date<small>&</small>Time</b></td></th><br>
                        <tr class='table-row'><td>". $result['title'] ."</td><td><a href='". $result['link'] ."'>". $result['link']."</a></td><td>". $result['dt']."</td></tr>";
					//$data[] .= $result;
			}

*/