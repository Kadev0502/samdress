<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Contact Companies
    Route::apiResource('contact-companies', 'ContactCompanyApiController');

    // Contact Contacts
    Route::apiResource('contact-contacts', 'ContactContactsApiController');

    // Expense Categories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Income Categories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Suppliers
    Route::apiResource('suppliers', 'SupplierApiController');

    // Sizes
    Route::apiResource('sizes', 'SizeApiController');

    // Categories
    Route::apiResource('categories', 'CategoryApiController');

    // Sub Categories
    Route::apiResource('sub-categories', 'SubCategoryApiController');

    // Colors
    Route::apiResource('colors', 'ColorApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrencyApiController');

    // Articles
    Route::post('articles/media', 'ArticleApiController@storeMedia')->name('articles.storeMedia');
    Route::apiResource('articles', 'ArticleApiController');

    // Stocks
    Route::apiResource('stocks', 'StockApiController');
});
