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

  document.getElementById('modal-title').innerText = (currentLang === 'en' && data.titleEn) ? data.titleEn : data.title;
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

