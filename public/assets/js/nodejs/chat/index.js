var socket = require('socket.io');
var express = require('express');
var app = express();
var io = socket.listen(app.listen(3030));

io.of("/chat").on("connection", function(socket){
  console.log('chat connect');
  
  socket.on("rooms", function(data){
      socket.rooms = data;
      // console.log(socket.rooms);
      socket.rooms.forEach(function(room){
          var event = 'connect_' + room;
          socket.on(event, function(data){
              console.log(data);
              console.log(event);
          });
      });
  });
  
  

});