<!--
     Gregory Mann
     gmann1
     E01457245
     02/09
     URL: http://people.emich.edu/gmann1/COSC436/homework2-9/part2.php
   -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Homework 2/9 part 2</title>
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
             "<td>$value->value</td>" .
             "</tr>";
      }

      array_walk($data_set, "make_table_rows");
      ?>
      
    </table>

    <p>value of stock</p>

    <table>
      
      <tr>
        <td>name</td>
        <td>value</td>
      </tr>
      
      <?php

      /* Computes the total value of all items in $data_set */
      function compute_value($value){
        return $value->amount * $value->value;
      }

      $values = array_map("compute_value", $data_set);

      /* Makes rows out of key value pairs */
      function make_rows($value,$key){
        echo "<tr>" .
             "<td>$key</td>" .
             "<td>\$$value</td>" .
             "</tr>";
      }
      
      array_walk($values, "make_rows");
      ?>
      
    </table>
  </body>
</html>
