<?php
    session_start();
    include ("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>sign up</title>
</head>
<body class="body" >
    <header style="background: rgba(255, 255, 255, 0);">
    <img class="logo" src="images/logo.png" alt="Baraton Logo"><br>
            <h1>UNIVERSITY OF EASTERN AFRICA BARATON</h1>
    </header>

    <fieldset class="field">
        <legend><strong>Create An Account....</strong></legend>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>"method = "post">
                Username: 
                <input class="input" id="input" type="text" name="f_name" required placeholder="FIRST NAME"><br>
                <input class="input" id="input" type="text" name="l_name" required placeholder="LAST NAME"><br>
                <input class="input" id="input" type="text" name="m_name" required placeholder="MIDDLE NAME"><br><br>

                University ID:
                <input class="input" type="text" name="s_id" required ><br><br>
                
                E-Mail: 
                <input class="input" type="email" name="mail" required placeholder="example@ueab.ac.ke"><br><br>
                
                Password: <input class="input" type="password" name="password" required minlength="8"><br><br>                
                Confirm Password: <input class="input" type="password" name="confirm" required minlength="8"><br><br>

                Are you a Student or an Admin..?
                <br><br>
                <label for="lecturer"><input type="radio" id="lecturer" name="class" value="Lecturer" onclick="toggleMenu()"> Lecturer</label>
                <label for="student"><input type="radio" id="Student" name="class" value="Student" onclick="toggleMenu()"> Student</label><br><br>

                <div id="adrpodoen">
                <!-- Content of the adrpodoen menu goes here -->
                <h3>Which sector..?</h3><br>
                <ol style="list-style-type: none; padding: 0; margin: 0;">
                    <li><label for="role1"><input type="radio" name="role" id="role1" value="Library"> Library</label></li><br>
                    <li><label for="role2"><input type="radio" name="role" id="role2" value="Health"> Health</label></li><br>
                    <li><label for="role3"><input type="radio" name="role" id="role3" value="Food"> Food</label></li><br>
                    <li><label for="role4"><input type="radio" name="role" id="role4" value="Physical Plant"> Physical Plant</label></li><br>
                    <li><label for="role5"><input type="radio" name="role" id="role5" value="Accomodation"> Accommodation</label></li><br>
                    <li><label for="role6"><input type="radio" name="role" id="role6" value="B.I.S"> B.I.S</label></li><br>
                    <li><label for="role7"><input type="radio" name="role" id="role7" value="Work Program"> Work Program</label></li><br>
                    <li><label for="role8"><input type="radio" name="role" id="role8" value="Sports and Entertainment"> Sports and Entertainment</label></li><br>
                    <li><label for="role9"><input type="radio" name="role" id="role9" value="DVC SAAS"> DVC SAAS</label></li><br>
                    <li><label for="role10"><input type="radio" name="role" id="role10" value="Finance"> Finance</label></li><br>
                    <li><label for="role11"><input type="radio" name="role" id="role11" value="HOD"> HOD</label></li><br>
                    <li><label for="role12"><input type="radio" name="role" id="role12" value="Registrar"> Registrar</label></li><br>
                    <li><label for="role13"><input type="radio" name="role" id="role13" value="ITS"> ITS</label></li><br>
                </ol>
                </div>

                <script>
                    function toggleMenu() {
                    var lecturerRadio = document.getElementById("lecturer");
                    var adrpodoenMenu = document.getElementById("adrpodoen");

                    if (lecturerRadio.checked) {
                        adrpodoenMenu.style.display = "block";
                    } else {
                        adrpodoenMenu.style.display = "none";
                    }
                    }
                </script>

                <input id="sbtn" type="submit" name="submit" value="Register">
                <input id="sbtn" type="reset" value="Reset"><br><br>
                <label id="question">You already have an account ?? <a href="login.php">Login here</a></label>
                               
        </form>
    </fieldset>
   
</body>
</html>



<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
        if ($_POST["password"] == $_POST["confirm"]){

            $f_name= $_SESSION['f_name']= filter_input(INPUT_POST,"f_name",FILTER_SANITIZE_SPECIAL_CHARS);
            $m_name= $_SESSION["m_name"]= filter_input(INPUT_POST,"m_name",FILTER_SANITIZE_SPECIAL_CHARS);
            $l_name= $_SESSION["l_name"]= filter_input(INPUT_POST,"l_name",FILTER_SANITIZE_SPECIAL_CHARS);

            $s_id= $_SESSION["s_id"]= filter_input(INPUT_POST,"s_id",FILTER_SANITIZE_SPECIAL_CHARS);

            $password = $_SESSION["password"]= filter_input(INPUT_POST,"password",FILTER_SANITIZE_SPECIAL_CHARS);
            $mail = $_SESSION["e-mail"]= filter_input(INPUT_POST, "mail", FILTER_SANITIZE_EMAIL);
            
            $class = $_SESSION["class"]= filter_input(INPUT_POST, "class", FILTER_SANITIZE_SPECIAL_CHARS);
            $role = $_SESSION["role"]= filter_input(INPUT_POST, "role", FILTER_SANITIZE_SPECIAL_CHARS);

            $hash = password_hash($password,PASSWORD_DEFAULT);

            try{
                
                $sql ="INSERT INTO users (user, L_Name, M_Name, S_ID, email, class, role,  password)
                        VALUES('$f_name','$l_name','$m_name','$s_id','$mail','$class','$role', '$hash')";
            
                mysqli_query($conn,$sql);
                exit(); 
                   }
            catch(mysqli_sql_exception){
                echo 'user exists';
                
            }
        }

        else{
            echo 'The password dont march';
        }
    

}
?>