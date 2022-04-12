<script>
    function processOrderStatus() {
        // Define Variable
        var status = $('.status:checked').val();
        var orderId = $('#modal-order-id').val();
        var url = $('#update-order-status-url').val();

        $.ajax({
            url: url,
            type: 'PUT',
            data: {
                '_token': '{{ csrf_token() }}',
                'status': status
            },
            success: function (data) {
                // Update Class Name
                var selector = $('.tr-order-' + orderId);
                var selectorStatus = selector.find('.lbl-order-status div');

                // Remove All Class
                selectorStatus.removeClass();

                // Process Status
                switch (status) {
                    case '0':
                        selectorStatus.addClass('text-primary');
                        break;
                    case '1':
                        selectorStatus.addClass('text-secondary');
                        break;
                    case '2':
                        selectorStatus.addClass('text-info');
                        break;
                    case '3':
                        selectorStatus.addClass('text-danger');
                        break;
                    case '4':
                        selectorStatus.addClass('text-success');
                        break;
                    default:
                        break;
                }

                // Update Value for DOM
                selector.data('status', status);
                selectorStatus.text(data.status_name);

                // Check value of STATUS
                var statusArr = ['3', '4'];
                if (statusArr.indexOf(status) != -1) { // Found OK
                    selector.find('.btn-update-order-status').prop('disabled', true);
                    selector.find('.btn-delete').prop('disabled', true);
                }

                // Show Messsage Success
                alert(data.message);

                // Hide Modal
                $('#modal-update-order-status').modal('hide');
            },
            error: function (err) {
                // Show Messsage Error
                alert(error.error_message);
            },
            dataType: 'json'
        });
    }
</script>
