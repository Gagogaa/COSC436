<!DOCTYPE html>
<!--
    Gregory Mann
    people.emich.edu/gmann1/COSC436/project2-14/index.php
-->
<html>

<head>
    <title>haynesatemunix.emich.edu</title>
    <!-- <base href="http://emunix.emich.edu/~haynes/public_html"> -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>p, h1, h2, h3, h4, h5, h6 {text-align: center}</style>
</head>

<body>
<div class="container">

    <?php
    include("header.html");
    ?>

    <h1>Home page for Susan Makrouhee Haynes, PhD</h1>
    <p><a href="http://emich.edu/compsci">Department of Computer Science</a></p>
    <p>511E Pray-Harrold Hall</p>
    <p><a href="http://emich.edu">Eastern Michigan University</a></p>
    <p>Ypsilanti, MI 48197</p>
    <p>shaynesat emich dot edu</p>
    <p>v: 734-487-1063</p>
    <p>f: 734-487-6824</p>

    <h2>Office hours</h2>
    <p>WINTER 2017</p>
    <p>Monday 1:00 - 3:30pm  Wednesday 1:00 - 4:30pm</p>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <?php
            // Open the file and read in the data
            $file = fopen("course-data.txt", "r") or die("Unable to open file!");
            $fileData = fread($file,filesize("course-data.txt"));
            fclose($file);

            // Grab all the lines with "Haynes"
            preg_match_all('/(.*Haynes.*)/', $fileData, $matches);

            echo '<table class="table table-striped"><tr>' .
                    '<th>Classes</th>' .
                    '<th>Name</th>' .
                    '<th>Time</th>'.
                    '<th>Room</th>' .
                    '</tr>';

	          // Create a variable for the schemester
	          $schemester = "wi17";

	          // Create a function to make table rows from the lines in the data file
            function generate_rows($value){
		            global $schemester;
		            // I should of put this in a class
		            // or dictinary or something
                $value = preg_split('/;/', $value);
		            $courseNumber = trim($value[5]);
		            $coursePrefix = $value[4];
		            $courseName = $value[9];
		            $monday = $value[19];
		            $tuesday = $value[20];
		            $wednesday = $value[21];
		            $thursday = $value[22];
		            $friday = $value[23];
		            $courseStartTime = $value[17];
		            $courseEndTime = $value[18];
		            $roomNumber = $value[27];
		            $building = $value[26];
            	  echo "<tr>" .
                	   "<td><a href='$courseNumber/$schemester'>$coursePrefix $courseNumber</a></td>" .
                	   "<td>$courseName</td>" .
                	   "<td>$monday$tuesday$wednesday$thursday$friday$courseStartTime - $courseEndTime</td>" .
                	   "<td>$roomNumber $building</td>" .
                     "</tr>";
            }

	          // make the table rows
            array_walk($matches[1], "generate_rows");

            echo "</table>";
            ?>
        </div>
        <div class="col-md-2"></div>
    </div>

    <?php
    include("footer.html");
    ?>

</div>
</body>

</html>
