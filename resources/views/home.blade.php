@extends('layouts.app')

@section('content')
    <style type="text/css" rel="stylesheet">
        .dashboard{
            text-align: center;
            font-size: 25px;
            font-family: 'microsoft yahei';
        }
        .dashboard p{
            font-size: 16px;
            text-align: right;
            padding-right: 20%;
        }
        .dashboard span{
            color: cornflowerblue;
        }
        .panel-body li{
            list-style: none;
            /*background: #e8e8e8;*/
            margin:7px 0;
            height: 35px;
            line-height: 35px;
            padding-left: 20px;
        }
        .panel-body p{
            font-size: 20px;
        }
        .song{
            width:30%;
            display: inline-block;
        }
        .song span{
            color:cornflowerblue;
        }
        .singer{
            width:30%;
            display: inline-block;
        }
        .singer span{
            color: cornflowerblue;
        }
        #song_picture{
            width:20%;
            display: inline-block;
        }
        .create{
            border: 1px #e3e3e3 dotted;
            height:100px;
            padding:30px 10px;
        }
        .edit{
            border: 1px #e3e3e3 dotted;
            height:200px;
            margin-top: 20px;
            padding:20px 50px;
        }
        .delete{
            margin-top: 20px;
            border: 1px #e3e3e3 dotted;
            height:80px;
            padding:30px 10px;
        }
        .create span{
            width: 28%;
            display: inline-block;
        }
        .create span input{
            margin-left: 10px;
        }
        .edit p{
            font-size: 14px;
            margin-left: 100px;
        }

/*        .edit p span{
            width: 30%;
            display: inline-block;
        }*/
        .edit p input{
            margin-left: 20px;
        }
        .delete{
            display: inline;
        }
        #delete_btn{
            height: 30px;
            border:none;
            background: #e8e8e8;
            color: black;
            outline: none;
            width: 80px;
            line-height: 30px;
            border-radius: 5px;
        }
        #delete_btn:hover{
            color: cornflowerblue;
        }
        .button{
            width: 80px;
            background: #e8e8e8;
            border-radius: 5px;
            border:1px #e8e8e8 solid;
            transition: all 0.5s linear;
        }
        .button:hover{
            color: cornflowerblue;
        }
    </style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading dashboard">IMusic
                    <p>
                        welcome, <span>{{Auth::user()->name}}</span>!
                    </p>
                </div>

                <div class="panel-body">
                    <p>Your song lists:</p>
                    @if($song_info)
                        @foreach($song_info as $value)<!--song_info 是data source ，value代替它。-->
                            <li>
                                <span id="song_picture">
                                  @if(Storage::disk('local')->has($value->song_name.'-songpic.jpg'))
                                  <section>
                                     <img src="{{url('getpic',['filename'=>$value->song_name.'-songpic.jpg'])}}">
                                  </section>
                                  @endif
                                </span>
                                <span class="song">song name:<span>{{$value->song_name}}</span> </span>
                                <span class="singer">singer name: <span>{{$value->singer_name}}</span></span>                    
                                <form method="post" action="{{url('/post/delete')}}" class="delete">
                                    <input type="hidden" name="delete_song_name" value="{{$value->song_name}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="submit" value="delete" id="delete_btn">
                                </form>
                            </li>
                        @endforeach
                    @endif
                </div>
                          <div class="panel-body">
                    <p>Operations</p>
                    <div class="create">
                        <form method="post" action="{{url('/post/create')}}" enctype="multipart/form-data">
                            <span>add song picture<input type="file" name="song_picture"></span>
                            <span>Add your song <input type="text" name="song_name" id="song_name" autofocus></span>
                            <span>Add the singer<input type="text" name="singer_name" id="singer_name" ></span>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="submit" value="create" class="button">
                        </form>
                    </div>
                    <div class="edit">
                        <form method="post" action="{{url('/post/edit')}}" enctype="multipart/form-data">
                            <p><span>song to modify</span> <input type="text" name="original_song_name" required> </p>
                            <p><span>Edit the song</span><input type="text" name="edit_song_name" id="edit_song_name" ></p>
                            <p>
                                <span>Edit song picture<input type="file" name="updateSongPicture"></span>
                            </p>
                            <p><span>Edit the singer</span><input type="text" name="edit_singer_name" id="edit_singer_name" >
                                <input type="submit" value="edit" class='button'>
                            </p>
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
