# Tài liệu dự án – Theme HP Trading - Transport

Theme WordPress cho HP Trading - Transport. Giao diện làm lại theo hướng hiện đại, song ngữ Việt/Anh, mọi thông tin doanh nghiệp và nội dung đều quản lý trong Customizer, không hardcode.

---

## 1. Tổng quan

| Hạng mục | Nội dung |
|---|---|
| Tên theme | HP Trading - Transport (`anp-logistics`) |
| Phiên bản | 1.0.1 |
| Nền tảng | WordPress 6.4+, PHP 7.4+ |
| Giao diện | Tailwind CSS (Play CDN) + CSS bổ sung (`assets/css/theme.css`) + AOS (hiệu ứng cuộn) |
| Phong cách | Trust & Authority, mẫu trang Enterprise Gateway (sinh bằng skill UI/UX Pro Max, xem mục 12) |
| Font | Lexend (tiêu đề) + Source Sans 3 (nội dung), sans-serif không chân, hỗ trợ đầy đủ tiếng Việt (xem mục 11.1) |
| Hình ảnh | Ảnh thật có giấy phép mở, đóng gói sẵn trong theme (xem mục 13) |
| Ngôn ngữ | Tiếng Việt và tiếng Anh, chuyển bằng nút VI/EN trên header |
| SEO | Tương thích Rank Math; có fallback khi chưa cài Rank Math |
| Đường dẫn theme | `wp-content/themes/anp-logistics/` |

**Đã làm:** trang chủ 8 phần; trang dịch vụ (CPT, song ngữ, có sẵn 6 dịch vụ mẫu khi kích hoạt); tin tức; trang tĩnh; 404; form báo giá; Customizer đầy đủ thông tin doanh nghiệp, pháp lý, thuế, liên hệ, nội dung trang chủ, SEO và bộ màu; schema, llms.txt.

**Chưa làm trong phiên này:** chưa cài vào WordPress đang chạy để render thử; chưa cài và cấu hình Rank Math; chưa gửi thử form; chưa có ảnh thật; chưa có số liệu pháp lý (mã số thuế, số ĐKDN) vì chưa có nguồn xác nhận. Xem mục 10.

---

## 2. Cấu trúc thư mục

```
anp-logistics/
├── style.css                 Metadata theme
├── functions.php             Điểm vào, nạp các file trong inc/
├── header.php                Header, menu desktop + mobile, nút VI/EN, nút gọi/báo giá
├── footer.php                Footer: liên hệ, thông tin doanh nghiệp và thuế, liên kết, bản quyền
├── front-page.php            Trang chủ (8 phần, mục 4)
├── index.php                 Danh sách bài viết (trang blog)
├── single.php                Chi tiết bài viết / dịch vụ
├── page.php                  Trang tĩnh
├── page-contact.php          Trang liên hệ riêng (Template Name: Trang liên hệ)
├── page-faq.php              Trang hỏi đáp chuyên sâu (Template Name: Trang hỏi đáp)
├── single-anp_service.php    Chi tiết dịch vụ hải quan / vận tải
├── archive.php               Lưu trữ: danh mục, thẻ, /dich-vu/
├── 404.php                   Trang không tìm thấy
├── inc/
│   ├── i18n.php              Ngôn ngữ đang xem (anp_lang), cookie, nút VI/EN,
│   │                         từ điển nhãn giao diện anp_strings() và anp_t()
│   ├── setup.php             Tính năng theme, menu, CSS/JS, Tailwind, bộ màu,
│   │                         CPT Dịch vụ song ngữ, dữ liệu dịch vụ mẫu, icon, logo
│   ├── photos.php            Thư viện ảnh: anp_photo_img(), ghi công ảnh, ảnh mặc định theo dịch vụ
│   ├── options.php           Giá trị mặc định song ngữ, anp_opt(), Customizer "HP Trading - Transport Theme Options"
│   ├── seo.php               Meta, Open Graph, schema JSON-LD (gồm mã số thuế), llms.txt, Rank Math
│   └── contact.php           Xử lý form báo giá (nonce, honeypot, wp_mail)
├── assets/
│   ├── css/theme.css         Font, nút, thẻ, ô nhập, hiệu ứng vào trang, kiểu bài viết, reduced motion
│   ├── img/                  8 ảnh thật (hero, port, road, sea, air, warehouse, project, night), mỗi ảnh có bản 500px và 960px
│   └── js/main.js            Menu mobile, đổ bóng header, khởi tạo AOS
├── design-system/            Hệ thống thiết kế do UI/UX Pro Max sinh ra (MASTER.md)
└── TAI-LIEU-DU-AN.md         Tài liệu này
```

---

## 3. Cài đặt

