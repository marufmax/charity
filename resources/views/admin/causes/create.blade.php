@extends('admin.default')

@section('page-header')
    <div class="row">
        Cause <small>Create New</small>
    </div>

@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="bgc-white bd bdrs-3 p-20 mB-20">
                <form action="{{ url('admin/causes/add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Cause Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="8" class="form-control" name="description" id="description"> </textarea>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="is_featured"  class="form-check-input" id="is_featured">
                        <label class="form-check-label" for="is_featured">Is featured?</label>
                    </div>

                    <br />

                    <div class="form-group">
                        <label for="target_amount">Target Amount</label>
                        <input type="text" class="form-control" name="target_amount" id="target_amount" placeholder="What is your target amount?">
                    </div>

                    <div class="form-group">
                        <div class="main-img-preview">
                            <img id="preview-image">
                        </div>

                        <label for="target_amount">Featured Image</label>

                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="featured_image" accept="image/jpeg, image/png" class="custom-file-input" id="inputGroupFile02" onchange="loadFile(event)">
                                <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>

    </div>
@endsection

@section('js')
    <script>
        const loadFile = (e) => {
            const reader = new FileReader();

            reader.onload = () => {
                const output = document.getElementById('preview-image');
                output.src = reader.result;
            };

            reader.readAsDataURL(e.target.files[0]);
        }
    </script>
@stop


