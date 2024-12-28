@include('admin/includes/header')

<!-- Phần CSS -->
<style>
/* Toàn bộ trang */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f2f5;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Khu vực chào mừng */
.welcome-banner {
    background: linear-gradient(135deg, #307ecc, #74b9ff);
    color: #fff;
    padding: 40px 20px;
    text-align: center;
    border-radius: 10px;
    margin: 50px auto; /* Thêm khoảng cách phía trên và dưới */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.welcome-banner h1 {
    font-size: 2.5rem;
    margin-bottom: 10px;
}

.welcome-banner p {
    font-size: 1.2rem;
    margin: 0;
}

/* Khu vực thông tin chính */
.info-section {
    margin: 30px auto; /* Thêm khoảng cách giữa banner và thông tin */
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    max-width: 1200px;
}

.info-section h2 {
    font-size: 2rem;
    text-align: center;
    margin-bottom: 20px;
    color: #307ecc;
}

/* Thẻ thông tin */
.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.card {
    background: #f9fafc;
    border: 1px solid #e3e6ea;
    border-radius: 10px;
    padding: 20px;
    flex: 1 1 calc(33.333% - 40px);
    max-width: 300px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: #333;
}

.card p {
    font-size: 1rem;
    color: #555;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .card-container {
        flex-direction: column;
        align-items: center;
    }

    .card {
        max-width: 100%;
    }
}
</style>

<!-- Nội dung chính -->
<div class="admin-dashboard">
    <!-- Khu vực chào mừng -->
    <div class="welcome-banner">
        <h1>Chào mừng đến với Trang Quản Lý!</h1>
        <p>Hãy chọn một mục từ menu bên trái để bắt đầu quản lý hệ thống.</p>
    </div>

    
    </div>
</div>

@include('admin/includes/footer')
