<?php 
include("core/Classes/Crud.php");
include(__DIR__."/views/layouts/header.php");
$crud = new Crud();
$insertedMsg = '';

if($_SERVER["REQUEST_METHOD"] == "POST") 
{ 
    $data = array( 
        "name"   => $crud->escape_string($_POST['name']),            
        "email"  => $crud->escape_string($_POST['email']), 
        "phone_number"  => $crud->escape_string($_POST['phone']) 
    ); 
    
     
    if($crud->insert($data,'students'))
    { 
        $insertedMsg = 'Insert successfully'; 
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

  <?php if(!empty($insertedMsg)) { ?>
    
    <div class="notification is-success">
      <button class="delete"></button>
      <p><?= $insertedMsg ?></p>
    </div>
  <?php  } ?>
  <div class="field">
    <label class="label">Name</label>
    <div class="control">
      <input class="input" type="text" placeholder="Text input" name="name">
    </div>
  </div>

  <div class="field">
    <label class="label">Email</label>
    <div class="control has-icons-left has-icons-right">
      <input class="input" type="email" placeholder="Email input" name="email" >
    </div>
  </div>

  <div class="field">
    <label class="label">Phone no:</label>
    <div class="control has-icons-left has-icons-right">
      <input class="input" type="number" placeholder="Phone no" name="phone" >
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
  