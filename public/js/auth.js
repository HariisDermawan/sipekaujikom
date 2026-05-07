function togglePassword() {
    const input = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeSlash = document.getElementById('eyeSlash');

    if (input.type === 'password') {
        input.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeSlash.classList.remove('hidden');
    } else {
        input.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeSlash.classList.add('hidden');
    }
}

function toggleMenu(menuId) {
    const menu = document.getElementById(menuId);
    menu.classList.toggle('hidden');
}

function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
}

function toggleProfile() {
    document.getElementById('profileMenu').classList.toggle('hidden');
}

window.addEventListener('click', function (e) {
    const button = e.target.closest('[onclick="toggleProfile()"]');
    const menu = document.getElementById('profileMenu');

    if (menu && !button && !menu.contains(e.target)) {
        menu.classList.add('hidden');
    }
});
