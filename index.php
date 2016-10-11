<?php 
    
    $result="";
   
    if (isset($_POST["submit"])) {        
        
    

        if (!$_POST["name"]) {
            
            $error="<br />Please enter your name";
        }

        if (!$_POST["email"]) {
            

            $error.="<br />Please enter your email";
        }
        
        if (!$_POST["comment"]) {

            $error.="<br />Please enter your comment";
        }

        if ($_POST["email"] AND !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { 
            $error.="<br />Please enter a valid email adress"; 
        } 

        if (isset($error)){

            $result='<div class="alert aviso"><strong>There were error(s) in your form:</strong><i>'.$error.'</i></div>';
        } else {

            if (mail("geralfonsocastillo@gmail.com", "Comment from website!", "Name: ".$_POST['name']."

Email: ".$_POST['email']."

Comment: ".$_POST['comment'])) {
                /*$result='<div class="aviso_success">Form submitted</div>';*/
                $result='<div class="aviso_success">Thank you! I\'ll get in touch.</div>';
                $success = true;

            } else {
                $result='<div class="alert aviso"><strong>There was an error sending your message. Please try again later.</strong></div>';
            }
        }
    }

    
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Contact</title>
        <meta name="description" content="Una guía interactiva de primeros pasos para Brackets.">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">        
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        
        

    </head>
    <body>

        <div class="container">
            <div class="rojo"></div>
            <div class="azul"></div>
            <div class="verde"></div>
            <div class="amarillo"></div>

                <main>        
                

                    <header>
                        <h1>My Email Form</h1>
                        <?php                                   
                        echo $result; ?>                            
                        <p>Please get in touch. I'll back to you as soon as I can</p>
                        
                    </header><!-- /header -->
                    
                    <form method="post">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter your Name" value="<?php if (isset($_POST['name'])){ echo $name = $_POST['name'];} ?>" >   
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter your Email" value="<?php if(isset($_POST['email'])){ echo $email = $_POST['email'];} ?>">
                        <label for="comment">Comments</label>                     
                        <textarea name="comment" placeholder="Enter your Comments"><?php if(isset($_POST['comment'])){ echo $comment = $_POST['comment']; }  ?></textarea>
                        <input type="submit" name="submit" value="Submint">
                    </form>
                
                    <!-- if (!empty($_POST["name"]) && !$success) { echo $_POST["name"]; } -->

            </main>
        </div>                 
    </body>
</html>