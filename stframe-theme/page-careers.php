<?php
/**
 * Template Name: Careers
 *
 * @package ST_Frame
 */

get_header();

// Query all active career postings from WordPress database
$career_query = new WP_Query( array(
	'post_type'      => 'st_career',
	'posts_per_page' => -1,
	'post_status'    => 'publish',
	'orderby'        => array(
		'menu_order' => 'ASC',
		'date'       => 'DESC',
	),
) );

$jobs_list     = array();
$jobthai_count = 0;
$direct_count  = 0;

if ( $career_query->have_posts() ) {
	while ( $career_query->have_posts() ) {
		$career_query->the_post();
		$pid = get_the_ID();

		$is_active = get_post_meta( $pid, 'is_active', true );
		if ( $is_active !== '' && $is_active == '0' ) {
			continue; // Skip inactive/closed positions
		}

		$source     = get_post_meta( $pid, 'job_source', true ) ?: 'direct';
		$is_jobthai = ( $source === 'jobthai' );
		if ( $is_jobthai ) {
			$jobthai_count++;
		} else {
			$direct_count++;
		}

		$jobthai_id = get_post_meta( $pid, 'jobthai_id', true );
		$job_id_num = $jobthai_id ? (int) $jobthai_id : $pid;

		$title_th = get_the_title();
		$title_en = get_post_meta( $pid, 'title_en', true ) ?: $title_th;

		$dept_th = get_post_meta( $pid, 'department_th', true ) ?: ( $is_jobthai ? 'งานวิศวกรรม / โรงงาน' : 'งานบริหาร / จัดการ' );
		$dept_en = get_post_meta( $pid, 'department_en', true ) ?: $dept_th;

		$salary_th = get_post_meta( $pid, 'salary_th', true ) ?: 'ตามโครงสร้างบริษัทฯ';
		$salary_en = get_post_meta( $pid, 'salary_en', true ) ?: ( $salary_th === 'ตามตกลง' ? 'Negotiable' : 'Company Salary Structure' );

		$workplace_th = get_post_meta( $pid, 'workplace_th', true ) ?: 'ประจำโรงงานอยุธยา (อ.บางปะหัน จ.พระนครศรีอยุธยา)';
		$workplace_en = get_post_meta( $pid, 'workplace_en', true ) ?: 'Ayutthaya Plant, Bang Pahan, Ayutthaya';

		$working_hours_th = get_post_meta( $pid, 'working_hours_th', true ) ?: 'วันจันทร์ - วันเสาร์ เวลา 07:45 - 17:00 น.';
		$working_hours_en = get_post_meta( $pid, 'working_hours_en', true ) ?: 'Monday - Saturday: 07:45 - 17:00';

		$job_type_th = get_post_meta( $pid, 'job_type_th', true ) ?: 'งานประจำ (Full-time)';
		$job_type_en = get_post_meta( $pid, 'job_type_en', true ) ?: 'Full-time';

		$is_urgent   = ( get_post_meta( $pid, 'is_urgent', true ) == '1' );
		$jobthai_url = get_post_meta( $pid, 'jobthai_url', true ) ?: ( $jobthai_id ? "https://www.jobthai.com/th/job/{$jobthai_id}" : 'https://www.jobthai.com/th/company/272705' );

		$apply_url = get_post_meta( $pid, 'apply_url', true );
		if ( ! $apply_url ) {
			$apply_url = esc_url( home_url( '/contact/' ) ) . '?apply=' . urlencode( $title_th );
		}

		$raw_resp_th   = get_post_meta( $pid, 'responsibilities', true );
		$resp_th_lines = array_filter( array_map( 'trim', explode( "\n", $raw_resp_th ) ) );

		$raw_resp_en   = get_post_meta( $pid, 'responsibilities_en', true );
		$resp_en_lines = array_filter( array_map( 'trim', explode( "\n", $raw_resp_en ) ) );

		$raw_qual_th   = get_post_meta( $pid, 'qualifications', true );
		$qual_th_lines = array_filter( array_map( 'trim', explode( "\n", $raw_qual_th ) ) );

		$raw_qual_en   = get_post_meta( $pid, 'qualifications_en', true );
		$qual_en_lines = array_filter( array_map( 'trim', explode( "\n", $raw_qual_en ) ) );

		$badge_color = get_post_meta( $pid, 'badge_color', true ) ?: ( $is_jobthai ? 'orange' : 'blue' );

		$jobs_list[] = array(
			'id'                  => $job_id_num,
			'post_id'             => $pid,
			'source'              => $source,
			'is_jobthai'          => $is_jobthai,
			'is_urgent'           => $is_urgent,
			'title_th'            => $title_th,
			'title_en'            => $title_en,
			'category_th'         => $dept_th,
			'category_en'         => $dept_en,
			'salary_th'           => $salary_th,
			'salary_en'           => $salary_en,
			'workplace_th'        => $workplace_th,
			'workplace_en'        => $workplace_en,
			'working_hours_th'    => $working_hours_th,
			'working_hours_en'    => $working_hours_en,
			'type_th'             => $job_type_th,
			'type_en'             => $job_type_en,
			'url'                 => $jobthai_url,
			'apply_url'           => $apply_url,
			'badge_color'         => $badge_color,
			'responsibilities_th' => ! empty( $resp_th_lines ) ? array_values( $resp_th_lines ) : array( 'ปฏิบัติงานตามขอบเขตงานโครงสร้างเหล็กและข้อกำหนดมาตรฐานของบริษัท' ),
			'responsibilities_en' => ! empty( $resp_en_lines ) ? array_values( $resp_en_lines ) : array( 'Perform duties aligned with structural engineering standards and company workflows' ),
			'qualifications_th'   => ! empty( $qual_th_lines ) ? array_values( $qual_th_lines ) : array( 'ไม่จำกัดเพศ มีความรับผิดชอบ และตรงต่อเวลา' ),
			'qualifications_en'   => ! empty( $qual_en_lines ) ? array_values( $qual_en_lines ) : array( 'Any gender, accountable, and punctual' ),
		);
	}
	wp_reset_postdata();
}

