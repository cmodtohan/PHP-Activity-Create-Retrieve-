<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "library";

$conn = new mysqli($server, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$book_title = $_POST["book_title"];
$author = $_POST["author"];
$customer_name = $_POST["customer_name"];

$sql = "INSERT INTO library (book_title, author, customer_name) VALUES ('$book_title', '$author', '$customer_name')";
if ($conn->query($sql) === TRUE) {
    $sql = "SELECT id, book_title, author, customer_name FROM library";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class='library-table'>";
        echo "<thead>";
        echo "<tr><th>ID</th><th>Book Title</th><th>Author</th><th>Customer Name</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["book_title"] . "</td>";
            echo "<td>" . $row["author"] . "</td>";
            echo "<td>" . $row["customer_name"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "0 results";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
