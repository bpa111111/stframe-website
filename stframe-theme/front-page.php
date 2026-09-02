<?php
/**
 * The main template file / Front page template
 *
 * @package ST_Frame
 */

get_header(); ?>

<!-- HERO & STATS FULL-VIEWPORT WRAPPER -->
<div class="relative bg-slate-950 text-white min-h-[calc(100vh-108px)] flex flex-col justify-between overflow-hidden">
  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-factory.jpg" alt="ST. Frame & Truss Factory" class="absolute inset-0 w-full h-full object-cover object-center opacity-65 lg:opacity-75 transform filter brightness-105 contrast-105 pointer-events-none">
  <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/75 to-slate-950/20 z-0 pointer-events-none"></div>
  <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-slate-950/30 z-0 pointer-events-none"></div>
  <div class="absolute inset-0 bg-grid-pattern opacity-10 pointer-events-none"></div>
  
  <!-- HERO MAIN CONTENT (Vertically Centered) -->
  <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full my-auto py-6 sm:py-8 lg:py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
      
      <div class="lg:col-span-7 space-y-4">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-800/80 border border-slate-700/80 text-xs font-semibold text-orange-400">
          <span class="w-2.5 h-2.5 rounded-full bg-green-500 beacon-indicator"></span>
          <span>ผู้นำงานโครงสร้างเหล็กมาตรฐานวิศวกรรมสากล • Zero Accident</span>
        </div>

        <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl font-extrabold font-heading text-white tracking-tight leading-tight">
          <span class="block">พลังแห่งโครงสร้างเหล็ก</span>
          <span class="text-orange-400">สร้างสรรค์งานวิศวกรรมระดับชาติ</span>
        </h1>

        <p class="text-sm sm:text-base text-slate-300 max-w-2xl font-light leading-relaxed">
          บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ให้บริการออกแบบ ผลิต และติดตั้งโครงสร้างเหล็กสำหรับโรงงานอุตสาหกรรม คลังสินค้า อาคารขนาดใหญ่ และงานโครงสร้างพิเศษ ด้วยเทคโนโลยี BIM Tekla Structures และเครื่องจักรคุณภาพสูงกว่า 30 ปี
        </p>

        <div class="flex flex-wrap gap-3.5 pt-1">
          <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-semibold px-5 py-2.5 sm:py-3 rounded-lg shadow-lg transition transform hover:-translate-y-0.5 flex items-center gap-2 text-sm">
            <i class="fas fa-building"></i> ชมผลงานโครงการเด่น
          </a>
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="bg-slate-800/90 hover:bg-slate-800 text-slate-200 border border-slate-700 font-semibold px-5 py-2.5 sm:py-3 rounded-lg transition flex items-center gap-2 text-sm">
            <i class="fas fa-cogs text-orange-400"></i> บริการและโซลูชัน
          </a>
        </div>
      </div>

      <!-- Hero Capabilities & Quick Spec Dashboard -->
      <div class="lg:col-span-5">
        <div class="bg-slate-900/85 backdrop-blur-xl rounded-2xl p-5 sm:p-6 border border-slate-700/80 shadow-2xl space-y-3.5 sm:space-y-4">
          
          <div class="flex items-center justify-between border-b border-slate-800 pb-3">
            <div class="flex items-center gap-3">
              <div class="h-9 w-9 bg-white rounded-xl flex items-center justify-center p-1.5 shadow shrink-0">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-icon.png" alt="ST Logo" class="h-full w-auto object-contain">
              </div>
              <div>
                <h3 class="text-white font-bold text-sm sm:text-base font-heading">ศูนย์การผลิตอยุธยา</h3>
                <p class="text-[10px] text-slate-400">Headquarters & Manufacturing Plant</p>
              </div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 text-[10px] font-bold">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
              OPERATIONAL
            </span>
          </div>

          <div class="grid grid-cols-2 gap-2.5">
            <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">กำลังการผลิต</span>
              <span class="text-base sm:text-lg lg:text-xl font-black font-heading text-orange-400">1,500+ <span class="text-xs font-normal text-slate-300">ตัน/เดือน</span></span>
            </div>
            <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">บุคลากรผู้เชี่ยวชาญ</span>
              <span class="text-base sm:text-lg lg:text-xl font-black font-heading text-amber-400">500+ <span class="text-xs font-normal text-slate-300">คน</span></span>
            </div>
            <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">เทคโนโลยี 3D BIM</span>
              <span class="text-xs font-bold text-white flex items-center gap-1 mt-0.5"><i class="fas fa-cube text-blue-400"></i> Tekla Structures</span>
            </div>
            <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
              <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">มาตรฐานการเชื่อม</span>
              <span class="text-xs font-bold text-white flex items-center gap-1 mt-0.5"><i class="fas fa-certificate text-emerald-400"></i> AWS D1.1 / ASNT</span>
            </div>
          </div>

          <div class="pt-2 flex items-center justify-between border-t border-slate-800 text-xs">
            <span class="text-slate-400 text-[11px]">อ.บางปะหัน จ.พระนครศรีอยุธยา</span>
            <a href="<?php echo esc_url( home_url( '/technology/' ) ); ?>" class="text-orange-400 hover:text-orange-300 font-semibold flex items-center gap-1.5 transition text-xs">
              <span>ชมระบบโรงงานและเครื่องจักร</span>
              <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>

  <!-- STATS (Pinned at bottom of fold) -->
  <div class="relative z-20 bg-slate-900/90 backdrop-blur-md border-t border-slate-800/80 text-white py-4 sm:py-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 text-center divide-y md:divide-y-0 md:divide-x divide-slate-800">
        <div class="pt-2 md:pt-0">
          <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-orange-500">30+</div>
          <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5">ปีแห่งประสบการณ์ (ตั้งแต่ 2535)</p>
        </div>
        <div class="pt-2 md:pt-0">
          <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-amber-400">500+</div>
          <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5">ทีมงานและวิศวกรผู้เชี่ยวชาญ</p>
        </div>
        <div class="pt-2 md:pt-0">
          <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-orange-500">1,000+</div>
          <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5">โครงการสำเร็จทั่วประเทศ</p>
        </div>
        <div class="pt-2 md:pt-0">
          <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-emerald-400">ZERO</div>
          <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5">เป้าหมายอุบัติเหตุเป็นศูนย์</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DYNAMIC PROJECTS LOOP FROM WORDPRESS CPT -->
