<?php
$name = $_POST['name'];
$email = $_POST['email'];
$mobile_num= $_POST['mobileNum'];
$comment=$_POST['textarea'];

// database connection
$test = new mysqli('localhost' , 'root','','feedback','3308');
if($test->connect_error){
    die('connection Failed : '.$test->connect_error);
}else{
    $stmt = $test->prepare("insert into websitefeedback(name, email, mobile_num,comment)values(?,?,?,?)");
     $stmt->bind_param("ssss",$name, $email, $mobile_num, $comment);
     $stmt->execute();
    // echo "Data  save......";
    header("Location:http://localhost/temple/main.html");
    $stmt->close();
    $test->close();
}
?>