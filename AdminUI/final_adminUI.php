<?php

require_once '../AdminUI/connection.php';

$message = []; // Create an empty array to store messages


if (isset($_POST['add_product'])) {
    $generic_name = $_POST['generic_name'];
    $generic_pronun = $_POST['generic_pronun']; 
    $drug_brand = $_POST['drug_brand'];
    $brand_pronun = $_POST['brand_pronun'];
    $drug_category = $_POST['drug_category'];
    $drug_price = $_POST['drug_price'];
    $drug_description = $_POST['drug_description'];
    $drug_image = $_FILES['drug_image']['name'];
    $drug_image_tmp_name = $_FILES['drug_image']['tmp_name'];
    $drug_image_folder = '../ADMINUI/med_img/' . $drug_image;
    $direction_for_usage = $_POST['direction_for_usage'];
    $active_ingredients = $_POST['active_ingredients'];
    $in_active_ingredients = $_POST['in_active_ingredients'];
    $side_effects = $_POST['side_effects'];
    $storage_instructions = $_POST['storage_instructions'];
    $stocks = $_POST['stocks'];
    $branch = $_POST['branch'];

    if (empty($generic_name) || empty($generic_pronun) || empty($drug_brand) || empty($brand_pronun) || empty($drug_category) || empty($drug_description) || empty($drug_price) || empty($drug_image) || empty($direction_for_usage)
        || empty($active_ingredients) || empty($in_active_ingredients) || empty($side_effects) || empty($storage_instructions) || empty($stocks) || empty ($branch)) {
        
        $message[] = 'Please fill out all fields.';

    } else {
        
        $insert = "INSERT INTO pharmacy_medicine (generic_name, generic_pronun, drug_brand, brand_pronun, drug_category, drug_price, drug_description, drug_image, direction_for_usage, active_ingredients, in_active_ingredients, side_effects, storage_instructions, stocks, branch) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert);
        $stmt->execute([$generic_name, $generic_pronun, $drug_brand, $brand_pronun, $drug_category, $drug_price, $drug_description, $drug_image, $direction_for_usage, $active_ingredients,
            $in_active_ingredients, $side_effects, $storage_instructions, $stocks, $branch]);
        $upload = $stmt->rowCount();
        
        if ($upload) {
        
            move_uploaded_file($drug_image_tmp_name, $drug_image_folder);
            $message[] = 'New product added successfully.';
            header('Location: final_adminUI.php');
            exit();
        
        } else {
        
            $message[] = 'Could not add the product.';
        
        }
    }
}

if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];

    if (empty($category_name)) {
        
        $message[] = 'Please fill out all fields.';
    
    } else {
    
        $insert = "INSERT INTO illness_categories (category_name) VALUES (?)";
        $stmt = $conn->prepare($insert);
        $stmt->execute([$category_name]);
        $upload = $stmt->rowCount();
    
        if ($upload) {
    
            $message[] = 'New category added successfully';
            header('Location: final_adminUI.php');
            exit();
    
        } else {
    
            $message[] = "Couldn't add the category";
    
        }
    }
}

