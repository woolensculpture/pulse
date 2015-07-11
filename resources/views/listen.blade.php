<!DOCTYPE html>

<!--
This document and all those relating to it are property of WITR 89.7, Rochester Institute of Technology
Developer: John Phillip Betley
© 2011 WITR 89.7 | Rochester Institute of Technology
-->

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="author" content="John Betley, Eli Clampett">

	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

	<link href="{{ secure_asset('img/favicon.ico') }}" rel="shortcut icon">

	<title>WITR 89.7</title>

    <link href="{{ secure_asset('css/reset.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ secure_asset('css/style.font.css') }}" rel="stylesheet" type="text/css">
    <style>
        body {
            background: #0a0d0e;
            font-family: AlternateGothic2BTRegular, BebasNeueRegular, LeagueGothicRegular;
            padding: 20px;
        }

        h1 {
            font-weight: normal;
            font-size: 25px;
        }

        #logo {
            display: inline-block;
            margin-right: 20px;
            vertical-align: top;
            box-shadow: 5px 5px black;
            -moz-box-shadow: 5px 5px black;
            -webkit-box-shadow: 5px 5px black;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }

        .player {
            display: inline-block;
            vertical-align: top;
            background: #ffffff;
            padding: 5px 10px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border-radius: 5px;
        }

        #copyright {
            margin-top: 10px;
            color: #ffffff;
        }

        button {
            border: none;
            display: inline-block;
            margin-right: 1em;
            padding: 6px;
            text-decoration: none;
            font-size: 12px;
            font-family: Verdana;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            background: #00a7e1;
            color: white;
            box-shadow: 0 1px 0 white;
            -moz-box-shadow: 0 1px 0 white;
            -webkit-box-shadow: 0 1px 0 white;
        }

        button:hover {
            background: #0090c4;
            cursor: pointer;
        }

        .player__listings__station
        {
            margin-bottom: 11px;
        }

        .wrapper {
            background-color: #cccccc;
            padding: 15px;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
        }

    </style>

</head>
<body>
    <div class="wrapper">
        <img id="logo" src="{{ secure_asset('img/header/witr_logo.png') }}" alt="WITR 89.7" class="border">
        <div class="player">
            <div class="player__listings">
                <div class="player__listings__station --pulse">
                    <h1 class="player__listings__station__name">The Pulse of Music</h1>   
                    @foreach ($pulseMounts as $mountName => $mountUrl)
                        <button class="player__listings__mount" data-mount="http://streaming.witr.rit.edu:8000/{{{ $mountUrl }}}">
                            {{{ $mountName }}}
                        </button>
                    @endforeach
                </div>

                <div class="player__listings__station --underground">
                    <h1 class="player__listings__station__name">WITR Underground</h1>   
                    @foreach ($undergroundMounts as $mountName => $mountUrl)
                        <button class="player__listings__mount" data-mount="http://streaming.witr.rit.edu:8000/{{{ $mountUrl }}}">
                            {{{ $mountName }}}
                        </button>
                    @endforeach
                </div>
            </div>
            <audio controls autoplay src="" class="player__audio"></audio>
        </div>
    </div>
    <div id="copyright">&copy; 2015 WITR 89.7 | Rochester Institute of Technology</div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var $player = $('.player__audio'),
                $buttons = $('.player__listings__mount');

            $buttons.on('click', playMount);

            function playMount()
            {
                var $this = $(this),
                    mount =  $this.data('mount');
                $player.attr('src', mount);
            }
        });
    </script>
</body>
</html>
