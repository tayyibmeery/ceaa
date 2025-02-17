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
    ExcelController,
    FrontEndController,
    HomeController,
    TestResultController,
    RollNumberSlipController,
    ResultListController,
    SlidersController,
    HighLightControllers,
    JobPostFrontController,
    OurServicesController,
    PageController,
    SocialIconController
};




Route::get('/', [FrontEndController::class, 'index'])->name('front');
Route::get('/vision', [FrontEndController::class, 'vision'])->name('vision');
Route::get('/servises', [FrontEndController::class, 'servises'])->name('servises');
Route::get('/projects', [FrontEndController::class, 'projects'])->name('projects');
Route::get('/applicationstatus', [FrontEndController::class, 'applicationstatus'])->name('applicationstatus');
Route::get('/slip', [FrontEndController::class, 'roll_slip'])->name('roll_slip');
Route::get('/candidate_results', [FrontEndController::class, 'candidate_results'])->name('candidate.results');
Route::get('page/{slug}', [FrontEndController::class, 'pages'])->name('page.show');

Route::get('/profile', [FrontEndController::class, 'profileshow'])->name('profile');
Route::get('/profile/edit', [FrontEndController::class, 'profileedit'])->name('profile.edit');
Route::put('/profile', [FrontEndController::class, 'profileupdate'])->name('profile.update');

Route::get('/postsjob/{id}', [JobPostFrontController::class, 'show'])->name('postsjob.show');
Route::post('/postsjob/{id}/apply', [JobPostFrontController::class, 'apply'])->name('postsjob.apply');














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
            'ourservices' => OurServicesController::class,

        ]);
        Route::get('/dashboard', function () {
            return view('backend\dashboard\dashboard');
        })->name('dashboard');
        Route::get('/export', [ExcelController::class, 'exportToExcel'])->name('applications.export');
        Route::get('/result/upload', [ResultListController::class, 'results'])->name('results.form');
        Route::post('/results/upload', [ResultListController::class, 'uploadResults'])->name('results.upload');
        Route::get('/export-results', [ResultListController::class, 'exportResults'])->name('results.export');
        Route::get('/roll-number-slip', [RollNumberSlipController::class, 'search'])->name('roll-number-slip.search');
        Route::post('/roll-number-slip', [RollNumberSlipController::class, 'search']);
        Route::get('/roll-number-slip/download/{id}', [RollNumberSlipController::class, 'download'])->name('roll-number-slip.download');
        // Route::get('/result-card', [RollNumberSlipController::class, 'search'])->name('roll-number-slip.search');
        Route::post('/result-card', [RollNumberSlipController::class, 'search']);
        // Route::get('/result-card/download/{id}', [RollNumberSlipController::class, 'download'])->name('roll-number-slip.download');
    }
);
