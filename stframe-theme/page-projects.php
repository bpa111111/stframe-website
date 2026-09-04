<?php
/**
 * Template Name: Projects
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
            <i class="fas fa-trophy"></i> <span data-th="ผลงานโครงการและความไว้วางใจ" data-en="Clients Reference & Projects">ผลงานโครงการและความไว้วางใจ</span>
          </div>
          <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold font-heading text-white tracking-tight" data-th="รวมผลงานโครงการอ้างอิง" data-en="Project Portfolio">
            รวมผลงานโครงการอ้างอิง
          </h1>
          <p class="text-slate-300 text-base sm:text-lg font-light leading-relaxed" data-th="ST. Frame & Truss Co., Ltd. ได้มีส่วนร่วมในการส่งมอบงานโครงสร้างเหล็กคุณภาพสูงในหลากหลายโครงการระดับชาติและภาคอุตสาหกรรม" data-en="ST. Frame & Truss has delivered landmark steel structural solutions across government and private sector projects nationwide.">
            ST. Frame & Truss Co., Ltd. ได้มีส่วนร่วมในการส่งมอบงานโครงสร้างเหล็กคุณภาพสูงในหลากหลายโครงการระดับชาติและภาคอุตสาหกรรม
          </p>
        </div>
      </div>
    </section>

    <!-- PORTFOLIO FILTER & GRID -->
    <section class="py-16 bg-slate-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Filter Tabs -->
        <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3 mb-12">
          <button class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition whitespace-nowrap bg-orange-500 text-white shadow-md" data-filter="all">
            <span data-th="ทั้งหมด (All Projects)" data-en="All Projects">ทั้งหมด (All Projects)</span>
          </button>
          <button class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-100 text-slate-700 hover:bg-slate-200" data-filter="landmark">
            <span data-th="โครงการสำคัญ / รัฐวิสาหกิจ" data-en="Landmark & Public Infra">โครงการสำคัญ / รัฐวิสาหกิจ</span>
          </button>
          <button class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-100 text-slate-700 hover:bg-slate-200" data-filter="factory">
            <span data-th="โรงงานอุตสาหกรรม" data-en="Industrial Factories">โรงงานอุตสาหกรรม</span>
          </button>
          <button class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-100 text-slate-700 hover:bg-slate-200" data-filter="commercial">
            <span data-th="ศูนย์การค้า / HomePro / MegaHome" data-en="Commercial & Retail">ศูนย์การค้า / HomePro / MegaHome</span>
          </button>
          <button class="filter-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold transition bg-slate-100 text-slate-700 hover:bg-slate-200" data-filter="education">
            <span data-th="การศึกษา / คลังสินค้า / พิเศษ" data-en="Logistics & Education">การศึกษา / คลังสินค้า / พิเศษ</span>
          </button>
        </div>

        <!-- Projects Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="projects-container">
          <?php
          $all_projects = new WP_Query( array(
              "post_type"      => "st_project",
              "posts_per_page" => -1,
              "post_status"    => "publish",
              "orderby"        => "menu_order",
              "order"          => "ASC",
          ) );

          if ( $all_projects->have_posts() ) :
              $card_idx = 0;
              while ( $all_projects->have_posts() ) : $all_projects->the_post();
                  $proj_id     = get_the_ID();
                  $client      = get_field( "client", $proj_id ) ?: get_post_meta( $proj_id, "client", true ) ?: "ST. FRAME & TRUSS";
                  $year        = get_field( "year", $proj_id ) ?: get_post_meta( $proj_id, "year", true ) ?: "";
                  $location    = get_field( "location", $proj_id ) ?: get_post_meta( $proj_id, "location", true ) ?: "";
                  $loc_en      = get_post_meta( $proj_id, "loc_en", true ) ?: $location;
                  $scope       = get_field( "scope", $proj_id ) ?: get_post_meta( $proj_id, "scope", true ) ?: get_the_excerpt();
                  $scope_en    = get_post_meta( $proj_id, "scope_en", true ) ?: $scope;
                  $title_en    = get_post_meta( $proj_id, "title_en", true ) ?: get_the_title();
                  $tag         = get_post_meta( $proj_id, "tag", true ) ?: "Engineering Landmark";
                  $pdf_file    = get_field( "pdf_file", $proj_id ) ?: get_post_meta( $proj_id, "pdf_file", true );
                  $thumb       = has_post_thumbnail( $proj_id ) ? get_the_post_thumbnail_url( $proj_id, "large" ) : get_template_directory_uri() . "/assets/images/hero-factory.jpg";
                  $is_col_span = ( get_post_meta( $proj_id, "is_col_span", true ) === "1" ) || ( $card_idx < 2 );

                  $terms       = get_the_terms( $proj_id, "project_category" );
                  $cat_slug    = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->slug : "all";

                  $modal_data = htmlspecialchars( json_encode( array(
                      "title"    => get_the_title(),
                      "titleEn"  => $title_en,
                      "client"   => $client,
                      "year"     => $year,
                      "location" => $location,
                      "locEn"    => $loc_en,
                      "scope"    => $scope,
                      "scopeEn"  => $scope_en,
                      "tag"      => $tag,
                      "pdf"      => $pdf_file ?: "",
                  ), JSON_UNESCAPED_UNICODE ), ENT_QUOTES, "UTF-8" );

                  if ( $is_col_span ) :
                  ?>
                  <!-- Featured Hero Card: <?php the_title_attribute(); ?> -->
                  <div class="project-item steel-card bg-white rounded-2xl overflow-hidden shadow-sm flex flex-col md:flex-row md:col-span-full group" data-category="<?php echo esc_attr( $cat_slug ); ?>">
                    <div class="md:w-1/2 lg:w-3/5 h-64 md:h-auto relative overflow-hidden project-card-image-wrap">
                      <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 ease-out" loading="lazy">
                      <div class="absolute inset-0 bg-gradient-to-r from-transparent to-slate-950/10 pointer-events-none hidden md:block"></div>
                      <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-transparent to-transparent pointer-events-none md:hidden"></div>
                      <span class="absolute top-4 left-4 bg-orange-600 text-white font-bold text-xs uppercase px-3 py-1.5 rounded shadow-md"><?php echo esc_html( $tag ); ?></span>
                      <?php if ( $pdf_file ) : ?>
                        <a href="<?php echo esc_url( $pdf_file ); ?>" target="_blank" class="absolute top-4 right-4 bg-slate-900/80 hover:bg-slate-900 text-white text-xs font-bold px-3 py-1.5 rounded-lg flex items-center gap-1.5 shadow z-10">
                          <i class="fas fa-file-pdf text-red-400"></i> PDF
                        </a>
                      <?php endif; ?>
                    </div>
                    <div class="md:w-1/2 lg:w-2/5 flex flex-col justify-center p-6 md:p-8 lg:p-10 space-y-4">
                      <span class="text-sm text-orange-600 font-bold tracking-wide uppercase block"><?php echo esc_html( $client ); ?></span>
                      <h3 class="font-extrabold text-2xl lg:text-3xl font-heading text-slate-900 leading-tight"><?php the_title(); ?></h3>
                      <p class="text-sm lg:text-base text-slate-600 leading-relaxed"><?php echo esc_html( wp_strip_all_tags( $scope ) ); ?></p>
                      
                      <div class="pt-6 mt-2 border-t border-slate-100 flex items-center justify-between">
                        <div class="flex items-start gap-1.5 min-w-0 pr-2">
                          <i class="fas fa-map-marker-alt text-orange-500 shrink-0 mt-0.5 text-sm"></i>
                          <span class="text-sm font-medium text-slate-500 leading-snug"><?php echo esc_html( $location ); ?></span>
                        </div>
                        <button onclick='openProjectModal(<?php echo $modal_data; ?>, "<?php echo esc_url( $thumb ); ?>")' class="text-sm font-bold text-white bg-slate-900 hover:bg-orange-600 px-5 py-2.5 rounded-lg whitespace-nowrap shrink-0 transition-colors shadow-sm">
                          <span>ดูรายละเอียด</span> <i class="fas fa-arrow-right ml-1"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                  <?php else : ?>
                  <!-- Standard Project Card: <?php the_title_attribute(); ?> -->
                  <div class="project-item steel-card bg-white rounded-2xl overflow-hidden shadow-sm flex flex-col justify-between" data-category="<?php echo esc_attr( $cat_slug ); ?>">
                    <div>
                      <div class="project-card-image-wrap h-52 relative">
                        <img src="<?php echo esc_url( $thumb ); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-500 ease-out" loading="lazy">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/50 via-transparent to-transparent pointer-events-none"></div>
                        <span class="absolute top-3 left-3 bg-blue-600 text-white font-bold text-[10px] uppercase px-2.5 py-1 rounded shadow"><?php echo esc_html( $tag ); ?></span>
                        <?php if ( $pdf_file ) : ?>
                          <a href="<?php echo esc_url( $pdf_file ); ?>" target="_blank" class="absolute top-3 right-3 bg-slate-900/80 hover:bg-slate-900 text-white text-[10px] font-bold px-2 py-1 rounded flex items-center gap-1 shadow">
                            <i class="fas fa-file-pdf text-red-400"></i> PDF
                          </a>
                        <?php endif; ?>
                      </div>
                      <div class="p-6 space-y-2">
                        <span class="text-xs text-orange-600 font-semibold block"><?php echo esc_html( $client ); ?></span>
                        <h3 class="font-bold text-lg font-heading text-slate-900"><?php the_title(); ?></h3>
                        <p class="text-xs text-slate-600 line-clamp-3"><?php echo esc_html( wp_strip_all_tags( $scope ) ); ?></p>
                      </div>
                    </div>
                    <div class="px-6 pb-6 pt-2 border-t border-slate-100 flex items-center justify-between">
                      <div class="flex items-start gap-1.5 min-w-0 pr-2">
                        <i class="fas fa-map-marker-alt text-orange-500 shrink-0 mt-0.5 text-xs"></i>
                        <span class="text-xs text-slate-500 leading-snug"><?php echo esc_html( $location ); ?></span>
                      </div>
                      <button onclick='openProjectModal(<?php echo $modal_data; ?>, "<?php echo esc_url( $thumb ); ?>")' class="text-xs font-bold text-orange-600 hover:text-orange-700 whitespace-nowrap shrink-0">
                        <span>ดูรายละเอียด</span> <i class="fas fa-arrow-right ml-1"></i>
                      </button>
                    </div>
                  </div>
                  <?php
                  endif;
                  $card_idx++;
              endwhile;
              wp_reset_postdata();
          endif;
          ?>
        </div>

      </div>
    </section>

  </main>

  <!-- PROJECT DETAIL MODAL -->
  <div id="project-modal" class="fixed inset-0 z-50 modal-backdrop bg-slate-950/80 hidden flex items-center justify-center p-4">
    <div class="modal-content-box bg-white w-full max-w-3xl max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl border border-slate-200">
      
      <div class="relative h-64 sm:h-72 overflow-hidden bg-slate-900">
        <img id="modal-img" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/hero-factory.jpg" alt="Project Image" class="w-full h-full object-cover object-center">
        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-transparent"></div>
        <button onclick="closeProjectModal()" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-950/70 hover:bg-slate-950 text-white flex items-center justify-center transition z-10">
          <i class="fas fa-times"></i>
        </button>
        <span id="modal-badge" class="absolute bottom-4 left-4 bg-orange-600 text-white font-bold text-xs px-3 py-1 rounded-md shadow z-10 whitespace-nowrap"></span>
      </div>

      <div class="p-6 sm:p-8 space-y-6">
        <div>
          <h3 id="modal-title" class="text-2xl font-bold font-heading text-slate-900"></h3>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 p-4 bg-slate-50 rounded-xl border border-slate-100 text-xs">
          <div>
            <span class="text-slate-400 block font-medium" data-th="ผู้ว่าจ้าง / Client" data-en="Client / General Contractor">ผู้ว่าจ้าง / Client</span>
            <span id="modal-client" class="text-slate-900 font-bold text-sm"></span>
          </div>
          <div>
            <span class="text-slate-400 block font-medium" data-th="ปีที่แล้วเสร็จ / Completion" data-en="Completion Year">ปีที่แล้วเสร็จ / Completion</span>
            <span id="modal-year" class="text-slate-900 font-bold text-sm"></span>
          </div>
          <div>
            <span class="text-slate-400 block font-medium" data-th="สถานที่ / Location" data-en="Project Location">สถานที่ / Location</span>
            <span id="modal-location" class="text-slate-900 font-bold text-sm"></span>
          </div>
        </div>

        <div>
          <h4 class="text-xs uppercase font-bold text-slate-400 tracking-wider mb-2" data-th="ขอบเขตงานโครงสร้างเหล็ก / Scope of Work" data-en="Scope of Steel Structural Works">ขอบเขตงานโครงสร้างเหล็ก / Scope of Work</h4>
          <p id="modal-scope" class="text-slate-700 text-sm leading-relaxed"></p>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end">
          <button onclick="closeProjectModal()" class="px-5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold" data-th="ปิดหน้าต่าง (Close)" data-en="Close Window">
            ปิดหน้าต่าง (Close)
          </button>
        </div>
      </div>

    </div>
  </div>

  <!-- FOOTER -->

<?php get_footer(); ?>
