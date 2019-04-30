
<html>
<head>

<title>Book MetaData</title>

<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;

}

input, select, textarea {
  width: 100%;
  height: 40px;
}

input[type=submit] {
  width: 50%;
  background-color: #7f7f7f;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-family: sans-serif;
}

input[type=submit]:hover {
  background-color: #999999;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

table, th, td {
    border: 1px solid black;
}
</style>
</head>

<body>

<h1>Book MetaData</h1>


<!--HEre start my first task: creating the database--->

<h2>Create Row Data Zone</h2><br>
    <div>
    <form action="BookAssignment.php" method="post">
    
    <!--<label for="id">Id</label>
    <input type="int" name="id"><br> -->
    
    <label for="creator">Creator</label>
    <input type="text" name="creator">

    <label for="title">Title</label>
    <input type="text" name="title">
    
    <label for="type">Type</label>
    <select id="typename" name="type">
      <option value=""></option>
      <option value="fiction">Fiction</option>
      <option value="romance">Romance</option>
      <option value="fantasy">Fantasy</option>
      <option value="crime">Crime</option>
    </select>
      
  <label for="identifier">Identifier</label>
    <input type="text" name="identifier">
  
  <label for="ndate">Date</label>
    <input type="date" name="date">

  <label for="language">Language</label>
   <font color=red>*</font>
   <select name="language">
    <option value=""></option>
     <option value="english">UKEnglish</option>
     <option value="french">French</option>
     <option value="spanish">Spanish</option>
     <option value="russian">Russian</option>
   </select>

    <label for="description">Description</label>
  <input type="description" name= "description">

  <input type="submit" name= "submit" value="Submit">
    <button type="reset" value="Reset">Reset</button>
    
     
  </form>
</div>

<div>
    

 

<?php
  function Create(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eBook_MetaData";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    
    $creator = $_POST['creator'];
    $title = $_POST['title'];
    $type = $_POST['type'];
    $identifier = $_POST['identifier'];
    $date = $_POST['date'];
    $language = $_POST['language'];
    $description = $_POST['description'];



$sql = "INSERT INTO eBook_MetaData(Id, creator, title, type, identifier, date, language, description)
    VALUES (DEFAULT,'$creator', '$title', '$type', '$identifier', '$date', '$language', '$description')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
}

if (isset($_POST['submit'])) {

  if(empty($_POST['language'])){
  echo "Language is Required";
}
else{
  Create();
  }
    

  }
?>


<!--Here start my second task: retrieving data into a table--->

<h2>Retrieve Table</h2><br>

<div>
    <form action="BookAssignment.php" method="post">

<input type="submit" class="button" name="retrieve" value="Retrieve">

    
  </form>
</div>

<?php
  function Retrieve(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eBook_MetaData";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    //$Id = isset($_GET['Id']) ? $_GET['Id'] : '';
     $Id = (isset($_POST['Id']) ? $_POST['Id'] : '');
    $sql = "SELECT * FROM eBook_MetaData";
    $result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table><tr>
    <th>ID</th>
    <th>Creator</th>
    <th>Title</th>
    <th>Type</th>
    <th>Identifier</th>
    <th>Date</th>
    <th>Language</th>
    <th>Description</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["Id"]."</td>
        <td>".$row["creator"]."</td>
        <td>".$row["title"]."</td>
        <td>".$row["type"]."</td>
        <td>".$row["identifier"]."</td>
        <td>".$row["date"]."</td>
        <td>".$row["language"]."</td>
        <td>".$row["description"]."</td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "No results";
}
$conn->close();
}

if (isset($_POST['retrieve'])) {
  Retrieve();
}


?>


<!--Here start my third task: Update the database--->

<h2>Update Row Data Zone</h2>


    
<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eBook_MetaData";

      // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 

    //$result = $MySQLi_CON->query("SELECT * From eBook_MetaData");
      $result = mysqli_query($conn,"SELECT * From eBook_MetaData");
  ?>


  
<table >
<tr>
    <th>ID</th>
    <th>Creator</th>
    <th>Title</th>
    <th>Type</th>
    <th>Identifier</th>
    <th>Date</th>
    <th>Language</th>
    <th>Description</th>
</tr>


