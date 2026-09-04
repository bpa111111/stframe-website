<?php
/**
 * Template Name: Front Page
 *
 * @package ST_Frame
 */

get_header(); ?>

</div>

  <main class="flex-grow">
    
    <!-- HERO & KEY STATS FULL-VIEWPORT WRAPPER -->
    <div class="relative bg-slate-950 text-white min-h-[calc(100vh-108px)] flex flex-col justify-between overflow-hidden">
      <!-- Real Factory Background Image - Bright, Vivid & Clear -->
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-factory.jpg" alt="ST. Frame & Truss Factory & Headquarters" class="absolute inset-0 w-full h-full object-cover object-center opacity-65 lg:opacity-75 transform filter brightness-105 contrast-105 pointer-events-none">
      <!-- Directional Gradient: Dark on left behind text, transparent on right to let factory shine brightly -->
      <div class="absolute inset-0 bg-gradient-to-r from-slate-950/95 via-slate-950/75 to-slate-950/20 z-0 pointer-events-none"></div>
      <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-slate-950/30 z-0 pointer-events-none"></div>
      <div class="absolute inset-0 bg-grid-pattern opacity-10 pointer-events-none"></div>
      <div class="absolute -right-40 -top-40 w-96 h-96 bg-orange-600/20 rounded-full blur-3xl pointer-events-none"></div>
      <div class="absolute left-1/3 -bottom-20 w-80 h-80 bg-blue-600/15 rounded-full blur-3xl pointer-events-none"></div>

      <!-- HERO MAIN CONTENT (Vertically Centered in Available Space) -->
      <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full my-auto py-6 sm:py-8 lg:py-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
          
          <!-- Hero Text -->
          <div class="lg:col-span-7 space-y-4 lg:space-y-4">
            
            <!-- Quality & Safety Beacon -->
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-slate-800/80 border border-slate-700/80 text-xs font-semibold text-orange-400 whitespace-nowrap">
              <span class="w-2.5 h-2.5 rounded-full bg-green-500 beacon-indicator shrink-0"></span>
              <span data-th="ผู้นำงานโครงสร้างเหล็กมาตรฐานวิศวกรรมสากล • Zero Accident" data-en="Leading Steel Structure Specialist • Zero Accident Commitment">ผู้นำงานโครงสร้างเหล็กมาตรฐานวิศวกรรมสากล • Zero Accident</span>
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-4xl xl:text-5xl font-extrabold font-heading text-white tracking-tight leading-tight">
              <span class="block" data-th="พลังแห่งโครงสร้างเหล็ก" data-en="Strength in Steel Structure">พลังแห่งโครงสร้างเหล็ก</span>
              <span class="text-orange-400" data-th="สร้างสรรค์งานวิศวกรรมระดับชาติ" data-en="Engineering National Landmarks">สร้างสรรค์งานวิศวกรรมระดับชาติ</span>
            </h1>

            <p class="text-sm sm:text-base text-slate-300 max-w-2xl font-light leading-relaxed" data-th="บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ให้บริการออกแบบ ผลิต และติดตั้งโครงสร้างเหล็กสำหรับโรงงานอุตสาหกรรม คลังสินค้า อาคารขนาดใหญ่ และงานโครงสร้างพิเศษ ด้วยเทคโนโลยี BIM Tekla Structures และเครื่องจักรคุณภาพสูงกว่า 30 ปี" data-en="ST. Frame & Truss Co., Ltd. provides comprehensive design, fabrication, and erection of steel structures for industrial plants, mega warehouses, and commercial landmarks with advanced BIM Tekla technology and over 30 years of proven expertise.">
              บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ให้บริการออกแบบ ผลิต และติดตั้งโครงสร้างเหล็กสำหรับโรงงานอุตสาหกรรม คลังสินค้า อาคารขนาดใหญ่ และงานโครงสร้างพิเศษ ด้วยเทคโนโลยี BIM Tekla Structures และเครื่องจักรคุณภาพสูงกว่า 30 ปี
            </p>

            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-3.5 pt-1">
              <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-semibold px-5 py-2.5 sm:py-3 rounded-lg shadow-lg hover:shadow-orange-500/25 transition transform hover:-translate-y-0.5 flex items-center gap-2 text-sm whitespace-nowrap">
                <i class="fas fa-building"></i>
                <span data-th="ชมผลงานโครงการเด่น" data-en="Explore Our Projects">ชมผลงานโครงการเด่น</span>
              </a>
              <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="bg-slate-800/90 hover:bg-slate-800 text-slate-200 hover:text-white border border-slate-700 font-semibold px-5 py-2.5 sm:py-3 rounded-lg transition flex items-center gap-2 text-sm whitespace-nowrap">
                <i class="fas fa-cogs text-orange-400"></i>
                <span data-th="บริการและโซลูชัน" data-en="Our Services">บริการและโซลูชัน</span>
              </a>
            </div>

            <!-- Highlights Checklist -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-3.5 border-t border-slate-800 text-xs text-slate-300">
              <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-orange-500 shrink-0"></i>
                <span data-th="BIM Tekla 3D Model" data-en="BIM Tekla 3D Model">BIM Tekla 3D Model</span>
              </div>
              <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-orange-500"></i>
                <span data-th="โรงงานอยุธยา 500+ บุคลากร" data-en="Ayutthaya Plant & 500+ Staff">โรงงานอยุธยา 500+ บุคลากร</span>
              </div>
              <div class="flex items-center gap-2">
                <i class="fas fa-check-circle text-orange-500"></i>
                <span data-th="ควบคุมงานด้วยระบบ ERP" data-en="ERP-Driven Quality Control">ควบคุมงานด้วยระบบ ERP</span>
              </div>
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
                    <h3 class="text-white font-bold text-sm sm:text-base font-heading" data-th="ศูนย์การผลิตอยุธยา" data-en="Ayutthaya Plant">ศูนย์การผลิตอยุธยา</h3>
                    <p class="text-[10px] text-slate-400" data-th="โรงงานและสำนักงานใหญ่" data-en="Headquarters & Manufacturing Plant">โรงงานและสำนักงานใหญ่</p>
                  </div>
                </div>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 text-emerald-400 text-[10px] font-bold whitespace-nowrap">
                  <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                  OPERATIONAL
                </span>
              </div>

              <!-- Quick Spec Grid -->
              <div class="grid grid-cols-2 gap-2.5">
                <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
                  <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block" data-th="กำลังการผลิต" data-en="Capacity">กำลังการผลิต</span>
                  <span class="text-base sm:text-lg lg:text-xl font-black font-heading text-orange-400 whitespace-nowrap">1,500+ <span class="text-xs font-normal text-slate-300" data-th="ตัน/เดือน" data-en="Tons/Mo">ตัน/เดือน</span></span>
                </div>
                <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
                  <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block" data-th="บุคลากรผู้เชี่ยวชาญ" data-en="Workforce">บุคลากรผู้เชี่ยวชาญ</span>
                  <span class="text-base sm:text-lg lg:text-xl font-black font-heading text-amber-400 whitespace-nowrap">500+ <span class="text-xs font-normal text-slate-300" data-th="คน" data-en="Staff">คน</span></span>
                </div>
                <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
                  <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block" data-th="เทคโนโลยี 3D BIM" data-en="BIM Technology">เทคโนโลยี 3D BIM</span>
                  <span class="text-xs font-bold text-white flex items-center gap-1 mt-0.5"><i class="fas fa-cube text-blue-400"></i> Tekla Structures</span>
                </div>
                <div class="p-2.5 sm:p-3 bg-slate-800/60 rounded-xl border border-slate-700/60">
                  <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block" data-th="มาตรฐานการเชื่อม" data-en="Welding Standard">มาตรฐานการเชื่อม</span>
                  <span class="text-xs font-bold text-white flex items-center gap-1 mt-0.5"><i class="fas fa-certificate text-emerald-400"></i> AWS D1.1 / ASNT</span>
                </div>
              </div>

              <!-- Action Link -->
              <div class="pt-2 flex items-center justify-between border-t border-slate-800 text-xs">
                <span class="text-slate-400 text-[11px]" data-th="อ.บางปะหัน จ.พระนครศรีอยุธยา" data-en="Bang Pahan, Ayutthaya">อ.บางปะหัน จ.พระนครศรีอยุธยา</span>
                <a href="<?php echo esc_url( home_url( '/technology/' ) ); ?>" class="text-orange-400 hover:text-orange-300 font-semibold flex items-center gap-1.5 transition text-xs">
                  <span data-th="ชมระบบโรงงานและเครื่องจักร" data-en="Explore Facilities">ชมระบบโรงงานและเครื่องจักร</span>
                  <i class="fas fa-arrow-right text-[10px]"></i>
                </a>
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- KEY STATS SECTION (Pinned at bottom of the initial 100vh fold) -->
      <div class="relative z-20 bg-slate-900/90 backdrop-blur-md border-t border-slate-800/80 text-white py-4 sm:py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 text-center divide-y md:divide-y-0 md:divide-x divide-slate-800">
            
            <div class="pt-2 md:pt-0">
              <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-orange-500 tracking-tight">
                <span class="counter-val" data-target="30">0</span>+
              </div>
              <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5 font-medium" data-th="ปีแห่งประสบการณ์ (ตั้งแต่ 2535)" data-en="Years of Excellence (Since 1992)">ปีแห่งประสบการณ์ (ตั้งแต่ 2535)</p>
            </div>

            <div class="pt-2 md:pt-0">
              <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-amber-400 tracking-tight">
                <span class="counter-val" data-target="500">0</span>+
              </div>
              <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5 font-medium" data-th="ทีมงานและวิศวกรผู้เชี่ยวชาญ" data-en="Engineers & Skilled Workforce">ทีมงานและวิศวกรผู้เชี่ยวชาญ</p>
            </div>

            <div class="pt-2 md:pt-0">
              <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-orange-500 tracking-tight">
                <span class="counter-val" data-target="1000">0</span>+
              </div>
              <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5 font-medium" data-th="โครงการสำเร็จทั่วประเทศ" data-en="Completed Projects Nationwide">โครงการสำเร็จทั่วประเทศ</p>
            </div>

            <div class="pt-2 md:pt-0">
              <div class="text-2xl sm:text-3xl lg:text-4xl font-black font-heading text-emerald-400 tracking-tight flex items-center justify-center gap-1">
                <span>ZERO</span>
              </div>
              <p class="text-[11px] sm:text-xs lg:text-sm text-slate-300 mt-0.5 font-medium" data-th="เป้าหมายอุบัติเหตุเป็นศูนย์ (Zero Accident)" data-en="Zero Accident Standard">เป้าหมายอุบัติเหตุเป็นศูนย์ (Zero Accident)</p>
            </div>

          </div>
        </div>
      </div>

    </div>

    <!-- ABOUT SUMMARY SECTION -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          
          <!-- Image Collage Placeholder -->
          <div class="lg:col-span-6 relative">
            <div class="relative z-10 rounded-2xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 h-80 sm:h-96 flex flex-col items-center justify-center text-slate-400 text-center p-6 shadow-sm">
              <div class="w-16 h-16 rounded-full bg-slate-200/80 flex items-center justify-center text-slate-400 mb-3 text-2xl">
                <i class="fas fa-industry"></i>
              </div>
              <span class="text-sm font-semibold text-slate-600" data-th="พื้นที่สำหรับภาพถ่ายโรงงาน / สำนักงานใหญ่" data-en="Factory & Headquarters Photo Placeholder">พื้นที่สำหรับภาพถ่ายโรงงาน / สำนักงานใหญ่</span>
              <span class="text-xs text-slate-400 mt-1" data-th="ขนาดแนะนำ: 1200 x 800 px (อัตราส่วน 3:2 หรือ 16:9)" data-en="Recommended: 1200 x 800 px (3:2 or 16:9)">ขนาดแนะนำ: 1200 x 800 px (อัตราส่วน 3:2 หรือ 16:9)</span>
            </div>
            <div class="hidden sm:flex absolute -bottom-6 -right-6 w-52 h-36 rounded-xl overflow-hidden bg-white border-2 border-dashed border-slate-300 shadow-xl z-20 flex-col items-center justify-center text-slate-400 text-center p-3">
              <i class="fas fa-image text-2xl mb-1 text-slate-300"></i>
              <span class="text-[11px] font-medium text-slate-500" data-th="ภาพประกอบโครงการ / กิจกรรม" data-en="Project / Activity Photo">ภาพประกอบโครงการ / กิจกรรม</span>
            </div>
            <div class="absolute -top-6 -left-6 w-32 h-32 bg-orange-100/60 rounded-2xl -z-0"></div>
          </div>

          <!-- Content -->
          <div class="lg:col-span-6 space-y-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-50 border border-orange-200 text-xs font-semibold text-orange-600 whitespace-nowrap">
              <i class="fas fa-shield-alt"></i> <span data-th="เกี่ยวกับเรา • ST. FRAME & TRUSS" data-en="About Us • ST. FRAME & TRUSS">เกี่ยวกับเรา • ST. FRAME & TRUSS</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
              <span class="block" data-th="มาตรฐานงานโครงสร้างเหล็กระดับพรีเมียม" data-en="Premium Engineering Standard">มาตรฐานงานโครงสร้างเหล็กระดับพรีเมียม</span>
              <span class="text-orange-600" data-th="ในราคาที่แข่งขันได้และส่งมอบตรงเวลา" data-en="Competitive Pricing & On-Time Delivery">ในราคาที่แข่งขันได้และส่งมอบตรงเวลา</span>
            </h2>

            <p class="text-slate-600 leading-relaxed" data-th="บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ก่อตั้งเมื่อปี พ.ศ. 2535 ดำเนินธุรกิจผู้รับเหมาและโรงงานผลิตโครงสร้างเหล็กชั้นนำสำหรับโรงงานอุตสาหกรรม คลังสินค้า ศูนย์การค้า อาคารสำนักงานขนาดใหญ่ และโครงสร้างเฉพาะทาง โดยมีโรงงานตั้งอยู่ที่อำเภอบางปะหัน จังหวัดพระนครศรีอยุธยา" data-en="Established in 1992, ST. Frame & Truss Co., Ltd. is a leading steel structure contractor and fabricator specializing in industrial plants, warehouses, commercial complexes, and specialized civil structures. Our modern fabrication plant is strategically located in Ayutthaya.">
              บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ก่อตั้งเมื่อปี พ.ศ. 2535 ดำเนินธุรกิจผู้รับเหมาและโรงงานผลิตโครงสร้างเหล็กชั้นนำสำหรับโรงงานอุตสาหกรรม คลังสินค้า ศูนย์การค้า อาคารสำนักงานขนาดใหญ่ และโครงสร้างเฉพาะทาง โดยมีโรงงานตั้งอยู่ที่อำเภอบางปะหัน จังหวัดพระนครศรีอยุธยา
            </p>

            <blockquote class="p-4 bg-slate-50 border border-slate-200 rounded-r-lg text-slate-700 italic text-sm">
              <span data-th="“มุ่งมั่นส่งมอบผลงานคุณภาพสูงสุดตามหลักวิศวกรรมสากล ในราคาที่คุ้มค่าที่สุด พร้อมความปลอดภัย Zero Accident ในทุกขั้นตอน”" data-en="“Providing customers with the highest quality standards at the most competitive prices, with Zero Accident safety commitment.”">“มุ่งมั่นส่งมอบผลงานคุณภาพสูงสุดตามหลักวิศวกรรมสากล ในราคาที่คุ้มค่าที่สุด พร้อมความปลอดภัย Zero Accident ในทุกขั้นตอน”</span>
            </blockquote>

            <div class="grid grid-cols-2 gap-4 pt-2">
              <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                <div class="w-8 h-8 rounded-lg bg-orange-600 text-white flex items-center justify-center mb-2">
                  <i class="fas fa-award"></i>
                </div>
                <h4 class="font-bold text-slate-900 font-heading text-sm" data-th="มาตรฐานอุตสาหกรรม" data-en="Certified Quality">มาตรฐานอุตสาหกรรม</h4>
                <p class="text-xs text-slate-500 mt-1" data-th="ช่างเชื่อมและวิศวกรผ่านการรับรองมาตรฐานสากล" data-en="Certified welders & engineering quality control">ช่างเชื่อมและวิศวกรผ่านการรับรองมาตรฐานสากล</p>
              </div>

              <div class="p-4 rounded-xl bg-slate-50 border border-slate-100">
                <div class="w-8 h-8 rounded-lg bg-slate-900 text-white flex items-center justify-center mb-2">
                  <i class="fas fa-laptop-code"></i>
                </div>
                <h4 class="font-bold text-slate-900 font-heading text-sm" data-th="Tekla BIM 3D" data-en="Tekla BIM 3D">Tekla BIM 3D</h4>
                <p class="text-xs text-slate-500 mt-1" data-th="ออกแบบและถอดแบบแม่นยำ ไร้ข้อผิดพลาด" data-en="Zero-clash digital design and fabrication modeling">ออกแบบและถอดแบบแม่นยำ ไร้ข้อผิดพลาด</p>
              </div>
            </div>

            <div class="pt-2">
              <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="inline-flex items-center gap-2 font-semibold text-orange-600 hover:text-orange-700">
                <span data-th="อ่านประวัติและวิสัยทัศน์องค์กรเพิ่มเติม" data-en="Read More About Us">อ่านประวัติและวิสัยทัศน์องค์กรเพิ่มเติม</span>
                <i class="fas fa-arrow-right text-xs"></i>
              </a>
            </div>

          </div>

        </div>
      </div>
    </section>

    <!-- CORE SERVICES & SOLUTIONS -->
    <section class="py-20 bg-slate-100 border-t border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-100 text-orange-600 text-xs font-semibold whitespace-nowrap">
            <i class="fas fa-tools"></i> <span data-th="บริการและโซลูชันครบวงจร" data-en="Service Solutions">บริการและโซลูชันครบวงจร</span>
          </div>
          <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 tracking-tight" data-th="ความเชี่ยวชาญด้านวิศวกรรมโครงสร้างเหล็ก" data-en="Comprehensive Steel Engineering Solutions">
            ความเชี่ยวชาญด้านวิศวกรรมโครงสร้างเหล็ก
          </h2>
          <p class="text-slate-600 text-sm sm:text-base" data-th="พร้อมตอบสนองทุกโจทย์ความต้องการของโครงการขนาดใหญ่ ด้วยนวัตกรรมที่ล้ำสมัยและทีมงานผู้เชี่ยวชาญ" data-en="Delivering turnkey engineering excellence for complex industrial and architectural requirements.">
            พร้อมตอบสนองทุกโจทย์ความต้องการของโครงการขนาดใหญ่ ด้วยนวัตกรรมที่ล้ำสมัยและทีมงานผู้เชี่ยวชาญ
          </p>
        </div>

        <!-- Services Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          
          <!-- Service 1 -->
          <div class="steel-card bg-white rounded-2xl p-6 flex flex-col justify-between shadow-sm">
            <div>
              <div class="w-14 h-14 rounded-xl bg-orange-500/10 text-orange-600 flex items-center justify-center text-2xl mb-5">
                <i class="fas fa-drafting-compass"></i>
              </div>
              <h3 class="text-xl font-bold font-heading text-slate-900 mb-2" data-th="ENGINEER DESIGN & BIM" data-en="ENGINEER DESIGN & BIM">ENGINEER DESIGN & BIM</h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed" data-th="ออกแบบโครงสร้างด้วยระบบ Tekla Structures BIM ให้ความแม่นยำสูง เชื่อมโยงข้อมูล 3 มิติ ตรวจสอบการชน (Clash Detection) ก่อนการผลิตจริง" data-en="3D Building Information Modeling (BIM) with Tekla Structures for error-free fabrication and seamless site assembly.">
                ออกแบบโครงสร้างด้วยระบบ Tekla Structures BIM ให้ความแม่นยำสูง เชื่อมโยงข้อมูล 3 มิติ ตรวจสอบการชน (Clash Detection) ก่อนการผลิตจริง
              </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/#bim' ) ); ?>" class="mt-6 text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1">
              <span data-th="รายละเอียดเพิ่มเติม" data-en="Learn More">รายละเอียดเพิ่มเติม</span> <i class="fas fa-chevron-right text-[10px]"></i>
            </a>
          </div>

          <!-- Service 2 -->
          <div class="steel-card bg-white rounded-2xl p-6 flex flex-col justify-between shadow-sm">
            <div>
              <div class="w-14 h-14 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-2xl mb-5">
                <i class="fas fa-network-wired"></i>
              </div>
              <h3 class="text-xl font-bold font-heading text-slate-900 mb-2" data-th="ROOF TRUSS & SUPER TRUSS" data-en="ROOF TRUSS & SUPER TRUSS">ROOF TRUSS & SUPER TRUSS</h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed" data-th="ผลิตและติดตั้งหลังคาโครงถักช่วงกว้างพิเศษ (Long Span) สำหรับศูนย์ประชุม สนามกีฬา และอาคารขนาดใหญ่ที่ต้องการพื้นที่ไร้เสากลาง" data-en="Long-span Roof Truss & Super Truss systems designed for mega convention centers, stadiums, and column-free spaces.">
                ผลิตและติดตั้งหลังคาโครงถักช่วงกว้างพิเศษ (Long Span) สำหรับศูนย์ประชุม สนามกีฬา และอาคารขนาดใหญ่ที่ต้องการพื้นที่ไร้เสากลาง
              </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/#truss' ) ); ?>" class="mt-6 text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1">
              <span data-th="รายละเอียดเพิ่มเติม" data-en="Learn More">รายละเอียดเพิ่มเติม</span> <i class="fas fa-chevron-right text-[10px]"></i>
            </a>
          </div>

          <!-- Service 3 -->
          <div class="steel-card bg-white rounded-2xl p-6 flex flex-col justify-between shadow-sm">
            <div>
              <div class="w-14 h-14 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center text-2xl mb-5">
                <i class="fas fa-layer-group"></i>
              </div>
              <h3 class="text-xl font-bold font-heading text-slate-900 mb-2" data-th="CELLULAR BEAM & PEB" data-en="CELLULAR BEAM & PEB">CELLULAR BEAM & PEB</h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed" data-th="คานฉลุรูรับน้ำหนักสูง ลดน้ำหนักโครงสร้าง เพิ่มความสวยงามทางสถาปัตยกรรม และโครงสร้าง Pre-Engineered Building คุณภาพสูง" data-en="High-strength lightweight Cellular Beams and Pre-Engineered Buildings optimizing architectural aesthetics and cost efficiency.">
                คานฉลุรูรับน้ำหนักสูง ลดน้ำหนักโครงสร้าง เพิ่มความสวยงามทางสถาปัตยกรรม และโครงสร้าง Pre-Engineered Building คุณภาพสูง
              </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/#cellular' ) ); ?>" class="mt-6 text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1">
              <span data-th="รายละเอียดเพิ่มเติม" data-en="Learn More">รายละเอียดเพิ่มเติม</span> <i class="fas fa-chevron-right text-[10px]"></i>
            </a>
          </div>

          <!-- Service 4 -->
          <div class="steel-card bg-white rounded-2xl p-6 flex flex-col justify-between shadow-sm">
            <div>
              <div class="w-14 h-14 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-2xl mb-5">
                <i class="fas fa-hard-hat"></i>
              </div>
              <h3 class="text-xl font-bold font-heading text-slate-900 mb-2" data-th="STEEL FABRICATION & ERECTION" data-en="FABRICATION & ERECTION">FABRICATION & ERECTION</h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed" data-th="งานแปรรูปโครงสร้างเหล็กหนัก ชิ้นส่วน Built-up คาน เสา และงานติดตั้งโครงสร้างหน้างานโดยทีมช่างมืออาชีพพร้อมมาตรฐานความปลอดภัยสูงสุด" data-en="Heavy steel fabrication, built-up columns, crane girders, and turnkey on-site erection by certified engineering teams.">
                งานแปรรูปโครงสร้างเหล็กหนัก ชิ้นส่วน Built-up คาน เสา และงานติดตั้งโครงสร้างหน้างานโดยทีมช่างมืออาชีพพร้อมมาตรฐานความปลอดภัยสูงสุด
              </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/services/#erection' ) ); ?>" class="mt-6 text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1">
              <span data-th="รายละเอียดเพิ่มเติม" data-en="Learn More">รายละเอียดเพิ่มเติม</span> <i class="fas fa-chevron-right text-[10px]"></i>
            </a>
          </div>

        </div>

      </div>
    </section>

    <!-- FEATURED PROJECTS SHOWCASE -->
    <section class="py-20 bg-slate-900 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header with View All Link -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
          <div>
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-500/20 text-orange-400 text-xs font-semibold mb-2 whitespace-nowrap">
              <i class="fas fa-trophy"></i> <span data-th="ผลงานโครงการระดับพรีเมียม" data-en="Signature Project Portfolio">ผลงานโครงการระดับพรีเมียม</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-white tracking-tight" data-th="โครงการอ้างอิงและผลงานที่ภาคภูมิใจ" data-en="National Landmarks & Industrial Projects">
              โครงการอ้างอิงและผลงานที่ภาคภูมิใจ
            </h2>
          </div>
          <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="inline-flex items-center gap-2 text-sm font-semibold text-orange-400 hover:text-orange-300">
            <span data-th="ดูโครงการทั้งหมด (40+ โครงการ)" data-en="View All Projects (40+ Projects)">ดูโครงการทั้งหมด (40+ โครงการ)</span>
            <i class="fas fa-arrow-right text-xs"></i>
          </a>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          
          <!-- Project 1: Royal Cremation -->
          <div class="steel-card bg-slate-800/80 rounded-2xl overflow-hidden border border-slate-700/80 group">
            <div class="project-card-image-wrap h-56 relative overflow-hidden">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/projects/royal-cremation.jpg" alt="พระเมรุมาศ รัชกาลที่ ๙" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 ease-out" loading="lazy" decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
              <div class="absolute top-4 left-4">
                <span class="bg-amber-600 text-white text-xs font-bold px-2.5 py-1 rounded-md shadow whitespace-nowrap">Landmark 2017</span>
              </div>
            </div>
            <div class="p-6 space-y-3">
              <div class="text-xs text-orange-400 font-medium" data-th="กรมศิลปากร / The Fine Arts Department" data-en="The Fine Arts Department">กรมศิลปากร / The Fine Arts Department</div>
              <h3 class="text-lg font-bold font-heading text-white group-hover:text-orange-400 transition" data-th="พระเมรุมาศ รัชกาลที่ ๙" data-en="The Royal Cremation Ceremony">พระเมรุมาศ รัชกาลที่ ๙</h3>
              <p class="text-slate-400 text-xs line-clamp-2" data-th="งานโครงสร้างเหล็กพระเมรุมาศ เสา คาน สะพานเชื่อม และโครงสร้างหอเปลว ท้องสนามหลวง" data-en="Steel structural works for the main royal crematorium columns, tie beams, and ceremonial towers.">
                งานโครงสร้างเหล็กพระเมรุมาศ เสา คาน สะพานเชื่อม และโครงสร้างหอเปลว ท้องสนามหลวง
              </p>
              <div class="pt-2 flex justify-between items-center text-xs text-slate-400 border-t border-slate-700/60">
                <div class="flex items-start gap-1.5 min-w-0 pr-2">
                  <i class="fas fa-map-marker-alt text-orange-500 shrink-0 mt-0.5 text-xs"></i>
                  <span class="text-xs text-slate-400 leading-snug" data-th="สนามหลวง กรุงเทพฯ" data-en="Sanam Luang, Bangkok">สนามหลวง กรุงเทพฯ</span>
                </div>
                <span class="text-orange-400 font-semibold whitespace-nowrap"><span data-th="เสร็จสมบูรณ์ 2017" data-en="Completed 2017">เสร็จสมบูรณ์ 2017</span></span>
              </div>
            </div>
          </div>

          <!-- Project 2: QSNCC -->
          <div class="steel-card bg-slate-800/80 rounded-2xl overflow-hidden border border-slate-700/80 group">
            <div class="project-card-image-wrap h-56 relative overflow-hidden">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/projects/qsncc.jpg" alt="ศูนย์การประชุมแห่งชาติสิริกิติ์ QSNCC" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 ease-out" loading="lazy" decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
              <div class="absolute top-4 left-4">
                <span class="bg-orange-600 text-white text-xs font-bold px-2.5 py-1 rounded-md shadow whitespace-nowrap">Super Truss 2021</span>
              </div>
            </div>
            <div class="p-6 space-y-3">
              <div class="text-xs text-orange-400 font-medium">THAI OBAYASHI</div>
              <h3 class="text-lg font-bold font-heading text-white group-hover:text-orange-400 transition" data-th="<span class='whitespace-nowrap'>ศูนย์การประชุมแห่งชาติสิริกิติ์</span><br>(QSNCC)" data-en="Queen Sirikit National Convention Center"><span class="whitespace-nowrap">ศูนย์การประชุมแห่งชาติสิริกิติ์</span><br>(QSNCC)</h3>
              <p class="text-slate-400 text-xs line-clamp-2" data-th="ระบบโครงสร้างหลังคา Super Truss & Side Truss ช่วงกว้างพิเศษเพื่อพื้นที่ไร้เสากลาง" data-en="Roof structural system (Super Truss & Side Truss) for massive column-free convention halls.">
                ระบบโครงสร้างหลังคา Super Truss & Side Truss ช่วงกว้างพิเศษเพื่อพื้นที่ไร้เสากลาง
              </p>
              <div class="pt-2 flex justify-between items-center text-xs text-slate-400 border-t border-slate-700/60">
                <div class="flex items-start gap-1.5 min-w-0 pr-2">
                  <i class="fas fa-map-marker-alt text-orange-500 shrink-0 mt-0.5 text-xs"></i>
                  <span class="text-xs text-slate-400 leading-snug" data-th="คลองเตย กรุงเทพฯ" data-en="Khlong Toei, Bangkok">คลองเตย กรุงเทพฯ</span>
                </div>
                <span class="text-orange-400 font-semibold whitespace-nowrap"><span data-th="เสร็จสมบูรณ์ 2021" data-en="Completed 2021">เสร็จสมบูรณ์ 2021</span></span>
              </div>
            </div>
          </div>

          <!-- Project 3: Western Digital -->
          <div class="steel-card bg-slate-800/80 rounded-2xl overflow-hidden border border-slate-700/80 group">
            <div class="project-card-image-wrap h-56 relative overflow-hidden">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/projects/western-digital.jpg" alt="WESTERN DIGITAL PRB Plant" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 ease-out" loading="lazy" decoding="async">
              <div class="absolute inset-0 bg-gradient-to-t from-slate-950/60 via-transparent to-transparent"></div>
              <div class="absolute top-4 left-4">
                <span class="bg-blue-600 text-white text-xs font-bold px-2.5 py-1 rounded-md shadow whitespace-nowrap">Industrial Plant 2021</span>
              </div>
            </div>
            <div class="p-6 space-y-3">
              <div class="text-xs text-orange-400 font-medium">THAI TAKENAKA</div>
              <h3 class="text-lg font-bold font-heading text-white group-hover:text-orange-400 transition" data-th="WESTERN DIGITAL (PRB New Production)" data-en="WESTERN DIGITAL PRB Plant">WESTERN DIGITAL (PRB New Production)</h3>
              <p class="text-slate-400 text-xs line-clamp-2" data-th="งานโครงสร้างเหล็ก Built-up Columns, Truss Floor และ Cladding Support อาคารโรงงานผลิตใหม่" data-en="Steel structure works including built-up steel columns and truss floor systems for modern clean manufacturing.">
                งานโครงสร้างเหล็ก Built-up Columns, Truss Floor และ Cladding Support อาคารโรงงานผลิตใหม่
              </p>
              <div class="pt-2 flex justify-between items-center text-xs text-slate-400 border-t border-slate-700/60">
                <div class="flex items-start gap-1.5 min-w-0 pr-2">
                  <i class="fas fa-map-marker-alt text-orange-500 shrink-0 mt-0.5 text-xs"></i>
                  <span class="text-xs text-slate-400 leading-snug" data-th="นิคมฯ 304 ปราจีนบุรี" data-en="304 Industrial Park, Prachinburi">นิคมฯ 304 ปราจีนบุรี</span>
                </div>
                <span class="text-orange-400 font-semibold whitespace-nowrap"><span data-th="เสร็จสมบูรณ์ 2021" data-en="Completed 2021">เสร็จสมบูรณ์ 2021</span></span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- TECHNOLOGY & TEKLA BIM SECTION -->
    <section class="py-20 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          
          <div class="lg:col-span-6 space-y-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-slate-900 text-orange-400 text-xs font-semibold whitespace-nowrap">
              <i class="fas fa-cubes"></i> <span data-th="เทคโนโลยีและนวัตกรรมการผลิต" data-en="Technology & BIM Integration">เทคโนโลยีและนวัตกรรมการผลิต</span>
            </div>

            <h2 class="text-3xl sm:text-4xl font-extrabold font-heading text-slate-900 tracking-tight leading-snug">
              <span class="block" data-th="ยกระดับงานก่อสร้างด้วย" data-en="Transforming Construction With">ยกระดับงานก่อสร้างด้วย</span>
              <span class="text-orange-600" data-th="Tekla BIM 3D & ระบบ ERP อัจฉริยะ" data-en="Tekla BIM 3D & Advanced ERP System">Tekla BIM 3D & ระบบ ERP อัจฉริยะ</span>
            </h2>

            <p class="text-slate-600 text-sm sm:text-base leading-relaxed" data-th="เรานำระบบ Building Information Modeling (BIM) ระดับสากลมาใช้จำลองโมเดลโครงสร้าง 3 มิติอย่างละเอียดทุกรอยต่อ พร้อมทั้งเชื่อมโยงงานผลิต การจัดซื้อ และการขนส่งด้วยระบบ ERP ครบวงจร ทำให้การควบคุมต้นทุนและระยะเวลาเป็นไปอย่างมีประสิทธิภาพสูงสุด" data-en="We utilize Tekla Structures BIM for high-fidelity 3D modeling, clash detection, and shop drawing automation, tightly connected to our Enterprise Resource Planning (ERP) platform for seamless production tracking.">
              เรานำระบบ Building Information Modeling (BIM) ระดับสากลมาใช้จำลองโมเดลโครงสร้าง 3 มิติอย่างละเอียดทุกรอยต่อ พร้อมทั้งเชื่อมโยงงานผลิต การจัดซื้อ และการขนส่งด้วยระบบ ERP ครบวงจร ทำให้การควบคุมต้นทุนและระยะเวลาเป็นไปอย่างมีประสิทธิภาพสูงสุด
            </p>

            <div class="space-y-4 pt-2">
              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0 font-bold">01</div>
                <div>
                  <h4 class="font-bold text-slate-900 font-heading text-sm" data-th="ความแม่นยำระดับมิลลิเมตร (Zero-Clash Tolerance)" data-en="Zero-Clash Tolerance Accuracy">ความแม่นยำระดับมิลลิเมตร (Zero-Clash Tolerance)</h4>
                  <p class="text-xs text-slate-500 mt-0.5" data-th="ตรวจสอบข้อขัดแย้งของโครงสร้างตั้งแต่ขั้นตอนคอมพิวเตอร์ ลดความผิดพลาดหน้างาน 100%" data-en="Detect spatial conflicts in advance to eliminate on-site rework completely.">ตรวจสอบข้อขัดแย้งของโครงสร้างตั้งแต่ขั้นตอนคอมพิวเตอร์ ลดความผิดพลาดหน้างาน 100%</p>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0 font-bold">02</div>
                <div>
                  <h4 class="font-bold text-slate-900 font-heading text-sm" data-th="ERP Real-Time Tracking" data-en="ERP Real-Time Tracking">ERP Real-Time Tracking</h4>
                  <p class="text-xs text-slate-500 mt-0.5" data-th="ติดตามสถานะการตัด เชื่อม พ่นสี และส่งมอบชิ้นส่วนเหล็กได้แบบเรียลไทม์" data-en="Monitor fabrication, sandblasting, painting, and site delivery status in real-time.">ติดตามสถานะการตัด เชื่อม พ่นสี และส่งมอบชิ้นส่วนเหล็กได้แบบเรียลไทม์</p>
                </div>
              </div>

              <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0 font-bold">03</div>
                <div>
                  <h4 class="font-bold text-slate-900 font-heading text-sm" data-th="เครื่องจักรโรงงานสมรรถนะสูง" data-en="High-Performance CNC Machinery">เครื่องจักรโรงงานสมรรถนะสูง</h4>
                  <p class="text-xs text-slate-500 mt-0.5" data-th="เครื่องตัด CNC อัตโนมัติ เครื่องดัด และแท่นประกอบคาน Built-up ในโรงงานอยุธยา" data-en="Automated CNC cutting, drilling, and submerged arc welding lines in Ayutthaya.">เครื่องตัด CNC อัตโนมัติ เครื่องดัด และแท่นประกอบคาน Built-up ในโรงงานอยุธยา</p>
                </div>
              </div>
            </div>

            <div class="pt-2">
              <a href="<?php echo esc_url( home_url( '/technology/' ) ); ?>" class="inline-flex items-center gap-2 font-semibold text-orange-600 hover:text-orange-700">
                <span data-th="ชมเทคโนโลยีและภาพโรงงานเพิ่มเติม" data-en="Explore Tech & Machinery">ชมเทคโนโลยีและภาพโรงงานเพิ่มเติม</span>
                <i class="fas fa-arrow-right text-xs"></i>
              </a>
            </div>

          </div>

          <div class="lg:col-span-6">
            <div class="bg-slate-950 p-6 sm:p-8 rounded-3xl border border-slate-800 shadow-2xl relative overflow-hidden text-white">
              <div class="absolute top-0 right-0 w-64 h-64 bg-orange-600/10 rounded-full blur-2xl"></div>
              
              <div class="flex items-center justify-between pb-6 border-b border-slate-800">
                <div class="flex items-center gap-2">
                  <i class="fas fa-microchip text-orange-500"></i>
                  <span class="font-bold text-sm font-heading">DIGITAL ENGINEERING WORKFLOW</span>
                </div>
                <span class="text-[10px] bg-slate-800 text-slate-300 px-2 py-1 rounded">ISO Standards</span>
              </div>

              <div class="grid grid-cols-2 gap-4 my-6 text-center">
                <div class="p-4 bg-slate-900/80 rounded-xl border border-slate-800">
                  <i class="fas fa-cubes text-2xl text-orange-400 mb-2"></i>
                  <h4 class="font-bold text-xs text-white">Tekla BIM 3D</h4>
                  <p class="text-[10px] text-slate-400 mt-1">Full 3D Structural Detailing</p>
                </div>
                <div class="p-4 bg-slate-900/80 rounded-xl border border-slate-800">
                  <i class="fas fa-database text-2xl text-amber-400 mb-2"></i>
                  <h4 class="font-bold text-xs text-white">ERP Network</h4>
                  <p class="text-[10px] text-slate-400 mt-1">Resource & Process Control</p>
                </div>
              </div>

              <div class="bg-slate-900/90 rounded-xl p-4 border border-slate-800 space-y-2 text-xs text-slate-300">
                <div class="flex justify-between items-center text-[11px]">
                  <span>Tekla BIM Modeling Speed</span>
                  <span class="text-orange-400 font-bold">100% Accuracy</span>
                </div>
                <div class="w-full bg-slate-800 rounded-full h-1.5">
                  <div class="bg-orange-500 h-1.5 rounded-full w-full"></div>
                </div>
                <p class="text-[11px] text-slate-400 pt-1">
                  <span data-th="ปัจจุบันเทคโนโลยี BIM มีการใช้งานในกว่า 60 ประเทศทั่วโลก ช่วยให้ผู้ออกแบบและผู้รับเหมาทำงานร่วมกันได้อย่างสมบูรณ์แบบ" data-en="BIM technology is implemented across 60+ countries globally, ensuring seamless coordination between designers and contractors.">ปัจจุบันเทคโนโลยี BIM มีการใช้งานในกว่า 60 ประเทศทั่วโลก ช่วยให้ผู้ออกแบบและผู้รับเหมาทำงานร่วมกันได้อย่างสมบูรณ์แบบ</span>
                </p>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- CLIENTS & CONTRACTORS TRUST BAR -->
    <section class="py-12 bg-slate-950 text-white border-t border-slate-800 relative overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
        <p class="text-xs uppercase tracking-widest text-slate-400 font-semibold mb-6" data-th="ได้รับความไว้วางใจจากบริษัทรับเหมาก่อสร้างและองค์กรชั้นนำระดับประเทศ" data-en="Trusted by Leading Contractors & National Enterprises">
          ได้รับความไว้วางใจจากบริษัทรับเหมาก่อสร้างและองค์กรชั้นนำระดับประเทศ
        </p>

        <!-- Partner Names Badges (Single Row - Perfectly fitted & no clipping) -->
        <div class="relative w-full overflow-hidden">
          <!-- Left & Right Smooth Edge Fade Mask (for compact viewports) -->
          <div class="pointer-events-none absolute left-0 top-0 bottom-0 w-8 sm:w-12 bg-gradient-to-r from-slate-950 to-transparent z-10 lg:hidden"></div>
          <div class="pointer-events-none absolute right-0 top-0 bottom-0 w-8 sm:w-12 bg-gradient-to-l from-slate-950 to-transparent z-10 lg:hidden"></div>

          <div class="flex flex-nowrap items-center justify-start lg:justify-center gap-1.5 sm:gap-2 xl:gap-2.5 overflow-x-auto py-2 px-2 no-scrollbar scroll-smooth text-slate-300 text-[11px] sm:text-xs font-semibold">
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">THAI OBAYASHI</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">THAI TAKENAKA</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">THAI TODA</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">THAI SHIMIZU</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">CH. KARNCHANG - TOKYU</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">PRE-BUILT PLC</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">RITTA</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0">HOME PRODUCT CENTER</span>
            <span class="px-2.5 sm:px-3 py-1.5 bg-slate-900/90 rounded-lg border border-slate-800 hover:border-orange-500/50 hover:text-white transition whitespace-nowrap shrink-0" data-th="กรมศิลปากร" data-en="FINE ARTS DEPT">กรมศิลปากร</span>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA INQUIRY BANNER -->
    <section class="relative py-16 bg-gradient-to-r from-orange-600 via-orange-500 to-amber-500 text-white overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="space-y-2 text-center md:text-left">
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-heading text-white" data-th="พร้อมให้คำปรึกษาและประเมินราคางานโครงสร้างเหล็ก" data-en="Ready to Build Your Next Steel Structure Project?">
            พร้อมให้คำปรึกษาและประเมินราคางานโครงสร้างเหล็ก
          </h2>
          <p class="text-orange-100 text-xs sm:text-sm lg:text-base max-w-3xl xl:max-w-4xl lg:whitespace-nowrap" data-th="ทีมวิศวกร ST. FRAME ยินดีให้คำแนะนำทั้งแบบโครงสร้าง การถอดแบบ BIM และการคำนวณราคาที่คุ้มค่าที่สุด" data-en="Our engineering team is ready to assist with BIM modeling, quotation, and turnkey execution.">
            ทีมวิศวกร ST. FRAME ยินดีให้คำแนะนำทั้งแบบโครงสร้าง การถอดแบบ BIM และการคำนวณราคาที่คุ้มค่าที่สุด
          </p>
        </div>
        <div class="flex flex-wrap gap-4 flex-shrink-0">
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bg-slate-950 hover:bg-slate-900 text-white font-bold px-6 py-3.5 rounded-xl shadow-xl transition transform hover:-translate-y-0.5 flex items-center gap-2 text-sm">
            <i class="fas fa-envelope"></i>
            <span data-th="ติดต่อสอบถาม / ขอราคา" data-en="Contact Us / Request Quote">ติดต่อสอบถาม / ขอราคา</span>
          </a>
          <a href="tel:035779554" class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white font-bold px-5 py-3.5 rounded-xl transition flex items-center gap-2 text-sm">
            <i class="fas fa-phone-alt"></i> 035-779-554
          </a>
        </div>
      </div>
    </section>

    <!-- TRUSTED MAIN CONTRACTORS & CLIENTS LOGO BAR -->
    <section class="py-16 bg-white border-t border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-10 space-y-2">
          <h3 class="text-xs font-bold font-heading text-orange-600 uppercase tracking-widest" data-th="ความไว้วางใจจากพันธมิตรชั้นนำ" data-en="Trusted by Industry Leaders">
            ความไว้วางใจจากพันธมิตรชั้นนำ
          </h3>
          <h2 class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900 tracking-tight" data-th="ผู้รับเหมาหลักและองค์กรชั้นนำที่ร่วมงานกับเรา" data-en="Leading Main Contractors & Enterprise Clients">
            ผู้รับเหมาหลักและองค์กรชั้นนำที่ร่วมงานกับเรา
          </h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 text-center">
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/thai-obayashi.svg" alt="Thai Obayashi" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">THAI OBAYASHI</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="ไทยโอบายาชิ" data-en="Thai Obayashi Corp">ไทยโอบายาชิ</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/thai-takenaka.svg" alt="Thai Takenaka" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">THAI TAKENAKA</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="ไทยทาเคนากะ" data-en="Thai Takenaka International">ไทยทาเคนากะ</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/thai-toda.svg" alt="Thai Toda" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">THAI TODA</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="ไทยโทดะ" data-en="Thai Toda Corp">ไทยโทดะ</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/thai-shimizu.svg" alt="Thai Shimizu" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">THAI SHIMIZU</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="ไทยชิมิซึ" data-en="Thai Shimizu Construction">ไทยชิมิซึ</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/ch-karnchang-tokyu.svg" alt="CH. Karnchang-Tokyu" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">CH. KARNCHANG</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="ช.การช่าง-โตกิว" data-en="CH. Karnchang-Tokyu">ช.การช่าง-โตกิว</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/thai-nishimatsu.svg" alt="Thai Nishimatsu" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">THAI NISHIMATSU</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="ไทยนิชิมัตสึ" data-en="Thai Nishimatsu">ไทยนิชิมัตสึ</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/ritta.svg" alt="RITTA" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">RITTA</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="บจก. ฤทธา" data-en="RITTA Co., Ltd.">บจก. ฤทธา</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/pre-built.svg" alt="PRE-BUILT" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">PRE-BUILT</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="บมจ. พรีบิลท์" data-en="Pre-Built PLC">บมจ. พรีบิลท์</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/homepro.svg" alt="HOMEPRO" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">HOME PRODUCT CENTER</span>
            <span class="text-[10px] text-slate-400 mt-0.5">HomePro & MegaHome</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/western-digital.svg" alt="WESTERN DIGITAL" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">WESTERN DIGITAL</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="เวสเทิร์น ดิจิตอล" data-en="Western Digital">เวสเทิร์น ดิจิตอล</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/sansiri.svg" alt="SANSIRI" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">SANSIRI</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="บมจ. แสนสิริ" data-en="Sansiri PLC">บมจ. แสนสิริ</span>
          </div>
          <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl flex flex-col items-center justify-center hover:border-orange-500 hover:shadow-md transition group">
            <div class="h-10 w-full flex items-center justify-center mb-2">
              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/clients/mitsubishi-motors.svg" alt="MITSUBISHI MOTORS" class="max-h-8 max-w-[110px] object-contain group-hover:scale-105 transition" loading="lazy" decoding="async">
            </div>
            <span class="font-bold text-xs text-slate-800 font-heading">MITSUBISHI MOTORS</span>
            <span class="text-[10px] text-slate-400 mt-0.5" data-th="มิตซูบิชิ มอเตอร์ส" data-en="Mitsubishi Motors">มิตซูบิชิ มอเตอร์ส</span>
          </div>
        </div>

        <div class="mt-8 text-center">
          <a href="<?php echo esc_url( home_url( '/about/#contractors' ) ); ?>" class="inline-flex items-center gap-2 text-xs font-semibold text-orange-600 hover:text-orange-700">
            <span data-th="ดูข้อมูลเครือข่าย Main Contractors และ Out Contractors ทั้งหมด" data-en="Learn more about our Main & Subcontractor Networks">ดูข้อมูลเครือข่าย Main Contractors และ Out Contractors ทั้งหมด</span>
            <i class="fas fa-arrow-right"></i>
          </a>
        </div>

      </div>
    </section>
  </main>

<!-- Main JavaScript -->
  

<?php get_footer(); ?>
