@extends('layouts.app')

@php
 
    if (Auth::check()) {
        $store_code = Auth::user()->store_code;
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card_prs_4">
                <div class="card-header">
                    
                    {{-- {{ __('ทะเบียนคนไข้') }} --}}
                    <div class="row"> 
                
                        <div class="col-md-10">
                            <h4 style="color:rgb(247, 103, 68)">ทะเบียนคนไข้</h4> 
                        </div> 
                                                
                        <div class="col-md-2 text-end">  
                            {{-- <a href="{{URL('patient_registry')}}" class="ladda-button btn-pill btn btn-sm btn-primary card_audit_4c"> 
                                <img src="{{ asset('images/Addwhite.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                                เพิ่มรายการ
                            </a>    --}}
                            <button type="button" id="UpdateData" class="ladda-button me-2 btn-pill btn btn-sm btn-success input_new" > 
                                <img src="{{ asset('images/Savewhit.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                               บันทึก
                           </button>
                           {{-- <a href="{{url('wh_pay')}}" class="ladda-button me-2 btn-pill btn btn-sm btn-danger input_new"> 
                             <img src="{{ asset('images/back.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                             ยกเลิก
                            </a> --}}
                        </div>    
                    </div>    

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-8">
                            <div id="getdata_show"></div> 
                            {{-- <div class="table-responsive">
                                <table id="scroll-vertical-datatable" class="table table-sm table-striped dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="5%" class="text-center">ลำดับ</th>
                                            <th class="text-center">hn</th>
                                            <th class="text-center">cid</th>
                                            <th class="text-center">ชื่อ-นามสกุล</th>
                                            <th class="text-center">สิทธิ์</th>
                                            <th class="text-center">สถานะ</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="color:rgb(73, 147, 231)" width="5%"></td>
                                            <td class="text-center" style="color:rgb(73, 147, 231)" width="10%"></td>
                                            <td class="text-center" style="color:rgb(73, 147, 231)" width="10%"></td>
                                            <td class="text-center" style="color:rgb(73, 147, 231)"></td>
                                            <td class="text-center" style="color:rgb(73, 147, 231)" width="10%"></td>
                                            <td class="text-center" style="color:rgb(73, 147, 231)" width="5%"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
                           
                        </div>
                                {{-- <div class="col-md-12">ชื่อ</div>
                                <div class="col-md-1">
                                    ชื่อ
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id="fname" name="fname" >
                                </div> --}}
                                                       
                           
                                <input type="hidden" id="store_code" name="store_code" value="{{$store_code}}">
                        
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">คำนำหน้า</span>
                                        {{-- <input type="text" class="form-control" id="pname" name="pname" placeholder="" aria-label="คำนำหน้า" aria-describedby="addon-wrapping"> --}}
                                        <select class="form-control input_new" id="pname" name="pname">
                                            <option value="">--เลือก--</option>
                                            @foreach ($users_prefix as $item)
                                                <option value="{{$item->prefix_id}}">{{$item->prefix_name}}</option>
                                            @endforeach
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"> 
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">ชื่อ</span>
                                        <input type="text" class="form-control input_new" id="fname" name="fname" placeholder="" aria-label="ชื่อ" aria-describedby="addon-wrapping">
                                      </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">นามสกุล</span>
                                        <input type="text" class="form-control input_new" id="lname" name="lname" placeholder="" aria-label="นามสกุล" aria-describedby="addon-wrapping">
                                      </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12"> 
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">นามสกุล</span>
                                        <input type="text" class="form-control" placeholder="" aria-label="นามสกุล" aria-describedby="addon-wrapping">
                                      </div>
                                </div>
                            </div> --}}
                            <div class="row mt-2">
                                <div class="col-md-12"> 
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Cid</span>
                                        <input type="text" class="form-control input_new" id="cid" name="cid" placeholder="" aria-label="Cid" aria-describedby="addon-wrapping">
                                      </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"> 
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Tel</span>
                                        <input type="text" class="form-control input_new" id="tel" name="tel" placeholder="" aria-label="Tel" aria-describedby="addon-wrapping">
                                      </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">Pttype</span>
                                        <input type="text" class="form-control input_new" id="pttype" name="pttype" placeholder="" aria-label="Pttype" aria-describedby="addon-wrapping">
                                      </div>
                                </div>
                            </div>
                        </div>
                       
                                            
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
     $(document).ready(function() {
            $('select').select2();
            $('#example').DataTable();
            $('#example2').DataTable();
            
            $('#p4p_work_month').select2({
                placeholder: "--เลือก--",
                allowClear: true
            });
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
            $('#datepicker2').datepicker({
                format: 'yyyy-mm-dd'
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
           
            load_data_table();
            

            function load_data_table() { 
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
