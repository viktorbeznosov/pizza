const mongoose = require("mongoose");
var moment = require('moment');
mongoose.connect("mongodb://localhost:27017/chat", { useNewUrlParser: true });

// установка схемы
const messageScheme = mongoose.Schema({
    room: {
        type: String,
        required: true
    },
    messages: [{           
        message: String,
        read: Boolean,
        user_id: Number,
        user_name: String,
        user_image: String,
        date: String
    }]
});

var Message = mongoose.model('Message', messageScheme);

function add(data) {
    var now = moment();

    console.log('income')
    console.log(data)

    Message.findOne({room: data.room}, function(err, result){
        if(err) console.log(err);
        if (result != null){
            console.log(result)
            var messages = result.messages;
            messages.push({
                message: data.message,
                read: false, 
                user_id: data.user_id,
                user_name: data.name,
                user_image: data.image,
                date: now.format('DD.MM.YYYY H:mm')
            });

            console.log(result._id);

            Message.updateOne({room: data.room}, {
                room: data.room,
                messages: messages
            }, function (result) {
                console.log('Collection ' + data.room + ' updated');
            });

        } else {
            console.log('collection is empty');

            const msg = new Message({
                room: data.room,
                messages: [{
                    message: data.message,
                    read: false, 
                    user_id: data.user_id,
                    user_name: data.name,
                    user_image: data.image,
                    date: now.format('DD.MM.YYYY H:mm')
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

}

function read(data){
    Message.findOne({room: data.room}, function(err, result){
        if(err) console.log(err);

        if (result != null && result.messages){
            var messages = [];
            if (result.messages.length > 0){
                result.messages.forEach(function(item){
                    var read = (item.user_id != data.user_id) ? true: item.read;
                    messages.push({
                        message: item.message,
                        read: read,
                        user_id: item.user_id,
                        user_name: item.user_name,
                        user_image: item.user_image,
                        date: item.date
                    });
                });
                Message.updateOne({room: data.room}, {
                    room: data.room,
                    messages: messages
                }, function (result) {
                    console.log('Collection ' + data.room + ' messages of user_id ' + data.user_id + ' readed');
                });
            }

        }
    });
}

async function getMessages(room){

    let result = await Message.findOne({room: room});

    if (result != null){
        return result;
    }

}

function getUnreadMessages(room, user_id){

    return new Promise((resolve, reject) => {

        getMessages(room).then(data => {
            if (data != null && data.messages){
                let messages_count = 0;
                data.messages.forEach(function(item){
                    if (item.user_id != user_id && item.read == 0){
                        messages_count++;
                    }
                });
                resolve(messages_count);
            } else {
                resolve(false);
            }
        })

    });

}

module.exports.add = add;
module.exports.read = read;
module.exports.getMessages = getMessages;
module.exports.getUnreadMessages = getUnreadMessages;
