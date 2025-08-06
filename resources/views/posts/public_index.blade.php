@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<style>
:root {
    --primary-gradient: linear-gradient(135deg, #1E88E5 0%, #0D47A1 100%);
    --secondary-gradient: linear-gradient(135deg, #4DD0E1 0%, #00838F 100%);
    --dark-gradient: linear-gradient(135deg, #01579B 0%, #0277BD 100%);
    --success-gradient: linear-gradient(135deg, #26A69A 0%, #00796B 100%);
    --warning-gradient: linear-gradient(135deg, #FFA000 0%, #FF6F00 100%);
    --info-gradient: linear-gradient(135deg, #00ACC1 0%, #00838F 100%);

    --light-blue: #E3F2FD;
    --text-dark: #263238;
    --text-muted: #546E7A;
    --light-gray: #ECEFF1;
    --white: #FFFFFF;
    --shadow-color: rgba(30, 136, 229, 0.2);
}

body {
    background-color: var(--light-blue);
    font-family: 'Poppins', sans-serif;
    color: var(--text-dark);
    line-height: 1.6;
}

.hero-section {
    background: var(--primary-gradient);
    color: var(--white);
    border-radius: 0 0 20px 20px;
    box-shadow: 0 10px 30px var(--shadow-color);
    margin-bottom: 3rem;
    padding: 4rem 0;
    position: relative;
    overflow: hidden;
    text-align: center;
}

.hero-section::before {
    content: '';
    position: absolute;
    top: -50px;
    right: -50px;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    z-index: 0;
}

.hero-section::after {
    content: '';
    position: absolute;
    bottom: -80px;
    left: -80px;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    z-index: 0;
}

.hero-content {
    position: relative;
    z-index: 1;
}

.hero-section h1 {
    font-size: 2.8rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.hero-section p {
    font-size: 1.2rem;
    max-width: 700px;
    margin: 0 auto 2rem;
    opacity: 0.9;
}

.posts-container {
    padding: 0 1rem;
}

.post-card {
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(1, 87, 155, 0.08);
    margin-bottom: 2rem;
    background: var(--white);
    position: relative;
    z-index: 1;
    height: 100%;
}

.post-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: var(--primary-gradient);
    z-index: -1;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.post-card:hover {
    transform: translateY(-10px) scale(1.02);
    box-shadow: 0 15px 30px rgba(1, 87, 155, 0.15);
}

.post-card:hover::before {
    opacity: 0.05;
}

.post-card .card-header {
    background: var(--primary-gradient);
    color: var(--white);
    border-bottom: none;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
}

.post-card .card-header::after {
    content: '';
    position: absolute;
    bottom: -50px;
    right: -50px;
    width: 100px;
    height: 100px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
}

.post-card .card-header h5 {
    font-weight: 600;
    margin: 0;
    position: relative;
    z-index: 1;
}

.post-card .card-body {
    padding: 2rem;
    position: relative;
}

.post-card .card-body::before {
    content: '';
    position: absolute;
    top: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 80%;
    height: 2px;
    background: linear-gradient(to right, transparent, rgba(30, 136, 229, 0.3), transparent);
}

.post-card .card-text {
    color: var(--text-muted);
    margin-bottom: 1.5rem;
}

.post-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.meta-item {
    display: flex;
    align-items: center;
    font-size: 0.9rem;
    color: var(--text-muted);
}

.meta-item i {
    margin-right: 0.5rem;
    font-size: 1rem;
}

.meta-item .fa-user-circle { color: #1E88E5; }
.meta-item .fa-phone-alt { color: #26A69A; }
.meta-item .fa-clock { color: #546E7A; }

.create-post-btn {
    background: var(--primary-gradient);
    color: var(--white);
    border: none;
    border-radius: 50px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    letter-spacing: 0.5px;
    box-shadow: 0 5px 15px var(--shadow-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    font-size: 1rem;
    z-index: 1;
}

.create-post-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 25px rgba(30, 136, 229, 0.4);
    color: var(--white);
}

.create-post-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: 0.5s;
    z-index: -1;
}

.create-post-btn:hover::before {
    left: 100%;
}

.empty-state {
    background: var(--white);
    border-radius: 15px;
    padding: 3rem;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    margin: 2rem 0;
}

.empty-state-icon {
    font-size: 5rem;
    color: #B0BEC5;
    margin-bottom: 1.5rem;
    opacity: 0.5;
}

.empty-state h3 {
    color: var(--text-dark);
    margin-bottom: 1rem;
}

.empty-state p {
    color: var(--text-muted);
    margin-bottom: 2rem;
}

@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade {
    animation: fadeIn 0.8s ease forwards;
}

.animate-slide-up {
    animation: slideUp 0.6s ease forwards;
}

.delay-1 { animation-delay: 0.1s; }
.delay-2 { animation-delay: 0.2s; }
.delay-3 { animation-delay: 0.3s; }
.delay-4 { animation-delay: 0.4s; }

.modal-content {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(1, 87, 155, 0.2);
}

.modal-header {
    background: var(--primary-gradient);
    color: var(--white);
    border-bottom: none;
    padding: 1.5rem;
}

.modal-title {
    font-weight: 600;
}

.modal-body {
    padding: 2rem;
    background: var(--light-gray);
}

.modal-footer {
    border-top: none;
    padding: 1.5rem;
    background: var(--light-gray);
}

.form-control {
    border-radius: 10px;
    padding: 0.75rem 1rem;
    border: 1px solid #CFD8DC;
    transition: all 0.3s ease;
    background: var(--white);
}

.form-control:focus {
    border-color: #1E88E5;
    box-shadow: 0 0 0 0.25rem rgba(30, 136, 229, 0.25);
}

.btn-submit {
    background: var(--success-gradient);
    color: var(--white);
    border: none;
    border-radius: 50px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(38, 166, 154, 0.3);
    color: var(--white);
}

.btn-cancel {
    background: var(--light-gray);
    color: var(--text-muted);
    border: none;
    border-radius: 50px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    background: #CFD8DC;
    color: var(--text-dark);
}

.pagination {
    margin-top: 3rem;
}

.pagination .page-item.active .page-link {
    background: var(--primary-gradient);
    border-color: transparent;
    color: var(--white);
}

.pagination .page-link {
    color: #1E88E5;
    border-radius: 10px;
    margin: 0 5px;
    border: none;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
}

.pagination .page-link:hover {
    background: rgba(30, 136, 229, 0.1);
    color: #0D47A1;
}

@media (max-width: 768px) {
    .hero-section {
        padding: 3rem 0;
    }

    .hero-section h1 {
        font-size: 2.2rem;
    }

    .post-meta {
        flex-direction: column;
        gap: 0.8rem;
    }

    .modal-body, .modal-footer {
        padding: 1.5rem;
    }
}

@media (max-width: 576px) {
    .hero-section {
        padding: 2.5rem 0;
        border-radius: 0 0 15px 15px;
    }

    .hero-section h1 {
        font-size: 1.8rem;
    }

    .hero-section p {
        font-size: 1rem;
    }

    .create-post-btn {
        padding: 0.6rem 1.5rem;
        font-size: 0.9rem;
    }

    .post-card .card-body,
    .post-card .card-header {
        padding: 1.25rem;
    }
}
</style>

<div class="hero-section animate-fade">
    <div class="container text-center">
        <h1 class="display-4 fw-bold mb-3">📝 Posts</h1>
        <button class="btn create-post-btn animate-slide-up delay-2" data-bs-toggle="modal" data-bs-target="#createPostModal">
            <i class="fas fa-plus me-2"></i> Create New Post
        </button>
    </div>
</div>

<div class="container py-4">
    <div class="row g-4">
        @forelse($posts as $index => $post)
            <div class="col-md-6 col-lg-4 animate-slide-up delay-{{ ($index % 3) + 1 }}">
                <div class="post-card h-100">
                    <div class="card-header">
                        <h5 class="mb-0 fw-bold">{{ $post->title }}</h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted mb-4">
                            {{ \Illuminate\Support\Str::limit($post->description, 200) }}
                        </p>

                        <div class="post-meta">
                            <span class="meta-item">
                                <i class="fas fa-user-circle text-primary"></i>
                                <span>{{ $post->user->username ?? 'Anonymous' }}</span>
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-phone-alt text-success"></i>
                                <span>{{ $post->phone }}</span>
                            </span>
                            <span class="meta-item">
                                <i class="fas fa-clock text-secondary"></i>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 animate-fade">
                <div class="empty-state">
                    <div class="empty-state-icon">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <h3 class="mb-3">No Posts Available</h3>
                    <p class="text-muted mb-4">Be the first to share something with the community!</p>
                    <button class="btn create-post-btn" data-bs-toggle="modal" data-bs-target="#createPostModal">
                        <i class="fas fa-plus me-2"></i> Create Post
                    </button>
                </div>
            </div>
        @endforelse
    </div>

    @if($posts->hasPages())
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-5 animate-fade delay-4">
            <div class="text-muted">
                Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results
            </div>
            <div>
                {{ $posts->links('pagination::bootstrap-5') }}
            </div>
        </div>
    @endif


</div>

<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="POST" action="{{ route('posts.public.store') }}" id="postForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createPostModalLabel">Create New Post</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-4">
                        <label for="postTitle" class="form-label fw-bold">Title</label>
                        <input type="text" name="title" id="postTitle" class="form-control" placeholder="Enter a title" required>
                    </div>

                    <div class="mb-4">
                        <label for="postDescription" class="form-label fw-bold">Description</label>
                        <textarea name="description" id="postDescription" class="form-control" rows="5" placeholder="Share your thoughts..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="postPhone" class="form-label fw-bold">Contact Phone</label>
                        <input type="tel" name="phone" id="postPhone" class="form-control" placeholder="Enter your contact number" required>
                        <small class="text-muted">This will be visible to others</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-submit rounded-pill">
                        <i class="fas fa-paper-plane me-2"></i> Publish Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    @if(session('success'))
        toastr.success("{{ session('success') }}", 'Success', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-bottom-right",
            timeOut: 5000,
            extendedTimeOut: 2000,
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
    @endif

    @if(session('error'))
        toastr.error("{{ session('error') }}", 'Error', {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-bottom-right",
            timeOut: 5000,
            extendedTimeOut: 2000,
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        });
    @endif

    document.getElementById('createPostModal').addEventListener('show.bs.modal', function () {
        const modalContent = this.querySelector('.modal-content');
        modalContent.style.opacity = '0';
        modalContent.style.transform = 'translateY(20px)';

        setTimeout(() => {
            modalContent.style.transition = 'all 0.3s ease-out';
            modalContent.style.opacity = '1';
            modalContent.style.transform = 'translateY(0)';
        }, 10);
    });

    document.getElementById('postForm').addEventListener('submit', function(e) {
        const title = document.getElementById('postTitle').value.trim();
        const description = document.getElementById('postDescription').value.trim();
        const phone = document.getElementById('postPhone').value.trim();

        if (!title || !description || !phone) {
            e.preventDefault();
            toastr.error('Please fill in all required fields', 'Validation Error');
        }
    });
</script>

@endsection
