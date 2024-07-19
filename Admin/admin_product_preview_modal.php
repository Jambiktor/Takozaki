<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>

<body>

    <div class="modal fade" id="editproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        <div class="mb-1">
                            <!-- MARKING PRODUCT AS AVAILABLE OR NOT -->
                            <form action="delete-product.php" method="POST"
                                onsubmit="return confirm('Are you sure you want to remove this product?');">
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <button class="w-100 btn btn-outline-success rounded p-1 px-2" type="submit"
                                    name="remove">Mark
                                    product
                                    as
                                    available/not available</button>
                            </form>
                        </div>
                        <div>
                            <!-- REMOVING PRODUCT -->
                            <form action="delete-product.php" method="POST"
                                onsubmit="return confirm('Are you sure you want to remove this product?');">
                                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                                <button class="w-100 btn btn-outline-danger rounded p-1 px-2" type="submit"
                                    name="remove">Remove
                                    product</button>
                            </form>
                        </div>
                    </div>


                    <!-- ADDING PRODUCT-->
                    <div class="add-product ">
                        <form action="admin_edit_product_details.php" method="POST" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="input-group mb-1">
                                <h5 class="m-0 mb-1">Product Name</h5>
                                <input type="hidden" name="product_id" id="product_id"
                                    value="<?php echo $product['product_id']; ?>">
                                <input class="form-control w-100 p-2" type="text" name="product_name" id="product_name"
                                    placeholder="<?php echo $product['name']; ?>"
                                    value="<?php echo $product['name']; ?>">
                            </div>
                            <div class="input-group  mt-2 mb-1">
                                <h5 class="m-0 mb-1">Base Price</h5>
                                <input class="form-control w-100 p-2" type="number" name="price" id="price"
                                    placeholder="<?php echo $product['price']; ?>"
                                    value="<?php echo $product['price']; ?>">
                            </div>

                            <div class="mt-2 mb-1">
                                <h5>Product Thumbnail</h5>
                                <img src="../product-images/<?php echo $product['image_file'] ?>"
                                    class="d-block w-100 rounded" alt="...">
                                <div class="mt-3 mb-1">
                                    <h5>Change Product Thumbnail</h5>
                                    <div class="input-group mb-1">
                                        <input type="file" class="form-control" id="image_file" name="image_file"
                                            value="<?php echo $product['image_file']; ?>">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="editproduct" class="btn btn-danger">Edit
                        Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>


</html>