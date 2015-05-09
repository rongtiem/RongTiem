<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>RongTiemCS@TU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">    
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/styles.css" rel="stylesheet"/>   

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
                    <div class="wide">
                        <div class="clearfix">
                            <div class="pos_fixed1" >
                                <img src="images/nameSys1.png" height="42%" width="32%" styles="margin-right: 20px;">   
                            </div>
                            <div class="pos_fixed2" align="left" >
                                {{ Form::open(array('url' => '/login')) }}
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <lable>Email</lable>
                                                </td>
                                                <td>
                                                    <lable>Password</lable>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{ Form::text('email2', Input::old('email2'), array('placeholder' => 'awesome@awesome.com')) }}
                                                    <!--<input class="inputtext" name="email" id="email" value="" tabindex="1" type="text">-->
                                                </td>
                                                <td>
                                                    {{ Form::password('password2') }}    
                                                    <!--<input class="inputtext" name="password" id="password" tabindex="2" type="password">-->
                                                </td>
                                                <td>
                                                    <lable id="loginbutton">
                                                        <!--<input value="Log In" tabindex="4" id="u_0_n" type="submit">-->
                                                        {{ Form::submit('Log In',array('class'=>'btn btn-large btn-block')) }}
                                                    </lable>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <a href="">ลืมรหัสผ่าน?</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                {{ Form::close() }}
                            </div>
                        </div>

                    </div>
                    <div div class="col-sm-12">
                        <div align="center">
                            @if(Session::has('mail'))
                            <h2>
                                ไม่สามารถยืนยันตัวตนได้
                            </h2>
                            @else
                            <h2>
                                กรุณารอการตรวจสอบจากผู้ดูแลระบบ
                            </h2>
                            @endif
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    {{ HTML ::script('js/angular.js')}}
    {{ HTML ::script('js/app.js')}}
</body>
</html>