1. **Giao diện > Giao diện:** kích hoạt **HP Trading - Transport**. Khi kích hoạt, theme đăng ký CPT Dịch vụ, tạo 6 dịch vụ mẫu (chỉ một lần), và nạp lại rewrite rules.
2. **Cài đặt > Đọc:** chọn **Trang tĩnh** làm trang chủ và tạo trang **Tin tức** làm trang bài viết. Nếu chưa tạo, menu dự phòng dùng `/blog/`.
3. **Cài đặt > Đường dẫn tĩnh:** bấm **Lưu** một lần để `/llms.txt` và `/dich-vu/` hoạt động.
4. **Giao diện > Menu:** tạo menu, gán vào **Menu chính** và **Menu chân trang**. Nếu chưa tạo, theme dùng menu dự phòng song ngữ.
5. **Giao diện > Tùy chỉnh > HP Trading - Transport Theme Options:** điền toàn bộ thông tin (mục 5). Đặc biệt các trường pháp lý và thuế đang để trống, cần điền trước khi bàn giao.
6. Cài **SMTP** (ví dụ WP Mail SMTP) để form báo giá gửi mail ổn định.

**Yêu cầu trình duyệt truy cập được:** `cdn.tailwindcss.com`, `cdnjs.cloudflare.com`, `fonts.googleapis.com`.

---

## 4. Trang chủ – cấu trúc từng phần

| # | Phần | id (neo menu) | Nội dung lấy từ đâu |
|---|---|---|---|
| 1 | Hero | – | Ảnh cảng container toàn khung phủ lớp tối; Customizer: dòng nhỏ, tiêu đề, mô tả, ảnh nền (tùy chọn) |
| 2 | Chỉ số | – | Thẻ trắng đè lên mép dưới hero; Customizer: 3 chỉ số và năm thành lập |
| 3 | Giới thiệu | `#gioi-thieu` | Customizer: tiêu đề, đoạn giới thiệu, giá trị cốt lõi, sứ mệnh, tầm nhìn, ảnh (tùy chọn); 2 ảnh ghép kho và xe đầu kéo |
| 3b | Đối tác | `#doi-tac` | Băng 15 logo đối tác 1 dòng liên tục, chạy ngang tự động từ phải sang trái (35 giây một vòng lặp vô tận, dừng khi rê chuột). Người dùng bật giảm chuyển động thì băng đứng yên và hiển thị dạng lưới. |
| 4 | Dịch vụ | `#dich-vu` | CPT Dịch vụ, thẻ có ảnh (ảnh đại diện của dịch vụ, nếu không có thì ảnh mặc định theo icon) |
| 5 | Quy trình | `#quy-trinh` | Nền ảnh cảng về đêm; Customizer: tiêu đề, các dòng "Tiêu đề \| Nội dung", ảnh nền (tùy chọn) |
| 6 | Tin tức | `#tin-tuc` | 3 bài viết mới nhất (ẩn nếu chưa có bài) |
| 7 | Hỏi đáp | `#hoi-dap` | Customizer: tiêu đề, mô tả và các dòng "Câu hỏi \| Trả lời" (ẩn nếu trống) |
| 8 | Liên hệ & báo giá | `#lien-he` | Customizer: tiêu đề, mô tả, thông tin liên hệ; form gửi qua `admin-post.php` |

Ngoài ra, footer hiển thị khối **Thông tin doanh nghiệp**: tên pháp lý, mã số thuế, địa chỉ đăng ký thuế, người đại diện pháp luật, số Giấy chứng nhận ĐKDN, ngày cấp, nơi cấp. Chỉ hiện những mục đã được điền.

**Header co gọn khi cuộn:** header cố định gồm hai thanh. Thanh trên cùng (điện thoại, email, giờ làm việc, nút VI/EN, cao 36px) và thanh menu chính (cao 72px). Khi cuộn xuống quá 80px, thanh trên cùng thu gọn về 0 và thanh menu chính hạ còn 60px, kèm đổ bóng. Cuộn ngược về gần đầu trang (dưới 24px) thì cả hai trở lại. Hai ngưỡng khác nhau để header không nhấp nháy quanh một điểm. Thanh trên cùng sau khi thu gọn bị ẩn khỏi thứ tự Tab. Mã nằm ở `assets/js/main.js` (thêm/bỏ class `is-scrolled`), `assets/css/theme.css` (các lớp `.anp-topbar`, `.anp-mainbar`) và `header.php`. Người dùng bật chế độ giảm chuyển động thì chuyển cảnh bị tắt. Header cố định nên thu gọn không làm nội dung trang bị giật.

---

## 5. Tùy chọn theme (Customizer)

Vào **Giao diện > Tùy chỉnh > HP Trading - Transport Theme Options**. Các trường đánh dấu **(Tiếng Việt)** và **(English)** là cặp song ngữ. Trường không có dấu này dùng chung cho cả hai ngôn ngữ.

### 5.1 Thương hiệu & logo
- **Ngôn ngữ mặc định khi mở website:** Tiếng Việt hoặc English. Người dùng có thể đổi bằng nút VI/EN, lựa chọn được ghi nhớ trong cookie một năm.
- **Logo** (PNG/SVG nền trong suốt). Để trống thì dùng chữ và biểu tượng mặc định.
- Tên thương hiệu ngắn, tên công ty đầy đủ, khẩu hiệu, lĩnh vực hiển thị dưới logo (song ngữ), năm thành lập.

