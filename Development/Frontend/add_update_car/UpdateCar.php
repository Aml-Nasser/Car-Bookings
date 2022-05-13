<html>
<head>
<link rel="stylesheet" 
type="text/css" 
href="AddCar.css" /> 
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>  
  </head>
<body>
  <form method="post"><!--action="/action_page.php"-->
    <div id="display_image" name="img" >
  <!--<input type="file"  class="photofile" accept="image/png, image/jpg, image/jpeg" name="photo" id="image_input">-->
  <label class="btn .btn photofile">
<i class="fa fa-image"></i> Upload Image<input type="file" style="display: none;" accept="image/png, image/jpg, image/jpeg" name="photo" id="image_input"><!--" name="imagefilebtn"-->
</label>
 
 </div>
  <br><br> <br><br>

  <b><label class="menu"for="cars">ID</label></b>
   <b><label class="menu"for="cars">Brand</label></b>
   <b><label class="menu"for="cars">Color</label></b>
   <b><label class="menu"for="cars">Price</label></b>
   <br><br>
   <input class="menu" type="number" placeholder="Enter Car ID " name="id" style="height:25px;" required>
     

  <select class="menu width" name="names" id="Brand">
    <option value="Audi">Audi</option>
    <option value="Saab">Saab</option>
    <option value="Opel">Opel</option>
    <option value="Volvo">Volvo</option>
  </select>

   <select class="menu" name="color" id="color" >
    <option value="Black">Black</option>
    <option value="Red">Red</option>
    <option value="Gray">Gray</option>
  </select>
 
  <input class="menu price" type="number" placeholder="Enter car price" name="price" style="height:25px;" required>
  
  <br><br><br><br>
  <input class="AddBtn" type="submit" name="submit" value="Update">
</form>
<script src="AddCar.js"></script><!-- type="commonjs"-->

</body>
</html>

<?php
session_start();
require_once 'connect.php';
$db =new connect();
$conn=$db->connection();
//echo "0000000000000";
///w2ft hena 3lshan lessa msh 3arfa hi update fe anhy table
 if (isset($_POST['submit'])){//&&!empty($_POST['submit']))
     // echo "2222222222222";
      $photo=$_POST['photo'];
      $id=$_POST['id'];
      $name=$_POST['names'];
      $color=$_POST['color'];
      $price=$_POST['price'];
$update = "UPDATE carmodified SET image='$photo', name= '$name', color= '$color', price='$price'  WHERE id=' $id'";
  //echo "3333333333333";
  $query=mysqli_query($conn,$update);
    
    if ($query==TRUE){
      echo"<script> alert('car updated successfully')</script>";
}    
}
?>
