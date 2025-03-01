<div class="modal fade" id="service_type_{{ $service['id'] }}">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $service['name'] }} Service Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="pos_servicetypeselect">
                @foreach ($service['addons'] as $addon)
                    <div class="form-check">
                        <label>{{ $addon['name'] }} ({{ $addon['price'] .' '. auth()->user()->settings->currency }})</label>
                        <input class="form-check-input mr-2" type="radio" name="servicetype" value="{{ $addon['id'] }}"
                            required="">
                    </div>
                @endforeach
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" value="submit" id="add_service_pos_cart_submit" data-id="{{ $service['id'] }}"
                    class="btn btn-sm  btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
