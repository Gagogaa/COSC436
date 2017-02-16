<!--
     Gregory Mann
     gmann1
     E01457245
     02/09
     URL: http://people.emich.edu/gmann1/COSC436/homework2-9/part3.php
   -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Homework 2/9 part 3</title>
    <style>
     th {
       font-weight: bold;
     }
     
     td, th {
       padding: 5px;
     }

     p {
       font-size: 1.2em;
     }
    </style>
  </head>
  <body>
    <?php
    $suits = array("Spades", "Hearts", "Clubs", "Diamonds");
    $ranks = array("Ace", "King", "Queen", "Jack", "10", "9");

    $deck = array();

    $count = 0;
    
    /* Generate the deck of cards */
    for($i = 0; $i < count($suits); $i++){
      for($k = 0; $k < count($ranks); $k++){
        $deck[$count++] = $ranks[$k] . " of " . $suits[$i];
      }
    }

    /* Make a td element out of $value */
    function print_card($value){
      global $deck;
      
      echo "<td>" . $deck[$value] . "</td>";
    }

    /* Make table rows out of the player and the hand */
    function print_player_hand($value, $key){
      echo "<tr>" .
           /* Here i use $key as the player number */
           "<td>Player " . ($key + 1) . "</td>";

      /* Print every card in the players hand */
      array_walk($value, "print_card");
      
      echo "</tr>";
    }

    /* Make a table for each game */
    function print_game($game_number){
      echo "<p>Game Number: $game_number </p>" . 
           "<table>" .
           "<tr>" .
           "<th>Player</th>" .
           "<th>Card 1</th>" .
           "<th>Card 2</th>" .
           "<th>Card 3</th>" .
           "<th>Card 4</th>" .
           "<th>Card 5</th>" .
           "</tr>";
      
      global $deck;

      /* Shuffle the deck because array_rand() returns things in
         order */
      shuffle($deck);

      /* Select 20 random cards */
      $hands = array_rand($deck, 20);

      /* Split the 20 cards into 4 hands of 5 */
      $hands = array_chunk($hands,5);
      
      /* Print each player and thier hands */
      array_walk($hands, "print_player_hand");
      
      echo "</table>";
    }

    /* Print four games */
    for($i = 1; $i <= 4; $i++){
      print_game($i);
    }
    
    ?>
  </body>
</html>
