<?php
session_start();
 




if (!isset($title)){
    $title = "Contact";
}

$success = '';
$isValid = true;
$errors = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // print_r($_POST);
    $isValid = false;
    //do some validations
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $answer = $_POST['answer'];
    if (preg_match("/.+@\w+\.\w+/", $email)) { //regular expression for email validation \ truthy statement
        $isValid = true;
    } else {
        $isValid = false;
        $errors['email'] = "Invalid email format";
    }
    if (preg_match("/^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/", $phone)) { //regular expression for phone validation \ truthy statement
        $isValid = true;
    } else {
        $isValid = false;
        $errors['phone'] = "Invalid phone number";
    }
    if ($_SESSION['captcha'] == $_POST['answer']){
        $isValid = true;
    }  else{
        $isValid = false;
        $errors['answer'] = "Incorrect";
    }
        
   
    
    

    //if all is good, save to the DB or CRM
    if ($isValid){
        $name = '';
        $email = '';
        $phone = '';
        $answer = '';
        $success = "Form submitted successfully!";
    }


}

$a = mt_rand(10,99);   
$b = mt_rand(10,99);
$c = $a + $b;

$_SESSION['captcha'] = $c;




?>

<?php include('header.php'); ?>

    <h1>contact</h1>
    <div class="form-container">
    <form action="" method="POST">
    <!-- most forms use POST   -->
    <!-- GET is another method -->

    <?php
        if (!$isValid){
            ?>
            <p class="error-message"> Invalid data provided!</p>
            <?php
        } else if (@$success){
            ?>
            <p class="success-message"><?php echo $success; ?> </p>
            <?php
        }
    ?>

    <div class = "form-container">
        <form action="">
            <p class="form-field">
            <label for="name">Name</label>
            <input id="name" name="name" value="<?php echo @$name; ?>">
            </p>

            <p class="form-field <?php echo @$errors['email'] ? 'error' : ''; ?>" >
            <label for="email">Email</label>
            <input id="email" name="email" value="<?php echo @$email; ?>">
            <span class ="error-message"> <?php echo @$errors['email']; ?> </span> 
            </p>
            <p class="form-field <?php echo @$errors['phone'] ? 'error' : ''; ?>" >
            <label for="phone">Phone #</label>
            <input id="phone" name="phone" value="<?php echo @$phone; ?>">
            <span class ="error-message"> <?php echo @$errors['phone']; ?> </span> 
            </p>
            <p class="form-field <?php echo @$errors['answer'] ? 'error' : ''; ?>" >
            <label for="answer"><?php echo $a . '+' . $b ?> </label>
            <input id="answer" name="answer" value="">
            <span class ="error-message"> <?php echo @$errors['answer']; ?> </span> 
            </p>
            <button type="submit">Submit</button>
        </form>
    </div>
   
    

<?php include('footer.php'); ?>