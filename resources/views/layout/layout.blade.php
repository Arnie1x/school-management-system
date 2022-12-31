<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">

@include('layout.partials.header')

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      @include('layout.partials.menu')

      <!-- Layout container -->
      <div class="layout-page">

        @include('layout.partials.nav')

        <div class="content-wrapper">

          <div class="container">
            @yield('content')
          </div>

          @include('layout.partials.footer')

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

  </div>
  <!-- / Layout wrapper -->
  @include('layout.partials.footer-scripts')

</body>

</html>