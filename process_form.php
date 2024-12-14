<?php

session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "care"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : null;
    $age = isset($_POST['age']) ? (int) $_POST['age'] : null;
    $gender = isset($_POST['gender']) ? htmlspecialchars($_POST['gender']) : null;
    $smoking = isset($_POST['smoking']) ? htmlspecialchars($_POST['smoking']) : null;
    $alcohol = isset($_POST['alcohol']) ? htmlspecialchars($_POST['alcohol']) : 'Not Provided';  
    $anyMajorSurgery = isset($_POST['any_major_surgery']) ? htmlspecialchars($_POST['any_major_surgery']) : 'Not Provided';
    $profession = isset($_POST['profession']) ? htmlspecialchars($_POST['profession']) : null;
    $bmi = isset($_POST['bmi']) ? (float) $_POST['bmi'] : null;
    $bloodGroup = isset($_POST['blood_group']) ? htmlspecialchars($_POST['blood_group']) : 'Not Provided';
    $allergies = isset($_POST['allergies']) ? htmlspecialchars($_POST['allergies']) : null;
    $anyChronicPain = isset($_POST['any_chronic_pain']) ? htmlspecialchars($_POST['any_chronic_pain']) : 'Not Provided';

   
    if (empty($name) || empty($age) || empty($gender)) {
        die("Error: Missing required fields.");
    }

   
    $sql = "INSERT INTO general (name, age, gender, smoking, alcohol, any_major_surgery, profession, bmi, blood_group, allergies, any_chronic_pain)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error: " . $conn->error);
    }

   
    $stmt->bind_param("sisssssssss", $name, $age, $gender, $smoking, $alcohol, $anyMajorSurgery, $profession, $bmi, $bloodGroup, $allergies, $anyChronicPain);

   
    if ($stmt->execute()) {
       
        header("Location: index.html");
        exit; 
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
}
?>
