<?php
session_start();
require 'connect.php';

$vnp_ResponseCode = $_GET['vnp_ResponseCode'] ?? '';
$vnp_TxnRef = $_GET['vnp_TxnRef'] ?? '';
$vnp_Amount = $_GET['vnp_Amount'] ?? 0;

if ($vnp_ResponseCode == '00') {
    $subTotal = $_SESSION['order_total_before_voucher'];
    $totalAmount = $vnp_Amount / 100;

    $voucherId = $_SESSION['order_voucher_id'] ?? null;
    $stmt = $pdo->prepare("
    INSERT INTO orders (user_id, created_at, updated_at, status, sub_total, total, payment_method, voucher_id)
    VALUES (?, NOW(), NOW(), 'completed', ?, ?, 'vnpay', ?)
");
    $stmt->execute([$_SESSION['user_id'], $subTotal, $totalAmount, $voucherId]);

    $orderId = $pdo->lastInsertId();

    $stmtItem = $pdo->prepare("
        INSERT INTO order_items (order_id, product_id, quantity, price, total_price)
        VALUES (?, ?, ?, ?, ?)
    ");

    foreach ($_SESSION['cart'] as $item) {
        $stmtItem->execute([
            $orderId,
            $item['id'],
            $item['quantity'],
            $item['price'],
            $item['total']
        ]);
    }

    if ($voucherId) {
        $updateVoucher = $pdo->prepare("UPDATE vouchers SET quantity = quantity - 1 WHERE id = ? AND quantity > 0");
        $updateVoucher->execute([$voucherId]);
    }

    unset($_SESSION['cart']);
    unset($_SESSION['order_data_amount']);
    unset($_SESSION['order_payment_info']);

    header("Location: thanhcong.php?order_id=" . $orderId);
    exit();
} else {
    echo "Thanh toán không thành công! Mã lỗi: " . $vnp_ResponseCode;
}
