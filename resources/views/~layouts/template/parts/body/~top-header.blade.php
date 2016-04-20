<div class="header navbar">
<div class="brand visible-xs">
  <!-- toggle offscreen menu -->
  <div class="toggle-offscreen">
    <a href="javascript:;" class="hamburger-icon visible-xs" data-toggle="offscreen" data-move="ltr">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </div>
  <!-- /toggle offscreen menu -->
  <!-- logo -->
  <a class="brand-logo">
    <span>REACTOR</span>
  </a>
  <!-- /logo -->
</div>
@if(count(@$this_url) != 1)
<ul class="nav navbar-nav hidden-xs">
  <li>
    <a href="javascript:;" class="small-sidebar-toggle ripple" data-toggle="layout-small-menu">
      <i class="icon-toggle-sidebar"></i>
    </a>
  </li>
</ul>
@endif
@include('~layouts.template.parts.body.~user')
</div>