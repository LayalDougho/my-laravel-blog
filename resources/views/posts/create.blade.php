@extends('layouts.app')

@section('title', 'إضافة مقال جديد')
@section('content')
    <div class="container">
        <h1>إضافة مقال جديد</h1>
        <form action="{{ url('/posts') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">عنوان المقال:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror

            <label for="body">محتوى المقال:</label>
            <textarea name="body" id="body" rows="10" class="form-control">{{ old('body') }}</textarea>
            <div class="form-group mb-4">
                <label for="cover_image">صورة الغلاف :</label>
                <input 
                    type="file" 
                    name="cover_image" 
                    id="cover_image" 
                    class="form-control-file @error('cover_image') is-invalid @enderror"
                >
                <img
                    id="image-preview"
                    src="#"
                    alt="معاينة الصورة"
                    class="mt-2 d-none"
                    style="max-width:200px; max-height: 200px; border-radius:4px;"
                >
                @error('cover_image')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary" id="submit-button"> حفظ المقال
                <span class="spinner-border spinner-border-sm d-none " role="=status" aria-hidden="true" id="loading-spinner"></span>
            </button>
        </form>
    </div>

@endsection
 @push('scripts')
<script>
    //كود مؤشر التحميل
    const form =document.querySelector('form');
    const submitButton = document.getElementById('submit-button');
    const loadingSpinner = document.getElementById('loading-spinner');

    form.addEventListener('submit', function(){
        submitButton.disabled = true;
        submitButton.textContent = 'جاري الحفظ ....';
        loadingSpinner.classList.remove('d-none');
    });

    //كود معاينة الصورة
    const imageInput = document.getElementById('cover_image');
    const imagePreview = document.getElementById('image-preview');

    imageInput.addEventListener('change',function(event){
        if (event.target.files && event.target.files[0]){
            const reader = new FileReader();
            reader.onload = function(e){
                imagePreview.src = e.target.result;
                imagePreview.classList.remove('d-none');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    });
</script>

 @endpush

