 
 <!-- left -->                         
 <div class="col-sm-3">
  <!--profile pic-->
  <div class="panel panel-default" ng-controller="UserController as u">
    <div class="panel-thumbnail" align="center"><img src="/images/picture.png" class="img-responsive" width="150px" height="150px" ></div>
    <div class="panel-body">
      <p class="lead">username</p> 
      <p> <img src="/images/user.png" class="img-responsive" style="float:left"> ชาวยุทธ์</p>
      <!--<p>พลังลมปราณ: <img src="/images/power.png" class="img-responsive"></p>-->
      <div ><!--progressbar -->
        <div max="max" value="dynamic" type="warning" class="progress-striped active progress ng-isolate-scope" >
          <div style="width: [[u.point]]%;" class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="1500" ng-style="{width: percent + '%'}" aria-valuetext="83%"><i class="ng-scope" > [[u.point2]]/1500</i></div>
        </div>
        <!--/progressbar -->
      </div>
      
    </div>
  </div>
  <!--/profile pic-->

  <div class="panel panel-default">
    <div class="panel-heading">
      <h4>วิชาที่เรียน/สอน</h4><a data-toggle="modal" data-target="#myModal" href="">+เพิ่ม</a>
      <!-- Button trigger modal -->

    </div>
    <div class="panel-body">
      <div class="list-group">
        <a href="subject" class="list-group-item">CS111</a>
        <a href="http://bootply.com/tagged/datetime" class="list-group-item">CS314</a>
        <a href="http://bootply.com/tagged/datatable" class="list-group-item">CS388</a>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading">Tag</div>
    <div class="panel-body">
      <a href="">SE</a>
      <a href="">Network</a>
      <a href="">Parallel Processing</a>
      <a href="">Image and Multimedia</a>
      <a href="">CG</a>
      <a href="">Database</a>
      <a href="">NLP</a>
      <a href="">Embeded</a>
      <a href="">Machine Learning</a>
      <a href="">AI</a>
      <a href="">Security</a>
    </div>
  </div>

</div>
<!--/left -->

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" tabindex="-1">
  <div class="modal-dialog">  
    <div class="modal-content">
      <form class="form-horizontal">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">สร้างกลุ่ม</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <div><label for="group-name" class="col-lg-9 control-lable">Group Name</label></div>
            

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-primary">ยืนยัน</button>
        </div>
      </form>
    </div>
  </div>        
</div><!-- Modal End-->