<?php
/**
 * The template for displaying the footer
 *
 * @package ST_Frame
 */
?>
  <!-- GLOBAL FOOTER -->
  <footer class="bg-slate-950 text-slate-400 text-sm border-t border-slate-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
        
        <!-- Col 1: Company Profile -->
        <div class="lg:col-span-2 space-y-4">
          <div class="flex items-center gap-3">
            <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center p-1.5 shadow-md shrink-0">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-icon.png" alt="<?php bloginfo( 'name' ); ?>" class="h-full w-auto object-contain">
            </div>
            <span class="text-lg font-bold text-white font-heading">ST. FRAME & TRUSS CO., LTD.</span>
          </div>
          <p class="text-xs text-slate-400 leading-relaxed">
            บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ผู้เชี่ยวชาญด้านงานออกแบบ ผลิต และติดตั้งโครงสร้างเหล็ก หลังคาโครงถัก และงานวิศวกรรมโครงสร้างครบวงจรตั้งแต่ปี พ.ศ. 2535
          </p>
          <div class="pt-2 text-xs space-y-1.5 text-slate-300">
            <p class="flex items-start gap-1.5"><i class="fas fa-map-marker-alt text-orange-500 w-4 shrink-0 mt-0.5"></i> <span class="leading-relaxed" data-th="29/4, 29/15, 29/14, 29/17 หมู่ 3 ต.โพธิ์สามต้น<br>อ.บางปะหัน จ.พระนครศรีอยุธยา 13220" data-en="29/4, 29/15, 29/14, 29/17 Moo 3, Pho Sam Ton,<br>Bang Pahan, Phra Nakhon Si Ayutthaya 13220, Thailand">29/4, 29/15, 29/14, 29/17 หมู่ 3 ต.โพธิ์สามต้น<br>อ.บางปะหัน จ.พระนครศรีอยุธยา 13220</span></p>
            <p><i class="fas fa-phone text-orange-500 w-4"></i> 035-779-554, 035-779-555</p>
            <p><i class="fas fa-envelope text-orange-500 w-4"></i> stframe_factory@stframe.com</p>
            <p><i class="fas fa-clock text-orange-500 w-4"></i> เวลาทำการ: จันทร์ - เสาร์ 08:00 - 17:00</p>
          </div>
        </div>

        <!-- Col 2: Navigation -->
        <div class="space-y-3">
          <h4 class="text-white font-bold font-heading text-sm uppercase tracking-wider">เมนูหลัก</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-orange-400">หน้าแรก</a></li>
            <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="hover:text-orange-400">เกี่ยวกับเรา</a></li>
            <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-orange-400">บริการและโซลูชัน</a></li>
            <li><a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="hover:text-orange-400">ผลงานโครงการ</a></li>
            <li><a href="<?php echo esc_url( home_url( '/technology/' ) ); ?>" class="hover:text-orange-400">เทคโนโลยีและโรงงาน</a></li>
            <li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>" class="hover:text-orange-400">ร่วมงานกับเรา</a></li>
          </ul>
        </div>

        <!-- Col 3: Services -->
        <div class="space-y-3">
          <h4 class="text-white font-bold font-heading text-sm uppercase tracking-wider">บริการของเรา</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="<?php echo esc_url( home_url( '/services/#bim' ) ); ?>" class="hover:text-orange-400">BIM Tekla Structures</a></li>
            <li><a href="<?php echo esc_url( home_url( '/services/#truss' ) ); ?>" class="hover:text-orange-400">Roof Truss & Super Truss</a></li>
            <li><a href="<?php echo esc_url( home_url( '/services/#cellular' ) ); ?>" class="hover:text-orange-400">Cellular Beam & PEB</a></li>
            <li><a href="<?php echo esc_url( home_url( '/services/#erection' ) ); ?>" class="hover:text-orange-400">Steel Erection & Installation</a></li>
          </ul>
        </div>

        <!-- Col 4: ERP & Policies -->
        <div class="space-y-3">
          <h4 class="text-white font-bold font-heading text-sm uppercase tracking-wider">ระบบและนโยบาย</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="http://202.80.235.61:2026" target="_blank" class="text-orange-400 hover:underline"><i class="fas fa-server mr-1"></i> ERP Internal Portal</a></li>
            <li><a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" class="hover:text-orange-400">ST Magazine</a></li>
          </ul>
        </div>

      </div>

      <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
        <p>© <?php echo date('Y'); ?> ST. Frame & Truss Co., Ltd. All Rights Reserved.</p>
        <div class="flex items-center space-x-4">
          <a href="#" class="hover:text-white"><i class="fab fa-facebook text-base"></i></a>
          <a href="#" class="hover:text-white"><i class="fab fa-line text-base"></i></a>
          <a href="#" class="hover:text-white"><i class="fab fa-youtube text-base"></i></a>
        </div>
      </div>
    </div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>
