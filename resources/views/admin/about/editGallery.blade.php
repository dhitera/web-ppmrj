@extends('admin.layouts.adminMain')

@section('container')
<div class="flex flex-row justify-between items-center">
    <p class="text-2xl font-semibold py-5">Edit Foto Galeri</p>
    <a href="{{ route('admin.about') }}"
        class="inline-flex items-center px-4 py-2 text-sm text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg">
        Kembali
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('about.updateGallery') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4 text-gray-800">Edit Foto Galeri</h3>
            <p class="text-sm text-gray-600 mb-4">Anda bisa mengubah salah satu foto secara individu atau mengupload
                yang baru, biarkan file input kosong jika tidak ingin mengubah.</p>
        </div>

        <!-- Current Gallery Images Preview -->
        @if($galleryImages->count() > 0)
        <div class="mb-6">
            <h4 class="text-md font-medium mb-3 text-gray-700">Foto Galeri Sekarang:</h4>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($galleryImages as $index => $image)
                <div class="relative">
                    <img src="{{ $image->getUrl() }}" alt="Gallery Image {{ $index + 1 }}"
                        class="w-full h-32 object-cover rounded-lg shadow-sm">
                    <div class="absolute top-2 left-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">
                        Foto {{ $index + 1 }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif

        <!-- File Upload Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @for($i = 1; $i <= 6; $i++) <div class="space-y-2">
                <label for="gallery_image_{{ $i }}" class="block text-sm font-medium text-gray-700">
                    Foto Galeri {{ $i }}
                </label>

                <!-- Show current image if exists -->
                @if($galleryImages->get($i - 1))
                <div class="mb-3 p-3 bg-gray-50 rounded-lg relative">
                    <p class="text-xs text-gray-600 mb-2">Current Image:</p>
                    <div class="relative">
                        <img src="{{ $galleryImages->get($i - 1)->getUrl() }}" alt="Current Gallery Image {{ $i }}"
                            class="w-full h-32 object-cover rounded-lg shadow-sm">
                        <button type="button" onclick="deleteGalleryImage({{ $i - 1 }})"
                            class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 shadow-lg transition-colors duration-200"
                            title="Delete this image">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Upload foto baru untuk mengubah, atau klik X untuk menghapus
                    </p>
                </div>
                @endif

                <div class="flex items-center justify-center w-full">
                    <label for="gallery_image_{{ $i }}"
                        class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500">
                                <span class="font-semibold">
                                    @if($galleryImages->get($i - 1))
                                    Click to replace
                                    @else
                                    Click to upload
                                    @endif
                                </span>
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG, JPEG, WebP (MAX. 10MB)</p>
                        </div>
                        <input id="gallery_image_{{ $i }}" name="gallery_images[{{ $i - 1 }}]" type="file"
                            class="hidden" accept="image/*" />
                    </label>
                </div>
                <div id="preview_{{ $i }}" class="hidden">
                    <img id="preview_img_{{ $i }}" class="w-full h-32 object-cover rounded-lg shadow-sm mt-2" />
                    <p id="file_name_{{ $i }}" class="text-xs text-gray-600 mt-1"></p>
                </div>
                @error('gallery_images.' . ($i - 1))
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
        </div>
        @endfor
</div>

<!-- Upload Progress Bar -->
<div id="upload_progress" class="hidden mt-6">
    <div class="bg-gray-200 rounded-full h-2.5">
        <div id="progress_bar" class="bg-blue-600 h-2.5 rounded-full transition-all duration-300" style="width: 0%">
        </div>
    </div>
    <p id="progress_text" class="text-sm text-gray-600 mt-2">Uploading images...</p>
</div>

<!-- Error Messages -->
@if ($errors->any())
<div class="mt-6 bg-red-50 border border-red-200 rounded-md p-4">
    <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <div class="ml-3">
            <h3 class="text-sm font-medium text-red-800">There were errors with your submission:</h3>
            <div class="mt-2 text-sm text-red-700">
                <ul role="list" class="list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif

<!-- Submit Button -->
<div class="mt-8 flex items-center justify-end space-x-4">
    <a href="{{ route('admin.about') }}"
        class="px-6 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 focus:ring-4 focus:ring-gray-100">
        Cancel
    </a>
    <button type="submit"
        class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300"
        id="submit_btn">
        Update Galeri
    </button>
</div>
</form>
</div>

<script>
    // Delete gallery image function
function deleteGalleryImage(position) {
    if (confirm('Are you sure you want to delete this image? This action cannot be undone.')) {
        fetch('{{ route("about.deleteGalleryImage") }}', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                position: position
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Reload the page to show updated gallery
                location.reload();
            } else {
                alert('Error deleting image: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while deleting the image.');
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    // Handle file input changes and show preview
    for (let i = 1; i <= 6; i++) {
        const input = document.getElementById(`gallery_image_${i}`);
        const preview = document.getElementById(`preview_${i}`);
        const previewImg = document.getElementById(`preview_img_${i}`);
        const fileName = document.getElementById(`file_name_${i}`);

        input.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    fileName.textContent = file.name;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        });
    }

    // Handle form submission
    const form = document.querySelector('form');
    const submitBtn = document.getElementById('submit_btn');
    const progressDiv = document.getElementById('upload_progress');
    const progressBar = document.getElementById('progress_bar');
    const progressText = document.getElementById('progress_text');

    form.addEventListener('submit', function(e) {
        // Check if at least one image is selected or if there are existing images
        let hasNewImages = false;
        for (let i = 1; i <= 6; i++) {
            const input = document.getElementById(`gallery_image_${i}`);
            if (input.files.length > 0) {
                hasNewImages = true;
                break;
            }
        }

        const hasExistingImages = {{ $galleryImages->count() > 0 ? 'true' : 'false' }};

        if (!hasNewImages && !hasExistingImages) {
            e.preventDefault();
            alert('Please upload at least one gallery image.');
            return;
        }

        // Show progress indicator only if there are new images to upload
        if (hasNewImages) {
            submitBtn.disabled = true;
            submitBtn.textContent = 'Uploading...';
            progressDiv.classList.remove('hidden');

            // Simulate progress
            let progress = 0;
            const interval = setInterval(() => {
                progress += 10;
                progressBar.style.width = progress + '%';
                
                if (progress >= 90) {
                    clearInterval(interval);
                    progressText.textContent = 'Processing images...';
                }
            }, 200);
        }
    });
});
</script>

@endsection