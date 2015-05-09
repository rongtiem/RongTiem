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
      <div  class="input-group input-group-sm" style="max-width:360px;" ng-controller="AirplanesCtrl">
        <input type="text" class="sb_input" ng-model="selectedAirplane" typeahead="airplane as post.title for airplane in getAirplane($viewValue) | filter:$viewValue | limitTo:3" placeholder="Search" typeahead-template-url="templates/airplane-tpl.html">      
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button> 
     
        <h1>Selected Airplane</h1>
        <pre>[[selectedAirplane | json]]</pre>
    </div>
    </form>
    
    <ul class="nav navbar-nav">
      @if(Auth::check())
      <li>
        <a href="http://rongtiem.com/home"><i class="glyphicon glyphicon-home"></i> Home</a>
      </li>
      @endif
      <!--<li>
        <a href="#postModal" role="button" data-toggle="modal"><i class="glyphicon glyphicon-plus"></i> Post</a>
      </li>-->  
      <li>
        <a href="{{ URL::to('logout') }}">Logout</a>
      </li>
    </ul>
    <div class="clearfix">
      <div>
        <ul class="nav navbar-nav" style="float:right">
          <li>
            <i type="button" class="glyphicon glyphicon-user" style="margin: 15px 10px 10px 5px; font-size:1.5em;"><span class="badge">4</span></i>
            <i type="button" class="glyphicon glyphicon-globe" style="margin: 15px 10px 10px 5px; font-size:1.5em;"><span class="badge">4</span></i>
            
            <!--<button type="button" class="glyphicon glyphicon-globe" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamus
              sagittis lacus vel augue laoreet rutrum faucibus.">
              Popover on bottom
            </button>-->
          </li>
          @if(Auth::check())
          <li>
            <i class="glyphicon glyphicon"></i><p >User Id: {{  Auth::user()->id }} สวัสดี: {{  Auth::user()->FirstName }}</p>       
          </li>
          @endif

          <script type="text/javascript">
              var id = {{  Auth::user()->id }} // or array etc
          </script>
        </ul>
      </div>
      
    </div>
    
  </nav>
</div>
<!-- /top nav -->

