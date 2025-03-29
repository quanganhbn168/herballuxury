<div class="flex flex-col md:flex-row">
  <!-- Nội dung chữ - luôn hiển thị trước trong DOM -->
    <div class="w-full md:w-1/2 p-4 order-1 md:order-none">
        <h2 class="text-2xl font-bold">Tiêu đề hấp dẫn</h2>
        <p class="mt-2">Nội dung văn bản dài ở đây...</p>
        <button class="mt-4 bg-blue-500 text-white px-4 py-2 rounded">
            CTA Button
        </button>
    </div>

    <!-- Ảnh -->
    <div class="w-full md:w-1/2 order-0 md:order-none">
        <img 
        src="/path/to/your-image.jpg" 
        alt="Mô tả ảnh"
        class="w-full h-auto object-cover"
        >
    </div>
</div>