/**
 * ST. Frame & Truss Co., Ltd. - Main Interactive JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  initLanguageSwitcher();
  initCounters();
  initProjectFilter();
  initContactForm();
});

/* 1. Navbar Scroll & Mobile Menu */
function initNavbar() {
  const header = document.getElementById('main-header');
  const mobileMenuBtn = document.getElementById('mobile-menu-btn');
  const mobileMenu = document.getElementById('mobile-menu');
  const closeMobileMenuBtn = document.getElementById('close-mobile-menu');

  let scrollTicking = false;
  window.addEventListener('scroll', () => {
    if (!scrollTicking) {
      window.requestAnimationFrame(() => {
        if (window.scrollY > 20) {
          header?.classList.add('shadow-xl', 'bg-slate-950/95');
        } else {
          header?.classList.remove('shadow-xl');
        }
        scrollTicking = false;
      });
      scrollTicking = true;
    }
  }, { passive: true });

  if (mobileMenuBtn && mobileMenu) {
    mobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    });
  }

  if (closeMobileMenuBtn && mobileMenu) {
    closeMobileMenuBtn.addEventListener('click', () => {
      mobileMenu.classList.add('hidden');
      document.body.style.overflow = '';
    });
  }
}

/* 2. Bilingual Switcher (TH / EN) */
function initLanguageSwitcher() {
  let currentLang = localStorage.getItem('stframe_lang') || 'th';
  setLanguage(currentLang);

  const langBtns = document.querySelectorAll('.lang-btn');
  langBtns.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const lang = btn.getAttribute('data-lang');
      if (lang) {
        setLanguage(lang);
      }
    });
  });
}

function setLanguage(lang) {
  localStorage.setItem('stframe_lang', lang);
  
  // Update button active state
  document.querySelectorAll('.lang-btn').forEach(btn => {
    if (btn.getAttribute('data-lang') === lang) {
      btn.classList.add('active', 'bg-orange-500', 'text-white');
      btn.classList.remove('text-slate-400', 'hover:text-white');
    } else {
      btn.classList.remove('active', 'bg-orange-500', 'text-white');
      btn.classList.add('text-slate-400', 'hover:text-white');
    }
  });

  // Update page title
  const pageTitle = document.querySelector('title[data-th][data-en]');
  if (pageTitle) {
    const titleVal = pageTitle.getAttribute(`data-${lang}`);
    if (titleVal) document.title = titleVal;
  }

  // Switch all elements with data-th and data-en
  document.querySelectorAll('[data-th][data-en]').forEach(el => {
    const text = el.getAttribute(`data-${lang}`);
    if (text) {
      if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
        el.placeholder = text;
      } else {
        el.innerHTML = text;
      }
    }
  });

  // Toggle elements explicitly marked for TH or EN only
  document.querySelectorAll('.lang-block-th').forEach(el => {
    el.style.display = (lang === 'th') ? '' : 'none';
  });
  document.querySelectorAll('.lang-block-en').forEach(el => {
    el.style.display = (lang === 'en') ? '' : 'none';
  });

  // Dispatch custom language event
  window.dispatchEvent(new CustomEvent('stframe_language_change', { detail: { lang } }));
}

/* 3. Number Counter Animation */
function initCounters() {
  const counters = document.querySelectorAll('.counter-val');
  if (!counters.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const target = +entry.target.getAttribute('data-target');
        const duration = 1800; // ms
        const stepTime = 20;
        const totalSteps = duration / stepTime;
        let currentStep = 0;
        
        const timer = setInterval(() => {
          currentStep++;
          const progress = currentStep / totalSteps;
          const currentVal = Math.round(target * easeOutQuad(progress));
          entry.target.innerText = currentVal.toLocaleString();
          
          if (currentStep >= totalSteps) {
            entry.target.innerText = target.toLocaleString();
            clearInterval(timer);
          }
        }, stepTime);

        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });

  counters.forEach(c => observer.observe(c));
}

function easeOutQuad(t) {
  return t * (2 - t);
}

/* 4. Project Filter & Modal */
function initProjectFilter() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const projectCards = document.querySelectorAll('.project-item');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const category = btn.getAttribute('data-filter');
      
      filterBtns.forEach(b => {
        b.classList.remove('bg-orange-500', 'text-white', 'shadow-md');
        b.classList.add('bg-slate-100', 'text-slate-700', 'hover:bg-slate-200');
      });
      btn.classList.add('bg-orange-500', 'text-white', 'shadow-md');
      btn.classList.remove('bg-slate-100', 'text-slate-700', 'hover:bg-slate-200');

      projectCards.forEach(card => {
        const itemCat = card.getAttribute('data-category');
        if (category === 'all' || itemCat === category) {
          card.classList.remove('hidden');
          setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'scale(1)';
          }, 50);
        } else {
          card.style.opacity = '0';
          card.style.transform = 'scale(0.95)';
          setTimeout(() => {
            card.classList.add('hidden');
          }, 250);
        }
      });
    });
  });
}

