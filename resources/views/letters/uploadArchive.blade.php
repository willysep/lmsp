<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Archive</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/letter/upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="slug" value="{{ $letter->slug }}">
                    <div class="input-group @error('archive') is-invalid @enderror">
                        <div class="custom-file ">
                            <input type="file" class="custom-file-input @error('archive') is-invalid @enderror"
                                id="archive" name="archive" required>
                            <label class="custom-file-label" for="archive">Choose
                                file... pdf, jpg or zip</label>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        @error('archive')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