$total_jobs = count( $jobs_list );
$last_sync  = get_transient( 'stframe_jobthai_last_sync' );
?>

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
            <i class="fas fa-users"></i> <span data-th="โอกาสเติบโตร่วมกับเรา" data-en="Career Opportunities">โอกาสเติบโตร่วมกับเรา</span>
          </div>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-white tracking-tight" data-th="ร่วมเป็นส่วนหนึ่งของ ST. Frame" data-en="Build Your Career With Us">
            ร่วมเป็นส่วนหนึ่งของ ST. Frame
          </h1>
          <p class="text-slate-300 text-base sm:text-lg font-light leading-relaxed" data-th="เราเปิดรับบุคลากรที่มีความสามารถ วิศวกร นักออกแบบ และช่างผู้ชำนาญการเพื่อร่วมสร้างสรรค์งานโครงสร้างเหล็กระดับประเทศ" data-en="Join our passionate team of 500+ professionals engineering iconic steel structures across Thailand.">
            เราเปิดรับบุคลากรที่มีความสามารถ วิศวกร นักออกแบบ และช่างผู้ชำนาญการเพื่อร่วมสร้างสรรค์งานโครงสร้างเหล็กระดับประเทศ
          </p>
        </div>
      </div>
    </section>

    <!-- JOB OPENINGS -->
    <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        <!-- Header & Direct Link -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
          <div class="max-w-2xl space-y-2">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-100 text-orange-700 text-xs font-bold whitespace-nowrap">
              <i class="fas fa-briefcase"></i> <span data-th="ตำแหน่งงานว่างเปิดรับสมัคร (ข้อมูลอัปเดตจาก JobThai)" data-en="Open Job Positions (Live from JobThai)">ตำแหน่งงานว่างเปิดรับสมัคร (ข้อมูลอัปเดตจาก JobThai)</span>
            </div>
            <h2 class="text-2xl sm:text-3xl font-bold font-heading text-slate-900" data-th="ตำแหน่งงานที่เปิดรับสมัคร (Job Vacancies)" data-en="Current Job Openings">
              ตำแหน่งงานที่เปิดรับสมัคร (Job Vacancies)
            </h2>
          </div>
          
          <!-- Direct JobThai Company Profile Link -->
          <a href="https://www.jobthai.com/th/company/272705" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2.5 px-4 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold shadow-md hover:shadow-lg transition self-start md:self-auto">
            <i class="fas fa-external-link-alt text-[10px]"></i>
            <span data-th="ดูตำแหน่งงานทั้งหมดบน JobThai" data-en="View All Jobs on JobThai">ดูตำแหน่งงานทั้งหมดบน JobThai</span>
          </a>
        </div>

        <!-- JOBTHAI LIVE SYNC HIGHLIGHT BANNER -->
        <div class="p-4 sm:p-5 rounded-2xl bg-gradient-to-r from-orange-50 via-amber-50 to-orange-50/60 border-2 border-orange-300 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div class="flex items-start sm:items-center gap-3.5">
            <div class="w-10 h-10 rounded-xl bg-orange-600 text-white flex items-center justify-center shrink-0 shadow-sm font-black text-base">
              <i class="fas fa-bolt"></i>
            </div>
            <div class="space-y-0.5">
              <div class="flex flex-wrap items-center gap-2">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-orange-600 text-white text-[10px] font-extrabold uppercase tracking-wide shadow-xs">
                  <span class="w-1.5 h-1.5 rounded-full bg-white animate-ping"></span>
                  <span>JobThai Live Sync</span>
                </span>
                <span class="text-xs font-bold text-slate-900" data-th="เชื่อมต่อและซิงค์ข้อมูลตำแหน่งงานตรงจาก JobThai ตลอด 24 ชม." data-en="Live synchronized with official JobThai recruitment database 24/7">
                  เชื่อมต่อและซิงค์ข้อมูลตำแหน่งงานตรงจาก JobThai ตลอด 24 ชม.
                </span>
              </div>
              <p class="text-[11px] text-slate-600">
                <span data-th="บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด (JobThai Company ID: 272705) • ตำแหน่งงานที่มีป้ายสีส้มจะเชื่อมโยงกับ JobThai โดยตรง" data-en="ST. Frame & Truss Co., Ltd. (JobThai Company ID: 272705) • Orange badge listings synchronize with JobThai.">
                  บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด (JobThai Company ID: 272705) • ตำแหน่งงานที่มีป้ายสีส้มจะเชื่อมโยงกับ JobThai โดยตรง
                </span>
                <?php if ( $last_sync ) : ?>
                  <span class="hidden sm:inline text-slate-400"> • อัปเดตล่าสุด: <?php echo esc_html( $last_sync ); ?></span>
                <?php endif; ?>
              </p>
            </div>
          </div>
          <div class="flex items-center gap-2 shrink-0 self-start md:self-auto">
            <a href="https://www.jobthai.com/th/company/272705" target="_blank" rel="noopener noreferrer" class="px-3.5 py-2 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-xs font-bold shadow-xs hover:shadow transition flex items-center gap-1.5">
              <i class="fas fa-external-link-alt text-[10px]"></i>
              <span data-th="เปิดหน้าบริษัทบน JobThai" data-en="Open JobThai Profile">เปิดหน้าบริษัทบน JobThai</span>
            </a>
          </div>
        </div>

        <!-- CATEGORY & SOURCE FILTER TABS -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 border-b border-slate-200 pb-4">
          <div class="flex flex-wrap items-center gap-2" id="job-filter-tabs">
            <button type="button" onclick="filterJobs('all')" id="filter-all" class="job-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-900 text-white shadow transition flex items-center gap-2 cursor-pointer">
              <i class="fas fa-briefcase text-xs"></i>
              <span data-th="ตำแหน่งงานทั้งหมด (<?php echo $total_jobs; ?>)" data-en="All Positions (<?php echo $total_jobs; ?>)">ตำแหน่งงานทั้งหมด (<?php echo $total_jobs; ?>)</span>
            </button>
            <button type="button" onclick="filterJobs('jobthai')" id="filter-jobthai" class="job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-orange-100 text-orange-800 hover:bg-orange-200 transition flex items-center gap-2 border border-orange-300 cursor-pointer">
              <span class="w-2 h-2 rounded-full bg-orange-600 animate-pulse"></span>
              <span data-th="🟧 ดึงข้อมูลจาก JobThai (<?php echo $jobthai_count; ?>)" data-en="🟧 JobThai Live Sync (<?php echo $jobthai_count; ?>)">🟧 ดึงข้อมูลจาก JobThai (<?php echo $jobthai_count; ?>)</span>
            </button>
            <button type="button" onclick="filterJobs('direct')" id="filter-direct" class="job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition flex items-center gap-2 border border-slate-200 cursor-pointer">
              <i class="fas fa-building text-blue-600 text-xs"></i>
              <span data-th="🟦 เปิดรับสมัครตรง (<?php echo $direct_count; ?>)" data-en="🟦 ST Direct Hiring (<?php echo $direct_count; ?>)">🟦 เปิดรับสมัครตรง (<?php echo $direct_count; ?>)</span>
            </button>
          </div>
          <div class="text-xs text-slate-500 font-medium">
            <span id="job-showing-count">กำลังแสดง <?php echo $total_jobs; ?> ตำแหน่ง</span>
          </div>
        </div>

        <!-- DYNAMIC JOB OPENINGS CARDS LIST -->
        <div class="space-y-4" id="jobs-container">
          <?php if ( ! empty( $jobs_list ) ) : ?>
            <?php foreach ( $jobs_list as $job ) : 
              $is_jt = $job['is_jobthai'];
              $badge_color = $job['badge_color'];
            ?>
              <div class="job-item steel-card bg-white p-6 rounded-2xl border-2 <?php echo $is_jt ? 'border-orange-300 bg-orange-50/10 hover:border-orange-500' : 'border-slate-200 hover:border-blue-500'; ?> transition-all duration-300 shadow-xs hover:shadow-md flex flex-col lg:flex-row lg:items-center justify-between gap-5 group relative" data-source="<?php echo esc_attr( $job['source'] ); ?>">
                
                <div class="space-y-2.5 flex-1">
                  <!-- Highlights & Category Row -->
                  <div class="flex flex-wrap items-center gap-2">
                    <?php if ( $is_jt ) : ?>
                      <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-gradient-to-r from-orange-600 to-amber-500 text-white text-[10px] font-extrabold uppercase tracking-wide shadow-2xs">
                        <i class="fas fa-bolt text-[9px] animate-pulse"></i> <span>JobThai Live Sync</span>
                      </span>
                    <?php else : ?>
                      <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-md bg-blue-100 text-blue-800 text-[10px] font-bold">
                        <i class="fas fa-building text-blue-600 text-[9px]"></i> <span>ST. Frame Direct</span>
                      </span>
                    <?php endif; ?>

                    <?php if ( $job['is_urgent'] ) : ?>
                      <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-red-100 text-red-700 font-bold text-[10px]">
                        <i class="fas fa-fire text-red-500 text-[9px]"></i> <span>รับด่วน</span>
                      </span>
                    <?php endif; ?>

                    <span class="px-2.5 py-0.5 rounded-full <?php echo $is_jt ? 'bg-orange-100 text-orange-700' : 'bg-slate-100 text-slate-700'; ?> text-[11px] font-bold uppercase tracking-wider whitespace-nowrap">
                      <span data-th="<?php echo esc_attr( $job['category_th'] ); ?>" data-en="<?php echo esc_attr( $job['category_en'] ); ?>"><?php echo esc_html( $job['category_th'] ); ?></span>
                    </span>

                    <span class="text-slate-300 text-xs">•</span>
                    <span class="text-xs text-slate-500 font-medium">
                      <span data-th="เงินเดือน:" data-en="Salary:">เงินเดือน:</span>
                      <strong class="text-slate-800 font-semibold">
                        <span data-th="<?php echo esc_attr( $job['salary_th'] ); ?>" data-en="<?php echo esc_attr( $job['salary_en'] ); ?>"><?php echo esc_html( $job['salary_th'] ); ?></span>
                      </strong>
                    </span>
                  </div>

                  <!-- Job Title -->
                  <h3 class="text-lg font-bold font-heading text-slate-900 <?php echo $is_jt ? 'group-hover:text-orange-600' : 'group-hover:text-blue-600'; ?> transition" data-th="<?php echo esc_attr( $job['title_th'] . ' (' . $job['title_en'] . ')' ); ?>" data-en="<?php echo esc_attr( $job['title_en'] ); ?>">
                    <?php echo esc_html( $job['title_th'] . ' (' . $job['title_en'] . ')' ); ?>
                  </h3>

                  <!-- Metadata Details -->
                  <div class="flex flex-wrap items-center gap-y-1 gap-x-4 text-xs text-slate-500">
                    <span><i class="fas fa-map-marker-alt mr-1.5 text-orange-500"></i> <span data-th="<?php echo esc_attr( $job['workplace_th'] ); ?>" data-en="<?php echo esc_attr( $job['workplace_en'] ); ?>"><?php echo esc_html( $job['workplace_th'] ); ?></span></span>
                    <span><i class="fas fa-user-check mr-1.5 text-emerald-500"></i> <span data-th="<?php echo esc_attr( $job['type_th'] ); ?>" data-en="<?php echo esc_attr( $job['type_en'] ); ?>"><?php echo esc_html( $job['type_th'] ); ?></span></span>
                    <span><i class="fas fa-clock mr-1.5 text-blue-500"></i> <span data-th="<?php echo esc_attr( $job['working_hours_th'] ); ?>" data-en="<?php echo esc_attr( $job['working_hours_en'] ); ?>"><?php echo esc_html( $job['working_hours_th'] ); ?></span></span>
                  </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-wrap items-center gap-2 self-start lg:self-center shrink-0">
                  <button type="button" onclick="openJobModal(<?php echo esc_attr( $job['id'] ); ?>)" class="px-3.5 py-2.5 bg-white hover:bg-slate-100 hover:text-orange-600 hover:border-slate-300 border border-slate-200 text-slate-800 rounded-xl text-xs font-bold flex items-center gap-1.5 shadow-2xs transition cursor-pointer">
                    <i class="fas fa-file-lines text-orange-500"></i>
                    <span data-th="ดูรายละเอียด" data-en="View Details">ดูรายละเอียด</span>
                  </button>

                  <?php if ( $is_jt ) : ?>
                    <a href="<?php echo esc_url( $job['url'] ); ?>" target="_blank" rel="noopener noreferrer" class="px-3.5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white rounded-xl text-xs font-bold flex items-center gap-1.5 shadow-sm transition">
                      <span data-th="สมัครผ่าน JobThai" data-en="Apply via JobThai">สมัครผ่าน JobThai</span> <i class="fas fa-arrow-up-right-from-square text-[10px]"></i>
                    </a>
                  <?php endif; ?>

                  <a href="<?php echo esc_url( $job['apply_url'] ); ?>" class="px-3.5 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-semibold transition" data-th="ส่งใบสมัครผ่านเว็บ" data-en="Apply Online">
                    <span data-th="ส่งใบสมัครผ่านเว็บ" data-en="Apply Online">ส่งใบสมัครผ่านเว็บ</span>
                  </a>
                </div>

              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div class="p-12 text-center text-slate-400 bg-slate-50 rounded-2xl border border-slate-200">
              <i class="fas fa-briefcase text-4xl mb-3 text-slate-300"></i>
              <p class="text-sm">ขณะนี้ยังไม่มีตำแหน่งงานที่เปิดรับสมัคร</p>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </section>

    <!-- EMPLOYEE BENEFITS & WELFARE (From Official JobThai Profile) -->
    <section class="py-20 bg-slate-100 border-t border-slate-200">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- Section Title -->
        <div class="text-center max-w-3xl mx-auto space-y-3">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-100 text-orange-600 text-xs font-semibold whitespace-nowrap">
            <i class="fas fa-gift"></i> <span data-th="สิทธิประโยชน์สำหรับพนักงาน" data-en="Employee Benefits">สิทธิประโยชน์สำหรับพนักงาน</span>
          </div>
          <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold font-heading text-slate-900 tracking-tight" data-th="สวัสดิการและสิทธิประโยชน์" data-en="Welfare & Compensation Benefits">
            สวัสดิการและสิทธิประโยชน์
          </h2>
          <p class="text-slate-600 text-xs sm:text-sm leading-relaxed" data-th="บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด ให้ความสำคัญกับคุณภาพชีวิต ความปลอดภัย และความมั่นคงในอาชีพของพนักงานทุกคน" data-en="ST. Frame & Truss Co., Ltd. prioritizes our workforce's well-being, safety, and long-term career stability with comprehensive welfare packages.">
            บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด ให้ความสำคัญกับคุณภาพชีวิต ความปลอดภัย และความมั่นคงในอาชีพของพนักงานทุกคน
          </p>
        </div>

        <!-- 6 Core Benefits Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          
          <!-- 1. Bonus & Provident Fund -->
          <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-amber-400/80 transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
              <i class="fas fa-sack-dollar"></i>
            </div>
            <div class="space-y-1.5 flex-1">
              <h3 class="font-bold text-base text-slate-900 font-heading group-hover:text-amber-600 transition" data-th="โบนัสประจำปี & กองทุนสำรองเลี้ยงชีพ" data-en="Annual Bonus & Provident Fund">
                โบนัสประจำปี & กองทุนสำรองเลี้ยงชีพ
              </h3>
              <p class="text-xs text-slate-500 leading-relaxed" data-th="โบนัสตามผลประกอบการของบริษัท และกองทุนสำรองเลี้ยงชีพ (Provident Fund) เพื่อสร้างความมั่นคงทางการเงินระยะยาว" data-en="Annual performance bonus and corporate provident fund scheme for long-term financial security.">
                โบนัสตามผลประกอบการของบริษัท และกองทุนสำรองเลี้ยงชีพ (Provident Fund) เพื่อสร้างความมั่นคงทางการเงินระยะยาว
              </p>
            </div>
          </div>

          <!-- 2. Insurance & Health -->
          <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-rose-400/80 transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-rose-500/10 text-rose-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
              <i class="fas fa-heart-pulse"></i>
            </div>
            <div class="space-y-1.5 flex-1">
              <h3 class="font-bold text-base text-slate-900 font-heading group-hover:text-rose-600 transition" data-th="ประกันชีวิต สุขภาพ & ประกันสังคม" data-en="Life, Health & Social Insurance">
                ประกันชีวิต สุขภาพ & ประกันสังคม
              </h3>
              <p class="text-xs text-slate-500 leading-relaxed" data-th="ประกันชีวิต ประกันสุขภาพกลุ่ม และสิทธิประโยชน์กองทุนประกันสังคม คุ้มครองดูแลสุขภาพและความปลอดภัยตลอดการปฏิบัติงาน" data-en="Comprehensive group life insurance, health coverage, and standard social security protection.">
                ประกันชีวิต ประกันสุขภาพกลุ่ม และสิทธิประโยชน์กองทุนประกันสังคม คุ้มครองดูแลสุขภาพและความปลอดภัยตลอดการปฏิบัติงาน
              </p>
            </div>
          </div>

          <!-- 3. Lunch & Meals -->
          <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-orange-400/80 transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-orange-500/10 text-orange-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
              <i class="fas fa-utensils"></i>
            </div>
            <div class="space-y-1.5 flex-1">
              <h3 class="font-bold text-base text-slate-900 font-heading group-hover:text-orange-600 transition" data-th="อาหารกลางวันสวัสดิการ" data-en="Subsidized Lunch Meals">
                อาหารกลางวันสวัสดิการ
              </h3>
              <p class="text-xs text-slate-500 leading-relaxed" data-th="มีสวัสดิการอาหารกลางวันตามเงื่อนไขของบริษัท ช่วยแบ่งเบาค่าครองชีพและดูแลสุขอนามัยของพนักงานทุกคน" data-en="Complimentary or subsidized lunch meal program according to company policy to support daily living.">
                มีสวัสดิการอาหารกลางวันตามเงื่อนไขของบริษัท ช่วยแบ่งเบาค่าครองชีพและดูแลสุขอนามัยของพนักงานทุกคน
              </p>
            </div>
          </div>

          <!-- 4. Shuttle Bus & Dormitory -->
          <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-blue-400/80 transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
              <i class="fas fa-bus-simple"></i>
            </div>
            <div class="space-y-1.5 flex-1">
              <h3 class="font-bold text-base text-slate-900 font-heading group-hover:text-blue-600 transition" data-th="รถรับส่งพนักงาน & หอพักบริษัท" data-en="Shuttle Bus & Company Dormitory">
                รถรับส่งพนักงาน & หอพักบริษัท
              </h3>
              <p class="text-xs text-slate-500 leading-relaxed" data-th="รถรับส่งสายบางปะหัน-นครหลวง-อยุธยา-บางปะอิน / สายอ่างทอง และมีหอพักสวัสดิการของบริษัทรองรับพนักงาน" data-en="Free employee shuttle services across Ayutthaya-Ang Thong routes and on-site staff dormitory facilities.">
                รถรับส่งสายบางปะหัน-นครหลวง-อยุธยา-บางปะอิน / สายอ่างทอง และมีหอพักสวัสดิการของบริษัทรองรับพนักงาน
              </p>
            </div>
          </div>

          <!-- 5. Uniform & Safety -->
          <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-emerald-400/80 transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
              <i class="fas fa-shield-halved"></i>
            </div>
            <div class="space-y-1.5 flex-1">
              <h3 class="font-bold text-base text-slate-900 font-heading group-hover:text-emerald-600 transition" data-th="ชุดยูนิฟอร์ม & รองเท้าเซฟตี้" data-en="Uniform & Safety Equipment">
                ชุดยูนิฟอร์ม & รองเท้าเซฟตี้
              </h3>
              <p class="text-xs text-slate-500 leading-relaxed" data-th="แจกชุดยูนิฟอร์มพนักงาน และรองเท้าเซฟตี้มาตรฐานวิศวกรรม เพื่อความปลอดภัยสูงสุดตามนโยบาย Zero Accident" data-en="Company work uniforms and certified personal protective equipment (PPE/safety footwear) for workplace safety.">
                แจกชุดยูนิฟอร์มพนักงาน และรองเท้าเซฟตี้มาตรฐานวิศวกรรม เพื่อความปลอดภัยสูงสุดตามนโยบาย Zero Accident
              </p>
            </div>
          </div>

          <!-- 6. Seminar & Trip -->
          <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm hover:shadow-md hover:border-teal-400/80 transition-all duration-300 flex items-start gap-4 group">
            <div class="w-12 h-12 rounded-xl bg-teal-500/10 text-teal-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-110 transition-transform">
              <i class="fas fa-umbrella-beach"></i>
            </div>
            <div class="space-y-1.5 flex-1">
              <h3 class="font-bold text-base text-slate-900 font-heading group-hover:text-teal-600 transition" data-th="สัมมนา & ท่องเที่ยวประจำปี" data-en="Annual Seminar & Company Trip">
                สัมมนา & ท่องเที่ยวประจำปี
              </h3>
              <p class="text-xs text-slate-500 leading-relaxed" data-th="กิจกรรมอบรมพัฒนาทักษะวิชาชีพ และทริปท่องเที่ยวสัมมนาประจำปี เพื่อสร้างความสุขและความผูกพันในทีมงาน" data-en="Annual recreational company trips, team building events, and professional skill enhancement workshops.">
                กิจกรรมอบรมพัฒนาทักษะวิชาชีพ และทริปท่องเที่ยวสัมมนาประจำปี เพื่อสร้างความสุขและความผูกพันในทีมงาน
              </p>
            </div>
          </div>

        </div>

        <!-- SPECIAL ALLOWANCES & WORKING HOURS BANNER -->
        <div class="bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 text-white rounded-2xl p-6 sm:p-8 border border-slate-700/80 shadow-xl">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6 divide-y md:divide-y-0 md:divide-x divide-slate-700/80">
            
            <!-- Item 1: Site Allowance -->
            <div class="flex items-start gap-3.5 pt-4 md:pt-0 md:px-4 first:pl-0">
              <div class="w-10 h-10 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center text-lg shrink-0">
                <i class="fas fa-truck-pickup"></i>
              </div>
              <div class="space-y-1">
                <h4 class="font-bold text-sm text-white font-heading" data-th="สวัสดิการไซต์งานต่างจังหวัด" data-en="Site Allowance & Per Diem">
                  สวัสดิการไซต์งานต่างจังหวัด
                </h4>
                <p class="text-xs text-slate-300 leading-relaxed" data-th="สำหรับตำแหน่งประจำหน่วยงานต่างจังหวัด มีค่าเช่าบ้าน ค่าน้ำมันรถยนต์ และค่าโทรศัพท์สนับสนุน" data-en="Positions assigned to upcountry sites receive housing allowance, fuel compensation, and phone subsidy.">
                  สำหรับตำแหน่งประจำหน่วยงานต่างจังหวัด มีค่าเช่าบ้าน ค่าน้ำมันรถยนต์ และค่าโทรศัพท์สนับสนุน
                </p>
              </div>
            </div>

            <!-- Item 2: Phone Allowance -->
            <div class="flex items-start gap-3.5 pt-4 md:pt-0 md:px-4">
              <div class="w-10 h-10 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center text-lg shrink-0">
                <i class="fas fa-mobile-screen-button"></i>
              </div>
              <div class="space-y-1">
                <h4 class="font-bold text-sm text-white font-heading" data-th="ค่าโทรศัพท์ตามระดับตำแหน่ง" data-en="Position Phone Allowance">
                  ค่าโทรศัพท์ตามระดับตำแหน่ง
                </h4>
                <p class="text-xs text-slate-300 leading-relaxed" data-th="มีค่าโทรศัพท์ประจำตำแหน่งสำหรับระดับผู้จัดการ หัวหน้างาน และโฟร์แมน ตามลำดับขั้น" data-en="Official mobile phone allowance provided for Manager, Supervisor, and Foreman tiers.">
                  มีค่าโทรศัพท์ประจำตำแหน่งสำหรับระดับผู้จัดการ หัวหน้างาน และโฟร์แมน ตามลำดับขั้น
                </p>
              </div>
            </div>

            <!-- Item 3: Working Hours -->
            <div class="flex items-start gap-3.5 pt-4 md:pt-0 md:px-4 last:pr-0">
              <div class="w-10 h-10 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-lg shrink-0">
                <i class="far fa-clock"></i>
              </div>
              <div class="space-y-1">
                <h4 class="font-bold text-sm text-white font-heading" data-th="เวลาการปฏิบัติงาน" data-en="Standard Working Hours">
                  เวลาการปฏิบัติงาน
                </h4>
                <p class="text-xs text-slate-300 leading-relaxed" data-th="วันจันทร์ - วันเสาร์ เวลา 07:45 - 17:00 น. (โรงงานอยุธยา อ.บางปะหัน)" data-en="Monday – Saturday: 07:45 – 17:00 (Ayutthaya Plant, Bang Pahan).">
                  วันจันทร์ - วันเสาร์ เวลา 07:45 - 17:00 น. (โรงงานอยุธยา อ.บางปะหัน)
                </p>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section>

    <!-- OUT CONTRACTOR & SUBCONTRACTOR RECRUITMENT -->
    <section id="out-contractor" class="py-20 bg-slate-900 text-white border-t border-slate-800 scroll-mt-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <div class="max-w-3xl space-y-3">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-orange-500/20 text-orange-400 text-xs font-semibold whitespace-nowrap">
            <i class="fas fa-handshake"></i> <span data-th="ร่วมงานในฐานะคู่ค้าผู้รับเหมาช่วง" data-en="Subcontractor & Out Contractor Partnership">ร่วมงานในฐานะคู่ค้าผู้รับเหมาช่วง</span>
          </div>
          <h2 class="text-3xl font-extrabold font-heading text-white tracking-tight" data-th="เปิดรับสมัครทีมงานผู้รับเหมาช่วง (Out Contractors)" data-en="Out Contractor & Subcontractor Registration">
            เปิดรับสมัครทีมงานผู้รับเหมาช่วง (Out Contractors)
          </h2>
          <p class="text-slate-300 text-sm leading-relaxed" data-th="ST. Frame & Truss มีโครงการก่อสร้างขนาดใหญ่ทั่วประเทศตลอดทั้งปี ยินดีต้อนรับทีมงานผู้รับเหมาช่วงที่มีทักษะความชำนาญเฉพาะทาง มาร่วมเป็นพันธมิตรสร้างผลงานคุณภาพมาตรฐานสากล" data-en="ST. Frame & Truss executes landmark projects nationwide year-round. We welcome specialized subcontractor crews to join our trusted engineering partner network.">
            ST. Frame & Truss มีโครงการก่อสร้างขนาดใหญ่ทั่วประเทศตลอดทั้งปี ยินดีต้อนรับทีมงานผู้รับเหมาช่วงที่มีทักษะความชำนาญเฉพาะทาง มาร่วมเป็นพันธมิตรสร้างผลงานคุณภาพมาตรฐานสากล
          </p>
        </div>

        <!-- 4 Subcontractor Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          
          <div class="p-6 rounded-2xl bg-slate-800/90 border border-slate-700 flex flex-col justify-between space-y-4 hover:border-orange-500 transition">
            <div class="space-y-3">
              <div class="w-12 h-12 rounded-xl bg-orange-500/20 text-orange-400 flex items-center justify-center text-xl">
                <i class="fas fa-hard-hat"></i>
              </div>
              <h3 class="font-bold text-lg font-heading text-white leading-snug" data-th="ทีมช่างติดตั้งโครงสร้างเหล็ก<br><span class='text-xs text-slate-400 font-normal font-sans'>(Erection Team)</span>" data-en="Steel Erection Crews<br><span class='text-xs text-slate-400 font-normal font-sans'>(Erection Team)</span>">
                ทีมช่างติดตั้งโครงสร้างเหล็ก<br><span class="text-xs text-slate-400 font-normal font-sans">(Erection Team)</span>
              </h3>
              <p class="text-xs text-slate-300 leading-relaxed" data-th="ทีมงานติดตั้งโครงหลังคา Truss, เสา คาน Built-up และงาน PEB มีทักษะการทำงานบนที่สูงและเครื่องมือนิรภัยครบครัน" data-en="Specialized in long-span roof truss, built-up columns, and PEB systems with high-altitude safety compliance.">
                ทีมงานติดตั้งโครงหลังคา Truss, เสา คาน Built-up และงาน PEB มีทักษะการทำงานบนที่สูงและเครื่องมือนิรภัยครบครัน
              </p>
            </div>
            <a href="contact.html?type=erection-team" class="text-xs font-semibold text-orange-400 hover:text-orange-300 flex items-center gap-1.5 pt-2 border-t border-slate-700">
              <span data-th="สมัครขึ้นทะเบียนทีมช่าง" data-en="Register Crew">สมัครขึ้นทะเบียนทีมช่าง</span> <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
          </div>

          <div class="p-6 rounded-2xl bg-slate-800/90 border border-slate-700 flex flex-col justify-between space-y-4 hover:border-orange-500 transition">
            <div class="space-y-3">
              <div class="w-12 h-12 rounded-xl bg-amber-500/20 text-amber-400 flex items-center justify-center text-xl">
                <i class="fas fa-fire-alt"></i>
              </div>
              <h3 class="font-bold text-lg font-heading text-white leading-snug" data-th="ทีมช่างเชื่อมโครงสร้าง<br><span class='text-xs text-slate-400 font-normal font-sans'>(Certified Welders)</span>" data-en="Certified Welding Teams<br><span class='text-xs text-slate-400 font-normal font-sans'>(Certified Welders)</span>">
                ทีมช่างเชื่อมโครงสร้าง<br><span class="text-xs text-slate-400 font-normal font-sans">(Certified Welders)</span>
              </h3>
              <p class="text-xs text-slate-300 leading-relaxed" data-th="ทีมช่างเชื่อมประกอบโครงสร้างเหล็กหนาพิเศษ ผ่านมาตรฐาน WPS / PQR (SMAW, FCAW, SAW) งานโรงงานและหน้างาน" data-en="Expert welders for heavy steel fabrication conforming to certified WPS/PQR standards.">
                ทีมช่างเชื่อมประกอบโครงสร้างเหล็กหนาพิเศษ ผ่านมาตรฐาน WPS / PQR (SMAW, FCAW, SAW) งานโรงงานและหน้างาน
              </p>
            </div>
            <a href="contact.html?type=welding-team" class="text-xs font-semibold text-orange-400 hover:text-orange-300 flex items-center gap-1.5 pt-2 border-t border-slate-700">
              <span data-th="สมัครขึ้นทะเบียนทีมช่าง" data-en="Register Crew">สมัครขึ้นทะเบียนทีมช่าง</span> <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
          </div>

          <div class="p-6 rounded-2xl bg-slate-800/90 border border-slate-700 flex flex-col justify-between space-y-4 hover:border-orange-500 transition">
            <div class="space-y-3">
              <div class="w-12 h-12 rounded-xl bg-blue-500/20 text-blue-400 flex items-center justify-center text-xl">
                <i class="fas fa-paint-roller"></i>
              </div>
              <h3 class="font-bold text-lg font-heading text-white leading-snug" data-th="ทีมงานพ่นสีกันสนิม/กันไฟ<br><span class='text-xs text-slate-400 font-normal font-sans'>(Painting Team)</span>" data-en="Industrial Painting Teams<br><span class='text-xs text-slate-400 font-normal font-sans'>(Painting Team)</span>">
                ทีมงานพ่นสีกันสนิม/กันไฟ<br><span class="text-xs text-slate-400 font-normal font-sans">(Painting Team)</span>
              </h3>
              <p class="text-xs text-slate-300 leading-relaxed" data-th="งานพ่นทราย (Sandblasting), สี Epoxy, Polyurethane และระบบสีทนไฟ (Intumescent Fireproof Coating)" data-en="Abrasive blasting, industrial epoxy, polyurethane, and intumescent fireproofing coating specialists.">
                งานพ่นทราย (Sandblasting), สี Epoxy, Polyurethane และระบบสีทนไฟ (Intumescent Fireproof Coating)
              </p>
            </div>
            <a href="contact.html?type=painting-team" class="text-xs font-semibold text-orange-400 hover:text-orange-300 flex items-center gap-1.5 pt-2 border-t border-slate-700">
              <span data-th="สมัครขึ้นทะเบียนทีมช่าง" data-en="Register Crew">สมัครขึ้นทะเบียนทีมช่าง</span> <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
          </div>

          <div class="p-6 rounded-2xl bg-slate-800/90 border border-slate-700 flex flex-col justify-between space-y-4 hover:border-orange-500 transition">
            <div class="space-y-3">
              <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-xl">
                <i class="fas fa-truck-moving"></i>
              </div>
              <h3 class="font-bold text-lg font-heading text-white leading-snug" data-th="ทีมงานขนส่งโครงสร้างหนัก<br><span class='text-xs text-slate-400 font-normal font-sans'>(Logistics)</span>" data-en="Heavy Transport & Logistics<br><span class='text-xs text-slate-400 font-normal font-sans'>(Logistics)</span>">
                ทีมงานขนส่งโครงสร้างหนัก<br><span class="text-xs text-slate-400 font-normal font-sans">(Logistics)</span>
              </h3>
              <p class="text-xs text-slate-300 leading-relaxed" data-th="รถเทรลเลอร์ Low-bed, รถสิบล้อติดเครน และบริการขนส่งชิ้นงานโครงสร้างเหล็กขนาดใหญ่พิเศษ (Oversized Cargo)" data-en="Low-bed trailers, boom trucks, and oversized steel transport specialists nationwide.">
                รถเทรลเลอร์ Low-bed, รถสิบล้อติดเครน และบริการขนส่งชิ้นงานโครงสร้างเหล็กขนาดใหญ่พิเศษ (Oversized Cargo)
              </p>
            </div>
            <a href="contact.html?type=transport-team" class="text-xs font-semibold text-orange-400 hover:text-orange-300 flex items-center gap-1.5 pt-2 border-t border-slate-700">
              <span data-th="สมัครขึ้นทะเบียนทีมช่าง" data-en="Register Crew">สมัครขึ้นทะเบียนทีมช่าง</span> <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
          </div>

        </div>

        <!-- Partnership Advantages Banner -->
        <div class="p-6 sm:p-8 rounded-2xl bg-gradient-to-r from-orange-600 to-amber-600 text-white flex flex-col md:flex-row items-center justify-between gap-6 shadow-xl">
          <div class="space-y-1 text-center md:text-left">
            <h3 class="text-xl font-bold font-heading whitespace-nowrap" data-th="ทำไม Out Contractors จึงเลือกเติบโตร่วมกับ ST. Frame & Truss?" data-en="Why Out Contractors Choose to Grow with Us?">
              ทำไม Out Contractors จึงเลือกเติบโตร่วมกับ ST. Frame & Truss?
            </h3>
            <p class="text-xs sm:text-sm text-orange-100" data-th="มีงานโครงการต่อเนื่องตลอดทั้งปี • จ่ายเงินงวดตรงเวลา 100% • มีทีมวิศวกรดูแลหน้างาน • ควบคุมงานอย่างมืออาชีพ" data-en="Consistent project pipeline • 100% on-time milestone payouts • Professional engineering support">
              มีงานโครงการต่อเนื่องตลอดทั้งปี • จ่ายเงินงวดตรงเวลา 100% • มีทีมวิศวกรดูแลหน้างาน • ควบคุมงานอย่างมืออาชีพ
            </p>
          </div>
          <a href="contact.html?subject=subcontractor" class="px-6 py-3 bg-slate-950 hover:bg-slate-900 text-white rounded-xl text-xs font-bold whitespace-nowrap shrink-0 shadow-lg transition">
            <span data-th="ติดต่อลงทะเบียนคู่ค้า" data-en="Register Partner">ติดต่อลงทะเบียนคู่ค้า</span>
          </a>
        </div>

      </div>
    </section>
  </main>

  <!-- FOOTER -->

