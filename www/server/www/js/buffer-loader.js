var height=0;

function BufferLoader(context, urlList, callback, canvas, trackNo) {
    console.log("BUFFER LOADER CONSTRUCTOR");
    console.log(urlList);

    this.context = context;
    this.urlList = urlList;
    this.onload = callback;
    this.bufferList = new Array();
    this.loadCount = 0;
    this.canvas = canvas;
}

BufferLoader.prototype.loadBuffer = function(url, index) {

    // Load buffer asynchronously
    console.log('file : ' + url + " loading and decoding");

    var request = new XMLHttpRequest();
    request.open("GET", url, true);

    request.responseType = "arraybuffer";

    var loader = this;

    request.onload = function() {

        // Asynchronously decode the audio file data in request.response
        loader.context.decodeAudioData(
                request.response,
                function(buffer) {
                    if (!buffer) {
                        alert('error decoding file data: ' + url);
                        return;
                    }
                    loader.bufferList[index] = buffer;

                    // Get uppercased filename
                    var filename = url.replace(/^.*(\\|\/|\:)/, '')
                    var label = filename.split(".")[0].toUpperCase();
                    var rectColor = ((index%2==0) ? "#221111" : "#332222");

                    // Draw wave
                    var wfd = new WaveformDrawer();
                    wfd.init(buffer, this.canvas, "lime", label, rectColor);
                    wfd.drawWave(index*100,100);


                    console.log("In bufferLoader.onload bufferList size is " + loader.bufferList.length + " index =" + index);
                    if (++loader.loadCount == loader.urlList.length)
                        loader.onload(loader.bufferList);
                },
                function(error) {
                    console.error('decodeAudioData error', error);
                }
        );
    }

    request.onprogress = function(e) {
        //console.log("loaded : " + e.loaded + " total : " + e.total);

    }
    request.onerror = function() {
        alert('BufferLoader: XHR error');
    }

    request.send();
}

BufferLoader.prototype.load = function() {
    this.bufferList = new Array();
    this.loadCount = 0;
    console.log("BufferLoader.prototype.load urlList size = " + this.urlList.length);
    for (var i = 0; i < this.urlList.length; ++i)
        this.loadBuffer(this.urlList[i], i);
}