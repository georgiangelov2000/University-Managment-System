<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <ul class="list-unstyled ps-0 mt-3">
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-4 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                <span> Users</span>
            </button>
            <div class="collapse" id="home-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('user.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Add User</a></li>
                    <li><a href="{{ route('user.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Users</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-4 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                <span>Courses</span>
            </button>
            <div class="collapse" id="dashboard-collapse">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('course.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Add Course</a></li>
                    <li><a href="{{ route('course.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Courses</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-4 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#subjects-collapse" aria-expanded="false">
                <span> Subjects</span>
            </button>
            <div class="collapse" id="subjects-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('user.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Add Subject</a></li>
                    <li><a href="{{ route('user.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Subjects</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-4 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#marks-collapse" aria-expanded="false">
                <span> Marks</span>
            </button>
            <div class="collapse" id="marks-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('user.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Add Mark</a></li>
                    <li><a href="{{ route('user.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Marks</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
