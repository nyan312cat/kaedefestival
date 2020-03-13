const http = require('http'),
		fs = require('fs'),
		path = require('path');
process.on('uncaughtException', function(err) { console.log(err); });
process.on('unhandledRejection', function(reason, p){ console.log('Unhandled Rejection at:', p, 'reason:', reason); });
http.createServer(function (request, response) {
	console.log('request : ', request.url);
	let filePath = '.' + (request.url==='/' ? '/index.html' : request.url);
	const extname = String(path.extname(filePath)).toLowerCase(),
				mimeTypes = { '.html': 'text/html', '.js': 'text/javascript', '.css': 'text/css', '.json': 'application/json', '.png': 'image/png', '.jpg': 'image/jpg', '.gif': 'image/gif', '.wav': 'audio/wav', '.mp4': 'video/mp4', '.woff': 'application/font-woff', '.ttf': 'application/font-ttf', '.eot': 'application/vnd.ms-fontobject', '.otf': 'application/font-otf', '.svg': 'application/image/svg+xml' };
	let contentType = mimeTypes[extname] || 'application/octet-stream';
		if(!extname){
		contentType='text/html';
		filePath+='.html';
	}
	fs.readFile(filePath, function(error, content) {
		if (error) {
			console.log(' error  : '+error.code);
			if (error.code === 'ENOENT') {
				fs.readFile('./404.html', function(err, txt){
					response.writeHead(200, {'Content-Type' : 'text/html'});
					response.end(txt, 'utf-8');
				});
				return;
			}else{
				response.writeHead(500);
				response.end('Sorry, check with the site admin for error: '+error.code+' ..\n');
			}
		}
		response.writeHead(200, { 'Content-Type' : contentType });
		response.end(content, 'utf-8');
	});
}).listen(3000);
console.log('Server running at http://127.0.0.1:3000/');


