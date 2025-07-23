@extends('layouts.student')

@section('studentcontent')
@php
    $user = auth()->user();
    $schoolId = $user->school_id ?? $user->id;
    $userPhoto = $user->profile_photo
        ? asset('storage/' . $user->profile_photo)
        : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=150';
@endphp

<style>
    #chat-box {
        background-color: #f9f9f9;
    }

    #chat-box div{
        display: flex;
        align-items: flex-start;
        /* flex-direction: column; */
        /* margin-bottom: 1rem; */
        /* gap: 1rem; */
        padding: 10px;
        /* background-color: white; */
        border-radius: 10px;
        /* box-shadow: 0 0 5px rgba(0,0,0,0.1); */
    }

    #chat-box div img{
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 10px;
    }

    .mb-2 div{
        display: flex;
        flex-direction: column;
        padding: .6rem;
        /* background-color: white; */
        border-radius: 10px;
        /* box-shadow: 0 0 5px rgba(0,0,0,0.1); */
    }

        .mb-2 div{
        /* gap: 1rem; */
        padding: 10px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0,0,0,0.1);
    }

    
    .text-muted{
        margin-top: .7rem;
    }
</style>


<div class="container py-4">
    <h4>💬 Chat Room - {{ $user->role === 'school' ? $user->name : $user->school->name }}</h4>

    <div id="chat-box" class="border rounded p-3 mb-3" style="height: 400px; overflow-y: auto;"></div>

    <form id="chat-form" enctype="multipart/form-data">
        <input type="text" id="message" class="form-control mb-2" placeholder="Type your message..." autocomplete="off">
        <input type="file" id="attachment" class="form-control mb-2">
        <button type="button" id="record-btn" class="btn btn-secondary mt-2">🎤 Record</button>
        <small id="record-status" class="text-muted ms-2"></small>
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>

    <div class="mb-4">
        <img src="{{ $userPhoto }}" 
            alt="Profile Picture" 
            class="rounded-circle shadow" 
            width="20" height="20"
            style="object-fit: cover;">
    </div>
</div>

<script src="https://cdn.socket.io/4.7.2/socket.io.min.js"></script>

<script>
const socket = io('http://localhost:3000');

const schoolId = @json($schoolId);
const userName = @json($user->name);
const userPhoto = @json($userPhoto);

const chatBox = document.getElementById('chat-box');
const chatForm = document.getElementById('chat-form');
const messageInput = document.getElementById('message');
const fileInput = document.getElementById('attachment');
const statusText = document.getElementById('record-status');
const storageKey = 'chat_' + schoolId;

socket.emit('join-room', schoolId);

// Load stored messages
const storedMessages = JSON.parse(localStorage.getItem(storageKey)) || [];
storedMessages.forEach(msg => appendMessage(msg));

socket.on('chat-history', (history) => {
    chatBox.innerHTML = '';
    history.forEach(msg => appendMessage(msg));
});

socket.on('chat-message', (msg) => {
    appendMessage(msg);
    storedMessages.push(msg);
    if (storedMessages.length > 100) storedMessages.shift();
    localStorage.setItem(storageKey, JSON.stringify(storedMessages));
});

// Submit logic
chatForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    const message = messageInput.value.trim();
    const file = fileInput?.files?.[0];
    let attachmentData = null;

    if (file) {
        attachmentData = {
            name: file.name,
            type: file.type,
            data: await toBase64(file)
        };
    }

    if (!message && !attachmentData) return;

    socket.emit('chat-message', {
        roomId: schoolId,
        user: userName,
        photo: userPhoto,
        message,
        attachment: attachmentData,
        timestamp: new Date().toLocaleString()
    });

    messageInput.value = '';
    fileInput.value = '';
});

// Render chat message
function appendMessage({ user, message, timestamp, photo, attachment }) {
    const fallbackPhoto = "https://ui-avatars.com/api/?name=" + encodeURIComponent(user) + "&size=150";
    const userImage = photo || fallbackPhoto;

    let attachmentHtml = '';
    if (attachment) {
        if (attachment.data && attachment.type.startsWith('image/')) {
            attachmentHtml = `<img src="${attachment.data}" class="img-fluid mt-2" style="max-height: 200px;">`;
        } else if (attachment.data && attachment.type.startsWith('audio/')) {
            attachmentHtml = `<audio controls class="mt-2"><source src="${attachment.data}" type="${attachment.type}">Your browser doesn't support audio.</audio>`;
        } else if (attachment.data) {
            attachmentHtml = `<a href="${attachment.data}" download="${attachment.name}" class="d-block mt-2">${attachment.name}</a>`;
        }
    }

    const div = document.createElement('div');
    div.classList.add('d-flex', 'align-items-start', 'mb-2');
    div.innerHTML = `
        <img src="${userImage}" class="rounded-circle shadow me-2" width="30" height="30" style="object-fit: cover;">
        <div>
            <strong>${user}</strong> ${message || ''}
            ${attachmentHtml}
            <div class="text-muted" style="font-size: 0.8em;">[${timestamp}]</div>
        </div>
    `;
    chatBox.appendChild(div);
    chatBox.scrollTop = chatBox.scrollHeight;
}

// Base64 helper
function toBase64(file) {
    return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = err => reject(err);
    });
}

// Voice recorder logic
let mediaRecorder;
let audioChunks = [];

document.getElementById('record-btn').addEventListener('click', async () => {
    if (!mediaRecorder || mediaRecorder.state === "inactive") {
        const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
        mediaRecorder = new MediaRecorder(stream);

        mediaRecorder.ondataavailable = e => {
            audioChunks.push(e.data);
        };

        mediaRecorder.onstop = () => {
            const blob = new Blob(audioChunks, { type: 'audio/webm' });
            const reader = new FileReader();
            reader.onloadend = () => {
                const base64Audio = reader.result;
                socket.emit('chat-message', {
                    roomId: schoolId,
                    user: userName,
                    photo: userPhoto,
                    message: '',
                    attachment: {
                        name: "voice-note.webm",
                        type: "audio/webm",
                        data: base64Audio
                    },
                    timestamp: new Date().toLocaleString()
                });
                audioChunks = [];
            };
            reader.readAsDataURL(blob);
        };

        mediaRecorder.start();
        statusText.textContent = '🎙️ Recording... click again to stop';
    } else if (mediaRecorder.state === "recording") {
        mediaRecorder.stop();
        statusText.textContent = '✅ Voice note sent!';
    }
});
</script>
@endsection