<section class="py-20 bg-slate-900 text-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-end mb-12">
      <div>
        <span class="text-xs text-orange-400 font-bold uppercase tracking-wider">PORTFOLIO</span>
        <h2 class="text-3xl font-extrabold font-heading text-white mt-1">ผลงานโครงการล่าสุด</h2>
      </div>
      <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="text-xs font-semibold text-orange-400 hover:text-orange-300">
        ดูทั้งหมด →
      </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <?php
      $args = array(
        'post_type'      => 'st_project',
        'posts_per_page' => 3,
      );
      $projects_query = new WP_Query( $args );

      if ( $projects_query->have_posts() ) :
        while ( $projects_query->have_posts() ) : $projects_query->the_post();
      ?>
        <div class="steel-card bg-slate-800 rounded-2xl overflow-hidden border border-slate-700">
          <div class="h-52 overflow-hidden relative">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium_large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
            <?php else : ?>
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/projects/royal-cremation.jpg" alt="Royal Cremation" class="w-full h-full object-cover object-center">
            <?php endif; ?>
          </div>
          <div class="p-6 space-y-2">
            <h3 class="text-lg font-bold font-heading text-white"><?php the_title(); ?></h3>
            <p class="text-xs text-slate-400"><?php echo wp_trim_words( get_the_excerpt(), 15 ); ?></p>
            <div class="pt-2">
              <a href="<?php the_permalink(); ?>" class="text-xs font-bold text-orange-400 hover:underline">อ่านรายละเอียด →</a>
            </div>
          </div>
        </div>
      <?php
        endwhile;
        wp_reset_postdata();
      else :
      ?>
        <p class="text-xs text-slate-400 col-span-3">ยังไม่มีข้อมูลโครงการ (สามารถเพิ่มได้ที่เมนู Projects ใน WordPress Admin)</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
