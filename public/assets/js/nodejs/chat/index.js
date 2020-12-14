var socket = require('socket.io');
var express = require('express');
var app = express();
var moment = require('moment');
var io = socket.listen(app.listen(3030));
var message = require('./message')

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
                
                var event_get_unreaded_messages = 'unreadMessages' + room;
                message.getUnreadMessages(room).then(data => {
                    if (data != null){
                        console.log('Room - ' + room + ' unread')
                        console.log(data);
                    } else {
                        console.log('Room - ' + room + ' unread')
                        console.log(data);
                    }
                });
                socket.emit(event_get_unreaded_messages, '3');
              });
          });

          var event_get_messages = 'getMessagesFrom' + room;
          socket.on(event_get_messages, function (room) {
              console.log('result messages');
              message.getMessages(room).then(data => {
                  if (data != null){
                      console.log(room);
                      console.log(data.messages);
                      socket.emit('returnMessagesFrom' + room, data.messages);
                  } else {
                      console.log(room);
                      console.log([]);
                      socket.emit('returnMessagesFrom' + room, []);
                  }

              });
          });
          
          var event_message = 'messageTo' + room
          socket.on(event_message, function(data){
                console.log(data);
                var now = moment();
                data.date = now.format('DD.MM.YYYY H:mm');
                message.add(data);
                socket.broadcast.to(room).emit('messageFrom' + room, data); //Всем кроме пользователя пославшего message
          });        
      });
  });
  
  

});