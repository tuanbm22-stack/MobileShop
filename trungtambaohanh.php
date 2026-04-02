<?php
require 'connect.php';

$stmt = $pdo->query("
    SELECT p.id, p.name, p.created_at, p.updated_at, p.img, p.price, b.name AS brand_name, p.star, p.rateCount
    FROM products p
    JOIN brands b ON p.company_id = b.id
    ORDER BY p.star DESC 
    LIMIT 5
");

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $pdo->query("
    SELECT p.id, p.name, p.created_at, p.updated_at, p.img, p.price, b.name AS brand_name, p.star, p.rateCount
    FROM products p
    JOIN brands b ON p.company_id = b.id
    ORDER BY p.created_at DESC 
    LIMIT 5
");

$newestProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Thanh Ngân Store</title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous">

    <!-- owl carousel libraries -->
    <link rel="stylesheet" href="js/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="js/owlcarousel/owl.theme.default.min.css">
    <script src="js/Jquery/Jquery.min.js"></script>
    <script src="js/owlcarousel/owl.carousel.min.js"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/trangchu.css">
    <link rel="stylesheet" href="css/home_products.css">
    <link rel="stylesheet" href="css/pagination_phantrang.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/baohanh.css">
    <script src="data/products.js"></script>
    <script src="js/classes.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/trangchu.js"></script>

    <style>
        #goto-top-page {
            position: fixed;
            bottom: 15px;
            left: 15px;
            z-index: 100;
            background: rgba(0, 0, 0, .2);
            color: #fff;
            font-size: 18px;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            cursor: pointer;
            transition-duration: .2s;
        }

        #goto-top-page:hover {
            background: rgba(0, 0, 0, .7);
            width: 50px;
            height: 50px;
            line-height: 50px;
        }
    </style>

</head>