### 5.2 Pháp lý & mã số thuế
- **Mã số thuế** (dùng chung).
- **Địa chỉ đăng ký thuế** (song ngữ).
- **Họ tên người đại diện pháp luật**, **chức danh** (song ngữ).
- **Số Giấy chứng nhận đăng ký doanh nghiệp**, **ngày cấp** (định dạng dd/mm/yyyy), **cơ quan cấp** (song ngữ).

### 5.3 Thông tin liên hệ
- Hotline (chỉ số để gọi) và hotline hiển thị, email, link Zalo, link Facebook, tên miền hiển thị.
- Địa chỉ trụ sở và văn phòng đại diện (song ngữ), link bản đồ.
- **Giờ làm việc (song ngữ):** ô nhiều dòng, **mỗi dòng một khung giờ**, ví dụ `Thứ 2 – Thứ 6: 08:00 – 17:30` và `Thứ 7: 08:00 – 12:00`. Hiển thị ở ba nơi: thanh đầu trang (các dòng gộp thành một dòng, ngăn cách bằng dấu "·"), mục liên hệ và chân trang (mỗi khung giờ một dòng), cùng tệp `/llms.txt`. Để trống cả ô thì thanh đầu trang tự ẩn dòng giờ làm việc. Đường dẫn: Giao diện > Tùy chỉnh > HP Trading - Transport Theme Options > Thông tin liên hệ.
- Email nhận form báo giá. Để trống thì dùng email quản trị của WordPress.

### 5.4 Trang chủ
- Dòng nhỏ, tiêu đề, mô tả hero (song ngữ).
- **Ảnh nền hero, ảnh phần giới thiệu, ảnh nền mục quy trình:** tải ảnh của doanh nghiệp lên. Để trống thì theme dùng ảnh mặc định (mục 13).
- Tiêu đề và đoạn giới thiệu, câu giá trị cốt lõi, sứ mệnh, tầm nhìn (song ngữ).
- 3 chỉ số: số (dùng chung) và nhãn (song ngữ).

### 5.5 Tiêu đề & nội dung các mục
- Tiêu đề và mô tả mục dịch vụ, quy trình, tin tức, hỏi đáp, liên hệ (song ngữ).
- **Các bước quy trình:** mỗi dòng một bước, viết theo dạng `Tiêu đề | Nội dung`.
- **Câu hỏi thường gặp:** mỗi dòng một câu, viết theo dạng `Câu hỏi | Trả lời`. Trả lời nên ngắn, nêu thẳng ý chính, vì đây là nội dung công cụ AI trích dẫn.

### 5.6 SEO & GEO
- Mô tả meta mặc định (song ngữ), dùng khi chưa cài Rank Math.

### 5.7 Bộ màu chủ đạo

| Id | Tên | Màu chính | Màu nhấn |
|---|---|---|---|
| `corporate` (mặc định) | Doanh nghiệp: Slate & Xanh da trời | `#0F172A` | `#0EA5E9` (hover `#0369A1`) |
| `navy` | Navy & Vàng hổ phách | `#0B2545` | `#F5A623` |
| `ocean` | Biển xanh & Ngọc lam | `#053B5C` | `#2EC4B6` |
| `forest` | Xanh lá đậm & Chanh | `#14361F` | `#A7C957` |
| `graphite` | Than chì & Cam đồng | `#1F2937` | `#EA580C` |
| `crimson` | Đỏ rượu & Hồng đỏ | `#3B0D11` | `#E11D48` |
| `custom` | Tùy chỉnh | tự chọn | tự chọn |

Chọn **Tùy chỉnh** để dùng bốn màu tự chọn: màu chính, màu chính nhạt, màu nhấn, màu nhấn khi rê chuột.

Cơ chế: `inc/setup.php` xuất các biến `--c-primary`, `--c-primary-soft`, `--c-accent`, `--c-accent-hover`, `--c-on-accent` ở dạng RGB trong `:root`. Tailwind đọc qua `bg-brand`, `text-accent`, `text-onaccent`, `bg-accent/15`..., nên đổi màu không cần build lại.

**Màu chữ trên nền màu nhấn (`--c-on-accent`) tự động:** theme tính tỉ lệ tương phản (WCAG) và chọn trắng hoặc màu chính, bên nào đọc rõ hơn. Nhờ vậy bộ màu nào, kể cả "Tùy chỉnh", nút và icon cũng không bị chữ khó đọc.

**Thêm bộ màu:** thêm mục vào `anp_palettes()` trong `inc/setup.php`.

---

## 6. Dịch vụ (CPT, song ngữ)

Menu **Dịch vụ** trong admin. Mỗi dịch vụ gồm:
- **Tiêu đề** (tiếng Việt) và **Mô tả ngắn / Excerpt** (tiếng Việt).
- **Tên dịch vụ (English)** và **Mô tả ngắn (English)** trong khung "Thông tin dịch vụ (song ngữ)".
- **Icon:** chọn một trong sáu icon có sẵn.
- **Ảnh đại diện (Featured image):** ảnh thật của dịch vụ. Để trống thì dùng ảnh minh họa mặc định theo icon (mục 13).
- **Thứ tự hiển thị:** trường "Thuộc tính trang" (Page Attributes), số nhỏ hơn hiển thị trước.

