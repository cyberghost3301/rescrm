<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProfileController, PermissionController, RoleController, DashboardController, 
    LoanController, DayActionController,ExpensesController,CashHoldingController,CustomerController,ProspectController};


    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::post('/invoice/search', [LoanController::class, 'invoiceSearch'])->name('invoice.search');
    
    Route::get('/invoice/{loan}/pdf', [LoanController::class, 'invoicePdf'])->name('invoice.pdf');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/index', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{id}/update', [PermissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions/{id}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');

    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{id}/update', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{id}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
  
    Route::get('/loans/index', [LoanController::class, 'index'])->name('loans.index');
    Route::get('/loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::post('/loans/store', [LoanController::class, 'store'])->name('loans.store');
    Route::get('/loans/{loan}/show', [LoanController::class, 'show'])->name('loans.show');
    Route::get('/loans/{loan}/agreement', [LoanController::class, 'agreement'])->name('loans.agreement');

    

    Route::get('/day-action', [DayActionController::class, 'index'])->name('dayaction.index');
    Route::post('/day-action/list', [DayActionController::class, 'listByDay'])->name('dayaction.list');
    Route::post('/day-action/{loan}/penalty/non-payment', [DayActionController::class, 'chargeNonPaymentPenalty'])->name('dayaction.penalty.nonpayment');
    Route::post('/day-action/{loan}/penalty/late', [DayActionController::class, 'chargeLatePenalty'])->name('dayaction.penalty.late');
    Route::post('/day-action/{loan}/collect', [DayActionController::class, 'logCollection'])->name('dayaction.collect');
    Route::post('/day-action/{loan}/no-payment', [DayActionController::class, 'markNoPayment'])->name('dayaction.nopayment');
    
    
     Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer/index', 'index')->name('customer.index');
        Route::get('/customer/{id}/edit', 'edit')->name('customer.edit');
        Route::put('/customer/{id}/update', 'update')->name('customer.update');
        Route::post('/customer/search', 'Search')->name('customer.search');

    });

   
    
    Route::controller(ExpensesController::class)->group(function () {
        Route::get('/expenses/index', 'index')->name('expenses.index');
        Route::get('/expenses/create', 'create')->name('expenses.create');
        Route::post('/expenses/store', 'store')->name('expenses.store');
        Route::post('/expenses/search', 'expensesSearch')->name('expenses.search');

    });
    
    Route::controller(ExpensesController::class)->group(function () {
        Route::get('/cashIn/index', 'cashIn_index')->name('cashIn.index');
        Route::get('/cashIn/create', 'cashIn_create')->name('cashIn.create');
        Route::post('/cashIn/store', 'cashIn_store')->name('cashIn.store');
        Route::post('/cashIn/search', 'cashIn_Search')->name('cashIn.search');

    });

    Route::controller(CashHoldingController::class)->group(function () {
        Route::get('/cashHolding/index', 'index')->name('cashHolding.index');
        Route::get('/cashHolding/create', 'create')->name('cashHolding.create');
        Route::post('/cashHolding/store', 'store')->name('cashHolding.store');
        Route::post('/cashHolding/search', 'cashHoldingSearch')->name('cashHolding.search');

    });
    
    Route::controller(ProspectController::class)->group(function () {
        Route::get('/prospect/index', 'index')->name('prospect.index');
        Route::get('/prospect/create', 'create')->name('prospect.create');
        Route::post('/prospect/store', 'store')->name('prospect.store');
        Route::put('/prospect/{id}/status', 'updateStatus')->name('prospect.updateStatus');

    });
    
 
  
});


require __DIR__ . '/auth.php';
