﻿<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset('dist/img/logo_icon.png') }}" alt="your exercies logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Your Exercises</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user() ? Auth::user()->name : '' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          {{--<li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link @if(route('admin.dashboard') == URL::current()) active @endif">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="{{ route('admin.user') }}" class="nav-link @if(route('admin.user') == URL::current()) active @endif">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.notification') }}" class="nav-link @if(route('admin.notification') == URL::current()) active @endif">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Notification
              </p>
            </a>
          </li>
		      <li class="nav-item">
            <a href="{{ route('admin.cms-page') }}" class="nav-link @if(route('admin.cms-page') == URL::current()) active @endif">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Cms Page
              </p>
            </a>
          </li>--}}
          <li class="nav-item">
            <a href="{{ route('admin.category') }}" class="nav-link {{ request()->is('admin/category*') || request()->is('admin/subcategory*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Category
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.exercise') }}" class="nav-link {{ request()->is('admin/exercise*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-dumbbell"></i>
              <p>
                Exercises
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.plan') }}" class="nav-link @if(route('admin.plan') == URL::current()) active @endif">
              <i class="nav-icon fas fa-weight"></i>
              <p>
                Plan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.inquiry.demo') }}" class="nav-link @if(route('admin.inquiry.demo') == URL::current()) active @endif">
              <i class="nav-icon fas fa-video"></i>
              <p>
                Demo Inquiry
              </p>
            </a>
          </li>
		  <!--<li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
          </li>-->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>
