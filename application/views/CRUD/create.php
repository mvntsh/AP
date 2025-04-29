    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" style="width: 100%; border-color: transparent;">
                
                <div class="card-body">
                    <h2><img src="https://github.com/fluidicon.png" class="card-img-top" alt="..." style="width:11%;"> <?php echo $title; ?></h2>
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
            $("#btnSave").click(function(e){
                e.preventDefault();
                insert_v();
            })

            function insert_v(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Signup/insert_c',
                    data:$("#frmInputs").serialize(),
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            $(".form-control").val("");
                            $("#inputnmFirstname").focus();
                        }
                    }
                })
            }
        })
    </script>