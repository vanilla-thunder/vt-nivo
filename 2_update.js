var r = require('request'),
    c = require('cheerio'),
    fs = require('fs'),
    replace = require('replace'),
    runner = require('child_process'),
    AdmZip = require('adm-zip');

var error = function (err) {
    console.error("          ############################################################");
    console.error("          # " + err);
    console.error("          ############################################################");
    process.exit();
};

var shell = function (command) {
    runner.exec(command,
        function (err, stdout, stderr) {
            //if (err) console.log(err);
            //if (stderr) console.log(stderr);
        }
    );
};

console.log("");
console.log("      downloading nivo slider");

r('https://github.com/gilbitron/Nivo-Slider/archive/master.zip').pipe(
    fs.createWriteStream('tmp_nivo.zip')
        .on('close', function () {
            //console.log("tinymce download finished");
            console.log("      extracting nivo slider");
            var zip = new AdmZip('tmp_nivo.zip');
            zip.extractAllTo("./");
            fs.unlink('tmp_nivo.zip');
            fs.renameSync('Nivo-Slider-master','nivo-slider');
            
    })
);

process.on('exit', function (code) {
    console.log("");
    console.log("      update complete!");
    console.log("");
});