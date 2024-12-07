@extends('layouts.app')

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
                            <a href="{{URL('patient_registry')}}" class="ladda-button btn-pill btn btn-sm btn-primary card_audit_4c"> 
                                <img src="{{ asset('images/Addwhite.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                                เพิ่มรายการ
                            </a>   
                            {{-- <button type="button" id="UpdateData" class="ladda-button me-2 btn-pill btn btn-sm btn-success input_new" > 
                                <img src="{{ asset('images/Savewhit.png') }}" class="me-2 ms-2" height="18px" width="18px"> 
                               บันทึก
                           </button> --}}
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

                    


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
