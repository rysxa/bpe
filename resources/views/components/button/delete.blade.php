<button type="button" class="btn icon-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $id }}">
    <i class="fa fa-trash-o"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Delete
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data?
            </div>
            <div class="modal-footer" style="border: none;">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">No</button>
                <a href="{{ $url }}" class="btn btn-gradient-primary me-2">Yes</a>
            </div>
        </div>
    </div>
</div>
