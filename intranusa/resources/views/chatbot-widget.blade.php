<!-- 📦 Tailwind CDN -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<!-- 🔘 Tombol Buka Chatbot -->
<button id="open-chatbot" class="fixed bottom-5 right-5 z-50 bg-green-600 text-white p-3 rounded-full shadow-lg hover:bg-green-700 transition cursor-pointer">
  💬 IntranusaBot
</button>

<!-- 🪟 Modal Chatbot -->
<div id="chatbot-modal" class="fixed inset-0 z-50 hidden">
<div id="chatbot-panel" class="absolute bottom-20 right-5 md:bottom-5 md:right-5 md:rounded-lg md:shadow-xl md:max-w-sm w-full max-w-full md:w-[350px] bg-white flex flex-col overflow-hidden transform scale-0 opacity-0 transition duration-300">
    <div class="bg-white relative flex flex-col">

      <!-- 🟢 Header -->
      <div class="bg-green-600 px-4 py-2 flex items-center justify-between text-white">
        <div class="flex items-center space-x-3">
        <img src="{{ secure_asset('dist/img/logo-intranusa.jpg') }}" class="w-8 h-8 rounded-full border border-white" alt="Avatar">
          <div>
            <p class="font-semibold text-sm leading-none">Intranusa</p>
            <p class="text-xs">Online</p>
          </div>
        </div>
      </div>

      <!-- 💬 Chat Area -->
      <div id="chat-box" class="bg-cover overflow-y-auto px-4 py-2 space-y-2 text-sm text-gray-800 scroll-smooth"
        style="background-image: url('{{ secure_asset('dist/img/bg-chat.jpg') }}'); height: 350px;">
      </div>

      <!-- 👋 Start Chat Prompt -->
      <div id="start-chat-container" class="p-4 text-center"
        style="background-image: url('{{ secure_asset('dist/img/bg-chat.jpg') }}')">
        <button id="start-chat-btn" class="bg-green-500 text-white px-4 py-2 rounded-full shadow hover:bg-green-600 transition">Start Chat</button>
      </div>

      <!-- ❌ Close -->
      <button id="close-chatbot" class="absolute top-2 right-2 text-white text-lg hover:text-red-300 cursor-pointer">✖</button>

      <!-- 💬 Input -->
      <form id="chat-form" class="hidden flex border-t border-gray-300 bg-white px-3 py-2 gap-2">
        <input type="text" id="user-input" placeholder="Message Intranusa" required
          class="flex-grow focus:outline-none text-sm px-3 py-2 border border-gray-300 rounded-full">
        <button type="submit" class="text-green-600 text-xl">➤</button>
      </form>
    </div>
  </div>
</div>

<!-- Styles -->
<!-- Styles -->
<style>
  #chat-box {
    scroll-behavior: smooth;
  }

  .bot-bubble {
    background-color: #f0f0f0;
    color: #111827;
    border-radius: 1rem;
    padding: 0.5rem 0.75rem;
    max-width: 80%;
  }

  .user-bubble {
    background-color: #3b82f6;
    color: white;
    border-radius: 1rem;
    padding: 0.5rem 0.75rem;
    max-width: 80%;
    margin-left: auto;
  }

  @media (max-width: 768px) {
    #chatbot-panel {
      bottom: 10px;
      right: 10px;
      width: 90%;
      max-width: none;
      border-radius: 10px;
    }

    #chat-box {
      height: 300px;
    }

    .bot-bubble, .user-bubble {
      max-width: 70%;
    }

    #user-input {
      padding: 0.5rem;
      font-size: 0.875rem;
    }

    button {
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
    }
  }

  #chatbot-modal {
    z-index: 9999; /* Z-index paling atas */
  }

  #chatbot-panel {
    z-index: 9999; /* Z-index paling atas */
  }
</style>

