var socket = require('socket.io');
var express = require('express');
var app = express();
var io = socket.listen(app.listen(3030));

io.of("/chat").on("connection", function(socket){
  console.log('chat connect');
  
  socket.on("rooms", function(data){
      socket.rooms = data;
      socket.rooms.forEach(function(item){
          socket.on('connect_' + item, function(data){
              console.log(data)
          });
      });
  });
  
  

});