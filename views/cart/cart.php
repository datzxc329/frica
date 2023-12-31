
<!-- cart section start -->
<style>
    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    /* CSS cho bảng danh sách sản phẩm */
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    /* CSS cho các ô giá và số lượng */
    table td input[type="number"] {
        border: white;
        width: 60px;
        text-align: center;
    }

    /* CSS cho nút "Thanh toán" và liên kết "Continue Shopping" */
    .payments {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        margin-top: 20px;
        display: inline-block;
        cursor: pointer;
    }

    a {
        text-decoration: none;
        color: #007bff;
        margin-top: 10px;
        display: inline-block;
    }

    a:hover {
        text-decoration: underline;
    }

</style>
<h1>Your Cart</h1>
    <!-- Your cart table here... -->
    <table>
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $cartItems = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        ?>
        <!--mảng kết hợp-->
        <?php
            $total_price = 0;
        ?>
        <?php foreach ($cartItems as $productId => $cartItem): ?>
            <?php $total_price += $cartItem->price * $cartItem->quantity; ?>
            <tr>
                <td><?php echo $cartItem->name; ?></td>
                <td><?php echo $cartItem->price; ?></td> <?php $p = $cartItem->price * $cartItem->quantity; ?>
                <td>
                    <form action="index.php?controller=cart&action=update_quantity" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                        <input class="quantity-input" type="number" id="quantity-<?php echo $productId; ?>" name="quantity" min="1" value="<?php echo $cartItem->quantity; ?>" data-product-id="<?php echo $productId; ?>">
                    </form>

                </td>
                <td>
                    <form action="index.php?controller=cart&action=delete" method="post">
                        <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
                        <button type="submit" class="remove-button">Xóa</button>
                    </form>
                </td>
            </tr>
        <?php endforeach;
            $_SESSION['total_price'] = $total_price;
        ?>
        </tbody>
    </table>
    Total Price: <span id="totalPrice"><?php echo $total_price; ?> VNĐ </span>
    <br>
    <button type="button" onclick="redirectToPaymentsPage()">Thanh toán</button>
<!--    <button type="submit" class="payments" >Thanh toán</button>-->
<br>
<a href="index.php">Continue Shopping</a>
<script>

    function redirectToPaymentsPage() {
        window.location.href = 'index.php?controller=payments&action=payments';
    }

    var removeButtons = document.querySelectorAll('.remove-button');

    // Bắt sự kiện khi người dùng nhấn vào nút "Xóa"
    removeButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Lấy ID sản phẩm từ thuộc tính "data-product-id"
            var productId = button.getAttribute('data-product-id');

            // Sau khi xóa thành công, bạn có thể cập nhật lại giao diện hiển thị giỏ hàng
            var rowToRemove = button.parentElement.parentElement; // Lấy dòng sản phẩm để xóa

            var productPrice = parseFloat(rowToRemove.querySelector('td:nth-child(2)').textContent);

            var productQuantityElement = rowToRemove.querySelector('td:nth-child(3) input.quantity-input');
            var productQuantity = parseFloat(productQuantityElement.value);

            var totalPriceElement = document.getElementById('totalPrice');
            var currentTotalPrice = parseFloat(totalPriceElement.textContent);

            // Cập nhật tổng giá trị sau khi xóa sản phẩm
            var newTotalPrice = currentTotalPrice - productPrice * productQuantity;

            totalPriceElement.textContent = newTotalPrice + ' VNĐ'; // Assuming you want to display the price with two decimal places

            rowToRemove.remove(); // Xóa dòng sản phẩm trên giao diện

        });
    });

    // Lấy tất cả các nút mũi tên và các input số lượng
    const quantityInputs = document.querySelectorAll('.quantity-input');

    // Lặp qua tất cả các input số lượng và thêm sự kiện change cho mỗi input
    quantityInputs.forEach(input => {
        input.addEventListener('change', (event) => {
            // Lấy productId từ thuộc tính data-product-id
            const productId = event.target.getAttribute('data-product-id');

            // Lấy giá trị mới của số lượng
            const newQuantity = parseInt(event.target.value);

            // Kiểm tra giá trị số lượng mới, nếu nó không hợp lệ (nhỏ hơn 1), đặt lại thành 1
            if (newQuantity < 1 || isNaN(newQuantity)) {
                event.target.value = 1;
            }
            // Gửi biểu mẫu tự động sau khi thay đổi giá trị số lượng
            event.target.closest('form').submit();
        });
    });
</script>


<!-- cart section end -->
