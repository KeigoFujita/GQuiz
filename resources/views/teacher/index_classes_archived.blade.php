@extends('layouts.teacher-app')

@section('custom-css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500&display=swap" rel="stylesheet">
<style>
    .title{
        font-size: 3rem;
        letter-spacing: -0.01ch;
    }

    .card-header a{
        font-size: 2rem;
        text-decoration: none;
        color: white !important;
        margin-bottom: 0;
    }

    .card-header i{
        font-size: 1rem;
        text-decoration: none;
        color: white !important;
    }

    .card-header a:hover{
        border-bottom: 2px solid white;
        color: white !important;
    }

    .font-inter{
        font-family: 'Inter', sans-serif !important;
    }

    .card-body .heading-text{
        font-weight: 500;
        margin-bottom: 0.5rem !important;
    }

    .card-body .heading-label{
        font-weight: 400;
        color: black !important;
        display: block;
    }
</style>
@endsection


@section('content')
<div class="container-fluid py-5 px-5 font-inter">
    
    <div class="d-flex justify-content-between align-items-center">
        <p class="title mb-5">
            Archived Classes
        </p>
        <div class="d-flex align-items-center justify-content-center">
            <div class="dropdown show mr-2">
                <a class="btn btn-outline-secondary px-4 -py-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter mr-2" aria-hidden="true"></i>
                    Filter
                </a>
              
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('teachers.my-classes') }}">Active</a>
                  <a class="dropdown-item" href="{{ route('teachers.my-classes-archived') }}">Archived</a>
                </div>
            </div>
            
            <div>
                <button type="button" class="btn btn-success" href="#" data-toggle="modal"
                    data-target="#add-modal">
                    <i class="fa fa-plus mr-2" aria-hidden="true"></i> 
                    Add Class
                </button>
    
            </div>
        </div>
    </div>

    @if (session()->has('success'))

    <div class="alert alert-success alert-dismissible fade show">
        {{ session()-> get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    @endif


    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show">
            {{ $error }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endforeach
    @endif

    <div class="row">
        @forelse ($classes as $class)
            <div class="px-3 mb-3">
                <div class="card" style="width: 25rem;">
                    <div class="card-header text-white py-4" style="background-color: {{ $colors[array_rand($colors)] }} !important;">
                        <a href="#" class="mb-0">{{ $class->class_code }}</a>
                        <span class="d-block">{{ $class->schedule }}</span>
                    </div>
                    <div class="card-body">
                    
                    <p class="card-text heading-text text-secondary mb-0">
                        <i class="fa fa-graduation-cap mr-2" aria-hidden="true"  style="width: 1rem;"></i>
                        {{ $class->students->count() === 0 ? 'No ' : $class->students->count() }} enrolled students
                    </p>
                    <p class="card-text heading-text text-secondary mb-0">
                        <i class="fa fa-file-text mr-2" aria-hidden="true" style="width: 1rem;"></i>
                        {{ rand(3,10) }} quizzes made
                    </p>
                    </div>
                    <div class="card-footer py-3">
                        <form action="{{ route('teachers.my-classes-restore',$class) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-sm btn-success" type="submit">
                                <i class="fa fa-refresh mr-2" aria-hidden="true"></i>
                                Restore
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="w-100 card shadow-sm">
                <div class="card-header py-3"></div>
                <div class="card-body">
                    <img src="https://img.icons8.com/cotton/344/empty-box.png" class="d-block mx-auto mb-3" alt="" style="width: 100px;">
                    <p class="text-center" style="font-size: 1.5rem;">You don't have any classes yet!</p>
                </div>
            </div>
        @endforelse
        
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('schoolClass.store')}}" method="post" id="main_form">
                    @csrf
                    <div class="form-group">
                        <label for="class_code">Class Name</label>
                        <input type="text" class="form-control" name="class_code">
                    </div>

                    <div class="form-group">
                        <label for="class_schedule">Class Schedule</label>
                        <input type="text" class="form-control " id="deadline" name="class_schedule">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" form="main_form">Add Class</button>
            </div>
        </div>
    </div>
</div>
@endsection