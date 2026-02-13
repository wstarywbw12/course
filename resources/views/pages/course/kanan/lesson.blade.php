<div class="list-group">
    <div class="lesson-list" id="lessonList">
        @foreach ($course->materials as $index => $lesson)
            <div class="lesson-item {{ $index === 0 ? 'active' : '' }}"
                data-id="{{ $lesson->id }}"
                data-index="{{ $index }}"
                data-title="{{ $lesson->title }}"
                data-type="{{ $lesson->type }}"
                data-content="{{ e($lesson->content) }}">

                <div class="lesson-number">{{ $index + 1 }}</div>

                <div>
                    <div class="lesson-title">{{ $lesson->title }}</div>
                    <div class="lesson-time">
                        <i class="bi bi-clock"></i> {{ $lesson->duration ?? 0 }} menit
                    </div>
                </div>
            </div>
        @endforeach
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
function convertYoutubeUrl(url) {
    if (!url) return null;

    if (url.includes('youtu.be/')) {
        const id = url.split('youtu.be/')[1].split('?')[0];
        return `https://www.youtube.com/embed/${id}`;
    }

    if (url.includes('watch?v=')) {
        const id = url.split('watch?v=')[1].split('&')[0];
        return `https://www.youtube.com/embed/${id}`;
    }

    if (url.includes('youtube.com/embed')) {
        return url;
    }

    return null;
}
</script>

<script>
function renderLesson(lesson) {

    const container = document.getElementById('lessonContent');

    const title = lesson.dataset.title;
    const type = lesson.dataset.type;
    const content = lesson.dataset.content;

    let html = `<h5 class="fw-bold mb-3">${title}</h5>`;

    if (type === 'video') {
        const embedUrl = convertYoutubeUrl(content);

        if (!embedUrl) {
            container.innerHTML = `<p class="text-danger">URL video tidak valid</p>`;
            return;
        }

        html += `
            <div class="ratio ratio-16x9 mb-3">
                <iframe
                    src="${embedUrl}"
                    frameborder="0"
                    allowfullscreen
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture">
                </iframe>
            </div>
        `;
    }

    if (type === 'text') {
        html += `
            <div class="card">
                <div class="card-body">
                    ${content}
                </div>
            </div>
        `;
    }

    container.innerHTML = html;
}
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const lessonItems = document.querySelectorAll('.lesson-item');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');

    let currentIndex = 0;

    function updateActiveLesson(index) {
        if (index < 0 || index >= lessonItems.length) return;

        lessonItems.forEach(el => el.classList.remove('active'));
        lessonItems[index].classList.add('active');

        currentIndex = index;
        renderLesson(lessonItems[index]);
        updateNavButton();
    }

    function updateNavButton() {
        btnPrev.disabled = currentIndex === 0;

        btnNext.innerHTML =
            currentIndex === lessonItems.length - 1
                ? 'Selesai'
                : 'Lanjut <i class="bi bi-arrow-right"></i>';
    }

    // CLICK LIST
    lessonItems.forEach((item, index) => {
        item.addEventListener('click', () => {
            updateActiveLesson(index);
        });
    });

    // PREV
    btnPrev.addEventListener('click', () => {
        if (currentIndex > 0) {
            updateActiveLesson(currentIndex - 1);
        }
    });

    // NEXT + SWEET ALERT (SETIAP MATERI)
    btnNext.addEventListener('click', () => {

        const activeLesson = lessonItems[currentIndex];
        const materialId = activeLesson.dataset.id;

        Swal.fire({
            title: 'Mantap!',
            html: `
                <p class="mb-0">
                    Materi ini berhasil kamu selesaikan.<br>
                    Yuk lanjut ke materi berikutnya!
                </p>
            `,
            icon: 'success',
            confirmButtonText: 'Lanjut',
            confirmButtonColor: '#1e63ff',
            allowOutsideClick: false
        }).then(result => {

            if (!result.isConfirmed) return;

            // SIMPAN AKTIVITAS (opsional backend)
            fetch(`/materials/${materialId}/complete`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content')
                }
            });

            // PINDAH MATERI
            if (currentIndex < lessonItems.length - 1) {
                updateActiveLesson(currentIndex + 1);
            } else {
                Swal.fire({
                    title: 'Selesai 🎓',
                    text: 'Semua materi sudah kamu selesaikan!',
                    icon: 'success'
                });
            }
        });
    });

    // INIT
    updateActiveLesson(0);
});
</script>
