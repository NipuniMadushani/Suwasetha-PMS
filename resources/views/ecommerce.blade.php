@extends('layouts.dcom')
@section('title', __('pages.supplier_list'))



@section('content')
   <div class="app-content content ecommerce-application">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper container-xxl p-0">
        
        <div class="">
          <div class="content-body"><!-- E-commerce Content Section Starts -->
<section id="ecommerce-header">
  <div class="row">
    <div class="col-md-12">
      <div class="ecommerce-header-items">
        <div class="result-toggler">
          <button class="navbar-toggler shop-sidebar-toggler" type="button" data-bs-toggle="collapse">
            <span class="navbar-toggler-icon d-block d-lg-none"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></span>
          </button>
          @if($medicine->total() > 0)
          <div class="search-results">{{$medicine->total()}} results found</div>
          @endif
        </div>
        <div class="view-options d-flex">
          
          <div class="btn-group" role="group">
            <input type="radio" class="btn-check" name="radio_options" id="radio_option1" autocomplete="off" checked="">
            <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn waves-effect active" for="radio_option1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid font-medium-3"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg></label>
            <input type="radio" class="btn-check" name="radio_options" id="radio_option2" autocomplete="off">
            <label class="btn btn-icon btn-outline-primary view-btn list-view-btn waves-effect" for="radio_option2"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list font-medium-3"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg></label>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- E-commerce Content Section Starts -->

<!-- background Overlay when sidebar is shown  starts-->
<div class="body-content-overlay"></div>
<!-- background Overlay when sidebar is shown  ends-->

<!-- E-commerce Search Bar Starts -->
<section id="ecommerce-searchbar" class="ecommerce-searchbar">
  <div class="row">
    <form>
    <div class="col-sm-8">
      <div class="input-group input-group-merge">
        <input type="text" name="shop" @if(!empty(request()->get('q'))) value="{{ request()->get('q') }}" @endif class="form-control search-product" id="shop-search" placeholder="@if(!empty(request()->get('q'))) {{ request()->get('q') }} @else Search Shop Name @endif" aria-label="Search..." aria-describedby="shop-search">
        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search text-muted"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span>
      </div>
    </div>
    
    
    <div class="col-sm-4">
        <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
    </div>
    </form>
    
  </div>
 
</section>
<!-- E-commerce Search Bar Ends -->

<!-- E-commerce Products Starts -->
<section id="ecommerce-products" class="grid-view">
    
    
    
    
@if($medicine->total() > 0)
@foreach($medicine as $medicines)
  <div class="card ecommerce-card">
    <div class="item-img text-center">
      <a href="app-ecommerce-details.html">
        <img class="img-fluid card-img-top" src="{{ asset('storage/images/medicine/'.$medicines->image.'') }}" alt="img-placeholder"></a>
    </div>
    <div class="card-body">
      <div class="item-wrapper">

        <div>
          <h6 class="item-price">৳ {{$medicines->price}}</h6>
        </div>
      </div>
      <h6 class="item-name">
        <a class="text-body">{{$medicines->name}}</a>
        <span class="card-text item-company">By <a href="#" class="company-name">{{$medicines->supplier->name}}</a></span>
      </h6>
     
    </div>
    <div class="item-options text-center">
      <div class="item-wrapper">
        <div class="item-cost">
          <h4 class="item-price">৳ {{$medicines->price}}</h4>
        </div>
      </div>
      
      <a href="{{ route('invoice.cart', ['id' => $medicines->id, 'shop' => $shop->id]) }}" class="btn btn-primary waves-effect waves-float waves-light">
        <span class="add-to-cart">Add to cart</span>
      </a>
    </div>
  </div>
  @endforeach
  @endif
  
  
  
  
</section>
<!-- E-commerce Products Ends -->

<!-- E-commerce Pagination Starts -->
<section id="ecommerce-pagination">
  <div class="row">
    <div class="col-sm-12">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center mt-2">
          <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item" aria-current="page"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item"><a class="page-link" href="#">6</a></li>
          <li class="page-item"><a class="page-link" href="#">7</a></li>
          <li class="page-item next-item"><a class="page-link" href="#"></a></li>
        </ul>
      </nav>
    </div>
  </div>
</section>
<!-- E-commerce Pagination Ends -->

          </div>
        </div>
        
      </div>
    </div>
   
   
   <div class="sidenav-overlay" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
   <div class="drag-target" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
   
   @endsection
   
 