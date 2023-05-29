<?php 
include('header.php');
// check if category null or not set in url 
if(isset($_GET['category'])){
    $category = $_GET['category'];
    //select all products from db
    $sql = "SELECT * FROM products WHERE category = '$category' ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Database query failed: " . mysqli_error($conn));
    }
}else{
    //select all products from db
        $sql = "SELECT * FROM products ORDER BY id DESC";
}


$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}



?>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shop List</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                <div class="bg-light p-4 mb-30">
                    <form method="post">
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" name="price[]" checked id="price-all">
                            <label class="custom-control-label" for="price-all">All Price</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" name="price[]" id="price-1">
                            <label class="custom-control-label" for="price-1">$0 - $100</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" name="price[]" id="price-2">
                            <label class="custom-control-label" for="price-2">$100 - $200</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" name="price[]" id="price-3">
                            <label class="custom-control-label" for="price-3">$200 - $300</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-3">
                            <input type="checkbox" class="custom-control-input" name="price[]" id="price-4">
                            <label class="custom-control-label" for="price-4">$300 - $400</label>
                        </div>
                        <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-control-input" name="price[]" id="price-5">
                            <label class="custom-control-label" for="price-5">$400 - $500</label>
                        </div>
                        <input type="submit" class="btn btn-block btn-primary mt-4" name="filter" value="Filter">
                    </form>
                </div>

                <script>
                    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
                    
                    checkboxes.forEach(checkbox => {
                        checkbox.addEventListener('change', function() {
                            checkboxes.forEach(otherCheckbox => {
                                if (otherCheckbox !== this) {
                                    otherCheckbox.checked = false;
                                }
                            });
                        });
                    });
                </script>

                <?php
                if(isset($_POST['filter'])) {
                    if(isset($_POST['price'])) {
                        $selectedCheckboxes = $_POST['price'];
                        echo "Selected Checkbox(es): ";
                        $checkboxLabels = array(
                            'price-all' => 'All Price',
                            'price-1' => '$0 - $100',
                            'price-2' => '$100 - $200',
                            'price-3' => '$200 - $300',
                            'price-4' => '$300 - $400',
                            'price-5' => '$400 - $500'
                        );
                        foreach ($selectedCheckboxes as $checkbox) {
                            if(isset($checkboxLabels[$checkbox])) {
                                echo $checkboxLabels[$checkbox] . " ";
                            } else {
                                echo "Unknown ";
                            }
                        }
                    } else {
                        echo "No checkbox selected.";
                    }
                }
                ?>

                <!-- Price End -->
                
                

                
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            
                        </div>
                    </div>
                    
                    <!--  -->
                    <?php
                    // loop $row
                    while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                        <div class="product-item bg-light mb-4">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="./admin/assets/images/products/<?php echo $row['image']; ?>" alt="">
                                <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href="add_to_cart.php?id=<?php echo $row['id']; ?>"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="./detail.php?id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5><?php echo $row['price'].' LKR'; ?></h5><h6 class="text-muted ml-2"><del><?php echo $row['price']+5000; echo ' LKR'; ?></del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    

                    ?>
                    


                    <!--  -->
                    
                    <div class="col-12">
                        <nav>
                          <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#">Previous</span></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->


    <?php include 'footer.php'; ?>