<!-- JOB DETAIL MODAL (JOBTHAI SOURCED) -->
  <div id="jobModal" class="fixed inset-0 z-50 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop with blur -->
    <div id="jobModalBackdrop" class="fixed inset-0 bg-slate-950/80 backdrop-blur-sm transition-opacity" onclick="closeJobModal()"></div>

    <!-- Modal Dialog Center Container -->
    <div class="flex min-h-full items-center justify-center p-4 sm:p-6 text-center">
      <div class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all w-full max-w-3xl border border-slate-200 my-8">
        
        <!-- Modal Header -->
        <div class="relative bg-gradient-to-r from-slate-900 via-slate-800 to-slate-900 p-6 sm:p-8 text-white">
          <button type="button" onclick="closeJobModal()" class="absolute top-5 right-5 text-slate-400 hover:text-white bg-slate-800/80 hover:bg-slate-700 w-9 h-9 rounded-full flex items-center justify-center transition focus:outline-none shadow-sm cursor-pointer">
            <i class="fas fa-times text-base"></i>
          </button>
          
          <div class="space-y-2 pr-8">
            <div class="flex flex-wrap items-center gap-2">
              <span id="modalJobBadge" class="px-3 py-1 rounded-full bg-orange-500/20 text-orange-400 border border-orange-500/30 text-xs font-bold uppercase tracking-wider whitespace-nowrap">
                <span data-th="งานวิศวกรรม (Engineering)" data-en="Engineering">งานวิศวกรรม (Engineering)</span>
              </span>
              <span class="text-slate-400 text-xs">•</span>
              <span id="modalJobType" class="text-xs text-slate-300 font-medium"><span data-th="งานประจำ (Full-time)" data-en="Full-time">งานประจำ (Full-time)</span></span>
            </div>
            
            <h3 id="modalJobTitleTh" class="text-xl sm:text-2xl font-bold font-heading text-white" data-th="วิศวกรประเมินราคา" data-en="Cost Estimation Engineer">
              วิศวกรประเมินราคา
            </h3>
            <p id="modalJobTitleEn" class="text-xs sm:text-sm text-slate-300 font-sans" data-th="Cost Estimation Engineer" data-en="Cost Estimation Engineer">
              Cost Estimation Engineer
            </p>
          </div>
        </div>

        <!-- Key Meta Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 p-5 sm:p-6 bg-slate-50 border-b border-slate-200 text-xs">
          <div class="flex items-start gap-3 p-3 bg-white rounded-xl border border-slate-200/80 shadow-xs">
            <div class="w-8 h-8 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <div>
              <p class="text-[11px] text-slate-400 font-medium" data-th="อัตราเงินเดือน" data-en="Salary Rate">อัตราเงินเดือน</p>
              <p id="modalJobSalary" class="font-bold text-slate-900"><span data-th="ตามตกลง / ประสบการณ์" data-en="Negotiable / Experience">ตามตกลง / ประสบการณ์</span></p>
            </div>
          </div>
          
          <div class="flex items-start gap-3 p-3 bg-white rounded-xl border border-slate-200/80 shadow-xs">
            <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
              <i class="fas fa-clock"></i>
            </div>
            <div>
              <p class="text-[11px] text-slate-400 font-medium" data-th="เวลาทำงาน" data-en="Working Hours">เวลาทำงาน</p>
              <p id="modalJobHours" class="font-bold text-slate-900"><span data-th="จันทร์ - เสาร์ 07:45 - 17:00 น." data-en="Mon – Sat 07:45 – 17:00">จันทร์ - เสาร์ 07:45 - 17:00 น.</span></p>
            </div>
          </div>

          <div class="flex items-start gap-3 p-3 bg-white rounded-xl border border-slate-200/80 shadow-xs sm:col-span-2 lg:col-span-1">
            <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
              <i class="fas fa-map-marker-alt"></i>
            </div>
            <div>
              <p class="text-[11px] text-slate-400 font-medium" data-th="สถานที่ปฏิบัติงาน" data-en="Location">สถานที่ปฏิบัติงาน</p>
              <p id="modalJobLocation" class="font-bold text-slate-900"><span data-th="โรงงานอยุธยา (อ.บางปะหัน)" data-en="Ayutthaya Plant (Bang Pahan)">โรงงานอยุธยา (อ.บางปะหัน)</span></p>
            </div>
          </div>
        </div>

        <!-- Modal Body Content -->
        <div class="p-6 sm:p-8 space-y-6 max-h-[55vh] overflow-y-auto text-slate-700 text-sm">
          
          <!-- Responsibilities -->
          <div class="space-y-3">
            <h4 class="text-sm font-bold uppercase tracking-wider text-slate-900 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
              <span data-th="หน้าที่ความรับผิดชอบ (Key Responsibilities)" data-en="Key Responsibilities">หน้าที่ความรับผิดชอบ (Key Responsibilities)</span>
            </h4>
            <div id="modalJobResponsibilities" class="space-y-2 bg-slate-50 p-4 rounded-2xl border border-slate-200 text-xs sm:text-sm">
              <!-- Dynamically populated -->
            </div>
          </div>

          <!-- Qualifications -->
          <div class="space-y-3">
            <h4 class="text-sm font-bold uppercase tracking-wider text-slate-900 flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
              <span data-th="คุณสมบัติผู้สมัคร (Qualifications & Requirements)" data-en="Qualifications & Requirements">คุณสมบัติผู้สมัคร (Qualifications & Requirements)</span>
            </h4>
            <div id="modalJobQualifications" class="space-y-2 bg-slate-50 p-4 rounded-2xl border border-slate-200 text-xs sm:text-sm">
              <!-- Dynamically populated -->
            </div>
          </div>

          <!-- Workplace & Address -->
          <div class="space-y-3">
            <h4 class="text-sm font-bold uppercase tracking-wider text-slate-900 flex items-center gap-2" data-th="<span class='w-2.5 h-2.5 rounded-full bg-emerald-500'></span> สถานที่ปฏิบัติงานและการติดต่อ" data-en="<span class='w-2.5 h-2.5 rounded-full bg-emerald-500'></span> Workplace Location & Contact">
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
              สถานที่ปฏิบัติงานและการติดต่อ
            </h4>
            <div class="bg-slate-50 p-4 rounded-2xl border border-slate-200 text-xs space-y-2 text-slate-600">
              <p data-th="บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด (โรงงานอยุธยา)" data-en="ST. Frame & Truss Co., Ltd. (Ayutthaya Plant)"><strong class="text-slate-800">บริษัท เอส ที เฟรม แอนด์ ทรัส จำกัด (โรงงานอยุธยา)</strong></p>
              <p class="flex items-start gap-1.5" data-th="<i class='fas fa-location-dot text-orange-500 w-4 shrink-0 mt-0.5'></i> <span class='leading-relaxed'>เลขที่ 29/4, 29/14, 29/15, 29/17 หมู่ 3 ต.โพธิ์สามต้น<br>อ.บางปะหัน จ.พระนครศรีอยุธยา 13220</span>" data-en="<i class='fas fa-location-dot text-orange-500 w-4 shrink-0 mt-0.5'></i> <span class='leading-relaxed'>29/4, 29/14, 29/15, 29/17 Moo 3, Pho Sam Ton,<br>Bang Pahan, Ayutthaya 13220, Thailand</span>"><i class="fas fa-location-dot text-orange-500 w-4 shrink-0 mt-0.5"></i> <span class="leading-relaxed">เลขที่ 29/4, 29/14, 29/15, 29/17 หมู่ 3 ต.โพธิ์สามต้น<br>อ.บางปะหัน จ.พระนครศรีอยุธยา 13220</span></p>
              <div class="flex flex-wrap gap-x-6 gap-y-1.5 pt-1">
                <span><i class="fas fa-phone text-orange-500 w-4"></i> 035-779-553-6, 086-340-4728</span>
                <span><i class="fab fa-line text-emerald-500 w-4"></i> LINE: @stframeandtruss</span>
                <span><i class="fas fa-envelope text-blue-500 w-4"></i> stframe_factory@stframe.com</span>
              </div>
            </div>
          </div>

        </div>

        <!-- Modal Footer Actions -->
        <div class="p-5 sm:p-6 bg-slate-100 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-3">
          <div class="text-[11px] text-slate-500 hidden sm:block" data-th="* ข้อมูลอัปเดตตรงจากระบบรับสมัครงาน <strong>JobThai</strong>" data-en="* Live listings synchronized with <strong>JobThai</strong> recruitment system">
            * ข้อมูลอัปเดตตรงจากระบบรับสมัครงาน <strong>JobThai</strong>
          </div>
          <div class="flex flex-wrap items-center gap-2 w-full sm:w-auto justify-end">
            <button type="button" onclick="closeJobModal()" class="px-4 py-2.5 bg-white hover:bg-slate-200 text-slate-700 border border-slate-300 rounded-xl text-xs font-semibold transition cursor-pointer" data-th="ปิด" data-en="Close">
              ปิด
            </button>
            <a id="modalApplyWebBtn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="px-4 py-2.5 bg-slate-900 hover:bg-slate-800 text-white rounded-xl text-xs font-semibold transition">
              <span data-th="ส่งใบสมัครผ่านเว็บ" data-en="Apply Online">ส่งใบสมัครผ่านเว็บ</span>
            </a>
            <a id="modalJobThaiLink" href="#" target="_blank" rel="noopener noreferrer" class="px-5 py-2.5 bg-orange-500 hover:bg-orange-600 text-white rounded-xl text-xs font-bold flex items-center gap-1.5 shadow-md hover:shadow-lg transition">
              <span data-th="สมัครผ่าน JobThai" data-en="Apply via JobThai">สมัครผ่าน JobThai</span> <i class="fas fa-arrow-up-right-from-square text-[10px]"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    // Live jobs injected directly from WordPress Database (JobThai + Direct)
    window.ST_JOBS_DB = <?php echo wp_json_encode( $jobs_list, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ); ?> || [];

    // Filter Jobs by Source
    window.filterJobs = function(source) {
      const items = document.querySelectorAll('#jobs-container .job-item');
      let visibleCount = 0;

      items.forEach(function(item) {
        const itemSource = item.getAttribute('data-source');
        if (source === 'all' || itemSource === source) {
          item.style.display = '';
          visibleCount++;
        } else {
          item.style.display = 'none';
        }
      });

      // Update count indicator
      const countEl = document.getElementById('job-showing-count');
      if (countEl) {
        const currentLang = localStorage.getItem('stframe_lang') || 'th';
        countEl.textContent = currentLang === 'en' 
          ? `Showing ${visibleCount} positions` 
          : `กำลังแสดง ${visibleCount} ตำแหน่ง`;
      }

      // Update tab styles
      const filterAll = document.getElementById('filter-all');
      const filterJobthai = document.getElementById('filter-jobthai');
      const filterDirect = document.getElementById('filter-direct');

      [filterAll, filterJobthai, filterDirect].forEach(btn => {
        if (!btn) return;
        btn.classList.remove('bg-slate-900', 'text-white', 'shadow');
      });

      if (source === 'all' && filterAll) {
        filterAll.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-900 text-white shadow transition flex items-center gap-2 cursor-pointer';
        if (filterJobthai) filterJobthai.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-orange-100 text-orange-800 hover:bg-orange-200 transition flex items-center gap-2 border border-orange-300 cursor-pointer';
        if (filterDirect) filterDirect.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition flex items-center gap-2 border border-slate-200 cursor-pointer';
      } else if (source === 'jobthai' && filterJobthai) {
        filterJobthai.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-orange-600 text-white shadow-md transition flex items-center gap-2 cursor-pointer';
        if (filterAll) filterAll.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition flex items-center gap-2 border border-slate-200 cursor-pointer';
        if (filterDirect) filterDirect.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition flex items-center gap-2 border border-slate-200 cursor-pointer';
      } else if (source === 'direct' && filterDirect) {
        filterDirect.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-bold bg-blue-600 text-white shadow-md transition flex items-center gap-2 cursor-pointer';
        if (filterAll) filterAll.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 text-slate-700 hover:bg-slate-200 transition flex items-center gap-2 border border-slate-200 cursor-pointer';
        if (filterJobthai) filterJobthai.className = 'job-filter-btn px-4 py-2 rounded-xl text-xs font-semibold bg-orange-100 text-orange-800 hover:bg-orange-200 transition flex items-center gap-2 border border-orange-300 cursor-pointer';
      }
    };

    // Open Job Modal
    window.openJobModal = function(jobId) {
      const db = window.ST_JOBS_DB || [];
      const job = db.find(j => String(j.id) === String(jobId) || String(j.post_id) === String(jobId));
      if (!job) {
        console.error("Job not found in database:", jobId);
        return;
      }

      const currentLang = localStorage.getItem('stframe_lang') || 'th';
      const isEn = currentLang === 'en';

      const badgeEl = document.getElementById('modalJobBadge');
      if (badgeEl) {
        badgeEl.textContent = isEn ? (job.category_en || job.category_th) : job.category_th;
      }

      const typeEl = document.getElementById('modalJobType');
      if (typeEl) {
        typeEl.textContent = isEn ? (job.type_en || job.type_th) : job.type_th;
      }

      const titleThEl = document.getElementById('modalJobTitleTh');
      if (titleThEl) {
        titleThEl.textContent = isEn ? (job.title_en || job.title_th) : job.title_th;
      }

      const titleEnEl = document.getElementById('modalJobTitleEn');
      if (titleEnEl) {
        titleEnEl.textContent = isEn ? job.title_th : (job.title_en || '');
      }

      const salaryEl = document.getElementById('modalJobSalary');
      if (salaryEl) {
        salaryEl.textContent = isEn ? (job.salary_en || job.salary_th) : job.salary_th;
      }

      const hoursEl = document.getElementById('modalJobHours');
      if (hoursEl) {
        hoursEl.textContent = isEn ? (job.working_hours_en || job.working_hours_th) : job.working_hours_th;
      }

      const locEl = document.getElementById('modalJobLocation');
      if (locEl) {
        locEl.textContent = isEn ? (job.workplace_en || "Ayutthaya Plant (Bang Pahan)") : (job.workplace_th || "โรงงานอยุธยา (อ.บางปะหัน)");
      }

      // Toggle JobThai button visibility & link
      const linkEl = document.getElementById('modalJobThaiLink');
      if (linkEl) {
        if (job.is_jobthai && job.url) {
          linkEl.style.display = 'inline-flex';
          linkEl.href = job.url;
        } else {
          linkEl.style.display = 'none';
        }
      }

      // Update apply button
      const applyEl = document.getElementById('modalApplyWebBtn');
      if (applyEl) {
        applyEl.href = job.apply_url || ("<?php echo esc_url( home_url( '/contact/' ) ); ?>?apply=" + encodeURIComponent(isEn ? (job.title_en || job.title_th) : job.title_th));
      }

      // Populate responsibilities
      const respList = (isEn && job.responsibilities_en && job.responsibilities_en.length) ? job.responsibilities_en : job.responsibilities_th;
      const respContainer = document.getElementById('modalJobResponsibilities');
      if (respContainer && respList) {
        respContainer.innerHTML = respList.map(r => `
          <div class="flex items-start gap-2.5">
            <i class="fas fa-check-circle ${job.is_jobthai ? 'text-orange-500' : 'text-blue-500'} text-xs mt-1 shrink-0"></i>
            <span class="text-slate-700 leading-relaxed">${r}</span>
          </div>
        `).join('');
      }

      // Populate qualifications
      const qualList = (isEn && job.qualifications_en && job.qualifications_en.length) ? job.qualifications_en : job.qualifications_th;
      const qualContainer = document.getElementById('modalJobQualifications');
      if (qualContainer && qualList) {
        qualContainer.innerHTML = qualList.map(q => `
          <div class="flex items-start gap-2.5">
            <i class="fas fa-circle-dot ${job.is_jobthai ? 'text-orange-500' : 'text-blue-500'} text-xs mt-1 shrink-0"></i>
            <span class="text-slate-700 leading-relaxed">${q}</span>
          </div>
        `).join('');
      }

      // Show modal & lock scroll
      const modal = document.getElementById('jobModal');
      if (modal) {
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
      }
    };

    window.closeJobModal = function() {
      const modal = document.getElementById('jobModal');
      if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = '';
      }
    };

    // Keyboard Escape listener
    document.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') window.closeJobModal();
    });
  </script>

<?php get_footer(); ?>
