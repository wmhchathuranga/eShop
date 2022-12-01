<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Update Product | eShop</title>

    <link rel="stylesheet" href="./resource/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="./resource/css/addProductstyle.css">

    <link rel="icon" href="/resource/logo.svg" />

</head>

<body>

    <div class="container-fluid">
        <?php include "header.php" ?>

        <div class="row gy-3">
            <div class="col-12">
                <div class="row">

                    <div class="col-12 text-center">
                        <h2 class="h2 text-primary fw-bold">Update My Product</h2>
                    </div>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold " style="font-size: 20px ;" for="">Select Product Category</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select text-center " disabled>
                                            <option>Select Category</option>
                                            <option>Mobile Phones</option>
                                            <option>Laptops</option>
                                            <option>Camera</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold " style="font-size: 20px ;" for="">Select Product Brand</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select text-center " disabled>
                                            <option>Select Brand</option>
                                            <option>Apple</option>
                                            <option>Samsung</option>
                                            <option>HTC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-lg-4">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold " style="font-size: 20px ;" for="">Select Product Model</label>
                                    </div>
                                    <div class="col-12">
                                        <select class="form-select text-center " disabled>
                                            <option>Select Model</option>
                                            <option>iPhone 12</option>
                                            <option>Note 20</option>
                                            <option>Galaxy J7</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-width: 3px;" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">
                                            Add a Title to your Product
                                        </label>
                                    </div>
                                    <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-width: 3px;" />
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-12 col-lg-4 border-end border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;"> Select Product Condition</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-check-inline mx-5">
                                                    <input class="form-check-input" type="radio" name="c" id="b" checked disabled>
                                                    <label class="form-check-label" for="b">Brandnew</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="c" id="u" disabled>
                                                    <label class="form-check-label" for="u">Used</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4 border-end border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Select Product Colour</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="clr1" disabled>
                                                    <label class="form-check-label" for="clr1">Gold</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="clr2" disabled>
                                                    <label class="form-check-label" for="clr2">Silver</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="clr3" disabled>
                                                    <label class="form-check-label" for="clr3">Graphite</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="clr4" disabled>
                                                    <label class="form-check-label" for="clr4">Jet Black</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="clr5" disabled>
                                                    <label class="form-check-label" for="clr5">Rose Gold</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="clr6" disabled>
                                                    <label class="form-check-label" for="clr6">Pacific Blue</label>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group mt-2 mb-2">
                                                    <input type="text" class="form-control" placeholder="Add New Colour" disabled>
                                                    <button class="btn btn-outline-primary" type="button" id="button-addon2">+ Add</button>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Add Product Quantity</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="number" class="form-control" value="0" min="0">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-width: 3px;" />
                            </div>

                            <div class="col-12">
                                <div class="row">

                                    <div class="col-6 border-end border-success">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Cost Per Item</label>
                                            </div>

                                            <div class="offset-0 offset-lg-2 col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control" disabled>
                                                    <span class="input-group-text">.00</span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label fw-bold" style="font-size: 20px;">Approved Payment Methods</label>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="offset-2 offset-lg-0 col-2 pm pm1"></div>
                                                    <div class="col-2 pm pm2"></div>
                                                    <div class="col-2 pm pm3"></div>
                                                    <div class="col-2 pm pm4"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-width: 3px;" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Delivery Cost</label>
                                    </div>
                                    <div class="col-12 col-lg-6 border-end border-success">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-3">
                                                <label>Delivery cost within Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 ">
                                        <div class="row">
                                            <div class="col-12 offset-lg-1 col-lg-3">
                                                <label>Delivery cost out of Colombo</label>
                                            </div>
                                            <div class="col-12 col-lg-8">
                                                <div class="input-group mb-2 mt-2">
                                                    <span class="input-group-text">Rs.</span>
                                                    <input type="text" class="form-control">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-width: 3px;" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Product Description</label>
                                    </div>
                                    <div class="col-12">
                                        <textarea cols="30" rows="15" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-width: 3px;" />
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fw-bold" style="font-size: 20px;">Add Product Images</label>
                                    </div>
                                    <div class="offset-lg-3 col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-4 border-primary rounded">
                                                <img src="./resource/img/addproductimg.svg" class="img-fluid" style="width: 250px;" id="i0">
                                            </div>
                                            <div class="col-4 border-primary rounded">
                                                <img src="./resource/img/addproductimg.svg" class="img-fluid" style="width: 250px;" id="i1">
                                            </div>
                                            <div class="col-4 border-primary rounded">
                                                <img src="./resource/img/addproductimg.svg" class="img-fluid" style="width: 250px;" id="i2">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                                        <input type="file" class="d-none" id="imageuploader" multiple>
                                        <label for="imageuploader" class="col-12 btn btn-primary" onclick="changeProductImage()">Upload Images</label>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12">
                                <hr style="border-width: 3px;" />
                            </div>



                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mt-3 mb-3">
                                <button class="btn btn-success">Update Product</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <?php include "footer.php" ?>
    <script src="./resource/js/addProduct.js"></script>
</body>

</html>