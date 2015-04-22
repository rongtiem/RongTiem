<!-- top nav -->
<div class="navbar navbar-red navbar-fixed-top ">  
  <div class="navbar-header">
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="/" class="navbar-brand logo" style="color:#9C5210">cs</a>
  </div>
  <nav class="collapse navbar-collapse" role="navigation">
    <form class="navbar-form navbar-left">
      <div class="input-group input-group-sm" style="max-width:360px;">
        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div>
    </form>
    <ul class="nav navbar-nav">
      <li>
        <a href="/"><i class="glyphicon glyphicon-home"></i> Home</a>
      </li>
      <li>
        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
      </li>  
      <li>
        <a href="{{ URL::to('logout') }}">Logout</a>
      </li>
        @if(Session::has('global'))
        <a>User Id:{{Session::get('global')}}</a>
        @endif
        @if(Auth::check())
        <a>aaaa</a>
        @else
        <a href="">else</a>
        @endif
      
    </ul>
  </nav>
</div>
<!-- /top nav -->

