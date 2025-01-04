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
                            @foreach ($users as $item)
                                
                            @endforeach
                            <select name="hn" id="hn" class="form-control province" style="width: 100%">
                                @foreach ($users as $item2)
                                {{-- @if ($chwpart == $item_prov->name)
                                <option value="{{$item_prov->chwpart}}" selected>{{$item_prov->name}}</option>
                                @else --}}
                                <option value="{{$item2->id}}">{{$item2->fname}}  {{$item2->lname}}</option>
                                {{-- @endif   --}}
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
                                    <span class="input-group-text" id="addon-wrapping">หมู่บ้าน</span>
                                    <input type="text" class="form-control input_new" id="ban_name" name="ban_name" placeholder="" aria-label="หมู่บ้าน" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">หมู่บ้าน</span>
                                    <input type="text" class="form-control input_new" id="ban_name" name="ban_name" placeholder="" aria-label="หมู่บ้าน" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">หมู่บ้าน</span>
                                    <input type="text" class="form-control input_new" id="ban_name" name="ban_name" placeholder="" aria-label="หมู่บ้าน" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">หมู่บ้าน</span>
                                    <input type="text" class="form-control input_new" id="ban_name" name="ban_name" placeholder="" aria-label="หมู่บ้าน" aria-describedby="addon-wrapping">
                                </div>
                            </div>
                        </div>


 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
