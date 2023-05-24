<?php

use App\Http\Controllers\Acl\PermissionController;
use App\Http\Controllers\Acl\RoleController;
use App\Http\Controllers\Acl\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Admin\Badges\BadgeController;
use App\Http\Controllers\Admin\Menu\CourseManagmentController;
use App\Http\Controllers\ConfigurationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Education\CourseController;
use App\Http\Controllers\Education\DepartmentController;
use App\Http\Controllers\Education\Term\TermController;
use App\Http\Controllers\Education\Term\TermSessionController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Front\CourseController as FrontCourseController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\learn\WorkoutController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\Mentors\MentorCommentsController;
use App\Http\Controllers\Mentors\MyLearnerController;
use App\Http\Controllers\Panel\MyCourseController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RubricController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SettingController;
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
    Route::get('/plans', [FrontCourseController::class, 'plans'])->name('plans');
});


/*
|--------------------------------------------------------------------------
| Web Routes for learner access
|--------------------------------------------------------------------------
*/
Route::prefix('learn')->middleware(['verified'])->group(function () {

    Route::get('/task/{participant}/{sessionable}', [WorkoutController::class, 'task'])->name('taskLearner');
    Route::post('/task/{participant}/{sessionable}', [WorkoutController::class, 'prepared'])->name('taskLearnerPrepared');
    Route::post('/quiz/workout', [WorkoutController::class, 'workout'])->name('quizWorkout');

    // my course route
    Route::get('my/course', [MyCourseController::class, 'myCourse'])->name('myCourse');
    Route::get('my/course/{participant}', [MyCourseController::class, 'learn'])->name('learningCourse');

    // doing workout || excercise || quiz
    Route::get('/completeAndNext/{workout}', [WorkoutController::class, 'completedAndNext'])->name('completedAndNext');
});


/*
|--------------------------------------------------------------------------
| Web Routes for mentors and super-visor access
|--------------------------------------------------------------------------
*/
Route::prefix('mentor')->middleware(['verified'])->group(function () {

    Route::get('/learners', [MyLearnerController::class, 'myLearners'])->name('myLearners');
    Route::get('/learner/{user}', [ParticipantController::class, 'participantTerms'])->name('learnerShowTerms');
    Route::get('/workout/{participant}', [ParticipantController::class, 'participantWorkout'])->name('learnerParticipantWorkout');
    Route::get('/review/workout/{participant}/{workout}', [ParticipantController::class, 'reviewWorkout'])->name('reviewWorkout');
    Route::post('/review/update', [ParticipantController::class, 'reviewWorkoutUpdate'])->name('workoutMentorReviewUpdate');

    Route::resource('mentor-comments', MentorCommentsController::class);
});


/*
|--------------------------------------------------------------------------
| Web Routes for only Admin Access
|--------------------------------------------------------------------------
*/
Route::prefix('panel')->middleware(['verified'])->group(function () {

    // Admin Menu
    Route::get('/menu/education', [CourseManagmentController::class, 'courses'])->name('adminMenuCourse');
    Route::get('/menu/plugins', [CourseManagmentController::class, 'plugins'])->name('adminMenuPlugins');

    Route::get('/dashboard', [GeneralController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/setting/{user}', [SettingController::class, 'update'])->name('setting.update');

    // Repository
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
    Route::resource('plan', PlanController::class);
    Route::resource('badges', BadgeController::class);


    // signle functions:
    Route::get('logs', [LogController::class, 'index'])->name('logs');

    Route::get('/document/order/{from}/{move}', [DocumentController::class, 'orderChangeFiles'])->name("changeOrderFile");
    Route::get('/document/file/add/{document}/{file}', [DocumentController::class, 'addFileToDocument'])->name("addFileToDocument");
    Route::get('/document/file/delete/{documentFile}', [DocumentController::class, 'deleteFileAsDocument'])->name("deleteFileDocument");
    Route::get('/session/document/{session}/{active_id}', [SessionController::class, 'addDocumentToSession'])->name("addDocumentToSession");
    Route::get('/session/file/{session}/{active_id}', [SessionController::class, 'addFileToSession'])->name("addFileToSession");
    Route::get('/session/order/{from}/{move}', [SessionController::class, 'changeOrderSessionable'])->name("changeOrderSessionable");
    Route::get('/session/quiz/{session}/{active_id}', [SessionController::class, 'addQuizToSession'])->name("addQuizToSession");
    Route::get('/session/delete/{session_id}', [SessionController::class, 'deleteActivityAsSession'])->name("deleteActivityAsSession");


    // Global Configuration (Admin Only)
    Route::resource('/configuration', ConfigurationController::class)->middleware('role:Super-Admin');

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


    // add session  to term
    Route::get('/term/add/{term}/session/{session}', [TermSessionController::class, 'store'])->name("addSessionToTerm");
    Route::get('/term/remove/{term}/session/{session}', [TermSessionController::class, 'destroy'])->name("deleteSessionAsTerm");
    Route::get('/term/order/{from}/{move}', [TermSessionController::class, 'order'])->name("orderChangeSession");

    // ACL Route
    Route::resource('user', UserController::class)->middleware('role:Super-Admin');
    Route::resource('role', RoleController::class)->middleware('role:Super-Admin');
    Route::resource('permission', PermissionController::class)->middleware('role:Super-Admin');
    Route::post('role/permission/{role}', [RoleController::class, 'permission'])->name("role_permissions");
});
