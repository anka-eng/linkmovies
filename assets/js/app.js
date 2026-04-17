/* ══════════════════════════════
   UTILS
══════════════════════════════ */
const $ = (selector) => document.querySelector(selector);
const $$ = (selector) => document.querySelectorAll(selector);

const HEART_SVG = `<svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>`;

const mfEsc = (s) => (s || '').replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;').replace(/'/g, '&#39;');

/* ══════════════════════════════
   SAVE / BOOKMARK SYSTEM
══════════════════════════════ */
function mfGetSaved() {
  try { return JSON.parse(localStorage.getItem('mf_saved') || '[]'); }
  catch (e) { return []; }
}

function mfSetSaved(arr) {
  localStorage.setItem('mf_saved', JSON.stringify(arr));
}

function mfIsSaved(id) {
  return mfGetSaved().some(m => String(m.id) === String(id));
}

function mfToggleSave(e, id) {
  if (e) {
    e.preventDefault();
    e.stopPropagation();
  }
  
  const movie = moviesData.find(m => String(m.id) === String(id));
  if (!movie) return;

  let saved = mfGetSaved();
  const idx = saved.findIndex(m => String(m.id) === String(id));

  if (idx > -1) {
    saved.splice(idx, 1);
    mfShowToast('Removed from Liked ❌');
  } else {
    saved.unshift(movie);
    mfShowToast('Liked! ❤️');
  }

  mfSetSaved(saved);
  mfUpdateAllSaveBtns();
  
  // If we are on the saved view, re-render it
  if ($('#mf-saved-view').classList.contains('active')) {
    mfRenderSaved();
  }
}

function mfUpdateAllSaveBtns() {
  $$('.mf-save-btn[data-id]').forEach(btn => {
    const id = btn.getAttribute('data-id');
    if (mfIsSaved(id)) {
      btn.classList.add('saved');
    } else {
      btn.classList.remove('saved');
    }
  });

  const navHeart = $('#mf-heart-nav');
  if (navHeart) {
    const count = mfGetSaved().length;
    navHeart.style.fill = count > 0 ? '#ff4b4b' : 'none';
    navHeart.style.stroke = count > 0 ? '#ff4b4b' : 'currentColor';
  }
}

function mfShowToast(msg) {
  let t = $('#mfToast');
  if (!t) {
    t = document.createElement('div');
    t.id = 'mfToast';
    document.body.appendChild(t);
  }
  t.textContent = msg;
  t.classList.add('show');
  clearTimeout(t._timer);
  t._timer = setTimeout(() => { t.classList.remove('show'); }, 2000);
}

/* ══════════════════════════════
   RENDERING
══════════════════════════════ */
function mfMakeCard(m, type = 'grid') {
  const isSaved = mfIsSaved(m.id);
  const cardClass = type === 'grid' ? 'mf-grid-card' : 'mf-movie-card';
  const posterClass = type === 'grid' ? 'mf-grid-poster' : 'mf-card-poster';
  const titleClass = type === 'grid' ? 'mf-grid-title' : 'mf-card-title';
  const yearClass = type === 'grid' ? 'mf-grid-year' : 'mf-card-year';

  return `
    <a class="${cardClass}" href="${m.link}">
      <div class="${posterClass}">
        <img src="${m.thumb}" alt="${mfEsc(m.title)}" loading="lazy">
        ${type === 'scroll' ? `
          <div class="mf-card-badge">New</div>
          <div class="mf-card-badge hd">HD</div>
          <div class="mf-card-overlay"><div class="mf-play-btn">▶</div></div>
        ` : ''}
        <button class="mf-save-btn ${isSaved ? 'saved' : ''}" data-id="${m.id}" onclick="mfToggleSave(event, '${m.id}')">
          ${HEART_SVG}
        </button>
      </div>
      ${type === 'scroll' ? `
        <div class="mf-card-info">
          <div class="${titleClass}">${mfEsc(m.title)}</div>
          <div class="${yearClass}">${m.year}</div>
        </div>
      ` : `
        <div class="${titleClass}">${mfEsc(m.title)}</div>
        <div class="${yearClass}">${m.year}</div>
      `}
    </a>
  `;
}

