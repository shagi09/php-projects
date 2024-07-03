<?php
$error=[
    'email'=>'',
    'title'=>'',
    'ingredients'=>''
];
$email='';
$title='';
$ingredients='';
if(isset($_POST['submit'])){
    //echo htmlspecialchars($_POST['email']);
    //echo htmlspecialchars($_POST['title']);
    //echo htmlspecialchars($_POST['ingredients']);
    if(empty($_POST['email'])){
        $error['email']= 'please enter yor email';
    }
    else{
        $email=$_POST['email'];
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error['email']='email invalid';

        }
    }
    if(empty($_POST['title'])){
        $error['title']='please enter yor title';
}
else{
    $title=$_POST['title'];
    if(!preg_match("/^[a-zA-Z\s]+$/",$title)){
        $error['title']='title must consist of letters and spaces';
    }
}
    if(empty($_POST['ingredients'])){
        $error['ingredients']='please enter yor ingredient';
}
else{
    $ingredients=$_POST['ingredients'];
    if(!preg_match("/^[a-zA-Z\s]+$/",$ingredients)){
        $error['ingredients']='ingredients must consist of letters,spaces and commas';
    }
}
}




?>
<!DOCTYPE html>
<html lang="en">

    <?php include('layout/header.php')?>
    <h2 style='margin-left:600px;'>Add a pizza</h2>
    <div class='form-container' style='margin-left:580px;'>
        <form action="index.php" method='POST'>

        <label for="email">Email</label><br>
        <input type="text" name='email' value='<?php echo $email?>'><br>
        <div style='color:red;'><?php echo $error['email']?></div>
        <label for="title">Pizza title</label><br>
        <input type="text" name='title' value='<?php echo $title?>'><br>
        <div style='color:red;'><?php echo $error['title']?></div>
        <label for="ingredients">Ingredients(use comma)</label><br>
        <input type="text" name='ingredients' value='<?php echo $ingredients?>'><br>
        <div style='color:red;'><?php echo $error['ingredients']?></div>
        <button type='submit' name='submit'>Submit</button>
        </form>

    </div>



    <?php include('layout/footer.php')?>
    </html>





