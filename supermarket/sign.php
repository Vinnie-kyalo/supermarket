<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <title>Supermarket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Welcome, please register your details here!</h2>
    <form method="post" action="sign.php">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" required></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" required></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="female" required> Female
                    <input type="radio" name="gender" value="male" required> Male
                </td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="tel" name="phone" id="phone" required></td>
            </tr>
            <tr>
                <td>DOB</td>
                <td><input type="date" name="dob" id="dob" required></td>
            </tr>
            <tr>
                <td>Street</td>
                <td><input type="text" name="street" required></td>
            </tr>
            <tr>
                <td>City</td>
                <td><input type="text" name="city" required></td>
            </tr>
            <tr>
                <td>Status</td>
                <td><input type="text" name="status" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>
<?php
$username = $email = $password = $first_name = $last_name = $gender = $phone = $dob = $street = $city = $status = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $street = $_POST["street"];
    $city = $_POST["city"];
    $status = $_POST["status"];

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "vinnie@universal254";
    $dbname = "user";

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user (username, email, password, first_name, last_name, gender, phone, dob, street, city, status) VALUES ('$username', '$email', '$password', '$first_name', '$last_name', '$gender', '$phone', '$dob', '$street', '$city', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "sign up successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    header("Location: login.php");

    $conn->close();
}
?>
