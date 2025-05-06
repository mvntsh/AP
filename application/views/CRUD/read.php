    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" style="border-color: transparent;">
                <div class="card-body">
                    <h2 style="margin-bottom: .5em; font-size: 45pt;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg> <?php echo $title; ?></h2>
                    <div id="productDrawer"></div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <form id="frmInputs">
        <input type="text" name="txtnmProductid" id="inputnmProductid">
        <input type="text" name="txtnmMachine" id="inputnmMachine" value="1">
        <input type="text" name="txtnmOrderstatus" id="inputnmOrderstatus">
    </form>

    <!-- Button trigger modal -->
    <button hidden type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="btnOpen">
    Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Product info</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table id="tblModaluser" style="width: 100%;">
                <tbody></tbody>
            </table>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Understood</button>
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
                                                    <h2>${sql['productname']}</h2>
                                                    <h6 id="sumPrice">${sql['productprice']}</h6>
                                                    <table width="100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td style="text-align: left; width: 10%; font-size: 9pt;">
                                                                    Quantity
                                                                </td>
                                                                <td style="padding-left: .5em;width: 40%;">
                                                                    <input type="number" name="txtnmQuantity" class="form-control form-control-sm" id="inputnmQuantity">
                                                                </td>
                                                                <td style="width: 50%;" id="tdTotal"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="d-grid" style="margin-top: 1em;">
                                                        <button data-productid="${sql['product_id']}" data-productprice="${sql['productprice']}" class="btn btn-outline-success" id="btnPurchase"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                        <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5M3.14 5l.5 2H5V5zM6 5v2h2V5zm3 0v2h2V5zm3 0v2h1.36l.5-2zm1.11 3H12v2h.61zM11 8H9v2h2zM8 8H6v2h2zM5 8H3.89l.5 2H5zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0m9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2m-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                        </svg> Place order</button>
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

            $(document).on("click","#btnPurchase",function(e){
                e.preventDefault();
                $("#inputnmProductid").val($(this).attr("data-productid"));
                $("#inputnmPrice").val($(this).attr("data-productprice"));

                $("#inputnmOrderstatus").val("Set");
                // getOrder_v();
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
                            $("#inputnmPrice").val("");
                        }
                    }
                })
            }

            $(document).on("click","#btnSelect",function(e){
                e.preventDefault();
                
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
                            var tbody  = '';

                            response.data.forEach(function(sql){
                                tbody += `
                                    <tr style="width: 50%;">
                                        <td rowspan="2" style="height: 100%; text-align: center;">
                                            <img src="../productimg/${sql['productimg']}" width="100%" height="100%">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 25%; text-align: center;">${sql['productname']}</td>
                                        <td style="width: 25%; text-align: center;">${sql['totalordered']}</td>
                                    </tr>
                                `;
                            })
                            $("#tblModaluser").html(tbody);
                            $("#btnOpen").click();
                        }
                    }
                })
            }
        })
    </script>