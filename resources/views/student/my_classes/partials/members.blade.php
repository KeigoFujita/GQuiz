<div class="tab-pane fade show" id="list-members" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card">
        <div class="card-body">
            <div class="px-2 pb-3">

                <ul class="list-group">
                    @foreach($members as $member)
                        <li class="list-group-item border d-flex align-items-center">
                            <div class="portrait-sm mr-3" style="background-color: {{ $member->color }};">
                                <p class="default-font my-0">
                                    {{ $member->two_initials }}</p>
                            </div>
                            {{ $member->full_name }}
                        </li>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
</div>
