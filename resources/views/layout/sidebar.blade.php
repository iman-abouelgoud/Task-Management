<div class="card overflow-hidden">
    <div class="card-body pt-3">
        <ul class="nav nav-link-secondary flex-column fw-bold gap-2">
            <li class="nav-item">
                <a class="{{ (Route::is('dashboard')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{ route('dashboard') }}">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('tasks.index')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{ route('tasks.index') }}">
                    <span>Tasks</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="{{ (Route::is('projects.index')) ? 'text-white bg-primary rounded' : ''}} nav-link" href="{{ route('projects.index') }}">
                    <span>Projects</span>
                </a>
            </li>
        </ul>
    </div>
</div>
