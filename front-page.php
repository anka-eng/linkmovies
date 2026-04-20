<?php get_header(); ?>

<style>
  :root {
    --bg: #0a0a0a;
    --surface: #1c1c1c;
    --accent: #f5c518;
    --accent2: #ff4b4b;
    --text: #f0f0f0;
    --muted: #888;
    --border: #2a2a2a;
    --grad: linear-gradient(135deg, #f5c518, #ff8c00);
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  html, body {
    background: var(--bg) !important;
    color: var(--text) !important;
    font-family: 'Nunito', sans-serif !important;
    min-height: 100vh;
    overflow-x: hidden;
  }

  #page, #content, .site, .wp-site-blocks { background: var(--bg) !important; }

  #mf-wrap {
    max-width: 1400px;
    margin: 0 auto;
    min-height: 100vh;
    position: relative;
    background: var(--bg);
  }

  /* ── HEADER ── */
  #mf-header {
    position: sticky; top: 0; z-index: 100;
    background: rgba(10,10,10,0.97);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--border);
    padding: 12px 16px;
  }
  .mf-header-top { display: flex; align-items: center; justify-content: space-between; }
  .mf-logo { display: flex; align-items: center; gap: 8px; text-decoration: none; }
  .mf-logo-icon {
    width: 34px; height: 34px;
    background: var(--grad); border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-family: 'Oswald', sans-serif;
    font-size: 20px; color: #000; font-weight: 900;
    box-shadow: 0 0 16px rgba(245,197,24,0.4);
  }
  .mf-logo-text { font-family: 'Oswald', sans-serif; font-size: 24px; letter-spacing: 1px; color: var(--text); font-weight: 600; }
  .mf-logo-text span { color: var(--accent); }

  .mf-search-bar {
    margin-top: 10px; display: flex; align-items: center;
    background: var(--surface); border: 1px solid var(--border);
    border-radius: 12px; padding: 0 12px; gap: 8px;
    transition: border-color 0.2s, box-shadow 0.2s;
  }
  .mf-search-bar:focus-within {
    border-color: var(--accent);
    box-shadow: 0 0 0 2px rgba(245,197,24,0.15);
  }
  .mf-search-bar input {
    flex: 1; background: none; border: none; outline: none;
    color: var(--text); font-family: 'Nunito', sans-serif;
    font-size: 15px; padding: 10px 0;
  }
  .mf-search-bar input::placeholder { color: var(--muted); }
  .mf-search-bar svg { color: var(--muted); flex-shrink: 0; }

  /* ── SECTIONS ── */
  .mf-section { margin: 22px 0 0; animation: mfFadeUp 0.45s ease both; }
  .mf-section:nth-child(2) { animation-delay: 0.05s; }
  .mf-section:nth-child(3) { animation-delay: 0.1s; }

  .mf-section-header {
    display: flex; align-items: center; justify-content: space-between;
    padding: 0 16px; margin-bottom: 14px;
  }
  .mf-section-title {
    font-family: 'Oswald', sans-serif; font-size: 20px;
    letter-spacing: 2px; display: flex; align-items: center; gap: 8px;
    color: var(--text);
  }
  .mf-section-title::before {
    content: ''; width: 4px; height: 20px;
    background: var(--grad); border-radius: 2px;
  }
  .mf-see-all {
    font-size: 12px; color: var(--accent); font-weight: 700;
    letter-spacing: 0.5px; text-transform: uppercase; text-decoration: none;
  }

  /* ── HORIZONTAL CARDS ── */
  .mf-cards-scroll {
    display: flex; gap: 12px; padding: 0 16px;
    overflow-x: auto; scrollbar-width: none;
  }
  .mf-cards-scroll::-webkit-scrollbar { display: none; }

  a.mf-movie-card {
    flex-shrink: 0; width: 130px;
    text-decoration: none; color: inherit;
    display: block; transition: transform 0.2s;
  }
  a.mf-movie-card:active { transform: scale(0.95); }

  .mf-card-poster {
    width: 130px; height: 185px;
    border-radius: 12px; overflow: hidden;
    position: relative; background: var(--surface);
    border: 1px solid var(--border);
  }
  .mf-card-poster img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s; }
  a.mf-movie-card:hover .mf-card-poster img { transform: scale(1.05); }
  .mf-card-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, transparent 50%);
    opacity: 0; transition: opacity 0.3s;
    display: flex; align-items: flex-end; justify-content: center; padding-bottom: 12px;
  }
  a.mf-movie-card:hover .mf-card-overlay { opacity: 1; }
  .mf-play-btn {
    width: 36px; height: 36px; background: var(--grad);
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    color: #000; font-size: 13px;
  }
  .mf-card-badge {
    position: absolute; top: 8px; left: 8px;
    background: var(--accent2); color: #fff;
    font-size: 9px; font-weight: 700;
    padding: 2px 6px; border-radius: 4px; text-transform: uppercase;
  }
  .mf-card-badge.hd {
    background: rgba(0,0,0,0.7); color: var(--accent);
    border: 1px solid var(--accent); left: auto; right: 8px;
  }
  .mf-card-info { padding: 8px 2px 0; }
  .mf-card-title { font-size: 13px; font-weight: 700; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: var(--text); }
  .mf-card-year { font-size: 12px; color: var(--accent); font-weight: 600; margin-top: 2px; }

  /* ── GRID ── */
  .mf-grid-section { padding: 0 16px; }

  /* Desktop default: 6 columns */
  .mf-movies-grid {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 16px;
  }

  a.mf-grid-card {
    text-decoration: none; color: inherit;
    display: block; transition: transform 0.2s;
  }
  a.mf-grid-card:hover { transform: translateY(-4px); }
  a.mf-grid-card:active { transform: scale(0.97); }

  .mf-grid-poster {
    width: 100%; aspect-ratio: 2/3;
    border-radius: 8px; overflow: hidden;
    position: relative; background: var(--surface);
    border: 1px solid var(--border);
    box-shadow: 0 4px 16px rgba(0,0,0,0.5);
  }
  .mf-grid-poster img { width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.3s; }
  a.mf-grid-card:hover .mf-grid-poster img { transform: scale(1.06); }

  .mf-grid-title {
    font-size: 13px; font-weight: 700;
    margin-top: 7px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    color: #ffffff;
  }
  .mf-grid-year {
    font-size: 12px; color: var(--accent);
    font-weight: 700; margin-top: 2px;
  }

  /* ── DESKTOP: padding & header ── */
  @media (min-width: 769px) {
    #mf-header { padding: 16px 24px; }
    .mf-section-header { padding: 0 24px; }
    .mf-section-title { font-size: 22px; }
    .mf-grid-section { padding: 0 24px; }
    .mf-cards-scroll { gap: 16px; padding: 0 24px; }
    a.mf-movie-card { width: 170px; }
    .mf-card-poster { width: 170px; height: 250px; }
    .mf-skel-card { width: 170px; }
    .mf-skel-poster { width: 170px; height: 250px; }
    .mf-grid-title { font-size: 14px; }
    .mf-grid-year { font-size: 13px; }
  }

  /* ── TABLET: 4 columns ── */
  @media (max-width: 1100px) and (min-width: 601px) {
    .mf-movies-grid { grid-template-columns: repeat(4, 1fr); gap: 12px; }
  }

  /* ── LARGE DESKTOP: 6 columns ── */
  @media (min-width: 1101px) {
    .mf-movies-grid { grid-template-columns: repeat(6, 1fr); gap: 16px; }
  }

  /* ── MOBILE: 3 columns ── */
  @media (max-width: 600px) {
    .mf-movies-grid { grid-template-columns: repeat(3, 1fr); gap: 8px; }
    .mf-grid-section { padding: 0 10px; }
    .mf-section-header { padding: 0 10px; }
    .mf-grid-poster { aspect-ratio: 2/3; border-radius: 6px; }
    a.mf-movie-card { width: 100%; }
    .mf-card-poster { width: 100%; height: auto; }
    .mf-grid-title { font-size: 11px; font-weight: 700; margin-top: 5px; color: #ffffff; }
    .mf-grid-year { font-size: 11px; font-weight: 700; color: var(--accent); }
  }

  /* ── HEART / SAVE BUTTON ── */
  .mf-save-btn {
    position: absolute; top: 8px; right: 8px;
    width: 32px; height: 32px;
    background: rgba(0,0,0,0.6); backdrop-filter: blur(6px);
    border: none; border-radius: 50%; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    z-index: 5; transition: transform 0.15s, background 0.2s;
    user-select: none; -webkit-user-select: none; padding: 0;
  }
  .mf-save-btn:active { transform: scale(0.78); }
  .mf-save-btn svg { width: 16px; height: 16px; transition: fill 0.2s, stroke 0.2s; pointer-events: none; }
  .mf-save-btn svg { fill: none; stroke: #ffffff; stroke-width: 2.2; stroke-linecap: round; stroke-linejoin: round; }
  .mf-save-btn.saved { background: rgba(220,38,38,0.9); }
  .mf-save-btn.saved svg { fill: #ffffff; stroke: #ffffff; }

  /* ── SEARCH RESULTS SECTION ── */
  #mf-search-section { display: none; }
  #mf-search-section.active { display: block; }

  /* ── SAVED VIEW ── */
  #mf-saved-view { display: none; padding-bottom: 80px; }
  #mf-saved-view.active { display: block; }
  #mf-home-view.hidden { display: none; }
  .mf-saved-header {
    display: flex; align-items: center; gap: 8px;
    padding: 20px 20px 14px;
    font-family: 'Oswald', sans-serif; font-size: 22px;
    letter-spacing: 2px; color: var(--text);
  }
  .mf-saved-header::before { content: ''; width: 4px; height: 22px; background: var(--grad); border-radius: 2px; }

  /* ── NO IMAGE ── */
  .mf-no-img {
    width: 100%; height: 100%;
    display: flex; flex-direction: column; align-items: center; justify-content: center;
    gap: 6px; color: var(--muted); font-size: 26px; background: var(--surface);
  }
  .mf-no-img span { font-family: 'Oswald', sans-serif; font-size: 10px; letter-spacing: 1px; text-align: center; padding: 0 6px; color: var(--muted); }

  /* ── SKELETON ── */
  .mf-skeleton {
    background: linear-gradient(90deg, var(--surface) 25%, #252525 50%, var(--surface) 75%);
    background-size: 200% 100%; animation: mfShimmer 1.4s infinite; border-radius: 10px;
  }
  @keyframes mfShimmer { 0%{background-position:200% 0} 100%{background-position:-200% 0} }
  .mf-skel-card { flex-shrink: 0; width: 130px; }
  .mf-skel-poster { width: 130px; height: 185px; border-radius: 12px; }
  .mf-skel-line { height: 11px; margin-top: 8px; border-radius: 6px; }
  .mf-skel-line.w80 { width: 80%; } .mf-skel-line.w50 { width: 50%; }
  .mf-skel-grid-poster { width: 100%; aspect-ratio: 2/3; border-radius: 10px; }

  /* ── EMPTY ── */
  .mf-empty-wrap { padding: 0 16px; }
  .mf-empty-state {
    display: flex; flex-direction: column; align-items: center;
    justify-content: center; padding: 48px 20px; gap: 10px;
    text-align: center; border: 1px dashed var(--border); border-radius: 16px;
  }
  .mf-empty-icon { font-size: 44px; opacity: 0.35; }
  .mf-empty-title { font-family: 'Oswald', sans-serif; font-size: 20px; letter-spacing: 2px; color: var(--muted); }
  .mf-empty-sub { font-size: 13px; color: var(--muted); line-height: 1.6; }

  /* ── BOTTOM NAV ── */
  .mf-bottom-nav {
    position: fixed; bottom: 0; left: 50%; transform: translateX(-50%);
    width: 100%; max-width: 1400px;
    background: rgba(12,12,12,0.97); backdrop-filter: blur(16px);
    border-top: 1px solid var(--border);
    display: flex; padding: 10px 0 18px; z-index: 100;
  }
  .mf-nav-item {
    flex: 1; display: flex; flex-direction: column;
    align-items: center; gap: 4px; cursor: pointer; transition: all 0.2s;
  }
  .mf-nav-item:active { transform: scale(0.9); }
  .mf-nav-icon { font-size: 22px; }
  .mf-nav-label { font-size: 10px; font-weight: 600; color: var(--muted); letter-spacing: 0.5px; text-transform: uppercase; }
  .mf-nav-item.active .mf-nav-label { color: var(--accent); }

  .mf-page-bottom { height: 80px; }

  @keyframes mfFadeUp {
    from { opacity: 0; transform: translateY(16px); }
    to   { opacity: 1; transform: translateY(0); }
  }
</style>

<div id="mf-wrap">

  <!-- HEADER -->
  <header id="mf-header">
    <div class="mf-header-top">
      <a class="mf-logo" href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="MoviesFun.in Logo">
      </a>
    </div>
    <div class="mf-search-bar">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
        <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
      </svg>
      <input type="text" id="mfSearchInput" placeholder="Search movies...">
    </div>
  </header>

  <!-- HOME VIEW -->
  <div id="mf-home-view">

  <!-- SEARCH RESULTS (shown when typing) -->
  <div id="mf-search-section">
    <div class="mf-section-header" style="padding-top:20px">
      <div class="mf-section-title">Search Results</div>
      <span class="mf-see-all" id="mfSearchCount"></span>
    </div>
    <div class="mf-grid-section">
      <div class="mf-movies-grid" id="mfSearchGrid"></div>
    </div>
    <div style="height:80px"></div>
  </div>

  <!-- LATEST RELEASES -->
  <div class="mf-section">
    <div class="mf-section-header">
      <div class="mf-section-title">Latest Releases</div>
      <a class="mf-see-all" href="<?php echo home_url(); ?>">See All →</a>
    </div>
    <div class="mf-cards-scroll" id="mfLatestCards">
      <!-- Populated by JS from inline PHP JSON below -->
    </div>
  </div>

  <!-- ALL MOVIES — rendered directly by WordPress PHP (no external proxy needed) -->
  <div class="mf-section">
    <div class="mf-section-header">
      <div class="mf-section-title">All Movies</div>
      <span class="mf-see-all"><?php
        $total = wp_count_posts()->publish;
        echo $total > 0 ? $total . ' Movies' : '';
      ?></span>
    </div>
    <div class="mf-grid-section">
      <div class="mf-movies-grid" id="mfAllGrid">
        <?php
        $all_query = new WP_Query([
          'posts_per_page' => -1,
          'post_status'    => 'publish',
          'post_type'      => 'post',
          'orderby'        => 'date',
          'order'          => 'DESC',
        ]);
        if ( $all_query->have_posts() ) :
          while ( $all_query->have_posts() ) : $all_query->the_post();
            $post_id = get_the_ID();
            $link    = get_permalink( $post_id );
            $title   = get_the_title( $post_id );
            $year    = get_the_date('Y');
            $thumb   = '';
            if ( has_post_thumbnail( $post_id ) ) {
              $thumb = get_the_post_thumbnail_url( $post_id, 'medium_large' );
            }
            ?>
            <a class="mf-grid-card" href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
              <div class="mf-grid-poster">
                <?php if ( $thumb ) : ?>
                  <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
                <?php else : ?>
                  <div class="mf-no-img">🎬<span><?php echo esc_html($title); ?></span></div>
                <?php endif; ?>
                <button class="mf-save-btn" onclick="mfToggleSave(event, <?php echo $post_id; ?>, '<?php echo esc_js($title); ?>', '<?php echo esc_js($link); ?>', '<?php echo esc_js($thumb); ?>', '<?php echo esc_js($year); ?>')" data-id="<?php echo $post_id; ?>"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></button>
              </div>
              <div class="mf-grid-title"><?php echo esc_html($title); ?></div>
              <div class="mf-grid-year"><?php echo esc_html($year); ?></div>
            </a>
            <?php
          endwhile;
          wp_reset_postdata();
        else : ?>
          <div class="mf-empty-wrap" style="grid-column:1/-1">
            <div class="mf-empty-state">
              <div class="mf-empty-icon">🎬</div>
              <div class="mf-empty-title">No Movies Yet</div>
              <div class="mf-empty-sub">Publish posts and they'll appear here automatically.</div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <div class="mf-page-bottom"></div>
  </div><!-- #mf-home-view -->

  <!-- SAVED VIEW -->
  <div id="mf-saved-view">
    <div class="mf-saved-header">❤️ Liked Movies</div>
    <div class="mf-grid-section">
      <div class="mf-movies-grid" id="mfSavedGrid"></div>
    </div>
    <div class="mf-page-bottom"></div>
  </div>

  <!-- BOTTOM NAV -->
  <nav class="mf-bottom-nav">
    <div class="mf-nav-item active" id="mf-nav-home" onclick="mfShowHome()">
      <div class="mf-nav-icon">🏠</div>
      <div class="mf-nav-label">Home</div>
    </div>
    <div class="mf-nav-item" id="mf-nav-saved" onclick="mfShowSaved()">
      <div class="mf-nav-icon">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="mf-heart-nav"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
      </div>
      <div class="mf-nav-label">Saved</div>
    </div>
  </nav>

</div><!-- #mf-wrap -->

<script>
  /* ── LATEST SECTION: also use PHP-rendered data via inline JSON ── */
  const mfLatestData = <?php
    $latest_query = new WP_Query([
      'posts_per_page' => 10,
      'post_status'    => 'publish',
      'post_type'      => 'post',
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);
    $latest_arr = [];
    if ( $latest_query->have_posts() ) {
      while ( $latest_query->have_posts() ) {
        $latest_query->the_post();
        $pid   = get_the_ID();
        $thumb = has_post_thumbnail($pid) ? get_the_post_thumbnail_url($pid, 'medium_large') : '';
        $latest_arr[] = [
          'id'    => $pid,
          'title' => get_the_title($pid),
          'link'  => get_permalink($pid),
          'year'  => get_the_date('Y'),
          'thumb' => $thumb,
        ];
      }
      wp_reset_postdata();
    }
    echo json_encode($latest_arr);
  ?>;

  /* ── SEARCH: all movies inline JSON ── */
  const mfAllMovies = <?php
    $search_query = new WP_Query([
      'posts_per_page' => -1,
      'post_status'    => 'publish',
      'post_type'      => 'post',
      'orderby'        => 'date',
      'order'          => 'DESC',
    ]);
    $search_arr = [];
    if ( $search_query->have_posts() ) {
      while ( $search_query->have_posts() ) {
        $search_query->the_post();
        $pid   = get_the_ID();
        $thumb = has_post_thumbnail($pid) ? get_the_post_thumbnail_url($pid, 'medium_large') : '';
        $search_arr[] = [
          'id'    => $pid,
          'title' => get_the_title($pid),
          'link'  => get_permalink($pid),
          'year'  => get_the_date('Y'),
          'thumb' => $thumb,
        ];
      }
      wp_reset_postdata();
    }
    echo json_encode($search_arr);
  ?>;

  /* ══════════════════════════════
     SAVE / BOOKMARK SYSTEM
  ══════════════════════════════ */
  function mfGetSaved() {
    try { return JSON.parse(localStorage.getItem('mf_saved') || '[]'); }
    catch(e) { return []; }
  }
  function mfSetSaved(arr) {
    localStorage.setItem('mf_saved', JSON.stringify(arr));
  }
  function mfIsSaved(id) {
    return mfGetSaved().some(m => String(m.id) === String(id));
  }
  function mfToggleSave(e, id, title, link, thumb, year) {
    e.preventDefault(); e.stopPropagation();
    let saved = mfGetSaved();
    const key = String(id);
    const idx = saved.findIndex(m => String(m.id) === key);
    if (idx > -1) {
      saved.splice(idx, 1);
      mfShowToast('Removed from Saved');
    } else {
      saved.unshift({ id: key, title, link, thumb, year });
      mfShowToast('Saved! ✅');
    }
    mfSetSaved(saved);
    mfUpdateAllSaveBtns();
  }
  function mfUpdateAllSaveBtns() {
    document.querySelectorAll('.mf-save-btn[data-id]').forEach(btn => {
      const id = btn.getAttribute('data-id');
      if (mfIsSaved(id)) {
        btn.classList.add('saved');
        btn.style.background = 'var(--accent)';
        btn.style.borderColor = 'var(--accent)';
      } else {
        btn.classList.remove('saved');
        btn.style.background = '';
        btn.style.borderColor = '';
      }
    });
  }
  function mfShowToast(msg) {
    let t = document.getElementById('mfToast');
    if (!t) {
      t = document.createElement('div');
      t.id = 'mfToast';
      t.style.cssText = 'position:fixed;bottom:90px;left:50%;transform:translateX(-50%);background:#222;color:#fff;padding:10px 20px;border-radius:20px;font-size:13px;font-weight:600;z-index:9999;pointer-events:none;transition:opacity 0.3s;border:1px solid #444';
      document.body.appendChild(t);
    }
    t.textContent = msg; t.style.opacity = '1';
    clearTimeout(t._timer);
    t._timer = setTimeout(() => { t.style.opacity = '0'; }, 2000);
  }

  /* ── HEART SVG ── */
  const HEART_SVG = `<svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>`;

  /* ── SAVE SYSTEM ── */
  function mfGetSaved() {
    try { return JSON.parse(localStorage.getItem('mf_saved') || '[]'); } catch(e) { return []; }
  }
  function mfSetSaved(arr) { localStorage.setItem('mf_saved', JSON.stringify(arr)); }
  function mfIsSaved(id) { return mfGetSaved().some(m => String(m.id) === String(id)); }

  function mfToggleSave(e, id, title, link, thumb, year) {
    e.preventDefault(); e.stopPropagation();
    let saved = mfGetSaved();
    const key = String(id);
    const idx = saved.findIndex(m => String(m.id) === key);
    if (idx > -1) {
      saved.splice(idx, 1);
      mfShowToast('Removed from Liked ❌');
    } else {
      saved.unshift({ id: key, title, link, thumb, year });
      mfShowToast('Liked! ❤️');
    }
    mfSetSaved(saved);
    mfUpdateAllSaveBtns();
  }

  function mfUpdateAllSaveBtns() {
    document.querySelectorAll('.mf-save-btn[data-id]').forEach(btn => {
      const id = btn.getAttribute('data-id');
      if (mfIsSaved(id)) btn.classList.add('saved');
      else btn.classList.remove('saved');
    });
    // Update nav heart color
    const navHeart = document.getElementById('mf-heart-nav');
    if (navHeart) {
      const count = mfGetSaved().length;
      navHeart.style.fill = count > 0 ? '#dc2626' : 'none';
      navHeart.style.stroke = count > 0 ? '#dc2626' : 'currentColor';
    }
  }

  function mfShowToast(msg) {
    let t = document.getElementById('mfToast');
    if (!t) {
      t = document.createElement('div'); t.id = 'mfToast';
      t.style.cssText = 'position:fixed;bottom:90px;left:50%;transform:translateX(-50%) translateY(10px);background:#1a1a1a;color:#fff;padding:10px 22px;border-radius:24px;font-size:13px;font-weight:700;z-index:9999;pointer-events:none;opacity:0;transition:opacity 0.25s,transform 0.25s;border:1px solid #333;white-space:nowrap';
      document.body.appendChild(t);
    }
    t.textContent = msg;
    t.style.opacity = '1'; t.style.transform = 'translateX(-50%) translateY(0)';
    clearTimeout(t._timer);
    t._timer = setTimeout(() => { t.style.opacity = '0'; t.style.transform = 'translateX(-50%) translateY(10px)'; }, 2000);
  }

  function mfMakeCard(m, extraOnClick='') {
    const saved = mfIsSaved(m.id);
    return `<a class="mf-grid-card" href="${m.link}" target="_blank" rel="noopener noreferrer">
      <div class="mf-grid-poster">
        ${m.thumb ? `<img src="${m.thumb}" alt="${mfEsc(m.title)}" loading="lazy">` : `<div class="mf-no-img">🎬<span>${mfEsc(m.title)}</span></div>`}
        <button class="mf-save-btn${saved?' saved':''}" data-id="${m.id}" onclick="mfToggleSave(event,'${m.id}','${mfEsc(m.title)}','${m.link}','${m.thumb}','${m.year}')${extraOnClick}">${HEART_SVG}</button>
      </div>
      <div class="mf-grid-title">${mfEsc(m.title)}</div>
      <div class="mf-grid-year">${m.year}</div>
    </a>`;
  }

  /* ── RENDER LATEST ── */
  function mfRenderLatest(movies) {
    const el = document.getElementById('mfLatestCards');
    if (!movies.length) { el.innerHTML = ''; return; }
    el.innerHTML = movies.map(m => `
      <a class="mf-movie-card" href="${m.link}" target="_blank" rel="noopener noreferrer">
        <div class="mf-card-poster">
          ${m.thumb ? `<img src="${m.thumb}" alt="${mfEsc(m.title)}" loading="lazy">` : `<div class="mf-no-img">🎬<span>${mfEsc(m.title)}</span></div>`}
          <div class="mf-card-badge">New</div>
          <div class="mf-card-badge hd">HD</div>
          <div class="mf-card-overlay"><div class="mf-play-btn">▶</div></div>
          <button class="mf-save-btn" data-id="${m.id}" onclick="mfToggleSave(event,'${m.id}','${mfEsc(m.title)}','${m.link}','${m.thumb}','${m.year}')">${HEART_SVG}</button>
        </div>
        <div class="mf-card-info">
          <div class="mf-card-title">${mfEsc(m.title)}</div>
          <div class="mf-card-year">${m.year}</div>
        </div>
      </a>`).join('');
    mfUpdateAllSaveBtns();
  }

  /* ── SEARCH ── */
  function mfFilterMovies() {
    const q = document.getElementById('mfSearchInput').value.toLowerCase().trim();
    const searchSection = document.getElementById('mf-search-section');
    const homeContent   = document.getElementById('mf-home-view');
    const searchGrid    = document.getElementById('mfSearchGrid');
    const searchCount   = document.getElementById('mfSearchCount');

    if (!q) {
      searchSection.classList.remove('active');
      // show Latest + All Movies again
      homeContent.querySelectorAll('.mf-section').forEach(s => s.style.display = '');
      return;
    }

    // Hide normal sections, show search results
    homeContent.querySelectorAll('.mf-section').forEach(s => s.style.display = 'none');
    searchSection.classList.add('active');

    const filtered = mfAllMovies.filter(m => m.title.toLowerCase().includes(q));
    searchCount.textContent = filtered.length + ' results';

    if (!filtered.length) {
      searchGrid.innerHTML = `<div class="mf-empty-wrap" style="grid-column:1/-1"><div class="mf-empty-state"><div class="mf-empty-icon">🔍</div><div class="mf-empty-title">No Results</div><div class="mf-empty-sub">No movies found for "${mfEsc(q)}"</div></div></div>`;
      return;
    }
    searchGrid.innerHTML = filtered.map(m => mfMakeCard(m)).join('');
    mfUpdateAllSaveBtns();
  }

  /* ── SAVED VIEW ── */
  function mfShowSaved() {
    document.getElementById('mf-home-view').classList.add('hidden');
    document.getElementById('mf-search-section').classList.remove('active');
    document.getElementById('mf-saved-view').classList.add('active');
    document.getElementById('mf-nav-home').classList.remove('active');
    document.getElementById('mf-nav-saved').classList.add('active');
    mfRenderSaved();
  }
  function mfShowHome() {
    document.getElementById('mf-home-view').classList.remove('hidden');
    document.getElementById('mf-saved-view').classList.remove('active');
    document.getElementById('mf-nav-saved').classList.remove('active');
    document.getElementById('mf-nav-home').classList.add('active');
  }
  function mfRenderSaved() {
    const saved = mfGetSaved();
    const grid  = document.getElementById('mfSavedGrid');
    if (!saved.length) {
      grid.innerHTML = `<div class="mf-empty-wrap" style="grid-column:1/-1"><div class="mf-empty-state"><div class="mf-empty-icon" style="font-size:40px">❤️</div><div class="mf-empty-title">No Liked Movies</div><div class="mf-empty-sub">Tap the ❤️ on any movie poster to save it here.</div></div></div>`;
      return;
    }
    grid.innerHTML = saved.map(m => mfMakeCard(m, ';mfRenderSaved()')).join('');
  }

  function mfEsc(s) { return (s||'').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;'); }

  // Init on load
  mfRenderLatest(mfLatestData);
  mfUpdateAllSaveBtns();

  // Search with debounce
  let mfSearchTimer;
  document.getElementById('mfSearchInput').addEventListener('input', function() {
    clearTimeout(mfSearchTimer);
    mfSearchTimer = setTimeout(mfFilterMovies, 250);
  });
</script>

<?php get_footer(); ?>