Bản tiếng Anh để trống thì website hiển thị bản tiếng Việt. Khi kích hoạt theme, 6 dịch vụ mẫu được tạo một lần. Sau đó, xóa hết dịch vụ cũng không tạo lại, để tránh ghi đè dữ liệu bạn đã sửa.

---

### 6.1 Nội dung trang dịch vụ (viết lại, chuẩn SEO/GEO)

Nội dung đầy đủ của 6 trang dịch vụ được viết lại bằng lời riêng, dựa trên cấu trúc các trang mẫu nhưng không sao chép. Nguồn: `inc/services-content.php`.

**Cấu trúc mỗi trang**
- **Đoạn mở đầu trả lời trực tiếp** (excerpt): nêu dịch vụ là gì, làm cho ai, kết quả ra sao. Đây là đoạn AI thường trích dẫn.
- **Các mục H2:** dịch vụ bao gồm gì, quy trình thực hiện (danh sách có thứ tự), vì sao chọn HP Trading - Transport, thông tin cần gửi để nhận báo giá.
- **Hỏi đáp (5 câu mỗi dịch vụ),** viết theo kiểu trả lời trước, hiển thị dạng mở rộng và đưa vào schema FAQPage.
- **Dịch vụ liên quan** và **kêu gọi báo giá** ở cuối trang.

**SEO và GEO trên mỗi trang**
- Thẻ tiêu đề (`meta_title`, dưới 60 ký tự) và mô tả (`meta_desc`, 120 đến 160 ký tự) riêng cho từng dịch vụ, cả hai ngôn ngữ.
- Đường dẫn ngắn có từ khóa: `/dich-vu/khai-bao-hai-quan/`, `/dich-vu/van-chuyen-duong-bien/`, v.v.
- Schema: **Service** (tên, mô tả, nhà cung cấp là HP Trading - Transport), **FAQPage** (5 câu hỏi của trang), **BreadcrumbList** (đường dẫn). Khi có Rank Math, các node này được gộp vào đồ thị của Rank Math.
- Thẻ đường dẫn (breadcrumb) hiển thị trên trang.
- Từ khóa chính lưu trong `_anp_keyword` để tham khảo khi biên tập.

**Cập nhật nội dung**
- Sửa trực tiếp trong admin: ô soạn thảo chính (tiếng Việt), tiêu đề và mô tả ngắn, và khung **SEO và nội dung song ngữ** (tiêu đề SEO, mô tả SEO, FAQ hai ngôn ngữ, nội dung tiếng Anh).
- Muốn đổi toàn bộ nội dung theo file: sửa `inc/services-content.php` rồi tăng `ANP_SERVICE_CONTENT_VERSION` trong cùng file. Lần tải trang tiếp theo, theme ghi lại nội dung vào các bài dịch vụ. **Lưu ý:** việc này ghi đè các trường đã được quản lý trong file, nên chỉ làm khi chấp nhận mất bản đã sửa trong admin.

**Giới hạn cần biết**
- Bản tiếng Anh ngắn hơn bản tiếng Việt (khoảng 270 đến 350 từ so với 500 đến 680 từ). Đây là bản tóm tắt đầy đủ các mục chính. Có thể mở rộng khi cần.
- Các tuyến hàng nêu trong trang đường biển (Mỹ, châu Âu, Nhật Bản, châu Á) và các khẳng định về mạng lưới đại lý, hãng tàu, sức chứa kho, khả năng chuyến bay lấy từ website mẫu và nội dung hiện có. **Cần khách hàng xác nhận** trước khi công bố.
- Không đưa ra cam kết thời gian thông quan, thời gian vận chuyển hay mức bồi thường cụ thể. Các câu trả lời chỉ mô tả quy trình và cách xác định.
- Nội dung pháp lý (thủ tục hải quan, giấy phép lưu hành quá khổ, trách nhiệm bồi thường) cần người có chuyên môn rà soát trước khi công bố.
- Chưa render trang chi tiết dịch vụ trên WordPress thật, nên chưa xem được bố cục và schema thực tế.

### 6.2 Menu thả xuống "Dịch vụ"

- Trên desktop, rê chuột hoặc nhấn Tab vào mục **Dịch vụ** thì hiện danh sách 6 dịch vụ. Trên mobile, danh sách hiện lồng bên dưới.
- Danh sách lấy từ các bài dịch vụ (CPT). Thêm hoặc đổi tên dịch vụ thì menu tự cập nhật, không cần sửa menu.
- Nếu trong **Giao diện > Menu** bạn đã thêm mục con dưới "Dịch vụ", theme giữ nguyên mục con đó và không tự thêm.
- Mã: `inc/nav.php` (lọc mục menu từ menu đã gán), `anp_fallback_menu()` trong `inc/setup.php` (khi chưa gán menu), và CSS trong `assets/css/theme.css` (mục "Menu thả xuống").

