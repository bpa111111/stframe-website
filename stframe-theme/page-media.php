<?php
/**
 * Template Name: Media Center
 *
 * @package ST_Frame_Theme
 */

get_header();
?>

<!-- HERO SECTION (WITH HERO FACTORY BACKGROUND IMAGE) -->
<section class="bg-slate-950 text-white py-16 lg:py-20 relative overflow-hidden">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-factory.jpg" alt="ST. Frame & Truss Factory" class="absolute inset-0 w-full h-full object-cover object-center opacity-40 lg:opacity-50 pointer-events-none transform filter brightness-105">
  <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/70 to-slate-950/30 z-0"></div>
  <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
  <div class="relative z-10 max-w-7xl 2xl:max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl space-y-4">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-500/20 text-orange-400 text-xs font-semibold">
        <i class="fas fa-play-circle"></i> <span>ST. FRAME MEDIA & VIDEO GALLERY</span>
      </div>
      <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-white tracking-tight leading-tight">
        ศูนย์รวมวิดีโอและสื่อประชาสัมพันธ์
      </h1>
      <p class="text-slate-300 text-base sm:text-lg font-light leading-relaxed">
        สัมผัสศักยภาพและกระบวนการทำงานระดับมาตรฐานสากล ผ่านวิดีโอแนะนำองค์กร นวัตกรรมโรงงาน 3D BIM และผลงานโครงสร้างเหล็กระดับประวัติศาสตร์
      </p>
    </div>
  </div>
</section>

