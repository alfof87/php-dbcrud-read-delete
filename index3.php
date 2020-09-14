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
            DELETE
            FROM `pagamenti`
            WHERE id = 6 AND status = "accepted"

           ";

    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
      echo "<ul>";
      while($row = $result->fetch_assoc()) {
            echo "<li>";
             echo "id: " . $row["id"] . " " . '<br>';
             echo "staus: " . $row["status"] . " " . '<br>';
             echo "price: " . $row["price"] . " " . '<br>';
             echo "prenotazione id: " . $row["prenotazione_id"] . " " . '<br>';
             echo "pagante id: " . $row["pagante_id"] . " " . '<br>';
             echo "creato il: " . $row["created_at"] . " " . '<br>';
             echo "caricato il: " . $row["updated_at"] . " " . '<br>';
            echo "</li>";
         }


     } elseif ($result) {
         echo "0 results";
     } else {
         echo "query error";
     }
     $conn->close();
?>
