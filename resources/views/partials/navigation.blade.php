<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom shadow-sm">
    <div class="container">
        
        {{-- شعار الموقع --}}
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'My Blog') }}
        </a>
        
        {{-- زر الهامبرغر للتصغير --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            
            {{-- الروابط الأساسية (يسار/يمين في اللغة العربية) --}}
            <ul class="navbar-nav me-auto">
                {{-- رابط لوحة التحكم (Dashboard) --}}
                @auth
                    <li class="nav-item">
                        <a class="nav-link @if(request()->routeIs('dashboard')) active @endif" href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>
                @endauth
                
                {{-- روابط مشروع المقالات (كمثال) --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/posts') }}">الصفحة الرئيسية للمقالات</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">من نحن</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">تواصل معنا</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-outline-primary me-2" href="{{ url('/posts/create') }}">
                        + إنشاء مقال
                    </a>
                </li>
            </ul>

            {{-- قائمة المستخدم (يمين/يسار في اللغة العربية) --}}
            <ul class="navbar-nav ms-auto">
                @auth
                    {{-- إذا كان المستخدم مسجل دخوله --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            
                            {{-- رابط الملف الشخصي --}}
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">الملف الشخصي</a></li> 

                            <li><hr class="dropdown-divider"></li>
                            
                            {{-- زر تسجيل الخروج --}}
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item" type="submit">تسجيل الخروج</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- إذا لم يكن المستخدم مسجل دخوله --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">تسجيل الدخول</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">التسجيل</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>

