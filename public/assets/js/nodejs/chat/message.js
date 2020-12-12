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
        user_id: Number,
        user_name: String,
        user_image: String,
        date: String
    }]
});

var Message = mongoose.model('Message', messageScheme);

function add(data) {
    var now = moment();

    Message.findOne({room: data.room}, function(err, result){
        if(err) return console.log(err);
        if (result != null){
            console.log(result)
            var messages = result.messages;
            messages.push({
                message: data.message,
                user_id: data.user_id,
                user_name: data.user_name,
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
                    user_id: data.user_id,
                    user_name: data.user_name,
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

async function getMessages(room){


    let result = await Message.findOne({room: room});
    if (result != null){
        return result.messages;
    }


}

module.exports.add = add;
module.exports.getMessages = getMessages;
