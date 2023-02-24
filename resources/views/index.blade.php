<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CCTV Stream</title>
    <script type="text/javascript" src="{{ asset('apexnew/app-assets/js/flashphoner.js') }}"></script>

    <style>
        .fp-Video {
            background-color: rgb(172, 172, 172);
            border-radius: 10px;
            margin-bottom: 10px;
            width: 322px;
            height: 242px;
        }
        .display {
            width: 100%;
            height: 100%;
            display: inline-block;
        }
        .display > video,
        object {
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body onload="init_api()">
    <div class="container mt-4">

        <div class="col-lg-12">
            <h3>RSTP CCTV Project</h3>
            <br>
            <div class="col-lg-6">
                <div class="">
                    <div class="card-body">
                        <form action="" method="get">
                            <div class="form-group row">
                                <select class="form-control" id="name" name="name" style="width: 300px;">
                                    <option value="" disabled selected>Choose CCTV Location...</option>
                                    @foreach ($channel as $i)
                                        <option value="{{ $i->name }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-success" style="margin-left: 10px;height: 38px;width: 200px;" type="submit"
                                    value="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        @foreach ($rtsp as $i)
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="fp-Video">
                                    <div id="{{ $i->id_stream }}" class="display"></div>
                                </div>
                                <button id="playBtn" class="btn btn-primary">PLAY</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="text-primary"><strong>{{ $i->name }}</strong></h3>
                                <h5>📌{{ $i->location }}</h5>
                                <p class="text-secondary" style="text-align: justify;">{{ $i->desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                //Status constants
                var SESSION_STATUS = Flashphoner.constants.SESSION_STATUS;
                var STREAM_STATUS = Flashphoner.constants.STREAM_STATUS;
                var session;
                var PRELOADER_URL =
                    "https://github.com/flashphoner/flashphoner_client/raw/wcs_api-2.0/examples/demo/dependencies/media/preloader.mp4";

                //Init Flashphoner API on page load
                function init_api() {
                    Flashphoner.init({});
                    //Connect to WCS server over websockets
                    session = Flashphoner.createSession({
                        urlServer: "wss://demo.flashphoner.com" //specify the address of your WCS
                    }).on(SESSION_STATUS.ESTABLISHED, function(session) {
                        console.log("ESTABLISHED");
                        console.log({!! json_encode($i->name) !!});
                    });

                    playBtn.onclick = playClick;
                }

                //Detect browser
                var Browser = {
                    isSafari: function() {
                        return /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
                    },
                }
                /**
                *
                If browser is Safari, we launch the preloader before playing the stream.
                Playback should start strictly upon a user's gesture (i.e. button click). This is limitation of mobile Safari browsers.
                https://docs.flashphoner.com/display/WEBSDK2EN/Video+playback+on+mobile+devices
                *
                **/
                function playClick() {
                    if (Browser.isSafari()) {
                        Flashphoner.playFirstVideo(document.getElementById({!! json_encode($i->id_stream) !!}), true, PRELOADER_URL).then(
                            function() {
                                playStream();
                            });
                    } else {
                        playStream();
                    }
                }

                //Playing stream
                function playStream() {
                    session.createStream({
                        name: {!! json_encode($i->rtsp) !!}, //specify the RTSP stream address
                        display: document.getElementById({!! json_encode($i->id_stream) !!}),
                    }).play();
                }
            </script>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
