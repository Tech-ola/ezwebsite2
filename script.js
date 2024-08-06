document.addEventListener('DOMContentLoaded', function () {
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeButton = document.getElementById('closeButton');

    chatButton.addEventListener('click', function () {
        chatButton.style.display = 'none';
        chatWindow.style.display = 'flex';
    });

    closeButton.addEventListener('click', function () {
        chatWindow.style.display = 'none';
        chatButton.style.display = 'flex';
    });
});
