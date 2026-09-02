# คู่มือการติดตั้งและแปลงเว็บไซต์ www.stframe.com ขึ้นสู่ WordPress (WordPress Setup & Migration Guide)

เอกสารนี้จัดทำขึ้นเพื่อแนะนำขั้นตอนการนำดีไซน์ใหม่ของ **บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด (ST. Frame & Truss Co., Ltd.)** ที่ออกแบบและพัฒนาไฟล์พรีวิวเสร็จสมบูรณ์แล้ว ไปติดตั้งและใช้งานบนระบบ **WordPress** เพื่อให้ง่ายต่อการแก้ไขข้อมูล เพิ่มผลงานโครงการ และดูแลรักษาในระยะยาว

---

## 1. โครงสร้างไฟล์ในโครงการ (Project Structure)

ภายในโฟลเดอร์นี้ประกอบด้วย 2 ส่วนหลัก:

```
Redesign Website/
│
├── 📂 assets/                    # ไฟล์ Asset สำหรับดีไซน์
│   ├── css/style.css            # Custom CSS, แอนิเมชัน, สีประจำแบรนด์ ST Frame
│   └── js/main.js               # JavaScript (เมนูมือถือ, Filter โครงการ, Modal, สลับภาษา TH/EN)
│
├── 📄 index.html                # [Preview] หน้าแรก (Home Page)
├── 📄 about.html                # [Preview] หน้าเกี่ยวกับเรา (About Us)
├── 📄 services.html             # [Preview] หน้าบริการและโซลูชันวิศวกรรม (Services)
├── 📄 projects.html             # [Preview] หน้าผลงานโครงการพร้อมระบบ Filter & Modal
├── 📄 technology.html           # [Preview] หน้าเทคโนโลยี BIM Tekla, ERP และโรงงานอยุธยา
├── 📄 magazine.html             # [Preview] หน้า ST Magazine และบทความวิชาการ
├── 📄 careers.html              # [Preview] หน้ารับสมัครงาน (Careers / Job Openings)
├── 📄 contact.html              # [Preview] หน้าติดต่อเรา แผนที่โรงงานอยุธยา และฟอร์มขอราคา
│
├── 📂 stframe-theme/             # [WordPress Theme Starter Package]
│   ├── style.css                # Header ข้อมูล Theme สำหรับ WordPress
│   ├── functions.php            # ฟังก์ชันหลัก ระบบ Enqueue Scripts และ Custom Post Types
│   ├── header.php               # ส่วนหัวเว็บไซต์ (Top Bar + Main Navigation)
│   ├── footer.php               # ส่วนท้ายเว็บไซต์ (Footer + Copyright)
│   ├── front-page.php           # Template หน้าแรกแบบ Dynamic
│   ├── single-project.php       # Template หน้าแสดงรายละเอียดโครงการเดี่ยว
│   └── index.php                # Template สำรอง
│
└── 📄 WORDPRESS_SETUP_GUIDE.md   # คู่มือการติดตั้งนี้
```

---

## 2. วิธีการเปิดดูตัวอย่างไฟล์พรีวิว (How to Preview Now)

1. สามารถดับเบิลคลิกเปิดไฟล์ **`index.html`** หรือหน้าใดก็ได้ผ่านเว็บเบราว์เซอร์ (Google Chrome, Microsoft Edge, Safari ฯลฯ)
2. ทุกหน้าสามารถคลิกเชื่อมโยงหากันได้ทันที
3. ทดสอบระบบต่างๆ:
   - **สลับภาษา (TH / EN):** กดปุ่ม TH / EN ที่แถบด้านบนขวา
   - **กรองหมวดหมู่โครงการ:** ในหน้า `projects.html` สามารถกดแท็บ *โครงการสำคัญ, โรงงานอุตสาหกรรม, ศูนย์การค้า*
   - **ดูรายละเอียดโครงการ:** กดปุ่ม *"ดูรายละเอียด"* บนการ์ดผลงาน เพื่อเปิดหน้าต่าง Modal
   - **ฟอร์มติดต่อ:** ในหน้า `contact.html` มีฟอร์มจำลองการส่งข้อมูลพร้อมแจ้งเตือน

---

## 3. ขั้นตอนการนำขึ้น WordPress จริง (Step-by-Step Migration)

