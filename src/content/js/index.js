if (document.querySelector('.menuLogo') !== null) {
    document.querySelector('.menuLogo').addEventListener('click', () => {
        menu = document.querySelector('#navbar');

        if (menu.style.display == 'block') {
            menu.style.display = 'none';
        } else {
            menu.style.display = 'block';
        }
    });
}

let emojis = ['🙂', '🙃', '🤨', '🧐', '🤓', '🙄', '😯', '😦', '😧', '😮', '😐', '😡', '🤬', '🤠', '🤮', '🥴', '🤢'];

if (document.querySelector('.throwError') !== null) {
    alert(`Hey, Hacker san ! \n what are you trying to do ? ${emojis[Math.floor(Math.random() * emojis.length)]} ${emojis[Math.floor(Math.random() * emojis.length)]}`);
}