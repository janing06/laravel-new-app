<div>
    {{-- modal --}}
    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="{{ $modalId }}" tabindex="-1"
        role="dialog" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                @if ($type === 'delete')
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Confirmation</h5>
                        <span class="pull-right">
                            <img class="spinner" src="{{ asset('assets/img/spinner.gif') }}">
                        </span>
                    </div>
                    <div class="modal-body">
                        <p>Delete {{ $label }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="close-button" data-bs-dismiss="modal" class="btn btn-outline-secondary"><i
                                class="far fa-window-close"></i> Close </button>
                        <button id="{{ $buttonId }}" class="btn btn-outline-danger"><i class="far fa-trash-alt"></i>
                            Delete </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
