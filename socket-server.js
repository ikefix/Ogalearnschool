const express = require('express');
const http = require('http');
const { Server } = require('socket.io');

const app = express();
const server = http.createServer(app);

// In-memory chat history storage
const chatHistory = {}; // { roomId: [ { user, message, attachment, photo, timestamp } ] }

const io = new Server(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST"]
    }
});

io.on('connection', (socket) => {
    console.log('👤 New user connected:', socket.id);

    socket.on('join-room', (schoolId) => {
        socket.join(schoolId);
        console.log(`📥 User ${socket.id} joined room: ${schoolId}`);

        // Send chat history
        if (chatHistory[schoolId]) {
            console.log(`📚 Sending chat history to ${socket.id}`);
            socket.emit('chat-history', chatHistory[schoolId]);
        } else {
            chatHistory[schoolId] = [];
            console.log(`🆕 Created new chat room: ${schoolId}`);
        }
    });

    socket.on('chat-message', (data) => {
        const { roomId, user, message, photo, attachment, timestamp } = data;

        console.log(`📨 Message from ${user} in room ${roomId}`);
        console.log("📝 Message content:", message);
        if (attachment) {
            console.log("📎 Attachment present:", {
                name: attachment.name,
                type: attachment.type,
                size: attachment.data ? `${Math.round(attachment.data.length / 1024)} KB` : 'No data'
            });
        }

        // Add timestamp if missing
        const msg = {
            user,
            photo,
            message,
            attachment,
            timestamp: timestamp || new Date().toLocaleString()
        };

        // Save to history
        if (!chatHistory[roomId]) chatHistory[roomId] = [];
        chatHistory[roomId].push(msg);

        if (chatHistory[roomId].length > 100) {
            chatHistory[roomId].shift();
        }

        console.log("📤 Broadcasting message to room:", roomId);
        io.to(roomId).emit('chat-message', msg);
    });

    socket.on('disconnect', () => {
        console.log('👋 User disconnected:', socket.id);
    });
});

server.listen(3000, () => {
    console.log('✅ Socket.IO server running at http://localhost:3000');
});
