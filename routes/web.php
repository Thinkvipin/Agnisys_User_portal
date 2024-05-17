<?php

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



/*
Route::get('/home', function () {
    return view('index');
});
Route::post('/home', function () {
    return view('index');
}); 
Route::delete('/home', function () {
    return view('index');
}); 
Route::get('/about', function () {
    return view('pages.about');
}); 
Route::get('/about/{id}', function ($id) {
    return view('pages.about',$id);
}); 
 Route::get('/', function () {
    return view('index');
});

*/ 
 


// Route::get('/', function(){
//     return view('welcome');
// })->name('home');

Auth::routes();


use App\Http\Controllers\Auth\LoginController2;
use App\Http\Middleware\ChatAuthenticateMiddleware;



// Your routes go here
// New login routes
Route::get('/login2', [LoginController2::class, 'showLoginForm'])->name('login2');
Route::post('/login2', [LoginController2::class, 'login']);
// routes/web.php

// Route::view('/dashboard2', 'dashboard2.index')->name('dashboard2');
// Dashboard2 route with middleware
Route::middleware(ChatAuthenticateMiddleware::class)->group(function () {
    Route::view('/dashboard2', 'dashboard2.index')->name('dashboard2');
});


Route::get('/', 'licenseController@home')->name('home');
Route::post('/user-auth','companyController@authorise');
Route::get('/users/{cid}','AdminController@userData');
Route::post('/upload','AdminController@uploadImage');
Route::get('/new_pdf_files/{pdf}','AdminController@pdfaccess');
// Route::get('/public/upload/{img}','');
// Not Found
/*Route::get('/404', function () {
    return view('errors.404');
})->name('NotFound');
*/






Route::get('/dashboard', 'AdminController@index')->name('dashboard');

