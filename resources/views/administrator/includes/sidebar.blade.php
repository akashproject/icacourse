<!-- Menu -->
   <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
         <a href="{{ route('admin-dashboard') }}" class="app-brand-link">
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
         <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item active">
            <a href="{{ route('admin-dashboard') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-home-circle"></i>
               <div data-i18n="Analytics">Dashboard</div>
            </a>
         </li>

         <!-- Layouts -->
         <li class="menu-item">
            <a href="{{ route('website') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-globe"></i>
               <div data-i18n="globe">Visit Site</div>
            </a>
         </li>
         <li class="menu-header small text-uppercase"><span class="menu-header-text">Apparence</span></li>
         <li class="menu-item">
            <a href="{{ route('admin-media') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-image"></i>
               <div data-i18n="Settings">Media Library</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-book"></i>
               <div data-i18n="Courses">Leads</div>
            </a>
            <ul class="menu-sub">
               <li class="menu-item">
                  <a href="{{ route('admin-leads',['crm']) }}" class="menu-link">
                     <div data-i18n="Notifications">Leads</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-leads',['local']) }}" class="menu-link">
                     <div data-i18n="Notifications">Local Leads</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-leads',['backlog']) }}" class="menu-link">
                     <div data-i18n="Notifications">Backlog Leads</div>
                  </a>
               </li>
            </ul>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-pages') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-file"></i>
               <div data-i18n="Page">Pages</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-ad-pages') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-file"></i>
               <div data-i18n="Ad Page">Ad Pages</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-book"></i>
               <div data-i18n="Courses">Courses</div>
            </a>
            <ul class="menu-sub">
               <li class="menu-item">
                  <a href="{{ route('course-type') }}" class="menu-link">
                     <div data-i18n="Notifications">Type</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-courses') }}" class="menu-link">
                     <div data-i18n="Notifications">Courses</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-subjects') }}" class="menu-link">
                     <div data-i18n="Notifications">Subjects</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-topics') }}" class="menu-link">
                     <div data-i18n="Notifications">Topics</div>
                  </a>
               </li>
            </ul>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-recruiters') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-home"></i>
               <div data-i18n="Recruiters">Recruiters</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-testimonials') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-user"></i>
               <div data-i18n="Testimonials">Testimonials</div>
            </a>
         </li>
         <li class="menu-item">
            <a href="{{ route('admin-faqs') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-chat"></i>
               <div data-i18n="Faqs">Faqs</div>
            </a>
         </li>

         <li class="menu-item">
            <a href="{{ route('admin-coupons') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-chat"></i>
               <div data-i18n="Coupons">Coupons</div>
            </a>
         </li>

         <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
               <i class="menu-icon tf-icons bx bx-book"></i>
               <div data-i18n="SyncErp">SyncErp</div>
            </a>
            <ul class="menu-sub">
               <li class="menu-item">
                  <a href="{{ route('admin-sync-with-erp') }}" class="menu-link">
                     <div data-i18n="Notifications">All Sync With ERP</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-sync-courses') }}" class="menu-link">
                     <div data-i18n="Notifications">Sync Courses</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-sync-fees') }}" class="menu-link">
                     <div data-i18n="Notifications">Sync Fees</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-sync-states') }}" class="menu-link">
                     <div data-i18n="Notifications">Sync States</div>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="{{ route('admin-sync-highest-qualifications') }}" class="menu-link">
                     <div data-i18n="Notifications">Sync Qualification</div>
                  </a>
               </li>
            </ul>
         </li>
         
         <li class="menu-item">
            <a href="{{ route('admin-settings') }}" class="menu-link">
               <i class="menu-icon tf-icons bx bx-cog"></i>
               <div data-i18n="Settings">Settings</div>
            </a>
         </li>
         
      </ul>
   </aside>
<!-- / Menu -->