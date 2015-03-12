<!-- center -->
<div  class="col-sm-6" id="posts" ng-controller="PostCtrl" >
  <!--post-->   
  <div>
    <img src="/images/absolute-header-img3.png" class="img-responsive"  >
  </div>
  <div class="well" class="clearfix groupsJumpBarTop" style="background-color:white;padding:10px" height="50px" >
    <ul class="list-inline" >
      <li>
        <div>
          <a style="font-weight:bold;font-size:110%;" href="" >Group</a>
        </div>
      </li> |
      <li>
        <div>
           <a style="font-weight:bold;font-size:110%;" href="" >Event</a>
        </div>
      </li> |
      <li>
        <div>
           <a style="font-weight:bold;font-size:110%;" href="" >File</a>
        </div>
      </li> |
      <li>
        <div>
           <a style="font-weight:bold;font-size:110%;" href="" >Years</a>
        </div>
      </li>
    </ul>
  </div>

  <div class="well" > 
    <ul class="list-inline">
      <li ><a href="/" >แบ่งปันความรู้</a></li>|
      <li ><a href="" ng-click="isQuestionFormOpen = !isQuestionFormOpen" >ตั้งคำถาม</a></li>
    </ul>
    <div >
      <form class="form-horizontal" style="padding:14px;" ng-submit="addNewPost()">
        <!--<h4>What's New</h4>--> 
        <!--<div class="form-group" style="padding:14px;" >--> 
        <p ng-show="isQuestionFormOpen" ng-model="postQuest" id="QuestionForm">?</p>
        <input type="text" class="form-control" placeholder="กรุณาใส่หัวเรื่อง..." ng-model="posttitle"></input>
        <textarea name="body"class="form-control" placeholder="ส่งต่อ ความรู้กันดีไหม?" ng-model="postbody"></textarea>  
        <!-- tag -->
        <tags-input  ng-model="posttags" ></tags-input>
        <!-- /tag -->
        <ul class="list-inline" >
          <i ng-hide="imageSrc" ></i>
          <img ng-src="[[imageSrc]]" ng-model="postImg" height="70" width="70"/><br/>
          <label class="glyphicon glyphicon-camera" for="uploadBanner" ></label>
          <input style="display: none;" type="file" name="Upload a img" id="uploadBanner" ng-file-select="onFileSelect($files)"/>        
          <label class="glyphicon glyphicon-upload" for="uploadBanner" ></label>
          <input style="display: none;" type="file" name="Upload a file" id="uploadBanner2" />
          <!--<li ><a href="/file"><i class="glyphicon glyphicon-camera"></i></a></li>-->
          <button type="submit" class="btn btn-primary pull-right">สร้างกระทู้</button>
        </ul> 
        <!--</div>--> 
      </form> 
    </div>
  </div><!--/Panel up status class well-->

  <!--Show post -->
  <div ng-controller="FrmController" ng-repeat="post in posts | limitTo: 10">  
    <div style="background-color:white; border-top-right-radius: 4px; border-top-left-radius: 4px;">
      <div class="panel-heading">
        <div ng-if="post.question == '1'" style="background-color:pink"> ???? </div>
        <a href="#" class="pull-right">View all</a> <h4 style="background-color:">[[post.title]] </h4>
      </div>
      <div class="panel-body" >
        <div class="clearfix">
          [[post.body]]  
          [[post.tags]]
        </div>
        <hr>
        <span ng-controller="LikeController">
          @include('Social.twitter')

          <a ng-click="likeClick()" ng-init="liked='Like'; likeCount=0" ng-model="likeButt">[[liked]] [[likeCount]]</a>
          <a float: "right" href="" >กระทู้นี้มีประโยชน์หรือไม่?</a><button align="right" ng-click="HelpfulClick()">มี</button><button>ไม่มี</button>
        </span>
      </div>
    </div>
    <div  class="well" >
      <form class="form-horizontal" ng-submit="addNewComment()">
        <ul>
          <li ng-repeat="comnt in comments | filter: post.id "> [[comnt.commentsDes]] </li> <!--ng-click='btn_add()'-->
        </ul>
        <textarea ng-enter="btn_add()" ng-model="txtcomment" placeholder="เขียนความคิดเห็น" style='width:450px;height:30px;'></textarea>
        <button class="btn btn-default"  style='margin-top:10px;'>แสดงความคิดเห็น</button>       
      </form>
    </div>
  </div><!--/Show post-->
  
</div><!--/center class="col-sm-6" id="posts" ng-controller="PostCtrl"-->
<!--/post-->  