Route::group(['prefix' => 'dashboard'],function(){


    // super admin Routes
    Route::group(['prefix' => 's'],function(){

        // company
        Route::get('/all-company','companyController@allCompany')->name('allCompany');
        Route::get('/add-company','companyController@addCompany');
        Route::post('/add-company','companyController@addCompanyDb');
        Route::get('/delete/{id}','companyController@deleteCompany');
        Route::get('/edit/{id}','companyController@editCompany');
        Route::post('/edit','companyController@editCompanyDb');
        //products
        Route::get('/all-products','productController@all')->name('allProducts');
        Route::get('/add-product','productController@add');
        Route::post('/add-product','productController@addDb');
        Route::get('/edit-product/{id}','productController@edit');
        Route::post('/edit-product','productController@editDb');
        Route::get('/delete-product/{id}','productController@delete');
        //issues
        Route::get('/all-issues','issueController@allCompanyIssue');
        Route::get('/cmp-issues/{id}','issueController@companyIssue');
        Route::get('/single-issue/{id}/{cid}','issueController@singleIssueAdmin');
        // cases
        Route::get('/all-cases','AdminController@allCases')->name('sCases');
        // notifications
        Route::get('/notification/{id}','notificationController@singleNotification');
        Route::get('/create-notification','notificationController@create');
        Route::get('/all-notifications','notificationController@all')->name('all-notifications');
        Route::post('/add-notification','notificationController@addNew_s');
        Route::get('/edit-notification/{id}','notificationController@edit');
        Route::post('/edit-notification','notificationController@editDb');
        Route::get('/delete-notification/{id}','notificationController@delete');
        // employees
        Route::get('/all-employees','AdminController@allEmployees')->name('allEmployee_s');
        Route::get('/add-employee','AdminController@addEmployee');
        Route::post('/add-employee','AdminController@addEmployeeDb');
        Route::get('/edit-employee/{id}','AdminController@editEmployee');
        Route::post('/edit-employee','AdminController@editEmployeeDb');
        Route::get('/delete-employee','AdminController@deleteEmployee');
        Route::get('/disable-employee/{id}','AdminController@disableEmployee');
        Route::get('/enable-employee/{id}','AdminController@enableEmployee');
        Route::get('/request-employee','AdminController@requestedEmployee');
        
        Route::post('/user-deleteall', 'AdminController@userRequestDeleteAll');
        
        // license
        Route::get('/all-license-request','licenseController@all')->name('allLicenseRequest');
        Route::get('/license-request/{id}','licenseController@licenseResponse');
        Route::post('/license-request','licenseController@licenseResponseDb');
        Route::get('/issue-license','licenseController@licenseIssue');
        Route::post('/issue-license','licenseController@licenseIssueDb');
        Route::get('/all-license','licenseController@allWorking')->name('allLicenseWorking');
        Route::get('/license-delete/{id}','licenseController@delete');
        Route::get('/license-view/{id}','licenseController@view');
        Route::post('/license-view','licenseController@viewDb');
        Route::get('/license-edit/{id}','licenseController@edit');
        Route::post('/license-edit','licenseController@editDb');
        Route::post('/getlicencefile','licenseController@getlicencefile');
        // ftp
        Route::get('/all-ftp-request','ftpController@all')->name('allFtpRequest');
        Route::get('/ftp-request/{id}','ftpController@ftpResponse');
        Route::post('/ftp-request','ftpController@ftpResponseDb');
        Route::get('/all-ftp','ftpController@allWorking')->name('allFtpWorking');
        Route::get('/ftp-view/{id}','ftpController@ftpView');
        Route::post('/ftp-view','ftpController@ftpViewDb');
        Route::get('/ftp-delete/{id}','ftpController@delete');
        Route::get('/create-ftp','ftpController@create');
        Route::post('/create-ftp','ftpController@createDb');
        // groups
        Route::get('/all-group','groupController@all')->name('allGroups');
        Route::get('/create-group','groupController@create');
        Route::post('/create-group','groupController@createDb');
        Route::get('/edit-group/{id}','groupController@editGroup');
        Route::post('/edit-group','groupController@editGroupDb');
        Route::get('/delete-group/{id}','groupController@deleteGroup');
        // feedbacks
        Route::get('/all-feedback','feedbackController@viewAll')->name('allFeedback');
        // company profile
        Route::get('/company-profile','companyController@profile');
        Route::post('/company-profile','companyController@profileUpdate');
        // user profile
        Route::get('/profile','AdminController@profile')->name('profile');
        Route::post('/profile','AdminController@profileUpdate')->name('profileUpdate');
        // setting
        Route::get('/settings','settingsController@index');
        
        Route::get('/download-software', 'AdminController@static_pages15');
        Route::get('/agnisys-tools-family', 'AdminController@static_pages19');
        Route::get('/troubleshooting-tool-installation','AdminController@static_pages20');
    
        Route::get('/agnisys-webinar', 'AdminController@static_pages17');
        Route::get('/IDesignSpecVideo', 'AdminController@static_pages16');
        
        Route::get('/userlogs', 'AdminController@user_logs');
        // Export to excel
        Route::get('/userlogs/exportExcel','AdminController@exportExcel');
        
        // chatbot page 
        Route::get('/help','AdminController@static_pages21');
        
        


    });

    
    // issues
    Route::get('/all-issues','issueController@all')->name('allIssue');
    Route::get('/issue/{id}','issueController@singleIssue')->name('issue');
    Route::get('/active-issues','issueController@active');
    Route::post('/add-comment','issueController@addComment');
    Route::post('/add-issue','issueController@add');
    Route::post('/update-status','issueController@updateStatus');
    Route::post('/update-label','issueController@updateLabel');
    Route::post('/update-priority','issueController@updatePriority');
    Route::post('/update-assignees','issueController@updateAssignees');
    // notifications
    Route::get('/notifications','notificationController@index');
    Route::get('/notification/{id}','notificationController@singleNotification');
    Route::get('/create-notification','notificationController@create');
    Route::get('/all-notifications','notificationController@all');
    Route::post('/add-notification','notificationController@addNew');
    Route::get('edit-notification/{id}','notificationController@edit');
    Route::post('edit-notification','notificationController@editDb');
    Route::get('delete-notification/{id}','notificationController@delete');
    // employee
    Route::get('/all-employees','AdminController@allEmployees')->name('allEmployees');
    Route::get('/add-employee','AdminController@addEmployee');
    Route::post('/add-employee','AdminController@addEmployeeDb');
    Route::post('/add-employee/csv','AdminController@addEmployeeCSV'); // https://csv.thephpleague.com/     [csv]
    Route::get('/edit-employee/{id}','AdminController@editEmployee');
    Route::post('/edit-employee','AdminController@editEmployeeDb');
    Route::get('/delete-employee/{id}','AdminController@deleteEmployee');
    Route::get('/disable-employee/{id}','AdminController@disableEmployee');
    Route::get('/enable-employee/{id}','AdminController@enableEmployee');
    // teams/groups
    Route::get('/all-teams','teamController@all')->name('allTeams');
    Route::get('/create-team','teamController@create');
    Route::post('/create-team','teamController@createDb');
    Route::get('/edit-team/{id}','teamController@editTeam');
    Route::post('/edit-team','teamController@editTeamDb');
    Route::get('/delete-team/{id}','teamController@deleteTeam');
    // ftp 
    Route::get('/all-ftp','ftpController@all')->name('allFTP');
    Route::get('/ftp-request','ftpController@ftpRequest');
    Route::post('/ftp-request','ftpController@ftpRequestDb');
    // license
    Route::get('/all-licenses','licenseController@all')->name('allLicense');
    Route::get('/license-request','licenseController@licenseRequest');
    Route::post('/license-request','licenseController@licenseRequestDb');
    // support
    Route::post('/support','AdminController@support')->name('support');
    // company profile
    Route::get('/company-profile','companyController@profile')->name('companyProfile');
    Route::post('/company-profile','companyController@profileUpdate')->name('companyProfileUpdate');
    // user profile
    Route::get('/profile','AdminController@profile')->name('profile');
    Route::post('/profile','AdminController@profileUpdate')->name('profileUpdate');
    // feedback 
    Route::get('/feedback','feedbackController@feedback');
    Route::post('/feedback','feedbackController@sendFeedback')->name('sendFeedback');
    // setting
    Route::get('/settings','settingsController@index');
    // cases 
    Route::get('/cases','AdminController@allCases');
    Route::get('/case/{id}','AdminController@singleCase')->name('case');
    
    // static pages
    Route::get('/download-software', 'AdminController@static_pages15');
    Route::get('/agnisys-tools-family', 'AdminController@static_pages19');
    Route::get('/troubleshooting-tool-installation','AdminController@static_pages20');
    
    Route::get('/agnisys-webinar', 'AdminController@static_pages17');
    Route::get('/IDesignSpecVideo', 'AdminController@static_pages16');
    // chatbot page 
    Route::get('/help','AdminController@static_pages21');

});
