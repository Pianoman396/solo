<?php  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require_once("sec.php"); pathcheck("MYPATH");
header("Cache-Control: no-cache, must-revalidate");

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Aran</title>
    <link rel="stylesheet" href="styles/main.css">

</head>
<body>
	<header class="head">
        <form action="routers/router.php" method="POST">
            <!-- enctype="multipart/form-data" -->
            <label for="title">Title <sup>*</sup></label>
            <br>
            <input type="text" id="title" class="title" name="title">
            <br>
            <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" value="save & view" datareset="true">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <br>
            <label for="link">Link<sup>*</sup></label>
            <br>
            <input type="text" id="link" class="link" name="link">
            <br>
            <br>
            <br>
            <label for="notes">Notes</label>
            <br>
            <textarea id="notes" class="notes" placeholder="This link about..."></textarea>

        </form>
        <input type="search" placeholder="Search">
        <div class="tringle"></div>
        <aside class="right">
            <div class="notice">
                <p>
                    <h1>Welcome dear guest :D</h1>
                    <span class="descript">
                        For use remember -- when you start type in `Link` input, begin typing the `http:// or https://`  words and chars, for find in archive list some words, just press `ctrl+f` in your browser. <br>
                        ----------------------------------- <br>
                        &nbsp;&nbsp;&nbsp;Have a good day )). <br>
                        -----------------------------------
                    </span>
                </p>
            </div>
        </aside>
    </header>
    <main class="main" role="main">

		<section class="data-container">
                <hr>
                    <div class="data"></div>
    		    <hr>
    	</section>
    </main>
    <footer id="footer">

    </footer>
    <script type="text/javascript" src="scripts/main.js" async="true"></script>
    <?php //$new_arr[]= unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
            //  echo "Latitude:".$new_arr[0]['geoplugin_latitude']." and Longitude:".$new_arr[0]['geoplugin_longitude']; ?>
</body>
</html>