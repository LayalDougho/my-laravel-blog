@extends('layouts.app')

@section('title')
   {{ $post->title ?? 'تفاصيل المقال' }}
@endsection

@section('content')

    <div class="container">
        @if ($post->cover_image)
            <div class="text-center mb-4">
                <img
                    src="{{ asset('storage/'.$post->cover_image) }}"
                    alt="صورة الغلاف للمقال: {{ $post->title }}"
                    style="max-width=100%; height: auto; border-radius:8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);"
                    class="img-fluid"
                >   
            </div>
            @endif
    </div>
    <article class="single-post-container">
        <h1>{{ $post->title ?? 'عنوان المقالة غير متوفر' }}</h1>
        <hr>
        <p class="text-muted">
           : بواسطة  <strong>{{ $post->user->name }}</strong>
        </p>
        <div class="article-body">
            <p>{{ $post->body }}</p>
        </div>
    </article>

    <div class="mt-5">
        <h4 class="mb-3">التعليقات</h4>
        @auth
        <form action="{{ route('comment.store', $post->id) }}" method="POST" class="card p-3 shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="commentBody" class="form-lable">شاركنا رأيك:</label>
                <textarea
                    name="text"
                    id="commentBody"
                    rows="3"
                    class="form-control"
                    placeholder="اكتب تعليقك هنا ..."
                    required>
                </textarea>
            </div>
            <button type="submit" class="btn btn-primary"> نشر التعليق </button>

        </form>
        @else
        <div>
            يرجى <a href="{{ route('login') }}" class="alert-link">تسجيل الدخول</a> لتتمكن من كتابة التعليق
        </div>
        @endauth
    </div>

    {{-- قسم عرض التعليقات --}}
    <div class="mt-5">
        <h5>التعليقات ({{ $post->comments->count() }})</h5>
        <hr>
        @forelse ($post->comments as $comment)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-center-between align-items-center mb-2">
                        <h6 class="card-subtitle mb-2 text-muted">
                            <i class="bi bi-person-circle">{{ $comment->user->name }}</i>
                            
                        </h6>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="card-text">{{ $comment->text }}</p>
                </div>
            </div>
            @empty
            <p class="text-center text-muted"> لا يوجد تعليقات بعد. كن اول من يعلق!</p>
            @endforelse
    </div>

@endsection