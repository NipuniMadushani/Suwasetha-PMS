"use strict"

// Add to cart
function ADD_TO_CART(id, getterUri) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    // Get product by id
    $.post({
        url: getterUri,
        data: {product_id: id},
        beforeSend: function () {
            $('#loading').show();
        },
        success: function (data) {
            toastr.success('Product has been added!', {
                CloseButton: true,
                ProgressBar: true
            });
            $('#cart').empty().html(data.view);
            //updateCart();
            $('.search-result-box').empty().hide();
            $('#search').val('');
            watch();
            playMusic();
        },
        complete: function () {
            $('#loading').hide();
        }
    });
}

// Remove item from cart
function REMOVE_FROM_CART(productId, getterURI) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    // Get product by id
    $.post({
        url: getterURI,
        data: {product_id: productId},
        success: function (data) {
            toastr.success('Item has been removed!', {
                CloseButton: true,
                ProgressBar: true
            });
            $('#cart').empty().html(data.view);
            watch();
        },

    });
}

// Get bacth info and update price and expire date
function setBatch(batch_id, cart_id, setterURI) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    if (batch_id) {
        $.post({
            url: setterURI,
            data: {batch_id: batch_id, cart: cart_id},
            success: function (res) {
                if (res.success) {
                    toastr.success(res.message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                    $('#cart').empty().html(res.view);
                }
                if (res.error) {
                    toastr.error(res.message, {
                        CloseButton: true,
                        ProgressBar: true
                    });
                }
                watch();
            },
        });
    }
}

