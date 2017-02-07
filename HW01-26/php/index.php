<!doctype html>
<html lang="en">
	<head>
	<meta charset="UTF-8"/>
	<title>Document</title>
	</head>
	<body>
		<form action="index.php" method="POST">

		<?php
		class data {
		  function __construct($id, $item, $cost) {
				$this->id = $id;
				$this->item = $item;
				$this->cost = $cost;
			}
		}

		$dataSet = array(
			new data(20, "Pen", 2),
			new data(55, "Pencil", 1),
			new data(57, "Paper", 30),
			new data(60, "Stapler", 50)
		);

		$amountOfItems = array();
		
		if(count($_POST) != 0){ // if i have recived form data
			$total = 0;
			echo '<table><tr><td>Item</td><td>Quantity</td><td>Total Cost</td>';
			
			for ($i = 0; $i < count($_POST); $i++){
				if($_POST[$_dataSet[$i]->item] == 0){
					
				} else {
					$total += $_POST[$dataSet[$i]->item] * $dataSet[$i]->cost;
					echo '<tr><td>' . $dataSet[$i]->item .
							 '</td><td>' . $_POST[$dataSet[$i]->item] .
							 '</td><td>' . ($_POST[$dataSet[$i]->item] * $dataSet[$i]->cost) .
							 '</td></tr>';
					

				}
			}
			echo "</table><p>Total Order Cost: " + $total + "</p>";
			
		} else {
			echo '<table><tr><td>ID</td><td>Item</td><td>Cost per item</td><td>Quantity Ordered</td></tr>';
			for ($i = 0; $i < count($dataSet); $i++){
				echo '<tr><td>' . $dataSet[$i]->id . '</td>' .
						 '<td>' . $dataSet[$i]->item . '</td>' .
						 '<td>' . $dataSet[$i]->cost . '</td>' .
						 '<td><label><input name="' . $dataSet[$i]->item .
						 '" id="' . $dataSet[$i]->id .
						 '" type="number" value="0"/></label></td></tr>';
			}
			echo "</table>";
		}

		
		?>
			<button>Calculate order</button>
		</form>
	</body>
</html>
