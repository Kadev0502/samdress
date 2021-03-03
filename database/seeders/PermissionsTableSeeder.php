<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'contact_management_access',
            ],
            [
                'id'    => 22,
                'title' => 'contact_company_create',
            ],
            [
                'id'    => 23,
                'title' => 'contact_company_edit',
            ],
            [
                'id'    => 24,
                'title' => 'contact_company_show',
            ],
            [
                'id'    => 25,
                'title' => 'contact_company_delete',
            ],
            [
                'id'    => 26,
                'title' => 'contact_company_access',
            ],
            [
                'id'    => 27,
                'title' => 'contact_contact_create',
            ],
            [
                'id'    => 28,
                'title' => 'contact_contact_edit',
            ],
            [
                'id'    => 29,
                'title' => 'contact_contact_show',
            ],
            [
                'id'    => 30,
                'title' => 'contact_contact_delete',
            ],
            [
                'id'    => 31,
                'title' => 'contact_contact_access',
            ],
            [
                'id'    => 32,
                'title' => 'expense_management_access',
            ],
            [
                'id'    => 33,
                'title' => 'expense_category_create',
            ],
            [
                'id'    => 34,
                'title' => 'expense_category_edit',
            ],
            [
                'id'    => 35,
                'title' => 'expense_category_show',
            ],
            [
                'id'    => 36,
                'title' => 'expense_category_delete',
            ],
            [
                'id'    => 37,
                'title' => 'expense_category_access',
            ],
            [
                'id'    => 38,
                'title' => 'income_category_create',
            ],
            [
                'id'    => 39,
                'title' => 'income_category_edit',
            ],
            [
                'id'    => 40,
                'title' => 'income_category_show',
            ],
            [
                'id'    => 41,
                'title' => 'income_category_delete',
            ],
            [
                'id'    => 42,
                'title' => 'income_category_access',
            ],
            [
                'id'    => 43,
                'title' => 'expense_create',
            ],
            [
                'id'    => 44,
                'title' => 'expense_edit',
            ],
            [
                'id'    => 45,
                'title' => 'expense_show',
            ],
            [
                'id'    => 46,
                'title' => 'expense_delete',
            ],
            [
                'id'    => 47,
                'title' => 'expense_access',
            ],
            [
                'id'    => 48,
                'title' => 'income_create',
            ],
            [
                'id'    => 49,
                'title' => 'income_edit',
            ],
            [
                'id'    => 50,
                'title' => 'income_show',
            ],
            [
                'id'    => 51,
                'title' => 'income_delete',
            ],
            [
                'id'    => 52,
                'title' => 'income_access',
            ],
            [
                'id'    => 53,
                'title' => 'expense_report_create',
            ],
            [
                'id'    => 54,
                'title' => 'expense_report_edit',
            ],
            [
                'id'    => 55,
                'title' => 'expense_report_show',
            ],
            [
                'id'    => 56,
                'title' => 'expense_report_delete',
            ],
            [
                'id'    => 57,
                'title' => 'expense_report_access',
            ],
            [
                'id'    => 58,
                'title' => 'pre_order_access',
            ],
            [
                'id'    => 59,
                'title' => 'supplier_create',
            ],
            [
                'id'    => 60,
                'title' => 'supplier_edit',
            ],
            [
                'id'    => 61,
                'title' => 'supplier_show',
            ],
            [
                'id'    => 62,
                'title' => 'supplier_delete',
            ],
            [
                'id'    => 63,
                'title' => 'supplier_access',
            ],
            [
                'id'    => 64,
                'title' => 'product_access',
            ],
            [
                'id'    => 65,
                'title' => 'size_create',
            ],
            [
                'id'    => 66,
                'title' => 'size_edit',
            ],
            [
                'id'    => 67,
                'title' => 'size_show',
            ],
            [
                'id'    => 68,
                'title' => 'size_delete',
            ],
            [
                'id'    => 69,
                'title' => 'size_access',
            ],
            [
                'id'    => 70,
                'title' => 'category_create',
            ],
            [
                'id'    => 71,
                'title' => 'category_edit',
            ],
            [
                'id'    => 72,
                'title' => 'category_show',
            ],
            [
                'id'    => 73,
                'title' => 'category_delete',
            ],
            [
                'id'    => 74,
                'title' => 'category_access',
            ],
            [
                'id'    => 75,
                'title' => 'sub_category_create',
            ],
            [
                'id'    => 76,
                'title' => 'sub_category_edit',
            ],
            [
                'id'    => 77,
                'title' => 'sub_category_show',
            ],
            [
                'id'    => 78,
                'title' => 'sub_category_delete',
            ],
            [
                'id'    => 79,
                'title' => 'sub_category_access',
            ],
            [
                'id'    => 80,
                'title' => 'color_create',
            ],
            [
                'id'    => 81,
                'title' => 'color_edit',
            ],
            [
                'id'    => 82,
                'title' => 'color_show',
            ],
            [
                'id'    => 83,
                'title' => 'color_delete',
            ],
            [
                'id'    => 84,
                'title' => 'color_access',
            ],
            [
                'id'    => 85,
                'title' => 'currency_create',
            ],
            [
                'id'    => 86,
                'title' => 'currency_edit',
            ],
            [
                'id'    => 87,
                'title' => 'currency_show',
            ],
            [
                'id'    => 88,
                'title' => 'currency_delete',
            ],
            [
                'id'    => 89,
                'title' => 'currency_access',
            ],
            [
                'id'    => 90,
                'title' => 'article_create',
            ],
            [
                'id'    => 91,
                'title' => 'article_edit',
            ],
            [
                'id'    => 92,
                'title' => 'article_show',
            ],
            [
                'id'    => 93,
                'title' => 'article_delete',
            ],
            [
                'id'    => 94,
                'title' => 'article_access',
            ],
            [
                'id'    => 95,
                'title' => 'stock_create',
            ],
            [
                'id'    => 96,
                'title' => 'stock_edit',
            ],
            [
                'id'    => 97,
                'title' => 'stock_show',
            ],
            [
                'id'    => 98,
                'title' => 'stock_delete',
            ],
            [
                'id'    => 99,
                'title' => 'stock_access',
            ],
            [
                'id'    => 100,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
