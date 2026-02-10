<div class="list-group">
    <div class="lesson-list" id="lessonList">

        <div class="lesson-item" data-lesson="1">
            <div class="lesson-number">1</div>
            <div>
                <div class="lesson-title">Pengantar UML & Diagram Kelas</div>
                <div class="lesson-time">
                    <i class="bi bi-clock"></i> 5 min, 15 minute
                </div>
            </div>
        </div>

        <div class="lesson-item active" data-lesson="2">
            <div class="lesson-number">2</div>
            <div>
                <div class="lesson-title">Alat Pemodelan UML & Persiapan</div>
                <div class="lesson-time">
                    <i class="bi bi-clock"></i> 5 min, 15 minute
                </div>
            </div>
        </div>

        <div class="lesson-item" data-lesson="3">
            <div class="lesson-number">3</div>
            <div>
                <div class="lesson-title">Komponen & Notasi Dasar Class Diagram</div>
                <div class="lesson-time">
                    <i class="bi bi-clock"></i> 5 min, 15 minute
                </div>
            </div>
        </div>

    </div>
</div>




<style>
    .lesson-item {
        cursor: pointer;
        transition: all .2s ease;
    }

    .lesson-item:hover {
        background-color: #eef3ff;
    }

    /* Lesson List */
    .lesson-list {
        max-height: 500px;
        overflow-y: auto;
    }

    .lesson-item {
        display: flex;
        gap: 12px;
        padding: 7px;
        border-radius: 10px;
        background: #f8f9fa;
        margin-bottom: 10px;
        align-items: center;
        border: 2px solid transparent;
    }

    .lesson-item.active {
        background: #fff;
        border-color: #1e63ff;
    }

    .lesson-number {
        background: #1e63ff;
        color: #fff;
        width: 25px;
        height: 25px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        flex-shrink: 0;
    }

    .lesson-title {
        font-weight: 600;
        font-size: 12px;
    }

    .lesson-time {
        font-size: 12px;
        color: #6c757d;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const lessonItems = document.querySelectorAll('.lesson-item');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');

    let currentIndex = [...lessonItems].findIndex(item =>
        item.classList.contains('active')
    );

    function updateActiveLesson(index) {
        // safety check
        if (index < 0 || index >= lessonItems.length) return;

        lessonItems.forEach(el => el.classList.remove('active'));
        lessonItems[index].classList.add('active');
        currentIndex = index;

        updateNavButton();
        console.log('Lesson dipilih:', lessonItems[index].dataset.lesson);
    }

    function updateNavButton() {
        // PREV
        if (currentIndex === 0) {
            btnPrev.disabled = true;
            btnPrev.classList.remove('btn-outline-primary');
            btnPrev.classList.add('btn-outline-secondary');
        } else {
            btnPrev.disabled = false;
            btnPrev.classList.remove('btn-outline-secondary');
            btnPrev.classList.add('btn-outline-primary');
        }

        // NEXT
        if (currentIndex === lessonItems.length - 1) {
            btnNext.disabled = true;
            btnNext.classList.remove('btn-primary');
            btnNext.classList.add('btn-outline-secondary');
        } else {
            btnNext.disabled = false;
            btnNext.classList.remove('btn-outline-secondary');
            btnNext.classList.add('btn-primary');
        }
    }

    // klik lesson manual
    lessonItems.forEach((item, index) => {
        item.addEventListener('click', function () {
            updateActiveLesson(index);
        });
    });

    // klik kembali
    btnPrev.addEventListener('click', function () {
        updateActiveLesson(currentIndex - 1);
    });

    // klik lanjut
    btnNext.addEventListener('click', function () {
        updateActiveLesson(currentIndex + 1);
    });

    // init state
    updateNavButton();
});
</script>
