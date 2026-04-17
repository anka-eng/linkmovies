<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<style>
  *{margin:0;padding:0;box-sizing:border-box}
  body{background:#0a0a0a!important;color:#f0f0f0!important;font-family:'Nunito',sans-serif!important}
  #page,#content,.site,.wp-site-blocks{background:#0a0a0a!important}
  .mfs-wrap{max-width:900px;margin:0 auto;padding:0 0 60px;background:#0a0a0a;min-height:100vh}
  .mfs-topbar{position:sticky;top:0;z-index:100;background:rgba(10,10,10,0.97);backdrop-filter:blur(12px);border-bottom:1px solid #2a2a2a;padding:14px 20px;display:flex;align-items:center;gap:12px}
  .mfs-back{display:flex;align-items:center;justify-content:center;width:36px;height:36px;background:#1c1c1c;border-radius:10px;text-decoration:none;color:#f0f0f0;border:1px solid #2a2a2a;font-size:18px;flex-shrink:0}
  .mfs-topbar-title{font-family:'Oswald',sans-serif;font-size:18px;font-weight:600;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;flex:1}
  .mfs-hero{position:relative;width:100%;min-height:220px;background:#1c1c1c;display:flex;align-items:flex-end;padding:20px}
  .mfs-backdrop{position:absolute;inset:0;overflow:hidden}
  .mfs-backdrop img{width:100%;height:100%;object-fit:cover;filter:blur(20px) brightness(0.3);transform:scale(1.1)}
  .mfs-backdrop-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(10,10,10,0.2),rgba(10,10,10,0.95))}
  .mfs-hero-inner{position:relative;display:flex;gap:16px;align-items:flex-end;width:100%}
  .mfs-poster{width:100px;height:150px;flex-shrink:0;border-radius:10px;overflow:hidden;border:2px solid #2a2a2a;box-shadow:0 8px 32px rgba(0,0,0,0.8);background:#1c1c1c}
  .mfs-poster img{width:100%;height:100%;object-fit:cover;display:block}
  .mfs-no-poster{width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:36px;background:#1c1c1c}
  .mfs-info{flex:1}
  .mfs-title{font-family:'Oswald',sans-serif;font-size:22px;font-weight:700;color:#fff;margin-bottom:8px;line-height:1.2}
  .mfs-badges{display:flex;flex-wrap:wrap;gap:6px}
  .mfs-badge{background:#1c1c1c;border:1px solid #2a2a2a;color:#888;font-size:11px;font-weight:700;padding:3px 8px;border-radius:6px;text-transform:uppercase}
  .mfs-badge.year{color:#f5c518;border-color:#f5c518}
  .mfs-badge.hd{color:#f5c518;border-color:#f5c518}
  .mfs-content{padding:24px 20px}
  .mfs-content-body{color:#f0f0f0;font-size:15px;line-height:1.8}
  .mfs-content-body p{margin-bottom:16px}
  .mfs-content-body h1,.mfs-content-body h2,.mfs-content-body h3{font-family:'Oswald',sans-serif;color:#f0f0f0;margin:24px 0 12px;letter-spacing:1px}
  .mfs-content-body a{color:#f5c518}
  .mfs-content-body img{max-width:100%;border-radius:10px;margin:12px 0;border:1px solid #2a2a2a}
  .mfs-content-body iframe,.mfs-content-body video{width:100%;border-radius:10px;margin:12px 0;border:none;aspect-ratio:16/9}
  .mfs-back-home{margin-top:32px;text-align:center}
  .mfs-back-home a{display:inline-flex;align-items:center;gap:8px;color:#888;font-size:13px;text-decoration:none;border:1px solid #2a2a2a;padding:10px 20px;border-radius:10px}
  .mfs-back-home a:hover{color:#f5c518;border-color:#f5c518}
  @media(min-width:601px){.mfs-poster{width:130px;height:195px}.mfs-title{font-size:26px}.mfs-content{padding:32px 32px}.mfs-content-body{font-size:16px}}
</style>
<div class="mfs-wrap">
  <div class="mfs-topbar">
    <a class="mfs-back" href="<?php echo home_url(); ?>">←</a>
    <div class="mfs-topbar-title"><?php the_title(); ?></div>
  </div>
  <div class="mfs-hero">
    <div class="mfs-backdrop">
      <?php if(has_post_thumbnail()):?><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large');?>" alt=""><?php endif;?>
      <div class="mfs-backdrop-overlay"></div>
    </div>
    <div class="mfs-hero-inner">
      <div class="mfs-poster">
        <?php if(has_post_thumbnail()):?>
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'medium_large');?>" alt="<?php the_title_attribute();?>">
        <?php else:?><div class="mfs-no-poster">🎬</div><?php endif;?>
      </div>
      <div class="mfs-info">
        <div class="mfs-title"><?php the_title();?></div>
        <div class="mfs-badges">
          <span class="mfs-badge year"><?php echo get_the_date('Y');?></span>
          <span class="mfs-badge hd">HD</span>
          <?php $cats=get_the_category();if($cats){foreach(array_slice($cats,0,2) as $cat){echo '<span class="mfs-badge">'.esc_html($cat->name).'</span>';};}?>
        </div>
      </div>
    </div>
  </div>
  <div class="mfs-content">
    <div class="mfs-content-body"><?php the_content();?></div>
    <div class="mfs-back-home"><a href="<?php echo home_url();?>">← Back to Home</a></div>
  </div>
</div>
<?php endwhile;?>
<?php get_footer();?>