<!-- Script -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('chatbot-modal');
    const chatbotPanel = document.getElementById('chatbot-panel');
    const openBtn = document.getElementById('open-chatbot');
    const closeBtn = document.getElementById('close-chatbot');
    const startChatContainer = document.getElementById('start-chat-container');
    const startChatBtn = document.getElementById('start-chat-btn');
    const chatForm = document.getElementById('chat-form');
    const userInput = document.getElementById('user-input');
    const chatBox = document.getElementById('chat-box');

    const CHAT_STORAGE_KEY = 'intranusa_chat_history';
    const EXPIRATION_TIME = 2 * 60 * 60 * 1000;
    const FEEDBACK_LINK = "{{ route('feedback.create') }}";
    let warningTimer, inactivityTimer;


    const resetTimers = () => {
  clearTimeout(warningTimer);
  clearTimeout(inactivityTimer);

  // Timer untuk peringatan setelah 3 menit
  warningTimer = setTimeout(() => {
    appendMessage(
      "Kami perhatikan Anda belum mengirim pesan. Jika tidak ada aktivitas dalam 5 menit, obrolan akan diakhiri.",
      'bot',
      false
    );
  }, 10 * 60 * 1000); // 10 menit

  // Timer untuk mengakhiri obrolan setelah 4 menit
  inactivityTimer = setTimeout(() => {
    appendMessage(
      `Obrolan telah diakhiri. Jika Anda memiliki masukan, silakan isi <a href="${FEEDBACK_LINK}" class="text-blue-500 underline">formulir feedback</a>.`,
      'bot',
      false
    );
    chatForm.classList.add('hidden'); // Sembunyikan form input
    startChatContainer.classList.remove('hidden');
  }, 15 * 60 * 1000); // 15 menit
};// 2 jam dalam ms

    const scrollToBottom = () => {
      chatBox.scrollTop = chatBox.scrollHeight;
    };

    const showTypingIndicator = () => {
      const typing = document.createElement('div');
      typing.id = 'typing-indicator';
      typing.className = 'flex items-center space-x-2 px-4 py-1 mt-2';
      typing.innerHTML = `
        <div class="bot-bubble flex items-center space-x-1">
          <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></span>
          <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-150"></span>
          <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce delay-300"></span>
        </div>
      `;
      chatBox.appendChild(typing);
      scrollToBottom();
    };

    const hideTypingIndicator = () => {
      const existing = document.getElementById('typing-indicator');
      if (existing) chatBox.removeChild(existing);
    };

    const appendMessage = (content, sender = 'user', save = true) => {
      const div = document.createElement('div');
      const bubbleClass = sender === 'user' ? 'user-bubble' : 'bot-bubble';
      div.className = "flex " + (sender === 'bot' ? '' : 'justify-end');
      div.innerHTML = `<div class="${bubbleClass}">${content}</div>`;
      chatBox.appendChild(div);
      scrollToBottom();

      if (save) saveMessage({ content, sender, timestamp: Date.now() });
    };

    const appendMenuMessage = () => {
      const menuHTML = `
        <div class="bot-bubble">
          <p class="mb-2">Selamat datang di ChatBot Official Intranusa. Anda terhubung dengan CS Intranusa yang siap membantu Anda. Pilih menu di bawah.</p>
          <div class="flex flex-wrap gap-2 text-sm mt-2">
            <button onclick="handleOptionClick(this, 'Gangguan')" class="bg-green-100 hover:bg-green-200 px-3 py-1 rounded-full">Gangguan</button>
            <button onclick="handleOptionClick(this, 'Pembayaran')" class="bg-green-100 hover:bg-green-200 px-3 py-1 rounded-full">Pembayaran</button>
            <button onclick="handleOptionClick(this, 'Pendaftaran')" class="bg-green-100 hover:bg-green-200 px-3 py-1 rounded-full">Pendaftaran</button>
          </div>
        </div>
      `;
      const wrapper = document.createElement('div');
      wrapper.className = "flex";
      wrapper.innerHTML = menuHTML;
      chatBox.appendChild(wrapper);
      scrollToBottom();
    };

    const saveMessage = (msg) => {
      let history = JSON.parse(localStorage.getItem(CHAT_STORAGE_KEY)) || { messages: [], lastSaved: Date.now() };
      history.messages.push(msg);
      history.lastSaved = Date.now();
      localStorage.setItem(CHAT_STORAGE_KEY, JSON.stringify(history));
    };

    const loadChatHistory = () => {
      const history = JSON.parse(localStorage.getItem(CHAT_STORAGE_KEY));
      if (history && Date.now() - history.lastSaved <= EXPIRATION_TIME) {
        history.messages.forEach(msg => appendMessage(msg.content, msg.sender, false));
      } else {
        localStorage.removeItem(CHAT_STORAGE_KEY);
      }
    };

    window.handleOptionClick = (el, text) => {
      sendMessage(text);
      resetTimers();
    };

    const sendMessage = async (message) => {
      appendMessage(message, 'user');
      showTypingIndicator();
      userInput.value = '';

      try {
        const res = await fetch("{{ route('chatbot.respond') }}", {
          method: "POST",
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          body: JSON.stringify({ message })
        });

        const data = await res.json();
        setTimeout(() => {
          hideTypingIndicator();
          appendMessage(data.reply, 'bot');
        }, 800);
        resetTimers();
      } catch (error) {
        hideTypingIndicator();
        console.error("Error:", error);
        appendMessage("Ups, terjadi kesalahan. Coba lagi ya.", 'bot');
      }
    };

    openBtn.addEventListener('click', () => {
      modal.classList.remove('hidden');
      chatbotPanel.classList.remove('scale-0', 'opacity-0');
      chatbotPanel.classList.add('scale-100', 'opacity-100');
      startChatContainer.classList.remove('hidden');
      chatForm.classList.add('hidden');
    });

    closeBtn.addEventListener('click', () => {
      chatbotPanel.classList.remove('scale-100', 'opacity-100');
      chatbotPanel.classList.add('scale-0', 'opacity-0');
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    });

    startChatBtn.addEventListener('click', () => {
      startChatContainer.classList.add('hidden');
      chatForm.classList.remove('hidden');
      appendMenuMessage();
    });

    chatForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const message = userInput.value.trim();
      if (message) sendMessage(message);
    });

    // ⏳ Load jika tersedia
    loadChatHistory();
  });
</script>

