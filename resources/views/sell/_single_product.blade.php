<div class="product-card card pvl26" onclick="quickView('{{$product->id}}')" >
    <div class="card-header inline_product clickable p-0 pvl27">
        <div class="d-flex align-items-center justify-content-center d-block">
            <img src="{{asset('storage/images/medicine/'.$product['image'].'')}}" class="pvl28">
        </div>
    </div>

    <div class="card-body inline_product text-center p-1 clickable pvl29">
        <div class="product-title1 text-dark font-weight-bold pvl30">
            {{ Str::limit($product['name'], 13) }} ({{ Str::limit($product['strength'], 13) }})
        </div>
       
    </div>
</div>
