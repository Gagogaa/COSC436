<!--
     Gregory Mann
     gmann1
     E01457245
     02/09
     URL: http://people.emich.edu/gmann1/COSC436/homework2-9/part5.php
   -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Homework 2/9 part 5</title>
  </head>
  <body>
    
    <?php
    class data {
      /* A simple data container */
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

    /* Make an array of orders */
    $orders = array(
      "bat"=>4,
      "player"=>-1
    );
    ?>

    <p>Orders:</p>
    <table>
      <tr>
        <td>name</td>
        <td>order amount</td>
      </tr>
      
      <?php

      /* Makes a table row out of key value pair */
      function print_orders($value, $key){
        global $orders;
        echo "<tr>" .
             "<td>$key</td>" .
             "<td>$value</td>" .
             "</tr>";
      }

      array_walk($orders, "print_orders");
      ?>
      
    </table>

    <p>the updated inventory is:</p>
    <table>
      <tr>
        <td>name</td>
        <td>in stock</td>
        <td>per item cost</td>
      </tr>
      
      <?php

      /* Updates the number of items in stock */
      function update_amounts($value, $key){
        global $data_set;
        $data_set[$key]->amount += $value;
      }

      array_walk($orders, "update_amounts");
      
      array_walk($data_set, "make_table_rows");
      ?>
      
    </table>
  </body>
</html>
