document.addEventListener('DOMContentLoaded', function () {
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeButton = document.getElementById('closeButton');
    const chatForm = document.getElementById('chatForm');
    const chatInput = document.getElementById('chatInput');

    chatButton.addEventListener('click', function () {
        chatButton.style.display = 'none';
        chatWindow.style.display = 'flex';
    });

    closeButton.addEventListener('click', function () {
        chatWindow.style.display = 'none';
        chatButton.style.display = 'flex';
    });

    chatForm.addEventListener('submit', function (event) {
        event.preventDefault();
        const message = encodeURIComponent(chatInput.value);
        const whatsappUrl = `https://wa.me/2348130898773?text=${message}`;
        window.open(whatsappUrl, '_blank');
    });
});