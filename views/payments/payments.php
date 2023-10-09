<style>
    .send_bt button {
        background-color: #007BFF; /* Background color */
        color: #fff; /* Text color */
        border: none; /* Remove border */
        padding: 10px 20px; /* Padding for better spacing */
        cursor: pointer; /* Add pointer cursor on hover */
        border-radius: 5px; /* Rounded corners */
    }

    /* Hover effect */
    .send_bt button:hover {
        background-color: #0056b3; /* Darker background color on hover */
    }
</style>
<div class="contact_section layout_padding">
    <div class="container">
        <h1 class="contact_taital">Payments</h1>
        <div class="contact_section_2">
            <div class="mail_section_1">
                <form action="index.php?controller=payments&action=payments" method="POST">
                    <input type="text" class="mail_text" placeholder="Name" name="name" required>
                    <input type="email" class="mail_text" placeholder="Email" name="email" required>
                    <input type="text" class="mail_text" placeholder="Address" name="address" required>
                    <input type="tel" class="mail_text" placeholder="Phone Number" name="phone" required>
                    <div class="send_bt"><button type="submit" class="send_bt">Thanh toán</button></div>
                </form>
            </div>
        </div>
    </div>
</div>