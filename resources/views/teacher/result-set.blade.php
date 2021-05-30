<div class="card">
    <div class="card-body">
        @forelse($students as $student)
        <div class="d-flex justify-content-between {{ $loop->last ? 'mb-0' : 'mb-3' }}">
            <div class="portrait-sm" style="background-color: {{ $student->color }};">
                <p class="default-font my-0">
                    {{ $student->two_initials }}</p>
            </div>
            <div class="px-3" style="flex-grow: 1;">
                <p class="mb-0" style="font-size: 1.2rem; font-weight: 500 !important;">{{ $student->full_name }}</p>
                <p style="font-size: 0.8rem;" >{{ $student->lrn }}</p>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-sm btn-success px-3 py-2" onclick="inviteStudent({{ $student->id }}, '{{ $student->full_name }}', {{ $student->lrn }})">Invite</button>
            </div>
        </div>
        @empty
        <div class="d-flex justify-content-center align-items-center">
            <p class="mb-0">No student found.</p>
        </div>
        @endforelse
    </div>
</div>