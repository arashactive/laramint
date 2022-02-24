<?php

use App\Http\Controllers\Acl\PermissionController;
use App\Http\Controllers\Acl\RoleController;
use App\Http\Controllers\Acl\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Front\CourseController as FrontCourseController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\learn\documentLearnerController;
use App\Http\Controllers\learn\feedbackLearnerController;
use App\Http\Controllers\learn\quizLearnerController;
use App\Http\Controllers\learn\rubricLearnerController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\Panel\MyCourseController;
use App\Http\Controllers\ParticipantController;
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

Route::get('/', [FrontController::class, 'index'])->name('home');


Route::group(['prefix' => 'front', 'as' => 'front.'], function () {
    Route::get('/courses', [FrontCourseController::class, 'courses'])->name('courses');
    Route::get('/course/{course_id}', [FrontCourseController::class, 'course'])->name('course');
});


/*
|--------------------------------------------------------------------------
| Web Routes for learner access
|--------------------------------------------------------------------------
*/
Route::prefix('learn')->middleware(['verified'])->group(function () {
    Route::get('/feedback/{term}/{activity}', [feedbackLearnerController::class, 'show'])->name('feedbackLearner');
    Route::get('/rubric/{term}/{activity}', [rubricLearnerController::class, 'show'])->name('rubricLearner');
    Route::get('/quiz/{term}/{activity}', [quizLearnerController::class, 'show'])->name('quizLearner');
    Route::get('/document/{term}/{activity}', [documentLearnerController::class, 'show'])->name('documentLearner');
    
    Route::get('/file/{term}/{activity}', [documentLearnerController::class, 'file'])->name('fileLearner');

    // my course route
    Route::get('my/course', [MyCourseController::class, 'myCourse'])->name('myCourse');
    Route::get('my/course/{term}', [MyCourseController::class, 'learn'])->name('learningCourse');
});


/*
|--------------------------------------------------------------------------
| Web Routes for only Admin Access
|--------------------------------------------------------------------------
*/
Route::prefix('panel')->middleware(['verified'])->group(function () {

    Route::get('/dashboard', [GeneralController::class, 'dashboard'])->name('dashboard');

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
    Route::get('logs', [LogController::class, 'index'])->name('logs');

    Route::get('/document/order/{from}/{move}', [DocumentController::class, 'orderChangeFiles'])->name("changeOrderFile");
    Route::get('/document/file/add/{document}/{file}', [DocumentController::class, 'addFileToDocument'])->name("addFileToDocument");
    Route::get('/document/file/delete/{documentFile}', [DocumentController::class, 'deleteFileAsDocument'])->name("deleteFileDocument");
    Route::get('/session/document/{session}/{active_id}', [SessionController::class, 'addDocumentToSession'])->name("addDocumentToSession");
    Route::get('/session/order/{from}/{move}', [SessionController::class, 'changeOrderSessionable'])->name("changeOrderSessionable");
    Route::get('/session/quiz/{session}/{active_id}', [SessionController::class, 'addQuizToSession'])->name("addQuizToSession");
    Route::get('/session/delete/{session_id}', [SessionController::class, 'deleteActivityAsSession'])->name("deleteActivityAsSession");

    // rubric add to session
    Route::get('/session/rubric/{session}/{active_id}', [SessionController::class, 'addRubricToSession'])->name("addRubricToSession");

    // Quiz Question Relationship
    Route::get('/quiz/order/{from}/{move}', [QuizController::class, 'orderChangeQuestion'])->name("orderChangeQuestion");
    Route::get('/quiz/question/add/{parent}/{question}', [QuizController::class, 'addQuestionToQuiz'])->name("addQuestionToQuiz");
    Route::get('/quiz/question/delete/{quizQuestion}', [QuizController::class, 'deleteQuestionAsQuiz'])->name("deleteQuestionAsQuiz");

    // feedback question relationship
    Route::get('/feedback/order/{from}/{move}', [FeedbackController::class, 'orderChangeQuestionFeedback'])->name("orderChangeQuestionFeedback");
    Route::get('/feedback/question/add/{parent}/{question}', [FeedbackController::class, 'addQuestionToFeedback'])->name("addQuestionToFeedback");
    Route::get('/feedback/question/delete/{feedbackQuestion}', [FeedbackController::class, 'deleteQuestionAsFeedback'])->name("deleteQuestionAsFeedback");
    Route::get('/session/feedback/{session}/{active_id}', [SessionController::class, 'addFeedbackToSession'])->name("addFeedbackToSession");

    // Participant Routes
    Route::get('/participant/add/{term_id}/{user_id}/{role_id}', [ParticipantController::class, 'addParticipantToTerm'])->name("addParticipantToTerm");
    Route::get('/participant/delete/{term}/{user}', [ParticipantController::class, 'deleteParticipantAsTerm'])->name("deleteParticipantAsTerm");

    // add session  to term
    Route::get('/addSessionToTerm/{term}/{session}', [TermController::class, 'addSessionToTerm'])->name("addSessionToTerm");
    Route::get('/orderChangeSession/{from}/{move}', [TermController::class, 'orderChangeSession'])->name("orderChangeSession");
    Route::get('/deleteSessionAsTerm/{term}/{session}', [TermController::class, 'deleteSessionAsTerm'])->name("deleteSessionAsTerm");

    // ACL Route
    Route::resource('user', UserController::class)->middleware('role:Super-Admin');
    Route::resource('role', RoleController::class)->middleware('role:Super-Admin');
    Route::resource('permission', PermissionController::class)->middleware('role:Super-Admin');
    Route::post('role/permission/{role}', [RoleController::class, 'permission'])->name("role_permissions");
});
