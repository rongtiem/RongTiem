<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Upload and Resize with jQuery and PHP - Demo</title>
<!-- shim is needed to support upload progress/abort for HTML5 and non-HTML5 FormData browsers.-->
<!-- use html5-shim.js instead if you just support HTML5 browsers and you need progress event-->
<!-- Note: shim.js MUST BE PLACED BEFORE angular.js and angular-file-upload.js AFTER angular.js-->
<script src="js/angular-file-upload-shim.min.js"></script> 
<script src="js/angular.js"></script>
<script src="js/angular-file-upload.min.js"></script> 
 
<div ng-controller="MyCtrl">
  <input type="text" ng-model="myModelObj">
  <input type="file" ng-file-select="onFileSelect($files)">
  <input type="file" ng-file-select="onFileSelect($files)" multiple accept="image/*">
  <div class="button" ng-file-select="onFileSelect($files)" data-multiple="true"></div>
  <div ng-file-drop="onFileSelect($files)" ng-file-drag-over-class="optional-css-class-name-or-function"
        ng-show="dropSupported">drop files here</div>
  <div ng-file-drop-available="dropSupported=true" 
        ng-show="!dropSupported">HTML5 Drop File is not supported!</div>
  <button ng-click="upload.abort()">Cancel Upload</button>
</div>
<script src="js/app2.js"></script> 
</body>
</html>