<div class="accordion side-bar pt-0" id="accordion">



    <div class=" tab-menu" data-toggle="collapse" data-target="#collapse-dashboard" aria-expanded="true"
        aria-controls="collapse-dashboard">
        <div class="header" id="heading-dashboard">
            <p><i class=" fa fa-tachometer"></i>Dashboard </p>
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
            <p><i class="fa fa-product-hunt" aria-hidden="true"></i>Products</p>
        </div>
        <div id="collapse-teacher" class="collapse" aria-labelledby="heading-teacher" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('teachers.index') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('employees.create') }}" class="btn btn-link collapsed">
                    Add Product
                </a>
            </div>
        </div>
    </div>
    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-student" aria-expanded="false"
        aria-controls="collapse-student">
        <div class="header" id="heading-student">
            <p><i class="fa fa-car" aria-hidden="true"></i></i>Suppliers</p>
        </div>
        <div id="collapse-student" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('students.index') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('students.create') }}" class="btn btn-link collapsed">
                    Add Supplier
                </a>
            </div>
        </div>
    </div>

    {{--  Transactions  --}}
    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-transactions" aria-expanded="false"
         aria-controls="collapse-student">
        <div class="header" id="heading-student">
            <p><i class="fa fa-money" aria-hidden="true"></i></i>Transactions</p>
        </div>
        <div id="collapse-transactions" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('students.index') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('students.create') }}" class="btn btn-link collapsed">
                    Manage Transactions
                </a>
            </div>
        </div>
    </div>

    {{--  Inventory  --}}
    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-inventories" aria-expanded="false"
         aria-controls="collapse-student">
        <div class="header" id="heading-student">
            <p><i class="fa fa-home" aria-hidden="true"></i></i>Inventory</p>
        </div>
        <div id="collapse-inventories" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('students.index') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('students.create') }}" class="btn btn-link collapsed">
                    Manage Inventory
                </a>
            </div>
        </div>
    </div>

    {{--  Reports  --}}
    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-reports" aria-expanded="false"
         aria-controls="collapse-student">
        <div class="header" id="heading-student">
            <p><i class="fa fa-book" aria-hidden="true"></i></i>Reports</p>
        </div>
        <div id="collapse-reports" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('students.index') }}" class="btn btn-link collapsed">
                    View All
                </a>
            </div>
            <div class="content">
                <a href="{{ route('students.create') }}" class="btn btn-link collapsed">
                    Create Report
                </a>
            </div>
        </div>
    </div>

    {{--  Settings  --}}
    <div class="tab-menu" data-toggle="collapse" data-target="#collapse-settings" aria-expanded="false"
         aria-controls="collapse-student">
        <div class="header" id="heading-student">
            <p><i class="fa fa-cog" aria-hidden="true"></i></i>Settings</p>
        </div>
        <div id="collapse-settings" class="collapse" aria-labelledby="heading-student" data-parent="#accordion">
            <div class="content">
                <a href="{{ route('students.index') }}" class="btn btn-link collapsed">
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

</div>
