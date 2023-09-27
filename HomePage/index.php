<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../HomePage/indexstyle.css" />
    <!-- CHATBOT -->
    <link rel="stylesheet" href="../HomePage/chat_stylesheet.css" />
    <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/a7affe22b8.js" crossorigin="anonymous"></script>
      <!-- JAVASCRIPT -->
        <!-- JQUERY FOR INSERTING AUTOMATED RESPONSES -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <title>PharmaLogue</title>
    <style>
        body {
          background-image: url('bgpic.jpg');
          background-repeat: no-repeat;
          background-attachment: absolute;  
          background-size: cover;
        }
    </style>
  </head>
  <body>

    <!-- Navbar -->
    <nav>
        <label class="logo">PHARMA</label>
        <label class="logo1"><i>LOGUE</i></label>
        <ul id="myDIV">
          <li>
            <a href="../HomePage/maps.php">
            <i class="fa-solid fa-location-dot"></i>
            BRANCHES</a>
          </li>
          <li class="accounts">
              <a href="#">
              <i class="fa-solid fa-user"></i>
              ACCOUNTS </a>
              <ul>
                <li><a href="../HomePage/login.php"><b>Admin</b></a></li>
                <li><a href="../HomePage/login.php"><b>Clerk</b></a></li>
              </ul>
              <script>
              // Add click event listener to toggle a CSS class
              var accountsElement = document.querySelector('.accounts');
              accountsElement.addEventListener('click', function () {
                this.classList.toggle('active');
              });
              </script>
            </li>
          <li id="visible">
            <a href="#">
            <i class="fa-solid fa-message"></i>
            Pharma-KONSULTA</a>
          </li>
        </ul>
    </nav>

    <div class="tagline"; style="position:absolute; left: 115px; top: 278px">
        <h1>Serving Quality &<br>Genuine Medicines<br></h1>
        <h2 class="tagline2"; style="position:absolute; left:0px; top: 100px">Your family pharmacy. Where medicine makes sense.</h2>
    </div>

    <div style= "position:absolute; left:175px; top: 422px">
        <a href="https://www.facebook.com/profile.php?id=100087394658461" class = "us-btn"><b>ABOUT US</b></a>
    </div>

    <div style= "position:absolute; left:280px; top: 422px">
        <a href="../CustomerUI/customer_catalogue.php" class = "us-btn"><b>CATALOGUE</b></a>
    </div>

    <!------------------------------ CHATBOT ------------------------------>
    <section>
      <div class="container">
          <div class="chatbox">
              <div class="chatbox-header">
                      <h2> PHARMA<i>KONSULTA</i> </h2>
              </div>

              <div class="chatbox-messages">
                      
                  <div class="chat incoming">
                      <div class="details">
                          <p>Good day! How are you feeling today?</p>
                      </div>
                  </div>

              </div>

              <div class="chatbox-footer">

                  <div class="column">
                      <form class="text-box">
                          <input type="text" id="data" class="input-field" placeholder="Aa">
                      </form>
                  </div>

                  <div class="column">
                      <div class="send-message-box">
                          <button class="send-message-button" id="send-btn">
                              <i class="fab fa-telegram-plane fa-3x"></i>
                          </button>
                      </div>
                  </div>

              </div>

          </div>

          <div id="popup-chat-button" class="chatbox-popup-button">
                  <button class="show-chat">
                      <i class="fa-solid fa-comment-dots fa-flip-horizontal fa-5x"></i>
                  </button>
          </div>

          <div id="close-chat-button" class="close-chatbox-button">
                  <button class="close-chat">
                      <i class="fa-solid fa-comment-dots fa-flip-horizontal fa-5x"></i>
                  </button>
          </div>

      </div>
  </section>

  <script>

      // CHAT BUTTON OPEN CHATBOT
      const section = document.querySelector("section"),
          showBtn= document.querySelector(".show-chat"),
          closeBtn= document.querySelector(".close-chat");

      showBtn.addEventListener("click", ()=>section.classList.add("active"));
      closeBtn.addEventListener("click", ()=>section.classList.remove("active"));

      // CHAT MESSAGE
          // Pressing the SEND button on the PharmaKonsulta Chatbot
          $(document).ready(function(){
              $("#send-btn").on("click", function(){
                  $value = $("#data").val();
                  $msg = '<div class = "chat outgoing"><div class = "details"><p>'+ $value +'</p></div></div>';
                  $(".chatbox-messages").append($msg);
                  $("#data").val('');
                  
                  // start ajax code
                  $.ajax({
                      url: '../HomePage/message.php',
                      type: 'POST',
                      data: 'text='+$value,
                      success: function(result){
                          $replay = '<div class = "chat incoming"><div class = "details"><p>'+ result +'</p></div></div>';
                          $(".chatbox-messages").append($replay);

                          // when the chat goes down the scroll bar automatically comes to the bottom
                          $(".chatbox-messages").scrollTop($(".chatbox-messages")[0].scrollHeight);
                      }
                  });
              });
          });

          // Catching the ENTER Button Click
          var input = document.getElementById("data");

          // Execute a function when the user presses a key on the keyboard
          input.addEventListener("keypress", function(event) {

              // If the user presses the "Enter" key on the keyboard
              if (event.key === "Enter") {

                  // Cancel the default action, if needed
                  event.preventDefault();
                  
                  // Trigger the button element with a click
                  document.getElementById("send-btn").click();
              }
          });

      // PHARMAKONSULTA OPEN CHATBOT
      $(function() {
          $("#visible").click(function() {
              $("section").toggleClass("active");
          });
      });

  </script>

</body>
</html>