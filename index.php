<?php 

include_once("core/Classes/Crud.php");

include(__DIR__."/views/layouts/header.php");

$crud = new Crud();
$result = $crud->selectalldata("students"); 

if(!empty($_GET['delid'])) 
{ 
      
    $id = $_GET['delid']; 
    $crud->deletedata("students",$id); 
    header('location:index.php'); 
} 

?>

<div class="columns">
  <div class="column is-10">
    <h1 class="title">
        
        Crud Application using PHP OOP
    </h1>
  </div>
  
  <div class="column ">
    <div class="buttons is-centered ">
            <button class="button is-primary"> <a href="add_student.php" class="btn btn-primary">Add Student</a> </button>
        </div>
  </div>
</div>

<div>
    
    
</div>

<div class="table-container">
  <table class="table is-fullwidth">
  <thead>
    <tr>
      <th><abbr title="Position">Student Name</abbr></th>
      <th>Phone number</th>
      <th><abbr title="Played">Email address</abbr></th>
      <th><abbr title="Won"> Action</abbr></th>
      
    </tr>
  </thead>

  <tbody>
  
    <?php
      while($data = mysqli_fetch_array($result)) 
        { 
    ?> 
              
        <tr> 
          <td><?php echo $data['name']; ?></td> 
          <td><?php echo $data['phone_number']; ?></td> 
          <td><?php echo $data['email']; ?></td> 
          <td>
            <button class="button is-primary is-small"> <a href="edit_student.php?editid=<?= $data['id'];?>"> Edit </a></button> |
            <button class="button is-danger is-small"><a href="index.php?delid=<?= $data['id'];?>" onclick=" return confirm('Do You really want to delete this data?')"> Delete </a></button> 
          </td> 
        </tr> 
    <?php } ?> 

    
  </tbody>
  </table>
</div>

<?php 

include("views/layouts/footer.php")

?>
  