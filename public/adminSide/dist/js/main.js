
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/*upload*/
// $('#file').change(function () {
//     const form = new FormData;
//     form.append('file', $(this)[0].files[0]);
//     $.ajax({

//         processData: false,
//         contentType: false,
//         type: 'POST',
//         dataType: 'JSON',
//         data: form,
//         url: '/admin/upload-thumnail',
//         success: function (result) {
//             console.log(result);
//         }
//     });
// });


function deleteRow(id,url) {
    // var url = $(that).closest('.frm-product-delete').attr('action');
    // var token = $(that).closest('.frm-product-delete').find('input[name="_token"]').val();


    if (confirm('Bạn có chắn chắn xóa không')) {
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            data: {
                id
            },
            url: url,
            success: function (result) {
                $("#sid" + id).remove();

                // $(that).closest('tr').remove();
                if (result.error == false) {
                    alert(result.message);
                }
                else {
                    alert('Xóa không thành công')
                }
            }
        })
    }
}
function modalOrderStatus(that, url) {
    // Reset Value for Modal
    resetOrderStatus();

    // Get Value for Variable
    var selector = $(that).closest('tr');
    var orderId = selector.data('order-id');
    var fullName = selector.data('full-name');
    var totalQuantity = selector.data('total-quantity');
    var totalMoney = selector.data('total-money');
    var status = selector.data('status');

    // Set Value for Modal
    $('#modal-fullname').val(fullName);
    $('#modal-total-quantity').val(totalQuantity);
    $('#modal-total-money').val(totalMoney);
    $('.status[value="'+ status +'"]').prop('checked', true);
    $('#modal-order-id').val(orderId);
    $('#update-order-status-url').val(url);

    // Display Modal
    $('#modal-update-order-status').modal('toggle');
}
function resetOrderStatus() {
    // Set Default Value for Modal
    $('#modal-fullname').val('');
    $('#modal-total-quantity').val('');
    $('#modal-money').val('');
    $('#modal-order-id').val('');
    $('#update-order-status-url').val('');
}



