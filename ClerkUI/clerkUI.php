<?php
require_once 'connection.php';

$message = [];

// Function to fetch all categories from the database
function getQuantity($conn) {
    $query = $conn->query("SELECT * FROM pharmacy_medicine");
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
}

if (isset($_GET['editQuantity'])) {
    $ID = $_GET['editQuantity'];
    $stmt = $conn->prepare("SELECT * FROM pharmacy_medicine WHERE ID = ?");
    $stmt->execute([$ID]);
    $medicine = $stmt->fetch(PDO::FETCH_ASSOC);
    $stocks = $medicine['stocks'];
    $submit_button = '<input type="submit" class="btnText" name="update_quantity" value="Update Quantity">';
} else {
    $stocks = '';
    $submit_button = '<input type="submit" class="btnText" name="add_quantity" value="Add Quantity">';
}

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

// Fetch all categories from the database
$categories = getQuantity($conn);

if (isset($_POST['update_quantity'])) {
    $ID = $_POST['ID'];
    $stocks = $_POST['stocks'];

    $update = "UPDATE pharmacy_medicine SET stocks=? WHERE ID=?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$stocks, $ID]);
    $upload = $stmt->rowCount();

    if ($upload) {
        $message[] = 'Medicine updated successfully';
        header('Location: ..//ClerkUI/clerkUI.php'); // Redirect after successful update
        exit();
    } else {
        $message[] = "Couldn't update quantity";
    }
}

?>

<!--------------------------------------------------- SYSTEM --------------------------------------------------->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Stock Availability</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- STYLESHEETS -->
        <!-- CUSTOMER UI -->
        <link rel = "stylesheet" type = "text/css" href = "../ClerkUI/clerkUI_stylesheet.css" />
    
    <!-- ICONS - FONTAWESOME KIT -->
    <script src="https://kit.fontawesome.com/f18d0a2b9b.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a7affe22b8.js" crossorigin="anonymous"></script>

    <!-- LEAGUE SPARTAN - EMBEDDED GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap">
    <!-- JAVASCRIPT -->
        <!-- JQUERY FOR INSERTING AUTOMATED RESPONSES -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
</head>

<body>

<!--------------------------------------------------- NAVIGATION BAR & MENU --------------------------------------------------->
<nav>
    <label class="logo">PHARMA</label>
    <label class="logo1"><i>LOGUE</i></label>
    <ul id="myDIV">
        <li>
            <a href="../HomePage/maps.php">
                <i class="fa-solid fa-location-dot"></i>
                BRANCHES
            </a>
        </li>
        <li onclick="chatOpen()">
            <a href="#">
                <i class="fa-solid fa-message"></i>
                Pharma-KONSULTA
            </a>
        </li>
        <li>
            <a href="../HomePage/login.php">
                <i class="fa-solid fa-sign-out-alt"></i>
                Log-out
            </a>
        </li>
    </ul>
</nav>

<!--------------------------------------------------- medicine + TABLE --------------------------------------------------->
    <div class="container categories_container">
        
        <!------------------------------------ TABLE ------------------------------------>

        <div class="medicines_right">
            
            <div class="product-display">
            <table class="product-display-table">
    <thead>
        <tr>
            <th>Action</th>
            <th>Stocks</th>
            <th>Generic Name</th>
            <th>Generic Pronunciation</th>
            <th>Drug Brand</th>
            <th>Brand Pronunciation</th>
            <th>Drug Category</th>
            <th>Drug Price</th>
            <th>Drug Description</th>
            <th>Direction for Usage</th>
            <th>Active Ingredients</th>
            <th>In-active Ingredients</th>
            <th>Side Effects</th>
            <th>Storage Instructions</th>
            <th>Branch</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td>
                    <a href="clerkUI.php?editQuantity=<?php echo $row['ID']; ?>">
                        <button class="show-edit-quantity">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </a>
                </td>
                <td><?php echo $row['stocks']; ?></td>
                <td><?php echo $row['generic_name']; ?></td>
                <td><?php echo $row['generic_pronun']; ?></td>
                <td><?php echo $row['drug_brand']; ?></td>
                <td><?php echo $row['brand_pronun']; ?></td>
                <td><?php echo $row['drug_category']; ?></td>
                <td><?php echo $row['drug_price']; ?></td>
                <td><?php echo $row['drug_description']; ?></td>
                <td><?php echo $row['direction_for_usage']; ?></td>
                <td><?php echo $row['active_ingredients']; ?></td>
                <td><?php echo $row['in_active_ingredients']; ?></td>
                <td><?php echo $row['side_effects']; ?></td>
                <td><?php echo $row['storage_instructions']; ?></td>
                <td><?php echo $row['branch']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

            </div>
        </div>

    </div>

    <!-- EDIT QUANTITY POPUP -->
    <div class="add-medicine-popup">
    <div class="add-medicine-popup-box">
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="form">
            <?php if (isset($_GET['editQuantity'])) { ?>
                <input type="hidden" name="ID" value="<?php echo $_GET['editQuantity']; ?>">
            <?php } ?>
            <header>Update Quantity</header>
            <div class="input-box">
                <input type="text" placeholder="Enter medicine quantity" name="stocks" class="box" value="<?php echo $stocks; ?>" required>
            </div>
            <div class="buttons">
                <button class="close-quantity-popup">
                    <span class="btnText">Close</span>
                </button>
                <?php echo $submit_button; ?>
            </div>
        </form>
    </div>
</div>
<script>
    const quantitySection = document.querySelector(".add-medicine-popup");
    const updateQuantity = document.querySelectorAll(".show-edit-quantity");
    const closeQuantity = document.querySelector(".close-quantity-popup");

    closeQuantity.addEventListener("click", () => {
        quantitySection.classList.remove("visible");
    });

    updateQuantity.forEach((button) => {
        button.addEventListener("click", () => {
            quantitySection.classList.add("visible");
        });
    });

    $(document).ready(function() {
        if (window.location.href.indexOf("editQuantity") > -1) {
            quantitySection.classList.add("visible");
        }
    });
</script>

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
    <html>