<html>

    <head>
        <script type="text/javascript" lang="javascript">
            function goback() {
                window.open("/home","_self");
            }
        </script>
        <style type="text/css">
            *{
                margin: 0;
                padding: 0;
                font-family: "microsoft yahei";
                background: #e8e8e8;
            }
            .register{
                margin-top: 20px;
                text-align: center;
                font-size: 20px;
            }
            .register p{
                font-size: 30px;
                font-weight: bold;
                color: cornflowerblue;
            }
            .btn{
                margin-left: 44%;
                border-radius: 20px;
                width: 200px;
                height: 80px;
                border: solid 1px black;
                outline: none;
                transition: all 0.5s linear;
                font-size: 25px;
            }
            .btn:hover{
                background: cornflowerblue;
                color: white;
            }
/*            #mybutton{
                margin-top: 20px;
                border:1px solid #ccc;
                background:#fff;
                color:#000;
                padding:5px 15px;
                margin-left: 43%;
            }*/
            .img input{
                margin-left: 40%;   
            }
            #submit{
                margin-left: 650px;
            }
            .img{
                display: inline-block;
                margin-left: 40%;
                margin-top: 20px;
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
            <div class="register">
                  Welcome!
                 <p>{{$name}}</p>
                You can upload your display photo!

                 </div>
                <form action="{{url('photo')}}" method="post" enctype="multipart/form-data">
                <div>
                   <input type="file" name='image' id="submit"/>
<!--                   <input type="button" onclick="file.click()" id="mybutton" value="select your dispaly photo"/>-->
                </div>
                    <input type="hidden" value="{{Session::token()}}" name="_token">
                    <input type='submit' value="submit" id="submit">
               </form>     
               @if(Storage::disk('local')->has($user->id.'-DP.jpg'))
               <section>
                   <div>
                       <img src='{{url('getphoto',['filename'=>$user->id.'-DP.jpg'])}}' class="img">

                   </div>
               </section>
               @endif
            <input type="button" value="ToHomePage" id="toDash" onclick="goback()" class="btn"/>
    </body>
    
</html>
