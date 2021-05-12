<?php

namespace App\Http\Livewire;

use App\Department;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Illuminate\Support\Str;

class DepartmentSearch extends Component
{

    public $search = "";
    public $departments;

    public function render()
    {
        return view('livewire.department-search');
    }

    public function mount($departments)
    {
        $this->departments = $departments;
    }

    public function update()
    {
        $query = Str::of($this->search)->lower()->trim();

        if (strlen($query) == 0) {
            $this->departments = Department::all()->except(1);
            return;
        }


        $departments = Department::select('id', 'department_name')->get()->except(1);
        $this->departments = $departments->map(function ($item) use ($query) {

            if (
                Str::contains(Str::of($item->department_name)->lower(), $query) ||
                Str::contains(Str::of(isset($item->role->assigned_officer->full_name) ? $item->role->assigned_officer->full_name : "N / A")->lower(), $query) ||
                Str::contains(Str::of(isset($item->role->role_name) ? $item->role->role_name : "N / A")->lower(), $query)
            ) {
                return $item;
            }
            return null;
        })->filter(function ($value) {
            return !is_null($value);
        });
        $this->departments = new Collection($this->departments);
    }
}