function mfRenderHome() {
  const latestGrid = $('#mfLatestCards');
  const allGrid = $('#mfAllGrid');
  const latestSection = latestGrid ? latestGrid.closest('.mf-section') : null;

  if (latestGrid) {
    const latestMovies = moviesData.filter(m => m.latest);
    if (latestMovies.length > 0) {
      latestGrid.innerHTML = latestMovies.map(m => mfMakeCard(m, 'scroll')).join('');
      if (latestSection) latestSection.classList.remove('hidden');
    } else {
      if (latestSection) latestSection.classList.add('hidden');
    }
  }

  if (allGrid) {
    if (moviesData.length > 0) {
      allGrid.innerHTML = moviesData.map(m => mfMakeCard(m, 'grid')).join('');
      const countEl = $('#mfTotalCount');
      if (countEl) countEl.textContent = moviesData.length + ' Movies';
    } else {
      allGrid.innerHTML = `
        <div class="mf-empty-wrap">
          <div class="mf-empty-state">
            <div class="mf-empty-icon">🎬</div>
            <div class="mf-empty-title">No Movies Available</div>
            <div class="mf-empty-sub">Add movies to <strong>assets/js/movies.js</strong> to see them here.</div>
          </div>
        </div>
      `;
    }
  }
}

function mfRenderSaved() {
  const saved = mfGetSaved();
  const grid = $('#mfSavedGrid');
  if (!grid) return;

  if (!saved.length) {
    grid.innerHTML = `
      <div class="mf-empty-wrap">
        <div class="mf-empty-state">
          <div class="mf-empty-icon">❤️</div>
          <div class="mf-empty-title">No Liked Movies</div>
          <div class="mf-empty-sub">Tap the ❤️ on any movie poster to save it here.</div>
        </div>
      </div>
    `;
    return;
  }
  grid.innerHTML = saved.map(m => mfMakeCard(m, 'grid')).join('');
  mfUpdateAllSaveBtns();
}

/* ══════════════════════════════
   NAVIGATION & SEARCH
══════════════════════════════ */
function mfShowView(view) {
  const homeView = $('#mf-home-view');
  const savedView = $('#mf-saved-view');
  const navHome = $('#mf-nav-home');
  const navSaved = $('#mf-nav-saved');

  if (view === 'home') {
    homeView.classList.remove('hidden');
    savedView.classList.remove('active');
    navHome.classList.add('active');
    navSaved.classList.remove('active');
    window.scrollTo(0, 0);
  } else {
    homeView.classList.add('hidden');
    savedView.classList.add('active');
    navSaved.classList.add('active');
    navHome.classList.remove('active');
    mfRenderSaved();
    window.scrollTo(0, 0);
  }
}

function mfFilterMovies() {
  const q = $('#mfSearchInput').value.toLowerCase().trim();
  const searchSection = $('#mf-search-section');
  const normalSections = $$('.mf-section');
  const searchGrid = $('#mfSearchGrid');
  const searchCount = $('#mfSearchCount');

  if (!q) {
    searchSection.classList.remove('active');
    normalSections.forEach(s => s.classList.remove('hidden'));
    return;
  }

  normalSections.forEach(s => s.classList.add('hidden'));
  searchSection.classList.add('active');

  const filtered = moviesData.filter(m => m.title.toLowerCase().includes(q));
  searchCount.textContent = filtered.length + ' results';

  if (!filtered.length) {
    searchGrid.innerHTML = `
      <div class="mf-empty-wrap">
        <div class="mf-empty-state">
          <div class="mf-empty-icon">🔍</div>
          <div class="mf-empty-title">No Results</div>
          <div class="mf-empty-sub">No movies found for "${mfEsc(q)}"</div>
        </div>
      </div>
    `;
    return;
  }
  searchGrid.innerHTML = filtered.map(m => mfMakeCard(m, 'grid')).join('');
  mfUpdateAllSaveBtns();
}

