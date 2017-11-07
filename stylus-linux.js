var fs = require('fs'),
path = require('path'),
child_process = require('child_process');


function watchStyles(sourcefile, destinationfolder) {

var Stylus = child_process.spawn('stylus', ['-c','-u','nib','-w', sourcefile, '--out', destinationfolder]);

Stylus.stdout.pipe(process.stdout); // notifications: watching, compiled, generated.
Stylus.stderr.pipe(process.stdout); // warnings: ParseError.

Stylus.on('error', function(err) {
//console.log(`Stylus process(${Stylus.pid}) error: ${err}`);
//console.log(err);
});

// Report unclean exit.
Stylus.on('close', function (code) {
if (code !== 0) {
  //console.log(`Stylus process(${Stylus.pid}) exited with code: ${code}`);
}
});

}


function getDirectories(srcpath) {
return fs.readdirSync(srcpath).filter(function(file) {
return fs.statSync(path.join(srcpath, file)).isDirectory();
});
}

//var directories = getDirectories(__dirname);

var directories = [
'public',
];


function fromDir(directory, startPath, filter){


if (!fs.existsSync(startPath)){
    return;
}

var files = fs.readdirSync(startPath);

for(var i=0;i<files.length;i++){
    var filename = path.join(startPath,files[i]);
    var stat = fs.lstatSync(filename);
    if (stat.isDirectory()){
        fromDir(filename, filename, filter); //recurse
    }
    else if (filename.indexOf(filter)>=0) {
      watchStyles(filename,`${directory.replace('stylus','')}css/`);
    };
};
};


for(let directory of directories)
{
fromDir(`${__dirname}/${directory}/`,`${__dirname}/${directory}/`,'.styl');
}