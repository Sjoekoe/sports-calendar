@extends('layouts.app')

@section('title', 'Main page')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center m-t-lg">
                    <checkout-form :products="{{ $products }}"></checkout-form>
                </div>
            </div>
        </div>
    </div>
@endsection
