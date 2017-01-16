var Module = {
    preRun: [],
    postRun: [],
    canvas: document.getElementById("canvas"),
    filePackagePrefixURL: "../bw/",
};

var filenames = ["StarDat.mpq", "BrooDat.mpq", "Patch_rt.mpq"];
function index_by_name(name) {
    for (var i = 0; i != filenames.length; ++i) {
        if (filenames[i].toLowerCase() == name.toLowerCase()) return i;
    }
    return -1;
}
var files = [];
function has_all_files() {
    for (var i = 0; i != filenames.length; ++i) {
        if (!files[i]) return false;
    }
    return true;
}

var js_read_buffers = [];

function js_read_data(index, dst, offset, size) {
    var data = js_read_buffers[index];
    for (var i2 = 0; i2 != size; ++i2) {
        Module.HEAP8[dst + i2] = data[offset + i2];
    }
}

function js_file_size(index) {
    return files[index].size;
}

function js_load_done() {
    js_read_buffers = null;
}

function on_read_all_done() {
    var element = document.getElementById("top");
    element.parentNode.removeChild(element);
    Module.print("data loaded, calling main");
    Module.callMain();
}

var is_reading = false;
function read_and_run() {
    if (is_reading) return;
    is_reading = true;
    var reads_in_progress = 3;
    for (var i = 0; i != 3; ++i) {
        var reader = new FileReader();
        (function() {
            var index = i;
            reader.onloadend = function(e) {
                if (!e.target.error && e.target.readyState != FileReader.DONE) throw "read failed with no error!?";
                if (e.target.error) throw "read failed: " + e.target.error;
                js_read_buffers[index] = new Int8Array(e.target.result);
                --reads_in_progress;

                if (reads_in_progress == 0) on_read_all_done();
            };
        })();
        reader.readAsArrayBuffer(files[i]);
    }
    document.getElementById("list").style.visibility = "hidden";
    document.getElementById("files").style.visibility = "hidden";
    document.getElementById("top_text").style.visibility = "hidden";
}

function on_select(e) {
    var input_files = e.target.files;
    var ul = document.getElementById("list");
    var status = "";
    var unrecognized_files = 0;
    for (var i = 0; i != input_files.length; ++i) {
        var index = index_by_name(input_files[i].name);
        if (index != -1) {
            files[index] = input_files[i];
        } else ++unrecognized_files;
        if (!name) {
            ++unrecognized_files;
        }
    }
    if (has_all_files()) {
        status = "Loading, please wait...";
    } else if (unrecognized_files != 0) {
        status = "Unrecognized files selected";
    } else status = "";
    var status_element = document.getElementById("status");
    while (status_element.firstChild) status_element.removeChild(status_element.firstChild);
    if (status != "") status_element.appendChild(document.createTextNode(status));

    while (ul.firstChild) ul.removeChild(ul.firstChild);
    for (var i = 0; i != filenames.length; ++i) {
        if (files[i]) {
            var li = document.createElement("li");
            li.appendChild(document.createTextNode(filenames[i] + " OK"));
            ul.appendChild(li);
        }
    }

    if (has_all_files()) {
        read_and_run();
    }
}

document.getElementById("files").addEventListener("change", on_select, false);