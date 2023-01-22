<?php
include("dbconnect.php");
?>
<form action="" method="post">
<select name="courseName">
    <option value="">Select Course</option>

    <?php 
    $sql ="SELECT name FROM category";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
        $option =$row['name'];
        
        
      
    ?>
    <option value="<?php echo $option; ?>" ><?php echo $option; ?> </option>
   <?php
    }}
    ?>
</select>
<input type="submit" name="submit">
</form>



<tr>
      <th scope="row">1</th>
      <td>Pickle</td>
      <td>Food</td>
      <td>pickle by kudumbasree palakkad</td>
      <td>200</td>
      <td>10</td>
      <td></td>
      <td> <a href="edit-products.php" class="btn btn-primary">Edit</a>
            <a href="delete-products.php" class="btn btn-danger">delete</a>
      </td>
    </tr>
   
  </tbody>