
let nav = document.querySelector('.mikio-sub-navbar ul');

function attachToNav(nav) {
  if (!nav) {
    console.log('Could not find nav');
    return;
  }

  let style = document.createElement('style');
  style.textContent = 
    '.search-link { cursor:pointer;display:inline-flex;align-items:center;padding:0 8px;height:100%;line-height:inherit; }' +
    '.search-link svg { stroke:currentColor;opacity:0.5;transition:opacity 0.2s;vertical-align:middle;display:block; }' +
    '.search-link:hover svg { opacity:0.9; }' +
    '.search-bar { display:none;width:100%;background:rgba(0,0,0,0.15);padding:8px 16px;box-sizing:border-box; }' +
    '.search-bar.open { display:flex;justify-content:center; }' +
    '.search-bar input { padding:8px 14px;border:none;border-radius:20px;font-size:14px;width:100%;max-width:500px;outline:none;background:#fff;color:#333; }';
  document.head.appendChild(style);

  let searchLink = document.createElement('li');
  searchLink.className = 'search-link';
  let navLink = nav.querySelector('li');
  if (navLink) {
    let cs = window.getComputedStyle(navLink);
    searchLink.style.paddingTop = cs.paddingTop;
    searchLink.style.paddingBottom = cs.paddingBottom;
  }
  searchLink.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>';
  nav.appendChild(searchLink);

  let bar = document.createElement('div');
  bar.className = 'search-bar';
  bar.innerHTML = 
    '<form action="/doku.php" style="width:100%;max-width:500px;display:flex;">' +
    '<input type="hidden" name="do" value="search">' +
    '<input type="text" name="id" placeholder="Search the wiki…">' +
    '</form>';
  nav.closest('.mikio-sub-navbar').appendChild(bar);

  searchLink.addEventListener('click', function(e) {
    e.stopPropagation();
    bar.classList.toggle('open');
    if (bar.classList.contains('open')) {
      bar.querySelector('input[type="text"]').focus();
    }
  });

  document.addEventListener('click', function() {
    bar.classList.remove('open');
  });

  bar.addEventListener('click', function(e) { e.stopPropagation(); });
}

attachToNav(nav);