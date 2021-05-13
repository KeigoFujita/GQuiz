<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-messages-list">
    <div class="card">
        <div class="card-body px-4 py-4">

            <p class="mb-3" style="font-size: 1.2rem;">Edit Class</p>

            <form action="{{ route('teachers.my-classes-update',$class) }}" method="post" class="mb-4">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="class_code">Class Name</label>
                    <input type="text" class="form-control" name="class_code" value="{{ $class->class_code }}">
                </div>
    
                <div class="form-group">
                    <label for="class_code">Class Schedule</label>
                    <input type="text" class="form-control" name="class_schedule"  value="{{ $class->schedule }}">
                </div>
    
                <button type="submit" class="btn btn-sm btn-success">Save Changes</button>    
            </form>

            <div class="dropdown-divider"></div>

            <p class="my-3" style="font-size: 1.2rem;">Danger Zone</p>

            <div class="alert alert-danger fade show d-flex justify-content-between">
                <div>
                    <p class="mb-0 font-weight-bold">Archive this class</p>
                    <p class="mb-0">Mark this class as archived and read-only.</p>
                </div>
                <div class="d-flex align-items-center">
                    <form action="{{ route('teachers.my-classes-archive',$class) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Archive</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>