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
                        <div class="row">
                            <div class="col-md-12"> 
                                <div id="getdata_show"></div> 
                            </div> 
                        </div> 
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
                                                <input type="text" class="form-control input_new" id="pttype" name="pttype" placeholder="" aria-label="สิทธิ์การรักษา" aria-describedby="addon-wrapping" value="{{$subInscl}}">
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
                                                <input type="text" class="form-control input_new" id="ban_no" name="ban_no" placeholder="" aria-label="บ้านเลขที่" aria-describedby="addon-wrapping">
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
                                          
           
            $('#Addproduct').click(function() {
                var pro_id           = $('#pro_id').val(); 
                var qty              = $('#qty').val(); 
                var one_price        = $('#one_price').val(); 
                var lot_no           = $('#lot_no').val(); 
                var stock_list_id    = $('#stock_list_id').val(); 
                var wh_recieve_id    = $('#wh_recieve_id').val();  
                var data_year        = $('#data_year').val();  
                            
                        $.ajax({
                            url: "{{ route('registry_save') }}",
                            type: "POST",
                            dataType: 'json',
                            data: {pro_id,qty,one_price,lot_no,wh_recieve_id,stock_list_id,data_year},
                            success: function(data) {
                                load_data_table(); 
                                $('#qty').val("");
                                $('#one_price').val("");
                                $('#pro_id').val("");
                                if (data.status == 200) { 
                                  
                                } else {
                                    
                                }
                            },
                        }); 
            });
           
           
  
        });
</script>


@endsection
