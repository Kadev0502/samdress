<aside class="main-sidebar">
    <section class="sidebar" style="height: auto;">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li>
                <a href="{{ route("admin.home") }}">
                    <i class="fas fa-fw fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            @can('user_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-users">

                        </i>
                        <span>{{ trans('cruds.userManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('permission_access')
                            <li class="{{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                <a href="{{ route("admin.permissions.index") }}">
                                    <i class="fa-fw fas fa-unlock-alt">

                                    </i>
                                    <span>{{ trans('cruds.permission.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('role_access')
                            <li class="{{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                <a href="{{ route("admin.roles.index") }}">
                                    <i class="fa-fw fas fa-briefcase">

                                    </i>
                                    <span>{{ trans('cruds.role.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('user_access')
                            <li class="{{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                <a href="{{ route("admin.users.index") }}">
                                    <i class="fa-fw fas fa-user">

                                    </i>
                                    <span>{{ trans('cruds.user.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('user_alert_access')
                <li class="{{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "active" : "" }}">
                    <a href="{{ route("admin.user-alerts.index") }}">
                        <i class="fa-fw fas fa-bell">

                        </i>
                        <span>{{ trans('cruds.userAlert.title') }}</span>

                    </a>
                </li>
            @endcan
            @can('contact_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-phone-square">

                        </i>
                        <span>{{ trans('cruds.contactManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('contact_company_access')
                            <li class="{{ request()->is("admin/contact-companies") || request()->is("admin/contact-companies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contact-companies.index") }}">
                                    <i class="fa-fw fas fa-building">

                                    </i>
                                    <span>{{ trans('cruds.contactCompany.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('contact_contact_access')
                            <li class="{{ request()->is("admin/contact-contacts") || request()->is("admin/contact-contacts/*") ? "active" : "" }}">
                                <a href="{{ route("admin.contact-contacts.index") }}">
                                    <i class="fa-fw fas fa-user-plus">

                                    </i>
                                    <span>{{ trans('cruds.contactContact.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('expense_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-money-bill">

                        </i>
                        <span>{{ trans('cruds.expenseManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('expense_category_access')
                            <li class="{{ request()->is("admin/expense-categories") || request()->is("admin/expense-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expense-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.expenseCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_category_access')
                            <li class="{{ request()->is("admin/income-categories") || request()->is("admin/income-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.income-categories.index") }}">
                                    <i class="fa-fw fas fa-list">

                                    </i>
                                    <span>{{ trans('cruds.incomeCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('expense_access')
                            <li class="{{ request()->is("admin/expenses") || request()->is("admin/expenses/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expenses.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.expense.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('income_access')
                            <li class="{{ request()->is("admin/incomes") || request()->is("admin/incomes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.incomes.index") }}">
                                    <i class="fa-fw fas fa-arrow-circle-right">

                                    </i>
                                    <span>{{ trans('cruds.income.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('expense_report_access')
                            <li class="{{ request()->is("admin/expense-reports") || request()->is("admin/expense-reports/*") ? "active" : "" }}">
                                <a href="{{ route("admin.expense-reports.index") }}">
                                    <i class="fa-fw fas fa-chart-line">

                                    </i>
                                    <span>{{ trans('cruds.expenseReport.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('supplier_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-laptop">

                        </i>
                        <span>{{ trans('cruds.supplierManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('supplier_access')
                            <li class="{{ request()->is("admin/suppliers") || request()->is("admin/suppliers/*") ? "active" : "" }}">
                                <a href="{{ route("admin.suppliers.index") }}">
                                    <i class="fa-fw fas fa-laptop">

                                    </i>
                                    <span>{{ trans('cruds.supplier.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('currency_access')
                            <li class="{{ request()->is("admin/currencies") || request()->is("admin/currencies/*") ? "active" : "" }}">
                                <a href="{{ route("admin.currencies.index") }}">
                                    <i class="fa-fw fas fa-dollar-sign">

                                    </i>
                                    <span>{{ trans('cruds.currency.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('categories_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-align-justify">

                        </i>
                        <span>{{ trans('cruds.categoriesManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('category_access')
                            <li class="{{ request()->is("admin/categories") || request()->is("admin/categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.categories.index") }}">
                                    <i class="fa-fw fas fa-align-left">

                                    </i>
                                    <span>{{ trans('cruds.category.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('sub_category_access')
                            <li class="{{ request()->is("admin/sub-categories") || request()->is("admin/sub-categories/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sub-categories.index") }}">
                                    <i class="fa-fw fas fa-align-center">

                                    </i>
                                    <span>{{ trans('cruds.subCategory.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('size_color_management_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-drafting-compass">

                        </i>
                        <span>{{ trans('cruds.sizeColorManagement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('color_access')
                            <li class="{{ request()->is("admin/colors") || request()->is("admin/colors/*") ? "active" : "" }}">
                                <a href="{{ route("admin.colors.index") }}">
                                    <i class="fa-fw fas fa-cogs">

                                    </i>
                                    <span>{{ trans('cruds.color.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('size_access')
                            <li class="{{ request()->is("admin/sizes") || request()->is("admin/sizes/*") ? "active" : "" }}">
                                <a href="{{ route("admin.sizes.index") }}">
                                    <i class="fa-fw fas fa-level-up-alt">

                                    </i>
                                    <span>{{ trans('cruds.size.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('orders_manangement_access')
                <li class="treeview">
                    <a href="#">
                        <i class="fa-fw fas fa-shopping-bag">

                        </i>
                        <span>{{ trans('cruds.ordersManangement.title') }}</span>
                        <span class="pull-right-container"><i class="fa fa-fw fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @can('product_access')
                            <li class="{{ request()->is("admin/products") || request()->is("admin/products/*") ? "active" : "" }}">
                                <a href="{{ route("admin.products.index") }}">
                                    <i class="fa-fw fab fa-product-hunt">

                                    </i>
                                    <span>{{ trans('cruds.product.title') }}</span>

                                </a>
                            </li>
                        @endcan
                        @can('order_access')
                            <li class="{{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "active" : "" }}">
                                <a href="{{ route("admin.orders.index") }}">
                                    <i class="fa-fw fas fa-cart-plus">

                                    </i>
                                    <span>{{ trans('cruds.order.title') }}</span>

                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @php($unread = \App\Models\QaTopic::unreadCount())
                <li class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }}">
                    <a href="{{ route("admin.messenger.index") }}">
                        <i class="fa-fw fa fa-envelope">

                        </i>
                        <span>{{ trans('global.messages') }}</span>
                        @if($unread > 0)
                            <strong>( {{ $unread }} )</strong>
                        @endif

                    </a>
                </li>
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="{{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}">
                            <a href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key">
                                </i>
                                {{ trans('global.change_password') }}
                            </a>
                        </li>
                    @endcan
                @endif
                <li>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <i class="fas fa-fw fa-sign-out-alt">

                        </i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
        </ul>
    </section>
</aside>