// Update quantity
function quantityUpdate(id, setterURI) {
    $.post({
        url: setterURI,
        data: {product_id: id},
        beforeSend: function () {
            $('#loading').show();
        },
        success: function (data) {
            if (data.success) {
                toastr.success('Item quantity updated!', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
            $('#cart').empty().html(data.view);
            watch();
        },
        complete: function () {
            $('#loading').hide();
        }
    });
}


/***************************************
 * Cart Calculations
 *******************************************/
// Calculate Product dicount
function setProductDiscount(value, productId, setterURI) {
    $.post({
        url: setterURI,
        data: {product_id: productId, discount_amount: value},
        success: function (data) {
            if (data.success) {
                toastr.success('Discount has been added!', {
                    CloseButton: true,
                    ProgressBar: true
                });
            }
            $('#cart').empty().html(data.view);
            watch();
        },
    });
}

// Calculate set invoice discount
function setInvoiceDiscount(amount) {
    let subTotalField = $('#subtotal');
    let totalDiscountField = $('#total_discount_ammount');
    const subtotal = subTotalField.data('subtotal');
    const discountAmount = totalDiscountField.data('totalamount');
    const inputAmount = amount ? amount : 0;
    const invoiceDiscountAmount = (subtotal * inputAmount / 100);
    const total_amount = (parseFloat(discountAmount) + parseFloat(invoiceDiscountAmount));
    totalDiscountField.val(amountFormatted(parseFloat(total_amount)))
    calculateGrandTotal();
}


// Calculate grand total
function calculateGrandTotal() {
    const invoiceDiscountAmount = $('#total_discount_ammount').val();
    let subTotalField = $('#grandTotal');
    let subtotal = $('#subtotal').val();
    const inputAmount = subTotalField.data('grandtotal');

    const invoiceDiscountedAmount = (parseFloat(inputAmount) - parseFloat(invoiceDiscountAmount));

    let taxInputAmount =  $('#tax_amount').val();
    const vat =  $('#vat').val();
    const tax = subtotal * taxInputAmount / 100;
    const igta_amount =  $('#igta_amount').val();
    const totatVatTax = (parseFloat(vat)+parseFloat(tax)+parseFloat(igta_amount));

    const total = invoiceDiscountedAmount + parseFloat(totatVatTax);
    subTotalField.val(amountFormatted(total))
    $('#net_total_text').text(amountFormatted(total))
    $('#n_total').val(amountFormatted(total))
    setDueAmount();
}



function invoice_paidamount(amount) {
    let netTotalAmount = $('#n_total').val();
    const inputAmount = amount ? amount : 0;
    let dueAmount = (netTotalAmount - inputAmount);
    let totalDueAmount = 0.00
    let totalChangeAmount = 0.00
    if (dueAmount > 0) {
        totalDueAmount = dueAmount;
    } else {
        totalChangeAmount = dueAmount;
    }
    setDueAmount();
    $("#recieved_amount").val(inputAmount);
    $("#change").val(Math.abs(amountFormatted(totalChangeAmount)));
}

function fullPaid() {
    let netTotalAmount = $('#n_total').val();
    $('#paidAmount').val(netTotalAmount);
    $("#recieved_amount").val(netTotalAmount);
    setDueAmount();
}

function setNetPayAmount() {
    let subTotalField = $('#grandTotal');
    let payableAmount = subTotalField.data('grandtotal');
    $('#net_total_text').text(amountFormatted(payableAmount))
    $('#n_total').val(amountFormatted(payableAmount))
}


function setDueAmount() {
    let netTotalAmount = $('#n_total').val();
    const totalDue = (netTotalAmount - $('#paidAmount').val());
    let totalDueAmount = 0.00
    if (totalDue > 0){
        totalDueAmount = totalDue;
    }
    $('#due_amount').val(amountFormatted(totalDueAmount));
    $('#due_text').text(amountFormatted(totalDueAmount));
}

function amountFormatted(amount) {
    return amount.toFixed(2)
}


// Place Order
function placeOrder(pay_with)
{
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    let action  = $("#placeOrder").attr('action');
    const paid_amount = $('#paidAmount').val();
    const sub_total = $('#subtotal').val();
    let payment_method = pay_with;
    if (pay_with == 'mfs'){
        payment_method = $('#payment_method').val()
    }
    if (sub_total < 1){
        showError('Please select product and batch')
        return false;
    }
    if (paid_amount == 0){
        showError('Please enter paid amount!');
        return false;
    }
    if (!payment_method){
        showError('Please select payment method!');
        return false;
    }

    let data = {
        customer_id: $('#customer').val(),
        payment_method: payment_method,
        sub_total: sub_total,
        invoice_discount: $('#invoice_discount').val(),
        total_discount: $('#total_discount_ammount').val(),
        vat: $('#vat').val(),
        tax: $('#tax_amount').val(),
        igta: $('#igta_amount').val(),
        grand_total: $('#grandTotal').val(),
        paid_amount: paid_amount,
        due_amount: $("#due_amount").val(),
        recieve_amount: $("#recieved_amount").val(),
        change_amount: $("#change").val(),
    }
    $.post({
        url: action,
        data: data,
        success: function (res) {
            if (res.error){
                showError(res.message);
            }
            if (res.success) {
                toastr.success(res.message, {
                    CloseButton: true,
                    ProgressBar: true
                });
                Swal.fire({
                    title: 'Order has been placed successfully!',
                    type: 'success',
                    showCancelButton: true,
                    cancelButtonColor: '#e01313',
                    confirmButtonColor: '#161853',
                    cancelButtonText: 'Cancel',
                    confirmButtonText: 'Print Invoice',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        window.location.href = res.redirect_url;
                    } else {
                        window.location.reload()
                    }
                })
            }

        },
    });
}

function watch(){
    setNetPayAmount();
    setDueAmount();
}

function init(){
    fullPaid();
    invoice_paidamount();
    calculateGrandTotal();
    watch();
}
$(document).ready(function (){
    init();
})
function showError(message){
    toastr.error(message, {
        CloseButton: true,
        ProgressBar: true
    });
}
function playMusic() {
    var audio = document.getElementById("audio");
    audio.play();
}