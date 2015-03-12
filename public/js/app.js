(function(){
	var myApp = angular.module('myApp', ['ngTagsInput'], function ($interpolateProvider) {
		$interpolateProvider.startSymbol('[[');
		$interpolateProvider.endSymbol(']]');
	});

	myApp.controller("PostCtrl",function ($scope,$http,fileReader){		
		console.log(fileReader)
		$scope.getFile = function () {
			$scope.progress = 0;
			fileReader.readAsDataUrl($scope.file, $scope)
			.then(function(result) {
				$scope.imageSrc = result;
			});
		};
		$scope.addNewPost = function(){
			if ($scope.posttitle.length>0) {
				$http.get("/posts").success(function(posts){
					$scope.posts = posts;
				});
				if ($scope.isQuestionFormOpen==true) {
					var Quest = 1;
				};

				var postNew = {
					title: $scope.posttitle,
					body: $scope.postbody,
					//tags: $tagsIn,
					question: Quest,
					img: $scope.imageSrc,//slug: Str::slug($scope.posttitle),
					user_id:  '1'
				}
			var img = $scope.file;
			var imgNew = {
				//image: 'name',
				imageName: 'name'
			}

			$http.get("/posts").success(function(posts){
				$scope.posts = posts;
			});
			$scope.posts.push(postNew);
			$scope.posttitle = "";
			$scope.postbody = "";
			$scope.posttags = "tagsIn";	
			$http.post("posts",postNew);
			$http.post("points2");
			$http.post("img",imgNew);
			$http.get("/posts").success(function(posts){
				sleep(1);
				$scope.posts = posts;
			});
		  }
		}

		$http.get("/posts").success(function(posts){
			$scope.posts = posts;
		});

		/*tag */
		$scope.posttags = [
			{ text: 'SE' },
			{ text: 'Network' },
			{ text: 'Parallel Processing' },
			{ text: 'Image and Multimedia' },
			{ text: 'CG' },
			{ text: 'Database' }
		];
		/*/tag */ 

	
	}); //End PostCtrl
	
	myApp.controller("FrmController",function ($scope,$http){
		
		var idPost = $scope.post.id;
		$scope.myFilter = function (item) { 
			return (item == idPost);
		};
		$scope.addNewComment = function(){
			$http.get("/comments").success(function(comments){
				$scope.comments = comments;
			});
			var commentNew = {
				post_id: $scope.post.id,
				commentsDes: $scope.txtcomment
			}
			$http.get("/comments").success(function(comments){
				$scope.comments = comments;
			});
			//$scope.comments.push(commentNew);
			$scope.txtcomment = "";
			$http.post("comments",commentNew);
			$http.get("/comments").success(function(comments){
				$scope.comments = comments;
			});
		}
		$http.get("/comments").success(function(comments){
				$scope.comments = comments;
		});
		/*$scope.myFilter = function (item) { 
			return item === $scope.post_id;
		};*/

		/*$scope.comments = [];
         $scope.btn_add = function() {
            if($scope.txtcomment !=''){
	            $scope.comments.push($scope.txtcomment);
	            $scope.txtcomment = "";
        	}
        }*/

       /* $scope.remItem = function($index) {
            $scope.comment.splice($index, 1);
        }*/
	});

	/*myApp.controller("UploadController",function ($scope, fileReader){
		console.log(fileReader)
		$scope.getFile = function () {
			$scope.progress = 0;
			fileReader.readAsDataUrl($scope.file, $scope)
			.then(function(result) {
				$scope.imageSrc = result;
			});
		};

		$scope.$on("fileProgress", function(e, progress) {
			$scope.progress = progress.loaded / progress.total;
		});

		//$scope.postImg = "";
		
			/*$http.get("/comments").success(function(comments){
				$scope.comments = comments;
			});*/
			//$scope.comments.push(commentNew);
			
			/*$http.get("/comments").success(function(comments){
				$scope.comments = comments;
			});*/

	//});

	myApp.directive("ngFileSelect",function(){
		return {
			link: function($scope,el){

				el.bind("change", function(e){

					$scope.file = (e.srcElement || e.target).files[0];
					$scope.getFile();
				})

			}

		}
	});

	myApp.directive('ngEnter', function () {
		return function (scope, element, attrs) {
			element.bind("keydown keypress", function (event) {
				if(event.which === 13) {
					scope.$apply(function (){
						scope.$eval(attrs.ngEnter,{'event': event});
					});
					event.preventDefault();
				}
			});
		};
	});

	myApp.controller("UserController",['$http',function ($http){
		//$scope.max =1500;
		var filecontent = "la la la",
		that = this;
		$http.get("/points")
		.success(function (data) {
			that.point = (data*100)/1500;
			that.point2 = data;
		});

	}]);

	myApp.controller("LikeController",function ($scope,$http){
		var hasLiked = false;
		$scope.likeClick = function () {
			if (!hasLiked) {
				hasLiked = true;
				$scope.liked = 'Like';
				$scope.likeCount += 1;
				$http.post("/points");
			} 
			else {
				hasLiked = false;
				$scope.liked = 'Like';
				$scope.likeCount -= 1;
			}

		};
		$scope.HelpfulClick = function () {
			$http.post("/points");
		};

	});
	

	

	
	//myApp.controller("UploadController",function ($scope, fileReader){
	//});

	
	

	
})();