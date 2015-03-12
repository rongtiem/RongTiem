 
 <!-- left -->                         
 <div class="col-sm-3">
  <!--profile pic-->
  <div class="panel panel-default" >
    <div class="panel-thumbnail" align="center"><img src="/images/picture.png" class="img-responsive" width="150px" height="150px" ></div>
    <div class="panel-body">
      <p class="lead">username</p> 
      <p> <img src="/images/user.png" class="img-responsive" style="float:left"> ชาวยุทธ์</p>
      <!--<p>พลังลมปราณ: <img src="/images/power.png" class="img-responsive"></p>-->
      <div ng-controller="UserController as u"><!--progressbar -->
        <div max="max" value="dynamic" type="warning" class="progress-striped active progress ng-isolate-scope" >
          <div style="width: [[u.point]]%;" class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="1500" ng-style="{width: percent + '%'}" aria-valuetext="83%"><i class="ng-scope" > [[u.point2]] / 1500</i></div>
        </div>
        <!--/progressbar -->
      </div>
      
    </div>
  </div>
  <!--/profile pic-->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>วิชาที่เรียน/สอน</h4>
    </div>
    <div class="panel-body">
      <div class="list-group">
        <a href="subject" class="list-group-item">CS111</a>
        <a href="http://bootply.com/tagged/datetime" class="list-group-item">CS314</a>
        <a href="http://bootply.com/tagged/datatable" class="list-group-item">CS388</a>
      </div>
    </div>
  </div>

</div>
<!--/left -->
