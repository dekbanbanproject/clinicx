@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card_prs_4">
                <div class="card-header">
                     
                    <div class="row"> 
                
                        <div class="col-md-8">
                            <h4 style="color:rgb(247, 103, 68)">เพิ่มรายชื่อคนไข้</h4> 
                        </div> 
                                                
                        <div class="col-md-4 text-end">  
                           
                            <button type="button" id="UpdateData" class="ladda-button me-2 btn-pill btn btn-sm btn-success input_new" > 
                                <img src="{{ asset('images/Savewhit.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                               บันทึก
                           </button>
                           <a href="{{url('wh_pay')}}" class="ladda-button me-2 btn-pill btn btn-sm btn-danger input_new"> 
                             <img src="{{ asset('images/back.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                             ยกเลิก
                            </a>
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
                        <div class="col-md-1"> คำนำหน้า </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-1">
                            ชื่อ
                        </div>
                        <div class="col-md-3">
                            <input type="text" id="fname" name="fname" >
                        </div>
                        <div class="col-md-1">
                            นามสกุล
                        </div>
                        <div class="col-md-3">

                        </div>                         
                    </div>
                    


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
