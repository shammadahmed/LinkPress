<nav class="navbar navbar-default">
    <div class="navbar-header">
      <a href="{{ url('/') }}"><h3 class="logo">{{ $appData->name }}</h3></a>
    </div>
    <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
      @if(!empty($link))
          <a href="{{ $link->url }}" class="btn btn-danger link">
            <i class="fa fa-external-link"></i>
            <b class="link-text">Continue to site</b>
          </a>
      @else
        <a href="{{ url('links') }}" class="btn btn-primary link">
          <b>View Shared Links</b>
        </a>
      @endif
    </ul>
</nav>