<!-- MAIN CONTENT (DARK CINEMATIC THEME) -->
<main class="flex-grow bg-slate-950 py-16">
  <div class="max-w-7xl 2xl:max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 space-y-12">

    <!-- FEATURED VIDEO SHOWCASE CARD -->
    <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 sm:p-8 lg:p-10 shadow-2xl space-y-6 relative overflow-hidden">
      <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-800 pb-6">
        <div class="space-y-1.5">
          <div class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-orange-500 bg-orange-500/10 px-2.5 py-1 rounded-md border border-orange-500/20">
            <i class="fas fa-play-circle"></i> <span>กำลังเล่น (Now Playing)</span>
          </div>
          <h2 id="featured-video-title" class="text-2xl sm:text-3xl font-bold font-heading text-white leading-tight">
            ST Company Profile
          </h2>
          <p id="featured-video-desc" class="text-xs sm:text-sm text-slate-400">
            ทำความรู้จัก ST. Frame & Truss ผู้เชี่ยวชาญด้านงานก่อสร้างและแปรรูปโครงสร้างเหล็กครบวงจร มาตรฐาน ISO 9001 & ISO 45001
          </p>
        </div>

        <div class="flex items-center gap-3 shrink-0">
          <a id="direct-yt-btn" href="https://www.youtube.com/watch?v=sETkvTTVuO0" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-800 hover:bg-slate-700 text-white border border-slate-700 rounded-xl text-xs font-semibold transition">
            <i class="fab fa-youtube text-red-500 text-base"></i>
            <span>เปิดดูบน YouTube</span>
          </a>
          <a href="https://www.youtube.com/@ST.FRAMETRUSS" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl text-xs font-semibold shadow-lg hover:shadow-red-600/30 transition">
            <i class="fas fa-bell text-xs"></i>
            <span>ติดตามช่อง</span>
          </a>
        </div>
      </div>

      <div class="relative w-full aspect-video rounded-2xl overflow-hidden shadow-2xl border border-slate-700/80 bg-black">
        <iframe id="main-featured-iframe" 
                class="absolute inset-0 w-full h-full" 
                src="https://www.youtube.com/embed/sETkvTTVuO0" 
                title="ST Company Profile" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen>
        </iframe>
      </div>
    </div>

    <!-- VIDEO GRID CARDS (DARK STEEL CARDS) -->
    <div id="video-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
      
      <!-- Video 1 -->
      <div class="video-card bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:border-orange-500/80 transition duration-300 flex flex-col group shadow-lg">
        <div class="relative aspect-video overflow-hidden bg-slate-950 cursor-pointer" onclick="playVideo('sETkvTTVuO0', 'ST Company Profile', 'ทำความรู้จัก ST. Frame & Truss ผู้เชี่ยวชาญด้านงานก่อสร้างและแปรรูปโครงสร้างเหล็กครบวงจร')">
          <img src="https://i.ytimg.com/vi/sETkvTTVuO0/hqdefault.jpg" alt="ST Company Profile" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute inset-0 bg-slate-950/40 group-hover:bg-slate-950/20 transition flex items-center justify-center">
            <div class="w-14 h-14 rounded-full bg-orange-600/95 group-hover:bg-orange-500 text-white flex items-center justify-center text-xl shadow-xl transform group-hover:scale-110 transition duration-300">
              <i class="fas fa-play ml-1"></i>
            </div>
          </div>
          <span class="absolute top-3 left-3 bg-orange-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">แนะนำองค์กร</span>
        </div>
        <div class="p-6 flex flex-col justify-between flex-grow space-y-3">
          <div>
            <h3 class="font-bold text-base sm:text-lg text-white font-heading group-hover:text-orange-400 transition leading-snug">ST Company Profile</h3>
            <p class="text-xs sm:text-sm text-slate-400 mt-2 line-clamp-2">วิดีโอแนะนำองค์กร ประวัติความเป็นมากว่า 30 ปี ศักยภาพโรงงานอยุธยา และมาตรฐานการดำเนินงานระดับสากล</p>
          </div>
          <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-500">
            <span><i class="fas fa-user-circle text-slate-400 mr-1"></i> ST. FRAME & TRUSS</span>
            <button onclick="playVideo('sETkvTTVuO0', 'ST Company Profile', 'ทำความรู้จัก ST. Frame & Truss ผู้เชี่ยวชาญด้านงานก่อสร้างและแปรรูปโครงสร้างเหล็กครบวงจร')" class="text-orange-400 hover:text-orange-300 font-semibold flex items-center gap-1">
              <span>เล่นวิดีโอ</span> <i class="fas fa-arrow-right text-[10px]"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Video 2 -->
      <div class="video-card bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:border-orange-500/80 transition duration-300 flex flex-col group shadow-lg">
        <div class="relative aspect-video overflow-hidden bg-slate-950 cursor-pointer" onclick="playVideo('lE9FgQ_3iSQ', 'ST.FRAME BIM FACTORY', 'กระบวนการทำงานด้วยระบบ 3D BIM เชื่อมโยงสู่โรงงานแปรรูปโครงสร้างเหล็กอยุธยา')">
          <img src="https://i.ytimg.com/vi/lE9FgQ_3iSQ/hqdefault.jpg" alt="ST.FRAME BIM FACTORY" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute inset-0 bg-slate-950/40 group-hover:bg-slate-950/20 transition flex items-center justify-center">
            <div class="w-14 h-14 rounded-full bg-orange-600/95 group-hover:bg-orange-500 text-white flex items-center justify-center text-xl shadow-xl transform group-hover:scale-110 transition duration-300">
              <i class="fas fa-play ml-1"></i>
            </div>
          </div>
          <span class="absolute top-3 left-3 bg-amber-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">เทคโนโลยี BIM</span>
        </div>
        <div class="p-6 flex flex-col justify-between flex-grow space-y-3">
          <div>
            <h3 class="font-bold text-base sm:text-lg text-white font-heading group-hover:text-orange-400 transition leading-snug">ST.FRAME BIM FACTORY</h3>
            <p class="text-xs sm:text-sm text-slate-400 mt-2 line-clamp-2">เจาะลึกการประยุกต์ใช้โมเดล 3D BIM ในการบริหารการผลิตและการตัดประกอบโครงสร้างเหล็กในโรงงานแบบไร้รอยต่อ</p>
          </div>
          <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-500">
            <span><i class="fas fa-user-circle text-slate-400 mr-1"></i> เอสที เฟรมแอนด์ทรัส</span>
            <button onclick="playVideo('lE9FgQ_3iSQ', 'ST.FRAME BIM FACTORY', 'กระบวนการทำงานด้วยระบบ 3D BIM เชื่อมโยงสู่โรงงานแปรรูปโครงสร้างเหล็กอยุธยา')" class="text-orange-400 hover:text-orange-300 font-semibold flex items-center gap-1">
              <span>เล่นวิดีโอ</span> <i class="fas fa-arrow-right text-[10px]"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Video 3 -->
      <div class="video-card bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:border-orange-500/80 transition duration-300 flex flex-col group shadow-lg">
        <div class="relative aspect-video overflow-hidden bg-slate-950 cursor-pointer" onclick="playVideo('uNZg6fVNbRY', 'โครงสร้างเหล็ก พระเมรุมาศ พระบาทสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช', 'ผลงานประวัติศาสตร์และความภาคภูมิใจสูงสุดของ ST. Frame & Truss')">
          <img src="https://i.ytimg.com/vi/uNZg6fVNbRY/hqdefault.jpg" alt="โครงสร้างเหล็ก พระเมรุมาศ" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
          <div class="absolute inset-0 bg-slate-950/40 group-hover:bg-slate-950/20 transition flex items-center justify-center">
            <div class="w-14 h-14 rounded-full bg-orange-600/95 group-hover:bg-orange-500 text-white flex items-center justify-center text-xl shadow-xl transform group-hover:scale-110 transition duration-300">
              <i class="fas fa-play ml-1"></i>
            </div>
          </div>
          <span class="absolute top-3 left-3 bg-emerald-600 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">โครงการประวัติศาสตร์</span>
        </div>
        <div class="p-6 flex flex-col justify-between flex-grow space-y-3">
          <div>
            <h3 class="font-bold text-base sm:text-lg text-white font-heading group-hover:text-orange-400 transition leading-snug">โครงสร้างเหล็ก พระเมรุมาศ ร.9</h3>
            <p class="text-xs sm:text-sm text-slate-400 mt-2 line-clamp-2">บันทึกประวัติศาสตร์งานวิศวกรรมโครงสร้างเหล็กพระเมรุมาศ ความภาคภูมิใจสูงสุดของคณะผู้บริหารและพนักงานทุกคน</p>
          </div>
          <div class="pt-3 border-t border-slate-800/80 flex items-center justify-between text-xs text-slate-500">
            <span><i class="fas fa-user-circle text-slate-400 mr-1"></i> เอสที เฟรมแอนด์ทรัส</span>
            <button onclick="playVideo('uNZg6fVNbRY', 'โครงสร้างเหล็ก พระเมรุมาศ พระบาทสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช', 'ผลงานประวัติศาสตร์และความภาคภูมิใจสูงสุดของ ST. Frame & Truss')" class="text-orange-400 hover:text-orange-300 font-semibold flex items-center gap-1">
              <span>เล่นวิดีโอ</span> <i class="fas fa-arrow-right text-[10px]"></i>
            </button>
          </div>
        </div>
      </div>

    </div>

  </div>
</main>

<script>
function playVideo(videoId, title, desc) {
  const iframe = document.getElementById('main-featured-iframe');
  const titleEl = document.getElementById('featured-video-title');
  const descEl = document.getElementById('featured-video-desc');
  const ytBtn = document.getElementById('direct-yt-btn');

  iframe.src = `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0`;
  if (titleEl) titleEl.innerText = title;
  if (descEl) descEl.innerText = desc;
  if (ytBtn) ytBtn.href = `https://www.youtube.com/watch?v=${videoId}`;

  const playerCard = document.getElementById('main-featured-iframe');
  if (playerCard) {
    playerCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
  }
}
</script>

<?php get_footer(); ?>
