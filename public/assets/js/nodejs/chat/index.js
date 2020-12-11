var socket = require('socket.io');
var express = require('express');
var app = express();
var moment = require('moment');
var io = socket.listen(app.listen(3030));

const mongoose = require("mongoose");
mongoose.connect("mongodb://localhost:27017/chat", { useNewUrlParser: true });

// установка схемы
const messageScheme = mongoose.Schema({
    room: {
        type: String,
        required: true
    },
    messages: [{
        message: String,
        user_id: Number,
        user_name: String,
        date: String
    }]
});

var Message = mongoose.model('Message', messageScheme);
var room = 'Room.1.5';

Message.findOne({room: room}, function(err, data){
    if(err) return console.log(err);
    if (data != null){
        console.log(data)
        var messages = data.messages;
        messages.push({
            message: 'New Message',
            user_id: 1,
            user_name: 'admin',
            date: '11.12.2020 23:1'
        });

        console.log(data._id);

        Message.updateOne({room: room}, {
            room: room,
            messages: messages
        }, function (data) {
            console.log('Collection ' + room + ' updated');
        });

    } else {
        console.log('collection is empty');

        const msg = new Message({
            room: room,
            messages: [{
                message: 'Lorem ipsum dolor sit ammet 2',
                user_id: 3,
                user_name: 'Lance Smith',
                date: '11.12.2020 22:35'
            }]
        });

        msg.save().then((err) => {
            if (err){
                console.log(err);
            }
            console.log('msg saved');
        });

    }

});



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
                console.log(data);
                var now = moment();
                data.date = now.format('DD.MM.YYYY H:mm');
                socket.broadcast.to(room).emit('messageFrom' + room, data); //Всем кроме пользователя пославшего message
          });
      });
  });
  
  

});