<?php 
include("core/Classes/Crud.php");
include(__DIR__."/views/layouts/header.php");
$crud = new Crud();
$id = $_GET['editid']; 
$data = $crud->selectbyid('students',$id); 

$insertedMsg = '';

if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
    $data = array( 
        "name"   => $crud->escape_string($_POST['name']),            
        "email"  => $crud->escape_string($_POST['email']), 
        "id"  => $crud->escape_string($_POST['edit_id']), 
        "phone_number"  => $crud->escape_string($_POST['phone']) 
    ); 
    
     
    if($crud->update($data, 'students', $data['id'] ))
    { 
        $insertedMsg = 'Updated successfully'; 
    }         
    else 
    { 
        $insertedMsg = 'Try Again'; 
    } 
        
} 


?>

<div class="columns">
  <div class="column is-10">
    <h1 class="title">
        
        Crud Application using PHP OOP
    </h1>

<form  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <input class="input" type="hidden" placeholder="Text input" name="edit_id" value="<?= $data['id'];?>">
  <?php if(!empty($insertedMsg)) { ?>
    
    <div class="notification is-success">
      <button class="delete"></button>
      <p><?= $insertedMsg ?></p>
    </div>
  <?php  } ?>
  <div class="field">
    <label class="label">Name</label>
    <div class="control">
      <input class="input" type="text" placeholder="Text input" name="name" value="<?= $data['name'];?>">
    </div>
  </div>

  <div class="field">
    <label class="label">Email</label>
    <div class="control has-icons-left has-icons-right">
      <input class="input" type="email" placeholder="Email input" name="email" value="<?= $data['email'];?>" >
    </div>
  </div>

  <div class="field">
    <label class="label">Phone no:</label>
    <div class="control has-icons-left has-icons-right">
      <input class="input" type="number" placeholder="Phone no" name="phone" value="<?= $data['phone_number'];?>">
    </div>
  </div>

  <div class="field is-grouped">
    <div class="control">
      <button class="button is-link" type="submit">Submit</button>
    </div>
    <div class="control">
      <button class="button is-link is-light"><a href="<?php echo BASE_URL?>index.php"> Cancel</a></button>
    </div>
  </div>
    </div>
  </div>
</form>



<?php 

include(__DIR__."/layouts/footer.php");

?>
  