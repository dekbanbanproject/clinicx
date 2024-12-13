@extends('layouts.app')

@php
 
    if (Auth::check()) {
        $store_code = Auth::user()->store_id;
        $iduser     = Auth::user()->id;
    } else {
        echo "<body onload=\"TypeAdmin()\"></body>";
        exit();
    }
    $url = Request::url();
    $pos = strrpos($url, '/') + 1;
    $ynow = date('Y') + 543;
    $yb = date('Y') + 542;
    
@endphp
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">

        <div id="accordion" class="custom-accordion">
            <div class="card mb-1 shadow-none card_prs_4">
                <a href="#collapseOne" class="text-dark" data-bs-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                    <div class="card-header" id="headingOne">
                        <h6 class="m-0" style="color:rgb(247, 103, 68)">
                            ทะเบียนคนไข้
                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                        </h6>
                    </div>
                </a>

                <div id="collapseOne" class="collapse show"
                        aria-labelledby="headingOne" data-bs-parent="#accordion">
                    <div class="card-body">
                        <body>

                            <div class="row">
                                <div class="col-md-12"> 
                                
                                    <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                 
                                    <div style='overflow:scroll; height:300px;' class="mt-2">

                                        <div id="getdata_show"></div>

                                    </div>
                                </div> 
                            </div> 

                        </body>

                    </div>
                </div>
            </div>
            <div class="card mb-1 shadow-none card_prs_4">
                <a href="#collapseTwo" class="text-dark collapsed" data-bs-toggle="collapse"
                                aria-expanded="false"
                                aria-controls="collapseTwo">
                    <div class="card-header" id="headingTwo">
                        <h6 class="m-0" style="color:rgb(247, 103, 68)">
                            เพิ่มรายชื่อคนไข้
                            <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                        </h6>
                    </div>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordion">
                    <div class="card-body">
                                    
                            <div class="row">
                                <div class="col-md-10"> 
                                    <div class="row">
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">คำนำหน้า</span> 
                                                <select class="form-control input_new" id="pname" name="pname" style="width: 100%">
                                                    <option value="">-เลือก-</option>
                                                    @foreach ($users_prefix as $item)
                                                    <option value="{{$item->prefix_id}}">{{$item->prefix_name}}</option> 
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">ชื่อ</span>
                                                <input type="text" class="form-control input_new" id="fname" name="fname" placeholder="" aria-label="ชื่อ" aria-describedby="addon-wrapping" value="{{ $fname }}">
                                                </div>
                                        </div>
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">นามสกุล</span>
                                                <input type="text" class="form-control input_new" id="lname" name="lname" placeholder="" aria-label="นามสกุล" aria-describedby="addon-wrapping" value="{{ $lname }}">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">สิทธิ์การรักษา</span>
                                                <input type="text" class="form-control input_new" id="pttype" name="pttype" placeholder="" aria-label="สิทธิ์การรักษา" aria-describedby="addon-wrapping" value="{{$mainInscl}}">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">Cid</span>
                                                <input type="text" class="form-control input_new" id="cid" name="cid" placeholder="" aria-label="Cid" aria-describedby="addon-wrapping" value="{{ $pid }}">
                                                </div>
                                        </div>
                                        
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">Tel</span>
                                                <input type="text" class="form-control input_new" id="tel" name="tel" placeholder="" aria-label="Tel" aria-describedby="addon-wrapping">
                                                </div>
                                        </div>  
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">บ้านเลขที่</span>
                                                <input type="text" class="form-control input_new" id="ban_no" name="ban_no" placeholder="" aria-label="บ้านเลขที่" aria-describedby="addon-wrapping">
                                                </div>
                                        </div>                             
                                    </div>
        
                                    <div class="row mt-2">
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">หมู่บ้าน</span>
                                                <input type="text" class="form-control input_new" id="ban_name" name="ban_name" placeholder="" aria-label="หมู่บ้าน" aria-describedby="addon-wrapping">
                                                </div>
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">จังหวัด</span>
                                                <input type="text" class="form-control input_new" id="province" name="province" placeholder="" aria-label="จังหวัด" aria-describedby="addon-wrapping">
                                                </div>
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">อำเภอ</span>
                                                <input type="text" class="form-control input_new" id="ampher" name="ampher" placeholder="" aria-label="อำเภอ" aria-describedby="addon-wrapping">
                                                </div>
                                        </div> 
                                    </div>    
                                    <div class="row mt-2">
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">ตำบล</span>
                                                <input type="text" class="form-control input_new" id="tumbon" name="tumbon" placeholder="" aria-label="ตำบล" aria-describedby="addon-wrapping">
                                                </div>
                                        </div> 
                                        <div class="col-md-4"> 
                                            <div class="input-group flex-nowrap">
                                                <span class="input-group-text" id="addon-wrapping">รหัสไปรษณีย์</span>
                                                <input type="text" class="form-control input_new" id="poscode" name="poscode" placeholder="" aria-label="รหัสไปรษณีย์" aria-describedby="addon-wrapping">
                                                </div>
                                        </div> 
                                    </div>                                                  
                                </div>            
                                <div class="col-md-2 text-center"> 
                                    <img src="data:image/png;base64,{{ $image }}" alt="" width="150px" height="auto">
                                </div> 
                            </div>   

                            </div>            
                            <div class="card-footer">
                                <div class="row">                 
                                    <div class="col"></div>             
                                    <div class="col-md-6 text-center">   
                                        <button type="button" id="UpdateData" class="ladda-button me-2 btn-pill btn btn-sm btn-success input_new" > 
                                            <img src="{{ asset('images/Savewhit.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                                           บันทึก
                                       </button> 
                                    </div>    
                                    <div class="col"></div>   
                                </div>    
                            </div>
                            <input type="hidden" id="store_code" name="store_code" value="{{$store_code}}">
                    </div>
                </div>
            </div>
           
        </div>
        
           
       
    </div>
