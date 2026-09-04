<?php
/**
 * Template Name: Services
 *
 * @package ST_Frame
 */

get_header(); ?>

</div>

  <main class="flex-grow">
    
    <!-- PAGE HERO BANNER -->
    <section class="bg-slate-950 text-white py-16 lg:py-20 relative overflow-hidden">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-factory.jpg" alt="ST. Frame & Truss Factory" class="absolute inset-0 w-full h-full object-cover object-center opacity-40 lg:opacity-50 pointer-events-none transform filter brightness-105">
      <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/70 to-slate-950/30 z-0"></div>
      <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
      <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl space-y-4">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-500/20 text-orange-400 text-xs font-semibold whitespace-nowrap">
            <i class="fas fa-cogs"></i> <span data-th="บริการและโซลูชันวิศวกรรม" data-en="Engineering Solutions">บริการและโซลูชันวิศวกรรม</span>
          </div>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-white tracking-tight" data-th="บริการครบวงจรด้านโครงสร้างเหล็ก" data-en="End-to-End Steel Engineering Solutions">
            บริการครบวงจรด้านโครงสร้างเหล็ก
          </h1>
          <p class="text-slate-300 text-base sm:text-lg font-light leading-relaxed" data-th="ตอบสนองทุกความต้องการของโครงการขนาดใหญ่ ตั้งแต่งานออกแบบคำนวณ BIM 3D การแปรรูปชิ้นงานในโรงงาน ไปจนถึงการติดตั้งโครงสร้างหน้างานตามมาตรฐานความปลอดภัยระดับสากล" data-en="Comprehensive services from 3D Tekla BIM engineering and state-of-the-art factory fabrication to zero-accident site erection.">
            ตอบสนองทุกความต้องการของโครงการขนาดใหญ่ ตั้งแต่งานออกแบบคำนวณ BIM 3D การแปรรูปชิ้นงานในโรงงาน ไปจนถึงการติดตั้งโครงสร้างหน้างานตามมาตรฐานความปลอดภัยระดับสากล
          </p>
        </div>
      </div>
    </section>

    <!-- DETAILED SERVICES LIST -->
    <section class="py-20 bg-white space-y-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-20">
        
        <!-- Service 1: BIM -->
        <div id="bim" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          <div class="lg:col-span-6 space-y-5">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-100 text-orange-600 text-xs font-bold whitespace-nowrap">
              01 • ENGINEERING DESIGN
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold font-heading text-slate-900" data-th="Tekla BIM 3D Structural Detailing & Engineering" data-en="Tekla BIM 3D Structural Detailing & Engineering">
              Tekla BIM 3D Structural Detailing & Engineering
            </h2>
            <p class="text-slate-600 text-sm leading-relaxed" data-th="เราใช้โปรแกรม Tekla Structures ชั้นนำระดับโลกในการออกแบบและจำลองโครงสร้างอาคาร 3 มิติ (BIM) ซึ่งช่วยให้วิศวกรสามารถระบุและจัดการรายละเอียดจุดต่อ (Connection Detailing) สลักเกลียว และการเชื่อมได้อย่างแม่นยำ 100%" data-en="We utilize industry-standard Tekla Structures for full 3D Building Information Modeling (BIM), enabling precise connection detailing, clash detection, and automated fabrication drawing generation.">
              เราใช้โปรแกรม Tekla Structures ชั้นนำระดับโลกในการออกแบบและจำลองโครงสร้างอาคาร 3 มิติ (BIM) ซึ่งช่วยให้วิศวกรสามารถระบุและจัดการรายละเอียดจุดต่อ (Connection Detailing) สลักเกลียว และการเชื่อมได้อย่างแม่นยำ 100%
            </p>
            <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
              <li class="flex items-start gap-2"><i class="fas fa-check text-orange-500 shrink-0 mt-1"></i> <span data-th="ตรวจสอบการชนกันของโครงสร้าง (Clash Detection) ลดข้อผิดพลาดหน้างาน" data-en="Clash detection across MEP and structural models to eliminate on-site errors">ตรวจสอบการชนกันของโครงสร้าง (Clash Detection) ลดข้อผิดพลาดหน้างาน</span></li>
              <li class="flex items-start gap-2"><i class="fas fa-check text-orange-500 shrink-0 mt-1"></i> <span data-th="ถอดปริมาณวัสดุเหล็ก (Material Take-off) ได้อย่างแม่นยำและโปร่งใส" data-en="Automated material take-off (MTO) for transparent cost and quantity control">ถอดปริมาณวัสดุเหล็ก (Material Take-off) ได้อย่างแม่นยำและโปร่งใส</span></li>
              <li class="flex items-start gap-2"><i class="fas fa-check text-orange-500 shrink-0 mt-1"></i> <span data-th="สร้างแบบสั่งผลิต Shop Drawing และไฟล์ CNC อัตโนมัติส่งตรงสู่เครื่องจักร" data-en="Generate production shop drawings and direct CNC machine data files">สร้างแบบสั่งผลิต Shop Drawing และไฟล์ CNC อัตโนมัติส่งตรงสู่เครื่องจักร</span></li>
            </ul>
          </div>
          <div class="lg:col-span-6">
            <div class="rounded-2xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 h-80 flex flex-col items-center justify-center text-slate-400 text-center p-6 shadow-sm">
              <div class="w-14 h-14 rounded-full bg-slate-200/80 flex items-center justify-center text-slate-400 mb-3 text-xl">
                <i class="fas fa-cube"></i>
              </div>
              <span class="text-sm font-semibold text-slate-600" data-th="พื้นที่สำหรับภาพงาน BIM Tekla 3D Model" data-en="Tekla 3D BIM Model Image Placeholder">พื้นที่สำหรับภาพงาน BIM Tekla 3D Model</span>
              <span class="text-xs text-slate-400 mt-1" data-th="ขนาดแนะนำ: 800 x 600 px" data-en="Recommended: 800 x 600 px">ขนาดแนะนำ: 800 x 600 px</span>
            </div>
          </div>
        </div>

        <!-- Service 2: Roof Truss -->
        <div id="truss" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center lg:flex-row-reverse">
          <div class="lg:col-span-6 lg:order-2 space-y-5">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-amber-100 text-amber-700 text-xs font-bold whitespace-nowrap">
              02 • ROOF STRUCTURE
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold font-heading text-slate-900" data-th="Roof Truss & Super Truss System" data-en="Roof Truss & Super Truss System">
              Roof Truss & Super Truss System
            </h2>
            <p class="text-slate-600 text-sm leading-relaxed" data-th="ความเชี่ยวชาญพิเศษในการผลิตและติดตั้งโครงถักหลังคาเหล็กช่วงกว้าง (Large Span / Super Truss) รองรับอาคารขนาดใหญ่ที่ต้องการพื้นที่ใช้สอยกว้างขวาง ปราศจากเสากีดขวาง เช่น ศูนย์การประชุมนานาชาติ ศูนย์กระจายสินค้า โรงเก็บเครื่องบิน (Hangar)" data-en="Specialized long-span Roof Truss and Super Truss fabrication engineered for column-free interior volumes in international convention centers, logistics hubs, and aircraft hangars.">
              ความเชี่ยวชาญพิเศษในการผลิตและติดตั้งโครงถักหลังคาเหล็กช่วงกว้าง (Large Span / Super Truss) รองรับอาคารขนาดใหญ่ที่ต้องการพื้นที่ใช้สอยกว้างขวาง ปราศจากเสากีดขวาง เช่น ศูนย์การประชุมนานาชาติ ศูนย์กระจายสินค้า โรงเก็บเครื่องบิน (Hangar)
            </p>
            <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
              <li class="flex items-center gap-2"><i class="fas fa-check text-amber-500"></i> <span data-th="โครงสร้าง Super Truss รับแรงดัดและแรงสั่นสะเทือนสูง" data-en="High-strength Super Truss engineered for heavy loads and vibrations">โครงสร้าง Super Truss รับแรงดัดและแรงสั่นสะเทือนสูง</span></li>
              <li class="flex items-center gap-2"><i class="fas fa-check text-amber-500"></i> <span data-th="ระบบ Monitor Roof, Canopy และโครงสร้างรองรับผนังตกแต่ง" data-en="Monitor Roof ventilation, architectural canopies, and facade steel support">ระบบ Monitor Roof, Canopy และโครงสร้างรองรับผนังตกแต่ง</span></li>
              <li class="flex items-center gap-2"><i class="fas fa-check text-amber-500"></i> <span data-th="ผลงานอ้างอิง: ศูนย์การประชุมแห่งชาติสิริกิติ์ QSNCC, ICONSIAM" data-en="Featured references: QSNCC Convention Center, ICONSIAM Shopping Mall">ผลงานอ้างอิง: ศูนย์การประชุมแห่งชาติสิริกิติ์ QSNCC, ICONSIAM</span></li>
            </ul>
          </div>
          <div class="lg:col-span-6 lg:order-1">
            <div class="rounded-2xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 h-80 flex flex-col items-center justify-center text-slate-400 text-center p-6 shadow-sm">
              <div class="w-14 h-14 rounded-full bg-slate-200/80 flex items-center justify-center text-slate-400 mb-3 text-xl">
                <i class="fas fa-project-diagram"></i>
              </div>
              <span class="text-sm font-semibold text-slate-600" data-th="พื้นที่สำหรับภาพงาน Super Truss & Long-Span" data-en="Super Truss Structural Image Placeholder">พื้นที่สำหรับภาพงาน Super Truss & Long-Span</span>
              <span class="text-xs text-slate-400 mt-1" data-th="ขนาดแนะนำ: 800 x 600 px" data-en="Recommended: 800 x 600 px">ขนาดแนะนำ: 800 x 600 px</span>
            </div>
          </div>
        </div>

        <!-- Service 3: Cellular Beam -->
        <div id="cellular" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
          <div class="lg:col-span-6 space-y-5">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-blue-100 text-blue-700 text-xs font-bold whitespace-nowrap">
              03 • INNOVATIVE BEAMS
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold font-heading text-slate-900" data-th="Cellular Beam & PEB (Pre-Engineered Building)" data-en="Cellular Beam & PEB (Pre-Engineered Building)">
              Cellular Beam & PEB (Pre-Engineered Building)
            </h2>
            <p class="text-slate-600 text-sm leading-relaxed" data-th="คานเหล็กฉลุรูรับน้ำหนักสูง (Cellular Beam) นวัตกรรมที่ช่วยเพิ่มความลึกของหน้าตัดคานโดยไม่เพิ่มน้ำหนักเหล็ก ทำให้ประหยัดโครงสร้างได้สูงสุด พร้อมทั้งช่องเปิดที่สามารถเดินท่องานระบบ MEP ได้อย่างสวยงาม และระบบโครงสร้างสำเร็จรูป PEB" data-en="Innovative Cellular Beams with circular web apertures optimize structural depth and weight, allowing service duct integration while lowering foundation loads.">
              คานเหล็กฉลุรูรับน้ำหนักสูง (Cellular Beam) นวัตกรรมที่ช่วยเพิ่มความลึกของหน้าตัดคานโดยไม่เพิ่มน้ำหนักเหล็ก ทำให้ประหยัดโครงสร้างได้สูงสุด พร้อมทั้งช่องเปิดที่สามารถเดินท่องานระบบ MEP ได้อย่างสวยงาม และระบบโครงสร้างสำเร็จรูป PEB
            </p>
            <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
              <li class="flex items-center gap-2"><i class="fas fa-check text-blue-500"></i> <span data-th="ลดน้ำหนักโครงสร้างลงได้ 20-30% เมื่อเทียบกับคานแบบดั้งเดิม" data-en="Reduces total structural weight by 20-30% compared to traditional solid beams">ลดน้ำหนักโครงสร้างลงได้ 20-30% เมื่อเทียบกับคานแบบดั้งเดิม</span></li>
              <li class="flex items-center gap-2"><i class="fas fa-check text-blue-500"></i> <span data-th="ให้ความโปร่งและดีไซน์ทันสมัย เหมาะกับงานสถาปัตยกรรมโรงเรียนและอาคารพาณิชย์" data-en="Aesthetic modern look ideal for school campuses and commercial spaces">ให้ความโปร่งและดีไซน์ทันสมัย เหมาะกับงานสถาปัตยกรรมโรงเรียนและอาคารพาณิชย์</span></li>
              <li class="flex items-center gap-2"><i class="fas fa-check text-blue-500"></i> <span data-th="ผลงานอ้างอิง: โรงเรียนมัณฑนารมย์, โรงเรียนยอแซฟอุปถัมภ์ อู่ทอง" data-en="Featured references: Mantanarom School, Joseph Upatham U-Thong School">ผลงานอ้างอิง: โรงเรียนมัณฑนารมย์, โรงเรียนยอแซฟอุปถัมภ์ อู่ทอง</span></li>
            </ul>
          </div>
          <div class="lg:col-span-6">
            <div class="rounded-2xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 h-80 flex flex-col items-center justify-center text-slate-400 text-center p-6 shadow-sm">
              <div class="w-14 h-14 rounded-full bg-slate-200/80 flex items-center justify-center text-slate-400 mb-3 text-xl">
                <i class="fas fa-shapes"></i>
              </div>
              <span class="text-sm font-semibold text-slate-600" data-th="พื้นที่สำหรับภาพงาน Cellular Beam & PEB" data-en="Cellular Beam & PEB Image Placeholder">พื้นที่สำหรับภาพงาน Cellular Beam & PEB</span>
              <span class="text-xs text-slate-400 mt-1" data-th="ขนาดแนะนำ: 800 x 600 px" data-en="Recommended: 800 x 600 px">ขนาดแนะนำ: 800 x 600 px</span>
            </div>
          </div>
        </div>

        <!-- Service 4: Heavy Fabrication & Erection -->
        <div id="erection" class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center lg:flex-row-reverse">
          <div class="lg:col-span-6 lg:order-2 space-y-5">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-emerald-100 text-emerald-700 text-xs font-bold whitespace-nowrap">
              04 • FABRICATION & SITE WORK
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold font-heading text-slate-900" data-th="Heavy Steel Fabrication & On-Site Erection" data-en="Heavy Steel Fabrication & On-Site Erection">
              Heavy Steel Fabrication & On-Site Erection
            </h2>
            <p class="text-slate-600 text-sm leading-relaxed" data-th="โรงงานแปรรูปเหล็กอยุธยาของเรามีกำลังการผลิตสูง รองรับชิ้นงานเหล็ก Built-up Columns, Crane Girders สำหรับเครนยกหนักในโรงงาน, Pipe Rack สำหรับโรงงานปิโตรเคมีและก๊าซ พร้อมทีมช่างติดตั้งโครงสร้างหน้างานที่มีใบรับรองความปลอดภัย" data-en="Our Ayutthaya plant provides heavy steel fabrication including built-up columns, overhead crane runway girders, LPG/petrochemical pipe racks, and certified rigging teams for safe site erection.">
              โรงงานแปรรูปเหล็กอยุธยาของเรามีกำลังการผลิตสูง รองรับชิ้นงานเหล็ก Built-up Columns, Crane Girders สำหรับเครนยกหนักในโรงงาน, Pipe Rack สำหรับโรงงานปิโตรเคมีและก๊าซ พร้อมทีมช่างติดตั้งโครงสร้างหน้างานที่มีใบรับรองความปลอดภัย
            </p>
            <ul class="space-y-2 text-xs sm:text-sm text-slate-700">
              <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500"></i> <span data-th="กระบวนการเชื่อม Submerged Arc Welding และทดสอบ NDT" data-en="Submerged Arc Welding (SAW) process with comprehensive NDT testing">กระบวนการเชื่อม Submerged Arc Welding และทดสอบ NDT</span></li>
              <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500"></i> <span data-th="งานพ่นทรายทำความสะอาดผิวเหล็ก (Sandblasting SA 2.5) และสีกันสนิมมาตรฐานสูง" data-en="Surface preparation via Sandblasting SA 2.5 and protective coating">งานพ่นทรายทำความสะอาดผิวเหล็ก (Sandblasting SA 2.5) และสีกันสนิมมาตรฐานสูง</span></li>
              <li class="flex items-center gap-2"><i class="fas fa-check text-emerald-500"></i> <span data-th="ปฏิบัติตามมาตรฐานความปลอดภัย Zero Accident ตลอดระยะเวลาติดตั้ง" data-en="Strict adherence to Zero Accident safety protocol throughout site erection">ปฏิบัติตามมาตรฐานความปลอดภัย Zero Accident ตลอดระยะเวลาติดตั้ง</span></li>
            </ul>
          </div>
          <div class="lg:col-span-6 lg:order-1">
            <div class="rounded-2xl overflow-hidden bg-slate-100 border-2 border-dashed border-slate-300 h-80 flex flex-col items-center justify-center text-slate-400 text-center p-6 shadow-sm">
              <div class="w-14 h-14 rounded-full bg-slate-200/80 flex items-center justify-center text-slate-400 mb-3 text-xl">
                <i class="fas fa-tools"></i>
              </div>
              <span class="text-sm font-semibold text-slate-600" data-th="พื้นที่สำหรับภาพงานแปรรูปเหล็ก & ติดตั้งหน้างาน" data-en="Fabrication & Erection Image Placeholder">พื้นที่สำหรับภาพงานแปรรูปเหล็ก & ติดตั้งหน้างาน</span>
              <span class="text-xs text-slate-400 mt-1" data-th="ขนาดแนะนำ: 800 x 600 px" data-en="Recommended: 800 x 600 px">ขนาดแนะนำ: 800 x 600 px</span>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- 5-STEP WORKFLOW -->
    <section class="py-20 bg-slate-900 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16 space-y-2">
          <h2 class="text-3xl font-extrabold font-heading text-white tracking-tight" data-th="ขั้นตอนการดำเนินงานมาตรฐานระดับสากล" data-en="Standard Engineering Workflow">
            ขั้นตอนการดำเนินงานมาตรฐานระดับสากล
          </h2>
          <p class="text-slate-400 text-sm" data-th="ตั้งแต่การรับโจทย์จนถึงการส่งมอบงานคุณภาพตรงเวลา" data-en="From concept to timely on-site handover.">
            ตั้งแต่การรับโจทย์จนถึงการส่งมอบงานคุณภาพตรงเวลา
          </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 text-center">
          
          <div class="p-6 bg-slate-800/80 rounded-xl border border-slate-700/60">
            <div class="w-10 h-10 rounded-full bg-orange-600 text-white font-bold flex items-center justify-center mx-auto mb-3">1</div>
            <h4 class="font-bold text-sm text-white mb-1">CONSULTATION</h4>
            <p class="text-xs text-slate-400" data-th="ประเมินแบบสถาปัตย์และคำนวณงบประมาณ" data-en="Review architectural plans & estimate budget">ประเมินแบบสถาปัตย์และคำนวณงบประมาณ</p>
          </div>

          <div class="p-6 bg-slate-800/80 rounded-xl border border-slate-700/60">
            <div class="w-10 h-10 rounded-full bg-orange-600 text-white font-bold flex items-center justify-center mx-auto mb-3">2</div>
            <h4 class="font-bold text-sm text-white mb-1">BIM 3D MODEL</h4>
            <p class="text-xs text-slate-400" data-th="ถอดแบบ Tekla และตรวจสอบ Clash" data-en="Tekla 3D modeling & clash detection">ถอดแบบ Tekla และตรวจสอบ Clash</p>
          </div>

          <div class="p-6 bg-slate-800/80 rounded-xl border border-slate-700/60">
            <div class="w-10 h-10 rounded-full bg-orange-600 text-white font-bold flex items-center justify-center mx-auto mb-3">3</div>
            <h4 class="font-bold text-sm text-white mb-1">FABRICATION</h4>
            <p class="text-xs text-slate-400" data-th="ตัด ประกอบ เชื่อม ในโรงงานอยุธยา" data-en="CNC cutting, fitting & welding at plant">ตัด ประกอบ เชื่อม ในโรงงานอยุธยา</p>
          </div>

          <div class="p-6 bg-slate-800/80 rounded-xl border border-slate-700/60">
            <div class="w-10 h-10 rounded-full bg-orange-600 text-white font-bold flex items-center justify-center mx-auto mb-3">4</div>
            <h4 class="font-bold text-sm text-white mb-1">QC & COATING</h4>
            <p class="text-xs text-slate-400" data-th="ตรวจ NDT พ่นทราย และทำสีกันสนิม" data-en="NDT inspection, blasting & coating">ตรวจ NDT พ่นทราย และทำสีกันสนิม</p>
          </div>

          <div class="p-6 bg-slate-800/80 rounded-xl border border-slate-700/60">
            <div class="w-10 h-10 rounded-full bg-emerald-600 text-white font-bold flex items-center justify-center mx-auto mb-3">5</div>
            <h4 class="font-bold text-sm text-white mb-1">SITE ERECTION</h4>
            <p class="text-xs text-slate-400" data-th="ยกติดตั้งหน้างาน Zero Accident" data-en="On-site erection with Zero Accident">ยกติดตั้งหน้างาน Zero Accident</p>
          </div>

        </div>
      </div>
    </section>

  </main>

  <!-- FOOTER -->

<?php get_footer(); ?>
