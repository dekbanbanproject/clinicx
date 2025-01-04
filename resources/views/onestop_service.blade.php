@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card card_prs_4">
                <div class="card-header">{{ __('วันที่') }}</div>

                <div class="card-body">
                     
                    
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card card_prs_4">
                <div class="card-header"> 
                    <div class="row">
                        <div class="col-md-2">{{ __('One Stop Service') }}</div>
                        <div class="col"></div>
                        <div class="col-md-2">                           
                            <select name="hn_search" id="hn_search" class="form-control" style="width: 100%">
                                <option value="">ค้นหา HN</option>
                                @foreach ($users as $item2)                               
                                    <option value="{{$item2->id}}">{{$item2->hn}} || {{$item2->fname}}  {{$item2->lname}}</option>                                
                                @endforeach 
                            </select>
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
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">HN</span>
                                    <input type="text" class="form-control input_new" id="hn" name="hn" placeholder="" aria-label="HN" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">ชื่อ</span>
                                    <input type="text" class="form-control input_new" id="fname" name="fname" placeholder="" aria-label="ชื่อ" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">นามสกุล</span>
                                    <input type="text" class="form-control input_new" id="lname" name="lname" placeholder="" aria-label="นามสกุล" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">CID</span>
                                    <input type="text" class="form-control input_new" id="cid" name="cid" placeholder="" aria-label="CID" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">ส่วนสูง</span>
                                    <input type="text" class="form-control input_new" id="hn" name="hn" placeholder="" aria-label="ส่วนสูง" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">น้ำหนัก</span>
                                    <input type="text" class="form-control input_new" id="hn" name="hn" placeholder="" aria-label="น้ำหนัก" aria-describedby="addon-wrapping">
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
            });
    </script>
@endsection
