<!DOCTYPE html>
<html>
<head>
    <title>Library Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Library Form</h1>
        <form action="save.php" method="POST">
            <label for="book_title">Book Title:</label>
            <input type="text" id="book_title" name="book_title" required>

            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>

            <label for="customer_name">Customer Name:</label>
            <input type="text" id="customer_name" name="customer_name" required>

            <input type="submit" value="Save">
        </form>

        <h2>Library Table</h2>
        <table class="library-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Customer Name</th>
                </tr>
            </thead>
			<tbody>
    			<?php
					$server = "localhost";
					$username = "root";
					$password = "";
					$dbname = "library";

					$conn = new mysqli($server, $username, $password, $dbname);

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT id, book_title, author, customer_name FROM library";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo "<tr>";
							echo "<td>" . $row["id"] . "</td>";
							echo "<td>" . $row["book_title"] . "</td>";
							echo "<td>" . $row["author"] . "</td>";
							echo "<td>" . $row["customer_name"] . "</td>";
							echo "</tr>";
						}
					} else {
						echo "<tr><td colspan='4'>0 results</td></tr>";
					}

					$conn->close();
				?>
			</tbody>

        </table>
    </div>
</body>
</html>