// Global function to open project details modal
window.openProjectModal = function(data, imgSrc) {
  const modal = document.getElementById('project-modal');
  if (!modal) return;

  const currentLang = localStorage.getItem('stframe_lang') || 'th';

  document.getElementById('modal-title').innerHTML = (currentLang === 'en' && data.titleEn) ? data.titleEn : data.title;
  document.getElementById('modal-client').innerText = data.client || '-';
  document.getElementById('modal-year').innerText = data.year || '-';
  document.getElementById('modal-location').innerText = (currentLang === 'en' && data.locEn) ? data.locEn : (data.location || '-');
  document.getElementById('modal-scope').innerText = (currentLang === 'en' && data.scopeEn) ? data.scopeEn : (data.scope || '-');
  // Image left blank as per request
  document.getElementById('modal-badge').innerText = data.tag || 'Project Highlight';

  if (imgSrc) { const mImg = document.getElementById('modal-img'); if (mImg) mImg.src = imgSrc; }
  modal.classList.remove('hidden');
  document.body.style.overflow = 'hidden';
};

window.closeProjectModal = function() {
  const modal = document.getElementById('project-modal');
  if (!modal) return;
  modal.classList.add('hidden');
  document.body.style.overflow = '';
};

/* 5. Contact Form Validation, CV Upload & Dynamic Category Switching */
function initContactForm() {
  const form = document.getElementById('contact-form');
  const alertBox = document.getElementById('form-alert');
  const inquirySelect = document.getElementById('inquiry-type');
  const cvContainer = document.getElementById('cv-upload-container');
  const fileInput = document.getElementById('cv-file-input');
  const dropzoneBox = document.getElementById('dropzone-box');
  const filePreviewBox = document.getElementById('file-preview-box');
  const fileNameDisplay = document.getElementById('file-name-display');
  const fileSizeDisplay = document.getElementById('file-size-display');
  const fileTypeIcon = document.getElementById('file-type-icon');
  const removeFileBtn = document.getElementById('remove-file-btn');
  const messageLabel = document.getElementById('message-label');
  const messageInput = document.getElementById('message-input');
  const submitBtnText = document.getElementById('submit-btn-text');

  if (!form) return;

  function updateFormState(category) {
    const isCareers = (category === 'careers');
    const currentLang = localStorage.getItem('stframe_lang') || 'th';

    if (cvContainer) {
      if (isCareers) {
        cvContainer.classList.remove('hidden');
      } else {
        cvContainer.classList.add('hidden');
      }
    }

    if (messageLabel && messageInput) {
      if (isCareers) {
        messageLabel.innerText = currentLang === 'th' ? 'แนะนำตัวเอง / ประสบการณ์ทำงานเพิ่มเติม' : 'Self Introduction / Work Experience';
        messageInput.placeholder = currentLang === 'th' 
          ? 'ระบุตำแหน่งที่ต้องการสมัคร ประวัติการทำงานโดยย่อ หรือเงินเดือนที่คาดหวัง...' 
          : 'Specify applied position, brief work experience, or expected salary...';
        if (submitBtnText) {
          submitBtnText.innerText = currentLang === 'th' ? 'ส่งใบสมัครงาน (Submit Application)' : 'Submit Application';
        }
      } else {
        messageLabel.innerText = currentLang === 'th' ? 'รายละเอียดข้อความ / ขอบเขตโครงการ *' : 'Message / Project Scope *';
        messageInput.placeholder = currentLang === 'th' 
          ? 'ระบุประเภทอาคาร ขนาดพื้นที่ หรือแนบลิงก์แบบโครงสร้าง...' 
          : 'Specify building type, area size, or provide drawings link...';
        if (submitBtnText) {
          submitBtnText.innerText = currentLang === 'th' ? 'ส่งข้อมูลติดต่อ (Submit Inquiry)' : 'Submit Inquiry';
        }
      }
    }
  }

  // Listen to select changes
  if (inquirySelect) {
    inquirySelect.addEventListener('change', (e) => {
      updateFormState(e.target.value);
    });
  }

  // Parse URL Parameters (e.g. ?apply=วิศวกรประเมินราคา or ?type=careers)
  const urlParams = new URLSearchParams(window.location.search);
  const applyJob = urlParams.get('apply');
  const typeParam = urlParams.get('type');

  if (applyJob || typeParam === 'careers') {
    if (inquirySelect) {
      inquirySelect.value = 'careers';
    }
    updateFormState('careers');

    if (applyJob && messageInput) {
      messageInput.value = `สมัครงานตำแหน่ง: ${decodeURIComponent(applyJob)}\n\n`;
    }
  }

  // File Upload Handling (Input Change & Drag-and-Drop)
  function handleSelectedFile(file) {
    if (!file) return;

    // Check size limit (10MB)
    const maxSize = 10 * 1024 * 1024;
    if (file.size > maxSize) {
      alert('ขนาดไฟล์เกินกำหนด (สูงสุด 10MB) กรุณาเลือกไฟล์ใหม่');
      fileInput.value = '';
      return;
    }

    // Format file size
    const sizeStr = file.size > 1024 * 1024 
      ? (file.size / (1024 * 1024)).toFixed(1) + ' MB'
      : (file.size / 1024).toFixed(0) + ' KB';

    if (fileNameDisplay) fileNameDisplay.innerText = file.name;
    if (fileSizeDisplay) fileSizeDisplay.innerText = `${sizeStr} • พร้อมส่ง`;

    // Set appropriate icon
    if (fileTypeIcon) {
      const ext = file.name.split('.').pop().toLowerCase();
      if (ext === 'pdf') {
        fileTypeIcon.className = 'fas fa-file-pdf text-red-500';
      } else if (['doc', 'docx'].includes(ext)) {
        fileTypeIcon.className = 'fas fa-file-word text-blue-500';
      } else if (['jpg', 'jpeg', 'png'].includes(ext)) {
        fileTypeIcon.className = 'fas fa-file-image text-emerald-500';
      } else {
        fileTypeIcon.className = 'fas fa-file text-orange-500';
      }
    }

    // Toggle preview
    if (dropzoneBox) dropzoneBox.classList.add('hidden');
    if (filePreviewBox) {
      filePreviewBox.classList.remove('hidden');
      filePreviewBox.classList.add('flex');
    }
  }

  if (fileInput) {
    fileInput.addEventListener('change', (e) => {
      if (e.target.files && e.target.files[0]) {
        handleSelectedFile(e.target.files[0]);
      }
    });
  }

  if (removeFileBtn) {
    removeFileBtn.addEventListener('click', (e) => {
      e.preventDefault();
      if (fileInput) fileInput.value = '';
      if (dropzoneBox) dropzoneBox.classList.remove('hidden');
      if (filePreviewBox) {
        filePreviewBox.classList.add('hidden');
        filePreviewBox.classList.remove('flex');
      }
    });
  }

  // Form Submit
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const currentLang = localStorage.getItem('stframe_lang') || 'th';
    const isCareers = inquirySelect && inquirySelect.value === 'careers';
    
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = currentLang === 'th' ? '<i class="fas fa-spinner fa-spin mr-2"></i>กำลังส่งข้อมูล...' : '<i class="fas fa-spinner fa-spin mr-2"></i>Sending...';

    setTimeout(() => {
      submitBtn.disabled = false;
      submitBtn.innerHTML = originalText;
      form.reset();

      // Reset file upload state
      if (fileInput) fileInput.value = '';
      if (dropzoneBox) dropzoneBox.classList.remove('hidden');
      if (filePreviewBox) {
        filePreviewBox.classList.add('hidden');
        filePreviewBox.classList.remove('flex');
      }
      updateFormState('fabrication');

      if (alertBox) {
        alertBox.classList.remove('hidden');
        if (isCareers) {
          alertBox.innerHTML = `
            <i class="fas fa-check-circle text-emerald-600 text-base shrink-0"></i>
            <span>ได้รับข้อมูลการสมัครงานและไฟล์ประวัติของคุณเรียบร้อยแล้ว! ฝ่ายบุคคล ST Frame & Truss จะติดต่อกลับหาคุณโดยเร็วที่สุด</span>
          `;
        }
        alertBox.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        setTimeout(() => {
          alertBox.classList.add('hidden');
        }, 6000);
      }
    }, 1200);
  });
}