</div>
@endsection
@section('footer')
<script>
     patient_loadtable();            

        function patient_loadtable() { 
                var store_code = document.getElementById("store_code").value; 
                // alert(wh_recieve_id);
                var _token=$('input[name="_token"]').val();
                $.ajax({
                        url:"{{route('patient_loadtable')}}",
                        method:"GET",
                        data:{store_code:store_code,_token:_token},
                        success:function(result){
                            $('#getdata_show').html(result); 
                        }
                });                     
        } 
     $(document).ready(function() {

        $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $('select').select2();
            $('#example').DataTable();
            $('#example2').DataTable();
            
            $('#pname').select2({
                placeholder: "--เลือก--",
                allowClear: true
            });
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#datepicker2').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#p4p_work_month').select2({
                placeholder: "--เลือก--",
                allowClear: true
            });

            $('#stamp').on('click', function(e) {
                    if($(this).is(':checked',true))  
                    {
                        $(".sub_chk").prop('checked', true);  
                    } else {  
                        $(".sub_chk").prop('checked',false);  
                    }  
            }); 
            $("#spinner-div").hide(); //Request is complete so hide spinner
                                          
           
            $('#UpdateData').click(function() {
                var pname           = $('#pname').val(); 
                var fname              = $('#fname').val(); 
                var lname        = $('#lname').val(); 
                var pttype           = $('#pttype').val(); 
                var cid    = $('#cid').val(); 
                var tel    = $('#tel').val();  
                var ban_no        = $('#ban_no').val();  
                var ban_name        = $('#ban_name').val();  
                var province        = $('#province').val();  
                var ampher        = $('#ampher').val();  
                var tumbon        = $('#tumbon').val();  
                var poscode        = $('#poscode').val();  
                
                        $.ajax({
                            url: "{{ route('patient_save') }}",
                            type: "POST",
                            dataType: 'json',
                            data: {pname,fname,lname,pttype,cid,tel,ban_no,ban_name,province,ampher,tumbon,poscode},
                            success: function(data) {
                                patient_loadtable(); 
                                // $('#qty').val("");
                                // $('#one_price').val("");
                                // $('#pro_id').val("");
                                if (data.status == 200) { 
                                    Swal.fire({
                                        position: "top-end",
                                        icon: "success",
                                        title: "Your work has been saved",
                                        showConfirmButton: false,
                                        timer: 1500
                                        });
                                } else {
                                    
                                }
                            },
                        }); 
            });
           
           
  
        });
</script>


@endsection
