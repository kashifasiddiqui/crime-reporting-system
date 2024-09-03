<?php include 'pdo.php';
   session_start();
   if (!isset($_SESSION['user_id'])) {
      header('location: login1.php');
      return;
   }

   if (isset($_POST['message'])) {
      $sql = "INSERT INTO message (content, user_id) VALUES (:content, :user_id)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(array(
         ':content' => $_POST['message'],
         ':user_id' => $_SESSION['user_id']
      ));
      header('location: index1.php');
      return;
   }
   $sql = "SELECT * FROM message ORDER BY id";
   $stmt = $pdo->query($sql);
?>
<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Chat</title>
      <style>
body {
   background-color: white;
}
h2{
   border-radius: 5px;
   padding: 10px;
   background-color: grey;
   max-width: 20%;
}
h1,h2 {
color: black;
text-align: center;
}
.bg-color-gray {
    background-color: rgb(231, 231, 231);
    min-height: 70svh;
    overflow-y: scroll;
 }
 
 .message {
    padding: 3px 10px;
    border: 1px solid gray;
    border-radius: 5px;
    text-align: left;
    max-width: 70%;
 }
 
 .message-header {
    font-size: small;
    text-align: left;
 }
 
 .my-message {
    margin-left: auto;
    background-color: rgb(175 255 176);
 }
 .others-message {
    background-color: rgb(250 235 215);
    margin-right: auto;
 }
 .send-message {
    min-height: 5vh;
 }
 
 .max-height-90 {
    max-height: 90vh;
    display: flex;
 }
 
 .d-flex {
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: center;
 }

 .send-message {
    display: flex;
    align-items: center;
    padding: auto;
}

.send-message .form-control {
    height: 100%;
}

.send-message .col-9, 
.send-message .col-md-10, 
.send-message .col-3, 
.send-message .col-md-2 {
    padding: 10px 0 0 0;
}


</style>
   </head>
   <body>
      <div class="container-fluid">
         <div class="row p-2 bg-color-green">
            <h2 class="col-12">Community Chat</h2>
         </div>
         <div class="row p-2 bg-color-gray">
            <?php
               while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
               if($row['user_id'] == $_SESSION['user_id']){
            ?>
            <div class="col-12">
               <div class="d-flex">
                  <div class="message my-message">
                     <b class="message-header">Me:</b>  
                     <div><?=$row['content']?></div>
                  </div>
               </div>
            </div>
            <?php
               }else{
            ?>
            <div class="col-12">
               <div class="d-flex">
                  <div class="message others-message">
                     <b class="message-header"><?=$row['user_id']?>:</b>  
                     <div><?=$row['content']?></div>
                  </div>
               </div>
            </div>
            <?php
               }
               }
            ?>
         </div>
         <form class="row p-2 bg-color-green send-message" action="index1.php" method="POST">
            <div class="col-9 col-md-10">
               <input type="text" name="message" class="form-control" placeholder="Write your message" >
            </div>
            <div class="col-3 col-md-2">
               <button type="submit" class="btn btn-light form-control">Send</button>
            </div>
         </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
   </body>
</html>