## 7. Đa ngôn ngữ

### 7.1 Cách hoạt động
- Ngôn ngữ đang xem được xác định theo thứ tự: tham số `?lang=vi|en` trên URL, cookie `anp_lang`, rồi đến ngôn ngữ mặc định trong Customizer.
- Nút VI/EN trên header thêm tham số `?lang=` và ghi cookie. Thuộc tính `lang` của thẻ `<html>` và `og:locale` (vi_VN / en_US) đổi theo.
- Hàm `anp_opt('anp_ten_truong')` tự chọn đúng bản theo ngôn ngữ. Nếu bản tiếng Anh trống thì dùng bản tiếng Việt.

### 7.2 Nội dung nằm ở đâu
| Loại nội dung | Nơi quản lý |
|---|---|
| Thông tin doanh nghiệp, pháp lý, thuế, liên hệ | Customizer (mục 5) |
| Nội dung trang chủ, quy trình, hỏi đáp, sứ mệnh, tầm nhìn | Customizer (mục 5) |
| Dịch vụ | CPT Dịch vụ (mục 6) |
| Bài tin tức, trang tĩnh | Trình soạn thảo WordPress (xem 7.3) |
| Nhãn giao diện (nút, tiêu đề mục, thông báo, nhãn form) | Từ điển `anp_strings()` trong `inc/i18n.php` |
| Email gửi quản trị | Luôn tiếng Việt, lấy nhãn từ `anp_strings()` |

### 7.3 Giới hạn cần biết
- **Bài viết và trang tĩnh không tự song ngữ.** Mỗi bài là một nội dung duy nhất. Nếu cần bản tiếng Anh cho tin tức, cài **Polylang** hoặc **WPML** và tạo bản dịch từng bài. Theme chưa tích hợp sẵn.
- **Bảng minh họa trên hero** (khi chưa có ảnh) dùng nhãn từ từ điển, là ví dụ trực quan, không phải số liệu thật.
- **Từ khóa schema** (mục `knowsAbout` trong `inc/seo.php`) viết bằng tiếng Anh cố định vì là dữ liệu có cấu trúc cho máy đọc, không hiển thị cho người dùng.

### 7.4 Sửa nhãn giao diện
Mở `inc/i18n.php`, tìm khóa trong `anp_strings()` (ví dụ `get_quote`) và sửa giá trị `vi` hoặc `en`.

---

## 8. SEO, GEO, CEO

### 8.1 SEO
- **Tiêu đề trang:** dùng `title-tag` của WordPress, hoặc tiêu đề do Rank Math quản lý.
- **Meta mô tả, Open Graph:** Rank Math lo khi đang bật. Khi không có Rank Math, theme tự in `description`, `og:title`, `og:description`, `og:image`, `og:locale` theo ngôn ngữ đang xem.
- **Heading:** mỗi trang một `h1`; các mục dùng `h2`, phần con dùng `h3`.
- **Đường dẫn:** `/dich-vu/`, trang tĩnh, neo `#dich-vu`, `#lien-he`.
- **Hiệu năng:** ảnh tin có `loading="lazy"`, ảnh tin có kích thước cố định để tránh dịch bố cục.

### 8.2 Schema (JSON-LD)
- **Organization + ProfessionalService:** tên thương hiệu (`name`), tên pháp lý (`legalName`), mã số thuế (`taxID`), ngày thành lập, điện thoại, email, địa chỉ trụ sở, khu vực phục vụ (Việt Nam), lĩnh vực (`knowsAbout`), mạng xã hội (`sameAs`), logo.
- **FAQPage:** chỉ ở trang chủ, lấy từ mục hỏi đáp trong Customizer.
- **Khi có Rank Math:** theme không in schema riêng, mà thêm hai nút vào đồ thị của Rank Math qua filter `rank_math/json_ld`.
- `taxID` chỉ xuất khi mã số thuế đã được điền.

### 8.3 GEO (công cụ AI)
- **Trả lời trước:** mục hỏi đáp viết câu trả lời trực tiếp, ngắn gọn.
- **`/llms.txt`:** theme tự sinh tệp mô tả doanh nghiệp, mã số thuế (nếu có), dịch vụ, hỏi đáp, trang chính, theo ngôn ngữ đang xem. Kiểm tra bằng cách mở `https://<tên-miền>/llms.txt`.
- **Thực thể nhất quán:** tên, địa chỉ, mã số thuế, năm thành lập lấy từ cùng một nguồn là Customizer.
- **Số liệu:** chỉ đưa ra khi khách hàng xác nhận, vì AI dễ trích dẫn số cũ.

### 8.4 CEO
Yêu cầu ghi "CEO" nhưng không rõ viết tắt. Trong phiên này hiểu là **chuyển đổi và trải nghiệm chuyển khách (Conversion/Engagement Optimization)**: CTA rõ ở đầu trang và cuối mỗi mục, form báo giá ngắn, nút gọi và Zalo nổi bật, nút gọi trên mobile. Nếu CEO có nghĩa khác, cần điều chỉnh.

