# ANP Logistics – Landing Page & WordPress Theme Demo

Giao diện website chuyên nghiệp chuẩn Enterprise Gateway cho **ANP Logistics (Công ty TNHH Dịch vụ Logistics An Phát)**. Thiết kế theo tiêu chuẩn B2B Logistics quốc tế (Maersk, DHL), tối ưu tốc độ, zero-dependency ngoài Tailwind CSS CDN, giao diện song ngữ Việt/Anh và mobile-first.

---

## 🚀 Live Demo (Githack)

Trải nghiệm trực tiếp toàn bộ tính năng và giao diện tương tác không cần cài đặt hosting/server:

- 🌐 **Trang chủ (Home Page):**  
  [https://raw.githack.com/websiteallship/logisticsdemo/main/index.html](https://raw.githack.com/websiteallship/logisticsdemo/main/index.html)
  *(Bao gồm: Hero Slider 4 ảnh Ken-Burns + timeline, Marquee 15 logo đối tác màu gốc, Connected Glass Stepper 4 bước quy trình, Accordion FAQ, Form báo giá B2B, Menu Mobile Accordion Drawer)*

- 📞 **Trang Liên hệ (Contact Page):**  
  [https://raw.githack.com/websiteallship/logisticsdemo/main/lien-he.html](https://raw.githack.com/websiteallship/logisticsdemo/main/lien-he.html)

- ❓ **Trang Hỏi đáp (FAQ Page):**  
  [https://raw.githack.com/websiteallship/logisticsdemo/main/hoi-dap.html](https://raw.githack.com/websiteallship/logisticsdemo/main/hoi-dap.html)

---

## 📁 Cấu trúc Repository

```
logisticsdemo/
├── index.html                       # Trang chủ tĩnh demo Githack
├── lien-he.html                     # Trang liên hệ tĩnh demo Githack
├── hoi-dap.html                     # Trang hỏi đáp FAQ tĩnh demo Githack
├── assets/                          # Tài nguyên tĩnh (CSS, JS, hình ảnh thực tế)
│   ├── css/theme.css                # CSS thiết kế tùy chỉnh
│   ├── js/main.js                   # JS Slider, Header scroll, Mobile Accordion
│   └── img/                         # Bộ ảnh thực tế chuyên ngành Logistics (100% bản quyền mở)
└── wp-content/themes/anp-logistics/ # Toàn bộ mã nguồn WordPress Theme hoàn chỉnh
    ├── style.css
    ├── functions.php
    ├── header.php
    ├── footer.php
    ├── front-page.php
    ├── page-contact.php
    ├── page-faq.php
    ├── single-anp_service.php
    ├── inc/
    │   ├── setup.php
    │   ├── nav.php
    │   ├── options.php
    │   ├── i18n.php
    │   ├── photos.php
    │   ├── seo.php
    │   └── contact.php
    └── TAI-LIEU-DU-AN.md
```

---

## 🛠️ Cài đặt vào WordPress

1. Sao chép thư mục `wp-content/themes/anp-logistics` vào thư mục `wp-content/themes/` trong mã nguồn WordPress của bạn.
2. Vào **WordPress Admin > Giao diện > Giao diện**, tìm và nhấn **Kích hoạt (Activate)** theme **ANP Logistics**.
3. Theme sẽ tự động khởi tạo 6 dịch vụ mẫu, cấu hình hệ thống bảng màu và thiết lập định tuyến URL cho các trang chuyên biệt.
