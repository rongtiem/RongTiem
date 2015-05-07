 
 <!-- left -->                         
 <div class="col-sm-3">
  <!--profile pic-->
  <div class="panel panel-default" >
    <div class="panel-thumbnail" align="center"><img ng-src="http://rongtiem.com/img/{{Auth::user()->id}}/image" width="150px" height="200px"></div>
    <div class="panel-body">
      <p class="lead">{{Auth::user()->FirstName}}</p> 
      @if(Auth::user()->points < 500) <!--/Step 1 -->
      <p> <img src="/images/user_1.png" class="img-responsive" style="float:left">  ชาวยุทธ์</p>
      @elseif(Auth::user()->points > 500 && Auth::user()->points < 1000) <!--/Step 2 -->
      <p> <img src="/images/user_2.png" class="img-responsive" style="float:left">   </p>จอมยุทธ์
      @elseif(Auth::user()->points > 1000 && Auth::user()->points < 1500) <!--/Step 3 -->
      <p> <img src="/images/user_3.png" class="img-responsive" style="float:left">  ปรมาจารย์</p>
      @else <!--/Step 4 -->
      <p> <img src="/images/user_4.png" class="img-responsive" style="float:left">  จ้าวยุทธภพ</p>
      @endif
      <!--<p>พลังลมปราณ: <img src="/images/power.png" class="img-responsive"></p>-->
      <!--<div >
        <div max="max" value="" type="warning" class="progress-striped progress ng-isolate-scope" >
          <div style="width: 60%;" class="progress-bar progress-bar-warning" ng-class="type &amp;&amp; 'progress-bar-' + type" role="progressbar" aria-valuenow="90" aria-valuemin="{{Auth::user()->points}}" aria-valuemax="1500" aria-valuetext="83%"><i class="ng-scope" > [[u.point]]{{Auth::user()->points}}/1500</i></div>
        </div>   
      </div>-->
      <div class="progress"><!--progressbar -->
        @if(Auth::user()->points < 500) <!--/Step 1 -->
          @if(Auth::user()->points < 100 )
          <div class="progress-bar progress-bar-info" style="width: 5%">
            <span class="sr-only">10% Complete (info)</span>
            <i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
          @elseif(Auth::user()->points > 100 && Auth::user()->points < 200)
          <div class="progress-bar progress-bar-info" style="width: 10%">
            <span class="sr-only">10% Complete (info)</span>
            <i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
          @elseif(Auth::user()->points > 200 && Auth::user()->points < 300)
          <div class="progress-bar progress-bar-info" style="width: 15%">
            <span class="sr-only">10% Complete (info)</span>
            <i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
          @elseif(Auth::user()->points > 300 && Auth::user()->points < 400)
          <div class="progress-bar progress-bar-info" style="width: 20%">
            <span class="sr-only">10% Complete (info)</span>
            <i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
          @else
          <div class="progress-bar progress-bar-info" style="width: 25%">
            <span class="sr-only">10% Complete (info)</span>
            <i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
          @endif
        @elseif(Auth::user()->points > 500 && Auth::user()->points < 1000) <!--/Step 2 -->
          <div class="progress-bar progress-bar-info" style="width: 25%">
            <span class="sr-only">10% Complete (info)</span>
          </div>
          <div class="progress-bar progress-bar-success" style="width: 25%">
            <span class="sr-only">35% Complete (success)</span>
            <i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
        @elseif(Auth::user()->points > 1000 && Auth::user()->points < 1500) <!--/Step 3 -->
          <div class="progress-bar progress-bar-info" style="width: 25%">
            <span class="sr-only">10% Complete (info)</span>
          </div>
          <div class="progress-bar progress-bar-success" style="width: 25%">
            <span class="sr-only">35% Complete (success)</span>
            
          </div>
          <div class="progress-bar progress-bar-warning " style="width: 25%">
            <span class="sr-only">20% Complete (warning)</span><i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
        @else <!--/Step 4 -->
          <div class="progress-bar progress-bar-info" style="width: 25%">
            <span class="sr-only">10% Complete (info)</span>
          </div>
          <div class="progress-bar progress-bar-success" style="width: 25%">
            <span class="sr-only">35% Complete (success)</span>
            
          </div>
          <div class="progress-bar progress-bar-warning " style="width: 25%">
            <span class="sr-only">20% Complete (warning)</span>
          </div>
          <div class="progress-bar progress-bar-danger" style="width: 25%">
            <span class="sr-only">10% Complete (danger)</span><i style="color:red;">{{Auth::user()->points}}/1500</i>
          </div>
        @endif
        <!--<i style="color:red;" align="center">{{Auth::user()->points}}/1500</i>-->
      </div><!--/progressbar -->
      
    </div>
  </div>
  <!--/profile pic-->

  <div class="panel panel-default">
    <div class="panel-heading">
      @if(Auth::check()&&Auth::user()->role=='teacher')
      <h4>วิชาที่สอน</h4><a data-toggle="modal" data-target="#myModal" href="">+เพิ่ม</a>
      <!-- Button trigger modal -->
      @else
      <h4>วิชาที่เรียน</h4>
      @endif
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