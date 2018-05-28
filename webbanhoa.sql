-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2018 lúc 04:34 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webbanhoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `permission`) VALUES
(1, 'Nguyễn Xuân Truyền', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(16, 'Đai Nơ Xooo', 'dinousaur', 'e10adc3949ba59abbe56e057f20f883e', 0),
(20, 'Chu Xuân Rơi', 'chuxuanroi', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `parent_id`, `sort`) VALUES
(5, 'Chủ đề hoa', 0, 4),
(15, 'Hoa sinh nhật', 5, 2),
(16, 'Hoa mừng tốt nghiệp', 5, 3),
(20, 'Hoa tình yêu', 5, 1),
(22, 'Quà tặng kèm', 0, 3),
(23, 'Giỏ hoa tươi', 0, 2),
(24, 'Hoa tặng mẹ', 5, 5),
(25, 'Hoa chia buồn', 5, 6),
(26, 'Hoa ngày tết', 5, 4),
(27, 'Cây may mắn', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `id` int(10) NOT NULL,
  `name` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`id`, `name`, `img`) VALUES
(1, 'Đỏ - Hồng', 'do-hong.jpg'),
(2, 'Trắng', 'trang.jpg'),
(3, 'Vàng - Cam', 'vang-cam.jpg'),
(4, 'Xanh ', 'xanh.jpg'),
(5, 'Tím', 'tim.jpg'),
(6, 'Phối màu', 'dasac.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `content` longtext COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `describe` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `footer`
--

INSERT INTO `footer` (`id`, `title`, `address`, `phone`, `describe`) VALUES
(3, 'SHOP HOA HÀ NỘI', 'Số 9 Đường 6 Phường 69 Quận Hai Bà Trưng Hà Nội ', '0963 098 534', 'Chưa có mô tả nào'),
(5, 'SHOP HOA HUẾ', 'Số 1 Đường 10 Phường 100 Thành phố Huế', '0963 098 534', 'Ahihi'),
(6, 'SHOP HOA HÀ NỘI', 'Số 6 Đường 9 Phường 69 Quận Hai Bà Trưng Hà Nội', '0963 098 534', 'Giao hàng miễn phí, tận nơi, nhanh chóng trong địa bàn nội thành. \r\nPhí giao hàng 15.000đ đ đối với các đơn bàn ngoại thành'),
(7, 'SHOP HOA TPHCM', 'Số 1 Đường 2 Phường 3 Quận 4 TP HCM', '0963 098 534', 'Giao hàng miễn phí, tận nơi, nhanh chóng trong địa bàn nội thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `amount` decimal(15,0) NOT NULL,
  `status` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Kiểm tra đơn hàng đã gửi cho khách hàng chưa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `transaction_id`, `product_id`, `quantity`, `amount`, `status`) VALUES
(11, 17, 38, 1, '1200000', '0'),
(12, 18, 53, 3, '1500000', '0'),
(13, 18, 39, 2, '800000', '0'),
(14, 19, 32, 10, '1500000', '0'),
(15, 20, 38, 2, '2400000', '0'),
(16, 21, 26, 1, '420000', '0'),
(17, 22, 37, 1, '1000000', '0'),
(18, 23, 60, 2, '6400000', '0'),
(19, 23, 59, 1, '480000', '0'),
(20, 24, 41, 1, '250000', '0'),
(21, 25, 40, 1, '700000', '0'),
(22, 26, 54, 1, '750000', '0'),
(23, 27, 57, 1, '400000', '0'),
(24, 28, 56, 1, '600000', '0'),
(25, 29, 48, 1, '600000', '0'),
(26, 30, 47, 1, '50000', '0'),
(27, 31, 57, 1, '400000', '0'),
(28, 32, 58, 1, '350000', '0'),
(29, 33, 48, 1, '600000', '0'),
(30, 34, 38, 1, '1200000', '0'),
(31, 35, 48, 1, '600000', '0'),
(32, 36, 40, 1, '700000', '0'),
(33, 37, 57, 1, '400000', '0'),
(34, 38, 48, 1, '600000', '0'),
(35, 39, 55, 1, '1000000', '0'),
(36, 40, 57, 1, '400000', '0'),
(37, 41, 58, 1, '350000', '0'),
(38, 42, 52, 1, '300000', '0'),
(39, 43, 43, 1, '50000', '0'),
(40, 44, 47, 1, '50000', '0'),
(41, 45, 32, 1, '150000', '0'),
(42, 46, 26, 1, '420000', '0'),
(43, 47, 27, 1, '299000', '0'),
(44, 48, 56, 1, '600000', '0'),
(45, 49, 26, 1, '420000', '0'),
(46, 50, 60, 1, '3200000', '0'),
(47, 51, 24, 11111, '4433289000', '0'),
(48, 40, 49, 5, '3000000', '0'),
(49, 40, 41, 1, '250000', '0'),
(50, 41, 52, 1, '300000', '0'),
(51, 42, 59, 5000, '2400000000', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission`
--

CREATE TABLE `permission` (
  `id` int(4) NOT NULL,
  `name` varchar(20) COLLATE utf8_vietnamese_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `permission`
--

INSERT INTO `permission` (`id`, `name`, `description`) VALUES
(1, 'Thấp', 'Chỉ được quyền xem'),
(2, 'Trung bình', 'Được quyền thêm sửa xóa sản phẩm'),
(3, 'Cao', 'Nắm quyền toàn bộ trang quản trị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Tên sản phẩm',
  `keyword` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL COMMENT 'Từ khóa tìm sản phẩm',
  `catalog_id` int(11) NOT NULL COMMENT 'Mã thể loại',
  `color_id` int(10) DEFAULT NULL COMMENT 'Màu sắc chủ đạo của sản phẩm',
  `image_id` varchar(40) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Mã ảnh sản phẩm',
  `price` float(10,0) NOT NULL COMMENT 'Giá ',
  `discount` float(10,0) NOT NULL COMMENT 'Giá mới',
  `describe` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Giới thiệu',
  `buy_counter` int(11) NOT NULL COMMENT 'Số lượt mua',
  `view` int(11) NOT NULL COMMENT 'Số lượt xem',
  `status` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL COMMENT 'Trạng thái ',
  `created_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE CURRENT_TIMESTAMP(6) COMMENT 'Ngày tạo',
  `updated_at` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE CURRENT_TIMESTAMP(6) COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `keyword`, `catalog_id`, `color_id`, `image_id`, `price`, `discount`, `describe`, `buy_counter`, `view`, `status`, `created_at`, `updated_at`) VALUES
(24, 'Real Love', 'real love', 20, 1, 'real-love.jpg', 399000, 0, 'Bó hoa được thiết kế với tông màu đỏ nóng bỏng là biểu tượng cho một tình yêu mãnh liệt, tình cảm chân thành, lãng mạn, sẵn sàng bùng cháy và mang thông thông điệp: “I love you” . Hãy tạo bất ngờ cho người bạn yêu thương trong những dịp kỷ niệm nhé, chắn ', 0, 3, '', '2018-05-27 15:33:31.281847', '2018-05-27 15:33:31.281847'),
(26, 'Ngày Vàng Tươi', 'ngay vang tuoi', 20, 3, 'ngay-vang-tuoi.jpg', 450000, 30000, 'Tone màu vàng rực rỡ như tia nắng ấm áp giúp sưởi ấm thêm tình cảm giữa những người yêu thương nhau. Tia nắng xua đi sự lạnh giá làm con tim thêm nồng ấm trong cuộc sống hiện đại ngày nay', 0, 8, '', '2018-05-27 15:41:46.826550', '2018-05-27 15:41:46.826550'),
(27, 'Ngày Nắng Lên', 'ngay ', 20, 3, 'ngay-nang-len.jpg', 299000, 0, 'Sau cơn mưa, những tia nắng ấm áp chiếu rọi lên mọi vật, sưởi ấm tình cảm giữa những con người. Những tháng năm ngày nào ta có nhau, nồng nàn lời nói trao nhau, dịu dàng bàn tay nắm bàn tay, khẽ đến bên bên nhau cùng nhau đắm mình trong những tia nắng ấm ', 0, 9, '', '2018-05-27 15:35:32.461113', '2018-05-27 15:35:32.461113'),
(30, 'Until You', 'until you', 20, 6, 'until-you.jpg', 200000, 0, 'Khi bạn có lòng thương nhớ với một ai đó sẽ luôn là những cảm xúc khó tả xen lẫn hồi hộp khi được đi bên cạnh người đó. Luôn là nỗi mong nhớ, mong được bên nhau mỗi ngày. Với tone màu tím hộp hoa sẽ thay bạn bày tỏ lòng nhung nhớ gửi đến người thương. Thí', 0, 3, '', '2018-05-27 15:35:35.864856', '2018-05-27 15:35:35.864856'),
(32, 'Only You', 'only-you', 20, 5, 'only-you.jpg', 200000, 50000, 'Một bó hoa đơn giản phù hợp tặng sinh nhật đồng nghiệp, bạn bè trong lớp và người yêu. Bó hoa được thiết kế nhẹ nhàng, kết hợp giữa màu tím của Calimero và hồng dâu đem lại cảm giác chân thành và quý trọng.', 0, 2, '', '2018-05-27 15:35:38.382141', '2018-05-27 15:35:38.382141'),
(33, 'Yêu thương nồng cháy ', 'yeu thuong nong chay', 20, 1, 'yeu-thuong-nong-chay.jpg', 650000, 170000, 'Hoa hồng đỏ thể hiện ý nghĩa tình yêu chân thành, mãnh liệt bất chấp mọi chông gai. Đối với những mối quan hệ mới vừa bắt đầu hoặc là gắn bó dài lâu thì một bó hoa hồng đỏ như cách khẳng định tình cảm chân thành, đồng thời là lời hứa cho sự phát triển lâu', 0, 4, '', '2018-05-28 01:32:08.087114', '2018-05-28 01:32:08.087114'),
(34, 'Purple Love', 'purple love', 20, 1, 'purple-love.jpg', 2000000, 200000, 'Hoa hồng tím là một trong loài hoa khá đặc biệt và hiếm thấy do đó ý nghĩa của nó cũng rất đặc biệt. Là bó hoa tình yêu tuyệt vời để bạn thể hiện tình cảm của mình trong những dịp đặc biệt, sẽ là món quà độc đáo và sang trọng trong tình yêu khi bạn muốn t', 0, 1, '', '2018-05-27 15:33:49.723630', '2018-05-27 15:33:49.723630'),
(35, 'Tình yêu mãi xanh', 'tinh yeu mai xanh', 20, 4, 'tinh-yeu-mai-xanh.jpg', 1200000, 200000, 'Hộp hoa là sự kết hợp chủ đạo hoa hồng trắng và cẩm chướng xanh cùng tông màu trắng xanh nhẹ tôn lên nét đẹp trong tình yêu,đẹp mà thanh thoát, dịu mát mà lại ngọt lịm. Màu xanh của hy vọng của tình yêu mãi mãi xanh tươi như hộp hoa này', 0, 3, '', '2018-05-27 15:34:07.560353', '2018-05-27 15:34:07.560353'),
(36, 'Dịu dàng', 'diu dang', 20, 6, 'diu-dang.jpg', 600000, 0, 'Với tone màu hồng pastel nhẹ nhàng và tràn đầy nữ tính như sự dịu dàng, đằm thắm của những cô thiếu nữ xinh xắn tuổi trăng tròn. Hoa hồng da kết hợp cùng cát tường hồng và baby trắng chắc chắn sẽ là điều bất ngờ và sang trọng dành tặng cho những cô gái đá', 0, 2, '', '2018-05-27 15:33:57.575685', '2018-05-27 15:33:57.575685'),
(37, 'Beside You', 'beside you', 20, 1, 'beside-you.jpg', 1000000, 0, 'Anh đã luôn mơ những giấc mơ thật đẹp, những giấc mơ trong đó có em…Em đến bên anh thật nồng nàn, say đắm như sự sắp đặt của số phận. Trong mơ, anh là người hạnh phúc, và anh cứ muốn kéo dài giấc mơ hạnh phúc ấy, kéo dài mãi mãi tựa như những bông hồng mô', 0, 3, '', '2018-05-27 15:34:02.355627', '2018-05-27 15:34:02.355627'),
(38, 'Only One', 'only one', 20, 2, 'only-one.jpg', 1250000, 50000, 'Tình yêu là chuyện của hai người, thật hạnh phúc biết bao khi cảm nhận được trọn vẹn tình cảm từ đối phương trao cho mình. “Only one” là bó hoa đặc biệt, được thiết kế dành tặng riêng cho một và chỉ một người thương duy nhất, thể hiện tình cảm thủy chung ', 0, 3, '', '2018-05-27 15:34:12.431587', '2018-05-27 15:34:12.431587'),
(39, 'Nhớ một người', 'nho mot nguoi', 20, 1, 'nho-mot-nguoi.jpg', 600000, 200000, 'Với tone màu tim phối hợp cùng hoa hồng da tạo nên vẻ cuốn hút của những cô gái xinh đẹp làm say đắm bao chàng trai. Bó hoa chắc chắn sẽ là món quà tuyệt vời để tặng cho cô gái mà bạn theo đuổi. Màu tím mộng mơ thật đẹp và quyến rũ.', 0, 6, '', '2018-05-27 15:34:13.717529', '2018-05-27 15:34:13.717529'),
(40, 'Khoe sắc thắm', 'khoe sac tham', 15, 6, 'khoe-sac-tham.jpg', 700000, 0, 'Tôi nhớ một ngày xa xôi chớm thu. Em đến thăm tôi một chiều khi nắng tàn. Cỏ hoa dường như khoe sắc thắm. Nghiêng nghiêng đón gót người đi. Yêu đương dâng sóng tình mến. Tôi nhớ một chiều đơn côi chớm thu em đến. Với sự kết hợp nhiều loại hoa cùng với ton', 0, 33, '', '2018-05-27 15:35:43.034076', '2018-05-27 15:35:43.034076'),
(41, 'Teddy cá tính', 'teddy', 22, 0, 'teddy-catinh.jpg', 250000, 0, 'Đông về lạnh hơn, có môt bé ôm để ôm thì còn gì bằng. Để khách hàng có sự trải nghiệm đó, Gấu Bông Teddy Lông Vàng là một món quà cực kỳ ý nghĩa và phù hợp ban bè dành tặng cho nhau hoặc người yêu trong dịp lễ đặc biệt.', 0, 2, '', '2018-05-28 01:25:39.294191', '2018-05-28 01:25:39.294191'),
(42, 'Gấu tốt nghiệp', 'gau tot nghiep', 22, 0, 'gau-tot-nghiep.jpg', 300000, 250000, 'Chú gấu lông xù xinh xắn, đáng yêu với chiếc mũ tốt nghiệp chắc chắn sẽ là món quà đầy ý nghĩa dành tặng cho người bạn của mình trong ngày tốt nghiệp thật trang trọng và hạnh phúc. Hãy dành tặng chú gấu này cho bạn của mình bạn nhé', 0, 2, '', '2018-05-27 15:34:42.030863', '2018-05-27 15:34:42.030863'),
(43, 'Nụ cười của em', 'nu cuoi cua em', 23, 2, 'nu-cuoi-cua-em.jpg', 400000, 350000, '“Thanh thuần và dịu ngọt, nụ cười của em luôn làm trái tim tôi loạn nhịp.” Người ta vẫn thường nói: tặng hoa cho người yêu thì phải tặng hoa hồng đỏ, vì nó mang ý niệm về một tình yêu nóng bỏng mãnh liệt. Nhưng tôi lại thích tặng em hoa hồng trắng, vì nó ', 0, 6, '', '2018-05-27 15:35:48.064968', '2018-05-27 15:35:48.064968'),
(44, 'Vươn lên', 'vuon len', 23, 6, 'vuon-len.jpg', 550000, 500000, 'Ai cũng có ước mơ và hoài bão trong cuộc đời. Họ làm việc hăng say cùng với quyết tâm mạnh mẽ như những hoa cúc ping pong vươn lên đầy sức sống được phối hợp cùng hoa hồng cam lửa thật mãnh liệt và mạnh mẽ như lời chúc góp thêm động lực để tiếp tục tiến b', 0, 12, '', '2018-05-27 15:35:45.193968', '2018-05-27 15:35:45.193968'),
(45, 'Lucky Star', 'lucky star', 22, 0, 'lucky-star.jpg', 600000, 550000, 'Với ngôi sao đủ sắc màu như những ngôi sao may mắn luôn che chở và chúc phúc cho những con người thân yêu của bạn luôn được sức khỏe và may mắn, luôn gặp được thuận lợi trong công việc và tình cảm. Bánh kem Givral là một thương hiệu bánh danh tiếng của Sà', 0, 2, '', '2018-05-27 15:42:26.739339', '2018-05-27 15:42:26.739339'),
(46, 'Tomorrow', 'tomorrow', 22, 0, 'tomorrow.jpg', 750000, 0, 'Với lớp kem socola đen và lớp socola trắng mịn như 2 nửa thời gian. Dù hiện tại bạn có làm gì thì vẫn có một thứ gọi ngày mai luôn chờ đón. Tặng ai đó bánh kem này như cầu chúc cho ngày mai luôn may mắn và tươi vui. Bánh kem Givral là một thương hiệu bánh', 0, 1, '', '2018-05-27 15:34:28.142468', '2018-05-27 15:34:28.142468'),
(47, 'BLACK FOREST 2', 'black forest 2', 22, 0, 'black-forest.jpg', 350000, 300000, 'Black Forest : Hộp 6 viên chocolate tươi được chế tác theo hình dạng khác nhau.Mỗi viên cũng ẩn chứa một dòng hương vị riêng biệt như: hương rượu (Nhân Whisky, Cognac, Remy ...),hương các hạt ngũ cốc (nhân hạt gạo,dẻ,hạnh nhân...), hương trái cây..', 0, 3, '', '2018-05-27 15:34:37.991503', '2018-05-27 15:34:37.991503'),
(48, 'Rose Cake', 'rose cake', 22, 0, 'rose-cake.jpg', 600000, 0, 'Hoa socola được làm từ những đôi tay điêu luyện, trẻ trung nổi bật tựa như những bông hồng đang khoe sắc thật tinh khôi, tinh khiết. Bánh kem Givral là một thương hiệu bánh danh tiếng của Sài Gòn với bề dày lịch sử hơn 60 năm. Mẫu bánh có thể được sử dụng', 0, 3, '', '2018-05-27 15:34:35.648522', '2018-05-27 15:34:35.648522'),
(49, 'Kính trọng 2', 'kinh trong 2', 26, 1, 'kinh-trong-2.jpg', 700000, 100000, 'Những đóa sen tươi thắm đang đua nhau khoe sắc màu cao quý và sang trọng kính tặng ông bà, cha mẹ, thầy cô, những người lớn tuổi,... để thể hiện lòng hiếu thảo, sự biết ơn vô bờ bến của con cháu, của học trò và kính chúc ông bà, cha mẹ, thầy cô sức khỏe t', 0, 4, '', '2018-05-28 01:25:14.763103', '2018-05-28 01:25:14.763103'),
(50, 'Calimero 2', 'calimero 2', 26, 6, 'calimero2.jpg', 350000, 100000, 'Calimero là một giống cúc đặc biệt được trồng duy nhất tại Việt Nam, ý nghĩa đem đến những niềm vui mới trong cuộc sống. Hoa thích hợp tặng cho bạn bè, đồng nghiệp, hoặc anh chị em trong gia đình.', 0, 8, '', '2018-05-27 15:35:51.114379', '2018-05-27 15:35:51.114379'),
(51, 'Teddy dịu dàng', 'teddy diu dang', 22, 0, 'teddy-diudang.jpg', 300000, 50000, 'Gấu Teddy Dịu Dàng với thân hình nhỏ nhắn, đáng yêu và dặc biệt với bộ lông trắng tinh diện thêm áo hồng xinh xắn. Mẫu gấu rất thích hợp làm quà tăng cho các cô gái yêu thích sự dịu dàng. Chúng tôi hiểu rằng gấu để ôm, thiết kế tông nhẹ nhàng - thích hợp ', 0, 4, '', '2018-05-27 15:34:39.152525', '2018-05-27 15:34:39.152525'),
(52, 'Vạn Sự Như Ý', 'van su nhu y', 27, 0, 'van-su-nhu-y.jpg', 350000, 50000, 'Lan hồ điệp vàng sang trọng được trồng trong chậu sứ cao cấp và được trang trí thật đẹp đẽ chắc chắn sẽ là món quà đặc biệt để trao tặng cho nhau vào những dịp đặc biệt như mừng khai trương, chúc sức khỏe... cùng với lời chúc mọi thứ đều sẽ được như ý mìn', 0, 1, '', '2018-05-28 01:29:12.661602', '2018-05-28 01:29:12.661602'),
(53, 'Tài Lộc', 'tai loc', 27, 0, 'tai_loc.jpg', 550000, 50000, 'Chậu lan \"Tài-Lộc\" 2 cành tượng trưng cho sự phát tài, phát lộc trong cuộc sống. Không chỉ là lời chúc mừng dành tặng người thân yêu mà còn là món quà tuyệt vời dành tặng đối tác vào những dịp quan trọng.', 0, 1, '', '2018-05-27 15:32:07.494781', '2018-05-27 15:32:07.494781'),
(54, 'TAM PHÚ QUÝ', 'tam phu quy', 27, 0, 'tam_phu_quy.jpg', 800000, 50000, 'Chậu lan 3 cành được trang trí bắt mắt và sang trọng. Đây sẽ là lời chúc đầy ý nghĩa cho sự sung túc, phú quý giàu sang cũng như thành công trong công việc. Là món quà tặng tuyệt vời dành tặng cho đối tác doanh nghiệp.', 0, 0, '', '2018-05-25 06:05:33.172699', '2018-05-25 06:05:33.172699'),
(55, 'Đoàn viên', 'doan vien', 27, 0, 'doan_vien.jpg', 1000000, 0, 'Chậu lan \"Đoàn Viên\" được thiết kế từ 4 cành hồ điệp tím. Hệt như khát vọng được đoàn tụ sum vầy bên gia đình, người thân dù có đi xa tận bốn phương trời. Không chỉ là lời chúc mừng sum họp, \"Đoàn Viên\" còn thích hợp để dành tặng đối tác, bạn bè trong nhữ', 0, 0, '', '2018-05-25 06:05:25.417768', '2018-05-25 06:05:25.417768'),
(56, 'Sunny Day', 'sunny day', 23, 3, 'sunny_day.jpg', 650000, 50000, 'Cuộc sống luôn có những thăng trầm, khó khăn, có đôi lúc bạn sẽ cảm thấy vô cùng mệt mỏi, đôi lúc bạn sẽ mất niềm tin, mất đi sự mạnh mẽ vốn có của mình... Hãy tưởng tượng đến những tia nắng, nhìn vạn vật sinh sôi, chuyển đổi và tìm cho mình nguồn sức mạn', 0, 0, '', '2018-05-25 06:04:31.287240', '2018-05-25 06:04:31.287240'),
(57, 'Yêu Thương Đong Đầy', 'yeu thuong dong day', 23, 6, 'yeu_thuong_dong_day.jpg', 450000, 50000, 'Cũng vẫn là những cành hồng ngọt ngào cũng ly hồng vương vấn. Nhưng sự kết hợp độc đáo như những con đường cùng nhau chung bước và những yêu thương vươn mầm, khiến cho ai đó có thêm niềm tin yêu vào chuyện tình đôi lứa. Chỉ mong tay nắm chặt tay cùng nhau', 0, 0, '', '2018-05-25 06:05:12.188559', '2018-05-25 06:05:12.188559'),
(58, 'Mama Love', 'mama love', 23, 1, 'mama_love.jpg', 400000, 50000, 'Mother\'s Day đây là dịp để con cái tỏ lòng biết ơn công sinh thành, nuôi dưỡng của mẹ. Sản phẩm giỏ hoa này được thiết kế cho dịp đặc biệt này dùng để dành tặng cho những người mẹ đáng kính của bạn. Hãy bày tỏ lòng yêu thương và kính yêu đến người mẹ của ', 0, 0, '', '2018-05-25 06:05:03.054962', '2018-05-25 06:05:03.054962'),
(59, 'An Yên', 'an yen', 24, 4, 'an_yen.jpg', 500000, 20000, 'Sắc trắng kết hợp cùng màu xanh mát rượi luôn mang lại một cảm giác bình yên, trong trẻo đến lạ. Phá cách cùng lavender khô, \"An yên\" sẽ mang đến cho người nhận lời chúc an lành, bình yên trong tâm hồn và nhiều niềm vui trong cuộc sống.', 0, 1, '', '2018-05-28 02:28:56.075990', '2018-05-28 02:28:56.075990'),
(60, 'Dòng Thời Gian', 'hoa chia buon', 25, 0, 'hoa_chia_buon.jpg', 3200000, 0, 'Thời gian trôi qua. Ai rồi cũng phải rời xa cuộc đời này dù muốn hay không. Dòng thời gian cuốn trôi mọi thứ vì thế hãy đừng quá đau buồn khi người thân ra đi. Kệ hoa tone trắng sẽ là lời chia buồn sâu sắc gửi đến gia chủ. Mọi thứ rồi sẽ qua xin hãy vượt ', 0, 15, '', '2018-05-28 01:29:04.026135', '2018-05-28 01:29:04.026135'),
(61, 'Thiên Đàng', 'thien dang', 25, 0, 'thien_dang2.jpg', 1200000, 50000, '\"Đâu ai đang yên trông mong xa nhân gian nay mai. Nhưng khi đã qua hết những ngày để sống. Tiếc nuối cũng thế gửi người về với đất, Thôi xin cúi đầu tạm biệt người vừa đi\" lời bài hát cũng chính là cảm hứng cho các florist tạo ra kệ hoa chia buồn này. Với', 0, 1, '', '2018-05-27 15:42:42.720381', '2018-05-27 15:42:42.720381');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `link_to` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `sort` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`, `title`, `link_to`, `sort`) VALUES
(20, 'slide1.jpg', 'slide1', NULL, 2),
(21, 'slide2.jpg', 'slide2', NULL, 1),
(22, 'slide3.jpg', 'slide3', NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(4) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `user_phone` int(12) DEFAULT NULL,
  `user_timerec` datetime(6) DEFAULT NULL,
  `amount` decimal(15,0) DEFAULT NULL,
  `payment` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `payment_info` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `security` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `user_name`, `user_email`, `user_address`, `user_phone`, `user_timerec`, `amount`, `payment`, `payment_info`, `security`, `status`, `created_at`) VALUES
(19, 6, 'Chu Xuân  Rơi', 'chuxuanroi@gmail.com', 'TP HCM', 963098534, '2018-05-10 00:00:00.000000', '1425000', 'nganluong', '', '', '0', '2018-05-26 14:26:34.000000'),
(20, 6, 'Chu Xuân  Rơi', 'chuxuanroi@gmail.com', 'TP HCM', 963098534, '2018-05-11 00:00:00.000000', '2280000', 'nganluong', NULL, NULL, '0', '2018-05-26 14:26:27.000000'),
(21, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-10 00:00:00.000000', '420000', 'nganluong', NULL, NULL, '0', '2018-05-26 14:26:31.000000'),
(22, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-04 00:00:00.000000', '1000000', 'tructiep', NULL, NULL, '0', '2018-05-26 14:26:36.000000'),
(23, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-18 00:00:00.000000', '6536000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(24, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-17 00:00:00.000000', '250000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(25, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-11 00:00:00.000000', '700000', 'tructiep', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(26, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-25 00:00:00.000000', '750000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(27, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-30 00:00:00.000000', '400000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(28, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-09 00:00:00.000000', '600000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(29, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-10 00:00:00.000000', '600000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(30, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-15 00:00:00.000000', '50000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(31, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-12 00:00:00.000000', '400000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(32, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-17 00:00:00.000000', '350000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(33, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-10 00:00:00.000000', '600000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(34, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-11 00:00:00.000000', '1140000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(35, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-10 00:00:00.000000', '600000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(36, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-09 00:00:00.000000', '700000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(37, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-11 00:00:00.000000', '400000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(38, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-10 00:00:00.000000', '600000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(39, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-19 00:00:00.000000', '1000000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(40, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-26 00:00:00.000000', '3087500', 'tructiep', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(41, 5, 'Từ Vĩnh  Nguyên', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-06-30 00:00:00.000000', '300000', 'tructiep', NULL, NULL, '0', '0000-00-00 00:00:00.000000'),
(42, 5, 'Nguyễn Xuân Truyền', 'mrtruyenvn@gmail.com', 'TP HCM', 963098534, '2018-05-18 00:00:00.000000', '2280000000', 'nganluong', NULL, NULL, '0', '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

CREATE TABLE `type_product` (
  `id` int(4) NOT NULL COMMENT 'Mã sản phẩm',
  `name` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL COMMENT 'Tên sản phẩm',
  `image_id` int(4) DEFAULT NULL COMMENT 'Mã ảnh sản phẩm',
  `price` float(8,0) DEFAULT NULL COMMENT 'Giá ',
  `new_price` float(8,0) DEFAULT NULL COMMENT 'Giá mới',
  `status` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL COMMENT 'Trạng thái ',
  `created_at` timestamp NULL DEFAULT NULL COMMENT 'Ngày tạo',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'Ngày cập nhật'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(12) COLLATE utf8_vietnamese_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `created_at` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `birthday`, `phone`, `address`, `created_at`) VALUES
(5, 'Nguyễn Xuân', 'Truyền', 'mrtruyenvn@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1996-10-01', '0963098534', 'TP HCM', '0000-00-00 00:00:00.000000'),
(6, 'Chu Xuân ', 'Rơi', 'chuxuanroi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2000-02-07', '0963098534', 'TP HCM', '0000-00-00 00:00:00.000000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catalog_id` (`catalog_id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `type_product`
--
ALTER TABLE `type_product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm';

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
