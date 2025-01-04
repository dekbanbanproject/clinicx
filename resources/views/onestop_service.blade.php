@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card card_prs_4">
                <div class="card-header" style="background-color: rgb(212, 253, 246)">{{ __('วันที่') }}</div>

                <div class="card-body">
                     
                    
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card card_prs_4">
                <div class="card-header" style="background-color: rgb(212, 253, 246)"> 
                    <div class="row">
                        <div class="col-md-2">{{ __('One Stop Service') }}</div>
                        <div class="col"></div>
                        <div class="col-md-3">                           
                            <select name="hn_search" id="hn_search" class="form-control" style="width: 100%" onchange="Hn_detail()">
                                <option value="">ค้นหา HN</option>
                                @foreach ($users as $item2)                               
                                    <option value="{{$item2->hn}}">{{$item2->hn}} || {{$item2->fname}}  {{$item2->lname}}</option>                                
                                @endforeach 
                            </select>
                        </div>
                        <div class="col-md-2 text-start">  
                            <button type="button" id="UpdateData" class="ladda-button me-2 btn-pill btn btn-success card_prs_4" >
                                <img src="{{ asset('images/Savewhit.png') }}" class="me-2 ms-2" height="18px" width="18px">
                               บันทึก
                           </button>
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
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">HN</span>
                                    <input type="text" class="form-control input_new" id="HN" name="hn" placeholder="" aria-label="HN" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">ชื่อ</span>
                                    <input type="text" class="form-control input_new" id="FNAME" name="fname" placeholder="" aria-label="ชื่อ" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">นามสกุล</span>
                                    <input type="text" class="form-control input_new" id="LNAME" name="lname" placeholder="" aria-label="นามสกุล" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">CID</span>
                                    <input type="text" class="form-control input_new" id="CID" name="cid" placeholder="" aria-label="CID" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                           
                        </div>

                        <hr style="color:rgb(255, 23, 81)">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">ส่วนสูง</span>
                                    <input type="text" class="form-control input_new" id="HEIGHT" name="height" placeholder="" aria-label="ส่วนสูง" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">น้ำหนัก</span>
                                    <input type="text" class="form-control input_new" id="WEIGHT" name="weight" placeholder="" aria-label="น้ำหนัก" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">ความดัน</span>
                                    <input type="text" class="form-control input_new" id="PRESSURE" name="pressure" placeholder="" aria-label="ความดัน" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">ชีพจร</span>
                                    <input type="text" class="form-control input_new" id="PULSE" name="pulse" placeholder="" aria-label="ชีพจร" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">วันที่</span>
                                    <div class="input-daterange input-group" id="datepicker1" data-date-format="dd M, yyyy" data-date-autoclose="true" data-provide="datepicker" data-date-container='#datepicker1'>
                                        <input type="text" class="form-control-sm input_new" name="vstdate" id="datepicker" placeholder="Start Date" data-date-container='#datepicker1' style="font-size: 12px"
                                            data-provide="datepicker" data-date-autoclose="true" autocomplete="off" data-date-language="th-th" value="{{ $vstdate }}" style="color:rgb(6, 152, 236);font-size:14px;" required />
                                    </div>                                 
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">เวลา</span>
                                    <input type="text" class="form-control input_new" id="VSTTIME" name="vsttime" placeholder="" aria-label="เวลา" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)" value="{{$mm}}" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">โรคประจำตัว</span>
                                    <input type="text" class="form-control input_new" id="CONGENITAL" name="congenital" placeholder="" aria-label="โรคประจำตัว" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">การแพ้ยา</span>
                                    <input type="text" class="form-control input_new" id="INTOLERANCE" name="intolerance" placeholder="" aria-label="การแพ้ยา" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">อัตราการหายใจ</span>
                                    <input type="text" class="form-control input_new" id="RESPIRATION" name="respiration" placeholder="" aria-label="อัตราการหายใจ" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
                                </div>
                            </div> 
                            
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping" style="color:rgb(2, 80, 168)">CC</span>
                                    <input type="text" class="form-control input_new" id="CC" name="cc" placeholder="" aria-label="CC" aria-describedby="addon-wrapping" style="color:rgb(6, 152, 236)">
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
        function Hn_detail() {
            var hn_search = document.getElementById("hn_search").value;
            // alert(hn_search);
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('onestop_serviceshow')}}",
                    method: "GET",
                    data: {hn_search: hn_search,_token: _token
                    },
                    success: function (result) {

                        // $('#show_detail').html(result);
                        $('#HN').val(result.data_show.hn)
                        $('#FNAME').val(result.data_show.fname)
                        $('#LNAME').val(result.data_show.lname)
                        $('#CID').val(result.data_show.cid)
                        $('#HEIGHT').val(result.data_show.height)
                        $('#WEIGHT').val(result.data_show.weight)
                    }
                })
        }
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example2').DataTable();
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
             
            $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });

                $('select').select2();
                $('#example').DataTable();
                $('#example2').DataTable();
                
                $('#hn_search').select2({
                    placeholder: "--ค้นหา HN--",
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

               
            });
            //------------------------ จังหวัด ------------------
            $('.province').change(function(){
                        if($(this).val()!=''){
                        var select = $(this).val();
                        var _token=$('input[name="_token"]').val();
                        // alert(select);
                            $.ajax({
                                    url:"{{route('fecth.fetch_province')}}",
                                    method:"GET",
                                    data:{select:select,_token:_token},
                                    success:function(result){
                                        $('.amphur').html(result);
                                    }
                            }) 
                        }        
            });

            $('.amphur').change(function(){
                    if($(this).val()!=''){
                    var select   = $(this).val();
                    var province = $('#province').val();
                    var _token=$('input[name="_token"]').val();
                    // alert(select);
                        $.ajax({
                                url:"{{route('fecth.fetch_amphur')}}",
                                method:"GET",
                                data:{select:select,province:province,_token:_token},
                                success:function(result){
                                $('.tumbons').html(result);
                                }
                        }) 
                    }        
            });
            $('.tumbons').change(function(){
                    if($(this).val()!=''){
                    var select   = $(this).val();
                    var amphur   = $('#amphur').val();
                    var province = $('#province').val();
                    var _token=$('input[name="_token"]').val();
                    // alert(select);
                        $.ajax({
                                url:"{{route('fecth.fetch_tumbon')}}",
                                method:"GET",
                                data:{select:select,province:province,amphur:amphur,_token:_token},
                                success:function(result){
                                $('.po_code').html(result);
                                }
                        }) 
            }   

            $('#UpdateData').click(function() {
                var hn               = $('#HN').val();
                var fname            = $('#FNAME').val();
                var lname            = $('#LNAME').val();
                var cid              = $('#CID').val();
                var height           = $('#HEIGHT').val();
                var weight           = $('#WEIGHT').val();
                var pressure         = $('#PRESSURE').val();
                var pulse            = $('#PULSE').val();
                var datepicker       = $('#datepicker').val();
                var vsttime          = $('#VSTTIME').val();
                var congenital       = $('#CONGENITAL').val();
                var cc               = $('#CC').val();

                alert(hn);
                Swal.fire({ position: "top-end",
                        title: 'ต้องการบันทึกข้อมูลใช่ไหม ?',
                        text: "You Warn Save Data!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Save it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#overlay").fadeIn(300);　
                                $("#spinner").show(); //Load button clicked show spinner

                                $.ajax({
                                    url: "{{ route('one.onestop_service_save') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    data: {hn,fname,lname,cid,height,weight,pressure,pulse,datepicker,vsttime,congenital,cc},
                                    success: function(data) {
                                        if (data.status == 200) {
                                            Swal.fire({ position: "top-end",
                                                title: 'บันทึกข้อมูลสำเร็จ',
                                                text: "You Save data success",
                                                icon: 'success',
                                                showCancelButton: false,
                                                confirmButtonColor: '#06D177',
                                                confirmButtonText: 'เรียบร้อย'
                                            }).then((result) => {
                                                if (result
                                                    .isConfirmed) {
                                                    console.log(
                                                        data);
                                                    window.location.reload();
                                                    // window.location="{{url('wh_sub_main_rp')}}";
                                                    $('#spinner').hide();//Request is complete so hide spinner
                                                        setTimeout(function(){
                                                            $("#overlay").fadeOut(300);
                                                        },500);
                                                }
                                            })
                                        } else {

                                        }
                                    },
                                });

                            }
                })
            });
                         
        });
    </script>
@endsection
