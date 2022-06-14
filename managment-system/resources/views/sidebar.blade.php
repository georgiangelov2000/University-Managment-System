<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse pt-0">
    <ul class="list-unstyled ps-0 mt-3">
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#users" class="nav-link collapsed active">
                <i class="fa fa-user"></i> Users
            </a>
            <ul class="sub-menu collapse" id="users">
                <li><a href="{{ route('user.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Add User</a></li>
                <li><a href="{{ route('user.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Users</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#studentCourses" class="nav-link collapsed active">
                <i class="fa fa-book"></i> Courses
            </a>
            <ul class="sub-menu collapse" id="studentCourses">
                <li><a href="{{ route('course.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Add Course</a></li>
                <li><a href="{{ route('course.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Courses</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#studentSubjects" class="nav-link collapsed active">
                <i class="fas fa-book-reader"></i> Subjects
            </a>
            <ul class="sub-menu collapse" id="studentSubjects">
                <li><a href="{{ route('subject.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Add Subject</a></li>
                <li><a href="{{ route('subject.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Subjects</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#studentsExams" class="nav-link collapsed active">
                <i class="fas fa-bell" aria-hidden="true"></i> Exams
            </a>
            <ul class="sub-menu collapse" id="studentsExams">
                <li><a href="{{ route('exam.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Exam</a></li>
                <li><a href="{{ route('exam.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Exams</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#marks" class="nav-link collapsed active">
                <i class="fa fa-check" aria-hidden="true"></i> Marks
            </a>
            <ul class="sub-menu collapse" id="marks">
                <li><a href="{{ route('mark.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Mark</a></li>
                <li><a href="{{ route('mark.index') }}"
                    class="link-dark d-inline-flex text-decoration-none rounded">Manage Marks</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#attendances" class="nav-link collapsed active">
                <i class="fa-solid fa-person-walking"></i> Attendances
            </a>
            <ul class="sub-menu collapse" id="attendances">
                <li><a href="{{ route('attendance.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Attendance</a></li>
                <li><a href="{{ route('attendance.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Attendances</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#studentPrograms" class="nav-link collapsed active">
                <i class="fas fa-chalkboard-teacher"></i> Programs
            </a>
            <ul class="sub-menu collapse" id="studentPrograms">
                <li><a href="{{ route('subject.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Program</a></li>
                <li><a href="{{ route('subject.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Programs</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#staffSalaries" class="nav-link collapsed active">
                <i class="fa-solid fa-sack-dollar"></i> Staff Salaries
            </a>
            <ul class="sub-menu collapse" id="staffSalaries">
                <li><a href="{{ route('subject.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Salary</a></li>
                <li><a href="{{ route('subject.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Salaries</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#staffHolidays" class="nav-link collapsed active">
               <i class="fas fa-umbrella-beach"></i> Staff Holidays
            </a>
            <ul class="sub-menu collapse" id="staffHolidays">
                <li><a href="{{ route('subject.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Holiday</a></li>
                <li><a href="{{ route('subject.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Holidays</a></li>
            </ul>
        </li>
        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#payments" class="nav-link collapsed active">
              <i class="fab fa-cc-visa"></i>  Payments
            </a>
            <ul class="sub-menu collapse" id="payments">
                <li><a href="{{ route('subject.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Payment</a></li>
                <li><a href="{{ route('subject.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Payments</a></li>
            </ul>
        </li>

        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#studentHostels" class="nav-link collapsed active">
               <i class="fas fa-bed"></i> Student Hostels
            </a>
            <ul class="sub-menu collapse" id="studentHostels">
                <li><a href="{{ route('subject.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Hostel</a></li>
                <li><a href="{{ route('subject.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Hostels</a></li>
            </ul>
        </li>

        <li class="mb-1">
            <a href="#" data-toggle="collapse" data-target="#products" class="nav-link collapsed active">
                <i class="fa fa-gavel" aria-hidden="true"></i>  Liquidations
            </a>
            <ul class="sub-menu collapse" id="products">
                <li><a href="{{ route('subject.create') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Create Liquidation</a></li>
                <li><a href="{{ route('subject.index') }}"
                        class="link-dark d-inline-flex text-decoration-none rounded">Manage Liquadations</a></li>
            </ul>
        </li>

    </ul>
</nav>
