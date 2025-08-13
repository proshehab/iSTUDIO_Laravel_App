  <!-- ========== Left Sidebar Start ========== -->
  <div class="vertical-menu">

      <div data-simplebar class="h-100">

          <!--- Sidemenu -->
          <div id="sidebar-menu">
              <!-- Left Menu Start -->
              <ul class="metismenu list-unstyled" id="side-menu">
                  <li class="menu-title" key="t-menu">Menu</li>

                  <li>
                      <a href="{{ route('dashboard.index') }}"
                          class="waves-effect {{ Route::is('dashboard.index') ? 'active' : '' }}">
                          <i class="bx bx-home-circle"></i>
                          <span key="t-dashboards">Dashboards</span>
                      </a>

                  </li>

                  <li>
                      <a href="javascript:void(0);"
                          class="has-arrow waves-effect {{ Route::is('homeHero.*') ? 'active' : '' }}">
                          <i class="bx bx-layout"></i>
                          <span key="t-dashboards">Hero Section</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="true">
                          <li>
                              <a href="{{ route('heroSection.index') }}" key="t-all-heros">Heros</a>
                          </li>
                          <li>
                              <a href="#" key="t-add-hero">Hero Image</a>
                          </li>
                          <li>
                              <a href="#" key="t-add-hero">Hero Feature</a>
                          </li>
                      </ul>
                  </li>


                  <li>
                      <a href="#" class="has-arrow waves-effect">
                          <i class="bx bx-layout"></i>
                          <span key="t-layouts">Layouts</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="true">
                          <li>
                              <a href="#" key="t-vertical">Vertical</a>
                          </li>
                      </ul>
                  </li>






























              </ul>
          </div>
          <!-- Sidebar -->
      </div>
  </div>
  <!-- Left Sidebar End -->
