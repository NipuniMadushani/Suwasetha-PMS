@extends('layouts.app')
@section('title', __('pages.new_purchase'))

@section('custom-css')
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/vendors/css/forms/select/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/plugins/forms/pickers/form-flat-pickr.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('dashboard/app-assets/css/pages/app-invoice.css') }}">
@endsection
@section('content')
  <section id="basic-horizontal-layouts">
      <section id="multiple-column-form">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">{{ __('pages.new_purchase') }}</h4>
                  </div>
                  <div class="card-body">
                      @if($sup_id != 0)
                      <form class="form" method="POST" action="{{ route('purchase.new', $sup_id) }}" id="formOne">
                      @else
                      <form class="form" method="POST" id="formOne">
                          @endif
                            @csrf
                          <div class="row">
                            <div class="col-md-6 col-12">
                              <div class="mb-1">
                                <label class="form-label" for="first-name-column">{{ __('pages.name') }}</label>
                                <select class="form-select" name="supplier_id" id="filter_type" onchange="get_medicine(this.value)">
                                    <option value="">{{ __('pages.choose_supplier') }}</option>
                                      @foreach($supplier as $suppliers)
                                      <option value="{{$suppliers->id}}" @if($sup_id == $suppliers->id) selected @endif>{{$suppliers->name}}</option>
                                      @endforeach
                                </select>  
                              </div>
                            </div>
                            <div class="col-md-6 col-12">
                              <div class="mb-1">
                                <label class="form-label" for="last-name-column">{{ __('pages.date') }}</label>
                                <input type="date" id="last-name-column" class="form-control invoice-edit-input date-picker" placeholder="{{ __('pages.date') }}" name="date" required>
                              </div>
                            </div>
                          </div>
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                      <div class="repeater">
                         <div class="items" data-group="medicine">
                            <div class="item-content">
                              
                              
                              
                              <div class="row">
                                <div class="col-md-4 col-12">
                                  <div class="mb-1">
                                    <label class="form-label" for="itemname">{{ __('pages.medicine') }}</label>
                                      <select class="select2 form-select" name="medicine_id" data-name="medicine_id" required>
                                        <option value="">{{ __('pages.select_medicine') }}</option>    
                                        @foreach($medicine as $medicines)
                                        <option value="{{$medicines->id}}">{{$medicines->name}} ({{$medicines->strength}})</option>
                                        @endforeach
                                      </select>
                                  </div>
                                </div>
                                <div class="col-md-2 col-12">
                                  <div class="mb-1">
                                    <label class="form-label" for="batch_no">{{ __('pages.batch_no') }}</label>
                                      <input type="text" class="form-control" placeholder="{{ __('pages.batch_no') }}"  name="batch_no" data-name="batch_no" required>
                                  </div>
                                </div>
                                <div class="col-md-2 col-12">
                                  <div class="mb-1">
                                    <label class="form-label" for="expiry_date">{{ __('pages.expiry_date') }}</label>
                                    <input type="date" class="form-control" placeholder="{{ __('pages.expiry_date') }}"  name="expiry_date"  data-name="expiry_date" required>
                                  </div>
                                </div>
                              <div class="col-md-2 col-12">
                                  <div class="mb-1">
                                    <label class="form-label" for="itemname">{{ __('Leaf Type') }}</label>
                                    <select class="select2 form-select" name="leaf_id" data-name="leaf_id" required>
                                      <option value="">{{ __('Select Leaf Type') }}</option>    
                                      @foreach($leaf as $medicines)
                                      <option value="{{$medicines->id}}">{{$medicines->name}} ({{$medicines->amount}} Unit)</option>
                                      @endforeach
                                    </select>
                                  </div>
                                </div>
                              <div class="col-md-2 col-12">
                                <div class="mb-1">
                                  <label class="form-label" for="expiry_date">{{ __('Leaf Qty') }}</label>
                                  <input type="number" class="form-control" placeholder="{{ __('Leaf Qty') }}"  name="box_qty" data-name="box_qty"  required>
                                </div>
                              </div>
                              <div class="col-md-2 col-12">
                                  <div class="mb-1">
                                      <label class="form-label" for="expiry_date">{{ __('pages.buy_price') }}</label>
                                      <input type="number" step="0.01" class="form-control" placeholder="{{ __('pages.buy_price') }}"  name="bprice" data-name="bprice" required>
                                  </div>
                              </div>
                              <div class="col-md-2 col-12">
                                  <div class="mb-1">
                                      <label class="form-label" for="expiry_date">{{ translate('MRP Per Unit') }}</label>
                                      <input type="number" step="0.01" class="form-control" placeholder="{{ translate('MRP Per Unit') }}"  name="mrp" data-name="mrp" required>
                                  </div>
                              </div>
                              <div class="col-md-2 col-12 mb-50">
                                <div class="mb-1">
                                  <button class="btn btn-outline-danger text-nowrap px-1 remove_button remove-btn" type="button">
                                    <i data-feather="x" class="me-25"></i>
                                    <span>{{ __('pages.delete') }}</span>
                                  </button>
                                </div>
                              </div>   
                              
                              
                              
                              
                              
                              
                            </div>
                            
                            
                            
                            <hr />
                          </div>
                        </div>
                        
                        
                        
                         <div class="clearfix"></div>
                         
                          <div class="row">
                          <div class="col-12">
                            <button class="btn btn-icon btn-primary mb-3 add_button repeater-add-btn" type="button">
                              <i data-feather="plus" class="me-25"></i>
                              <span>{{ __('pages.add_new') }}</span>
                            </button>
                          </div>
                        </div>
                        </div>  
                        
                        
                        
                        
                      <div class="row">
                          <div class="col-12">
                              <div class="card">
                                <div class="card-body invoice-padding">
                                    <div class="row invoice-sales-total-wrapper">
                                      <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                        <div class="d-flex align-items-center mb-1">
                                          <label for="salesperson" class="form-label">{{ __('pages.payment_method') }}:</label>
                                          <select class="select2 form-select" id="show_medicine" name="method_id">
                                              @foreach($method as $leaves)
                                                        <option value="{{$leaves->id}}">{{$leaves->name}} ({{$leaves->balance}})</option>
                                              @endforeach
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-md-6 d-flex order-md-2 order-1">
                                        <div class="invoice-total-wrapper">
                                          <label>
                                              {{ __('pages.total') }}
                                          </label>
                                          <input type="textbox" placeholder="Total Amount" name="total" class="form-control" id="totaldbt" value="0" readonly>
                                          <span class="error"></span>
                                          <div class="invoice-total-item">
                                              <div class="form-group">
                                                  <label>{{ __('pages.total_paid') }}</label>
                                                  <input type="number" placeholder="Paid Now" name="paid" class="form-control" step="0.01" value="0" id="pvlpaid">
                                                  <span class="error"></span>
                                              </div>
                                          </div>
                                          <div class="invoice-total-item"></div>
                                          <hr class="my-50">
                                          <div class="invoice-total-item">
                                              <div class="form-group">
                                                <label>{{ __('pages.total_due') }}</label>
                                                <input type="number" placeholder="Due" name="due" class="form-control" step="0.01" value="0" id="totaldue" readonly>
                                                <span class="error"></span>
                                              </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                          <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">{{ __('pages.submit') }}</button>
                          <button type="reset" class="btn btn-outline-secondary waves-effect">{{ __('pages.reset') }}</button>
                      </div>
                  
                  </form>
                 
                </div>
              </div>
            </div>
          </div>
          
      </section>
  </section>
