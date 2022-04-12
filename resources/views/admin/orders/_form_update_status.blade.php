<div class="modal" id="modal-update-order-status" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Infomation</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="mb-2">
                    <label for="">Name</label>
                    <input type="text" id="modal-fullname" disabled class="form-control">
                    <input type="hidden" id="modal-order-id">
                    <input type="hidden" id="update-order-status-url">
                 </div>

                 <div class="row">
                    <div class="col-md-6">
                       <div class="mb-2">
                          <label for="">Total Quantity</label>
                          <input type="text" id="modal-total-quantity" disabled class="form-control">
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="mb-2">
                          <label for="">Total Money</label>
                          <input type="text" id="modal-total-money" disabled class="form-control">
                       </div>
                    </div>
                 </div>

                 <div class="mb-2">
                    <label for="">Status</label>
                    <div class="border p-2">
                       <ul class="list-unstyled">
                          <li>
                             <input type="radio" name="status" class="status" id="modal-status-0" value="{{ \App\Models\Order::STATUS[0] }}">
                             <label for="modal-status-0">Payment unpaid</label>
                          </li>
                          <li>
                             <input type="radio" name="status" class="status" id="modal-status-1" value="{{ \App\Models\Order::STATUS[1] }}">
                             <label for="modal-status-1">Payment online</label>
                          </li>
                          <li>
                             <input type="radio" name="status" class="status" id="modal-status-2" value="{{ \App\Models\Order::STATUS[2] }}">
                             <label for="modal-status-2">Shipping</label>
                          </li>
                          <li>
                             <input type="radio" name="status" class="status" id="modal-status-3" value="{{ \App\Models\Order::STATUS[3] }}">
                             <label for="modal-status-3">Cancel</label>
                          </li>
                          <li>
                             <input type="radio" name="status" class="status" id="modal-status-4" value="{{ \App\Models\Order::STATUS[4] }}">
                             <label for="modal-status-4">Complete</label>
                          </li>
                       </ul>
                    </div>
                 </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-primary" onclick="processOrderStatus()"><i class="fas fa-user-cog"></i> Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>
