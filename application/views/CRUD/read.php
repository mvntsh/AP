    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" style="border-color: transparent;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h2 style="margin-bottom: .5em; font-size: 45pt;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg> <?php echo $title; ?></h2>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-danger" style="width: 100%; margin-top: 1em;" id="btnMyorder">My Order</button>
                        </div>
                    </div>
                    <div id="productDrawer"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <form id="frmInputs">
        <input type="text" name="txtnmProductid" id="inputnmProductid" placeholder="Product ID">
        <input type="text" name="txtnmMachine" id="inputnmMachine" value="1" placeholder="Machine No.">
        <input type="text" name="txtnmOrderstatus" id="inputnmOrderstatus" placeholder="Order Status">
        <input type="text" name="txtnmPrice" id="inputnmPrice" placeholder="Price">
        <input type="text" name="txtnmPno" id="inputnmPno" value="4" placeholder="Priority">
        <input type="text" name="txtnmOrderid" id="inputnmOrderid" placeholder="Orderid">
        <div id="divOrder"></div>
    </form>

    <!-- Button trigger modal -->
    <button hidden type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="btnOpen">
    Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Product info</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div id="divModal"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <div id="divConfirm"></div>
        </div>
        </div>
    </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            viewProduct_v();
            function viewProduct_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Read/viewProduct_c',
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            var div = '';

                            response.data.forEach(function(sql){
                                div += `
                                    <div class="card" style="margin-bottom: 1em;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="../productimg/${sql['productimg']}" width="100%" height="100%">
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 style="font-size: 30pt;">${sql['productname']}</h1>
                                                    <h6>${sql['productprice']}</h6>
                                                    <div class="d-grid" style="margin-top: 1em;">
                                                        <button data-productid="${sql['product_id']}" data-productprice="${sql['productprice']}" class="btn btn-outline-success" id="btnSelect">Select</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            })
                            $("#productDrawer").html(div);
                        }
                    }
                })
            }

            $(document).on("click","#btnSelect",function(e){
                e.preventDefault();
                $("#inputnmProductid").val($(this).attr("data-productid"));
                $("#inputnmPrice").val($(this).attr("data-productprice"));

                $("#inputnmOrderstatus").val("Set");
                getData_v();
            })

            function getData_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Read/getData_c',
                    data:$("#frmInputs").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            var div  = '';

                            response.data.forEach(function(sql){
                                div += `
                                    <div class="card" style="border-color: transparent;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="../productimg/${sql['productimg']}" width="75%" height="75%">
                                                </div>
                                                <div class="col-md-6">
                                                    <h1 style="font-size: 30pt;">${sql['productname']}</h1>
                                                    <h6>₱${sql['productprice']}</h6>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group">
                                                                <span style="margin-right: 1em; margin-top: .6em;">Quantity</span><input type="number" class="form-control form-control-lg" id="inputnmQuantity" name="txtnmQuantity" style="border-radius: 0px;">
                                                            </div>
                                                        </div>
                                                    </div
                                                    <div class="d-grid" style="margin-top: 1em;">
                                                        <button data-productid="${sql['product_id']}" data-productprice="${sql['productprice']}" class="btn btn-primary" id="btnPurchase" style="width: 90%; margin-top: 1em;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                        </svg> Place order</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            })
                            $("#divModal").html(div);
                            $("#inputnmQuantity").val("1");
                            $("#btnOpen").click();
                            tallyOrder_c();
                        }
                    }
                })
            }

            $(document).on("click","#btnPurchase",function(e){
                e.preventDefault();
                getOrder_v();
            })

            function getOrder_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Read/getOrder_c',
                    data:$("#inputnmProductid,#inputnmMachine,#inputnmPrice,#inputnmQuantity,#inputnmOrderstatus").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            
                        }
                    }
                })
            }

            function tallyOrder_c(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Read/tallyOrder_c',
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            var div = '';

                            response.data.forEach(function(sql){
                                div += `
                                    <button data-orderid="${sql['order_id']}" id="getOrderid">Confirm</button>
                                `;
                            })
                            $("#divConfirm").html(div);
                            $("#inputnmPrice,#inputnmQuantity").val("");
                        }
                    }
                })
            }

            $(document).on("click","#getOrderid",function(e){
                e.preventDefault();
                $("#inputnmOrderid").val($(this).attr("data-orderid"));
                alert(inputnmOrderid);
            })
            
            $("#btnMyorder").click(function(e){
                e.preventDefault();
                $("#staticBackdropLabel").text("My Order");
                $("#btnOpen").click();
            })

            function myOrder_c(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Read/myOrder_c',
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            
                        }
                    }
                })
            }
        })
    </script>