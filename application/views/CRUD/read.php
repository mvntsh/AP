    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card" style="border-color: transparent;">
                <div class="card-body">
                    <h2 style="margin-bottom: 3em;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/></svg> <?php echo $title; ?></h2>
                    <table class="table table-striped table-hover" id="tblUser">
                        <thead>
                            <tr style="text-align: center;">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <form id="frmInputs" hidden>
        <input type="text" name="txtnmUserid" id="inputnmUserid">
    </form>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="btnOpen">
    Launch static backdrop modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">User data</h1>
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
            viewUser_c();
            function viewUser_c(){
                $.ajax({
                    type:'ajax',
                    method:'POST',
                    url:'Read/viewUser_c',
                    dataType:'json',
                    success:function(response){
                        if(response.success){
                            var tbody = '';

                            response.data.forEach(function(sql){
                                tbody += `
                                    <tr>
                                        <td>${sql['firstname']}</td>
                                        <td>${sql['lastname']}</td>
                                        <td>
                                            <button data-userid="${sql['user_id']}" class="btn btn-primary" style="width: 100%;" id="btnSelect">Select</button>
                                        </td>
                                    </tr>
                                `;
                            })
                            $("#tblUser tbody").html(tbody);
                            $("#tblUser").DataTable();
                        }
                    }
                })
            }

            $(document).on("click","#btnSelect",function(e){
                e.preventDefault();
                $("#inputnmUserid").val($(this).attr("data-userid"));
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
                                    <tr>
                                        <td rowspan="2" style="height: 100%; text-align: center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16"><path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/><path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/></svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>${sql['firstname']}</td>
                                        <td>${sql['lastname']}</td>
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