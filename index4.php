<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "dbhotel";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn && $conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
        return;
    }

    $sql = "
            SELECT pagamenti.id, pagamenti.status, pagamenti.price > 600
            FROM `pagamenti`

           ";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      echo "<ul>";
      while($row = $result->fetch_assoc()) {
            echo "<li>";
             echo "id: " . $row["id"] . " " . '<br>';
             echo "stato: " . $row["status"] . " " . '<br>';
             if ("price" > 0 == true) {
               echo "prezzo: " . $row["price"] . " " . '<br>';///////////////////////
             }

            echo "</li>";
         }
      echo "</ul>";

     } elseif ($result) {
         echo "0 results";
     } else {
         echo "query error";
     }
     $conn->close();
?>
