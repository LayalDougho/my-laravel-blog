@extends('layouts.app') 

@section('title', 'الصفحة الرئيسية للمقالات') 

@section('content')

    <div class="container">
        
        <section class="hero-section text-center mb-5 p-4 bg-light rounded">
            <h1>أهلاً بك في عالم البرمجة والتدوين</h1>
            <p class="lead">هنا ستجد مقالاتنا الأخيرة. هذا الجزء سيكون ثابتاً.</p>
            
            {{-- زر إضافة مقال جديد --}}
            <a href="{{ url('/posts/create') }}" class="btn btn-primary mt-3">
                + إنشاء مقال جديد
            </a>
        </section>

        {{-- رسالة التنبيه --}}
        @if (session('success'))
            <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
        @endif

        <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="ابحث عن عنوان المقال ..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">بحث</button>
            </div>
        </form>

        <section class="latest-articles">
            <h2 class="mb-4">آخر المقالات</h2>
            
            @if ($posts->isEmpty())
                <div class="alert alert-info">لا توجد مقالات لعرضها حالياً.</div>
            @else
                
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>العنوان</th>
                            <th>صورة</th>
                            <th>التاريخ</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                               
                                <td>{{ $loop->iteration }}</td> 

                              
                                <td>
                                    <a href="{{ url('/posts/' . $post->slug) }}">
                                        
                                        <strong>{{ $post->title }}</strong>
                                    </a>
                                    
                                    
                                </td>

                               
                                <td>
                                    @if($post->cover_image)
                                        <img
                                            src="{{ asset('storage/' . $post->cover_image) }}"
                                            alt="صورة مصغرة"
                                            style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;"
                                        >
                                    @else
                                        <span class="text-muted">لا توجد صورة</span>
                                    @endif
                                </td>
                                
                                
                                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                                
                               
                                <td style="min-width: 170px;">
                                   @can('update',$post)
                                    <a href="{{ url('/posts/' . $post->slug . '/edit') }}" class="btn btn-sm btn-warning me-2">
                                        تعديل
                                    </a>
                                    @endcan
                                    
                                  
                                    
                                  @can('delete',$post)
                                    <form 
                                        action="{{ url('/posts/' . $post->slug) }}" 
                                        method="POST" 
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا المقال نهائياً؟')" 
                                        style="display: inline;"
                                    > 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        <div class="d-flex justify-content-center mt-5">
                            {{ $posts->withQueryString()->links() }}
                        </div>
                        <div class="card">
                             <div class=" card-header bg-primary text-white">
                            أحدث 5 مقالات
                             </div>
                             <ul class="list-group list-group-flush">
                                @foreach ($latestPosts as $latest )
                                    <li class="list-group-item">
                                        <a href="{{ route('article-single', $latest->id )}}">
                                            {{ $latest->title }}
                                        </a>
                                    </li>
                                
                                @endforeach
                             </ul>
                        </div>


                    </tbody>
                </table>
            @endif
        </section>
    </div>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        const successAlert = document.getElementById('success-alert');
        if(successAlert){
            setTimeout(()=>{
                successAlert.style.display='none';
            },3000
        );
        }
    });
</script>
@endpush