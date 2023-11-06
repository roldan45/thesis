<?php
// Part 4: Mga Database Interaction (patuloy)

// 4. Paano mag-update ng data sa isang database gamit ang PHP?
//    Maaari kang gumamit ng SQL query tulad ng UPDATE para ma-update ang data sa isang table.
//    Halimbawa ng pag-update ng data:
$sql = "UPDATE users SET username='new_username' WHERE id=1";
if ($conn->query($sql) === true) {
    echo "Record updated successfully.";
} else {
    echo "Error updating record: " . $conn->error;
}

// 5. Paano mag-delete ng data sa isang database gamit ang PHP?
//    Maaari kang gumamit ng SQL query tulad ng DELETE para ma-delete ang data sa isang table.
//    Halimbawa ng pag-delete ng data:
$sql = "DELETE FROM users WHERE id=1";
if ($conn->query($sql) === true) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . $conn->error;
}

// 6. Paano mag-transact sa isang database gamit ang PHP?
//    Ang mga transaksyon ay ginagamit upang masiguro ang consistency ng mga pagbabago sa database.
//    Halimbawa ng paggamit ng transaksyon:
$conn->autocommit(false); // I-disable ang autocommit

try {
    // Simulan ang transaksyon
    $conn->begin_transaction();

    // I-insert ang data
    $sql = "INSERT INTO users (username, email) VALUES ('john_doe', 'john.doe@example.com')";
    $conn->query($sql);

    // I-update ang data
    $sql = "UPDATE users SET email='johndoe@example.com' WHERE id=1";
    $conn->query($sql);

    // Committ ang transaksyon
    $conn->commit();
    echo "Transaction completed.";
} catch (Exception $e) {
    // Rollback ng mga pagbabago kung may error
    $conn->rollback();
    echo "Transaction failed: " . $e->getMessage();
}

// 7. Paano mag-handle ng mga error sa database interactions?
//    Maaari kang gumamit ng mga exception o pag-check ng errors para ma-handle ang mga error sa database interactions.
//    Halimbawa ng pag-handle ng error:
$sql = "SELECT * FROM non_existing_table";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $conn->error;
} else {
    // Itratrabaho ang mga resulta
    while ($row = $result->fetch_assoc()) {
        echo "User ID: " . $row["id"] . "<br>";
        echo "Username: " . $row["username"] . "<br>";
        echo "Email: " . $row["email"] . "<br>";
        echo "<br>";
    }
}

// Isara ang mga koneksyon
$conn->close();
?>

<?php
// Tsekahin kung na-submit ang form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];

    // Tsekahin ang haba ng password
    if (strlen($password) >= 8) {
        echo "Valid password. Proceed with further processing.";
    } else {
        echo "Invalid password. Minimum password length should be 8 characters.";
    }
}
?>

<!-- HTML Form -->
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <input type="submit" value="Submit">
</form>

<!-- HTML Form -->
<form>
    <label>
        <input type="radio" name="option" value="option1" disabled checked>
        Option 1 (Answered)
    </label>
    <br>
    <label>
        <input type="radio" name="option" value="option2" disabled>
        Option 2 (Not Answered)
    </label>
</form>
