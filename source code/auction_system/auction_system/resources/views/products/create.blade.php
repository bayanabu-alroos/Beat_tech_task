@extends('layout.masterdash')

@section('content')

@if(\Illuminate\Support\Facades\Auth::user()->type === 'buyer'  )

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Create Product </h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">

                    <div class="table-responsive p-0">
<div class="container-sm">
                @if ($errors->any())
                <div class="alert alert-danger text-light">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
</div>
<div class="card-body mx-4">
     
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

                <input type="hidden" name="user_id" class="form-control" value="{{ auth()->user()->id }}" placeholder="Name Product">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name Product:</strong>
                <input type="text" name="name_product" class="form-control" placeholder="Name Product">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong>Description Product :</strong>
                <input type="text" class="form-control"  name="description" placeholder="Description Product">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="form-group">
                <strong class="mb-5">Image Product :</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
            </div></div>


            @else

            <div class="wrapper">
                <div class="box">
                <h1>403</h1>
                <p style="font-size: 20px"><b>Sorry, it's not allowed to go beyond this point!</b></p>
                <p><a href="/">Please, go back this way.</a></p>
                </div>
                </div>
            
            @endif
@endsection