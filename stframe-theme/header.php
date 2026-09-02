<?php
/**
 * The header for our theme
 *
 * @package ST_Frame
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
/assets/images/logo-icon.png">
      <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-icon.png">
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-icon.png">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen selection:bg-orange-500 selection:text-white' ); ?>>
<?php wp_body_open(); ?>

  <!-- TOP BAR -->
  <div class="bg-slate-950 text-slate-300 text-xs py-2 border-b border-slate-800/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-2">
      <div class="flex items-center space-x-6">
        <span class="flex items-center gap-1.5"><i class="fas fa-map-marker-alt text-orange-500"></i> บางปะหัน พระนครศรีอยุธยา</span>
        <span class="flex items-center gap-1.5"><i class="fas fa-phone-alt text-orange-500"></i> 035-779-554, 035-779-555</span>
        <span class="hidden md:flex items-center gap-1.5"><i class="fas fa-envelope text-orange-500"></i> stframe_factory@stframe.com</span>
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

  <!-- MAIN HEADER / NAVBAR -->
  <header id="main-header" class="sticky top-0 z-50 bg-slate-950 backdrop-blur-md border-b border-slate-800/80 py-3">
    <div class="max-w-7xl 2xl:max-w-[1440px] mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between gap-4">
      <!-- LOGO -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 group shrink-0">
        <div class="h-11 w-11 bg-white rounded-xl flex items-center justify-center p-1.5 shadow-md shrink-0 group-hover:scale-105 transition transform">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo-icon.png" alt="<?php bloginfo( 'name' ); ?>" class="h-full w-auto object-contain">
        </div>
        <div class="flex flex-col">
          <span class="text-xl font-bold tracking-tight text-white font-heading leading-tight group-hover:text-orange-400 transition"><?php bloginfo( 'name' ); ?></span>
          <span class="text-[10px] uppercase tracking-widest text-slate-400 font-medium whitespace-nowrap">Steel Structure Specialist Since 1992</span>
        </div>
      </a>

      <!-- DESKTOP NAVIGATION -->
      <div class="hidden lg:flex items-center gap-3 xl:gap-5 2xl:gap-8">
                <nav class="flex items-center gap-0.5 xl:gap-1 text-[13px] xl:text-[13.5px] 2xl:text-sm text-slate-200">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">หน้าแรก</a>
          <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">เกี่ยวกับเรา</a>
          <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">บริการและโซลูชัน</a>
          <a href="<?php echo esc_url( home_url( '/projects/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">ผลงานโครงการ</a>
          <a href="<?php echo esc_url( home_url( '/technology/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">เทคโนโลยีและโรงงาน</a>
          <a href="<?php echo esc_url( home_url( '/magazine/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">ST Magazine</a>
          <a href="<?php echo esc_url( home_url( '/media/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">Media</a>
          <a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>" class="hover:text-orange-400 px-2 xl:px-3 py-2 rounded-lg font-medium whitespace-nowrap">ร่วมงานกับเรา</a>
        </nav>

        <!-- CTA -->
        <div class="pl-3 xl:pl-5 border-l border-slate-800">
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-500 hover:to-amber-400 text-white font-semibold px-4 xl:px-5 py-2.5 rounded-xl shadow-md text-xs xl:text-sm transition whitespace-nowrap shrink-0 flex items-center gap-2">
            <i class="fas fa-paper-plane text-xs"></i> ติดต่อเรา
          </a>
        </div>
      </div>

      <!-- Mobile Button -->
      <div class="lg:hidden flex items-center">
        <button id="mobile-menu-btn" type="button" class="text-slate-300 hover:text-white p-2">
          <i class="fas fa-bars text-2xl"></i>
        </button>
      </div>
    </div>
  </header>