/* ══════════════════════════════
   DETAIL PAGE LOGIC
══════════════════════════════ */
function mfRenderDetail() {
  const params = new URLSearchParams(window.location.search);
  const id = params.get('id');
  
  const topbarTitle = $('.mfs-topbar-title');
  const title = $('.mfs-title');
  const content = $('.mfs-content-body');

  if (!id) {
    if (topbarTitle) topbarTitle.textContent = "Error";
    if (title) title.textContent = "No ID Provided";
    if (content) content.innerHTML = "<p>Please provide a valid movie ID in the URL.</p>";
    return;
  }

  const m = moviesData.find(movie => String(movie.id) === String(id));
  if (!m) {
    if (topbarTitle) topbarTitle.textContent = "Not Found";
    if (title) title.textContent = "Movie Not Found";
    if (content) content.innerHTML = "<p>The movie you are looking for does not exist in the database.</p>";
    return;
  }

  // Update Page Title
  document.title = `${m.title} - MoviesFun`;

  // Update DOM elements
  if (topbarTitle) topbarTitle.textContent = m.title;

  const backdropImg = $('.mfs-backdrop img');
  if (backdropImg) backdropImg.src = m.thumb;

  const posterImg = $('.mfs-poster img');
  if (posterImg) posterImg.src = m.thumb;

  if (title) title.textContent = m.title;

  const year = $('.mfs-badge.year');
  if (year) year.textContent = m.year;

  const badges = $('.mfs-badges');
  if (badges && m.category) {
    // Keep year and hd, add categories
    badges.innerHTML = `
      <span class="mfs-badge year">${m.year}</span>
      <span class="mfs-badge hd">HD</span>
      ${m.category.map(c => `<span class="mfs-badge">${c}</span>`).join('')}
    `;
  }

  if (content) {
    let videoHtml = `
      <div class="video-placeholder" style="aspect-ratio: 16/9; background: #111; border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-direction: column; gap: 12px; border: 1px solid var(--border);">
        <div style="font-size: 40px;">🎬</div>
        <div style="font-size: 14px; color: var(--muted);">No Video Source Provided</div>
      </div>
    `;

    if (m.video) {
      // Check if it's a YouTube link
      if (m.video.includes('youtube.com') || m.video.includes('youtu.be')) {
        const ytId = m.video.split('v=')[1] || m.video.split('/').pop();
        videoHtml = `<iframe src="https://www.youtube.com/embed/${ytId}" allowfullscreen></iframe>`;
      } else {
        // Assume it's a direct video link (local or external MP4/MKV)
        videoHtml = `
          <video controls poster="${m.thumb}" style="width:100%; border-radius:12px; border:1px solid var(--border);">
            <source src="${m.video}" type="video/mp4">
            Your browser does not support the video tag.
          </video>
        `;
      }
    }

    content.innerHTML = `
      <p>${m.description}</p>
      <h2>Watch ${m.title} Online</h2>
      ${videoHtml}
      <div style="margin-top: 20px;">
        <p>Stream the latest movie <strong>${m.title}</strong> in high quality. Released in ${m.year}.</p>
      </div>
    `;
  }
}

/* ══════════════════════════════
   INIT
══════════════════════════════ */
document.addEventListener('DOMContentLoaded', () => {
  // Determine if we are on index or movie page
  if ($('#mf-wrap')) {
    mfRenderHome();
    mfUpdateAllSaveBtns();

    const searchInput = $('#mfSearchInput');
    if (searchInput) {
      let timer;
      searchInput.addEventListener('input', () => {
        clearTimeout(timer);
        timer = setTimeout(mfFilterMovies, 300);
      });
    }
  } else if ($('.mfs-wrap')) {
    mfRenderDetail();
  }
});

// Global functions for inline onclicks
window.mfShowHome = () => mfShowView('home');
window.mfShowSaved = () => mfShowView('saved');
window.mfToggleSave = mfToggleSave;
