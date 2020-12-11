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
          var event_connect = 'connectTo' + room;
          socket.on(event_connect, function(data){
              socket.join(room, function(){
                console.log(data.user + ' connected to ' + room);
                console.log(event_connect);
              });
          });
          
          var event_message = 'messageTo' + room
          socket.on(event_message, function(data){
                console.log(data)
          });
      });
  });
  
  

});