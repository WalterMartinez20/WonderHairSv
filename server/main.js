const { stringify } = require('querystring');

const express = require('express'),
    app = express(),
    http = require('http').Server(app),
    io = require('socket.io')(http, {
        allowEIO3: true,
        cors: {
            origin: ['http://localhost', 'http://127.0.0.1', 'http://wonderhairsv.test'],
            credentials: true
        },
    });

const { MongoClient } = require('mongodb'),
    url = 'mongodb://127.0.0.1:27017',
    client = new MongoClient(url),
    dbName  = 'wonderhair';

async function con(colection) {
    await client.connect();
    console.log('Conectado a la base de datos');

    const db = client.db(dbName);
    const collection = db.collection(colection);

    return collection;
} 

io.on('connection', (socket) => {
    console.log('Un cliente se ha conectado');

    socket.on('disconnect', () => {
        console.log('El cliente se ha desconectado');
    });

    socket.on('message', async (data) => {
        try {
            const collection = await con('chat');

            let insertData = {
                msg: data.msg,
                from: data.from,
                to: data.to,
                date: data.date,
                type: data.type
            };
            
            if (data.type !== 'text') {
                insertData.name = data.name;
                insertData.format = data.format;
                insertData.link = data.link;
            }
            
            const insertResult = await collection.insertOne(insertData);
            data.id = insertResult.insertedId;
            console.log('Mensaje guardado');
            io.emit('messageToClient', data);
        } catch (error) {
            console.error('Mensaje no guardado:', error);
        }
    });

    socket.on('getMessages', async () => {
        const collection = await con('chat');
        const messages = await collection.find().toArray();
        socket.emit('allMessages', messages);
    });
});

app.use(express.json());
http.listen(3000, () => {
  console.log('Servidor escuchando en el puerto 3000');
});
