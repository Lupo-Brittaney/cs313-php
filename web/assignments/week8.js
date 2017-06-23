var http = require('http');
var url = require('url');
var cp = require('child_process');
var fs = require('fs');
var me = {"name": "Brittaney Lupo", "class" : "CS313"};

function onRequest(req, res) {
    var pathname = url.parse(req.url, true);
    if (req.url =='/home'){
        res.writeHead(200, {'Content-Type' : 'text/html'});
        res.write('<h1>Welcome to the Home Page</h1>');
        res.end();
        
    }
    if (req.url== '/getData'){
        response.writeHead(200, {'Content-Type' : 'application/json'});
        fs.appendfile('jsonfile.txt', JSON.stringify(me), function(err){
            if (err) return console.log(err);
            console.log(JSON.stringify(me));
            res.end();            
        });
    }
    else{
        res.writeHead(404, {'Content-Type' : 'text/html'});
        res.write('Page not found');
        res.end();
    }
    
}


//create a server object and listen to port 8888
http.createServer(onRequest).listen(8888); 