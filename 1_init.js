var runner = require('child_process');

runner.exec("git clone --depth 1 git@github.com:vanilla-thunder/vt-nivo.git _master --depth 1",
    function (err, stdout, stderr) {
        if(err) console.log(err);
        else if(stderr) console.log(stderr);
        else console.log("master ok");
    }
);
runner.exec("git clone -b module git@github.com:vanilla-thunder/vt-nivo.git _module --depth 1",
    function (err, stdout, stderr) {
        if(err) console.log(err);
        else if(stderr) console.log(stderr);
        else console.log("module ok");
    }
);

process.on('exit', function (code) {
    console.log('initializing finished');
});