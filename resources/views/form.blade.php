@include('header')

<div class="page page-center">
    <div class="container container-tight py-4">
        <form method="POST" class="card card-md" action="{{ url('create/record') }}" enctype="multipart/form-data"
            autocomplete="off" novalidate>
            @csrf
            <div class="card-body">
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <div class="mb-3">
                    <label class="form-label required">Full name</label>
                    <input type="text" class="form-control" name="fname" value="{{ old('fname') }}"
                        autocomplete="off" />
                    <span class="text-danger">
                        @error('fname')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                        autocomplete="off" />
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phone number</label>
                    <input type="tel" class="form-control" name="phoneNo" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                        value="{{ old('phoneNo') }}" autocomplete="off" />
                    <span class="text-danger">
                        @error('phoneNo')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" id="age" name="age" value="{{ old('age') }}" class="form-control"
                        min="1" max="120" required>
                    <span class="text-danger">
                        @error('age')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="mb-3">
                    <div class="form-label">Gander</div>
                    <span class="text-danger">
                        @error('gander')
                            {{ $message }}
                        @enderror
                    </span>
                    <div>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gander" value="male"
                                {{ old('gander') == 'male' ? 'checked' : '' }}>
                            <span class="form-check-label">Male</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gander" value="female"
                                {{ old('gander') == 'female' ? 'checked' : '' }}>
                            <span class="form-check-label">Female</span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gander" value="other"
                                {{ old('gander') == 'other' ? 'checked' : '' }}>
                            <span class="form-check-label">Other</span>
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <span class="text-danger">
                        @error('subjects')
                            {{ $message }}
                        @enderror
                    </span>
                    <select type="text" class="form-select" placeholder="Select Subject" id="select-tags"
                        name="subjects[]" multiple>
                        <span>hi</span>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}"> {{ $subject->subject }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-label">Images</div>
                    <input type="file" class="form-control" name="images[]" multiple>
                </div>
                <div class="mb-3">
                    {{-- <label class="form-label">Description<span class="form-label-description"></span></label>
                    <textarea class="form-control" name="desc" rows="6" placeholder="Content..">{{ old('desc') }}</textarea>
                    <span class="text-danger">
                        @error('desc')
                            {{ $message }}
                        @enderror
                    </span> --}}
                    <div id="editor"></div>
                    <div class="draggable" draggable="true">{Text 1}</div>
                    <div class="draggable" draggable="true">{Text 2}</div>
                    <div class="draggable" draggable="true">{Text 3}</div>
                    <input type="hidden" name="desc">
                </div>
                <div class="mb-3">
                    <div id="inputFieldsContainer">
                        <label class="form-label">Hobbies</label>
                        <span class="text-danger">
                            @error('hobbies')
                                {{ $message }}
                            @enderror
                        </span>
                        <div id="newhobby"></div>
                    </div>
                </div>
                <p id="rowAdder" class="btn btn-azure w-24">Add</p>
                <div class="form-footer">
                    <button type="submit" class="btn btn-primary w-100" onclick="submitForm()">Add Record</button>
                </div>
            </div>
    </div>
    </form>
</div>
</div>
<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });

    function submitForm() {
        // Get the editor content
        var content = quill.root.innerHTML;

        // Set the content to a hidden input field
        document.querySelector('input[name=desc]').value = content;

        // Submit the form
        document.getElementById('quillForm').submit();
    }
</script>

{{-- Drag and Drop  --}}
<script>
    // use Quill Editor assign Id because apply javascript event Drag and drop
    const mainDiv = document.getElementById('editor');
    mainDiv.querySelector('div').id = 'editor-d';

    // Get the drop area
    var dropArea = document.getElementById('editor-d');
    dropArea.addEventListener('dragover', function(e) {
        e.preventDefault(); // Prevent default behavior to allow drop
    });
    dropArea.addEventListener('drop', function(e) {
        e.preventDefault();
        var droppedText = dropArea.querySelector('p:last-child');

        // Get the data being dragged and drop it into the paragraph
        var data = e.dataTransfer.getData('text');
        droppedText.textContent += data + " ";
    });

    // Make the draggable elements draggable
    var draggableItems = document.querySelectorAll('.draggable');

    draggableItems.forEach(function(item) {
        item.addEventListener('dragstart', function(e) {
            e.dataTransfer.setData('text', e.target.textContent); // Set the dragged data
        });
    });
</script>
@include('footer')
