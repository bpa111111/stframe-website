<?php
/**
 * Template Name: Magazine
 *
 * @package ST_Frame
 */

get_header();

// Query all magazines from WordPress database
$mag_args = array(
	'post_type'      => 'st_magazine',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby'        => array(
		'menu_order' => 'ASC',
		'date'       => 'DESC',
	),
);
$mag_query = new WP_Query( $mag_args );

$magazines_by_year = array();
$all_issues_count = 0;

if ( $mag_query->have_posts() ) {
	while ( $mag_query->have_posts() ) {
		$mag_query->the_post();
		$pid = get_the_ID();

		// Year
		$year = get_field( 'year', $pid ) ?: get_post_meta( $pid, 'year', true );
		if ( ! $year ) {
			$terms = wp_get_post_terms( $pid, 'magazine_year' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				$year = $terms[0]->name;
			} else {
				$year = get_the_date( 'Y' );
			}
		}
		$year = (string) $year;

		// Months & Titles
		$month_num    = (int) ( get_field( 'month_num', $pid ) ?: get_post_meta( $pid, 'month_num', true ) ?: 1 );
		$month_th     = get_field( 'month_th', $pid ) ?: get_post_meta( $pid, 'month_th', true ) ?: '';
		$month_en     = get_field( 'month_en', $pid ) ?: get_post_meta( $pid, 'month_en', true ) ?: '';
		$title_th     = get_the_title();
		$title_en     = get_field( 'title_en', $pid ) ?: get_post_meta( $pid, 'title_en', true ) ?: $title_th;
		$issue_label  = get_field( 'issue_label', $pid ) ?: get_post_meta( $pid, 'issue_label', true ) ?: '';

		// URLs & Files
		$pdf_file     = get_field( 'pdf_file', $pid ) ?: get_post_meta( $pid, 'pdf_file', true ) ?: '';
		$view_url     = get_field( 'view_url', $pid ) ?: get_post_meta( $pid, 'view_url', true ) ?: '';
		$preview_url  = get_field( 'preview_url', $pid ) ?: get_post_meta( $pid, 'preview_url', true ) ?: '';
		$download_url = get_field( 'download_url', $pid ) ?: get_post_meta( $pid, 'download_url', true ) ?: '';

		// Automatic fallbacks for direct uploaded PDF files
		if ( $pdf_file ) {
			if ( ! $preview_url )  $preview_url  = $pdf_file;
			if ( ! $download_url ) $download_url = $pdf_file;
			if ( ! $view_url )     $view_url     = $pdf_file;
		} else {
			if ( ! $preview_url && $view_url )  $preview_url  = $view_url;
			if ( ! $download_url && $view_url ) $download_url = $view_url;
		}

		// Thumbnail / Cover image
		$cover_img = get_the_post_thumbnail_url( $pid, 'large' );
		if ( ! $cover_img ) {
			$rel_cover = get_post_meta( $pid, 'cover_img_rel', true );
			if ( $rel_cover ) {
				$cover_img = get_template_directory_uri() . '/' . ltrim( $rel_cover, '/' );
			} else {
				$cover_img = get_template_directory_uri() . '/assets/images/hero-factory.jpg';
			}
		}

		if ( ! isset( $magazines_by_year[ $year ] ) ) {
			$magazines_by_year[ $year ] = array();
		}

		$magazines_by_year[ $year ][] = array(
			'id'           => (string) $pid,
			'year'         => $year,
			'month_num'    => $month_num,
			'month_th'     => $month_th,
			'month_en'     => $month_en,
			'title_th'     => $title_th,
			'title_en'     => $title_en,
			'issue_label'  => $issue_label,
			'view_url'     => $view_url,
			'preview_url'  => $preview_url,
			'download_url' => $download_url,
			'cover_img'    => $cover_img,
			'menu_order'   => (int) get_post_field( 'menu_order', $pid ),
		);

		$all_issues_count++;
	}
	wp_reset_postdata();
}

// Sort years descending (newest year first: 2026, 2025, 2024...)
krsort( $magazines_by_year );

// Sort issues in each year by month_num descending, then menu_order ASC
foreach ( $magazines_by_year as $yr => &$items ) {
	usort( $items, function( $a, $b ) {
		if ( (int) $a['month_num'] !== (int) $b['month_num'] ) {
			return (int) $b['month_num'] - (int) $a['month_num'];
		}
		return (int) $a['menu_order'] - (int) $b['menu_order'];
	} );
}
unset( $items );

$years_list = array_keys( $magazines_by_year );
$latest_year = ! empty( $years_list ) ? $years_list[0] : '2026';
$latest_item_id = ( ! empty( $latest_year ) && ! empty( $magazines_by_year[ $latest_year ] ) )
	? $magazines_by_year[ $latest_year ][0]['id']
	: '';
