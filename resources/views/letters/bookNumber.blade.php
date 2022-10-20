<div class="modal fade" id="bookModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Please fill the booking form first</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/letter') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="letterType">Letter Type</label>
                        <select class="form-control @error('letterType') is-invalid @enderror" name="letterType"
                            id="letterType">
                            @foreach ($letterTypes as $letterType)
                                <option 
                                    value="{{ $letterType->typeCode }}"
                                    @if ($letterType->typeCode != old('letterType')) 
                                        @if ($letterType->typeCode == $chosenType->typeCode) selected @endif
                                    @else selected @endif
                                    >{{ $letterType->typeName }} </option>
                            @endforeach
                        </select>
                        <div id="letterTypeFeedback" class="invalid-feedback">
                            @error('letterType')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject"
                            id="subject" placeholder="please input Subject" value="{{ old('subject') }}">
                        <div id="subjectFeedback" class="invalid-feedback">
                            @error('subject')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="recipient">Recipient</label>
                        <input type="text" class="form-control @error('recipient') is-invalid @enderror"
                            name="recipient" id="recipient" placeholder="please input Recipient"
                            value="{{ old('recipient') }}">
                        <div id="recipientFeedback" class="invalid-feedback">
                            @error('recipient')
                                {{ $message }}
                            @enderror
                        </div>
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
