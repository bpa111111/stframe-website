<?php
/**
 * Template Name: Contact
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
            <i class="fas fa-map-marked-alt"></i> <span data-th="ช่องทางการติดต่อและขอใบเสนอราคา" data-en="Contact & Quotations">ช่องทางการติดต่อและขอใบเสนอราคา</span>
          </div>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-white tracking-tight" data-th="ติดต่อ เอส.ที. เฟรม แอนด์ ทรัส" data-en="Contact ST. Frame & Truss">
            ติดต่อ เอส.ที. เฟรม แอนด์ ทรัส
          </h1>
          <p class="text-slate-300 text-base sm:text-lg font-light leading-relaxed" data-th="พร้อมให้คำปรึกษาทางวิศวกรรม ประเมินราคา และประสานงานโครงการทั่วประเทศ" data-en="Our engineering and sales team is ready to assist your project inquiries and quotation requests.">
            พร้อมให้คำปรึกษาทางวิศวกรรม ประเมินราคา และประสานงานโครงการทั่วประเทศ
          </p>
        </div>
      </div>
    </section>

    <!-- CONTACT DETAILS & FORM -->
    <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
          
          <!-- Contact Info Cards -->
          <div class="lg:col-span-5 space-y-6">
            
            <div class="steel-card bg-slate-900 text-white p-8 rounded-2xl border border-slate-800 space-y-6">
              <h3 class="text-xl font-bold font-heading text-white" data-th="สำนักงานและโรงงานผลิตอยุธยา" data-en="Ayutthaya Office & Fabrication Plant">
                สำนักงานและโรงงานผลิตอยุธยา
              </h3>
              
              <div class="space-y-4 text-xs sm:text-sm text-slate-300">
                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-map-marker-alt"></i>
                  </div>
                  <div>
                    <strong class="text-white block mb-0.5" data-th="ที่ตั้งโรงงาน:" data-en="Plant Location:">ที่ตั้งโรงงาน:</strong>
                    <span class="leading-relaxed" data-th="29/4, 29/15, 29/14, 29/17 หมู่ 3 ตำบลโพธิ์สามต้น<br>อำเภอบางปะหัน จังหวัดพระนครศรีอยุธยา 13220" data-en="29/4, 29/15, 29/14, 29/17 Moo 3, Pho Sam Ton,<br>Bang Pahan, Phra Nakhon Si Ayutthaya 13220, Thailand">29/4, 29/15, 29/14, 29/17 หมู่ 3 ตำบลโพธิ์สามต้น<br>อำเภอบางปะหัน จังหวัดพระนครศรีอยุธยา 13220</span>
                    <a href="https://maps.app.goo.gl/RPSfSqvTrSYpobYQ6" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 text-xs text-orange-400 hover:text-orange-300 font-semibold mt-2 transition">
                      <i class="fas fa-directions"></i> <span data-th="เปิดแผนที่นำทาง (Google Maps)" data-en="Get Directions (Google Maps)">เปิดแผนที่นำทาง (Google Maps)</span> <i class="fas fa-external-link-alt text-[10px]"></i>
                    </a>
                  </div>
                </div>

                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-phone-alt"></i>
                  </div>
                  <div>
                    <strong class="text-white block mb-0.5" data-th="เบอร์โทรศัพท์:" data-en="Telephone:">เบอร์โทรศัพท์:</strong>
                    035-779-554, 035-779-555
                  </div>
                </div>

                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="fas fa-envelope"></i>
                  </div>
                  <div>
                    <strong class="text-white block mb-0.5" data-th="อีเมลติดต่อ:" data-en="Email Address:">อีเมลติดต่อ:</strong>
                    stframe_factory@stframe.com
                  </div>
                </div>

                <div class="flex items-start gap-3">
                  <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center flex-shrink-0 mt-0.5">
                    <i class="far fa-clock"></i>
                  </div>
                  <div>
                    <strong class="text-white block mb-0.5" data-th="เวลาทำการ:" data-en="Office Hours:">เวลาทำการ:</strong>
                    <span data-th="วันจันทร์ - วันเสาร์: 08:00 - 17:00 น." data-en="Monday – Saturday: 08:00 – 17:00">วันจันทร์ - วันเสาร์: 08:00 - 17:00 น.</span>
                  </div>
                </div>
              </div>

              <div class="pt-4 border-t border-slate-800">
                <a href="http://202.80.235.61:2026" target="_blank" class="w-full text-center block bg-slate-800 hover:bg-slate-700 text-orange-400 py-2.5 rounded-xl font-semibold text-xs transition">
                  <i class="fas fa-server mr-1"></i> <span data-th="เข้าสู่ระบบภายใน ERP System" data-en="Login to Internal ERP System">เข้าสู่ระบบภายใน ERP System</span>
                </a>
              </div>

            </div>

          </div>

          <!-- Interactive Form -->
          <div class="lg:col-span-7">
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
              
              <div>
                <h3 class="text-2xl font-bold font-heading text-slate-900" data-th="ส่งข้อความสอบถาม / ขอใบเสนอราคา" data-en="Send Us a Message / Request Quote">
                  ส่งข้อความสอบถาม / ขอใบเสนอราคา
                </h3>
                <p class="text-xs text-slate-500 mt-1" data-th="กรอกข้อมูลด้านล่างเพื่อให้วิศวกรและฝ่ายขายติดต่อกลับโดยเร็วที่สุด" data-en="Please fill in the form below and our team will get back to you shortly.">
                  กรอกข้อมูลด้านล่างเพื่อให้วิศวกรและฝ่ายขายติดต่อกลับโดยเร็วที่สุด
                </p>
              </div>

              <!-- Alert Box -->
              <div id="form-alert" class="hidden p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs flex items-center gap-2">
                <i class="fas fa-check-circle text-emerald-600 text-base"></i>
                <span data-th="ขอบคุณสำหรับข้อมูล! เจ้าหน้าที่ ST Frame & Truss จะติดต่อกลับหาคุณภายใน 24 ชั่วโมงทำการ" data-en="Thank you for contacting us! Our team will get back to you within 24 business hours.">ขอบคุณสำหรับข้อมูล! เจ้าหน้าที่ ST Frame & Truss จะติดต่อกลับหาคุณภายใน 24 ชั่วโมงทำการ</span>
              </div>

              <form id="contact-form" class="space-y-4 text-xs sm:text-sm">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label class="block font-semibold text-slate-700 mb-1" data-th="ชื่อ - นามสกุล *" data-en="Full Name *">ชื่อ - นามสกุล *</label>
                    <input type="text" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition" placeholder="คุณสมชาย ใจดี">
                  </div>
                  <div>
                    <label class="block font-semibold text-slate-700 mb-1" data-th="ชื่อบริษัท / องค์กร" data-en="Company / Organization Name">ชื่อบริษัท / องค์กร</label>
                    <input type="text" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition" placeholder="บริษัท เอบีซี คอนสตรัคชั่น จำกัด">
                  </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                  <div>
                    <label class="block font-semibold text-slate-700 mb-1" data-th="เบอร์โทรศัพท์ติดต่อ *" data-en="Phone Number *">เบอร์โทรศัพท์ติดต่อ *</label>
                    <input type="tel" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition" placeholder="08X-XXX-XXXX">
                  </div>
                  <div>
                    <label class="block font-semibold text-slate-700 mb-1" data-th="อีเมลติดต่อ *" data-en="Email Address *">อีเมลติดต่อ *</label>
                    <input type="email" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition" placeholder="contact@example.com">
                  </div>
                </div>

                <div>
                  <label class="block font-semibold text-slate-700 mb-1" data-th="ประเภทงานที่ต้องการสอบถาม *" data-en="Inquiry Category *">ประเภทงานที่ต้องการสอบถาม *</label>
                  <select id="inquiry-type" class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition bg-white font-medium">
                    <option value="fabrication" data-th="ขอใบเสนอราคา / งานออกแบบและผลิตโครงสร้างเหล็ก (Fabrication)" data-en="Request Quotation / Steel Fabrication">ขอใบเสนอราคา / งานออกแบบและผลิตโครงสร้างเหล็ก (Fabrication)</option>
                    <option value="truss" data-th="งานหลังคาโครงถัก (Roof Truss & Super Truss)" data-en="Roof Truss & Super Truss">งานหลังคาโครงถัก (Roof Truss & Super Truss)</option>
                    <option value="cellular" data-th="งานคานฉลุรู (Cellular Beam)" data-en="Cellular Beam">งานคานฉลุรู (Cellular Beam)</option>
                    <option value="erection" data-th="งานยกติดตั้งโครงสร้างเหล็กหน้างาน (Erection)" data-en="Steel Erection & Site Work">งานยกติดตั้งโครงสร้างเหล็กหน้างาน (Erection)</option>
                    <option value="careers" data-th="สมัครงาน / ฝึกงาน (Careers & Internship)" data-en="Careers & Internship">สมัครงาน / ฝึกงาน (Careers & Internship)</option>
                    <option value="general" data-th="เรื่องอื่นๆ (General Inquiry)" data-en="General Inquiry">เรื่องอื่นๆ (General Inquiry)</option>
                  </select>
                </div>

                <!-- CV / RESUME UPLOAD SECTION (Visible when applying for jobs) -->
                <div id="cv-upload-container" class="hidden space-y-2 p-4 bg-orange-50/70 rounded-2xl border-2 border-dashed border-orange-300 transition-all duration-300">
                  <div class="flex items-center justify-between">
                    <label class="font-bold text-slate-900 text-xs sm:text-sm flex items-center gap-1.5" data-th="แนบไฟล์ประวัติ / CV / Resume / Portfolio *" data-en="Upload CV / Resume / Portfolio *">
                      <i class="fas fa-file-arrow-up text-orange-500"></i>
                      <span>แนบไฟล์ประวัติ / CV / Resume / Portfolio</span>
                      <span class="text-orange-600 text-xs font-semibold">(แนะนำ)</span>
                    </label>
                    <span class="text-[11px] text-slate-400 font-medium"><span data-th="PDF, Word, ภาพ (สูงสุด 10MB)" data-en="PDF, Word, Images (Max 10MB)">PDF, Word, ภาพ (สูงสุด 10MB)</span></span>
                  </div>

                  <!-- Dropzone & File Input Box -->
                  <div id="dropzone-box" class="relative group bg-white hover:bg-orange-50/40 rounded-xl p-5 border border-slate-200 hover:border-orange-400 text-center cursor-pointer transition-all duration-200">
                    <input type="file" id="cv-file-input" name="resume" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    <div class="flex flex-col items-center justify-center space-y-1.5">
                      <div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-lg group-hover:scale-110 transition-transform">
                        <i class="fas fa-cloud-arrow-up"></i>
                      </div>
                      <p class="text-xs font-bold text-slate-800" data-th="คลิกเลือกไฟล์ หรือลากไฟล์มาวางที่นี่" data-en="Click to upload or drag & drop">
                        คลิกเลือกไฟล์ หรือลากไฟล์มาวางที่นี่
                      </p>
                      <p class="text-[11px] text-slate-400" data-th="รองรับไฟล์ .PDF, .DOC, .DOCX, .PNG, .JPG ไม่เกิน 10MB" data-en="Supports .PDF, .DOC, .DOCX, .PNG, .JPG up to 10MB">
                        รองรับไฟล์ .PDF, .DOC, .DOCX, .PNG, .JPG ไม่เกิน 10MB
                      </p>
                    </div>
                  </div>

                  <!-- Selected File Preview Badge (Hidden until file selected) -->
                  <div id="file-preview-box" class="hidden items-center justify-between p-3 bg-white rounded-xl border border-emerald-300 shadow-xs">
                    <div class="flex items-center gap-2.5 overflow-hidden">
                      <div class="w-9 h-9 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-base shrink-0">
                        <i id="file-type-icon" class="fas fa-file-pdf"></i>
                      </div>
                      <div class="min-w-0 flex-1 text-left">
                        <p id="file-name-display" class="text-xs font-bold text-slate-800 truncate">resume.pdf</p>
                        <p data-th="1.2 MB • พร้อมส่ง" data-en="1.2 MB • Ready" id="file-size-display" class="text-[10px] text-emerald-600 font-medium">1.2 MB • พร้อมส่ง</p>
                      </div>
                    </div>
                    <button type="button" id="remove-file-btn" class="p-1.5 text-slate-500 hover:text-red-600 hover:bg-slate-100 rounded-lg transition" title="ลบไฟล์นี้">
                      <i class="fas fa-times text-sm"></i>
                    </button>
                  </div>
                </div>

                <div>
                  <label id="message-label" class="block font-semibold text-slate-700 mb-1" data-th="รายละเอียดข้อความ / ขอบเขตโครงการ *" data-en="Message / Project Scope *">รายละเอียดข้อความ / ขอบเขตโครงการ *</label>
                  <textarea id="message-input" rows="4" required class="w-full px-4 py-2.5 rounded-lg border border-slate-300 focus:ring-2 focus:ring-orange-500 focus:border-orange-500 outline-none transition" placeholder="ระบุประเภทอาคาร ขนาดพื้นที่ หรือแนบลิงก์แบบโครงสร้าง..."></textarea>
                </div>

                <button type="submit" id="submit-btn" class="w-full py-3.5 bg-gradient-to-r from-orange-600 to-amber-500 whitespace-nowrap hover:from-orange-500 hover:to-amber-400 text-white font-bold rounded-xl shadow-lg hover:shadow-orange-500/25 transition">
                  <i class="fas fa-paper-plane mr-1.5"></i> <span id="submit-btn-text" data-th="ส่งข้อมูลติดต่อ (Submit Inquiry)" data-en="Submit Inquiry">ส่งข้อมูลติดต่อ (Submit Inquiry)</span>
                </button>

              </form>

            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- MAP SECTION -->
    <section class="bg-slate-100 py-12 border-t border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
          <div>
            <h3 class="text-xl font-bold font-heading text-slate-900" data-th="แผนที่ตั้งโรงงานอยุธยา" data-en="Location Map (Ayutthaya)">
              แผนที่ตั้งโรงงานอยุธยา
            </h3>
            <p class="text-xs text-slate-600 mt-1">
              <i class="fas fa-map-marker-alt text-orange-500 mr-1"></i> <span class="font-semibold text-slate-800" data-th="บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด" data-en="ST. Frame &amp; Truss Co., Ltd.">บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด</span> • Plus Code: <span class="font-mono text-orange-600 font-semibold bg-orange-100 px-1.5 py-0.5 rounded">CG9X+CJ</span> <span data-th="ตำบลโพธิ์สามต้น อำเภอบางปะหัน จังหวัดพระนครศรีอยุธยา" data-en="Pho Sam Ton, Bang Pahan, Phra Nakhon Si Ayutthaya">ตำบลโพธิ์สามต้น อำเภอบางปะหัน จังหวัดพระนครศรีอยุธยา</span>
            </p>
          </div>
          <a href="https://maps.app.goo.gl/RPSfSqvTrSYpobYQ6" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2.5 bg-orange-600 hover:bg-orange-500 text-white rounded-xl text-xs font-semibold shadow-md transition shrink-0">
            <i class="fas fa-location-arrow"></i>
            <span data-th="เปิดดูใน Google Maps" data-en="Open in Google Maps">เปิดดูใน Google Maps</span>
            <i class="fas fa-external-link-alt text-[10px] ml-0.5"></i>
          </a>
        </div>
        <div class="rounded-2xl overflow-hidden shadow-lg border border-slate-300 h-80 sm:h-96 relative bg-slate-900">
          <iframe 
            class="w-full h-full border-0" 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3869.479524588975!2d100.5464824!3d14.4185966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e274b505ec7f23%3A0x1e97e695dc583830!2z4Lia4Lij4Li04Lip4Lix4LiXIOC9gOC4reC4qiDguJfguLUg4LmA4Lif4Lij4LihIOC5geC4reC4meC4lOC5jCDguJjguKPguLHguKo!5e0!3m2!1sth!2sth!4v1700000000000!5m2!1sth!2sth" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
  </main>

  <!-- FOOTER -->

<?php get_footer(); ?>
