@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New Car</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Form fields in three columns per row -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Car Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="brand">Car Brand:</label>
                    <select class="form-control" id="brand" name="brand" required>
                        <option value="">Select a Brand</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="Honda">Honda</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Ford">Ford</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Hyundai">Hyundai</option>
                        <option value="Kia">Kia</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <option value="Mazda">Mazda</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="type">Type:</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="">Select Type</option>
                        <option value="Sedan">Sedan</option>
                        <option value="SUV">SUV</option>
                        <option value="Truck">Truck</option>
                        <option value="MPV">MPV</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="Coupe">Coupe</option>
                        <option value="Convertible">Convertible</option>
                        <option value="Minivan">Minivan</option>
                        <option value="Crossover">Crossover</option>
                        <option value="Wagon">Wagon</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="price_per_day">Price Per Day:</label>
                    <input type="number" class="form-control" id="price_per_day" name="price_per_day" step="0.01"
                        required>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                    <label for="seating_capacity">Seating Capacity:</label>
                    <input type="number" class="form-control" id="seating_capacity" name="seating_capacity" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="gas_type">Gas Type:</label>
                    <select class="form-control" id="gas_type" name="gas_type" required>
                        <option value="">Select Gas Type</option>
                        <option value="Petrol">Petrol</option>
                        <option value="Diesel">Diesel</option>
                        <option value="Electric">Electric</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="transmission">Transmission:</label>
                    <select class="form-control" id="transmission" name="transmission" required>
                        <option value="">Select Transmission</option>
                        <option value="Automatic">Automatic</option>
                        <option value="Manual">Manual</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="platenum">Plate Number:</label>
                    <input type="text" class="form-control" id="platenum" name="platenum">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mileage">Mileage:</label>
                    <input type="number" class="form-control" id="mileage" name="mileage">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="color">Color:</label>
                    <input type="text" class="form-control" id="color" name="color">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="regexpiry">Registration Expiry:</label>
                    <input type="date" class="form-control" id="regexpiry" name="regexpiry">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="num_bags">Number of Bags:</label>
                    <input type="number" class="form-control" id="num_bags" name="num_bags">
                </div>
            </div>
        </div>


        <!-- Image upload fields with preview -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="primary_image">Primary Image:</label>
                    <div class="image-container" id="primary_preview">
                        <img src="#" alt="Primary Image Preview" class="img-preview" style="display: none;">
                    </div>
                    <input type="file" class="form-control-file mt-2" id="primary_image" name="primary_image"
                        accept="image/*" onchange="previewImage('primary_image', 'primary_preview')">
                </div>
            </div>
        </div>
        <!-- Company Logo Upload -->
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="company_logo">Company Logo:</label>
                    <div class="image-container" id="logo_preview">
                        <img src="#" alt="Company Logo Preview" class="img-preview" style="display: none;">
                    </div>
                    <input type="file" class="form-control-file mt-2" id="company_logo" name="company_logo"
                        accept="image/*" onchange="previewImage('company_logo', 'logo_preview')">
                </div>
            </div>
        </div>



        <!-- Additional images section -->
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="additional_image">Additional Images (choose up to 3):</label>
                    <div class="additional-images-container" id="additional_preview">
                        <div class="image-box"></div>
                        <div class="image-box"></div>
                        <div class="image-box"></div>
                    </div>
                    <input type="file" class="form-control-file mt-2" id="additional_image" name="additional_image[]"
                        accept="image/*" multiple onchange="previewAdditionalImages()">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Add Car</button>
    </form>
</div>

<style>
    .image-container {
        width: 100%;
        max-width: 300px;
        height: 200px;
        border: 2px dashed #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .img-preview {
        max-width: 100%;
        max-height: 100%;
    }

    .additional-images-container {
        display: flex;
        gap: 10px;
    }

    .image-box {
        width: 100px;
        height: 100px;
        border: 2px dashed #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .image-box img {
        max-width: 100%;
        max-height: 100%;
    }
</style>

<script>
    function previewImage(inputId, previewId) {
        const file = document.getElementById(inputId).files[0];
        const reader = new FileReader();
        const preview = document.getElementById(previewId).querySelector('img');

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function previewAdditionalImages() {
        console.log("Function called"); // Debugging line
        const previewContainer = document.getElementById('additional_preview');
        const files = document.getElementById('additional_image').files;
        const maxFiles = 3;

        previewContainer.innerHTML = '';

        for (let i = 0; i < Math.min(files.length, maxFiles); i++) {
            const file = files[i];
            const reader = new FileReader();
            const imgElement = document.createElement('img');
            const imageBox = document.createElement('div');
            imageBox.classList.add('image-box');
            imageBox.appendChild(imgElement);
            previewContainer.appendChild(imageBox);

            reader.onload = function (e) {
                imgElement.src = e.target.result;
                imgElement.style.maxWidth = "100%";
                imgElement.style.maxHeight = "100%";
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        }
    }
</script>
@endsection