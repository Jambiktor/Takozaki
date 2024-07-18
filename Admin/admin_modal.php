<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- managing promo  -->
    <div class="modal fade" id="promo_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Promo</h1>
                    <button class="btn btn-outline-secondary ms-2">Add Promo</button>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex flex-wrap gap-2">
                    <div class="card position-relative" style="width: 14rem;">
                        <div class="w-100 position-absolute">
                            <div class=" p-2 d-flex justify-content-end gap-1">
                                <button class="btn btn-light p-0 px-2">
                                    <p class="m-0">Edit details</p>
                                </button>
                                <button class=" btn btn-danger p-0 px-2 shadow-md" style="">
                                    <p class="m-0 mb-1">x</p>
                                </button>
                            </div>
                        </div>
                        <img src="..\images\promo1.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex justify-content-center p-0 pt-1">
                            <h5 class="card-title">Promo Title</h5>
                        </div>
                    </div>
                    <div class="card position-relative" style="width: 14rem;">
                        <div class="w-100 position-absolute">
                            <div class=" p-2 d-flex justify-content-end gap-1">
                                <button class="btn btn-light p-0 px-2">
                                    <p class="m-0">Edit details</p>
                                </button>
                                <button class=" btn btn-danger p-0 px-2 shadow-md" style="">
                                    <p class="m-0 mb-1">x</p>
                                </button>
                            </div>
                        </div>
                        <img src="..\images\promo1.png" class="card-img-top" alt="...">
                        <div class="card-body d-flex justify-content-center p-0 pt-1">
                            <h5 class="card-title">Promo Title</h5>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-danger">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- adding product  -->
    <div class="modal fade" id="add_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="add_product.php" method="POST" autocomplete="off" enctype="multipart/form-data">

                    <div class="modal-body">
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" placeholder="Product Name" name="product_name"
                                id="product_name" required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" placeholder="Product Price" type="number"
                                name="price" id="price" required>
                        </div>
                        <!-- variation -->
                        <!-- Variation  -->
                        <div class="w-100 border border-2 rounded p-3 mb-1">
                            <h5>Variation(eg. Flavors)</h5>

                            <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded"
                                style="background-color: ;">
                                <button
                                    class="btn btn-danger w-100 border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                    style="background-color:;" type="button" data-bs-toggle="offcanvas"
                                    aria-controls="offcanvasScrolling" data-bs-target="#add_variant_option">
                                    Add Variant
                                </button>
                            </div>
                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="add_variant_option" aria-labelledby="offcanvasScrollingLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add
                                        variants
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">

                                    <input type="hidden" name="variant_id" id="variant_id"
                                        value="<?php echo $variant_id ?>">
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Variant 1</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="variant1"
                                            id="variant1" placeholder="Variant Name" aria-describedby="basic-addon1">
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="image_file1" name="image_file1"
                                                accept=".jpeg, .jpeg, .png"
                                                value="<?php echo $product['image_file']; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Variant 2</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="variant2"
                                            id="variant2" placeholder="Variant Name" aria-describedby="basic-addon1">
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="image_file2" name="image_file2"
                                                accept=".jpeg, .jpeg, .png"
                                                value="<?php echo $product['image_file']; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Variant 3</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="variant3"
                                            id="variant3" placeholder="Variant Name" aria-describedby="basic-addon1">
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="image_file3" name="image_file3"
                                                accept=".jpeg, .jpeg, .png"
                                                value="<?php echo $product['image_file']; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Variant 4</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="variant4"
                                            id="variant4" placeholder="Variant Name" aria-describedby="basic-addon1">
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="image_file4" name="image_file4"
                                                accept=".jpeg, .jpeg, .png"
                                                value="<?php echo $product['image_file']; ?>">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- Option -->
                        <div class="w-100 border border-2 rounded p-3 mb-1">
                            <h5>Option(eg. Sizes)</h5>

                            <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded"
                                style="background-color: ;">
                                <button
                                    class="btn btn-danger w-100 border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                    style="background-color:;" type="button" data-bs-toggle="offcanvas"
                                    aria-controls="offcanvasScrolling" data-bs-target="#add_option">
                                    Add Option
                                </button>
                            </div>
                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="add_option" aria-labelledby="offcanvasScrollingLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Option
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Option 1</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="option1"
                                            id="option1" placeholder="Option Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="option_price1" id="option_price1" placeholder="Option Price"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Option 2</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="option2"
                                            id="option2" placeholder="Option Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="option_price2" id="option_price2" placeholder="Option Price"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Option 3</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="option3"
                                            id="option3" placeholder="Option Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="option_price3" id="option_price3" placeholder="Option Price"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Option 4</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="option4"
                                            id="option4" placeholder="Option Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="option_price4" id="option_price4" placeholder="Option Price"
                                            aria-describedby="basic-addon1">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!-- Add-on  -->
                        <div class="w-100 border border-2 rounded p-3">
                            <h5>Add-on(eg. Sinkers)</h5>

                            <div class="p-0 m-0 d-flex align-items-center justify-content-center rounded"
                                style="background-color: ;">
                                <button
                                    class="btn btn-danger w-100 border-0 m-0 py-1 px-2 d-flex align-items-center justify-content-center rounded"
                                    style="background-color:;" type="button" data-bs-toggle="offcanvas"
                                    aria-controls="offcanvasScrolling" data-bs-target="#add_add-on">
                                    Add Add-on
                                </button>
                            </div>
                            <div class="offcanvas offcanvas-end" data-bs-scroll="true" data-bs-backdrop="false"
                                tabindex="-1" id="add_add-on" aria-labelledby="offcanvasScrollingLabel">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Add Add-on
                                    </h5>
                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">


                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Add-on 1</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="Add-on1"
                                            id="Add-on1" placeholder="Add-on Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="Add-on-price1" id="Add-on-price1" placeholder="Add-on Price"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Add-on 2</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="Add-on2"
                                            id="Add-on2" placeholder="Add-on Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="Add-on-price2" id="Add-on-price2" placeholder="Add-on Price"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Add-on 3</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="Add-on3"
                                            id="Add-on3" placeholder="Add-on Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="Add-on-price3" id="Add-on-price3" placeholder="Add-on Price"
                                            aria-describedby="basic-addon1">
                                    </div>
                                    <div class="w-100 border border-2 rounded input-group mb-3 p-2 d-flex flex-column">
                                        <h5>Add-on 4</h5>
                                        <input type="text" class="w-100 form-control rounded my-1" name="Add-on4"
                                            id="Add-on4" placeholder="Add-on Name" aria-describedby="basic-addon1">
                                        <input type="number" class="w-100 form-control rounded my-1"
                                            name="Add-on-price4" id="Add-on-price4" placeholder="Add-on Price"
                                            aria-describedby="basic-addon1">
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="w-100 mt-2 mb-1">
                            <h5>Product Image</h5>

                            <div class="mt-3 mb-1">
                                <h5>Choose Product Thumbnail</h5>
                                <div class="input-group mb-1">
                                    <input type="file" class="form-control" id="image_file" name="image_file"
                                        accept=".jpeg, .jpeg, .png" value="<?php echo $product['image_file']; ?>">
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-outline-danger">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>