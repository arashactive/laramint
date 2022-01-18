<?php

use App\Http\Controllers\Acl\PermissionController;
use App\Http\Controllers\Acl\RoleController;
use App\Http\Controllers\Acl\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ForumPostController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TermController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});





/*
|--------------------------------------------------------------------------
| Web Routes for only superAdmin Access
|--------------------------------------------------------------------------
*/
Route::middleware(['verified'])->group(function () {
    Route::resource('department', DepartmentController::class);
    Route::resource('course', CourseController::class);
    Route::resource('term', TermController::class);
    Route::resource('session', SessionController::class);
    Route::resource('file', FileController::class);
    Route::resource('activity', ActivityController::class);
    Route::resource('document', DocumentController::class);
    Route::resource('quiz', QuizController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('rubric', RubricController::class);
    Route::resource('feedback', FeedbackController::class);



    // signle functions:
    Route::get('/document/order/{from}/{move}', [DocumentController::class , 'orderChangeFiles'])->name("changeOrderFile");
    Route::get('/document/file/add/{document}/{file}', [DocumentController::class , 'addFileToDocument'])->name("addFileToDocument");
    Route::get('/document/file/delete/{documentFile}', [DocumentController::class , 'deleteFileAsDocument'])->name("deleteFileDocument");
    Route::get('/session/document/{session}/{active_id}', [SessionController::class , 'addDocumentToSession'])->name("addDocumentToSession");
    Route::get('/session/order/{from}/{move}', [SessionController::class , 'changeOrderSessionable'])->name("changeOrderSessionable");
    Route::get('/session/quiz/{session}/{active_id}', [SessionController::class , 'addQuizToSession'])->name("addQuizToSession");
    Route::get('/session/delete/{session_id}', [SessionController::class , 'deleteActivityAsSession'])->name("deleteActivityAsSession");

    // rubric add to session
    Route::get('/session/rubric/{session}/{active_id}', [SessionController::class , 'addRubricToSession'])->name("addRubricToSession");

    // Quiz Question Relationship
    Route::get('/quiz/order/{from}/{move}', [QuizController::class , 'orderChangeQuestion'])->name("orderChangeQuestion");
    Route::get('/quiz/question/add/{parent}/{question}', [QuizController::class , 'addQuestionToQuiz'])->name("addQuestionToQuiz");
    Route::get('/quiz/question/delete/{quizQuestion}', [QuizController::class , 'deleteQuestionAsQuiz'])->name("deleteQuestionAsQuiz");
    
    // feedback question relationship
    Route::get('/feedback/order/{from}/{move}', [FeedbackController::class , 'orderChangeQuestionFeedback'])->name("orderChangeQuestionFeedback");
    Route::get('/feedback/question/add/{parent}/{question}', [FeedbackController::class , 'addQuestionToFeedback'])->name("addQuestionToFeedback");
    Route::get('/feedback/question/delete/{feedbackQuestion}', [FeedbackController::class , 'deleteQuestionAsFeedback'])->name("deleteQuestionAsFeedback");
    Route::get('/session/feedback/{session}/{active_id}', [SessionController::class , 'addFeedbackToSession'])->name("addFeedbackToSession");
});


// ACL Route
Route::middleware(['verified'])->group(function () {
    Route::resource('user', UserController::class)->middleware('role:Super-Admin');
    Route::resource('role', RoleController::class)->middleware('role:Super-Admin');
    Route::resource('permission', PermissionController::class)->middleware('role:Super-Admin');
    Route::post('role/permission/{role}', [RoleController::class, 'permission'])->name("role_permissions");
});
