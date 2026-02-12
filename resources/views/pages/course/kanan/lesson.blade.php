<div class="list-group">
    <div class="lesson-list" id="lessonList">
        @foreach ($course->materials as $index => $lesson)
            <div class="lesson-item {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"
                data-title="{{ $lesson->title }}" data-type="{{ $lesson->type }}" {{-- video | text --}}
                data-content="{{ $lesson->content }}">

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

    // youtu.be/xxxx
    if (url.includes('youtu.be')) {
        const id = url.split('youtu.be/')[1].split('?')[0];
        return `https://www.youtube.com/embed/${id}`;
    }

    // youtube.com/watch?v=xxxx
    if (url.includes('watch?v=')) {
        const id = url.split('watch?v=')[1].split('&')[0];
        return `https://www.youtube.com/embed/${id}`;
    }

    // already embed
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

        // ================= VIDEO =================
        if (type === 'video') {

            const embedUrl = convertYoutubeUrl(content);

            if (!embedUrl) {
                container.innerHTML = `<p class="text-danger">Video tidak valid</p>`;
                return;
            }

            html += `
            <div class="ratio ratio-16x9">
                <iframe 
                    src="${embedUrl}"
                    frameborder="0"
                    allowfullscreen
                    allow="autoplay; encrypted-media">
                </iframe>
            </div>
        `;
        }

        // ================= TEXT =================
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
    document.addEventListener('DOMContentLoaded', function() {

        const lessonItems = document.querySelectorAll('.lesson-item');
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');

        let currentIndex = [...lessonItems].findIndex(el => el.classList.contains('active'));
        if (currentIndex === -1) currentIndex = 0;

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

            btnPrev.className = btnPrev.disabled ?
                'btn btn-outline-secondary' :
                'btn btn-outline-primary';

            btnNext.innerHTML =
                currentIndex === lessonItems.length - 1 ?
                'Selesai' :
                'Lanjut <i class="bi bi-arrow-right"></i>';
        }

        // ================== NEXT ==================
        btnNext.addEventListener('click', () => {

            Swal.fire({
                title: 'Mantap!',
                html: `
                <p class="mb-0">
                    Pelajaran ini berhasil kamu selesaikan.<br>
                    Lanjut ke materi selanjutnya ya.
                </p>
            `,
                icon: 'success',
                confirmButtonText: 'Oke!',
                confirmButtonColor: '#1e63ff',
                background: '#fff',
                color: '#2b2c2d',
                allowOutsideClick: false,
                allowEscapeKey: false,
                customClass: {
                    popup: 'rounded-4'
                }
            }).then((result) => {

                if (!result.isConfirmed) return;

                // ✅ JIKA MASIH ADA MATERI
                if (currentIndex < lessonItems.length - 1) {
                    updateActiveLesson(currentIndex + 1);
                    return;
                }

                // ✅ JIKA MATERI TERAKHIR
                // contoh:
                // window.location.href = "/dashboard";
                updateActiveLesson(0);
            });

        });

        // ================== PREV ==================
        btnPrev.addEventListener('click', () => {
            if (currentIndex > 0) {
                updateActiveLesson(currentIndex - 1);
            }
        });

        // INIT
        updateActiveLesson(currentIndex);
    });
</script>
