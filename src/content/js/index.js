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

let emojis = ['๐', '๐', '๐คจ', '๐ง', '๐ค', '๐', '๐ฏ', '๐ฆ', '๐ง', '๐ฎ', '๐', '๐ก', '๐คฌ', '๐ค ', '๐คฎ', '๐ฅด', '๐คข'];

if (document.querySelector('.throwError') !== null) {
    alert(`Hey, Hacker san ! \n what are you trying to do ? ${emojis[Math.floor(Math.random() * emojis.length)]} ${emojis[Math.floor(Math.random() * emojis.length)]}`);
}