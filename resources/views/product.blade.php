<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>

        <title>Product</title>
        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  

    </head>
    <body>
      <div class="container-fluid">
        <div class="text-primary h1">Products</div>
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="product_table">
                        {{-- Products --}}
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <div>
                        <button class="btn btn-primary" id="first"><<</button>
                        <button class="btn btn-primary" id="prev">Prev</button>
                        <span id="current_page"></span>/<span id="last_page"></span>
                        <button class="btn btn-primary" id="next">Next</button>
                        <button class="btn btn-primary" id="last">>></button>
                    </div>
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                        Add Product
                    </button>
                </div>
            </div>
            <div class="col-md-4 border border-info ">
                <div id="productInfo">
                    <div class="row">
                        <div class="col-md-12 h1"><span id="selectedProductName">Product</span></div>
                        <div class="col-md-12 " >Description: <span id="selectedProductDescription">Description</span></div>
                        <div class="col-md-12 clearfix">Price: <b><span id="selectedProductPrice">Price</span></b></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal --}}
        <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Name --}}
                            <label class="form-check-label" for="productName">
                                Name
                            </label>
                            <input type="text" id="productName" class="form-control" maxlength="255" placeholder="Name"/>
                        </div>
                        <div class="col-md-6">
                            {{-- Description --}}
                            <label class="form-check-label" for="productDesc">
                                Description
                            </label>
                            <input type="text" id="productDesc" class="form-control" placeholder="Description"/>
                        </div>
                        <div class="col-md-12">
                            {{-- Price --}}
                            <label class="form-check-label" for="productPrice">
                                Price
                            </label>
                            <input type="number" id="productPrice" class="form-control" step="0.01" placeholder="Price"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="addProductBtn" class="btn btn-primary">Add Product</button>
                </div>
                </div>
            </div>
        </div>
      </div>
    </body>
    <script>
        $(document).ready(function(){
            
            $('#productInfo').hide();
            var pagination = null;

            function refreshProducts(page){

                var paginationUrl = 'api/products';
                if(page!=null){
                    paginationUrl = page;
                }
                //Store
                $.ajax({
                    url: paginationUrl,
                    method:'get',
                    data:{},
                    success:function(res){
                        pagination = res;
                        var data = res.data;
                        var html ="";
                        for(var i in data){
                            html += '<tr>' + 
                                    '<td>' + data[i].id + '</td>'  + 
                                    '<td>' + data[i].name + '</td>' + 
                                    '<td>' + data[i].description + '</td>' + 
                                    '<td>' + data[i].price + '</td>' +
                                    '<td class="d-flex justify-content-around">'+
                                    '<button class="btn btn-success selectBtn" id="'+data[i].id+'">View</button>'+
                                    '<button class="btn btn-danger deleteBtn" id="'+data[i].id+'">Delete</button></td>' +
                                    '</tr>'; 
                        }

                        $('#product_table').html(html);


                        checkPagination();

                    }
                });
            }


            //Function List


            function getCachedProduct(){
                
                $.ajax({
                    url: 'api/getCachedProduct',
                    method:'get',
                    success:function(res){
                        if(res != ""){

                            $.ajax({
                                url: 'api/product/' + res,
                                method:'get',
                                data:{},
                                success:function(res){
                                    $('#selectedProductName').text(res.name);
                                    $('#selectedProductDescription').text(res.description);
                                    $('#selectedProductPrice').text(res.price);
                                    $('#productInfo').fadeIn(200);
                                }
                            });
                        }
                    }
                });
            }

            function checkPagination(){
                //Pagination
                $('#current_page').html(pagination.current_page);
                $('#last_page').html(pagination.last_page);

                if(pagination.next_page_url == null){
                    $('#next').attr('disabled',true);
                }else{
                    $('#next').removeAttr('disabled');
                }

                if(pagination.prev_page_url == null){
                    $('#prev').attr('disabled',true);
                }else{
                    $('#prev').removeAttr('disabled');
                }
            }


            refreshProducts();
            getCachedProduct()


        //Button

        //Pagination
        $(document).on('click','#first',function(e){
            refreshProducts(pagination.first_page_url);
        });
        $(document).on('click','#last',function(e){
            refreshProducts(pagination.last_page_url);
        });
        $(document).on('click','#prev',function(e){
            refreshProducts(pagination.prev_page_url);
        });
        $(document).on('click','#next',function(e){
            refreshProducts(pagination.next_page_url);
        });


        //Add Product
        $(document).on('click','#addProductBtn',function(e){
            var productName = $('#productName').val();
            var productDesc = $('#productDesc').val();
            var productPrice = $('#productPrice').val();

            $.ajax({
                url: 'api/product',
                method:'put',
                data:{
                    name: productName,
                    description: productDesc,
                    price: productPrice,
                },
                success:function(res){
                    if(res === "success"){
                        alert("Product successfully added");
                        $('#addProductModal').modal('hide');
                        refreshProducts();

                    }
                }
            });
        });


        //Delete Product
        $(document).on('click','.deleteBtn',function(e){
            var id = $(this).attr('id');
            $.ajax({
                url: 'api/product/' + id,
                method:'delete',
                data:{},
                success:function(res){
                    if(res === "success"){
                        alert("Product successfully deleted.");
                        refreshProducts();

                    }
                }
            });
        });
    
        //Select Product
        $(document).on('click','.selectBtn',function(e){
            var id = $(this).attr('id');
            $.ajax({
                url: 'api/product/' + id,
                method:'get',
                data:{},
                success:function(res){
                    $('#selectedProductName').text(res.name);
                    $('#selectedProductDescription').text(res.description);
                    $('#selectedProductPrice').text(res.price);
                    $('#productInfo').fadeIn(200);
                }
            });
        });


        });

    </script>
</html>