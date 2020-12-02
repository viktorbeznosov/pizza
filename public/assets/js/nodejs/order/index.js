var socket = require('socket.io');
var express = require('express');
var app = express();
var io = socket.listen(app.listen(3000));

app.get('/', function(req, res){
    console.log('qwerty');
    res.write('qwerty');
    res.end();
});

io.of("/order").on("connection", function(socket){
  console.log('connect');

    socket.on('foo', function(data){
        console.log(data);
    })

    socket.on('order', function(data){
        console.log(data);
        socket.emit('orderDone', {
            id: 54321,
            date: '01/12/2020'
        });
    });
});
