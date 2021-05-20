<div class="accordion side-bar pt-0" id="accordion" style="background-color:#14394C; opacity: 1;">



    <div class=" tab-menu" data-toggle="collapse" data-target="#collapse-dashboard" aria-expanded="true"
        aria-controls="collapse-dashboard">
        <div class="header" id="heading-dashboard" style="background-color:#14394C;; opacity: 1;">
            <p><i class=" fa fa-tachometer"></i>Dashboard </p>
        </div>

        <div id="collapse-dashboard" class="collapse collapsed" aria-labelledby="heading-dashboard"
            data-parent="#accordion">
            <div class="content">
                <a href="{{ route('dashboard.index.blade.php') }}" class="btn btn-link collapsed">
                    View Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-teacher" aria-expanded="false"
        aria-controls="collapse-teacher">
        <div class="header" id="heading-teacher" style="background-color:#14394C;; opacity: 1;">
            <p><i class="fa fa-users" aria-hidden="true"></i>Teacher</p>
        </div>
        <div id="collapse-teacher" class="collapse" aria-labelledby="heading-teacher" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('teachers.index.blade.php') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('employees.create') }}" class="btn btn-link collapsed">
                    Add Teacher
                </a>
            </div>
        </div>
    </div>
    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-student" aria-expanded="false"
        aria-controls="collapse-student">
        <div class="header" id="heading-student" style="background-color:#14394C;; opacity: 1;">
            <p><i class="fa fa-graduation-cap" aria-hidden="true"></i></i>Student</p>
        </div>
        <div id="collapse-student" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('students.index.blade.php') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('students.create') }}" class="btn btn-link collapsed">
                    Add Student
                </a>
            </div>
        </div>
    </div>

    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-user" aria-expanded="false"
        aria-controls="collapse-user">
        <div class="header" id="heading-user" style="background-color:#14394C;; opacity: 1;">
            <p> <i class="fa fa-user-circle-o"></i>Account</p>
        </div>
        <div id="collapse-user" class="collapse" aria-labelledby="heading-user" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('users.index.blade.php') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
        </div>
    </div>

</div>
