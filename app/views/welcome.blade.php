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
                                <img src="images/nameSys.png" height="22%" width="22%" styles="margin-right: 20px;">   
                            </div>
                            <div class="pos_fixed2" align="left" >
                                {{ Form::open(array('url' => '/')) }}
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
                                                    {{ Form::text('email', Input::old('email'), array('placeholder' => 'awesome@awesome.com')) }}
                                                    <!--<input class="inputtext" name="email" id="email" value="" tabindex="1" type="text">-->
                                                </td>
                                                <td>
                                                    {{ Form::password('password') }}    
                                                    <!--<input class="inputtext" name="password" id="password" tabindex="2" type="password">-->
                                                </td>
                                                <td>
                                                    <lable id="loginbutton">
                                                        <!--<input value="Log In" tabindex="4" id="u_0_n" type="submit">-->
                                                        {{ Form::submit('Log In') }}
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
                    <div div class="col-sm-6">
                        <div align="center">
                            <h2>
                                โรงเตี๊ยม ที่แห่งการพบปะพูดคุย แบ่งปันความรู้
                            </h2>
                        </div>
                    </div>
                    <div div class="col-sm-6">
                        <div align="center">
                            <h2>สมัครสมาชิก</h2>
                            <h3>ขอเชิญเข้าสู่ยุทธภพแห่งความรู้</h3>
                            {{ Form::open(array('url' => '')) }}
                                <table style="width:80%">
                                    <tr style="width:100%">
                                        <td><input class="form-control" type="text" placeholder="ชื่อ" ></input></td>
                                        <td><input class="form-control" type="text" placeholder="นามสกุล" ></input></td>     
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input class="form-control" type="text" placeholder="ชื่อผู้ใช้งาน" ></input></td>    
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input class="form-control" type="text" placeholder="อีเมล์" ></input></td>   
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input class="form-control" type="password" placeholder="รหัสผ่าน" ></input></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input class="form-control" type="password" placeholder="รหัสผ่านซ้ำ" ></input></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input  type="radio" name="sex" value="male" checked>อาจารย์
                                            <input  type="radio" name="sex" value="male" >นักศึกษา
                                            <input  type="radio" name="sex" value="male" >ศิษย์เก่า
                                        </td>      
                                    </tr>
                                    <tr>
                                        <td colspan="2" >{{ Form::submit('สมัครสมาชิก') }}</td>
                                    </tr>
                                    
                                </table>
                            {{ Form::close() }}
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