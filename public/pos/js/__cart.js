"use strict"

// Add to cart
function ADD_TO_CART(id, getterUri) {
    console.log(id + " " + getterUri);
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
            let table = $('#cart-table');
            // Assuming the response contains a new medicine object
            let newMedicine = data.product;
            // Create a new table row with the medicine data
            let newRow = '<tr>' +
                '<td>' + newMedicine.name + '</td>' +
                '<td>' +
                '<select class="custom-input" name="cart[batch]">\n' +
                '    <option value="">Select Batch</option>\n';

            // Generate the options for the batch select box
            $.each(newMedicine.batch, function (index, batch) {
                newRow += '    <option value="' + batch.id + '">' + batch.name + '</option>\n';
            });

            newRow += '</select>' +
                '</td>' +
                '<td>' + 'newMedicine.expiry_date' + '</td>' +
                '<td>' +
                '<input type="number" class="custom-input" name="cart[quantity]" min="1" value="1">' +
                '</td>' +
                '<td>' +
                '<input type="number" class="custom-input" name="cart[price]" min="0" step="0.01" value="' + newMedicine.price + '">' +
                '</td>' +
                '<td>' +
                '<input type="number" class="custom-input" name="cart[discount]" min="0" max="100" step="1" value="0">' +
                '</td>' +
                '<td class="total-cell">0.00</td>' +
                '</tr>';

            // Append the new row to the table
            $('#cart-table tbody').append(newRow);

            // Calculate and update the total for this row
            updateRowTotal($('.total-cell').last());

            // Add an event listener to the batch select box to update the row total
            $('select[name="cart[batch]"]').last().on('change', function () {
                updateRowTotal($(this).closest('tr').find('.total-cell'));
            });

            // Add an event listener to the quantity and discount input boxes to update the row total
            $('input[name="cart[quantity]"], input[name="cart[discount]"], input[name="cart[price]"]').last().on('input', function () {
                updateRowTotal($(this).closest('tr').find('.total-cell'));
            });

            // Function to update the total for a given row
            function updateRowTotal(totalCell) {
                var quantity = parseInt(totalCell.closest('tr').find('input[name="cart[quantity]"]').val());
                var price = parseFloat(totalCell.closest('tr').find('input[name="cart[price]"]').val());
                var discount = parseFloat(totalCell.closest('tr').find('input[name="cart[discount]"]').val());
                var total = price * quantity * (1 - discount / 100);
                totalCell.text(total.toFixed(2));
            }

            $('.search-result-box').empty().hide();
            $('#search').val('');
        },
        complete: function () {
            $('#loading').hide();
        }
    });
}