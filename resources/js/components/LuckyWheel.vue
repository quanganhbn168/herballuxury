<template>
    <div class="wheel-container">
        <div class="wheel-wrapper">
            <!-- Canvas cho vòng quay -->
            <canvas id="wheelCanvas" width="400" height="400"></canvas>
            <!-- Mũi tên chỉ vị trí -->
            <div class="pointer"></div>
            <!-- Nút Start ở giữa -->
            <button class="start-btn" @click="spin" :disabled="spinning">START</button>
        </div>

        <!-- Popup hiển thị kết quả -->
        <div v-if="showPopup" class="popup-overlay">
            <div class="popup">
                <h2>Chúc mừng!</h2>
                <p>Bạn đã trúng: <strong>{{ result?.name }}</strong></p>
                <button @click="closePopup" class="close-btn">Đóng</button>
            </div>
        </div>
    </div>
</template>
<script setup>
import { ref, onMounted } from 'vue';
import api from '../services/api';

const prizes = ref([]);
const spinning = ref(false);
const result = ref(null);
const showPopup = ref(false);
let currentRotation = 0;
let canvas, ctx;

onMounted(async () => {
    canvas = document.getElementById('wheelCanvas');
    ctx = canvas.getContext('2d');

    try {
        const response = await api.getPrizes();
        prizes.value = response.data;
        drawWheel();
    } catch (error) {
        console.error('Error fetching prizes:', error);
    }
});

const drawWheel = () => {
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = canvas.width / 2 - 10;
    const arc = (2 * Math.PI) / prizes.value.length;

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Vẽ viền
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius + 10, 0, 2 * Math.PI);
    ctx.strokeStyle = '#ff0000';
    ctx.lineWidth = 10;
    ctx.stroke();

    // Vẽ các segment
    for (let i = 0; i < prizes.value.length; i++) {
        const angle = i * arc;
        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, radius, angle, angle + arc);
        ctx.closePath();

        ctx.fillStyle = i % 3 === 0 ? '#ff4d4d' : i % 3 === 1 ? '#ffd700' : '#4d94ff';
        ctx.fill();
        ctx.strokeStyle = '#fff';
        ctx.lineWidth = 2;
        ctx.stroke();

        // Vẽ chữ
        ctx.save();
        ctx.translate(centerX, centerY);
        ctx.rotate(angle + arc / 2);
        ctx.fillStyle = '#fff';
        ctx.font = 'bold 18px Arial';
        ctx.textAlign = 'right';
        ctx.textBaseline = 'middle';
        ctx.fillText(prizes.value[i].name, radius - 30, 0);
        ctx.restore();
    }
};

const spin = async () => {
    if (spinning.value) return;
    spinning.value = true;
    result.value = null;

    try {
        const response = await api.spin();
        const winningPrize = response.data;
        const prizeIndex = prizes.value.findIndex(p => p.id === winningPrize.id);

        if (prizeIndex === -1) {
            console.error('Winning prize not found in prizes list:', winningPrize);
            spinning.value = false;
            return;
        }

        const segmentAngle = 360 / prizes.value.length;
        // Tính góc cần quay để segment trúng nằm ở vị trí mũi tên (12 giờ)
        // Mũi tên ở góc -90 độ (12 giờ), nhưng trong canvas góc 0 là 3 giờ
        // Nên cần điều chỉnh offset
        const offsetToTop = 90 - (prizeIndex * segmentAngle + segmentAngle / 2);
        const targetAngle = 360 * 5 + offsetToTop;

        let startAngle = currentRotation % 360;
        let angle = 0;
        const duration = 5000;
        const startTime = performance.now();

        const animate = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easeOut = 1 - Math.pow(1 - progress, 3);

            angle = startAngle + (targetAngle - startAngle) * easeOut;
            currentRotation = angle;

            // Xoay canvas
            ctx.save();
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.translate(canvas.width / 2, canvas.height / 2);
            ctx.rotate((angle * Math.PI) / 180);
            ctx.translate(-canvas.width / 2, -canvas.height / 2);
            drawWheel();
            ctx.restore();

            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                spinning.value = false;
                result.value = winningPrize;
                showPopup.value = true;
            }
        };

        requestAnimationFrame(animate);
    } catch (error) {
        console.error('Error spinning:', error);
        spinning.value = false;
    }
};

const closePopup = () => {
    showPopup.value = false;
};
</script>

<style scoped>
.wheel-container {
    text-align: center;
    margin-top: 50px;
    font-family: Arial, sans-serif;
}

.wheel-wrapper {
    position: relative;
    width: 400px;
    height: 400px;
    margin: 0 auto;
}

#wheelCanvas {
    width: 100%;
    height: 100%;
}

.pointer {
    position: absolute;
    bottom: -5px;
    left: 50%;
    transform: translateX(-50%);
    width: 0;
    height: 0;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-bottom: 40px solid #ffd700;
    z-index: 10;
}

.start-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: #ffd700;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    border: 5px solid #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    cursor: pointer;
    transition: background 0.3s ease;
    z-index: 20;
}

.start-btn:hover {
    background: #ffeb3b;
}

.start-btn:disabled {
    background: #ccc;
    cursor: not-allowed;
}

.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 100;
}

.popup {
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    text-align: center;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    max-width: 500px;
    width: 90%;
    animation: popupFadeIn 0.3s ease;
}

.popup h2 {
    color: #ff4d4d;
    font-size: 28px;
    margin-bottom: 15px;
}

.popup p {
    font-size: 20px;
    margin-bottom: 25px;
}

.close-btn {
    padding: 12px 30px;
    background: #ff4d4d;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.close-btn:hover {
    background: #ff7878;
}

@keyframes popupFadeIn {
    from {
        opacity: 0;
        transform: scale(0.8);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
</style>