### ขั้นตอนที่ 1: เตรียม WordPress Hosting & Domain
1. ติดตั้ง WordPress บน Hosting ที่รองรับ PHP 8.0+ (เช่น Hostatom, Cloudways, หรือ cPanel Hosting ทั่วไป)
2. ชี้ DNS โดเมน `www.stframe.com` ไปยังโฮสติ้งใหม่
3. ติดตั้งใบรับรองความปลอดภัย **SSL (HTTPS)**

---

### ขั้นตอนที่ 2: เลือกวิธีติดตั้งธีม (2 ทางเลือก)

#### **ทางเลือก ก: ใช้งาน Custom Theme (ใช้โฟลเดอร์ `stframe-theme/`)** *(แนะนำสำหรับ Developer)*
1. ทำการบีบอัดโฟลเดอร์ `stframe-theme/` และ `assets/` ให้เป็นไฟล์ `.zip`
2. ล็อกอินเข้าหลังบ้าน WordPress > **Appearance (รูปแบบเว็บ) > Themes (ธีม)**
3. กด **Add New Theme > Upload Theme** และเลือกไฟล์ zip
4. กด **Activate** ธีม
5. เข้าไปที่เมนู **Projects (ผลงาน)** ที่ระบบสร้างขึ้นอัตโนมัติในเมนูซ้าย เพื่อเริ่มเพิ่มผลงาน รูปภาพ และรายละเอียด

#### **ทางเลือก ข: นำดีไซน์ไปประกอบด้วย Page Builder (Elementor / Kadence / Astra)** *(แนะนำสำหรับผู้ดูแลทั่วไปที่ต้องการ Drag & Drop)*
1. ติดตั้งธีมมาตรฐาน เช่น **Astra** หรือ **Hello Elementor**
2. ติดตั้งปลั๊กอิน **Elementor** หรือ **Spectra / Gutenberg Blocks**
3. สร้างหน้า Page ต่างๆ (Home, About Us, Services, Projects, Tech, Contact)
4. นำโครงสร้าง Section, ข้อความ, และสีจากไฟล์ HTML พรีวิวไปจัดวาง ซึ่งทำได้รวดเร็วและตรงตามสเปก

---

### ขั้นตอนที่ 3: ปลั๊กอินที่แนะนำให้ติดตั้งเพิ่ม (Recommended Plugins)

| ปลั๊กอิน | ประโยชน์การใช้งาน |
|---|---|
| **Advanced Custom Fields (ACF)** | เพิ่มช่องกรอกข้อมูลเฉพาะ เช่น *ชื่อผู้ว่าจ้าง (Client)*, *ปีที่สร้างเสร็จ*, *สถานที่* ในหน้าผลงาน |
| **WPForms** หรือ **Contact Form 7** | จัดการฟอร์มติดต่อและส่งอีเมลแจ้งเตือนไปยัง `stframe_factory@stframe.com` |
| **Polylang** หรือ **WPML** | จัดการระบบ 2 ภาษา (ไทย / อังกฤษ) ให้สลับภาษาได้ง่าย |
| **Rank Math SEO** หรือ **Yoast SEO** | จัดการ Title, Meta Description, Open Graph สำหรับแชร์ลง Facebook / LINE |
| **WP Rocket** หรือ **LiteSpeed Cache** | ปรับแต่งความเร็วเว็บไซต์ แคชรูปภาพ และบีบอัดไฟล์ |

---

## 4. ข้อมูลสำคัญประจำเว็บไซต์ ST Frame

- **ชื่อบริษัท:** บริษัท เอส.ที. เฟรม แอนด์ ทรัส จำกัด (ST. Frame & Truss Co., Ltd.)
- **ที่อยู่:** 29/4, 29/15, 29/14, 29/17 หมู่ 3 ตำบลโพธิ์สามต้น อำเภอบางปะหัน จังหวัดพระนครศรีอยุธยา 13220
- **เบอร์โทรศัพท์:** 035-779-554, 035-779-555
- **อีเมล:** stframe_factory@stframe.com
- **เวลาทำการ:** จันทร์ - เสาร์ 08:00 - 17:00 น.
- **ลิงก์ระบบ ERP ภายใน:** http://202.80.235.61:2026
