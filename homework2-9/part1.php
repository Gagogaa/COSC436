<!--
     Gregory Mann
     gmann1
     E01457245
     02/09
     URL: http://people.emich.edu/gmann1/COSC436/homework2-9/part1.php
   -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Homework 2/9 part 1</title>
  </head>
  <body>
    
    <?php
    /* A simple data container */
    class data {
      function __construct($amount, $value){
        $this->amount = $amount;
        $this->value = $value;
      }
    }

    /* An array of data */
    $data_set = array(
      "bat"=>new data(5,3.50),
      "ball"=>new data(4,0.50),
      "base"=>new data(3,5.00),
      "umpire"=>new data(2,10000.0),
      "player"=>new data(4,5000.0)
    );
    ?>
    
    <table>
      <tr>
        <td>name</td>
        <td>in stock</td>
        <td>per item cost</td>
      </tr>
      
      <?php
      
      /* Constructs table rows from the data objects */
      function make_table_rows($value,$key){
        echo "<tr>" .
             "<td>$key</td>" .
             "<td>$value->amount</td>" .
             "<td>\$$value->value</td>" .
             "</tr>";
      }

      array_walk($data_set, "make_table_rows");
      ?>
      
    </table>
    
    <?php
    $number_of_items = 0;

    /* Calculates the total number of items in stock returning an array */
    function compute_number_of_items($value){
      global $number_of_items;
      $number_of_items += $value->amount;
    }
    
    array_walk($data_set, "compute_number_of_items");
    
    echo "<p>The total number of items in stock: </p>" . $number_of_items;

    ?>
    
  </body>
</html>
