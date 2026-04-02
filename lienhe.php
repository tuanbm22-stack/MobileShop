<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $hoTen = htmlspecialchars($_POST['ht']);
    $dienThoai = htmlspecialchars($_POST['sdt']);
    $email = htmlspecialchars($_POST['em']);
    $tieuDe = htmlspecialchars($_POST['tde']);
    $noiDung = htmlspecialchars($_POST['nd']);

    $mail = new PHPMailer(true);

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hieuptmhe172552@fpt.edu.vn';
    $mail->Password = 'hpbf smvj gfqc qjis';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($email, $hoTen);
    $mail->addAddress('caohuuthe10102001@gmail.com', 'Smartphone Store');

    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->Subject = "Liên hệ từ website: $tieuDe";
    $mail->Body    = "
            <p><strong>Họ tên:</strong> $hoTen</p>
            <p><strong>Điện thoại:</strong> $dienThoai</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Nội dung:</strong><br>" . nl2br($noiDung) . "</p>
        ";

    $mail->send();
    echo "<script>alert('Gửi thông tin liên hệ thành công!');</script>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liên hệ - Thanh Ngân Store</title>
    <link rel="shortcut icon" href="img/favicon.ico" />

    <!-- Load font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        crossorigin="anonymous">

    <!-- our files -->
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/topnav.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/taikhoan.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/lienhe.css">

    <!-- js -->
    <script src="data/products.js"></script>
    <script src="js/dungchung.js"></script>
    <script src="js/lienhe.js"></script>
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

    <section style="min-height: 85vh">
        <?php include 'header.php'; ?>

        <div class="body-lienhe">
            <div class="lienhe-header">Liên hệ</div>
            <div class="lienhe-info">
                <div class="info-left">
                    <p>
                    <h2 style="color: gray"> CÔNG TY CỔ PHẦN THANH NGÂN </h2><br />
                    <b>Địa chỉ:</b> 123 Phố Huế, Quận Hai Bà Trưng, Hà Nội<br /><br />
                    <b>Telephone:</b> 024 3835 4409<br /><br />
                    <b>Hotline:</b> 097777777 - CSKH: 024 9996 777<br /><br />
                    <b>E-mail:</b> caohuuthe@gmail.com<br /><br />
                    <b>Mã số thuế:</b> 01 02 03 04 05<br /><br />
                    <b>Tài khoản ngân hàng :</b><br /><br />
                    <b>Số TK:</b> 060008086888 <br /><br />
                    <b>Tại Ngân hàng:</b> Agribank Chi nhánh Hà Nội<br /><br /><br /><br />
                    <b>Quý khách có thể gửi liên hệ tới chúng tôi bằng cách hoàn tất biểu mẫu dưới đây. Chúng tôi
                        sẽ trả lời thư của quý khách, xin vui lòng khai báo đầy đủ. Hân hạnh phục vụ và chân thành
                        cảm ơn sự quan tâm, đóng góp ý kiến đến Smartphone Store.</b>
                    </p>
                </div>
                <div class="info-right">
                    <iframe width="100%" height="450" src="https://maps.google.com/maps?width=100%&amp;height=450&amp;hl=en&amp;coord=21.015391,105.858229&amp;q=123%20Ph%E1%BB%91%20Hu%E1%BA%BF%2C%20Qu%E1%BA%ADn%20Hai%20B%C3%A0%20Tr%C3%BAng%2C%20H%C3%A0%20N%E1%BB%99i%2C%20Vi%E1%BB%87t%20Nam&amp;ie=UTF8&amp;t=&amp;z=16&amp;iwloc=B&amp;output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Embed
                            Google Map
                        </a>
                    </iframe>
                    <br />
                </div>
            </div>
            <div class="container my-5">
                <div class="card shadow-sm p-4">
                    <h2 class="mb-4 text-center">Liên hệ với chúng tôi</h2>
                    <form name="formlh" id="contactForm" method="POST" action="">
                        <div class="mb-3">
                            <label for="ht" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="ht" name="ht" maxlength="40" placeholder="Họ tên" required>
                        </div>

                        <div class="mb-3">
                            <label for="sdt" class="form-label">Điện thoại liên hệ</label>
                            <input type="text" class="form-control" id="sdt" name="sdt" maxlength="11" minlength="10" placeholder="Điện thoại" required>
                        </div>

                        <div class="mb-3">
                            <label for="em" class="form-label">Email</label>
                            <input type="email" class="form-control" id="em" name="em" placeholder="Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="tde" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="tde" name="tde" maxlength="100" placeholder="Tiêu đề" required>
                        </div>

                        <div class="mb-3">
                            <label for="nd" class="form-label">Nội dung</label>
                            <textarea class="form-control" id="nd" name="nd" rows="5" maxlength="500" placeholder="Nội dung liên hệ" required></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn btn-danger w-100">Gửi thông tin liên hệ</button>
                    </form>
                </div>
            </div>
        </div>
    </section>



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