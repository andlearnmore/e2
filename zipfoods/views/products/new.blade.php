@extends('templates/master')

@section('title')
    New Review
@endsection

@section('content')


    @if ($productSaved)
        <div class='alert alert-success'>Thank you, your product has been added. <a href='/product?sku={{ $sku }}'>
        You can view it here. </a></div>
    @endif
    
    @if ($app->errorsExist())
        <div class='alert alert-danger'>Please correct the errors below.</div>
    @endif


    <form method='POST' id='product-review' action='/products/save-new'>
    
        <h2>Add an Item</h2>
        <div class='info'>All fields are required.</div>

        <div class='form-group'>
            <label for='name'>Name</label>
            <input type='text' class='form-control' name='name' id='name' value='{{ $app->old('name') }}'>
        </div>

        <div class='form-group'>
            <label for='sku'>SKU</label>
            <input type='text' class='form-control' name='sku' id='sku' value='{{ $app->old('sku') }}'>
            <div class='info'>Can only contain numbers, letters, dashes, and/or underscores. </div>
        </div>

        <div class='form-group'>
            <label for='description'>Description</label>
            <input type='text' class='form-control' name='description' id='description' value='{{ $app->old('description') }}'>
        </div>

        <div class='form-group'>
            <label for='price'>Price</label>
            <input type='text' class='form-control' name='price' id='price' value='{{ $app->old('price') }}'>
        </div>

         <div class='form-group'>
            <label for='available'>Available</label>
            <input type='text' class='form-control' name='available' id='available' value='{{ $app->old('available') }}'>
        </div>

        <div class='form-group'>
            <label for='weight'>Weight</label>
            <input type='text' class='form-control' name='weight' id='weight' value='{{ $app->old('weight') }}'>
        </div>

        <div class='form-group'>
            <label for='perishable'>Perishable</label>
            <input type='checkbox' class='checkbox' name='perishable' id='perishable' value='{{ $app->old('perishable') }}'>
        </div>

        <button type='submit' class='btn btn-primary'>Submit Review</button>
    </form>

    @if($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach($app->errors() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <p>
        <a href='/products'>Check out our selection of products...</a>
    </p>
@endsection