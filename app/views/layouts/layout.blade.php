<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>RongTiemCS@TU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">    
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>   
    <link href="images/icon2.ico" rel="shortcut icon" type="image/x-icon" />
    <!--<script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>-->
    <!--<script>document.write('<base href="' + document.location + '" />');</script>-->
    
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.0.1/ng-tags-input.min.css" />

    <!--<script data-require="angular-route@1.2.13" data-semver="1.2.13" src="http://code.angularjs.org/1.2.13/angular-route.js"></script>
    <script src="http://pc035860.github.io/angular-easyfb/angular-easyfb.min.js"></script>-->


</head>
<body>     
    <div class="wrapper">
        <div class="box">
            <div class="row row-offcanvas row-offcanvas-left">           
                <div class="column col-sm-12 col-xs-12 " id="main">
                    @include('layouts.topnav')
                    <div class="padding">
                        <div class="full col-sm-9">
                            <div class="row">
                                @include('layouts.left')
                                @include('layouts.center')
                                @include('layouts.right')
                            </div>
                            @section('form-modals')
                            @if(Auth::check())
                                @include('file.upload_modal')
                                @endif
                            @yield_section
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!--<script type="text/javascript" src="jquery.form.js"></script>-->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <!-- shim is needed to support non-HTML5 FormData browsers (IE8-9)-->
    {{ HTML ::script('js/angular-file-upload-shim.min.js')}}
    <!--<script src="public/js/angular-file-upload-shim.min.js"></script> -->
    <script src="js/angular-file-upload.min.js"></script> 
    <!--<script data-require="angular.js@1.2.x" src="http://code.angularjs.org/1.2.15/angular.js" data-semver="1.2.15"></script>-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/ng-tags-input/2.0.1/ng-tags-input.min.js"></script>
    {{ HTML ::script('js/scripts.js')}}
    <!--{{ HTML ::script('js/angular.js')}}-->
    {{ HTML ::script('js/app.js')}}
    {{ HTML ::script('js/scripts.js')}}
    {{ HTML ::script('js/upload.js')}}
    {{ HTML ::script('js/jquery.min.js')}}
    {{ HTML ::script('js/jquery-1.9.1.js')}}
    {{ HTML ::script('js/jquery-ui-1.10.2.custom.min.js')}}
    {{ HTML ::script('js/bootstrap.js')}}
    {{ HTML ::script('js/bootstrap-typeahead.js')}}
    {{ HTML ::script('js/typeahead.min.js')}}
    {{ HTML ::script('js/typeahead.jquery.min.js')}}
    {{ HTML ::script('js/typeahead.jquery.js')}}
    {{ HTML ::script('js/typeahead.bundle.min.js')}}
    {{ HTML ::script('js/typeahead.bundle.js')}}
    {{ HTML ::script('js/bloodhound.min.js')}}
    {{ HTML ::script('js/bloodhound.js')}}
</body>
</html>