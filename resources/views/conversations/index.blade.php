<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Conversas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex h-[calc(100vh-12rem)]">
                        <!-- Sidebar -->
                        <div class="w-1/3 border-r border-gray-300">
                            <!-- Header -->
                            <div class="p-4 border-b border-gray-300">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="Profile" class="w-10 h-10 rounded-full">
                                        <span class="ml-3 font-semibold">{{ Auth::user()->name }}</span>
                                    </div>
                                    <div class="flex space-x-4">
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Search -->
                            <div class="p-4 border-b border-gray-300">
                                <div class="relative">
                                    <input type="text" placeholder="Pesquisar ou começar uma nova conversa" class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-full focus:outline-none focus:border-blue-500">
                                    <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Conversations List -->
                            <div class="overflow-y-auto h-[calc(100vh-20rem)]">
                                <!-- Example Conversations -->
                                <div class="p-4 border-b border-gray-200 cursor-pointer conversation-item hover:bg-gray-100" data-conversation-id="1">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <img src="https://ui-avatars.com/api/?name=John+Doe" alt="John Doe" class="w-12 h-12 rounded-full">
                                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 border-2 border-white rounded-full"></span>
                                        </div>
                                        <div class="flex-1 ml-4">
                                            <div class="flex justify-between">
                                                <h3 class="font-semibold">John Doe</h3>
                                                <span class="text-xs text-gray-500">10:30</span>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm text-gray-600 truncate">Olá, como você está?</p>
                                                <span class="px-2 py-1 text-xs text-white bg-blue-500 rounded-full">2</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-4 border-b border-gray-200 cursor-pointer conversation-item hover:bg-gray-100" data-conversation-id="2">
                                    <div class="flex items-center">
                                        <div class="relative">
                                            <img src="https://ui-avatars.com/api/?name=Jane+Smith" alt="Jane Smith" class="w-12 h-12 rounded-full">
                                            <span class="absolute bottom-0 right-0 w-3 h-3 bg-gray-400 border-2 border-white rounded-full"></span>
                                        </div>
                                        <div class="flex-1 ml-4">
                                            <div class="flex justify-between">
                                                <h3 class="font-semibold">Jane Smith</h3>
                                                <span class="text-xs text-gray-500">Ontem</span>
                                            </div>
                                            <div class="flex items-center justify-between">
                                                <p class="text-sm text-gray-600 truncate">Ok, entendi!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chat Area -->
                        <div class="flex flex-col flex-1">
                            <!-- Chat Header -->
                            <div class="p-4 border-b border-gray-300 chat-header">
                                <div class="flex items-center">
                                    <img src="https://ui-avatars.com/api/?name=John+Doe" alt="John Doe" class="w-10 h-10 rounded-full">
                                    <div class="ml-3">
                                        <h2 class="font-semibold">John Doe</h2>
                                        <p class="text-sm text-gray-500">Online</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Messages -->
                            <div class="flex-1 p-4 space-y-4 overflow-y-auto" id="messages-container">
                                <!-- Example Messages -->
                                <div class="flex justify-start">
                                    <div class="bg-gray-100 rounded-lg p-3 max-w-[70%]">
                                        <p class="text-sm">Olá, como você está?</p>
                                        <span class="text-xs text-gray-500">10:30</span>
                                    </div>
                                </div>
                                <div class="flex justify-end">
                                    <div class="bg-blue-500 text-white rounded-lg p-3 max-w-[70%]">
                                        <p class="text-sm">Oi! Tudo bem, e você?</p>
                                        <span class="text-xs opacity-75">10:31</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Message Input -->
                            <div class="p-4 border-t border-gray-300">
                                <div class="flex items-center space-x-4">
                                    <button class="text-gray-500 hover:text-gray-700">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </button>
                                    <input type="text" placeholder="Digite uma mensagem" class="flex-1 px-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:border-blue-500">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Elements
        const conversationItems = document.querySelectorAll('.conversation-item');
        const messagesContainer = document.getElementById('messages-container');
        const messageInput = document.querySelector('input[type="text"]');
        const sendButton = document.querySelector('button:last-child');
        const chatHeader = document.querySelector('.chat-header');
        const searchInput = document.querySelector('input[placeholder*="Pesquisar"]');

        // State
        let currentConversationId = null;
        let currentConversationUser = null;

        // Example data (substitua isso pelo seu backend)
        const conversations = {
            1: {
                user: {
                    name: 'John Doe',
                    avatar: 'https://ui-avatars.com/api/?name=John+Doe',
                    status: 'Online'
                },
                messages: [
                    { id: 1, text: 'Olá, como você está?', time: '10:30', sender: 'them' },
                    { id: 2, text: 'Oi! Tudo bem, e você?', time: '10:31', sender: 'me' }
                ]
            },
            2: {
                user: {
                    name: 'Jane Smith',
                    avatar: 'https://ui-avatars.com/api/?name=Jane+Smith',
                    status: 'Offline'
                },
                messages: [
                    { id: 3, text: 'Oi! Tudo bem?', time: '09:15', sender: 'them' },
                    { id: 4, text: 'Sim, tudo ótimo!', time: '09:16', sender: 'me' },
                    { id: 5, text: 'Ok, entendi!', time: '09:17', sender: 'them' }
                ]
            }
        };

        // Functions
        function loadConversation(conversationId) {
            // Aqui você fará a chamada para seu backend
            // const response = await fetch(`/api/conversations/${conversationId}`);
            // const conversation = await response.json();

            // Por enquanto, usamos os dados de exemplo
            const conversation = conversations[conversationId];
            if (!conversation) return;

            currentConversationId = conversationId;
            currentConversationUser = conversation.user;

            // Update chat header
            updateChatHeader(conversation.user);

            // Clear and load messages
            messagesContainer.innerHTML = '';
            conversation.messages.forEach(message => {
                appendMessage(message);
            });

            // Scroll to bottom
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Remove unread badge
            const conversationItem = document.querySelector(`[data-conversation-id="${conversationId}"]`);
            const unreadBadge = conversationItem.querySelector('.bg-blue-500');
            if (unreadBadge) {
                unreadBadge.remove();
            }
        }

        function updateChatHeader(user) {
            chatHeader.innerHTML = `
                <div class="flex items-center">
                    <img src="${user.avatar}" alt="${user.name}" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <h2 class="font-semibold">${user.name}</h2>
                        <p class="text-sm text-gray-500">${user.status}</p>
                    </div>
                </div>
            `;
        }

        function appendMessage(message) {
            const messageElement = document.createElement('div');
            messageElement.className = `flex ${message.sender === 'me' ? 'justify-end' : 'justify-start'}`;

            messageElement.innerHTML = `
                <div class="${message.sender === 'me' ? 'bg-blue-500 text-white' : 'bg-gray-100'} rounded-lg p-3 max-w-[70%]">
                    <p class="text-sm">${message.text}</p>
                    <span class="text-xs ${message.sender === 'me' ? 'opacity-75' : 'text-gray-500'}">${message.time}</span>
                </div>
            `;

            messagesContainer.appendChild(messageElement);
        }

        function sendMessage(text) {
            if (!currentConversationId || !text.trim()) return;

            // Aqui você fará a chamada para seu backend
            // const response = await fetch('/api/messages', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: JSON.stringify({
            //         conversation_id: currentConversationId,
            //         message: text
            //     })
            // });
            // const message = await response.json();

            // Por enquanto, criamos uma mensagem de exemplo
            const message = {
                id: Date.now(),
                text: text,
                time: new Date().toLocaleTimeString('pt-BR', { hour: '2-digit', minute: '2-digit' }),
                sender: 'me'
            };

            // Adiciona a mensagem à conversa atual
            conversations[currentConversationId].messages.push(message);
            appendMessage(message);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Limpa o input
            messageInput.value = '';
        }

        // Event Listeners
        conversationItems.forEach(item => {
            item.addEventListener('click', function() {
                const conversationId = this.dataset.conversationId;
                // Remove active class from all conversations
                conversationItems.forEach(i => i.classList.remove('bg-gray-100'));
                // Add active class to clicked conversation
                this.classList.add('bg-gray-100');
                // Load conversation
                loadConversation(conversationId);
            });
        });

        // Send message on button click
        sendButton.addEventListener('click', () => {
            sendMessage(messageInput.value);
        });

        // Send message on Enter key
        messageInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage(messageInput.value);
            }
        });

        // Search conversations
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            conversationItems.forEach(item => {
                const userName = item.querySelector('h3').textContent.toLowerCase();
                const lastMessage = item.querySelector('p').textContent.toLowerCase();

                if (userName.includes(searchTerm) || lastMessage.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Load first conversation by default
        if (conversationItems.length > 0) {
            conversationItems[0].click();
        }
    });
    </script>
    @endpush
</x-app-layout>