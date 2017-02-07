
<!--
Lightly modified from Head First PHP & MySQL
-->

<html>
<head>
  <title>title of html page</title>
</head>

<body>
<p> share your story </p>

<form method="post" action="report.php">
  <label for="whenithappened">When did it happen? </label>
  <input type="text" id="whenithappened" name="whenithappened" /> <br />
  
  <label for="description"> Describe it </label>
  <input type="text" id="description" name="description"/> <br />
  
  <p>
  <label for="awake">Are you awake?</label> <br />
  Yes <input id="awake" name="awake" type="radio" value="yes" />
  No <input id="awake" name="awake" type="radio" value="no" /> <br />
  <input type="submit" value="report it" name="submit" />
  </p>


	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $whenithappened = $_REQUEST['whenithappened'];
    if (empty($whenithappened)) {
    echo "whenithappened is empty";
    } else {
    echo $whenithappened;
    }
		}
		?>

  
</form>
</body>
</html>
