@extends('frontend.layouts.layout')
@section('content')
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
<section id="compact-style">
  <div class="row">
    <div class="col-sm-12">
        <div class="content-header">Streaming CCTV</div>
    </div>
  </div>

  <div class="row">
    <!-- BEGIN : FILTER -->
    <div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="card-content">
					<form action="" method="get">
						<div class="input-group">
							<select class="form-control" id="name" name="name" style="width: 300px;">
								<option value="" disabled selected>Choose CCTV Location...</option>
								@foreach ($channel as $i)
								<option value="{{ $i->name }}">{{ $i->name }}</option>
								@endforeach
							</select>
							<div class="input-group-append">
								<button class="btn btn-sm btn-success" style="margin-left: 10px;height: 38px;max-width: auto;" type="submit" value="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		@foreach($rtsp as $i)
		<div class="card">
			<div class="card-body">
				<div class="card-content">
                    <div id="message">
                        <p id="loading">Loading ...</p>
                    </div>
					<div class="fp-Video">
                        <div id="{{ $i->id_stream }}" class="display"></div>
                    </div>
                    <div id="playBtn"></div>
                    <div id="refresh"></div>
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
                    url = "wss://demo.flashphoner.com" //specify the address of your WCS
                    // url = "wss://127.0.0.1:8000" //specify the address of your WCS
                    session = Flashphoner.createSession({
                        urlServer: url
                    }).on(SESSION_STATUS.ESTABLISHED, function(session) {

                        console.log('established');

                        let load = document.getElementById("loading");
                        load.remove();

                        let ready = document.getElementById("message");
                        ready.innerHTML = "<p>Ready to Play</p>";

                        let res = document.getElementById("playBtn");
                        res.innerHTML = "<button class='btn btn-primary'>PLAY</button>";

                    }).on(SESSION_STATUS.DISCONNECTED, function(session) {

                        console.log("disconnected");

                        let load = document.getElementById("loading");
                        load.remove();

                        let ready = document.getElementById("message");
                        ready.innerHTML = "<p>Status Disconnected, Please Check Your Connection</p>";

                    }).on(SESSION_STATUS.FAILED, function(session) {

                        console.log("failed");

                        let load = document.getElementById("loading");
                        load.remove();

                        let ready = document.getElementById("message");
                        ready.innerHTML = "<p>Connecting Failed, Please Refresh the Page</p>";

                    });

                    var refresh = document.getElementById("refresh");
                    refresh.innerHTML =
                        "<button class='btn btn-secondary' onClick='window.location.reload();'>Refresh Page</button>";

                    playBtn.onclick = playClick;
                }

                //Detect browser
                var Browser = {
                    isSafari: function() {
                        return /^((?!chrome|android).)*safari/i.test(navigator.userAgent);
                    },
                }

                function playClick() {
                    Flashphoner.playFirstVideo(document.getElementById({!! json_encode($i->id_stream) !!}), true, PRELOADER_URL).then(
                        function() {
                            var load = document.getElementById("message");
                            load.innerHTML = "<p>Play First Video, Please Wait ...</p>";
                            playStream();
                        });
                    // if (Browser.isSafari()) {
                    //     Flashphoner.playFirstVideo(document.getElementById({!! json_encode($i->id_stream) !!}), true, PRELOADER_URL).then(
                    //         function() {
                    //             var load = document.getElementById("message");
                    //             load.innerHTML = "<p>Play First Video, Please Wait ...</p>";
                    //             playStream();
                    //         });
                    // } else {
                    //     var load = document.getElementById("message");
                    //     load.innerHTML = "<p>Play Video Again, Please Wait ...</p>";
                    //     playStream();
                    //     // load.remove();
                    // }
                }

                //Playing stream
                function playStream() {
                    session.createStream({
                        name: {!! json_encode($i->rtsp) !!}, //specify the RTSP stream address
                        display: document.getElementById({!! json_encode($i->id_stream) !!}),
                        cacheLocalResources: true
                    }).play();

                    // console.log(session.createStream());
                    // cari cara utk dapat nilai gambar muncul atau tidak muncul
                    let res = document.getElementById("playBtn");
                    res.remove();

                    let run = 10;

                }
            </script>
		@endforeach
    </div>
    <!-- END : FILTER -->
  </div>
</section>
@endsection

