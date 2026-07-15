@extends('layouts.backend.master')
@section('admin')
    <div class="content">
        <!-- content HEADER -->
        <div class="content-header">
            <div class="leftside-content-header">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">{{ $dashboard }}</a></li>
                    <li><a>{{ $subTitle }}</a></li>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
          
                <div class="panel">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">{{ $subTitle }}</h4>
                                <a class="add-item btn btn-o btn-primary btn-xs" href="{{ route('admin.blog.create') }}">{{ $title }}<i class="fa fa-plus" style="padding-left: 10px"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content" style="width: 100%">
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form id="myForm" method="POST"
                                            @if (empty($data->id)) action="{{ route('admin.blog.add.update.info') }}" @else action="{{ route('admin.blog.add.update.info', $data->id) }}" @endif
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="select2-example-basic" class="control-label">Select Blog Type</label>
                                                <select name="blogType" id="select2-example-basic" class="form-control" style="width: 100%">
                                                   
                                                        <option value="1" {{ $data->blogType ==1 ? 'selected' :''}} >
                                                            Entrepreneurial
                                                            Insights
                                                        </option>
                                                        <option value="2" {{ $data->blogType ==2 ? 'selected' :''}}>Article</option>
                                                        <option value="3" {{ $data->blogType ==3 ? 'selected' :''}}>Interview</option>
                                               
                                                </select>
                                            </div>
                                            <!-- Add New Field Button -->
                                            <div class="form-group">
                                                <button type="button" id="addFieldBtn" class="btn btn-success btn-sm">
                                                    <i class="fa fa-plus"></i> Add New Field Set
                                                </button>
                                            </div>

                                            <!-- Dynamic Fields Container -->
                                            <div id="dynamicFieldsContainer">
                                                @if(isset($data->details) && count($data->details) > 0)
                                                    @foreach($data->details as $index => $detail)
                                                    <div class="field-set" data-index="{{ $index }}">
                                                        <div class="panel panel-default" style="border: 1px solid #ddd; margin-bottom: 15px;">
                                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                                                                <h5 style="margin: 0; display: inline-block;">Field Set {{ $index + 1 }}</h5>
                                                                <button type="button" class="btn btn-danger btn-xs pull-right delete-field-set" style="{{ count($data->details) > 1 ? '' : 'display: none;' }}">
                                                                    <i class="fa fa-trash"></i> Delete
                                                                </button>
                                                            </div>
                                                            <div class="panel-body" style="padding: 15px;">
                                                                <!-- Title Field -->
                                                                <div class="form-group">
                                                                    <label for="title_{{ $index }}">Title</label>
                                                                    <input type="text" name="title[]" id="title_{{ $index }}"
                                                                        value="{{ old('title.' . $index, $detail['title'] ?? '') }}"
                                                                        class="form-control" />
                                                                    @error('title.' . $index)
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>

                                                                <!-- Description Field -->
                                                                <div class="form-group">
                                                                    <label for="description_{{ $index }}">Description</label>
                                                                    <textarea name="description[]" id="description_{{ $index }}"
                                                                        class="form-control" rows="4">{{ old('description.' . $index, $detail['description'] ?? '') }}</textarea>
                                                                    @error('description.' . $index)
                                                                        <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                                </div>

                                                                <!-- Image Field -->
                                                                <div class="form-group">
                                                                    <label for="image_{{ $index }}">Select Image:</label>
                                                                    <input type="file" id="image_{{ $index }}" name="image[]" accept="image/*" class="form-control image-input">
                                                                    @if(isset($detail['image']) && $detail['image'])
                                                                        <small class="text-info">Current image: {{ basename($detail['image']) }}</small>
                                                                    @endif
                                                                </div>

                                                                <!-- Image Preview -->
                                                                <div class="image-preview" style="{{ isset($detail['image']) && $detail['image'] ? 'display: block;' : 'display: none;' }} margin-top: 10px;">
                                                                    <p><strong>{{ isset($detail['image']) && $detail['image'] ? 'Current' : 'Selected' }} Image:</strong></p>
                                                                    <img class="image-display" src="{{ isset($detail['image']) && $detail['image'] ? asset('storage/' . $detail['image']) : '' }}" alt="Preview" style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                @else
                                                    <!-- Default empty field set for new blog -->
                                                    <div class="field-set" data-index="0">
                                                        <div class="panel panel-default" style="border: 1px solid #ddd; margin-bottom: 15px;">
                                                            <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                                                                <h5 style="margin: 0; display: inline-block;">Field Set 1</h5>
                                                                <button type="button" class="btn btn-danger btn-xs pull-right delete-field-set" style="display: none;">
                                                                    <i class="fa fa-trash"></i> Delete
                                                                </button>
                                                            </div>
                                                            <div class="panel-body" style="padding: 15px;">
                                                                <div class="form-group">
                                                                    <label for="title_0">Title</label>
                                                                    <input type="text" name="title[]" id="title_0" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="description_0">Description</label>
                                                                    <textarea name="description[]" id="description_0" class="form-control" rows="4"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="image_0">Select Image:</label>
                                                                    <input type="file" id="image_0" name="image[]" accept="image/*" class="form-control image-input">
                                                                </div>
                                                                <div class="image-preview" style="display: none; margin-top: 10px;">
                                                                    <p><strong>Selected Image:</strong></p>
                                                                    <img class="image-display" src="" alt="Preview" style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>

                                        

                                            <!-- Submit Button -->
                                            <div class="form-group" style="padding-top: 10px">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the current highest index
            let fieldIndex = {{ isset($data->details) ? count($data->details) : 1 }};
            const addFieldBtn = document.getElementById('addFieldBtn');
            const container = document.getElementById('dynamicFieldsContainer');

            // Add new field set
            addFieldBtn.addEventListener('click', function() {
                const fieldSet = createFieldSet(fieldIndex);
                container.appendChild(fieldSet);
                fieldIndex++;
                updateDeleteButtons();
            });

            // Create new field set
            function createFieldSet(index) {
                const fieldSet = document.createElement('div');
                fieldSet.className = 'field-set';
                fieldSet.setAttribute('data-index', index);
                
                fieldSet.innerHTML = `
                    <div class="panel panel-default" style="border: 1px solid #ddd; margin-bottom: 15px;">
                        <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                            <h5 style="margin: 0; display: inline-block;">Field Set ${index + 1}</h5>
                            <button type="button" class="btn btn-danger btn-xs pull-right delete-field-set">
                                <i class="fa fa-trash"></i> Delete
                            </button>
                        </div>
                        <div class="panel-body" style="padding: 15px;">
                            <div class="form-group">
                                <label for="title_${index}">Title</label>
                                <input type="text" name="title[]" id="title_${index}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="description_${index}">Description</label>
                                <textarea name="description[]" id="description_${index}" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image_${index}">Select Image:</label>
                                <input type="file" id="image_${index}" name="image[]" accept="image/*" class="form-control image-input">
                            </div>
                            <div class="image-preview" style="display: none; margin-top: 10px;">
                                <p><strong>Selected Image:</strong></p>
                                <img class="image-display" src="" alt="Preview" style="max-width: 200px; max-height: 200px; border: 1px solid #ddd; padding: 5px;">
                            </div>
                        </div>
                    </div>
                `;

                // Add delete functionality
                const deleteBtn = fieldSet.querySelector('.delete-field-set');
                deleteBtn.addEventListener('click', function() {
                    fieldSet.remove();
                    updateDeleteButtons();
                    updateFieldNumbers();
                });

                // Add image preview functionality
                addImagePreviewListener(fieldSet);

                return fieldSet;
            }

            // Add image preview listener
            function addImagePreviewListener(fieldSet) {
                const imageInput = fieldSet.querySelector('.image-input');
                const imagePreview = fieldSet.querySelector('.image-preview');
                const imageDisplay = fieldSet.querySelector('.image-display');

                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imageDisplay.src = e.target.result;
                            imagePreview.style.display = 'block';
                        };
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.style.display = 'none';
                    }
                });
            }

            // Update delete button visibility
            function updateDeleteButtons() {
                const fieldSets = container.querySelectorAll('.field-set');
                fieldSets.forEach(fieldSet => {
                    const deleteBtn = fieldSet.querySelector('.delete-field-set');
                    if (fieldSets.length > 1) {
                        deleteBtn.style.display = 'inline-block';
                    } else {
                        deleteBtn.style.display = 'none';
                    }
                });
            }

            // Update field numbers
            function updateFieldNumbers() {
                const fieldSets = container.querySelectorAll('.field-set');
                fieldSets.forEach((fieldSet, index) => {
                    const heading = fieldSet.querySelector('.panel-heading h5');
                    heading.textContent = `Field Set ${index + 1}`;
                });
            }

            // Initialize existing fields
            document.querySelectorAll('.field-set').forEach(fieldSet => {
                addImagePreviewListener(fieldSet);
                
                const deleteBtn = fieldSet.querySelector('.delete-field-set');
                if (deleteBtn) {
                    deleteBtn.addEventListener('click', function() {
                        fieldSet.remove();
                        updateDeleteButtons();
                        updateFieldNumbers();
                    });
                }
            });

            // Initialize delete buttons
            updateDeleteButtons();
        });
    </script>
@endsection