if (isset($_GET['edit'])) {
    
    $ID = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM pharmacy_medicine WHERE ID = ?");
    $stmt->execute([$ID]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    $generic_name = $product['generic_name'];
    $generic_pronun = $product['generic_pronun'];
    $drug_brand = $product['drug_brand'];
    $brand_pronun = $product['brand_pronun'];
    $drug_category = $product['drug_category'];
    $drug_description = $product['drug_description'];
    $drug_price = $product['drug_price'];
    $drug_image = $product['drug_image'];
    $direction_for_usage = $product['direction_for_usage'];
    $active_ingredients = $product['active_ingredients'];
    $in_active_ingredients = $product['in_active_ingredients'];
    $side_effects = $product['side_effects'];
    $storage_instructions = $product['storage_instructions'];
    $stocks = $product['stocks'];
    $branch = $product['branch'];
    $submit_button = '<input type="submit" class="btnText" name="update_product" value="Update Medicine">';

} else {
   
    $generic_name = '';
    $generic_pronun = '';
    $drug_brand = '';
    $brand_pronun = '';
    $drug_category = '';
    $drug_description = '';
    $drug_price = '';
    $drug_image = '';
    $direction_for_usage ='';
    $active_ingredients ='';
    $in_active_ingredients ='';
    $side_effects ='';
    $storage_instructions ='';
    $stocks ='';
    $branch ='';
    $submit_button= '<input type="submit" class="btnText" name="add_product" value="Add Medicine">';

}

if (isset($_GET['editCategory'])) {

    $category_id = $_GET['editCategory'];
    $stmt = $conn->prepare("SELECT * FROM illness_categories WHERE category_id = ?");
    $stmt->execute([$category_id]);
    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    $category_name = $category['category_name'];
    $submit_button = '<input type="submit" class="btnText" name="update_category" value="Update Category">';

} else {
  
    $category_name = '';
    $submit_button = '<input type="submit" class="btnText" name="add_category" value="Add Category">';

}

if (isset($_POST['update_product'])) {

    $product_id = $_POST['product_id'];
    $generic_name = $_POST['generic_name'];
    $generic_pronun = $_POST['generic_pronun'];
    $drug_brand = $_POST['drug_brand'];
    $brand_pronun = $_POST['brand_pronun'];
    $drug_category = $_POST['drug_category'];
    $drug_description = $_POST['drug_description'];
    $drug_price = $_POST['drug_price'];
    $drug_image = $_FILES['drug_image']['name'];
    $drug_image_tmp_name = $_FILES['drug_image']['tmp_name'];
    $drug_image_folder = '../ADMINUI/med_img/'.$drug_image;
    $direction_for_usage = $_POST['direction_for_usage'];
    $active_ingredients = $_POST['active_ingredients'];
    $in_active_ingredients = $_POST['in_active_ingredients'];
    $side_effects = $_POST['side_effects'];
    $storage_instructions = $_POST['storage_instructions'];
    $stocks = $_POST['stocks'];
    $branch = $_POST['branch'];

    $update = "UPDATE pharmacy_medicine SET generic_name=?, generic_pronun=?, drug_brand=?, brand_pronun=?, drug_category=?, drug_price=?, drug_description=?, drug_image=?, direction_for_usage=?,
    active_ingredients=?, in_active_ingredients=?, side_effects=?, storage_instructions=?, stocks=?, branch=? WHERE ID=?";

    $stmt = $conn->prepare($update);
    $stmt->execute([$generic_name, $generic_pronun, $drug_brand, $brand_pronun,$drug_category, $drug_price, $drug_description, $drug_image, $direction_for_usage, $active_ingredients, $in_active_ingredients, 
    $side_effects, $storage_instructions, $stocks, $branch, $product_id]);
    $upload = $stmt->rowCount();

    if ($upload) {

        if (!empty($drug_image)) {

            move_uploaded_file($drug_image_tmp_name, $drug_image_folder);

        }

        $message[] = 'Product updated successfully';
        header('Location: final_adminUI.php'); // Redirect after successful update
        exit();

    } else {

        $message[] = 'Could not update the product';

    }
}

if (isset($_POST['update_category'])) {

    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

    $update = "UPDATE illness_categories SET category_name=? WHERE category_id=?";
    $stmt = $conn->prepare($update);
    $stmt->execute([$category_name, $category_id]);
    $upload = $stmt->rowCount();

    if ($upload) {

        $message[] = 'Category updated successfully';
        header('Location: final_adminUI.php'); // Redirect after successful update
        exit();

    } else {

        $message[] = "Couldn't update category";

    }
}

if (isset($_GET['delete'])) {

    $ID = $_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM pharmacy_medicine WHERE ID = ?");
    $stmt->execute([$ID]);
    header('Location: final_adminUI.php'); // Redirect after successful delete
    exit();

}

if (isset($_GET['deleteCategory'])) {

    $category_id = $_GET['deleteCategory'];
    $stmt = $conn->prepare("DELETE FROM illness_categories WHERE category_id = ?");
    $stmt->execute([$category_id]);
    header('Location: final_adminUI.php'); // Redirect after successful delete
    exit();

}

// Function to fetch all categories from the database
function getCategories($conn) {
    $query = $conn->query("SELECT * FROM illness_categories");
    $row = $query->fetchAll(PDO::FETCH_ASSOC);
    return $row;
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
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Prepare the SQL query to fetch all medicines
    $stmt = $conn->query("SELECT * FROM pharmacy_medicine");
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>


<!--------------------------------------------------- SYSTEM --------------------------------------------------->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD Catalogue</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- STYLESHEETS -->
        <!-- CUSTOMER UI -->
        <link rel = "stylesheet" type = "text/css" href = "adminUI_stylesheet.css" />
    
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
        <li>
            <a href="../HomePage/login.php">
                <i class="fa-solid fa-sign-out-alt"></i>
                Log-out
            </a>
        </li>
    </ul>
</nav>



<!--------------------------------------------------- ADD MEDICINE POPUP --------------------------------------------------->

    <section>
        <div class="add-medicine-popup">
            <div class="add-medicine-popup-box">
            
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" class="form">

                    <?php if (isset($_GET['edit'])) { ?>
                                <input type="hidden" name="product_id" value="<?php echo $_GET['edit']; ?>">
                    <?php } ?>  

                    <!-- HEADER -->
                    <header>
                        <?php echo isset($_GET['edit']) ? 'Update Product' : 'Add Medicine'; ?>
                    </header>

                    <!-- START INPUT -->
                    <div class="input-box">
                        <label>Medicine Image</label>
                        <input type="file" accept="image/png, image/jpeg, image/jpg" name="drug_image" class="box" value="<?php echo $drug_image; ?>" required>
                        <h5> Required </h5>
                    </div>
                    
                    <!-- COLUMN 1 -->
                    <div class="column">
                        <div class="input-box">
                            <label>Generic Name</label>
                            <input type="text" placeholder="Enter the generic medicine name" name="generic_name" class="box" value="<?php echo $generic_name; ?>" required>
                        </div>

                        <div class="input-box">
                            <label>Generic Name Pronounciation</label>
                            <input type="text" placeholder="Enter the generic drug name pronounciation" name="generic_pronun" class="box" value="<?php echo $generic_pronun; ?>" required>
                        </div>
                    </div>

                    <!-- COLUMN 2 -->
                    <div class="column">
                        <div class="input-box">
                            <label>Drug Brand</label>
                            <input type="text" placeholder="Enter the drug brand" name="drug_brand" class="box" value="<?php echo $drug_brand; ?>" required>
                        </div>

                        <div class="input-box">
                            <label>Drug Brand Pronounciation</label>
                            <input type="text" placeholder="Enter the drug brand pronounciation" name="brand_pronun" class="box" value="<?php echo $brand_pronun; ?>" required>
                        </div>
                    </div>

                    <!-- COLUMN 3 -->
                    <div class="column">
                        <div class="input-box">
                            <label>Drug Category</label>
                            <input type="text" placeholder="Enter drug category" name="drug_category" class="box" value="<?php echo $drug_category; ?>" required>
                        </div>

                        <div class="input-box">
                            <label>Branch Availability</label>
                            <div class="select-box">
                                <select name="branch" required>
                                    <option hidden>Select branch availability</option>
                                    <option value="Pala-o" <?php if ($branch == "Pala-o") echo "selected"; ?>>Pala-o</option>
                                    <option value="Tambacan" <?php if ($branch == "Tambacan") echo "selected"; ?>>Tambacan</option>
                                    <option value="Tubod" <?php if ($branch == "Tubod") echo "selected"; ?>>Tubod</option>
                                    <option value="Suarez" <?php if ($branch == "Suarez") echo "selected"; ?>>Suarez</option>
                                    <option value="Buru-un" <?php if ($branch == "Buru-un") echo "selected"; ?>>Buru-un</option>
                                    <option value="Fuentes" <?php if ($branch == "Fuentes") echo "selected"; ?>>Fuentes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- COLUMN 4 -->
                    <div class="column">
                        <div class="input-box">
                            <label>Drug Description</label>
                            <textarea placeholder="Enter medicine description" name="drug_description" class="long-text" required><?php echo $drug_description; ?></textarea>
                        </div>

                        <div class="input-box">
                            <label>Directions for Use</label>
                            <textarea placeholder="Enter medicine intake directions" name="direction_for_usage" class="long-text" required><?php echo $direction_for_usage; ?></textarea>
                        </div>
                    </div>

                    <!-- COLUMN 5 -->
                    <div class="column">
                    <div class="input-box">
                        <label>Drug Price</label>
                            <input type="text" placeholder="Enter the medicine's product price" name="drug_price" class="box" value="<?php echo $drug_price; ?>" required>
                        </div>

                        <div class="input-box">
                            <label>Quantity</label>
                            <input type="number" placeholder="Enter stocks availability" name="stocks" class="box" value="<?php echo $stocks; ?>" required>
                        </div>
                    </div>

                    <!-- COLUMN 6 -->
                    <div class="column">
                        <div class="input-box">
                            <label>Side Effects</label>
                            <textarea placeholder="Enter the drug's side effects" name="side_effects" class="long-text" required><?php echo $side_effects; ?></textarea>
                        </div>

                        <div class="input-box">
                            <label>Storage Instructions</label>
                            <textarea placeholder="Enter the medicine's storage instructions" name="storage_instructions" class="long-text" required><?php echo $storage_instructions; ?></textarea>
                        </div>
                    </div>

                    <!-- COLUMN 7 -->
                    <div class="column">
                        <div class="input-box">
                            <label>Active Ingredients</label>
                            <textarea placeholder="Enter the medicine's active ingredients" name="active_ingredients" class="long-text" required><?php echo $active_ingredients; ?></textarea>
                        </div>

                        <div class="input-box">
                            <label>Inactive Ingredients</label>
                            <textarea placeholder="Enter the medicine's inactive ingredients" name="in_active_ingredients" class="long-text" required><?php echo $in_active_ingredients; ?></textarea>
                        </div>
                    </div>

                    <!-- BUTTONS -->
                    <div class="buttons">

                        <button class="close-add-medicine">
                            <span class="btnText">Close</span>
                        </button>
                        
                        <input type="submit" class="btnText" name="<?php echo isset($_GET['edit']) ? 'update_product' : 'add_product'; ?>" value="<?php echo isset($_GET['edit']) ? 'Update Medicine' : 'Add Medicine'; ?>">

                    </div>

                </form>
            </div>
        </div>
    </section>

    <div class="add-category-popup">
        <div class="add-category-popup-box">

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" class="form">

                <?php if (isset($_GET['editCategory'])) { ?>
                    <input type="hidden" name="category_id" value="<?php echo $_GET['editCategory']; ?>">
                <?php } ?>  

                <!-- HEADER -->
                <header>
                    <?php echo isset($_GET['editCategory']) ? 'Update Category' : 'Add Category'; ?>
                </header>
                           
                    <!-- INPUT START -->
                    <div class="input-box">
                        <input type="text" placeholder="Enter the category name" name="category_name" class="box" value="<?php echo $category_name; ?>" required>
                    </div>

                    <div class="buttons">

                        <button class="close-category-popup">
                            <span class="btnText">Close</span>
                        </button>

                        <input type="submit" class="btnText" name="<?php echo isset($_GET['editCategory']) ? 'update_category' : 'add_category'; ?>" value="<?php echo isset($_GET['editCategory']) ? 'Update Category' : 'Add Category'; ?>">

                    </div>

            </form>

        </div>
    </div>

<!--------------------------------------------------- CATEGORY + TABLE --------------------------------------------------->
    <div class="container categories_container">

        <!------------------------------------ CATEGORIES ------------------------------------>
        
        <div class="categories_left">

            <h1> Category </h1>
            <hr class = "rounded">

            <?php
                $query = $conn->query("SELECT * FROM illness_categories");
                $row = $query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($row as $row) {
            ?>
                <div class="category-item">
                        
                    <li>
                        <!-- CATEGORY NAMES -->
                        <a><?php echo $row['category_name'] ?></a>

                        <!-- ICONS -->
                        <div class="category-crud-icons">
                                
                            <a href="final_adminUI.php?editCategory=<?php echo $row['category_id']; ?>">
                                <button class="open-update-category">
                                    <i class="fa-solid fa-square-pen"></i>
                                </button>
                            </a>

                            
                            <a href="final_adminUI.php?deleteCategory=<?php echo $row['category_id']; ?>">
                                <button class="btn-delete-category">
                                <i class="fa-solid fa-square-minus"></i>
                                </button>
                            </a>

                        </div>

                    </li>
                </div>
            <?php } ?>
        </div>
        
        <!------------------------------------ TABLE ------------------------------------>

        <div class="medicines_right">
            
            <div class="container add_delete_container">
                <div class="add_delete_right">
                    <div class = "CRUD_container">

                        <div class = "CRUD_box">
                            <button href = "add" class="show-add-medicine"> Add Medicine </button>
                        </div>

                        <div class = "CRUD_box">
                            <button href = "add" class="show-add-category"> Add Category </button>
                        </div>

                    </div>
                </div>   
            </div>

            <div class="product-display">
                <table class="product-display-table">
                    <thead>

                        <!-- TABLE COLUMN NAMES -->
                        <tr>
                            <th>Action</th>
                            <th>Product Image</th>
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
                            <th>Stocks</th>
                            <th>Branch</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($results as $result) { ?>
                            <tr>
                            <td>
                                <a href="final_adminUI.php?edit=<?php echo $result['ID']; ?>">
                                <button class="btn-for-action-edit" id="update">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </a>
                            <a href="final_adminUI.php?delete=<?php echo $result['ID']; ?>">
                            <button class="btn-for-action-delete">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </a>
                    </td>
                    <td><img src="../ADMINUI/med_img/<?php echo $result['drug_image']; ?>" height="100" alt=""></td>
                    <td><?php echo $result['generic_name']; ?></td>
                    <td><?php echo $result['generic_pronun']; ?></td>
                    <td><?php echo $result['drug_brand']; ?></td>
                    <td><?php echo $result['brand_pronun']; ?></td>
                    <td><?php echo $result['drug_category']; ?></td>
                    <td><?php echo $result['drug_price']; ?></td>
                    <td><?php echo $result['drug_description']; ?></td>
                    <td><?php echo $result['direction_for_usage']; ?></td>
                    <td><?php echo $result['active_ingredients']; ?></td>
                    <td><?php echo $result['in_active_ingredients']; ?></td>
                    <td><?php echo $result['side_effects']; ?></td>
                    <td><?php echo $result['storage_instructions']; ?></td>
                    <td><?php echo $result['stocks']; ?></td>
                    <td><?php echo $result['branch']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
                    <?php 
                    $query = $conn->query("SELECT * FROM pharmacy_medicine");
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>

                            <td>
                                <a href="final_adminUI.php?edit=<?php echo $row['ID']; ?>">
                                    <button class="btn-for-action-edit" id="update">
                                        <i class="fas fa-edit"></i> Edit
                                    </button>
                                </a>

                                <a href="final_adminUI.php?delete=<?php echo $row['ID']; ?>">
                                    <button  class="btn-for-action-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </a>
                            </td>

                            <td><img src="../ADMINUI/med_img/<?php echo $row['drug_image']; ?>" height="100" alt=""></td>
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
                            <td><?php echo $row['stocks']; ?></td>
                            <td><?php echo $row['branch']; ?></td>

                        </tr>    
                    <?php } ?>
                </table>
            </div>
        </div>

    </div>

    <script>

        const section = document.querySelector(".add-medicine-popup"),

            showBtn = document.querySelector(".show-add-medicine"),
            closeBtn= document.querySelector(".close-add-medicine"),
            updateBtn = document.querySelector(".btn-for-action-edit");

        showBtn.addEventListener("click", ()=>section.classList.add("active"));

        closeBtn.addEventListener("click", ()=> {
            section.classList.remove("active");
            location.href = "final_adminUI.php";
        });

        <?php
            $query = $conn->query("SELECT * FROM pharmacy_medicine");
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $row) {
        ?>

            updateBtn.addEventListener("click", ()=> {
                location.href = "final_adminUI.php?edit=<?php echo $row['ID']; ?>";
            });
            
        <?php } ?>

        $(document).ready(function() {
            if (window.location.href.indexOf("php?edit=") > -1) {
                section.classList.add("active");
            }
        });

    </script>

    <script>
        const categorySection = document.querySelector(".add-category-popup"),

            showCategory = document.querySelector(".show-add-category"),
            closeCategory = document.querySelector(".close-category-popup"),
            updateCategory = document.querySelector(".open-update-category");
                    
        showCategory.addEventListener("click", ()=>categorySection.classList.add("visible"));
        
        closeCategory.addEventListener("click", ()=> {
            categorySection.classList.remove("visible"),
            location.href = "final_adminUI.php";
        });

        <?php 
            $query = $conn->query("SELECT * FROM illness_categories");
            $row = $query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($row as $row) {
        ?>

            updateCategory.addEventListener("click", ()=> {
                location.href = "final_adminUI.php?editCategory=<?php echo $row['category_id']; ?>";
            });
                

            if (window.location.href.indexOf("php?editCategory=") > -1 && categorySection.classList == "add-category-popup") {
                categorySection.classList.add("visible");
            }

        <?php } ?>

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