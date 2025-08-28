<div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar-sturborn-thing" style="width: 250px;">
    <a href="{{ url('/') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none">
        <span class="fs-4">Student Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto" id="student-sidebar">
        <li class="nav-item">
            <a href="{{ route('student.dashboard') }}" class="nav-link">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('student.courses') }}" class="nav-link">
                My Courses
            </a>
        </li>
        <li>
            <a href="{{ route('student.live-classes.index') }}" class="nav-link">
                Live Class
            </a>
        </li>
        <li>
            <a href="{{ route('student.chat-room') }}" class="nav-link" target="_blank">
                Chat Room
            </a>
        </li>
        <li>
            <a href="{{ route('student.my-courses') }}" class="nav-link">
                Events
            </a>
        </li>
        <li>
            <a href="{{ url('/student/assets') }}" class="nav-link">
                Assets
            </a>
        </li>
        <li>
            <a href="{{ route('student.assignments.index') }}" class="nav-link">
                Assignments
            </a>
        </li>
        <li>
            <a href="{{ route('student.scores.index') }}" class="nav-link">
                Scores
            </a>
        </li>
        <li>
            <a href="{{ url('/student/certificates') }}" class="nav-link">
                Certificates
            </a>
        </li>
        <li>
            <a href="{{ url('/student/community') }}" class="nav-link">
                Communities
            </a>
        </li>
        <li>
            <a href="{{ route('student.profile.picture') }}" class="nav-link">
                Profile
            </a>
        </li>
        <li>
            <a href="{{ url('/student/settings') }}" class="nav-link">
                Settings
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}"
               class="nav-link text-danger"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarLinks = document.querySelectorAll('#student-sidebar .nav-link');
        const currentUrl = window.location.href;

        sidebarLinks.forEach(link => {
            if (currentUrl === link.href || currentUrl.startsWith(link.href)) {
                link.classList.add('active');
                link.classList.remove('text-dark');
            } else {
                link.classList.remove('active');
                if (!link.classList.contains('text-danger')) {
                    link.classList.add('text-dark');
                }
            }
        });
    });
</script>
