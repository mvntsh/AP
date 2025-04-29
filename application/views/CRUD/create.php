    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" style="width: 100%; border-color: transparent;">
                <div class="card-body">
                    <h2><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg> <?php echo $title; ?></h2>
                    <form id="frmInputs" style="margin-top: 3em;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="txtnmFirstname" id="inputnmFirstname" placeholder="First Name">
                            <label for="inputnmFirstname">First Name</label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="txtnmLastname" id="inputnmLastname" placeholder="Last Name">
                            <input type="text" name="txtnmStatus" value="1" hidden>
                            <label for="inputnmLastname">Last Name</label>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 d-grid"><button class="btn btn-success" id="btnSave">Enroll</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#inputnmFirstname").focus();

            $("#btnSave").click(function(e){
                e.preventDefault()
                var inputnmFirstname = $("#inputnmFirstname").val();
                var inputnmLastname = $("#inputnmLastname").val();

                if(inputnmFirstname==("")>0||inputnmLastname==("")>0){
                    $("#btnToast").click();
                    $(".toast-body").text("Please input empty field.");
                }else{
                    insert_v();
                }
            })

            function insert_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Create/insert_c',
                    data:$("#frmInputs").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            $("#btnAlert").click();
                            $(".toast-body").text("Saved");
                            $(".form-control").val("");
                        }
                    }
                })
            }
        })
    </script>