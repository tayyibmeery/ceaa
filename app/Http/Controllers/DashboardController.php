<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobPost;
use App\Models\User;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalApplications = Application::count();
        $totalJobs = JobPost::count();
        $totalCandidates = User::where('role', 'candidate')->count();
        $totalTests = Test::count();

        // Get active jobs
        $activeJobs = JobPost::where('status', 'active')
            ->where('application_deadline', '>=', now())
            ->count();

        // Get applications statistics
        $applicationStats = Application::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        // Get recent applications
        $recentApplications = Application::with(['user', 'jobPost'])
            ->latest()
            ->take(5)
            ->get();

        // Get upcoming tests
        $upcomingTests = Test::with('jobPost')
            ->where('test_date', '>=', now())
            ->orderBy('test_date')
            ->take(5)
            ->get()
            ->map(function ($test) {
                $test->test_date = Carbon::parse($test->test_date);
                return $test;
            });

        // Get monthly applications data for chart
        $monthlyApplications = Application::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as count')
        )
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->get();

        return view('backend.dashboard.dashboard', compact(
            'totalApplications',
            'totalJobs',
            'totalCandidates',
            'totalTests',
            'activeJobs',
            'applicationStats',
            'recentApplications',
            'upcomingTests',
            'monthlyApplications'
        ));
    }
}
