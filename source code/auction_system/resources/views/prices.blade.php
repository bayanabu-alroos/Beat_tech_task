@extends('layout.masterdash')

@section('content')

@if(\Illuminate\Support\Facades\Auth::user()->type === 'buyer'  )
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Price Offers table</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
     

            <div class="table-responsive p-3">
              
            <div class="container-sm">
              @if ($message = Session::get('success'))
              <div class="alert alert-success text-light">
                  <p>{{ $message }}</p>
              </div>
              @endif
              </div>
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase  font-weight-bolder ">#</th>
                    <th class="text-uppercase  font-weight-bolder ">Image Product</th>
                    <th class="text-uppercase  font-weight-bolderps-2">Name Product </th>
                    <th class="text-center text-uppercase  font-weight-bolder ">Name User</th>
                    <th class="text-center text-uppercase  font-weight-bolder ">Price </th>
                    <th class="text-center text-uppercase  font-weight-bolder ">Time Create Price </th>


                  </tr>
                </thead>
                @foreach ($prices as $price)
                

                <tbody>

                  <tr>
                    <td>{{ ++$i }} </td>
                    <td>
                        <img src="/images/{{ $price->image }}" class="me-3 border-radius-lg"  width="100px" alt="user1">

                    </td>
                    <td>
                        {{ $price->name_product}}
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $price->name}}	
                    </td>
                    <td class="align-middle text-center text-sm">
                        {{ $price->price}}	
                    </td>

                    <td class="align-middle text-center text-sm">
                        {{ $price->created_at}}
                    </td>

                    {{-- <td class="align-middle text-center text-sm">
                        <form action="" method="POST"> --}}
                      {{-- <a href="{{ route('products.edit',$product->id) }}" class="btn btn-warning font-weight-bold text-xs mx-3" data-toggle="tooltip" data-original-title="Edit user">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                          </svg>
                      </a> --}}
                      {{-- @csrf
                      @method('DELETE')
                      <button href="javascript:;" class="btn btn-danger font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">

                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                      </button>
                        </form> --}}
                    {{-- </td> --}}
                  </tr>
                 
                </tbody>
       
                @endforeach
              </table>
            </div>
           
          </div>
        </div>
      </div>
    </div>
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