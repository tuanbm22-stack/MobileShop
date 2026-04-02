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

	<script src="js/Jquery/Jquery.min.js"></script>

	<!-- our files -->
	<!-- css -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/topnav.css">
	<link rel="stylesheet" href="css/header.css">
	<link rel="stylesheet" href="css/taikhoan.css">
	<link rel="stylesheet" href="css/gioHang.css">
	<link rel="stylesheet" href="css/nguoidung.css">
	<link rel="stylesheet" href="css/footer.css">
	<!-- js -->
	<script src="data/products.js"></script>
	<script src="js/classes.js"></script>
	<script src="js/dungchung.js"></script>
	<script src="js/nguoidung.js"></script>

</head>

<body>
	<?php include 'nav.php'; ?>

	<section>
		<?php include 'header.php'; ?>
		<img src="img/banners/blackFriday.gif" alt="" style="width: 100%;">

		<div class="infoUser">

		</div>

		<div class="listDonHang"> </div>
	</section> <!-- End Section -->

	<script>
		addContainTaiKhoan(); 
	</script>
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