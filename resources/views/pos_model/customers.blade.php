<div class="modal fade" id="addcustomer">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Coustomer Detail </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('customer.create') }}" method="post" class="need-validation">
                    @csrf
                    <div class="row g-1 align-items-center">
                        <div class="form-group">
                            <label><strong>Name </strong><small class="text-danger">*</small></label>
                            <input type="text" class="form-control " name="name" required  value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label><strong>Phone Number </strong></label>
                            <input type="number" class="form-control" name="number" minlength="10" value="{{ old('number') }}"
                                maxlength="10">
                        </div>
                        <div class="form-group">
                            <label><strong>Email </strong></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        </div>
                        <div class="form-group">
                            <label><strong>Tax Number </strong></label>
                            <input type="text" class="form-control" name="taxnumber" value="{{ old('taxnumber') }}">
                        </div>
                        <div class="form-group">
                            <label><strong>Address </strong></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-sm  btn-primary">Save </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>