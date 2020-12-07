<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            <a href="{{ route('frontend') }}">
                <img class="main-logo" src="{{ asset('/public') }}/Master/img/logo/logo_image.png" alt="Dokan Pos" style="width:205px; padding-left: 5px;"/>
            </a>
            <strong>
                <img src="{{ asset('/public') }}/Master/img/logo/log.png" alt="Dokan Pos" style="padding-left: 5px;"/>
            </strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    
                    @can('admin')
                    <li>
                        <a title="Dashboard" href="{{ route('home') }}">
                            <i class="fa big-icon fa-dashboard icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-home icon-wrap"></i>
                            <span class="mini-click-non">Setup</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            @can('adminP')
                            <li>
                                <a title="Employee" href="{{ route('employee.index') }}">
                                    <i class="fa fa-user-secret sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">&nbsp;Employee</span>
                                </a>
                            </li>
                            @endcan
                            @can('adminE')
                            <li>
                                <a title="Employee" href="{{ route('employee.index') }}">
                                    <i class="fa fa-user-secret sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">&nbsp;Employee</span>
                                </a>
                            </li>
                            @endcan
                            {{-- <li>
                                <a title="Supplier" href="{{ route('supplier.index') }}">
                                    <i class="fa fa-user-plus sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Manufacturer</span>
                                </a>
                            </li> --}}
                            <li>
                                <a title="Category" href="{{ route('category.index') }}">
                                    <i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Category</span>
                                </a>
                            </li>
                            <li>
                                <a title="Product" href="{{ route('product.index') }}">
                                    <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Services</span>
                                </a>
                            </li>
                            <li>
                                <a title="Customer" href="{{ route('customer.index') }}">
                                    <i class="fa fa-users sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Patient Info</span>
                                </a>
                            </li>
                            <li>
                                <a title="Customer" href="{{ route('patient_reference.index') }}">
                                    <i class="fa fa-users sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Patient Reference</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a title="Product" href="{{ route('vehicle_category.index') }}">
                                    <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Vehicle Type</span>
                                </a>
                            </li>
                            <li>
                                <a title="Supplier" href="{{ route('parking_price.index') }}">
                                    <i class="fa big-icon fa-money icon-wrap" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Parking Peice</span>
                                </a>
                            </li>
                            <li>
                                <a title="Delivery" href="{{ route('delivery.index') }}">
                                    <i class="fa fa-truck sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Parking Zone</span>
                                </a>
                            </li>
                            <li>
                                <a title="Delivery" href="{{ route('parking_group.index') }}">
                                    <i class="fa fa-truck sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Parking Group</span>
                                </a>
                            </li> --}}                        
                        </ul>
                    </li>
                    {{-- <li>
                        <a title="Product" href="{{ route('checkin.index') }}">
                            <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                            <span class="mini-sub-pro">CheckIn</span>
                        </a>
                    </li>
                    <li>
                        <a title="Product" href="{{ route('monthly_entry.index') }}">
                            <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                            <span class="mini-sub-pro">Monthly Entry</span>
                        </a>
                    </li> --}}
                    {{-- <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-tasks icon-wrap"></i>
                            <span class="mini-click-non">Vehicle</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Product" href="{{ route('hourly_entry.index') }}">
                                    <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Hourly CheckIn</span>
                                </a>
                            </li>
                            <li>
                                <a title="Product" href="{{ route('monthly_checkin.index') }}">
                                    <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Monthly CheckIn</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-tasks icon-wrap"></i>
                            <span class="mini-click-non">Medicine</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            
                            
                            <li>
                                <a title="Medicine Type" href="{{ route('medicine_type.index') }}">
                                    <i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Medicine Type</span>
                                </a>
                            </li>
                            <li>
                                <a title="Medicine Shelf" href="{{ route('medicine_shelf.index') }}">
                                    <i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Medicine Shelf</span>
                                </a>
                            </li>
                            <li>
                                <a title="Medicine Unit" href="{{ route('medicine_unit.index') }}">
                                    <i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Medicine Unit</span>
                                </a>
                            </li>
                        </ul>
                    </li> --}}
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-cart-plus icon-wrap"></i>
                            <span class="mini-click-non">Purchase</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Purchase" href="{{ route('purchase.index') }}">
                                    <i class="fa fa-cart-plus sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase</span>
                                </a>
                            </li>
                             <li>
                                <a title="Purchase Edit" href="{{ route('purchase.edit.index') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase Edit</span>
                                </a>
                            </li>
                            <li>
                                <a title="Purchase Edit" href="{{ route('purchase.edit.list') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase Edit</span>
                                </a>
                            </li> 
                            <li>
                                <a title="Purchase Cancel" href="{{ route('purchase.cancel.index') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase Cancel</span>
                                </a>
                            </li>
                            @can('adminE')
                            <li>
                                <a title="Generate Barcode" href="{{ route('barcode.index') }}">
                                    <i class="fa fa-barcode sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Generate Barcode</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li>

                    {{-- <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-shopping-cart icon-wrap"></i>
                            <span class="mini-click-non">Sale</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Sale" href="{{ route('sale.index') }}">
                                    <i class="fa fa-shopping-cart sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Sale</span>
                                </a>
                            </li>
                            <li>
                                <a title="Sale Cancel" href="{{ route('sale.cancel.index') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Sale Cancel</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-shopping-basket icon-wrap"></i>
                            <span class="mini-click-non">Stock</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Current" href="{{ route('stock.index') }}">
                                    <i class="fa fa-shopping-basket sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Current Stock</span>
                                </a>
                            </li>
                            @can('adminE')
                            <li>
                                <a title="Minimum" href="{{ route('stock.minimum') }}">
                                    <i class="fa fa-print sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Minimum Stock</span>
                                </a>
                            </li>
                            @endcan
                        </ul>
                    </li> --}}
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-money icon-wrap"></i>
                            <span class="mini-click-non">Accounts</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            @can('adminP')
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <i class="fa fa-money sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-click-non">Expense</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Expense List" href="{{ route('expense.index') }}">
                                            <span class="mini-sub-pro">Expense List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Expense Type" href="{{ route('expense.type.index') }}">
                                            <span class="mini-sub-pro">Expense Type</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            @can('adminE')
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <i class="fa fa-money sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-click-non">Expense</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Expense List" href="{{ route('expense.index') }}">
                                            <span class="mini-sub-pro">Expense List</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Expense Type" href="{{ route('expense.type.index') }}">
                                            <span class="mini-sub-pro">Expense Type</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            <li>
                                <a title="Collection" href="{{ route('collection.index') }}">
                                    <i class="fa fa-money sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Collection</span>
                                </a>
                            </li>
                            <li>
                                <a title="Payment" href="{{ route('payment.index') }}">
                                    <i class="fa fa-money sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Payment</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-print icon-wrap"></i>
                            <span class="mini-click-non">Report</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Purchase Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Group By Date" href="{{ route('purchase.report.groupby') }}">
                                            <span class="mini-sub-pro">Group By Date</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Date Wise" href="{{ route('purchase.report.datewise') }}">
                                            <span class="mini-sub-pro">Date Wise</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Sale Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Group By Date" href="{{ route('sale.report.groupby') }}">
                                            <span class="mini-sub-pro">Group By Date</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Date Wise" href="{{ route('sale.report.datewise') }}">
                                            <span class="mini-sub-pro">Date Wise</span>
                                        </a>
                                    </li>
                                    @can('adminP')
                                    <li>
                                        <a title="Delivery System Wise" href="{{ route('sale.report.delivery') }}">
                                            <span class="mini-sub-pro">Delivery System</span>
                                        </a>
                                    </li>
                                    @endcan
                                    @can('adminE')
                                    <li>
                                        <a title="Delivery System Wise" href="{{ route('sale.report.delivery') }}">
                                            <span class="mini-sub-pro">Delivery System</span>
                                        </a>
                                    </li>
                                    @endcan
                                </ul>
                            </li>
                            @can('adminE')
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Accounts Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Profit & Loss Report" href="{{ route('profit.loss.report') }}">
                                            <span class="mini-sub-pro">Profit & Loss Report</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a class="has-arrow" href="#">
                                            <span class="mini-click-non">Expense Report</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a title="Date Wise" href="{{ route('expense.report.datewise') }}">
                                                    <span class="mini-sub-pro">Date Wise</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a class="has-arrow" href="#">
                                            <span class="mini-click-non">Collection Report</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a title="Date Wise" href="{{ route('collection.report.datewise') }}">
                                                    <span class="mini-sub-pro">Date Wise</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Delivery System Wise" href="{{ route('collection.report.delivery') }}">
                                                    <span class="mini-sub-pro">Delivery System</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a class="has-arrow" href="#">
                                            <span class="mini-click-non">Payment Report</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a title="Date Wise" href="{{ route('shop.payment.datewise.report') }}">
                                                    <span class="mini-sub-pro">Date Wise</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a class="has-arrow" href="#">
                                            <span class="mini-click-non">Ledger Report</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a title="Customer Ledger" href="{{ route('ledger.report.customer') }}">
                                                    <span class="mini-sub-pro">Customer Ledger</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Supplier Ledger" href="{{ route('ledger.report.supplier') }}">
                                                    <span class="mini-sub-pro">Supplier Ledger</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a title="Customer Due" href="{{ route('due.customer.report') }}">
                                            <span class="mini-sub-pro">A/C Receiveable</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Supplier Due" href="{{ route('due.supplier.report') }}">
                                            <span class="mini-sub-pro">A/C Payable</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                            @can('adminP')
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Accounts Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li class="">
                                        <a class="has-arrow" href="#">
                                            <span class="mini-click-non">Expense Report</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a title="Date Wise" href="{{ route('expense.report.datewise') }}">
                                                    <span class="mini-sub-pro">Date Wise</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a class="has-arrow" href="#">
                                            <span class="mini-click-non">Collection Report</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a title="Date Wise" href="{{ route('collection.report.datewise') }}">
                                                    <span class="mini-sub-pro">Date Wise</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Delivery System Wise" href="{{ route('collection.report.delivery') }}">
                                                    <span class="mini-sub-pro">Delivery System</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="">
                                        <a class="has-arrow" href="#">
                                            <span class="mini-click-non">Payment Report</span>
                                        </a>
                                        <ul class="submenu-angle" aria-expanded="true">
                                            <li>
                                                <a title="Date Wise" href="{{ route('shop.payment.datewise.report') }}">
                                                    <span class="mini-sub-pro">Date Wise</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @endcan
                        </ul>
                    </li>
                    @endcan
                    
                    @can('manager')
                    <li>
                        <a title="Dashboard" href="{{ route('home') }}">
                            <i class="fa big-icon fa-dashboard icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-home icon-wrap"></i>
                            <span class="mini-click-non">Setup</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Supplier" href="{{ route('supplier.index') }}">
                                    <i class="fa fa-user-plus sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Supplier</span>
                                </a>
                            </li>
                            <li>
                                <a title="Customer" href="{{ route('customer.index') }}">
                                    <i class="fa fa-users sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Customer</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-tasks icon-wrap"></i>
                            <span class="mini-click-non">Product</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Category" href="{{ route('category.index') }}">
                                    <i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Category</span>
                                </a>
                            </li>
                            <li>
                                <a title="Product" href="{{ route('product.index') }}">
                                    <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Product</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-cart-plus icon-wrap"></i>
                            <span class="mini-click-non">Purchase</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Purchase" href="{{ route('purchase.index') }}">
                                    <i class="fa fa-cart-plus sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase</span>
                                </a>
                            </li>
                            <li>
                                <a title="Purchase Cancel" href="{{ route('purchase.cancel.index') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase Cancel</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-shopping-cart icon-wrap"></i>
                            <span class="mini-click-non">Sale</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Sale" href="{{ route('sale.index') }}">
                                    <i class="fa fa-shopping-cart sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Sale</span>
                                </a>
                            </li>
                            <li>
                                <a title="Sale Cancel" href="{{ route('sale.cancel.index') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Sale Cancel</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-shopping-basket icon-wrap"></i>
                            <span class="mini-click-non">Stock</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Current" href="{{ route('stock.index') }}">
                                    <i class="fa fa-shopping-basket sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Current Stock</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-print icon-wrap"></i>
                            <span class="mini-click-non">Report</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Purchase Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Group By Date" href="{{ route('purchase.report.groupby') }}">
                                            <span class="mini-sub-pro">Group By Date</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Date Wise" href="{{ route('purchase.report.datewise') }}">
                                            <span class="mini-sub-pro">Date Wise</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Sale Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Group By Date" href="{{ route('sale.report.groupby') }}">
                                            <span class="mini-sub-pro">Group By Date</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Date Wise" href="{{ route('sale.report.datewise') }}">
                                            <span class="mini-sub-pro">Date Wise</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                    @endcan

                    @can('salesMan')
                    <li>
                        <a title="Dashboard" href="{{ route('home') }}">
                            <i class="fa big-icon fa-dashboard icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-tasks icon-wrap"></i>
                            <span class="mini-click-non">Product</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Category" href="{{ route('category.index') }}">
                                    <i class="fa fa-cube sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Category</span>
                                </a>
                            </li>
                            <li>
                                <a title="Product" href="{{ route('product.index') }}">
                                    <i class="fa fa-cubes sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Product</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-cart-plus icon-wrap"></i>
                            <span class="mini-click-non">Purchase</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Purchase" href="{{ route('purchase.index') }}">
                                    <i class="fa fa-cart-plus sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase</span>
                                </a>
                            </li>
                            <li>
                                <a title="Purchase Cancel" href="{{ route('purchase.cancel.index') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Purchase Cancel</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-shopping-cart icon-wrap"></i>
                            <span class="mini-click-non">Sale</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Sale" href="{{ route('sale.index') }}">
                                    <i class="fa fa-shopping-cart sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Sale</span>
                                </a>
                            </li>
                            <li>
                                <a title="Sale Cancel" href="{{ route('sale.cancel.index') }}">
                                    <i class="fa fa-cart-arrow-down sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Sale Cancel</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-shopping-basket icon-wrap"></i>
                            <span class="mini-click-non">Stock</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Current" href="{{ route('stock.index') }}">
                                    <i class="fa fa-shopping-basket sub-icon-mg" aria-hidden="true"></i> 
                                    <span class="mini-sub-pro">Current Stock</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    @can('reference')
                    <li>
                        <a title="Dashboard" href="{{ route('home') }}">
                            <i class="fa big-icon fa-dashboard icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a title="Shop List" href="{{ route('reference.shop.list') }}">
                            <i class="fa big-icon fa-home icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-sub-pro">&nbsp;Shop List</span>
                        </a>
                    </li>
                    <li>
                        <a title="Payment List" href="{{ route('reference.payment.list') }}">
                            <i class="fa big-icon fa-money icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-sub-pro">Payment List</span>
                        </a>
                    </li>
                    @endcan

                    @can('superAdmin')
                    <li>
                        <a title="Dashboard" href="{{ route('home') }}">
                            <i class="fa big-icon fa-dashboard icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-user-secret icon-wrap"></i>
                            <span class="mini-click-non">Configuration</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Manager" href="{{ route('manager.index') }}">
                                    <span class="mini-sub-pro">Manager</span>
                                </a>
                            </li>
                            <li>
                                <a title="Reference" href="{{ route('shop.reference') }}">
                                    <span class="mini-sub-pro">Reference</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-home icon-wrap"></i>
                            <span class="mini-click-non">Shop Setup</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Shop List" href="{{ route('shop.index') }}">
                                    <span class="mini-sub-pro">Shop List</span>
                                </a>
                            </li>
                            <li>
                                <a title="Shop Package" href="{{ route('shop.package.index') }}">
                                    <span class="mini-sub-pro">Shop Package</span>
                                </a>
                            </li>
                            <li>
                                <a title="Shop Collection" href="{{ route('shop.payment.index') }}">
                                    <span class="mini-sub-pro">Shop Collection</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-comments icon-wrap"></i>
                            <span class="mini-click-non">Others</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Shop Message" href="{{ route('message.index') }}">
                                    <span class="mini-sub-pro">Shop Message</span>
                                </a>
                            </li>
                            <li>
                                <a title="Subscriber List" href="{{ route('subscriber.index') }}">
                                    <span class="mini-sub-pro">Subscriber List</span>
                                </a>
                            </li>
                            <li>
                                <a title="Contact List" href="{{ route('contact.index') }}">
                                    <span class="mini-sub-pro">Contact List</span>
                                </a>
                            </li>
                            <li>
                                <a title="Testimonial" href="{{ route('testimonial.index') }}">
                                    <span class="mini-sub-pro">Testimonial</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-ticket icon-wrap"></i>
                            <span class="mini-click-non">Open Ticket</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Ticket List" href="{{ route('ticket.index') }}">
                                    <span class="mini-sub-pro">Ticket List</span>
                                </a>
                            </li>
                            <li>
                                <a title="Ticket Search" href="{{ route('ticket.search') }}">
                                    <span class="mini-sub-pro">Ticket Search</span>
                                </a>
                            </li>
                            <li>
                                <a title="Ticket Report" href="{{ route('ticket.report') }}">
                                    <span class="mini-sub-pro">Ticket Report</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-print icon-wrap"></i>
                            <span class="mini-click-non">Report</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Shop Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Area Wise" href="{{ route('shop.report.area.wise') }}">
                                            <span class="mini-sub-pro">Area Wise</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Business Type Wise" href="{{ route('shop.report.business.type.wise') }}">
                                            <span class="mini-sub-pro">Business Type Wise</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Status Wise" href="{{ route('shop.report.status.wise') }}">
                                            <span class="mini-sub-pro">Status Wise</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Reference Wise" href="{{ route('shop.report.reference.wise') }}">
                                            <span class="mini-sub-pro">Reference Wise</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Payment Report</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Date Wise" href="{{ route('shop.payment.datewise') }}">
                                            <span class="mini-sub-pro">Date Wise</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Reference Wise" href="{{ route('shop.payment.reference.wise') }}">
                                            <span class="mini-sub-pro">Reference Wise</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Expiry Date Wise</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="7 Days to Expire" href="{{ route('shop.report.payment.expiry') }}">
                                            <span class="mini-sub-pro">7 Days to Expire</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Date Expired" href="{{ route('shop.report.payment.expired') }}">
                                            <span class="mini-sub-pro">Date Expired</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="">
                                <a class="has-arrow" href="#">
                                    <span class="mini-click-non">Reference</span>
                                </a>
                                <ul class="submenu-angle" aria-expanded="true">
                                    <li>
                                        <a title="Date Wise" href="{{ route('reference.payment.report') }}">
                                            <span class="mini-sub-pro">Date Wise</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    @endcan
                    @can('employee')
                    <li>
                        <a title="Dashboard" href="{{ route('home') }}">
                            <i class="fa big-icon fa-dashboard icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a title="Open Ticket" href="{{ route('ticket.index') }}">
                            <i class="fa big-icon fa-ticket icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Open Ticket</span>
                        </a>
                    </li>
                    <li>
                        <a title="Payment" href="{{ route('reference.payment') }}">
                            <i class="fa big-icon fa-money icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Payment</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="has-arrow" href="#">
                            <i class="fa big-icon fa-print icon-wrap" aria-hidden="true"></i> 
                            <span class="mini-click-non">Report</span>
                        </a>
                        <ul class="submenu-angle" aria-expanded="true">
                            <li>
                                <a title="Ticket Report" href="{{ route('ticket.report') }}">
                                    <span class="mini-sub-pro">Ticket Report</span>
                                </a>
                            </li>
                            <li>
                                <a title="Date Wise" href="{{ route('reference.payment.report') }}">
                                    <span class="mini-sub-pro">Date Wise</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                </ul>
            </nav>
        </div>
    </nav>
</div>