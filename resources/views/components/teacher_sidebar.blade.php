<div class="accordion side-bar pt-3" id="accordion">

    <p class="ml-3 mb-3 text-white">Options</p>
    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-student" aria-expanded="false"
        aria-controls="collapse-student">
        <div class="header" id="heading-student">
            <p><i class="fa fa-graduation-cap" aria-hidden="true"></i></i>My Students</p>
        </div>
        <div id="collapse-student" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('teachers.MyStudents',Auth::user()->employee) }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
        </div>
    </div>

    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-section" aria-expanded="false"
        aria-controls="collapse-section">
        <div class="header" id="heading-section">
            <p><i class="fa fa-id-card-o" aria-hidden="true"></i></i>My Advisory Sections</p>
        </div>
        <div id="collapse-section" class="collapse" aria-labelledby="heading-section" data-parent="#accordion">

            @foreach (Auth::user()->employee->sections as $section)
            <div class="content">
                <a href="{{ route('sections.show',$section)}}" class="btn btn-link collapsed">
                    {{ $section->section_name }}
                </a>
            </div>
            @endforeach
        </div>
    </div>


    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-class" aria-expanded="false"
        aria-controls="collapse-class">
        <div class="header" id="heading-class">
            <p><i class="fa fa-pencil"></i>My Classes</p>
        </div>
        <div id="collapse-class" class="collapse" aria-labelledby="heading-class" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('teachers.MyClasses',Auth::user()->employee) }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
        </div>
    </div>


</div>