var socket = require('socket.io');
var express = require('express');
var app = express();
var io = socket.listen(app.listen(3010));


io.of("/user").on("connection", function(socket){
  console.log('user connect');

    socket.on('register', function(data){
        console.log(data);        
        socket.broadcast.emit('registerAdmin', data);        
    });
});