?>

</div>

  <main class="flex-grow">
    
    <!-- HERO BANNER -->
    <section class="bg-slate-950 text-white py-16 lg:py-20 relative overflow-hidden">
      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-factory.jpg" alt="ST. Frame & Truss Factory" class="absolute inset-0 w-full h-full object-cover object-center opacity-40 lg:opacity-50 pointer-events-none transform filter brightness-105">
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
          <?php foreach ( $years_list as $idx => $y ) : 
            $is_active = ( $y === $latest_year );
          ?>
            <button onclick="renderMagazines('<?php echo esc_attr( $y ); ?>')" id="tab-<?php echo esc_attr( $y ); ?>" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs <?php echo $is_active ? 'font-bold bg-orange-600 text-white shadow' : 'font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white'; ?> transition">
              <?php if ( $idx === 0 ) : ?>
                <span data-th="<?php echo esc_attr( $y ); ?> (ปีล่าสุด)" data-en="<?php echo esc_attr( $y ); ?> (Latest)"><?php echo esc_html( $y ); ?> (ปีล่าสุด)</span>
              <?php else : ?>
                <span><?php echo esc_html( $y ); ?></span>
              <?php endif; ?>
            </button>
          <?php endforeach; ?>
          <button onclick="renderMagazines('all')" id="tab-all" class="mag-tab px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-slate-800 text-slate-300 hover:bg-slate-700 hover:text-white transition">
            <i class="fas fa-archive mr-1"></i> <span data-th="ทุกฉบับ (<?php echo esc_attr( $all_issues_count ); ?> เล่ม)" data-en="All Issues (<?php echo esc_attr( $all_issues_count ); ?> Editions)">ทุกฉบับ (<?php echo esc_html( $all_issues_count ); ?> เล่ม)</span>
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
              <span id="mag-section-badge">ST MAGAZINE • YEAR <?php echo esc_html( $latest_year ); ?></span>
            </div>
            <h2 id="mag-section-title" class="text-2xl sm:text-3xl font-extrabold font-heading text-slate-900">
              <span data-th="วารสาร ST Magazine ประจำปี <?php echo esc_attr( $latest_year ); ?>" data-en="ST Magazine Issues <?php echo esc_attr( $latest_year ); ?>">วารสาร ST Magazine ประจำปี <?php echo esc_html( $latest_year ); ?></span>
            </h2>
          </div>
          
          <!-- Quick Search, Sort & Count Controls -->
          <div class="flex flex-wrap items-center gap-2.5 sm:gap-3">
            <!-- Sort Toggle Button Group -->
            <div class="inline-flex items-center p-1 bg-slate-100 border border-slate-200 rounded-xl text-xs shadow-xs">
              <span class="text-[11px] text-slate-500 font-semibold pl-2 pr-1.5 hidden sm:inline-flex items-center gap-1">
                <i class="fas fa-sort text-slate-400 text-[10px]"></i>
                <span data-th="เรียงลำดับ:" data-en="Sort:">เรียงลำดับ:</span>
              </span>
              <button type="button" id="sort-desc-btn" onclick="setMagazineSort('desc')" class="px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5 bg-orange-600 text-white shadow-xs" title="เรียงจากฉบับล่าสุด / ท้ายปีก่อน (Latest First)">
                <i class="fas fa-arrow-down-wide-short text-[11px]"></i>
                <span data-th="ฉบับล่าสุดก่อน" data-en="Latest First">ฉบับล่าสุดก่อน</span>
              </button>
              <button type="button" id="sort-asc-btn" onclick="setMagazineSort('asc')" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-200/60 transition-all flex items-center gap-1.5" title="เรียงจากฉบับต้นปี มกราคมก่อน (Earliest First)">
                <i class="fas fa-arrow-up-wide-short text-[11px]"></i>
                <span data-th="ฉบับต้นปีก่อน" data-en="Earliest First">ฉบับต้นปีก่อน</span>
              </button>
            </div>

            <!-- Quick Search -->
            <div class="relative">
              <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
              <input type="text" id="mag-search" oninput="searchMagazines(this.value)" placeholder="ค้นหาตามเดือน หรือ ปี..." data-th="ค้นหาตามเดือน หรือ ปี..." data-en="Search by month or year..." class="pl-8 pr-3 py-1.5 bg-white border border-slate-300 rounded-lg text-xs focus:ring-2 focus:ring-orange-500 focus:outline-none w-36 sm:w-48">
            </div>

            <!-- Count Badge -->
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
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-icon.png" alt="ST Logo" class="h-full w-auto object-contain">
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

