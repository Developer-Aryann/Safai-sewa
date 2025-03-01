<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">
            <li><a href="{{ route('dashboard') }}" class="" aria-expanded="false">
                    <i class="fas fa-home"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li><a href="{{ route('pos') }}" class="" aria-expanded="false">
                    <i class="fas fa-barcode"></i>
                    <span class="nav-text">POS</span>
                </a>
            </li>
            <li><a href="{{ route('orders') }}" class="" aria-expanded="false">
                    <i class="fas fa-cart-plus"></i>
                    <span class="nav-text">Orders</span>
                </a>
            </li>
            <li><a href="{{ route('customers') }}" class="" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span class="nav-text">Customer</span>
                </a>
            </li>
            <li><a href="{{ route('coupons') }}" class="" aria-expanded="false">
                    <i class="fas fa-tags"></i>
                    <span class="nav-text">Coupon</span>
                </a>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-wallet"></i>
                    <span class="nav-text">Expence</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('expenses') }}">Expense List</a></li>
                    <li><a href="{{ route('expenses.cateogry') }}">Expense Category</a></li>
                </ul>

            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-chart-bar"></i>
                    <span class="nav-text">Services</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('services') }}">Services List</a></li>
                    <li><a href="{{ route('services.type') }}">Services Type</a></li>
                    <li><a href="{{ route('services.addons') }}">Addons</a></li>
                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fab fa-wordpress"></i>
                    <span class="nav-text">Reports</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('reports.daily') }}">Daily Report</a></li>
                    <li><a href="#">Order Report</a></li>
                    <li><a href="#">Sales Report</a></li>
                    <li><a href="#">Expense Report</a></li>
                    <li><a href="#">Tax Report</a></li>

                </ul>
            </li>
            <li><a class="has-arrow " href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-tools"></i>
                    <span class="nav-text">Tools</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="#">Staff</a></li>
                    <li><a href="#">Role Management</a></li>
                    <li><a href="#">Master Settings</a></li>
                </ul>
            </li>
            <li><a href="#" class="" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>
            <li><a href="{{ route('logout') }}" class="" aria-expanded="false">
                    <i class="fas fa-lock"></i>
                    <span class="nav-text">Log-Out</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p><strong>Laundry System</strong> © 2025 All Rights Reserved</p>
            <p class="fs-12">Made with <span class="heart"></span> by Bug-Slayers</p>
        </div>
    </div>
</div>
