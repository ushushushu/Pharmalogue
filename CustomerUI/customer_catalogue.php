<?php
 $servername = "localhost";
 $username = "root";
 $password = "";

 // Connect to the database
 $conn = new PDO("mysql:host=$servername;dbname=pharmalogue", $username, $password);
// Function to fetch all categories from the database
function getCategories($conn)
{
    $query = "SELECT * FROM illness_categories";
    $stmt = $conn->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// Fetch all categories from the database
$categories = getCategories($conn)
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Medicine Catalogue</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../CustomerUI/catalogue_style.css">
    <!-- ICONS - FONTAWESOME KIT -->
    <script src="https://kit.fontawesome.com/f18d0a2b9b.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a7affe22b8.js" crossorigin="anonymous"></script>
    <!-- LEAGUE SPARTAN - EMBEDDED GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CHATBOT -->
    <link rel="stylesheet" href="../CustomerUI/chat_stylesheet.css" />
        <link href='https://fonts.googleapis.com/css?family=League Spartan' rel='stylesheet'>
        <script src="https://kit.fontawesome.com/a7affe22b8.js" crossorigin="anonymous"></script>
    <!-- JAVASCRIPT -->
        <!-- JQUERY FOR INSERTING AUTOMATED RESPONSES -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
</head>

<body>

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

    <!-- Navigation and other HTML content goes here -->
    <nav>
        <label class="logo">PHARMA</label>
        <label class="logo1"><i>LOGUE</i></label>
        <ul id="myDIV">
            <li>
                <a href="../HomePage/maps.php">
                    <i class="fa-solid fa-location-dot"></i>
                    BRANCHES </a>
            </li>
            <li id="visible">
                <a href="#">
                    <i class="fa-solid fa-message"></i>
                    Pharma-KONSULTA</a>
            </li>
        </ul>
    </nav>
    
    <div class="container categories_container">
        <div class="categories_left">
            <h1> Category </h1>
            <hr class="rounded">
  <ul>
    <?php foreach ($categories as $category) : ?>
      <li>
        <!-- Add the edit icon here -->
        <a href="#"><?php echo $category['category_name']; ?></a>
      </li>
    <?php endforeach; ?>
</ul>
</div>

        <div class="container">
            <div class="row">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";

                // Connect to the database
                $conn = new PDO("mysql:host=$servername;dbname=pharmalogue", $username, $password);

                // Check if the search query parameter is set
                if (isset($_GET['search'])) {
                    $searchTerm = $_GET['search'];
                    // Prepare the SQL query to fetch medicines matching the search term
                    $stmt = $conn->prepare("SELECT * FROM pharmacy_medicine WHERE drug_brand LIKE :searchTerm OR generic_name LIKE :searchTerm");
                    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
                } else {
                    // Prepare the SQL query to fetch all medicines
                    $stmt = $conn->query("SELECT * FROM pharmacy_medicine");
                }

                // Execute the query
                $stmt->execute();

                // Retrieve the medicines
                $medicines = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($medicines) > 0) {
                    foreach ($medicines as $medicine) {
                        // Display medicine information
                        echo '<div class="col-md-4">';
                        echo '<div class="medicine-card">';
                        echo '<img src="../ADMINUI/med_img/' . $medicine['drug_image'] . '" height="10" class="medicine-image">';
                        echo '<h3>' . $medicine['drug_brand'] . '</h3>';
                        echo '<h5>' . $medicine['generic_name'] . '</h5>';
                        echo '<h5>' . $medicine['drug_price'] . '</h5>';

                        // Create bullet points for side effects
                        echo '<h5 style="text-align: left; padding-left:5px; margin-top: 15px; color: #003f5c; font-size: 15px;">Side Effects:</h5>';
                        echo '<ul class="square-bullets">'; // Add the class "square-bullets"

                        // Split the side effects string into an array of individual side effects
                        $sideEffects = explode('>', $medicine['side_effects']);

                        // Loop through the side effects array and create a list item for each side effect
                        foreach ($sideEffects as $effect) {
                            $cleanEffect = trim($effect, ' '); // Remove any leading/trailing spaces
                            if (!empty($cleanEffect)) { // Check if the effect is not empty
                                echo '<li>' . $cleanEffect . '</li>';
                            }
                        }

                        echo '</ul>'; // End the unordered list

                        echo '<button class="btn btn-primary view-info-btn" data-id="' . $medicine['ID'] . '">Drug Information</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="col-md-12">';
                    echo '<p>No medicines found.</p>';
                    echo '</div>';
                }
                ?>
                
            </div>
        </div>

        <script>
            // JavaScript code for the "View Med Info" buttons and search functionality
            // Add click event listener to all the "View Med Info" buttons
            var viewInfoButtons = document.getElementsByClassName("view-info-btn");
            for (var i = 0; i < viewInfoButtons.length; i++) {
                viewInfoButtons[i].addEventListener("click", function (event) {
                    var medicineId = event.target.getAttribute("data-id"); // Get the medicine ID from the button's data-id attribute
                    // Call the redirectToMedicineInfo function to redirect to the medicine information page
                    redirectToMedicineInfo(medicineId);
                });
            }

            // Redirect to the medicine information page
            function redirectToMedicineInfo(medicineId) {
                // Construct the URL for the medicine information page
                var url = "Drug_Information.php?id=" + medicineId;
                // Redirect to the URL
                window.location.href = url;
            }
        </script>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <!-- SEARCH BAR -->
<div class="searchcon">
    <div class="searchicon">
        <i class="fa fa-search"></i>
    </div>
    <div class="searchmedicine">
        <form method="GET" action="">
            <input type="text" placeholder="search your medicine here" name="search" id="search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</div>

<script>
    // Add click event listener to the search icon
    var searchIcon = document.querySelector(".searchicon");
    searchIcon.addEventListener("click", function () {
        document.querySelector(".searchcon").classList.toggle('active');
    });
</script>

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
                      url: '../CustomerUI/message.php',
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