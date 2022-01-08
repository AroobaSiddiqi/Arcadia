@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ALL PRODUCTS</div>

                <div class="card-body">

<p>Your order has been confirmed! </p>
<a href="{{ url('allProducts') }}">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

