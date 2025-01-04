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
                    {{ __('One Stop Service') }}

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
