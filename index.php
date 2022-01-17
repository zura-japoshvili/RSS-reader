<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSS reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">
        <input type="text" name="feedval" placeholder="Please enter the website feed URL" class="feedval">
        <input type="submit" class="sub-btn">
    </form>
    <?php 
        $url = "";
        if(isset($_POST['submit'])){
            if($_POST['feedval'] != ''){
                $url = $_POST['feedval'];
                echo $url;
            }else{
                echo 123123;
            }
        }
    ?>
</body>
</html>