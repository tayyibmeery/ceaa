<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\{
    AboutIconController,
    UserController,
    JobPostController,

    ApplicationController,
    CoreValuesController,
    DashboardController,
    ExcelController,
    FrontEndController,
    HomeController,
    TestResultController,
    SlipAndResultController,
    ResultListController,
    SlidersController,
    HighLightControllers,
    JobPostFrontController,
    OurServicesController,
    PageController,
    ProjectController,
    SocialIconController,
    TremController,
    RollNumberController
};


Route::get('/', [FrontEndController::class, 'index'])->name('front');
Route::get('/vision', [FrontEndController::class, 'vision'])->name('vision');
Route::get('/servises', [FrontEndController::class, 'servises'])->name('servises');
// Route::get('/projects', [FrontEndController::class, 'projects'])->name('projects');



Route::get('/projects', [ProjectController::class, 'projects'])->name('projects.index');
Route::get('projects/new', [ProjectController::class, 'newProjects'])->name('projects.new');
Route::get('projects/all', [ProjectController::class, 'allProjects'])->name('projects.all');
Route::get('projects/ongoing', [ProjectController::class, 'ongoingProjects'])->name('projects.ongoing');
Route::get('projects/completed', [ProjectController::class, 'completedProjects'])->name('projects.completed');
Route::get('projects/latest', [ProjectController::class, 'latestProjects'])->name('projects.latest');


Route::get('/applicationstatus', [FrontEndController::class, 'applicationstatus'])->name('applicationstatus');


Route::get('page/{slug}', [FrontEndController::class, 'pages'])->name('page.show');
Route::get('ourtrem/{slug}', [FrontEndController::class, 'ourtrem'])->name('trem.show');
Route::get('/profile', [FrontEndController::class, 'profileshow'])->name('profile');
Route::get('/profile/edit', [FrontEndController::class, 'profileedit'])->name('profile.edit');
Route::put('/profile', [FrontEndController::class, 'profileupdate'])->name('profile.update');
Route::get('/postsjob/{id}', [JobPostFrontController::class, 'show'])->name('postsjob.show');
Route::post('/postsjob/{id}/apply', [JobPostFrontController::class, 'apply'])->name('postsjob.apply');


Route::get('/roll-number-slip', [SlipAndResultController::class, 'index'])->name('roll-number-slip.index');
Route::post('/roll-number-slip', [SlipAndResultController::class, 'search'])->name('roll-number-slip.search');
Route::get('/roll-number-slip/download/{id}', [SlipAndResultController::class, 'download'])->name('roll-number-slip.download');


Route::get('/candidate_result', [SlipAndResultController::class, 'resultindex'])->name('candidate_result.result');
Route::post('/candidate_result', [SlipAndResultController::class, 'searchresult'])->name('candidate_result.search');
Route::get('/candidate_result/download/{id}', [SlipAndResultController::class, 'downloadresult'])->name('candidate_result.download');













// admin routes

Auth::routes();

Route::middleware(['auth', 'isadmin'])->group(
    function () {
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resources([
            'users' => UserController::class,
            'job-posts' => JobPostController::class,
            'applications' => ApplicationController::class,
            'tests' => TestResultController::class,
            'results' => ResultListController::class,
            'slider' => SlidersController::class,
            'lights' => HighLightControllers::class,
            'socialicon' => SocialIconController::class,
            'abouticon' => AboutIconController::class,
            'corevalues' => CoreValuesController::class,
            'pages' => PageController::class,
            'trems' => TremController::class,
            'ourservices' => OurServicesController::class,
            'rollnumber' => RollNumberController::class,
        ]);
        Route::get('rollnumber/{id}/download', [RollNumberController::class, 'download'])->name('rollnumber.download');
        Route::get('rollnumber/{id}/print', [RollNumberController::class, 'print'])->name('rollnumber.print');
        Route::get('exportss', [RollNumberController::class, 'app'])->name('rollnumber.exports');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/export', [ExcelController::class, 'exportToExcel'])->name('applications.export');
        Route::get('/result/upload', [ResultListController::class, 'results'])->name('results.form');
        Route::post('/results/upload', [ResultListController::class, 'uploadResults'])->name('results.upload');
        Route::get('/export-results', [ResultListController::class, 'exportResults'])->name('results.export');
    }
);

// Project Routes

