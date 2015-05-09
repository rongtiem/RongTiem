<!-- center -->

<div  class="col-sm-6" id="posts" ng-controller="PostCtrl" >
  <!--post-->   
  <div class="well" > 
    <ul class="list-inline">
      <li ><a href="/" >แบ่งปันความรู้</a></li>|
      <li ><a href="" ng-click="isQuestionFormOpen = !isQuestionFormOpen" >ตั้งคำถาม</a></li>
    </ul>
    <div >
    <form class="form-horizontal" style="padding:14px;" enctype="multipart/form-data" ng-submit="addNewPost()">
      <!--<h4>What's New</h4>--> 
      <!--<div class="form-group" style="padding:14px;" >-->
      <p ng-show="isQuestionFormOpen" ng-model="postQuest" id="QuestionForm">?</p>
      <input type="text" class="form-control" placeholder="กรุณาใส่หัวเรื่อง..." ng-model="posttitle"></input>
      <textarea name="body"class="form-control" placeholder="ส่งต่อ ความรู้กันดีไหม?" ng-model="postbody"></textarea>  
      <!-- tag -->
      <tags-input ng-model="posttags" min-length="1" >
        <auto-complete source="loadTags($query)"></auto-complete>
      </tags-input>
      <!--<p>[[posttags]]</p>-->

      @if(Session::has('name'))
        <p >{{Session::get('name')}}</p>
        <img id="img" src="http://rongtiem.com/uploads/{{$name = Session::get('name')}} " width="100%" height="100%" >
      @endif 
      
    
      <ul class="list-inline" >
        <!--<i ng-hide="imageSrc" ></i>-->
        <img ng-if="imageSrc != ' ' " ng-src="[[imageSrc]]" height="40%" width="40%" ng-model="img"/><br/>
        <p>[[fileName]]</p>
        <label class="glyphicon glyphicon-camera" for="file" ></label>
        <input style="display: none;" type="file" name="file" id="file" ng-file-select="onFileSelect2($files)" multiple/>
        <label class="glyphicon glyphicon-paperclip" for="file2" ></label>
        <input style="display: none;" type="file" name="file2" id="file2" ng-file-select="onFileSelect($files)" multiple/>
        <button type="submit" class="btn btn-primary pull-right">สร้างกระทู้</button>
        <!--<button type="button" class="btn btn-primary" onclick="$('#upload_modal').modal({backdrop: 'static'});">
          <i class="icon-plus-sign icon-white">    
        </i>Upload</button>--> 
      </ul> 
      <!--</div>--> 
      </form> 
    </div>
  </div><!--/Panel up status class well-->

  <!--Show post -->
  <div ng-controller="FrmController" ng-repeat="post in posts | limitTo: 10 | filter: checkLobbyID">  
    <div style="background-color:white; border-top-right-radius: 4px; border-top-left-radius: 4px;">
      <div class="panel-heading">
        <div ng-if="post.question == '1'" > <img src="images/qMark.png" style="float:right" ></div>
        <div ng-if="post.question != '1'" > <img src="images/paper.png" style="float:right" ></div>
        
        <p ng-model="userId"><img ng-src="http://rongtiem.com/img/[[post.user_id]]/image" width="50px" height="50px"> [[post.user_firstname]] [[post.user_lastname]]</p> <a href="#" class="pull-right">View all</a> <h4 style="background-color:">[[post.title]] </h4>
      </div>
      <div class="panel-body" >
        <div class="clearfix">
          [[post.body]]  <br>
          <!--<p><img ng-src="http://rongtiem.com/posts/[[post.id]]/image" width="200px" height="200px"></p>-->
          <p ng-if="0 != post.img"><img src="http://rongtiem.com/uploads/[[post.img]]" width="100%" height="100%" ng-model="img"></p><br>
          <a ng-if="0 != post.file"href="http://rongtiem.com/uploads/Attachfile/[[post.file]]">[[post.file]]</a><br>
          [[post.tags]]
        </div>
        <hr>
        <span ng-controller="LikeController">
          @include('Social.twitter')
          <a ng-click="likeClick()" ng-init="liked='Like'; likeCount=post.likes" > [[liked]] [[likeCount]] [[likeNum]]</a>
          <span float: "right" href="" >กระทู้นี้มีประโยชน์หรือไม่?</span><button align="right" ng-click="HelpfulClick()">มี</button><button>ไม่มี</button>
        </span>
      </div>
    </div>
    <div  class="well" >
      <form class="form-horizontal" ng-submit="addNewComment()">
        <ul style="list-style-type: none;padding: 0px;">
          <li ng-repeat="comnt in comments | filter: post.id | limitTo: 5"><img ng-src="http://rongtiem.com/img/[[comnt.user_id]]/image" width="30px" height="30px"> [[comnt.commentsDes]] </li> <!--ng-click='btn_add()'-->
        </ul>
        <textarea ng-enter="btn_add()" ng-model="txtcomment" placeholder="เขียนความคิดเห็น" style='width:450px;height:30px;'></textarea>
        <button class="btn btn-default"  style='margin-top:10px;'>แสดงความคิดเห็น</button>       
      </form>
    </div>
  </div><!--/Show post-->
  
</div><!--/center class="col-sm-6" id="posts" ng-controller="PostCtrl"-->
<!--/post-->  