### 8.5 Cấu hình Rank Math (sau khi cài)
1. Cài và kích hoạt **Rank Math SEO**, chạy Setup Wizard.
2. **Titles & Meta > Trang chủ:** đặt tiêu đề và mô tả (đồng bộ với mục 5.6).
3. **Local SEO:** điền địa chỉ, điện thoại, giờ làm việc, đồng bộ với Customizer.
4. **Sitemap:** bật XML sitemap, gửi tới Google Search Console.
5. **Dịch vụ (anp_service):** bật schema Service nếu muốn.
6. **Rank Math > Status > Test:** kiểm tra schema trang chủ và trang tin.

---

## 9. Dữ liệu cần khách hàng cung cấp và xác nhận

| Mục | Giá trị hiện có | Trạng thái |
|---|---|---|
| Năm thành lập | 2014 (từ website mẫu) | Xác nhận |
| Số quốc gia có đại lý | 20+ | Xác nhận |
| Số đầu kéo | 20+ | Xác nhận |
| Số romooc | 40 | Xác nhận |
| Hotline, email | Từ website mẫu | Xác nhận |
| Địa chỉ trụ sở, văn phòng đại diện | Từ website mẫu (bản tiếng Anh do theme dịch) | Xác nhận, kiểm tra bản dịch |
| **Mã số thuế** | Trống | **Cần điền** |
| **Địa chỉ đăng ký thuế** | Trống | **Cần điền** |
| **Người đại diện pháp luật, chức danh** | Trống | **Cần điền** |
| **Số Giấy chứng nhận ĐKDN, ngày cấp, nơi cấp** | Trống | **Cần điền** |
| Giờ làm việc | Thứ 2 – Thứ 6: 08:00 – 17:30; Thứ 7: 08:00 – 12:00 (do khách hàng cung cấp). Bản tiếng Anh do theme dịch | Đã điền, kiểm tra bản tiếng Anh |
| Tên công ty tiếng Anh | Theme dịch sang tiếng Anh | Xác nhận đúng tên đăng ký quốc tế |
| Logo | Chưa có file | **Cần file PNG/SVG nền trong suốt** |
| Ảnh hero, giới thiệu, quy trình | Đang dùng ảnh minh họa có giấy phép mở (mục 13) | **Thay bằng ảnh thật của HP Trading - Transport** (đội xe, kho, cảng, nhân sự) |
| Ảnh từng dịch vụ | Ảnh minh họa mặc định | Gắn Ảnh đại diện cho từng dịch vụ trong admin |
| Email nhận form | Chưa có | Nên đặt email riêng cho báo giá |
| Nội dung tiếng Anh các mục | Theme dịch, chưa có người bản ngữ rà soát | Nên rà soát trước khi công bố |

Lưu ý: không điền mã số thuế, số ĐKDN hay người đại diện khi chưa có văn bản gốc. Các trường này xuất hiện trên footer và schema, sai sót sẽ được tìm kiếm và AI đọc lại.

---

## 10. Kiểm tra và việc còn lại

### 10.1 Đã kiểm tra
- Cú pháp PHP: toàn bộ file `.php` của theme qua `php -l`, không lỗi (PHP 8.2.12).
- Quét template: không còn chữ tiếng Việt cố định trong nội dung hiển thị, chỉ còn trong chú thích và trong từ điển `inc/i18n.php`.
- **Render thử trang chủ trên trình duyệt** bằng bản dựng PHP giả lập các hàm WordPress (site Local chưa chạy), ở 1440px, 1024px và 375px: ảnh hiển thị đủ, font Lexend và Source Sans 3 tải đúng, thẻ dịch vụ có ảnh, mục quy trình có ảnh nền, footer đúng, không có cuộn ngang trên mobile, bản tiếng Anh (`?lang=en`) hiển thị đúng.
- Lỗi đã phát hiện và sửa qua render thử: menu xuống dòng ở 1024px, nút EN bị cắt, icon dịch vụ bị cắt nửa, footer menu xếp ngang, nút menu mobile bị cắt ở mép phải.

### 10.2 Chưa kiểm tra
- **WordPress thật:** chưa chạy theme trên site Local, nên Customizer, CPT Dịch vụ, dịch vụ mẫu tự tạo, tin tức, trang chi tiết và trang lưu trữ chưa được xem bằng WordPress thật. Bản render thử không có dữ liệu bài viết nên mục Tin tức bị ẩn.
- **Chuyển ngôn ngữ bằng cookie** và `og:locale` chưa thử trên WordPress thật.
- **Form báo giá:** chưa gửi thử, cần kiểm tra SMTP.
- **Rank Math và llms.txt:** chưa cài, chưa kiểm tra schema và tệp llms.txt sau khi lưu permalink.
- **Bản dịch tiếng Anh:** chưa có người bản ngữ rà soát.