/* 6. CCTV Privacy Notice Modal (From Old Website) */
window.openCctvModal = function() {
  let modal = document.getElementById('cctv-modal');
  if (!modal) {
    createCctvModalElement();
    modal = document.getElementById('cctv-modal');
  }
  const currentLang = localStorage.getItem('stframe_lang') || 'th';
  setCctvModalLang(currentLang);
  modal.classList.remove('hidden');
  document.body.style.overflow = 'hidden';
};

window.closeCctvModal = function() {
  const modal = document.getElementById('cctv-modal');
  if (modal) {
    modal.classList.add('hidden');
    document.body.style.overflow = '';
  }
};

window.setCctvModalLang = function(lang) {
  const thContent = document.getElementById('cctv-content-th');
  const enContent = document.getElementById('cctv-content-en');
  const btnTh = document.getElementById('cctv-btn-th');
  const btnEn = document.getElementById('cctv-btn-en');
  const title = document.getElementById('cctv-modal-title');
  
  if (lang === 'en') {
    if (thContent) thContent.classList.add('hidden');
    if (enContent) enContent.classList.remove('hidden');
    if (btnTh) { btnTh.classList.remove('bg-orange-500', 'text-white'); btnTh.classList.add('text-slate-400'); }
    if (btnEn) { btnEn.classList.add('bg-orange-500', 'text-white'); btnEn.classList.remove('text-slate-400'); }
    if (title) title.innerText = 'CCTV Privacy Notice';
  } else {
    if (thContent) thContent.classList.remove('hidden');
    if (enContent) enContent.classList.add('hidden');
    if (btnTh) { btnTh.classList.add('bg-orange-500', 'text-white'); btnTh.classList.remove('text-slate-400'); }
    if (btnEn) { btnEn.classList.remove('bg-orange-500', 'text-white'); btnEn.classList.add('text-slate-400'); }
    if (title) title.innerText = 'ประกาศความเป็นส่วนตัวสำหรับกล้องวงจรปิด (CCTV Privacy Notice)';
  }
};