@endsection



@section('custom-js')
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('dashboard/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.js"></script>
<script type="text/javascript">

jQuery.fn.extend({
    createRepeater: function (options = {}) {
        var hasOption = function (optionKey) {
            return options.hasOwnProperty(optionKey);
        };

        var option = function (optionKey) {
            return options[optionKey];
        };

        var generateId = function (string) {
            return string
                .replace(/\[/g, '_')
                .replace(/\]/g, '')
                .toLowerCase();
        };

        var addItem = function (items, key, fresh = true) {
            var itemContent = items;
            var group = itemContent.data("group");
            var item = itemContent;
            var input = item.find('input,select,textarea');

            input.each(function (index, el) {
                var attrName = $(el).data('name');
                var skipName = $(el).data('skip-name');
                if (skipName != true) {
                    $(el).attr("name", group + "[" + key + "]" + "[" + attrName + "]");
                } else {
                    if (attrName != 'undefined') {
                        $(el).attr("name", attrName);
                    }
                }
                if (fresh == true) {
                    $(el).attr('value', '');
                }

                $(el).attr('id', generateId($(el).attr('name')));
                $(el).parent().find('label').attr('for', generateId($(el).attr('name')));
            })

            var itemClone = items;

            /* Handling remove btn */
            var removeButton = itemClone.find('.remove-btn');

            if (key == 0) {
                removeButton.attr('disabled', true);
            } else {
                removeButton.attr('disabled', false);
            }

            removeButton.attr('onclick', '$(this).parents(\'.items\').remove()');



            var newItem = $("<div class='items'>" + itemClone.html() + "<div/>");
            newItem.attr('data-index', key)

            newItem.appendTo(repeater);
        };

        /* find elements */
        var repeater = this;
        var items = repeater.find(".items");
        var key = 0;
        var addButton = repeater.find('.repeater-add-btn');

        items.each(function (index, item) {
            items.remove();
            if (hasOption('showFirstItemToDefault') && option('showFirstItemToDefault') == true) {
                addItem($(item), key);
                key++;
            } else {
                if (items.length > 1) {
                    addItem($(item), key);
                    key++;
                }
            }
        });


        /* handle click and add items */
        addButton.on("click", function () {
            addItem($(items[0]), key);
            key++;
        });
    }
});

  $(document).ready(function () {
     $(".repeater").createRepeater({
            showFirstItemToDefault: true,
           
        });
  });
</script>

<script>





  function evaluateTotal() {
    
  var total = 0;
  $('[data-name="bprice"]').each(function(_i, e) {
    var val = parseFloat(e.value);
    if (!isNaN(val))
      total += val;
  });
  
$('#totaldbt').val(total);

var pvlpaid = $("#pvlpaid").val();

  

var duetotal = (total-pvlpaid); 
$('#totaldue').val(duetotal);

}

$('body').on('change', '[data-name="bprice"]', function() {
  evaluateTotal();
  
});


$('body').on('change', '#pvlpaid', function() {
  evaluateTotal();
  
});

function get_medicine(id){
var  url = '{{route("purchase.new", ":id")}}';
url = url.replace(':id',id);
location.href = url;
      
}  	 
/* total */
$(document).ready(function() {
$('.form-select').select2();
});
</script>
@endsection