### 10.3 Việc tiếp theo đề xuất
1. Kích hoạt theme trên Local, kiểm tra cả hai ngôn ngữ và các breakpoint.
2. Khách hàng điền mục 9, đặc biệt mã số thuế và thông tin ĐKDN.
3. Thêm logo, ảnh hero, ảnh tin mẫu.
4. Cài Rank Math, làm theo mục 8.5. Nếu cần tin tức song ngữ, cài Polylang.
5. Cài SMTP, gửi thử form.
6. Rà soát bản tiếng Anh.

---

## 11. Bảo trì và mở rộng

### 11.1 Font chữ
- **Font duy nhất toàn website:** Be Vietnam Pro (độ đậm 400 đến 800) cho toàn bộ tiêu đề và nội dung. Là sans-serif hình học tối ưu riêng cho tiếng Việt, tải từ Google Fonts.
- **Font dự phòng:** Segoe UI, Roboto, Arial, sans-serif hệ thống.
- **Khai báo đồng bộ ở ba nơi:** `assets/css/theme.css` (`html, body, h1-h6`), `inc/setup.php` (`fontFamily.sans` và `fontFamily.display` của Tailwind, và URL Google Fonts), `header.php` (class `font-sans` trên `<body>`).
- **Ô nhập, nút, vùng văn bản:** `font-family: inherit`.
- **Đổi font:** sửa đồng thời ba nơi. Font mới phải hỗ trợ đủ dấu tiếng Việt.

### 11.2 Sửa nội dung
- **Thông tin, nội dung trang chủ:** Customizer.
- **Dịch vụ:** menu Dịch vụ trong admin.
- **Phần cố định** (thứ tự mục, cấu trúc): `front-page.php`.
- **Nhãn giao diện:** `inc/i18n.php`.

### 11.3 Thêm trang mới
Tạo trang tĩnh, dùng `page.php`. Trang tĩnh không tự song ngữ, xem mục 7.3.

### 11.4 Chuyển Tailwind sang bản build
Khi cần tối ưu tốc độ: cài Tailwind CLI, quét các file `.php` trong theme, xuất `assets/css/tailwind.css`, rồi bỏ script CDN trong `inc/setup.php`. Cấu hình màu giữ nguyên vì dùng biến CSS.

### 11.5 Biến môi trường
Không có. Mọi cấu hình nằm trong database WordPress (theme mods, options, post meta).

---

## 12. Thiết kế giao diện (UI/UX Pro Max)

Cài skill toàn cục bằng `npm install -g uipro-cli`, rồi chạy `uipro init --ai claude` trong thư mục home của người dùng, nên skill nằm ở `~/.claude/skills/ui-ux-pro-max` và dùng được cho mọi dự án. (Công cụ `uipro init` không có cờ `--global`, mặc định cài vào thư mục hiện tại.)

Hệ thống thiết kế do skill sinh ra (lưu tại `design-system/anp-logistics/MASTER.md`) cho truy vấn "logistics freight forwarding customs shipping B2B corporate trustworthy":

| Hạng mục | Khuyến nghị | Áp dụng |
|---|---|---|
| Mẫu trang | Enterprise Gateway | Hero, giải pháp theo dịch vụ, tín hiệu tin cậy nổi bật, liên hệ |
| Phong cách | Trust & Authority | Chỉ số nổi bật, thông tin pháp lý, hỏi đáp, quy trình rõ ràng |
| Màu | Slate `#0F172A`, `#334155`, CTA `#0369A1`, nền `#F8FAFC` | Bộ màu `corporate` (mặc định). Màu nhấn dùng `#0EA5E9` để đọc được cả trên nền tối, `#0369A1` cho chữ trên nền sáng |
| Font | Lexend + Source Sans 3 | Mục 11.1 |
| Tránh | Phong cách vui nhộn, giấu chứng chỉ, gradient tím hồng kiểu AI | Không dùng tím, không dùng emoji làm icon |

Các quy tắc của skill đã áp dụng: header nổi cách mép (`top-4`), có chừa khoảng trống nội dung; icon SVG đồng bộ; con trỏ `pointer` trên thẻ và nút; hover không làm dịch bố cục (ảnh chỉ phóng 1.03 bên trong khung); chuyển động 150 đến 500 ms; tôn trọng `prefers-reduced-motion`; thẻ dịch vụ và nút cao tối thiểu 44px; chữ nội dung tối thiểu 16px; tỉ lệ tương phản chữ đạt 4.5:1 với chữ thường.

---

## 13. Hình ảnh

### 13.0 Logo đối tác (lưu ý pháp lý)
15 logo đối tác (MOL Logistics, APL, COSCO, Maersk Line, Yang Ming, TMC, Desig, DHL, CMA CGM, ANA, Delta, Malaysia Airlines, KMTC, KLM, OOCL) được copy từ mục Đối tác của website mẫu theo yêu cầu. Đây là **logo thương hiệu của bên thứ ba**, không thuộc giấy phép mở. Trước khi công bố, doanh nghiệp cần xác nhận đang hợp tác với từng đối tác và được phép dùng logo của họ. Nếu không, gỡ đối tác khỏi `anp_partners()` và xóa tệp tương ứng trong `assets/partners/`.

