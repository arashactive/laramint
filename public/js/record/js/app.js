$(document).ready(function () {
    $(document).on("click", "#record:not(.disabled)", function () {
        Fr.voice.record($("#live").is(":checked"), function () {
            $(".recordButton").addClass("disabled");

            $("#live").addClass("disabled");
            $(".one").removeClass("disabled");

            makeWaveform();
        });
    });

    // $(document).on("click", "#save:not(.disabled)", function () {

    //     if ($(this).parent().data("type") === "mp3") {
    //         Fr.voice.exportMP3(function (url) {
    //             $("#audio").attr("src", url);
    //             $('#fileRecorded').files= url;
    //         }, "URL");
    //     } else {
    //         Fr.voice.export(function (url) {
    //             $("#audio").attr("src", url);
    //             $('#fileRecorded').files= url;

    //         }, "URL");
    //     }

    // });
});

function saveButton(id) {
    Fr.voice.export(upload, "blob");
    Fr.voice.stop();
}

function upload(blob) {
    
    $("#audio").attr("src", URL.createObjectURL(blob));

    
    var formData = new FormData($('#question_20')[0]);
    formData.append('answer_20', blob);
    formData.append('_token', $('#csrf_20').val());
    formData.append('workout_id',  $('#workout_id_20').val());
    formData.append('question_id',  $('#question_id_20').val());
   
    $.ajax({
        url: $("#question_20").attr("action"),
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (url) {
            console.log(url)
        }
    });
}

(function (window) {
    window.Fr = window.Fr || {};
    Fr.voice = {
        /**
         * Path to mp3Worker.js
         * Only needed if you're gonna use MP3 conversion
         * You should also include libmp3lame.min.js
         * You can get both files from https://github.com/subins2000/Francium-voice/blob/master/js/
         */
        mp3WorkerPath: mp3WorkerPathPHP,

        stream: false,
        input: false,

        init_called: false,

        /**
         * @type function setTimeout() function will be stored here
         */
        stopRecordingTimeout: false,

        /**
         * Initialize. Set up variables.
         */
        init: function () {
            try {
                // Fix up for prefixing
                window.AudioContext =
                    window.AudioContext || window.webkitAudioContext;
                navigator.getUserMedia =
                    navigator.getUserMedia ||
                    navigator.webkitGetUserMedia ||
                    navigator.mozGetUserMedia ||
                    navigator.msGetUserMedia;
                window.URL = window.URL || window.webkitURL;

                if (navigator.getUserMedia === false) {
                    alert("getUserMedia() is not supported in your browser");
                }
                this.context = new AudioContext();
            } catch (e) {
                alert("Web Audio API is not supported in this browser");
            }
        },

        /**
         * Start recording audio
         */
        record: function (output, finishCallback, recordingCallback) {
            var finishCallback = finishCallback || function () {};
            var recordingCallback = recordingCallback || function () {};

            if (this.init_called === false) {
                this.init();
                this.init_called = true;
            }

            var $that = this;
            navigator.getUserMedia(
                { audio: true },
                function (stream) {
                    /**
                     * Live Output
                     */
                    $that.input = $that.context.createMediaStreamSource(stream);
                    if (output === true) {
                        $that.input.connect($that.context.destination);
                    }

                    $that.recorder = new Recorder($that.input, {
                        mp3WorkerPath: $that.mp3WorkerPath,
                        recordingCallback: recordingCallback,
                    });

                    $that.stream = stream;
                    $that.recorder.record();
                    finishCallback(stream);
                },
                function () {
                    alert("No live audio input");
                }
            );
        },

        /**
         * Pause the recording
         */
        pause: function () {
            this.recorder.stop();
        },

        resume: function () {
            this.recorder.record();
        },

        /**
         * Stop recording audio.
         * This will reset the recorded audio and the
         * recorded audio can't be played or exported after.
         * @return {Fr.voice}
         */
        stop: function () {
            this.recorder.stop();
            this.recorder.clear();
            this.stream.getTracks().forEach(function (track) {
                track.stop();
            });
            return this;
        },

        /**
         * Export the recorded audio as WAV in different formats
         * @param {[type]} [varname] [description]
         */
        export: function (callback, type) {
            this.recorder.exportWAV(function (blob) {
                Fr.voice.callExportCallback(blob, callback, type);
            });
        },

        exportMP3: function (callback, type) {
            this.recorder.exportMP3(function (blob) {
                Fr.voice.callExportCallback(blob, callback, type);
            });
        },

        /**
         * Call the export callback with data it requires
         * @param  {Blob}     blob     Exported blob
         * @param  {string}   type     Type of data to export
         * @param  {Function} callback Export callback
         */
        callExportCallback: function (blob, callback, type) {
            if (typeof type === "undefined" || type == "blob") {
                callback(blob);
            } else if (type === "base64") {
                var reader = new window.FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    base64data = reader.result;
                    callback(base64data);
                };
            } else if (type === "URL") {
                var url = URL.createObjectURL(blob);
                callback(url);
            }
        },

        /**
         * Pause the recording after a specific time
         * @param  integer time Time in milliseconds
         * @return void
         */
        stopRecordingAfter: function (time, callback) {
            var callback = callback || function () {};

            clearTimeout(this.stopRecordingTimeout);
            this.stopRecordingTimeout = setTimeout(function () {
                Fr.voice.pause();
                callback();
            }, time);
        },
    };
})(window);

function restore() {
    $("#record, #live").removeClass("disabled");
    $("#pause").replaceWith(
        '<div class="btn btn-info"><i class="bi bi-play-circle-fill"></i></div>'
    );
    $(".one").addClass("disabled");
    Fr.voice.stop();
}

function makeWaveform() {
    var analyser = Fr.voice.recorder.analyser;

    var bufferLength = analyser.frequencyBinCount;
    var dataArray = new Uint8Array(bufferLength);

    $("#record").hide();
    $("#save").show();

    /**
     * The Waveform canvas
     */
    var WIDTH = 500,
        HEIGHT = 200;

    var canvasCtx = $("#level")[0].getContext("2d");
    canvasCtx.clearRect(0, 0, WIDTH, HEIGHT);

    function draw() {
        var drawVisual = requestAnimationFrame(draw);

        analyser.getByteTimeDomainData(dataArray);

        canvasCtx.fillStyle = "rgb(200, 200, 200)";
        canvasCtx.fillRect(0, 0, WIDTH, HEIGHT);
        canvasCtx.lineWidth = 2;
        canvasCtx.strokeStyle = "rgb(0, 0, 0)";

        canvasCtx.beginPath();

        var sliceWidth = (WIDTH * 1.0) / bufferLength;
        var x = 0;
        for (var i = 0; i < bufferLength; i++) {
            var v = dataArray[i] / 128.0;
            var y = (v * HEIGHT) / 2;

            if (i === 0) {
                canvasCtx.moveTo(x, y);
            } else {
                canvasCtx.lineTo(x, y);
            }

            x += sliceWidth;
        }
        canvasCtx.lineTo(WIDTH, HEIGHT / 2);
        canvasCtx.stroke();
    }
    draw();
}