<body>
    <?php include 'nav.php'; ?>


    <section>
        <?php include 'header.php'; ?>

        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <td colspan="4" class="header-table">
                    <marquee behavior="scroll" direction="left">Các trung tâm bảo hành của Smartphone Store</marquee>
                </td>
            </tr>
            <tr>
                <th class="col1">STT</th>
                <th class="col2">Địa chỉ</th>
                <th class="col3">Điện thoại</th>
                <th class="col4">Thời gian làm việc</th>
            </tr>
            <!-- 7 địa chỉ trước -->
            <tr>
                <td class="col1">1</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=114 Tô Hiệu, Quận Lê Chân, Tp. Hải Phòng" target="_blank" title="Xem bản đồ">
                        114 Tô Hiệu, Quận Lê Chân, Tp. Hải Phòng
                    </a>
                </td>
                <td class="col3">(031)-384 7689</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">2</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=12 Lê Lợi, Quận Hoàn Kiếm, Hà Nội" target="_blank" title="Xem bản đồ">
                        12 Lê Lợi, Quận Hoàn Kiếm, Hà Nội
                    </a>
                </td>
                <td class="col3">(024)-3821 3345</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">3</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=85 Nguyễn Văn Linh, TP. Nam Định" target="_blank" title="Xem bản đồ">
                        85 Nguyễn Văn Linh, TP. Nam Định
                    </a>
                </td>
                <td class="col3">0228-382 1122</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">4</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=33 Hai Bà Trưng, TP. Bắc Ninh" target="_blank" title="Xem bản đồ">
                        33 Hai Bà Trưng, TP. Bắc Ninh
                    </a>
                </td>
                <td class="col3">0222-367 4455</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">5</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=56 Hàng Bài, Quận Hoàn Kiếm, Hà Nội" target="_blank" title="Xem bản đồ">
                        56 Hàng Bài, Quận Hoàn Kiếm, Hà Nội
                    </a>
                </td>
                <td class="col3">(024)-3934 2211</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">6</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=77 Lê Lai, TP. Hải Dương" target="_blank" title="Xem bản đồ">
                        77 Lê Lai, TP. Hải Dương
                    </a>
                </td>
                <td class="col3">(0320)-384 5566</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">7</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=21 Trần Phú, TP. Vinh, Nghệ An" target="_blank" title="Xem bản đồ">
                        21 Trần Phú, TP. Vinh, Nghệ An
                    </a>
                </td>
                <td class="col3">(0238)-382 7788</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <!-- 6 địa chỉ mới -->
            <tr>
                <td class="col1">8</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=10 Trần Hưng Đạo, TP. Thanh Hóa" target="_blank" title="Xem bản đồ">
                        10 Trần Hưng Đạo, TP. Thanh Hóa
                    </a>
                </td>
                <td class="col3">(0237)-382 9900</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">9</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=45 Lý Thường Kiệt, TP. Thái Bình" target="_blank" title="Xem bản đồ">
                        45 Lý Thường Kiệt, TP. Thái Bình
                    </a>
                </td>
                <td class="col3">(0227)-384 5567</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">10</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=88 Nguyễn Trãi, TP. Hải Phòng" target="_blank" title="Xem bản đồ">
                        88 Nguyễn Trãi, TP. Hải Phòng
                    </a>
                </td>
                <td class="col3">(031)-384 6677</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">11</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=22 Trần Quang Khải, TP. Nam Định" target="_blank" title="Xem bản đồ">
                        22 Trần Quang Khải, TP. Nam Định
                    </a>
                </td>
                <td class="col3">(0228)-384 2233</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">12</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=15 Lê Thánh Tông, TP. Bắc Ninh" target="_blank" title="Xem bản đồ">
                        15 Lê Thánh Tông, TP. Bắc Ninh
                    </a>
                </td>
                <td class="col3">(0222)-384 1122</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
            <tr>
                <td class="col1">13</td>
                <td class="col2">
                    <a href="https://maps.google.com/maps?q=34 Trần Hưng Đạo, TP. Vinh, Nghệ An" target="_blank" title="Xem bản đồ">
                        34 Trần Hưng Đạo, TP. Vinh, Nghệ An
                    </a>
                </td>
                <td class="col3">(0238)-382 5566</td>
                <td class="col4">8h00 - 17h00</td>
            </tr>
        </table>

    </section> <!-- End Section -->



    <div class="plc">
        <section>
            <ul class="flexContain">
                <li>Giao hàng hỏa tốc trong 1 giờ</li>
                <li>Thanh toán linh hoạt: tiền mặt, visa / master, trả góp</li>
                <li>Trải nghiệm sản phẩm tại nhà</li>
                <li>Lỗi đổi tại nhà trong 1 ngày</li>
                <li>Hỗ trợ suốt thời gian sử dụng.
                    <br>Hotline:
                    <a href="tel:12345678" style="color: #288ad6;">12345678</a>
                </li>
            </ul>
        </section>
    </div>

    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>

    <i class="fa fa-arrow-up" id="goto-top-page" onclick="gotoTop()"></i>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script>
        function openChat() {
            document.getElementById("chatWidget").style.display = "block";
            document.querySelector(".chat-bubble").style.display = "none";
        }

        function closeChat() {
            document.getElementById("chatWidget").style.display = "none";
            document.querySelector(".chat-bubble").style.display = "block";
        }
    </script>
    <div class="chat-widget" id="chatWidget" style="display: none;">
        <div class="chat-header">
            <div class="avatar"></div>
            <div class="header-text">
                <strong>Tư vấn Chatbot</strong><br>
                Tôi có thể giúp gì cho bạn?
            </div>
            <button class="close-chat" onclick="closeChat()">×</button>
        </div>
        <div class="chat-body" id="chats">
        </div>
        <div class="chat-input">
            <input type="text" id="myMessage" placeholder="Nhập tin nhắn..."
                onkeydown="if(event.key === 'Enter') sendMessage()">
            <button class="send-btn" onclick="sendMessage()">📨</button>
            <button class="delete-btn" onclick="deleteLastChat()">🗑️</button>
        </div>
    </div>

    <div class="chat-bubble" onclick="openChat()">
        <img src="https://cdn-icons-png.flaticon.com/512/1827/1827392.png" alt="Chat Icon">
        <span>Cần hỗ trợ?</span>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/cb8535f973.js" crossorigin="anonymous"></script>
    <script>
        document.getElementById("myMessage").addEventListener("input", function() {
            let maxLength = 500;
            if (this.value.length > maxLength) {
                this.value = this.value.slice(0, maxLength);
            }
        });

        function deleteLastChat() {
            let chats = $("#chats").children();
            let userMsgIndex = -1;
            let botMsgIndex = -1;

            for (let i = chats.length - 1; i >= 0; i--) {
                if (userMsgIndex === -1 && $(chats[i]).hasClass("outgoing-chats")) {
                    userMsgIndex = i;
                } else if (botMsgIndex === -1 && $(chats[i]).hasClass("received-chats")) {
                    botMsgIndex = i;
                }
                if (userMsgIndex !== -1 && botMsgIndex !== -1) break;
            }

            if (botMsgIndex !== -1) chats[botMsgIndex].remove();
            if (userMsgIndex !== -1) chats[userMsgIndex].remove();

            scrollToBottom();
        }

        $(document).ready(function() {
            let initialMessage = "Tôi là Chatbot AI, có thể giúp gì cho bạn?";
            $("#chats").append(`
      <div class="received-chats">
        <div class="received-msg">
          <div class="received-msg-inbox">
            <p class="multi-msg">${initialMessage}</p>
            <span class="time">${getCurrentTime()}</span>
          </div>
        </div>
      </div>`);
            scrollToBottom();
        });

        function getCurrentTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            return `${hours}:${minutes}`;
        }

        function sendMessage() {
            let message = $("#myMessage").val();
            if (!message.trim()) return;

            $("#chats").append(`
      <div class="outgoing-chats">
        <div class="outgoing-msg">
          <p class="multi-msg" style="color: white !important;">${message}</p>
          <span class="time">${getCurrentTime()}</span>
        </div>
      </div>`);
            $("#myMessage").val('');
            scrollToBottom();

            const payload = {
                model: "llama-3.1-8b-instant",
                max_tokens: 300,
                temperature: 0.7,
                messages: [{
                        role: "system",
                        content: "Bạn là một trợ lý chatbot trả lời câu hỏi."
                    },
                    {
                        role: "user",
                        content: message
                    }
                ]
            };

            fetch('https://api.groq.com/openai/v1/chat/completions', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer <GROQ token>'
                    },
                    body: JSON.stringify(payload)
                })
                .then(res => res.json())
                .then(data => {
                    const botResponse = data.choices && data.choices[0] && data.choices[0].message ?
                        data.choices[0].message.content :
                        "Xin lỗi, tôi không có câu trả lời.";

                    $("#chats").append(`
            <div class="received-chats">
                <div class="received-msg">
                    <div class="received-msg-inbox">
                        <p class="multi-msg">${botResponse}</p>
                        <span class="time">${getCurrentTime()}</span>
                    </div>
                </div>
            </div>`);
                    scrollToBottom();
                })
                .catch(err => {
                    console.error(err);
                    $("#chats").append(`
            <div class="received-chats">
                <div class="received-msg">
                    <div class="received-msg-inbox">
                        <p class="multi-msg">Xin lỗi, tôi không thể trả lời ngay lúc này.</p>
                        <span class="time">${getCurrentTime()}</span>
                    </div>
                </div>
            </div>`);
                    scrollToBottom();
                });
        }

        function scrollToBottom() {
            const chatBody = document.getElementById('chats');
            chatBody.scrollTop = chatBody.scrollHeight;
        }

        $("#myMessage").on("keydown", function(event) {
            if (event.key === "Enter" && !event.shiftKey) {
                event.preventDefault();
                sendMessage();
            }
        });
    </script>

</body>

</html>