### 13.1 Ảnh đang dùng
Ảnh thật, có giấy phép mở, lấy từ Wikimedia Commons bằng công cụ tìm kiếm ảnh trong skill thiết kế. Đây là **ảnh minh họa tạm thời** của các cảnh cùng loại, không phải ảnh của HP Trading - Transport.

| Khóa | Dùng ở đâu | Tác giả | Giấy phép |
|---|---|---|---|
| `hero` | Nền hero (cẩu container, tàu hàng) | Niels Johannes | CC BY-SA 4.0 |
| `port` | Dịch vụ Khai báo hải quan (khu cảng nhìn từ trên cao) | Andrzej Otrębski | CC BY-SA 4.0 |
| `road` | Dịch vụ Vận chuyển nội địa; ảnh nhỏ ở phần giới thiệu | Lokseng01 | CC BY-SA 4.0 |
| `sea` | Dịch vụ Đường biển; ảnh tin tức khi bài chưa có ảnh | Calistemon | CC BY-SA 4.0 |
| `air` | Dịch vụ Đường không | Iswzo | CC BY-SA 4.0 |
| `warehouse` | Dịch vụ Kho bãi; ảnh chính phần giới thiệu | Holland Storage Solutions | CC BY-SA 4.0 |
| `project` | Dịch vụ Hàng dự án | Jean-Pierre Bazard | CC BY 4.0 |
| `night` | Nền mục quy trình | Huhu Uet | CC BY-SA 4.0 |

Liên kết gốc từng ảnh nằm trong `inc/photos.php`. Chân trang tự in dòng ghi công (tác giả, giấy phép, liên kết) để đáp ứng yêu cầu của giấy phép CC BY và CC BY-SA. Giữ nguyên dòng này cho tới khi thay hết ảnh.

### 13.2 Lưu ý về ảnh minh họa
- Một số ảnh có chữ hoặc nhãn hiệu của bên thứ ba thấy được (tên cảng trên cẩu, nhãn container, hãng bay trên máy bay). Chúng chỉ nên dùng trong lúc dựng và duyệt giao diện.
- Ảnh phần quy trình và ảnh hero đã được phủ lớp tối, nhưng vẫn nên thay bằng ảnh thật của HP Trading - Transport trước khi công bố.
- Ghi chú pháp lý: giấy phép CC BY-SA yêu cầu ghi công và chia sẻ tương tự cho bản chỉnh sửa của chính ảnh đó, không bắt buộc cả website mở mã nguồn.

### 13.3 Thay bằng ảnh thật của HP Trading - Transport
1. **Hero, giới thiệu, quy trình:** Giao diện > Tùy chỉnh > HP Trading - Transport Theme Options > Trang chủ, tải ảnh vào ba ô ảnh. Nên dùng ảnh ngang, rộng tối thiểu 1600px cho hero, 1200px cho các ảnh còn lại.
2. **Từng dịch vụ:** vào menu Dịch vụ, mở một dịch vụ, đặt **Ảnh đại diện**. Ảnh này thay ảnh mặc định ngay.
3. **Tin tức:** đặt Ảnh đại diện cho bài viết. Bài chưa có ảnh dùng ảnh `sea`.
4. Khi đã thay hết, xóa dòng ghi công ở `footer.php` hoặc để trống `anp_photos()` trong `inc/photos.php` cho những ảnh không còn dùng.

### 13.4 Hiệu năng ảnh
- Mỗi ảnh có `srcset` (500px và 960px; hero thêm 1280px), có `width` và `height` để tránh dịch bố cục.
- Hero tải ngay (`fetchpriority="high"`), các ảnh còn lại tải khi cuộn tới (`loading="lazy"`).
- Tổng dung lượng thư mục `assets/img` khoảng 1.9 MB cho cả bộ.
- Ảnh hero có 1280px rộng, đủ cho màn hình 1440px ở độ phân giải thường. Màn hình Retina nên thay bằng ảnh gốc của HP Trading - Transport, rộng từ 2400px.

---

## 14. Giả định kỹ thuật

- Website mẫu anplogistics.com đang chạy **Joomla** (template `ja_social`), không phải WordPress. Theme này dựng lại trên WordPress theo yêu cầu.
- Không sao chép mã nguồn, hình ảnh hay hiệu ứng của website mẫu. Nội dung tiếng Việt được viết lại, bản tiếng Anh do theme dịch và cần rà soát.
- Icon là SVG tự vẽ theo nét đơn, không dùng logo bên thứ ba.
- Font và thư viện tải từ CDN công khai, không đóng gói trong theme.
- Dữ liệu dịch vụ mẫu và các mục nội dung có trong theme chỉ là điểm bắt đầu. Khách hàng cần kiểm tra và thay thế trước khi công bố.
- Ảnh trong theme là ảnh minh họa có giấy phép mở, không phải ảnh của doanh nghiệp. Xem mục 13.
