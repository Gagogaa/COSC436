<!--
		 Gregory Mann
		 Homework 01-26
	 -->

<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8"/>
		<title>Document</title>
	</head>
	<body>
		<form action="index.php" method="POST">

			<?php
			/* create the data records */			
			class data {
				function __construct($id, $item, $cost) {
					$this->id = $id;
					$this->item = $item;
					$this->cost = $cost;
				}
			}

			/* fill the array with the data records */
			$dataSet = array(
				new data(20, "Pen", 2),
				new data(55, "Pencil", 1),
				new data(57, "Paper", 30),
				new data(60, "Stapler", 50)
			);

			/* determine if the page was loaded with data and print accordingly */
			if(count($_POST) != 0){ // if i have recived form data
				$total = 0;
				echo '<table><tr><td>Item</td><td>Quantity</td><td>Total Cost</td>';

				/* construct the table elements if the number of items ordered is > 0 */
				for ($i = 0; $i < count($_POST); $i++){
					if($_POST[$dataSet[$i]->item] == 0){
						
					} else {
						
						$total += $_POST[$dataSet[$i]->item] * $dataSet[$i]->cost;
						
						echo '<tr><td>' . $dataSet[$i]->item .
								 '</td><td>' . $_POST[$dataSet[$i]->item] .
								 '</td><td>' . ($_POST[$dataSet[$i]->item] * $dataSet[$i]->cost) .
								 '</td></tr>';
						

					}
				}
				echo "</table><p>Total Order Cost: " . $total . "</p>";
				
			} else { /* I havnt recived form data */
				echo '<table><tr><td>ID</td><td>Item</td><td>Cost per item</td><td>Quantity Ordered</td></tr>';

				/* construct the table data from the dataSet */
				for ($i = 0; $i < count($dataSet); $i++){
					echo '<tr><td>' . $dataSet[$i]->id . '</td>' .
							 '<td>' . $dataSet[$i]->item . '</td>' .
							 '<td>' . $dataSet[$i]->cost . '</td>' .
							 '<td><label><input name="' . $dataSet[$i]->item .
							 '" id="' . $dataSet[$i]->id .
							 '" type="number" value="0"/></label></td></tr>';
				}
				echo "</table><button>Calculate order</button>";
			}
			?>

		</form>
	</body>
</html>
