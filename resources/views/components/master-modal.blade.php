<div wire:ignore.self class="modal fade" id="{{ $modalId }}" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">{{ $modalTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="{{ $functionName }}">
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary waves-effect" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                        <x-loading-state buttonName="Submit" target="{{ $functionName }}" />
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