<!-- DATA & SCRIPTS -->
  <script>
    window.ST_MAGAZINES_DB = <?php echo wp_json_encode( $magazines_by_year, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?> || {};
    window.ST_LATEST_MAGAZINE_ID = <?php echo wp_json_encode( (string) $latest_item_id ); ?>;
    window.ST_DEFAULT_YEAR = <?php echo wp_json_encode( (string) $latest_year ); ?>;

    let currentYear = window.ST_DEFAULT_YEAR || '2026';
    let currentSearch = '';
    let currentSortOrder = localStorage.getItem('stframe_mag_sort') || 'desc'; // 'desc' = ฉบับล่าสุดก่อน, 'asc' = ฉบับต้นปีก่อน

    function updateSortButtonsUI() {
      const descBtn = document.getElementById('sort-desc-btn');
      const ascBtn = document.getElementById('sort-asc-btn');
      if (!descBtn || !ascBtn) return;

      if (currentSortOrder === 'desc') {
        descBtn.className = 'px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5 bg-orange-600 text-white shadow-xs';
        ascBtn.className = 'px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-200/60 transition-all flex items-center gap-1.5';
      } else {
        descBtn.className = 'px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-200/60 transition-all flex items-center gap-1.5';
        ascBtn.className = 'px-3 py-1.5 rounded-lg text-xs font-bold transition-all flex items-center gap-1.5 bg-orange-600 text-white shadow-xs';
      }
    }

    function setMagazineSort(order) {
      currentSortOrder = order;
      localStorage.setItem('stframe_mag_sort', order);
      updateSortButtonsUI();
      renderMagazines(currentYear);
    }

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
        Object.keys(ST_MAGAZINES_DB).forEach(y => {
          issues = issues.concat(ST_MAGAZINES_DB[y]);
        });
        document.getElementById('mag-section-badge').innerText = 'ST MAGAZINE • COMPLETE ARCHIVE';
        document.getElementById('mag-section-title').innerText = isEn ? 'ST Magazine Complete Archives' : 'คลังวารสาร ST Magazine ทุกฉบับย้อนหลัง';
      } else {
        issues = (ST_MAGAZINES_DB[year] || []).slice();
        document.getElementById('mag-section-badge').innerText = `ST MAGAZINE • YEAR ${year}`;
        document.getElementById('mag-section-title').innerText = isEn ? `ST Magazine Issues ${year}` : `วารสาร ST Magazine ประจำปี ${year}`;
      }

      // Sort issues by month / year based on currentSortOrder
      issues.sort((a, b) => {
        const yearA = parseInt(a.year, 10) || 0;
        const yearB = parseInt(b.year, 10) || 0;
        const monthA = parseInt(a.month_num, 10) || 1;
        const monthB = parseInt(b.month_num, 10) || 1;
        const menuA = parseInt(a.menu_order, 10) || 0;
        const menuB = parseInt(b.menu_order, 10) || 0;

        const valA = (yearA * 100) + monthA;
        const valB = (yearB * 100) + monthB;

        if (currentSortOrder === 'asc') {
          // ฉบับต้นปีก่อน (1 -> 12 หรือต้นปีขึ้นก่อน)
          if (valA !== valB) return valA - valB;
          return menuA - menuB;
        } else {
          // ฉบับล่าสุดก่อน (12 -> 1 หรือปลายปีขึ้นก่อน)
          if (valA !== valB) return valB - valA;
          return menuA - menuB;
        }
      });

      // Filter by search query if any
      if (currentSearch.trim()) {
        const q = currentSearch.trim().toLowerCase();
        issues = issues.filter(item => 
          (item.title_th && item.title_th.toLowerCase().includes(q)) ||
          (item.title_en && item.title_en.toLowerCase().includes(q)) ||
          (item.month_th && item.month_th.toLowerCase().includes(q)) ||
          (item.month_en && item.month_en.toLowerCase().includes(q)) ||
          (item.year && item.year.includes(q))
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
        const isLatest = (String(item.id) === String(window.ST_LATEST_MAGAZINE_ID));
        const titlePrimary = isEn ? (item.title_en || item.title_th) : item.title_th;
        const titleSecondary = isEn ? (item.title_th || '') : (item.title_en ? `${item.title_en} • ฉบับเต็ม E-Book` : 'ฉบับเต็ม E-Book');
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
                <img src="${item.cover_img}" alt="${titlePrimary}" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500 ease-out" loading="lazy" onerror="this.onerror=null; this.src='<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-factory.jpg';" decoding="async">
                
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
      updateSortButtonsUI();
      // Initial render for default latest year
      renderMagazines(window.ST_DEFAULT_YEAR || '2026');
    });

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closePdfModal();
    });
  </script>

<?php get_footer(); ?>
