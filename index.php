<?php
session_start();

setcookie("username", "shalom", time() -(0), "/");
if (isset($_COOKIE["username"])) {
    echo "username is " . $_COOKIE["username"];
}

$error = [
    'email' => '',
    'title' => '',
    'ingredients' => ''
];

$email = '';
$title = '';
$ingredients = '';

if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $error['email'] = 'please enter your email';
    } 
    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'email invalid';
        } 
    else {
            $email = $_POST['email'];
            $_SESSION['email'] = $email;
        }

    

    if (empty($_POST['title'])) {
        $error['title'] = 'please enter your title';
    } else {
        if (!preg_match("/^[a-zA-Z\s]+$/", $_POST['title'])) {
            $error['title'] = 'title must consist of letters and spaces';
        } else {
            $title = $_POST['title'];
            $_SESSION['title'] = $title;
        }
    }

    if (empty($_POST['ingredients'])) {
        $error['ingredients'] = 'please enter your ingredient';
    } else {
        if (!preg_match("/^[a-zA-Z\s,]+$/", $_POST['ingredients'])) {
            $error['ingredients'] = 'ingredients must consist of letters, spaces, and commas';
        } else{
            $ingredients = $_POST['ingredients'];
            $_SESSION['ingredients'] = $ingredients;
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