function createCctvModalElement() {
  if (document.getElementById('cctv-modal')) return;

  const modalHtml = `
  <div id="cctv-modal" class="fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm hidden flex items-center justify-center p-3 sm:p-6" role="dialog" aria-modal="true">
    <!-- Modal Dialog Box -->
    <div class="bg-white w-full max-w-4xl max-h-[90vh] rounded-2xl shadow-2xl flex flex-col border border-slate-200 overflow-hidden">
      
      <!-- Modal Header -->
      <div class="px-6 py-4 bg-slate-900 border-b border-slate-800 flex items-center justify-between text-white shrink-0">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-orange-500/20 border border-orange-500/30 flex items-center justify-center text-orange-400 shrink-0">
            <i class="fas fa-video text-base"></i>
          </div>
          <div>
            <h3 id="cctv-modal-title" class="text-sm sm:text-base font-bold font-heading text-white">
              ประกาศความเป็นส่วนตัวสำหรับกล้องวงจรปิด (CCTV Privacy Notice)
            </h3>
            <p class="text-[11px] text-slate-400">ST. Frame &amp; Truss Co., Ltd.</p>
          </div>
        </div>

        <!-- Language Toggle & Close Button -->
        <div class="flex items-center gap-2.5">
          <div class="flex items-center bg-slate-800 rounded-lg p-0.5 border border-slate-700 text-xs font-bold">
            <button id="cctv-btn-th" onclick="setCctvModalLang('th')" class="px-2.5 py-1 rounded-md transition text-xs bg-orange-500 text-white cursor-pointer">TH</button>
            <button id="cctv-btn-en" onclick="setCctvModalLang('en')" class="px-2.5 py-1 rounded-md transition text-xs text-slate-400 hover:text-white cursor-pointer">EN</button>
          </div>
          <button onclick="closeCctvModal()" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-400 hover:text-white flex items-center justify-center transition focus:outline-none cursor-pointer">
            <i class="fas fa-times text-base"></i>
          </button>
        </div>
      </div>

      <!-- Modal Body (Scrollable Content) -->
      <div class="flex-1 overflow-y-auto p-6 sm:p-8 space-y-6 text-slate-700 text-xs sm:text-sm leading-relaxed">
        
        <!-- THAI CONTENT -->
        <div id="cctv-content-th" class="space-y-6">
          <div class="p-4 bg-orange-50 rounded-xl border border-orange-100 text-orange-950 space-y-2">
            <h4 class="font-bold text-sm sm:text-base text-orange-900 flex items-center gap-2">
              <i class="fas fa-shield-alt text-orange-600"></i> ประกาศความเป็นส่วนตัวสำหรับกล้องวงจรปิด (CCTV Privacy Notice)
            </h4>
            <p class="text-xs leading-relaxed text-slate-700">
              บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด กำลังดำเนินการใช้กล้องวงจรปิด (CCTV) สำหรับการเฝ้าระวังสังเกตการณ์ในพื้นที่ภายใน และรอบบริเวณ สำนักงาน (“พื้นที่”) ของบริษัทฯ เพื่อการปกป้องชีวิต สุขภาพ และทรัพย์สิน ทั้งนี้ บริษัทฯทำการเก็บรวบรวมข้อมูลส่วนบุคคลของเจ้าหน้าที่ ผู้ปฏิบัติงาน ลูกค้า ลูกจ้าง ผู้รับเหมา ผู้มาติดต่อ หรือ บุคคลใด ๆ (รวมเรียกว่า “ท่าน”) ที่เข้ามายังพื้นที่ โดยผ่านการใช้งานอุปกรณ์กล้องวงจรปิดดังกล่าว
            </p>
            <p class="text-xs text-slate-600">
              ประกาศความเป็นส่วนตัวในการใช้กล้องวงจรปิด (“ประกาศ”) ฉบับนี้ให้ข้อมูลเกี่ยวกับการดำเนินการเก็บรวบรวม ใช้หรือเปิดเผย ซึ่งข้อมูลที่ทำให้สามารถระบุตัวตนท่านได้ (“ข้อมูลส่วนบุคคล”) รวมทั้งสิทธิต่าง ๆ ของท่านดังนี้
            </p>
          </div>

          <div class="space-y-4">
            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">1. ฐานกฎหมายในการประมวลผลข้อมูลส่วนบุคคล</h5>
              <p class="text-xs text-slate-600 mb-2">บริษัทฯ ดำเนินการเก็บรวบรวมข้อมูลส่วนบุคคลของท่านภายใต้ฐานกฎหมายดังต่อไปนี้:</p>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>1.1</strong> ความจำเป็นในการป้องกันหรือระงับอันตรายต่อชีวิต ร่างกาย หรือสุขภาพของท่านหรือบุคคลอื่น</li>
                <li><strong>1.2</strong> ความจำเป็นเพื่อประโยชน์โดยชอบด้วยกฎหมายของบริษัทฯ หรือบุคคลอื่น โดยประโยชน์ดังกล่าวมีความสำคัญไม่น้อยไปกว่าสิทธิขั้นพื้นฐานในข้อมูลส่วนบุคคลของท่าน</li>
                <li><strong>1.3</strong> ความจำเป็นในการปฏิบัติตามกฎหมายที่เกี่ยวข้อง ซึ่งควบคุมดูแลเกี่ยวกับความปลอดภัยและสภาพแวดล้อมในสถานที่ทำงาน และทรัพย์สินของบริษัทฯ</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">2. วัตถุประสงค์ในการเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน</h5>
              <p class="text-xs text-slate-600 mb-2">บริษัทฯ ดำเนินการเก็บรวบรวมข้อมูลส่วนบุคคลของท่านเพื่อวัตถุประสงค์ดังต่อไปนี้:</p>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>2.1</strong> เพื่อการปกป้องสุขภาพและความปลอดภัยส่วนตัวของท่าน ซึ่งรวมไปถึงทรัพย์สินของท่าน</li>
                <li><strong>2.2</strong> เพื่อการปกป้องอาคาร สิ่งอำนวยความสะดวกและทรัพย์สินของบริษัทฯ จากความเสียหาย การขัดขวาง การทำลายซึ่งทรัพย์สินหรืออาชญากรรมอื่น</li>
                <li><strong>2.3</strong> เพื่อสนับสนุนหน่วยงานที่เกี่ยวข้องในการบังคับใช้กฎหมายเพื่อการยับยั้ง ป้องกัน สืบค้น และดำเนินคดีทางกฎหมาย</li>
                <li><strong>2.4</strong> เพื่อการให้ความช่วยเหลือในกระบวนการระงับข้อพิพาทซึ่งเกิดขึ้นในระหว่างที่มีกระบวนการทางวินัยหรือกระบวนการร้องทุกข์</li>
                <li><strong>2.5</strong> เพื่อการให้ความช่วยเหลือในกระบวนการสอบสวน หรือกระบวนการเกี่ยวกับการส่งเรื่องร้องเรียน</li>
                <li><strong>2.6</strong> เพื่อการให้ความช่วยเหลือในกระบวนการริเริ่มหรือป้องกันการฟ้องร้องทางแพ่ง ซึ่งรวมไปถึงแต่ไม่จำกัดเพียงการดำเนินการทางกฎหมายที่เกี่ยวข้องกับการจ้างงาน</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">3. ข้อมูลส่วนบุคคลที่บริษัทฯ เก็บรวบรวมและใช้</h5>
              <p class="text-xs text-slate-600 mb-2">
                ตามวัตถุประสงค์ในข้อ 2 บริษัทฯ ทำการติดตั้งกล้องวงจรปิดในตำแหน่งที่มองเห็นได้ โดยจัดวางป้ายเตือนว่ามีการใช้งานกล้องวงจรปิด ณ ทางเข้า-ทางออก รวมถึงพื้นที่ที่บริษัทฯ เห็นสมควรว่าเป็นจุดที่ต้องมีการเฝ้าระวัง เพื่อเก็บรวบรวมข้อมูลส่วนบุคคลของท่านเมื่อท่านเข้ามายังพื้นที่ ดังต่อไปนี้:
              </p>
              <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-2">
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-camera text-orange-500 block text-base mb-1"></i> 3.1 ภาพนิ่งทั้งหมด</div>
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-video text-orange-500 block text-base mb-1"></i> 3.2 ภาพเคลื่อนไหว</div>
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-volume-up text-orange-500 block text-base mb-1"></i> 3.3 เสียงทั้งหมด</div>
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-box text-orange-500 block text-base mb-1"></i> 3.4 ภาพทรัพย์สิน</div>
              </div>
              <p class="text-[11px] text-amber-800 bg-amber-50 p-2.5 rounded-lg border border-amber-200">
                <i class="fas fa-exclamation-triangle mr-1 text-amber-600"></i> <strong>ข้อจำกัดความเป็นส่วนตัว:</strong> บริษัทฯ จะไม่ทำการติดตั้งกล้องวงจรปิดในพื้นที่ที่อาจล่วงละเมิดสิทธิขั้นพื้นฐานจนเกินสมควร ได้แก่ ห้องพัก ห้องน้ำ ห้องอาบน้ำ หรือสถานที่เพื่อใช้ในการพักผ่อนของผู้ปฏิบัติงาน
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">4. การเปิดเผยข้อมูลส่วนบุคคลของท่าน</h5>
              <p class="text-xs text-slate-600 mb-1">
                บริษัทฯ จะเก็บรักษาข้อมูลกล้องวงจรปิดไว้เป็นความลับ และจะไม่เปิดเผยเว้นแต่กรณีจำเป็น โดยอาจเปิดเผยแก่:
              </p>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>4.1</strong> หน่วยงานที่มีอำนาจหน้าที่ตามกฎหมาย เพื่อช่วยบังคับใช้กฎหมาย หรือการสืบสวนสอบสวนคดีความ</li>
                <li><strong>4.2</strong> ผู้ให้บริการภายนอก เพื่อสร้างความมั่นใจในการป้องกันหรือระงับอันตรายต่อชีวิต ร่างกาย สุขภาพ และทรัพย์สิน</li>
                <li><strong>4.3</strong> บุคคลอื่นที่จำเป็นและได้รับอนุญาตตามกฎหมาย</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">5. สิทธิของเจ้าของข้อมูลส่วนบุคคล (ตาม พ.ร.บ. คุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562)</h5>
              <p class="text-xs text-slate-600 mb-2">ท่านมีสิทธิตามกฎหมาย PDPA ดังต่อไปนี้:</p>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>5.1 สิทธิในการเข้าถึงและรับสำเนา:</strong> ขอเข้าถึง รับสำเนา และขอให้เปิดเผยที่มาของข้อมูลส่วนบุคคลของท่าน</li>
                <li><strong>5.2 สิทธิในการขอแก้ไข:</strong> ขอให้แก้ไขข้อมูลที่ไม่ถูกต้อง ไม่สมบูรณ์ ให้ถูกต้องและเป็นปัจจุบัน</li>
                <li><strong>5.3 สิทธิในการขอให้ระงับการใช้:</strong> ในกรณีอยู่ระหว่างการตรวจสอบความถูกต้อง หรือเมื่อหมดความจำเป็นแต่ท่านขอให้เก็บไว้เพื่อใช้สิทธิตามกฎหมาย</li>
                <li><strong>5.4 สิทธิในการคัดค้าน:</strong> คัดค้านการเก็บรวบรวม ใช้ หรือเปิดเผยข้อมูลส่วนบุคคล เว้นแต่บริษัทฯ มีเหตุอันชอบด้วยกฎหมายที่สำคัญยิ่งกว่า</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">6. ระยะเวลาในการเก็บรักษาข้อมูลส่วนบุคคล</h5>
              <p class="text-xs text-slate-600">
                บริษัทฯ จะเก็บรักษาข้อมูลในกล้องวงจรปิดเป็นระยะเวลาประมาณ <strong>1 ปี</strong> นับจากเจ้าหน้าที่ได้ทำการตรวจสอบย้อนหลังเรียบร้อยแล้ว เมื่อพ้นระยะเวลาดังกล่าว บริษัทฯ จะทำการลบหรือทำลายข้อมูลส่วนบุคคลของท่านต่อไป
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">7. การรักษาความมั่นคงปลอดภัยข้อมูลส่วนบุคคล</h5>
              <p class="text-xs text-slate-600">
                บริษัทฯ มีมาตรการรักษาความมั่นคงปลอดภัยที่เหมาะสมทั้งทางเทคนิคและการบริหารจัดการ สอดคล้องกับนโยบาย Information Security Policy เพื่อรักษาความเป็นความลับ (Confidentiality) ความถูกต้องครบถ้วน (Integrity) และสภาพพร้อมใช้งาน (Availability)
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">8. ความรับผิดชอบของผู้ควบคุมข้อมูลส่วนบุคคล</h5>
              <p class="text-xs text-slate-600">
                กำหนดให้เจ้าหน้าที่เฉพาะผู้ที่มีอำนาจหน้าที่เกี่ยวข้องเท่านั้นที่สามารถเข้าถึงข้อมูลกล้องวงจรปิดได้ และกำกับดูแลให้ปฏิบัติตามประกาศนี้อย่างเคร่งครัด
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">9. การเปลี่ยนแปลงแก้ไขคำประกาศ</h5>
              <p class="text-xs text-slate-600">
                บริษัทฯ อาจพิจารณาแก้ไขเปลี่ยนแปลงประกาศนี้ตามความเหมาะสม โดยจะเผยแพร่ผ่านเว็บไซต์ของบริษัทฯ การเข้ามาในพื้นที่ของท่านถือเป็นการรับทราบตามข้อตกลงในประกาศนี้
              </p>
            </div>

            <!-- Warning Sign Image from Old Website -->
            <div class="pt-4 border-t border-slate-200 text-center space-y-2">
              <h5 class="font-bold text-slate-900 text-xs sm:text-sm">ป้ายประกาศการบันทึกเหตุการณ์ด้วยกล้องวงจรปิดในสถานที่ทำงาน</h5>
              <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-md inline-block max-w-lg w-full bg-slate-50 p-2">
                <img src="assets/images/cctv-sign.png" alt="ป้ายประกาศการบันทึกเหตุการณ์ด้วยกล้องวงจรปิดในสถานที่ทำงาน ST. Frame & Truss" class="w-full h-auto rounded-xl object-contain">
              </div>
            </div>

            <!-- Contact Box -->
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 space-y-2 text-xs">
              <h5 class="font-bold text-slate-900 text-sm flex items-center gap-2">
                <i class="fas fa-id-card text-orange-500"></i> 10. การติดต่อสอบถามข้อมูล (Contact Information)
              </h5>
              <p class="text-slate-600"><strong>ผู้ควบคุมข้อมูลส่วนบุคคล (Data Controller) &amp; เจ้าหน้าที่คุ้มครองข้อมูลส่วนบุคคล (DPO)</strong></p>
              <p class="text-slate-700">แผนก Information Technology • บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด</p>
              <p class="text-slate-600">เลขที่ 29/4, 29/14, 29/15, 29/17 หมู่ 3 ต.โพธิ์สามต้น อ.บางปะหัน จ.พระนครศรีอยุธยา 13220</p>
              <div class="flex flex-wrap items-center gap-4 pt-1 font-medium text-slate-700">
                <span><i class="fas fa-phone text-orange-500 mr-1"></i> 035-779-554</span>
                <span><i class="fas fa-mobile-alt text-orange-500 mr-1"></i> 092-282-6864</span>
                <span><i class="fas fa-envelope text-orange-500 mr-1"></i> <a href="mailto:it@stframe.com" class="text-orange-600 hover:underline">it@stframe.com</a></span>
              </div>
            </div>

          </div>
        </div>

        <!-- ENGLISH CONTENT -->
        <div id="cctv-content-en" class="space-y-6 hidden">
          <div class="p-4 bg-orange-50 rounded-xl border border-orange-100 text-orange-950 space-y-2">
            <h4 class="font-bold text-sm sm:text-base text-orange-900 flex items-center gap-2">
              <i class="fas fa-shield-alt text-orange-600"></i> CCTV Privacy Notice — ST. Frame &amp; Truss Co., Ltd.
            </h4>
            <p class="text-xs leading-relaxed text-slate-700">
              ST. Frame &amp; Truss Co., Ltd. operates a Closed-Circuit Television (CCTV) system for surveillance within and around the company’s premises (“Premises”) in order to protect the life, health, and property of individuals. The Company collects personal data of officers, employees, customers, contractors, visitors, and any other individuals (“you”) who enter the Premises through CCTV systems.
            </p>
            <p class="text-xs text-slate-600">
              This CCTV Privacy Notice explains how the Company collects, uses, or discloses personal data that may identify you (“Personal Data”), as well as your statutory rights under the Personal Data Protection Act B.E. 2562 (PDPA).
            </p>
          </div>

          <div class="space-y-4">
            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">1. Legal Basis for Processing Personal Data</h5>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>1.1</strong> Necessity for preventing or suppressing danger to the life, body, or health of you or other persons.</li>
                <li><strong>1.2</strong> Legitimate interests of the Company or other persons, provided that such interests are not overridden by your fundamental rights.</li>
                <li><strong>1.3</strong> Compliance with applicable laws governing workplace safety, environmental safety, and asset protection.</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">2. Purpose of Collecting Your Personal Data</h5>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>2.1</strong> To protect the health and personal safety of individuals and property.</li>
                <li><strong>2.2</strong> To protect the Company’s buildings, facilities, and assets from damage, disruption, vandalism, or other crimes.</li>
                <li><strong>2.3</strong> To support law enforcement authorities in preventing, investigating, and prosecuting criminal offenses.</li>
                <li><strong>2.4</strong> To assist in dispute resolution, disciplinary proceedings, or grievance procedures.</li>
                <li><strong>2.5</strong> To support investigation processes or complaint-handling procedures.</li>
                <li><strong>2.6</strong> To assist in initiating or defending legal claims, including employment-related legal actions.</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">3. Personal Data Collected by the Company</h5>
              <p class="text-xs text-slate-600 mb-2">
                CCTV cameras are installed in visible locations with warning signs at entrances and exits. Data collected includes:
              </p>
              <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-2">
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-camera text-orange-500 block text-base mb-1"></i> 3.1 Still Images</div>
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-video text-orange-500 block text-base mb-1"></i> 3.2 Video Footage</div>
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-volume-up text-orange-500 block text-base mb-1"></i> 3.3 Audio Records</div>
                <div class="p-2.5 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs font-medium text-slate-700"><i class="fas fa-box text-orange-500 block text-base mb-1"></i> 3.4 Property Images</div>
              </div>
              <p class="text-[11px] text-amber-800 bg-amber-50 p-2.5 rounded-lg border border-amber-200">
                <i class="fas fa-exclamation-triangle mr-1 text-amber-600"></i> <strong>Privacy Guarantee:</strong> CCTV cameras will never be installed in private areas such as restrooms, shower rooms, or employee relaxation zones.
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">4. Disclosure of Your Personal Data</h5>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>4.1</strong> Competent government or law enforcement agencies for investigation and legal proceedings.</li>
                <li><strong>4.2</strong> External service providers where strictly necessary for safety and life/health/asset protection.</li>
                <li><strong>4.3</strong> Other parties where required or permitted by law.</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">5. Your Rights as a Data Subject (PDPA)</h5>
              <ul class="list-disc list-inside space-y-1 text-xs text-slate-600 pl-2">
                <li><strong>5.1 Right of Access:</strong> Right to access, obtain a copy, and request source disclosure of Personal Data.</li>
                <li><strong>5.2 Right to Rectification:</strong> Right to request correction of inaccurate or incomplete data.</li>
                <li><strong>5.3 Right to Restriction:</strong> Right to restrict data processing under statutory conditions.</li>
                <li><strong>5.4 Right to Object:</strong> Right to object to collection, use, or disclosure of Personal Data.</li>
              </ul>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">6. Data Retention Period</h5>
              <p class="text-xs text-slate-600">
                CCTV recordings are retained for approximately <strong>1 year</strong> after review by authorized personnel, after which recordings are securely destroyed in accordance with retention standards.
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">7. Data Security Measures</h5>
              <p class="text-xs text-slate-600">
                Technical and organizational security controls conform to the corporate Information Security Policy, guaranteeing Confidentiality, Integrity, and Availability.
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">8. Data Controller Responsibility</h5>
              <p class="text-xs text-slate-600">
                Only designated personnel with legitimate duties are authorized to access CCTV data, adhering strictly to this notice.
              </p>
            </div>

            <div>
              <h5 class="font-bold text-slate-900 text-sm mb-1">9. Revisions &amp; Acknowledgment</h5>
              <p class="text-xs text-slate-600">
                The company reserves the right to revise this Notice. Entering company premises constitutes full acknowledgment of this Notice.
              </p>
            </div>

            <!-- Warning Sign Image from Old Website -->
            <div class="pt-4 border-t border-slate-200 text-center space-y-2">
              <h5 class="font-bold text-slate-900 text-xs sm:text-sm">Workplace CCTV Surveillance Warning Notice</h5>
              <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-md inline-block max-w-lg w-full bg-slate-50 p-2">
                <img src="assets/images/cctv-sign.png" alt="ST. Frame & Truss Workplace CCTV Surveillance Notice" class="w-full h-auto rounded-xl object-contain">
              </div>
            </div>

            <!-- Contact Box -->
            <div class="p-4 bg-slate-50 rounded-xl border border-slate-200 space-y-2 text-xs">
              <h5 class="font-bold text-slate-900 text-sm flex items-center gap-2">
                <i class="fas fa-id-card text-orange-500"></i> 10. Contact Information
              </h5>
              <p class="text-slate-600"><strong>Data Controller &amp; Data Protection Officer (DPO)</strong></p>
              <p class="text-slate-700">Information Technology Department • ST. Frame &amp; Truss Co., Ltd.</p>
              <p class="text-slate-600">29/4, 29/14, 29/15, 29/17 Moo 3, Pho Sam Ton, Bang Pahan, Phra Nakhon Si Ayutthaya 13220, Thailand</p>
              <div class="flex flex-wrap items-center gap-4 pt-1 font-medium text-slate-700">
                <span><i class="fas fa-phone text-orange-500 mr-1"></i> 035-779-554</span>
                <span><i class="fas fa-mobile-alt text-orange-500 mr-1"></i> 092-282-6864</span>
                <span><i class="fas fa-envelope text-orange-500 mr-1"></i> <a href="mailto:it@stframe.com" class="text-orange-600 hover:underline">it@stframe.com</a></span>
              </div>
            </div>

          </div>
        </div>

      </div>

      <!-- Modal Footer -->
      <div class="px-6 py-3.5 bg-slate-50 border-t border-slate-200 flex items-center justify-between text-xs shrink-0">
        <span class="text-slate-500 text-[11px]">
          <i class="fas fa-shield-alt text-orange-500 mr-1"></i> PDPA Compliant • Zero Accident Standard
        </span>
        <button onclick="closeCctvModal()" class="px-5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold transition cursor-pointer">
          ปิดหน้าต่าง (Close)
        </button>
      </div>

    </div>
  </div>
  `;

  document.body.insertAdjacentHTML('beforeend', modalHtml);

  // Close when clicking outside backdrop
  const modal = document.getElementById('cctv-modal');
  modal.addEventListener('click', (e) => {
    if (e.target === modal) {
      closeCctvModal();
    }
  });

  // Close with Escape key
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
      closeCctvModal();
    }
  });
}
