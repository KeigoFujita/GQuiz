<div class="accordion side-bar pt-3" id="accordion">

    <p class="ml-3 mb-3 text-white">Options</p>


    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-dashboard" aria-expanded="true"
        aria-controls="collapse-dashboard">
        <div class="header" id="heading-dashboard">
            <p><i class="fa fa-tachometer"></i>Dashboard </p>
        </div>

        <div id="collapse-dashboard" class="collapse collapsed" aria-labelledby="heading-dashboard"
            data-parent="#accordion">
            <div class="content">
                <a href="{{ route('dashboard.index') }}" class="btn btn-link collapsed">
                    View Dashboard
                </a>
            </div>
        </div>
    </div>

    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-teacher" aria-expanded="false"
        aria-controls="collapse-teacher">
        <div class="header" id="heading-teacher">
            <p><i class="fa fa-users" aria-hidden="true"></i>Teacher</p>
        </div>
        <div id="collapse-teacher" class="collapse" aria-labelledby="heading-teacher" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('teachers.index') }}" class="btn btn-link collapsed">
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
        <div class="header" id="heading-student">
            <p><i class="fa fa-graduation-cap" aria-hidden="true"></i></i>Student</p>
        </div>
        <div id="collapse-student" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('students.index') }}" class="btn btn-link collapsed">
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
        <div class="header" id="heading-user">
            <p> <i class="fa fa-user-circle-o"></i>Account</p>
        </div>
        <div id="collapse-user" class="collapse" aria-labelledby="heading-user" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('users.index') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
        </div>
    </div>

</div>
