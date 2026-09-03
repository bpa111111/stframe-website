<!DOCTYPE html>
<html lang="th" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title data-th="ST Magazine & แคตตาล็อกรายเดือน | ST. Frame & Truss Co., Ltd." data-en="ST Magazine & Monthly Engineering Catalogues | ST. Frame & Truss">ST Magazine & แคตตาล็อกรายเดือน | ST. Frame & Truss Co., Ltd.</title>
  <meta name="description" content="วารสารวิชาการรายเดือน แคตตาล็อกผลงาน และนวัตกรรมโครงสร้างเหล็ก ST. Frame & Truss ดาวน์โหลดและอ่านออนไลน์ได้ทุกฉบับ">
  <!-- Favicon -->
  <link rel="icon" type="image/png" href="assets/images/logo-icon.png">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon" href="assets/images/logo-icon.png">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              navy: '#0B192C',
              dark: '#0F172A',
              slate: '#1E293B',
              orange: '#FF6500',
              'orange-hover': '#E05600',
              gold: '#F59E0B',
              light: '#F8FAFC'
            }
          },
          fontFamily: {
            sans: ['Prompt', 'Inter', 'sans-serif'],
            heading: ['Kanit', 'sans-serif']
          }
        }
      }
    }
  </script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800&family=Prompt:wght@300;400;500;600;700&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* 3D Magazine Cover Depth Effect */
    .mag-cover-wrap {
      perspective: 1000px;
    }
    .mag-cover-card {
      transition: transform 0.4s ease, box-shadow 0.4s ease;
      box-shadow: -4px 6px 16px rgba(0,0,0,0.15), -1px 2px 4px rgba(0,0,0,0.1);
    }
    .mag-cover-wrap:hover .mag-cover-card {
      transform: translateY(-6px) rotateY(-2deg);
      box-shadow: -8px 16px 28px rgba(0,0,0,0.22), -2px 4px 8px rgba(0,0,0,0.15);
    }
    .mag-spine-shadow {
      background: linear-gradient(to right, rgba(0,0,0,0.45) 0%, rgba(0,0,0,0.15) 6%, transparent 14%);
    }
  </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

  <!-- TOP BAR -->
  <div class="bg-slate-950 text-slate-300 text-xs py-2 border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-2">
      <div class="flex items-center space-x-6">
        <span class="flex items-center gap-1.5"><i class="fas fa-map-marker-alt text-orange-500"></i> <span data-th="บางปะหัน พระนครศรีอยุธยา" data-en="Bang Pahan, Ayutthaya">บางปะหัน พระนครศรีอยุธยา</span></span>
        <span class="flex items-center gap-1.5 whitespace-nowrap"><i class="fas fa-phone-alt text-orange-500"></i> 035-779-554, 035-779-555</span>
        <span class="hidden md:flex items-center gap-1.5 whitespace-nowrap"><i class="fas fa-envelope text-orange-500"></i> stframe_factory@stframe.com</span>
      </div>
      <div class="flex items-center space-x-4">
        <a href="http://202.80.235.61:2026" target="_blank" class="bg-slate-800 hover:bg-slate-700 text-orange-400 px-2.5 py-1 rounded transition text-xs font-medium flex items-center gap-1">
          <i class="fas fa-server"></i> ERP System
        </a>
        <div class="inline-flex rounded-md shadow-sm border border-slate-700 overflow-hidden bg-slate-900 p-0.5">
          <button class="lang-btn px-2 py-0.5 rounded text-xs transition active" data-lang="th">TH</button>
          <button class="lang-btn px-2 py-0.5 rounded text-xs transition" data-lang="en">EN</button>
        </div>
      </div>
    </div>
  </div>

  <!-- NAVBAR -->
  <header id="main-header" class="sticky top-0 z-50 bg-slate-950 backdrop-blur-md border-b border-slate-800/80 py-3">
    <div class="max-w-7xl 2xl:max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">
      <!-- LOGO -->
      <a href="index.html" class="flex items-center gap-3 group shrink-0">
        <div class="h-11 w-11 bg-white rounded-xl flex items-center justify-center p-1.5 shadow-md shrink-0 group-hover:scale-105 transition transform">
          <img src="assets/images/logo-icon.png" alt="ST. Frame & Truss Logo" class="h-full w-auto object-contain">
        </div>
        <div class="flex flex-col">
          <span class="text-xl font-bold tracking-tight text-white font-heading leading-tight group-hover:text-orange-400 transition">ST. FRAME & TRUSS</span>
          <span class="text-[10px] uppercase tracking-widest text-slate-400 font-medium whitespace-nowrap">Steel Structure Specialist Since 1992</span>
        </div>
      </a>

      <!-- DESKTOP NAVIGATION MENU & CTA -->
      <div class="hidden lg:flex items-center gap-3 xl:gap-5 2xl:gap-8">
        <nav class="flex items-center gap-0.5 xl:gap-1 text-[13px] xl:text-[13.5px] 2xl:text-sm">
          <a href="index.html" class="text-slate-200 hover:text-orange-400 font-medium px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="หน้าแรก" data-en="Home">หน้าแรก</a>
          <a href="about.html" class="text-slate-200 hover:text-orange-400 font-medium px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="เกี่ยวกับเรา" data-en="About Us">เกี่ยวกับเรา</a>
          <a href="services.html" class="text-slate-200 hover:text-orange-400 font-medium px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="บริการและโซลูชัน" data-en="Services">บริการและโซลูชัน</a>
          <a href="projects.html" class="text-slate-200 hover:text-orange-400 font-medium px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="ผลงานโครงการ" data-en="Projects">ผลงานโครงการ</a>
          <a href="technology.html" class="text-slate-200 hover:text-orange-400 font-medium px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="เทคโนโลยีและโรงงาน" data-en="Tech & Facility">เทคโนโลยีและโรงงาน</a>
          <a href="magazine.html" class="text-orange-500 font-semibold px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="ST Magazine" data-en="ST Magazine">ST Magazine</a>
          <a href="media.html" class="text-slate-200 hover:text-orange-400 font-medium px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="Media" data-en="Media">Media</a>
          <a href="careers.html" class="text-slate-200 hover:text-orange-400 font-medium px-2 xl:px-3 py-2 rounded-lg transition whitespace-nowrap" data-th="ร่วมงานกับเรา" data-en="Careers">ร่วมงานกับเรา</a>
        </nav>

        <!-- HEADER CTA BUTTON WITH SEPARATOR -->
        <div class="pl-3 xl:pl-5 border-l border-slate-800">
          <a href="contact.html" class="bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-semibold px-4 xl:px-5 py-2.5 rounded-xl shadow-md hover:shadow-orange-500/25 text-xs xl:text-sm transition transform hover:-translate-y-0.5 flex items-center gap-2 whitespace-nowrap shrink-0">
            <i class="fas fa-paper-plane text-xs"></i>
            <span data-th="ติดต่อเรา" data-en="Contact Us">ติดต่อเรา</span>
          </a>
        </div>
      </div>

      <!-- MOBILE HAMBURGER BUTTON -->
      <div class="lg:hidden flex items-center">
        <button id="mobile-menu-btn" type="button" class="text-slate-300 hover:text-white p-2 focus:outline-none" aria-label="Toggle menu">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </div>
  </header>

  <!-- MOBILE MENU DRAWER -->
  <div id="mobile-menu" class="fixed inset-0 z-50 bg-slate-950 backdrop-blur-lg hidden flex flex-col justify-between p-6 overflow-y-auto">
    <div>
      <div class="flex items-center justify-between border-b border-slate-800 pb-4">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center p-1.5 shadow-md shrink-0">
            <img src="assets/images/logo-icon.png" alt="ST. Frame & Truss Logo" class="h-full w-auto object-contain">
          </div>
          <span class="text-lg font-bold text-white font-heading">ST. FRAME & TRUSS</span>
        </div>
        <button id="close-mobile-menu" class="text-slate-400 hover:text-white p-2">
          <i class="fas fa-times text-2xl"></i>
        </button>
      </div>

      <nav class="mt-6 flex flex-col space-y-3">
        <a href="index.html" class="text-slate-200 hover:text-orange-400 font-medium py-2 text-base transition border-b border-slate-800/60" data-th="หน้าแรก" data-en="Home">หน้าแรก</a>
        <a href="about.html" class="text-slate-200 hover:text-orange-400 font-medium py-2 text-base transition border-b border-slate-800/60" data-th="เกี่ยวกับเรา" data-en="About Us">เกี่ยวกับเรา</a>
        <a href="services.html" class="text-slate-200 hover:text-orange-400 font-medium py-2 text-base transition border-b border-slate-800/60" data-th="บริการและโซลูชัน" data-en="Services">บริการและโซลูชัน</a>
        <a href="projects.html" class="text-slate-200 hover:text-orange-400 font-medium py-2 text-base transition border-b border-slate-800/60" data-th="ผลงานโครงการ" data-en="Projects">ผลงานโครงการ</a>
        <a href="technology.html" class="text-slate-200 hover:text-orange-400 font-medium py-2 text-base transition border-b border-slate-800/60" data-th="เทคโนโลยีและโรงงาน" data-en="Tech & Facility">เทคโนโลยีและโรงงาน</a>
        <a href="magazine.html" class="text-orange-500 font-semibold py-2 text-base transition border-b border-slate-800/60" data-th="ST Magazine" data-en="ST Magazine">ST Magazine</a>
        <a href="media.html" class="text-slate-200 hover:text-orange-400 font-medium py-2 text-base transition border-b border-slate-800/60" data-th="Media" data-en="Media">Media</a>
        <a href="careers.html" class="text-slate-200 hover:text-orange-400 font-medium py-2 text-base transition border-b border-slate-800/60" data-th="ร่วมงานกับเรา" data-en="Careers">ร่วมงานกับเรา</a>
      </nav>
    </div>

    <div class="space-y-4 pt-6 border-t border-slate-800">
      <a href="contact.html" class="w-full text-center block bg-orange-600 hover:bg-orange-500 text-white font-semibold py-3 rounded-lg shadow-lg">
        <span data-th="ติดต่อเรา" data-en="Contact Us">ติดต่อเรา</span>
      </a>
      <div class="text-center text-xs text-slate-400">
        <i class="fas fa-phone mr-1 text-orange-500"></i> 035-779-554 | 035-779-555
      </div>
    </div>
  </div>

  <main class="flex-grow">
    
    <!-- HERO BANNER -->
    <section class="bg-slate-950 text-white py-16 lg:py-20 relative overflow-hidden">
      <img src="assets/images/hero-factory.jpg" alt="ST. Frame & Truss Factory" class="absolute inset-0 w-full h-full object-cover object-center opacity-40 lg:opacity-50 pointer-events-none transform filter brightness-105">
      <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-950/70 to-slate-950/30 z-0"></div>
      <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
      <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl xl:max-w-5xl space-y-4">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-500/20 text-orange-400 text-xs font-semibold whitespace-nowrap">
            <i class="fas fa-book-open"></i> <span data-th="วารสารและแคตตาล็อกรายเดือน (Monthly Publication)" data-en="Monthly Engineering Publications & Catalog">วารสารและแคตตาล็อกรายเดือน (Monthly Publication)</span>
          </div>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-white tracking-tight" data-th="ST Magazine & Engineering Catalog" data-en="ST Magazine & Engineering Catalog">
            ST Magazine & Engineering Catalog
          </h1>
          <p class="text-slate-300 text-base sm:text-lg font-light leading-relaxed" data-th="วารสารรายเดือนรวมเล่ม รวบรวมองค์ความรู้ด้านวิศวกรรมโครงสร้างเหล็ก นวัตกรรมแบบจำลอง<br class='hidden sm:inline'> 3D BIM Tekla ความคืบหน้าโครงการก่อสร้างระดับชาติ และกิจกรรมความปลอดภัยของ <span class='whitespace-nowrap'>ST. Frame &amp; Truss</span>" data-en="Monthly technical publications covering steel engineering breakthroughs, BIM Tekla workflows, safety standards, and landmark construction milestones.">
            วารสารรายเดือนรวมเล่ม รวบรวมองค์ความรู้ด้านวิศวกรรมโครงสร้างเหล็ก นวัตกรรมแบบจำลอง<br class="hidden sm:inline"> 3D BIM Tekla ความคืบหน้าโครงการก่อสร้างระดับชาติ และกิจกรรมความปลอดภัยของ <span class="whitespace-nowrap">ST. Frame &amp; Truss</span>
          </p>
        </div>
      </div>
    </section>

    <!-- YEAR NAVIGATION / TAB SELECTOR -->
    <section class="bg-slate-900 border-b border-slate-800 text-white sticky top-[69px] z-40 shadow-md">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2 text-xs text-slate-400 font-medium">
          <i class="fas fa-calendar-alt text-orange-500"></i>
          <span data-th="เลือกปีวารสาร:" data-en="Select Year:">เลือกปีวารสาร:</span>
        </div>
        
        <!-- Year Tabs -->
        <div class="flex flex-wrap items-center gap-1.5 sm:gap-2">
          <button onclick="renderMagazines('2026')" id="tab-2026" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-bold bg-orange-600 text-white transition shadow">
            <span data-th="2026 (ปีปัจจุบัน)" data-en="2026 (Current Year)">2026 (ปีปัจจุบัน)</span>
          </button>
          <button onclick="renderMagazines('2025')" id="tab-2025" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2025
          </button>
          <button onclick="renderMagazines('2024')" id="tab-2024" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2024
          </button>
          <button onclick="renderMagazines('2023')" id="tab-2023" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2023
          </button>
          <button onclick="renderMagazines('2022')" id="tab-2022" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2022
          </button>
          <button onclick="renderMagazines('2021')" id="tab-2021" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2021
          </button>
          <button onclick="renderMagazines('2020')" id="tab-2020" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2020
          </button>
          <button onclick="renderMagazines('2019')" id="tab-2019" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2019
          </button>
          <button onclick="renderMagazines('2018')" id="tab-2018" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            2018
          </button>
          <button onclick="renderMagazines('all')" id="tab-all" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            <i class="fas fa-archive mr-1"></i> <span data-th="ทุกฉบับ (90+ เล่ม)" data-en="All Issues (90+ Editions)">ทุกฉบับ (90+ เล่ม)</span>
          </button>
        </div>
      </div>
    </section>

    <!-- MAGAZINE GRID SECTION -->
    <section class="py-16 bg-slate-50 min-h-[600px]">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header & Stats Bar -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 border-b border-slate-200 pb-6">
          <div>
            <div class="flex items-center gap-2 text-xs font-bold text-orange-600 uppercase tracking-widest mb-1">
              <span class="w-2 h-2 rounded-full bg-orange-500 animate-ping"></span>
              <span id="mag-section-badge">ST MAGAZINE • YEAR 2026</span>
            </div>
            <h2 id="mag-section-title" class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900">
              <span data-th="วารสาร ST Magazine ประจำปี 2026" data-en="ST Magazine Issues 2026">วารสาร ST Magazine ประจำปี 2026</span>
            </h2>
          </div>
          
          <!-- Quick Search & Count -->
          <div class="flex items-center gap-3">
            <div class="relative">
              <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
              <input type="text" id="mag-search" oninput="searchMagazines(this.value)" placeholder="ค้นหาตามเดือน หรือ ปี..." data-th="ค้นหาตามเดือน หรือ ปี..." data-en="Search by month or year..." class="pl-8 pr-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none w-48 sm:w-56">
            </div>
            <span id="mag-count-badge" class="bg-orange-100 text-orange-700 font-bold text-xs px-3 py-1.5 rounded-lg whitespace-nowrap shadow-sm">
              <span data-th="7 ฉบับ" data-en="7 Issues">7 ฉบับ</span>
            </span>
          </div>
        </div>

        <!-- Dynamic Magazine Cards Grid -->
        <div id="magazines-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 lg:gap-8">
          <!-- Rendered dynamically via JavaScript -->
        </div>

      </div>
    </section>

    <!-- ARCHIVE GOOGLE DRIVE EMBED HELPER SECTION -->
    <section class="py-12 bg-white border-t border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="p-6 sm:p-8 bg-slate-900 rounded-2xl text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
          <div class="space-y-2 text-center md:text-left">
            <div class="inline-flex items-center gap-2 text-xs font-semibold text-orange-400">
              <i class="fab fa-google-drive"></i> <span>GOOGLE DRIVE ARCHIVE REPOSITORY</span>
            </div>
            <h3 data-th="ต้องการเข้าถึงโฟลเดอร์ต้นฉบับทั้งหมด?" data-en="Looking for Complete Master Archives?" class="text-xl sm:text-2xl font-bold font-heading text-white">ต้องการเข้าถึงโฟลเดอร์ต้นฉบับทั้งหมด?</h3>
            <p class="text-xs sm:text-sm text-slate-400 max-w-xl">
              <span data-th="สามารถเปิดดูคลังโฟลเดอร์วารสารฉบับสมบูรณ์ (High-Resolution PDF) โดยตรงผ่าน Google Drive ของบริษัท ST. Frame & Truss" data-en="Access complete high-resolution PDF archives directly via official ST. Frame & Truss Google Drive repositories.">สามารถเปิดดูคลังโฟลเดอร์วารสารฉบับสมบูรณ์ (High-Resolution PDF) โดยตรงผ่าน Google Drive ของบริษัท ST. Frame & Truss</span>
            </p>
          </div>
          <div class="flex flex-wrap items-center gap-3 shrink-0">
            <a href="https://docs.google.com/folderview?id=1a07b7VicHxwVhvGzS60IIH0b_vrccgs4" target="_blank" rel="noopener noreferrer" class="px-5 py-3 rounded-xl bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs flex items-center gap-2 transition shadow-lg">
              <i class="fab fa-google-drive text-base"></i> <span data-th="เปิดคลัง Drive 2026" data-en="Open Drive 2026">เปิดคลัง Drive 2026</span>
            </a>
            <a href="https://docs.google.com/folderview?id=1U6iWYeCHahjyxyfggtOFSxVlnuheMH46" target="_blank" rel="noopener noreferrer" class="px-5 py-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-semibold text-xs flex items-center gap-2 transition">
              <i class="fab fa-google-drive"></i> <span data-th="คลัง Drive 2025" data-en="Drive 2025">คลัง Drive 2025</span>
            </a>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- PDF VIEWER MODAL (LIGHTBOX) -->
  <div id="pdf-modal" class="fixed inset-0 z-50 bg-slate-950/85 backdrop-blur-sm hidden flex items-center justify-center p-3 sm:p-6">
    <div class="bg-slate-900 w-full max-w-5xl h-[90vh] rounded-2xl overflow-hidden shadow-2xl border border-slate-700 flex flex-col">
      <!-- Modal Header -->
      <div class="px-5 py-3.5 bg-slate-950 border-b border-slate-800 flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="w-7 h-7 bg-white rounded-md flex items-center justify-center p-0.5 shrink-0">
            <img src="assets/images/logo-icon.png" alt="ST Logo" class="h-full w-auto object-contain">
          </div>
          <div>
            <h4 id="pdf-modal-title" class="text-sm font-bold text-white font-heading truncate max-w-xs sm:max-w-md">ST Magazine</h4>
            <p class="text-[10px] text-slate-400">PDF E-Book Reader • ST. Frame & Truss Co., Ltd.</p>
          </div>
        </div>
        <div class="flex items-center gap-2">
          <a id="pdf-modal-download" href="#" target="_blank" rel="noopener noreferrer" class="px-3.5 py-1.5 rounded-lg bg-orange-600 hover:bg-orange-500 text-white font-bold text-xs flex items-center gap-1.5 transition shadow">
            <i class="fas fa-download"></i> <span class="hidden sm:inline" data-th="ดาวน์โหลดไฟล์ PDF" data-en="Download PDF">ดาวน์โหลดไฟล์ PDF</span>
          </a>
          <a id="pdf-modal-drive" href="#" target="_blank" rel="noopener noreferrer" class="px-3.5 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 border border-slate-700 font-semibold text-xs flex items-center gap-1.5 transition">
            <i class="fab fa-google-drive"></i> <span class="hidden sm:inline" data-th="เปิดใน Drive" data-en="Open in Drive">เปิดใน Drive</span>
          </a>
          <button onclick="closePdfModal()" class="w-8 h-8 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white flex items-center justify-center transition ml-1">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <!-- Modal Body (iFrame) -->
      <div class="flex-1 bg-slate-950 relative">
        <div id="pdf-loading" class="absolute inset-0 flex flex-col items-center justify-center text-slate-400 gap-3 z-0">
          <i class="fas fa-circle-notch fa-spin text-3xl text-orange-500"></i>
          <span class="text-xs"><span data-th="กำลังโหลดเอกสาร PDF E-Book..." data-en="Loading PDF E-Book...">กำลังโหลดเอกสาร PDF E-Book...</span></span>
        </div>
        <iframe id="pdf-iframe" src="" class="w-full h-full border-0 relative z-10" allow="autoplay" onload="document.getElementById('pdf-loading').style.display='none'"></iframe>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="bg-slate-950 text-slate-300 border-t border-slate-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10">
        
        <!-- Col 1: Company Profile -->
        <div class="lg:col-span-2 space-y-4">
          <div class="flex items-center gap-3">
            <div class="h-10 w-10 bg-white rounded-xl flex items-center justify-center p-1.5 shadow-md shrink-0">
              <img src="assets/images/logo-icon.png" alt="ST. Frame & Truss Logo" class="h-full w-auto object-contain">
            </div>
            <span class="text-lg font-bold text-white font-heading">ST. FRAME & TRUSS CO., LTD.</span>
          </div>
          <p class="text-xs text-slate-400 leading-relaxed" data-th="บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ผู้เชี่ยวชาญด้านงานออกแบบ ผลิต และติดตั้งโครงสร้างเหล็ก หลังคาโครงถัก และงานวิศวกรรมโครงสร้างครบวงจรตั้งแต่ปี พ.ศ. 2535" data-en="ST. Frame & Truss Co., Ltd. is a turnkey steel structure contractor specializing in engineering design, BIM Tekla, fabrication, and erection since 1992.">
            บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด ผู้เชี่ยวชาญด้านงานออกแบบ ผลิต และติดตั้งโครงสร้างเหล็ก หลังคาโครงถัก และงานวิศวกรรมโครงสร้างครบวงจรตั้งแต่ปี พ.ศ. 2535
          </p>
          <div class="pt-2 text-xs space-y-1.5 text-slate-300">
            <p class="flex items-start gap-1.5"><i class="fas fa-map-marker-alt text-orange-500 w-4 shrink-0 mt-0.5"></i> <span class="leading-relaxed" data-th="29/4, 29/15, 29/14, 29/17 หมู่ 3 ต.โพธิ์สามต้น<br>อ.บางปะหัน จ.พระนครศรีอยุธยา 13220" data-en="29/4, 29/15, 29/14, 29/17 Moo 3, Pho Sam Ton,<br>Bang Pahan, Phra Nakhon Si Ayutthaya 13220, Thailand">29/4, 29/15, 29/14, 29/17 หมู่ 3 ต.โพธิ์สามต้น<br>อ.บางปะหัน จ.พระนครศรีอยุธยา 13220</span></p>
            <p><i class="fas fa-phone text-orange-500 w-4"></i> 035-779-554, 035-779-555</p>
            <p><i class="fas fa-envelope text-orange-500 w-4"></i> stframe_factory@stframe.com</p>
            <p><i class="fas fa-clock text-orange-500 w-4"></i> <span data-th="เวลาทำการ: จันทร์ - เสาร์ 08:00 - 17:00" data-en="Working Hours: Mon - Sat 08:00 - 17:00">เวลาทำการ: จันทร์ - เสาร์ 08:00 - 17:00</span></p>
          </div>
        </div>

        <!-- Col 2: Quick Links -->
        <div class="space-y-3">
          <h4 class="text-white font-bold font-heading text-sm uppercase tracking-wider" data-th="เมนูหลัก" data-en="Navigation">เมนูหลัก</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="index.html" class="hover:text-orange-400 transition" data-th="หน้าแรก" data-en="Home">หน้าแรก</a></li>
            <li><a href="about.html" class="hover:text-orange-400 transition" data-th="เกี่ยวกับเรา" data-en="About Us">เกี่ยวกับเรา</a></li>
            <li><a href="services.html" class="hover:text-orange-400 transition" data-th="บริการและโซลูชัน" data-en="Services">บริการและโซลูชัน</a></li>
            <li><a href="projects.html" class="hover:text-orange-400 transition" data-th="ผลงานโครงการ" data-en="Projects">ผลงานโครงการ</a></li>
            <li><a href="technology.html" class="hover:text-orange-400 transition" data-th="เทคโนโลยีและโรงงาน" data-en="Tech & Facility">เทคโนโลยีและโรงงาน</a></li>
            <li><a href="careers.html" class="hover:text-orange-400 transition" data-th="ร่วมงานกับเรา" data-en="Careers">ร่วมงานกับเรา</a></li>
          </ul>
        </div>

        <!-- Col 3: Services -->
        <div class="space-y-3">
          <h4 class="text-white font-bold font-heading text-sm uppercase tracking-wider" data-th="บริการของเรา" data-en="Our Services">บริการของเรา</h4>
          <ul class="space-y-2 text-xs">
            <li><a href="services.html#bim" class="hover:text-orange-400 transition">BIM Tekla Structures</a></li>
            <li><a href="services.html#truss" class="hover:text-orange-400 transition">Roof Truss & Super Truss</a></li>
            <li><a href="services.html#cellular" class="hover:text-orange-400 transition">Cellular Beam & PEB</a></li>
            <li><a href="services.html#erection" class="hover:text-orange-400 transition">Steel Erection & Installation</a></li>
            <li><a href="services.html#crane" class="hover:text-orange-400 transition">Crane Girder & Pipe Rack</a></li>
          </ul>
        </div>

        <!-- Col 4: Corporate & Portal -->
        <div class="space-y-3">
          <h4 class="text-white font-bold font-heading text-sm uppercase tracking-wider" data-th="ระบบและนโยบาย" data-en="System & Policy">ระบบและนโยบาย</h4>
          <ul class="space-y-2 text-xs">
            <li>
              <a href="http://202.80.235.61:2026" target="_blank" class="hover:text-orange-400 transition flex items-center gap-1.5">
                <i class="fas fa-lock text-orange-500"></i> ERP Internal Portal
              </a>
            </li>
            <li><a href="magazine.html" class="hover:text-orange-400 transition">ST Magazine</a></li>
            <li><a href="media.html" class="hover:text-orange-400 transition" data-th="วิดีโอและสื่อ (Media)" data-en="Media Center">วิดีโอและสื่อ (Media)</a></li>
                        <li>
              <button type="button" onclick="openCctvModal()" class="hover:text-orange-400 transition cursor-pointer text-left" data-th="นโยบายกล้องวงจรปิด (CCTV)" data-en="CCTV Privacy Policy">นโยบายกล้องวงจรปิด (CCTV)</button>
            </li>
            <li><a href="contact.html#pdpa" class="hover:text-orange-400 transition" data-th="นโยบายความเป็นส่วนตัว (PDPA)" data-en="Privacy Policy">นโยบายความเป็นส่วนตัว (PDPA)</a></li>
          </ul>
        </div>

      </div>

      <!-- Bottom Bar -->
      <div class="mt-12 pt-8 border-t border-slate-800 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-500 gap-4">
        <p>© 2026 ST. Frame & Truss Co., Ltd. All Rights Reserved.</p>
        <div class="flex items-center space-x-4">
          <a href="#" class="hover:text-white"><i class="fab fa-facebook text-base"></i></a>
          <a href="#" class="hover:text-white"><i class="fab fa-line text-base"></i></a>
          <a href="#" class="hover:text-white"><i class="fab fa-youtube text-base"></i></a>
        </div>
      </div>
    </div>
  </footer>

  <!-- DATA & SCRIPTS -->
  <script src="assets/magazines_db.js?v=2"></script>
  <script src="assets/js/main.js?v=3"></script>
  
  <script>
    let currentYear = '2026';
    let currentSearch = '';

    function renderMagazines(year) {
      currentYear = year;
      
      // Update Tab Styles
      document.querySelectorAll('.mag-tab').forEach(btn => {
        btn.classList.remove('bg-orange-600', 'text-white', 'shadow');
        btn.classList.add('bg-slate-800', 'text-slate-300');
      });
      const activeTab = document.getElementById('tab-' + year);
      if (activeTab) {
        activeTab.classList.remove('bg-slate-800', 'text-slate-300');
        activeTab.classList.add('bg-orange-600', 'text-white', 'shadow');
      }

      const currentLang = localStorage.getItem('stframe_lang') || 'th';
      const isEn = currentLang === 'en';

      // Collect issues
      let issues = [];
      if (year === 'all') {
        Object.keys(ST_MAGAZINES_DB).sort((a,b) => b - a).forEach(y => {
          issues = issues.concat(ST_MAGAZINES_DB[y]);
        });
        document.getElementById('mag-section-badge').innerText = 'ST MAGAZINE • COMPLETE ARCHIVE (2018 - 2026)';
        document.getElementById('mag-section-title').innerText = isEn ? 'ST Magazine Complete Archives (2018 - 2026)' : 'คลังวารสาร ST Magazine ทุกฉบับย้อนหลัง';
      } else {
        issues = ST_MAGAZINES_DB[year] || [];
        document.getElementById('mag-section-badge').innerText = `ST MAGAZINE • YEAR ${year}`;
        document.getElementById('mag-section-title').innerText = isEn ? `ST Magazine Issues ${year}` : `วารสาร ST Magazine ประจำปี ${year}`;
      }

      // Filter by search query if any
      if (currentSearch.trim()) {
        const q = currentSearch.trim().toLowerCase();
        issues = issues.filter(item => 
          item.title_th.toLowerCase().includes(q) ||
          item.title_en.toLowerCase().includes(q) ||
          item.month_th.toLowerCase().includes(q) ||
          (item.month_en && item.month_en.toLowerCase().includes(q)) ||
          item.year.includes(q)
        );
      }

      document.getElementById('mag-count-badge').innerText = isEn ? `${issues.length} Issues` : `${issues.length} ฉบับ`;

      const grid = document.getElementById('magazines-grid');
      if (!grid) return;

      if (issues.length === 0) {
        grid.innerHTML = `
          <div class="col-span-full py-16 text-center text-slate-400">
            <i class="fas fa-search text-4xl mb-3 text-slate-300"></i>
            <p class="text-sm">${isEn ? 'No magazines found matching your search' : 'ไม่พบวารสารที่ตรงกับคำค้นหา'}</p>
          </div>
        `;
        return;
      }

      grid.innerHTML = issues.map(item => {
        const isLatest = (item.year === '2026' && item.month_num === 7);
        const titlePrimary = isEn ? (item.title_en || item.title_th) : item.title_th;
        const titleSecondary = isEn ? item.title_th : `${item.title_en} • ฉบับเต็ม E-Book`;
        const readText = isEn ? 'Read E-Book' : 'เปิดอ่าน E-Book';
        const yearLabel = isEn ? `Year ${item.year}` : `ปี ${item.year}`;
        const latestLabel = isEn ? 'Latest Issue' : 'ฉบับล่าสุดประจำเดือน';
        const monthLabel = isEn ? `${item.month_en || item.month_th} ${item.year}` : `${item.month_th} ${item.year}`;

        return `
        <div class="steel-card bg-white rounded-2xl overflow-hidden ${isLatest ? 'border-2 border-orange-500 shadow-md ring-2 ring-orange-500/20' : 'border border-slate-200 shadow-sm'} hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
          <div>
            ${isLatest ? `
            <!-- Top Highlight Strip -->
            <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-orange-500 text-white text-[11px] font-bold py-1.5 px-4 flex items-center justify-between">
              <span class="flex items-center gap-1.5"><i class="fas fa-star text-amber-200 animate-pulse"></i> <span>${latestLabel}</span></span>
              <span class="bg-black/20 backdrop-blur-sm text-white px-2 py-0.5 rounded text-[10px] font-semibold">${monthLabel}</span>
            </div>
            ` : ''}

            <!-- Realistic 3D Magazine Cover Presentation -->
            <div class="mag-cover-wrap p-4 bg-slate-100/70 border-b border-slate-100 flex justify-center items-center">
              <div class="mag-cover-card relative w-full aspect-[3/4.2] rounded-r-lg rounded-l-sm overflow-hidden bg-slate-900 cursor-pointer" onclick="openPdfModal('${item.preview_url}', '${titlePrimary.replace(/'/g, "\\'")}', '${item.download_url}', '${item.view_url}')">
                <img src="${item.cover_img}" alt="${titlePrimary}" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500 ease-out" loading="lazy" onerror="this.onerror=null; this.src='https://drive.google.com/thumbnail?id=${item.id}&sz=w600';" decoding="async">
                
                <!-- Magazine spine shadow overlay for book depth -->
                <div class="mag-spine-shadow absolute inset-y-0 left-0 w-8 pointer-events-none z-10"></div>
                
                <!-- Bottom gradient overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent pointer-events-none opacity-0 group-hover:opacity-100 transition duration-300 z-10"></div>
                
                <!-- Top Right Year/Issue Tag -->
                ${isLatest ? `
                  <span class="absolute top-2.5 right-2.5 bg-orange-600 text-white font-bold text-[10px] px-2 py-0.5 rounded shadow z-20 flex items-center gap-1"><i class="fas fa-star text-[9px] text-amber-200"></i> ${item.issue_label}</span>
                ` : `
                  <span class="absolute top-2.5 right-2.5 bg-slate-950/85 backdrop-blur-md text-white font-bold text-[10px] px-2 py-0.5 rounded shadow z-20">${item.issue_label}</span>
                `}
                
                <!-- Center Hover Play Button -->
                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 z-20">
                  <div class="w-12 h-12 rounded-full bg-orange-600 text-white flex items-center justify-center shadow-xl transform group-hover:scale-110 transition">
                    <i class="fas fa-book-open text-base ml-0.5"></i>
                  </div>
                </div>
              </div>
            </div>

            <!-- Issue Details -->
            <div class="p-5 space-y-1.5">
              <div class="flex items-center justify-between text-xs text-orange-600 font-bold">
                <span class="tracking-wider uppercase">ST. FRAME & TRUSS</span>
                <span class="text-slate-400 font-medium">${yearLabel}</span>
              </div>
              <h3 class="font-extrabold text-base font-heading text-slate-900 group-hover:text-orange-600 transition leading-snug">
                ${titlePrimary}
              </h3>
              <p class="text-[11px] text-slate-500 font-light">
                ${titleSecondary}
              </p>
            </div>
          </div>

          <!-- Bottom Action Buttons -->
          <div class="px-5 pb-5 pt-3 border-t border-slate-100 flex items-center gap-2">
            <button onclick="openPdfModal('${item.preview_url}', '${titlePrimary.replace(/'/g, "\\'")}', '${item.download_url}', '${item.view_url}')" class="flex-1 py-2.5 rounded-xl ${isLatest ? 'bg-orange-600 hover:bg-orange-700' : 'bg-slate-900 hover:bg-orange-600'} text-white font-bold text-xs flex items-center justify-center gap-2 transition shadow-sm">
              <i class="fas fa-book-open text-xs"></i> <span>${readText}</span>
            </button>
            <a href="${item.download_url}" target="_blank" rel="noopener noreferrer" class="px-3 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 hover:text-orange-600 text-slate-800 font-semibold text-xs flex items-center justify-center transition" title="${isEn ? 'Download PDF' : 'ดาวน์โหลด PDF'}">
              <i class="fas fa-download"></i>
            </a>
            <a href="${item.view_url}" target="_blank" rel="noopener noreferrer" class="px-3 py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-xs flex items-center justify-center transition" title="${isEn ? 'Open in Google Drive' : 'เปิดใน Google Drive'}">
              <i class="fab fa-google-drive"></i>
            </a>
          </div>
        </div>
      `;}).join('');
    }

    window.addEventListener('stframe_language_change', function() {
      renderMagazines(currentYear);
    });

    function searchMagazines(query) {
      currentSearch = query;
      renderMagazines(currentYear);
    }

    // PDF Lightbox Modal Functions
    function openPdfModal(previewUrl, title, downloadUrl, driveUrl) {
      document.getElementById('pdf-modal-title').innerText = title;
      document.getElementById('pdf-modal-download').href = downloadUrl;
      document.getElementById('pdf-modal-drive').href = driveUrl;
      
      const loading = document.getElementById('pdf-loading');
      if (loading) loading.style.display = 'flex';

      const iframe = document.getElementById('pdf-iframe');
      iframe.src = previewUrl;

      const modal = document.getElementById('pdf-modal');
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
    }

    function closePdfModal() {
      const modal = document.getElementById('pdf-modal');
      modal.classList.add('hidden');
      document.getElementById('pdf-iframe').src = '';
      document.body.style.overflow = '';
    }

    // Close on backdrop click
    document.addEventListener('DOMContentLoaded', () => {
      const modal = document.getElementById('pdf-modal');
      if (modal) {
        modal.addEventListener('click', (e) => {
          if (e.target === modal) closePdfModal();
        });
      }
      // Initial render for year 2026
      renderMagazines('2026');
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closePdfModal();
    });
  </script>

</body>
</html>
