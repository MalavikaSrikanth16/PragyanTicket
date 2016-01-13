<?php
function write($text1, $text2, $request_id)
{
	header('Content-Type: image/jpeg');
	$jpg_image = imagecreatefromjpeg('ticket_1.jpg');			
	$font_color = imagecolorallocate($jpg_image, 0, 0, 0);
	$font_path = 'KeepCalm-Medium.ttf';
	$font_size = 29;
	imagettftext($jpg_image, $font_size, 0, 750, 550, $font_color, $font_path, $text1);
    imagettftext($jpg_image, $font_size, 0, 750, 700, $font_color, $font_path, $text2);
	imagettftext($jpg_image, $font_size, 0, 2200, 115, $font_color, $font_path, $request_id);

	imagejpeg($jpg_image, $request_id.'_page.jpg');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Pragyanticket";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM Ticketdetails";
   $result = $conn->query($sql);
    if($result -> num_rows > 0) {  
         while($row = $result->fetch_assoc()) { 
         	$name= $row["Name"];
         	$org= $row["Organization"];
         	$summitid= $row["SummitID"];
         	write($name,$org,$summitid);

         }
    }
?>