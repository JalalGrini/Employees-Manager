<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateures;
use App\Models\Document;
use App\Models\News;
use App\Models\Leave;
use App\Models\Attendance;
use App\Models\logs;
use Carbon\Carbon;

class Manager extends Controller
{
    public function dashboard()
    {
        $employeeId = session('employe_id');
        $employee = Utilisateures::find($employeeId);
        $activeEmployees = Utilisateures::whereIn('etat', ['Actif'])->count();
        $inactiveemployees = Utilisateures::whereIn('etat', ['Inactif'])->count();
        $documentreqs = Document::whereIn('status', ['pending'])->count();
        $news = News::latest()->take(3)->get();
        return view('Manager.layouts.dashboard', compact('employee', 'activeEmployees', 'documentreqs', 'inactiveemployees', 'news'));
    }
    public function allemployees()
    {
        $employees = Utilisateures::paginate(6);
        return view('Manager.layouts.allemployees', compact('employees'));
    }
    public function viewprofile($id)
    {
        $employee = Utilisateures::find($id);
        return view('Manager.layouts.viewprofile', compact('employee'));
    }
    public function searchEmployees(Request $request)
    {
        $search = $request->query('search', '');
        $employees = Utilisateures::when($search, function ($query, $search) {
            return $query->where('nomComplet', 'like', '%' . $search . '%');
        })->paginate(2);

        $employees->appends(['search' => $search]);

        return view('Manager.layouts.searchresults', compact('employees', 'search'));
    }
    public function documentsreqs()
    {
        $documents = Document::whereIn('status', ['pending', 'in_progress', 'approved'])->paginate(8);
        return view('Manager.layouts.documentRequests', compact('documents'));
    }
       public function leavesreqs()
    {
        $today = Carbon::today();
        $leaves = Leave::whereDate('end_date', '>=', $today)->paginate(8);
        return view('Manager.layouts.allleaves', compact('leaves'));
    }
        public function mylogs()
    {
        $logs = logs::where('user_id', session('employe_id'))->latest()->paginate(8);
        return view('Manager.layouts.mylogs', compact('logs'));
    }
        public function alllogs()
    {
        $myDepartment = Utilisateures::where('id', session('employe_id'))->value('Departement');

        $logs = logs::whereHas('user', function ($query) use ($myDepartment) {
            $query->where('Departement', $myDepartment);
        })->with('user') 
        ->latest()
        ->paginate(8);
        return view('Manager.layouts.alllogs', compact('logs'));
    }
}
