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
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Add Subject</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Subjects</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-4 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#exam-collapse" aria-expanded="false">
                <span> Exams</span>
            </button>
            <div class="collapse" id="exam-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Exam</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Exams</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-4 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span> Attendances</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Attendance</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Attendances</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-4 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span>Programs</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Program</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Programs</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-8 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span>Staff Salaries</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Salary</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Salaries</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-6 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span>Staff Holidays</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Holiday</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Holidays</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-7 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span>Student Payments</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Payment</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Payments</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-8 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span>Student Hostels</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Hostel</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Hostels</a></li>
                </ul>
            </div>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-8 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span>Marks</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Mark</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Marks</a></li>
                </ul>
            </div>
        </li>
        <li class="mb-1">
            <button
                class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed col-md-8 justify-content-between"
                data-bs-toggle="collapse" data-bs-target="#attendance-collapse" aria-expanded="false">
                <span>Liquidations</span>
            </button>
            <div class="collapse" id="attendance-collapse" style="">
                <ul class="btn-toggle-nav  pb-1 small">
                    <li><a href="{{ route('subject.create') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Create Liquidation</a></li>
                    <li><a href="{{ route('subject.index') }}"
                            class="link-dark d-inline-flex text-decoration-none rounded">Manage Liquadations</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
