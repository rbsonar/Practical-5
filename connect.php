<?php
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$age = $_POST['age'];
$mobile = $_POST['mobile'];

$conn = new mysqli('localhost','id14872836_registration','Password@123','id14872836_registrationevent');
if($conn->connect_error){
    die('connection failed :'.$conn->connect_error);
}
else{
    
    $stmt = $conn->prepare("insert into registerdata(name, gender, email, age, mobile) 
    values(?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii",$name,$gender,$email,$age,$mobile);
    $stmt->execute();
    echo "Registered successfull";
    $stmt->close();
    $conn->close();

    
}

$connect = new mysqli('localhost','id14872836_registration','Password@123','id14872836_registrationevent');

$sql = "SELECT * from registerdata";

$output = mysqli_query($connect, $sql);

$json_array = array();

while($row = mysqli_fetch_assoc($output))
{
    $json_array[] = $row;

}

$json_data = json_encode($json_array);
file_put_contents('data.json', $json_data)





?>
