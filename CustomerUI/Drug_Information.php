<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmalogue";

// Get the medicine ID from the query parameters
$medicineId = $_GET['id'];

// Create a new PDO instance
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Function to fetch all categories from the database
function getCategories($conn)
{
    $query = "SELECT * FROM illness_categories";
    $stmt = $conn->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fetch all categories from the database
$categories = getCategories($conn);

// Check if the search query parameter is set
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
    // Prepare the SQL query to fetch medicines matching the search term
    $stmt = $conn->prepare("SELECT * FROM pharmacy_medicine WHERE drug_brand LIKE :searchTerm OR generic_name LIKE :searchTerm");
    $stmt->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
    $stmt->execute();

    // Fetch the medicine information
    $medicineInfo = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Prepare the SQL query to fetch the specific medicine information
    $stmt = $conn->prepare("SELECT * FROM pharmacy_medicine WHERE ID = :id");
    $stmt->bindParam(':id', $medicineId);
    $stmt->execute();

    // Fetch the medicine information
    $medicineInfo = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pharmalogue</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- STYLESHEETS -->
    <!-- CUSTOMER UI -->
    <link rel="stylesheet" type="text/css" href="../CustomerUI/Drug_InformationStyle.css" />

    <!-- CHATBOT -->
    <link rel="stylesheet" href="chat_stylesheet.css" />

    <!-- ICONS - FONTAWESOME KIT -->
    <script src="https://kit.fontawesome.com/f18d0a2b9b.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a7affe22b8.js" crossorigin="anonymous"></script>

    <!-- LEAGUE SPARTAN - EMBEDDED GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- JAVASCRIPT -->
    <!-- JQUERY FOR INSERTING AUTOMATED RESPONSES -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- CHAT OPEN -->
    <!-- <script src="chat.js"></script> -->

</head>

<body>
    <nav>
        <label class="logo">PHARMA</label>
        <label class="logo1"><i>LOGUE</i></label>
        <ul id="myDIV">
            <li>
                <a href="../HomePage/maps.php">
                    <i class="fa-solid fa-location-dot"></i>
                    BRANCHES </a>
            </li>
            </li>
            <li onclick="chatOpen()">
                <a href="#">
                    <i class="fa-solid fa-message"></i>
                    Pharma-KONSULTA</a>
            </li>
        </ul>
    </nav>
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
                ?>
    <!------------------------------ CATALOGUE ------------------------------>
    <!-- <section class = "categories"> -->
    <div class="container categories_container">


        <!------------------------------ CATEGORIES ------------------------------>

        <div class="categories_left">
            <h1> Category </h1>
            <hr class="rounded">

            <!-- Display fetched categories -->
            <?php foreach ($categories as $category) : ?>
                <li>
                    <a href="#"><?php echo $category['category_name']; ?></a>
                </li>
            <?php endforeach; ?>
        </div>

        <!------------------------------ MEDICINES ------------------------------>

        <div class="medicines_right">
            <a href="../HomePage/index.php" class="additional">HOME</a>
            <h1 class="additional1"> | </h1>
            <a href="customer_catalogue.php" class="additional2">CATALOGUE</a>
            <div class="medicines_container">
                <div class="box">
                    <div class="box-img" style="position:relative; left: 25px; top:1.5px; width: 85%; height:100%">
                        <img src="../ADMINUI/med_img/<?php echo $medicineInfo['drug_image']; ?>">
                    </div>
                    <label class="medname"><?php echo $medicineInfo['drug_brand']; ?></label>
                    <label class="medpronun"><?php echo $medicineInfo['brand_pronun']; ?></label>
                    <label class="medpricelb">PRICE: </label>
                    <label class="medprice"> <?php echo $medicineInfo['drug_price']; ?></label>
                    <label class="medsidelb"> SIDE EFFECTS </label>
                    <hr class="rounded"; style="position:absolute; left: 204px; top:500px">
                    <div class="medside_container">
                        <div class="card2"; style="position:absolute; left: 75px; top:-140px; text-align:left">
                            <ul class="circle-bullet-list">
                                <?php
                                $effects = explode('>', $medicineInfo['side_effects']);
                                foreach ($effects as $effect) {
                                    $cleanEffect = trim($effect, ' '); // Remove any leading/trailing spaces
                                    if (!empty($cleanEffect)) { // Check if the direction is not empty
                                        echo "<li>$effect</li>";
                                    }
                                }
                                ?>
                        </div>
                    </div>
                    <label class="medstorelb">STORAGE INSTRUCTION</label>
                    <div class="medstore_container">
                        <div class="card2"; style="position:absolute; left: 75px; top:0px">
                            <p><?php echo $medicineInfo['storage_instructions']; ?></p>
                        </div>
                    </div>
                    <label class="branches"><i>Available In</i></label>
                    <label class="branchPAL">YSCOBEL PALA-O BRANCH: </label>
                    <label class="stockPAL"> ### </label>
                    <label class="branchSUA">YSCOBEL SUAREZ BRANCH: </label>
                    <label class="stockSUA"> ### </label>
                    <label class="branchTAM">YSCOBEL TAMBACAN BRANCH: </label>
                    <label class="stockTAM"> ### </label>
                    <label class="branchTUB">YSCOBEL TUBOD BRANCH: </label>
                    <label class="stockTUB"> ### </label>
                    <label class="branchBUR">YSCOBEL BURU-UN BRANCH: </label>
                    <label class="stockBUR"> ### </label>
                    <label class="branchFUE">YSCOBEL FUENTES BRANCH: </label>
                    <label class="stockFUE"> ### </label>

                    <label class="genname"><?php echo $medicineInfo['generic_name']; ?></label>
                    <label class="genpronun"><?php echo $medicineInfo['generic_pronun']; ?></label>
                    <label class="drugcategory"><?php echo $medicineInfo['drug_category']; ?></label>
                    <label class="meduse"> MEDICINE DESCRIPTION </label>
                    <hr class="rounded2" style="position:absolute; left: 485px; top:140px;">
                    <div class="info_container">
                        <div class="card" style="position:absolute; left: 505px; top:10px; text-align: justify;">
                            <label style="text-align: justify;"><?php echo $medicineInfo['drug_description']; ?></label>
                        </div>
                    </div>

                    <label class="medusage"> DIRECTION FOR USAGE </label>
                    <div class="direction_container">
                        <div class="card" style="position:absolute; left: 505px; top:100px">
                            <ul class="circle-bullet-list">
                                <?php
                                $directions = explode('>', $medicineInfo['direction_for_usage']);
                                foreach ($directions as $direction) {
                                    $cleanDirection = trim($direction, ' '); // Remove any leading/trailing spaces
                                    if (!empty($cleanDirection)) { // Check if the direction is not empty
                                        echo "<li>$direction</li>";
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </div>


                    <label class="activeing"> ACTIVE INGREDIENTS: </label>
                    <div class="active_container">
                        <div class="card2"; style="position:absolute; left: 457px; top:10px">
                            <label><?php echo $medicineInfo['active_ingredients']; ?></label>
                        </div>
                    </div>
                    <label class="inactiveing"> INACTIVE INGREDIENTS: </label>
                    <div class="inactive_container">
                        <div class="card2"; style="position:absolute; left: 457px; top:10px">
                            <label><?php echo $medicineInfo['in_active_ingredients']; ?></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
</body>

</html>