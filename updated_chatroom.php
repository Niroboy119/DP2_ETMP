<?php
include('include/header.php');

  if(!isset($_SESSION["username"]))
  {
    header('location: login.html');
  }

  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        
        <meta charset="utf-8" />
        <meta name="description" content="Chat Room" />
        <title>Chat Room</title>
        <style type="text/css">

#wrapper {
    margin: 0 auto;
    padding-bottom: 25px;
    background: white;
    width: 1500px;
	height: 650px;
    max-width: 100%;
    border: 2px solid #212121;
    border-radius: 4px;
  }
  
 


  
  #menu {
    padding: 15px 25px;
    display: flex;
  }
  
  #menu p.welcome {
    flex: 1;
  }
  
   a#exit {
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: bold;
  }
  
   .msgln {
    margin: 0 0 5px 0;
  }
   
  .msgln span.left-info {
    color: #3CB371;
  }
   
   
  .msgln b.user-name, .msgln b.user-name-left {
    font-weight: bold;
    background: #546e7a;
    color: white;
    padding: 2px 4px;
    font-size: 90%;
    border-radius: 4px;
    margin: 0 5px 0 0;
  }
   
  .msgln b.user-name-left {
    background: #3CB371;
  }
   
    #chatbox {
    text-align: left;
    margin: 0 auto;
    margin-bottom: 25px;
    padding: 10px;
    background: #fff;
    height: 500px;
    width: 1430px;
    border: 1px solid black;
    overflow: auto;
    border-radius: 4px;
    border-bottom: 4px solid #a7a7a7;
  }
  
  form {
    padding: 15px 25px;
    display: flex;
    gap: 10px;
    justify-content: center;
  }
   
  form label {
    font-size: 1.5rem;
    font-weight: bold;
  }
  
   #submitmsg,
  #enter{
    background: #3CB371;
    border: 2px solid #3CB371;
    color: white;
    padding: 4px 10px;
    font-weight: bold;
    border-radius: 4px;
  
      
  }
  
  
  
  
  #comment {
    flex: 1;
    border-radius: 4px;
    border: 1px solid #3CB371;
  }
  
        </style>
    </head>
    <body>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome, <b><?php echo $_SESSION['fullname']; ?></b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            </div>
 
            <div id="chatbox">
            <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>
 
            <form name="message" method="post" id ="comment_form">
                <!--<input type="text" name="subject" id="subject" class ="form-control"/>-->
                <input name="comment" type="text" id="comment" class="form-control"/>
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#comment").val();
                    $.post("post.php", { text: clientmsg });
                    $.post("notification_insert.php", { subject: clientmsg, comment: clientmsg });
                    $("#comment").val("");
                    return false;
                });
 
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; 
 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); 
 
                            //Auto-scroll           
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; 
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); 
                            }   
                        }
                    });
                }
 
                setInterval (loadLog, 2500);
 
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index2.php?logout=true";
                    }
                });
            });
        </script>
    </body>
</html>