<?php 
//while ($row = $result->fetch_array()){
while ($row = mysqli_fetch_array($result)) {

        echo "<tr><form action=BookAssignment.php method=post>";
        echo "<td><input type=int name=Id value=' ".$row['Id']."'></td>";
        echo "<td><input type=text name=creator value=' ".$row['creator']."'></td>";
        echo "<td><input type=text name=title value=' ".$row['title']."'></td>";
        echo "<td><input type=text name=type value=' ".$row['type']."'></td>";
        echo "<td><input type=text name= identifier value=' ".$row['identifier']."'></td>";
        echo "<td><input type=text name=date value=' ".$row['date']."'></td>";
        echo "<td><input type=text name=language value=' ".$row['language']."'></td>";
        echo "<td><input type=text name=description value=' ".$row['description']."'></td>";
        echo "<td><input type=submit name=update value=Update>";
        echo "</form></tr>";
  }
         //echo "<input type=submit name=update value=Update>";
        //echo "<input type='submit' name='update' value='UPDATE' />";
  ?>

</table>


<?php
  
//function UPDATE(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eBook_MetaData";

      // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 


    mysqli_select_db ( $conn, $dbname );

  

  if($conn) { echo "<div>Connection Successful</div>"; }

  // if(isset($_POST['update'])){

   $Id = (isset($_POST['Id']) ? $_POST['Id'] : '');
    $creator = (isset($_POST['creator']) ? $_POST['creator'] : '');
    $title = (isset($_POST['title']) ? $_POST['title'] : '');
    $type = (isset($_POST['type']) ? $_POST['type'] : '');
    $identier = (isset($_POST['identier']) ? $_POST['identier'] : '');
    $date = (isset($_POST['date']) ? $_POST['date'] : '');
    $language = (isset($_POST['language']) ? $_POST['language'] : '');
    $description = (isset($_POST['description']) ? $_POST['description'] : '');
  
  

   $sql = "UPDATE eBook_MetaData SET creator ='".$_POST['creator']."', title='".$_POST['title']."', type='".$_POST['type']."', identifier='".$_POST['identifier']."', date='".$_POST['date']."', language='".$_POST['language']."', 
   description='".$_POST['description']."' WHERE Id =$Id";


    if(mysqli_query($conn,$sql)){

      echo "Your database has been updated";
      echo "<br>Your new table:<br>";
      Retrieve();
    }

    else {
      echo "No updated";
    }
        
     mysqli_close($conn);
//}

?>




<!--Here start my Delete --->


 <h2>Delete Row Data Zone</h2>


    
<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eBook_MetaData";

      // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 

    //$result = $MySQLi_CON->query("SELECT * From eBook_MetaData");
      $result = mysqli_query($conn,"SELECT * From eBook_MetaData");
  ?>


  
<table >
<tr>
    <th>ID</th>
    <th>Creator</th>
    <th>Title</th>
    <th>Type</th>
    <th>Identifier</th>
    <th>Date</th>
    <th>Language</th>
    <th>Description</th>
</tr>


<?php 
//while ($row = $result->fetch_array()){
while ($row = mysqli_fetch_array($result)) {

        echo "<tr><form action=BookAssignment.php method=post>";
        echo "<td><input type=int name=Id value=' ".$row['Id']."'></td>";
        echo "<td><input type=text name=creator value=' ".$row['creator']."'></td>";
        echo "<td><input type=text name=title value=' ".$row['title']."'></td>";
        echo "<td><input type=text name=type value=' ".$row['type']."'></td>";
        echo "<td><input type=text name= identifier value=' ".$row['identifier']."'></td>";
        echo "<td><input type=text name=date value=' ".$row['date']."'></td>";
        echo "<td><input type=text name=language value=' ".$row['language']."'></td>";
        echo "<td><input type=text name=description value=' ".$row['description']."'></td>";
        echo "<td><input type=submit name=delete value=Delete>";
        echo "</form></tr>";
  }
        
  ?>

</table>


<?php
  
//function DELETE(){

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "eBook_MetaData";

      // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
      // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    } 


    mysqli_select_db ( $conn, $dbname );

  

  if($conn) { echo "<div>Connection Successful</div>"; }


 $Id = (isset($_POST['Id']) ? $_POST['Id'] : '');

  if(isset($_POST['delete'])){

   //$sql = "DELETE FROM eBook_MetaData WHERE Id ='$_GET[Id]'";
   $sql = "DELETE FROM eBook_MetaData WHERE Id =$Id";


    if(mysqli_query($conn,$sql)){

      echo "Your row has been deleted";
      echo "<br>Here is your new table:<br>";
      Retrieve();
    }

    else {
      echo "No deleted";
    }
        
     mysqli_close($conn);
}

?>    
 
<!--Here finish my html/php--->

</body>
</html>
