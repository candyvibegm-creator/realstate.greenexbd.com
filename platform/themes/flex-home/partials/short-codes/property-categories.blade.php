@if($categories->isNotEmpty())
    <div class="container padtop70">
        @if($title || $subtitle)
            <div class="text-center mb-4">
                @if($subtitle)
                    <p class="text-muted">{{ $subtitle }}</p>
                @endif
                @if($title)
                    <h2>{{ $title }}</h2>
                @endif
            </div>
        @endif

        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="category-card h-100">
                        <a href="{{ route('public.properties') }}?category={{ $category->id }}" class="text-decoration-none">
                            <div class="category-card-body">
                                <div class="category-icon">
                                    <i class="fas fa-building"></i>
                                </div>
                                <h4 class="category-name">{{ $category->name }}</h4>
                                @if($category->description)
                                    <p class="category-description">{{ Str::limit($category->description, 100) }}</p>
                                @endif
                                <div class="category-count">
                                    <span class="badge bg-primary">{{ $category->properties_count }} {{ __('Properties') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .category-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }

        .category-card-body {
            padding: 30px;
            text-align: center;
        }

        .category-icon {
            font-size: 48px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .category-name {
            font-size: 20px;
            font-weight: 700;
            color: #222;
            margin-bottom: 15px;
        }

        .category-description {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .category-count {
            margin-top: 15px;
        }

        .category-count .badge {
            font-size: 13px;
            padding: 8px 15px;
            border-radius: 20px;
        }
    </style>
@endif
