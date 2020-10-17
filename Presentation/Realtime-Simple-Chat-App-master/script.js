const socket = io('http://localhost:3000')
const messageContainer = document.getElementById('message-container')
const messageForm = document.getElementById('send-container')
const messageInput = document.getElementById('message-input')
//me_joining-message
const name = prompt('What is your name?')
appendMessage('You joined')
socket.emit('new-user', name)
//adding message to desktop
socket.on('chat-message', data => {
  appendMessage(`${data.name}: ${data.message}`)
})

//user connected message
socket.on('user-connected', name => {
  appendMessage(`${name} connected`)
})
//user disconnected message
socket.on('user-disconnected', name => {
  appendMessage(`${name} disconnected`)
})
//adding message to senders desktop
messageForm.addEventListener('submit', e => {
  e.preventDefault()
  const message = messageInput.value
  appendMessage(`You: ${message}`)
  socket.emit('send-chat-message', message)
  messageInput.value = ''
})

function appendMessage(message) {
  const messageElement = document.createElement('div')
  messageElement.innerText = message
  messageContainer.append(messageElement)
}