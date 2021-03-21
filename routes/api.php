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
    Route::apiResource('suppliers', 'SuppliersApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrenciesApiController');

    // Categories
    Route::post('categories/media', 'CategoriesApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoriesApiController');

    // Sub Categories
    Route::post('sub-categories/media', 'SubCategoriesApiController@storeMedia')->name('sub-categories.storeMedia');
    Route::apiResource('sub-categories', 'SubCategoriesApiController');

    // Colors
    Route::apiResource('colors', 'ColorApiController');

    // Sizes
    Route::apiResource('sizes', 'SizesApiController');

    // Products
    Route::post('products/media', 'ProductsApiController@storeMedia')->name('products.storeMedia');
    Route::apiResource('products', 'ProductsApiController');

    // Orders
    Route::apiResource('orders', 'OrdersApiController');
});
