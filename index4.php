<?php
  //seleziona dalla tabella pagamenti le colonne id, status e price di tutti
  //i pagamenti con price superiore a 600, stampa il risultato in una lista non ordinata
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
            SELECT pagamenti.id, pagamenti.status, pagamenti.price > 600 AS price
            FROM `pagamenti`

           ";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {
        echo $row["id"] . "<br>" . $row["status"] . "<br>" . $row["price"];
         }


     } elseif ($result) {
         echo "0 results";
     } else {
         echo "query error";
     }
     $conn->close();
?>
