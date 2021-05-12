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
            {{-- <div class="content">
                <a href="#" class="btn btn-link collapsed">
                    Edit Dashboard
                </a>
            </div> --}}
        </div>
    </div>

    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-semester" aria-expanded="true"
        aria-controls="collapse-semester">
        <div class="header" id="heading-semester">
            <p><i class="fa fa-calendar-o" aria-hidden="true"></i></i>Semester</p>
        </div>

        <div id="collapse-semester" class="collapse collapsed" aria-labelledby="heading-semester"
            data-parent="#accordion">
            <div class="content">
                <a href="{{ route('semesters.index') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
        </div>
    </div>

    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-teacher" aria-expanded="false"
        aria-controls="collapse-teacher">
        <div class="header" id="heading-teacher">
            <p><i class="fa fa-users" aria-hidden="true"></i></i>Teacher</p>
        </div>
        <div id="collapse-teacher" class="collapse" aria-labelledby="heading-teacher" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('teachers.index')}}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('employees.index') }}" class="btn btn-link collapsed">
                    Assign Teachers
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

    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-section" aria-expanded="false"
        aria-controls="collapse-section">
        <div class="header" id="heading-section">
            <p><i class="fa fa-id-card-o" aria-hidden="true"></i></i>Section</p>
        </div>
        <div id="collapse-section" class="collapse" aria-labelledby="heading-section" data-parent="#accordion">
            {{-- <div class="content">
                <a href="{{ route('sections.activeSections')}}" class="btn btn-link collapsed">
            Active Sections
            </a>
        </div> --}}
        <div class="content">
            <a href="{{ route('sections.index')}}" class="btn btn-link collapsed">
                View All
            </a>
        </div>
        <div class="content">
            <a href="{{ route('sections.create') }}" class="btn btn-link collapsed">
                Add Section
            </a>
        </div>
    </div>
</div>

<div class="tab-menu" data-toggle="collapse" data-target="#collapse-subject" aria-expanded="false"
    aria-controls="collapse-subject">
    <div class="header" id="heading-subject">
        <p><i class="fa fa-book" aria-hidden="true"></i></i>Subject</p>
    </div>
    <div id="collapse-subject" class="collapse" aria-labelledby="heading-subject" data-parent="#accordion">
        <div class="content">
            <a href="{{ route('subjects.index') }}" class="btn btn-link collapsed">
                View All
            </a>
        </div>
        <div class="content">
            <a href="{{ route('subjects.create') }}" class="btn btn-link collapsed">
                Add Subject
            </a>
        </div>
    </div>
</div>


<div class="tab-menu" data-toggle="collapse" data-target="#collapse-class" aria-expanded="false"
    aria-controls="collapse-class">
    <div class="header" id="heading-class">
        <p><i class="fa fa-pencil"></i>Class</p>
    </div>
    <div id="collapse-class" class="collapse" aria-labelledby="heading-class" data-parent="#accordion">
        <div class="content">
            <a href="{{ route('schoolClass.index') }}" class="btn btn-link collapsed">
                View All
            </a>
        </div>
        <div class="content">
            <a href="{{ route('schoolClass.create') }}" class="btn btn-link collapsed">
                Add Class
            </a>
        </div>
    </div>
</div>

<div class="tab-menu" data-toggle="collapse" data-target="#collapse-strand" aria-expanded="false"
    aria-controls="collapse-strand">
    <div class="header" id="heading-strand">
        <p><i class="fa fa-cubes"></i>Strand</p>
    </div>
    <div id="collapse-strand" class="collapse" aria-labelledby="heading-strand" data-parent="#accordion">
        <div class="content">
            <a href="{{route('strands.index')}}" class="btn btn-link collapsed">
                View All
            </a>
        </div>
        <div class="content">
            <a href="{{route('strands.create')}}" class="btn btn-link collapsed">
                Add Strand
            </a>
        </div>
    </div>
</div>

<div class="tab-menu" data-toggle="collapse" data-target="#collapse-employee" aria-expanded="false"
    aria-controls="collapse-employee">
    <div class="header" id="heading-employee">
        <p> <i class="fa fa-user-md"></i>Employee </p>
    </div>
    <div id="collapse-employee" class="collapse" aria-labelledby="heading-employee" data-parent="#accordion">
        <div class="content">
            <a href="{{route('employees.index')}}" class="btn btn-link collapsed">
                View All
            </a>
        </div>
        <div class="content">
            <a href="{{route('employees.create')}}" class="btn btn-link collapsed">
                Add Employee
            </a>
        </div>

    </div>
</div>

<div class="tab-menu" data-toggle="collapse" data-target="#collapse-roles" aria-expanded="false"
    aria-controls="collapse-roles">
    <div class="header" id="heading-roles">
        <p> <i class="fa fa-sitemap"></i>Role</p>
    </div>
    <div id="collapse-roles" class="collapse" aria-labelledby="heading-roles" data-parent="#accordion">
        <div class="content">
            <a href="{{route('roles.index')}}" class="btn btn-link collapsed">
                View All
            </a>
        </div>
        <div class="content">
            <a href="{{route('roles.create')}}" class="btn btn-link collapsed">
                Add Role
            </a>
        </div>

    </div>
</div>

<div class="tab-menu" data-toggle="collapse" data-target="#collapse-departments" aria-expanded="false"
    aria-controls="collapse-departments">
    <div class="header" id="heading-departments">
        <p> <i class="fa fa-tasks"></i>Department</p>
    </div>
    <div id="collapse-departments" class="collapse" aria-labelledby="heading-departments" data-parent="#accordion">
        <div class="content">
            <a href="{{route('departments.index')}}" class="btn btn-link collapsed">
                View All
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

{{-- <div class="tab-menu" data-toggle="collapse" data-target="#collapse-logs" aria-expanded="false"
    aria-controls="collapse-logs">
    <div class="header" id="heading-logs">
        <p> <i class="fa fa-user"></i>Logs </p>
    </div>
    <div id="collapse-logs" class="collapse" aria-labelledby="heading-logs" data-parent="#accordion">
        <div class="content">
            <a href="#" class="btn btn-link collapsed">
                View All
            </a>
        </div>
    </div>
</div> --}}

</div>
