<div class="modal fade" id="addons">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Addons</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row" id="POS_addons">

                    @foreach ($data['addons'] as $addon)
                        <div class="col-6 d-flex mb-3">
                            <div class="mx-3">
                                <input class="form-check-input mt-3" type="checkbox" id="update_customer_read"
                                    name="addon" value="2">
                            </div>
                            <div class="d-flex flex-column justify-content-between">
                                <h5>{{ $addon->name }}</h5>
                                <h6 class="symbol">{{ auth()->user()->settings->currency }} {{ $addon->price }}</h6>
                            </div>
                        </div>
                    @endforeach

                    @if ($data['addons']->count() == 0)
                        <h3 class="text-center">No addons found</h3>
                    @endif

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
</div>
