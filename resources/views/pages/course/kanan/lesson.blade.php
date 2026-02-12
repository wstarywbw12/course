<div class="list-group">
    <div class="lesson-list" id="lessonList">
        @foreach ($course->materials as $index => $lesson)
            <div class="lesson-item {{ $index === 0 ? 'active' : '' }}" data-index="{{ $index }}"
                data-title="{{ $lesson->title }}" data-type="{{ $lesson->type }}" data-content="{{ $lesson->content }}">

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
document.addEventListener('DOMContentLoaded', function () {

    const lessonItems = document.querySelectorAll('.lesson-item');
    const btnPrev = document.getElementById('btnPrev');
    const btnNext = document.getElementById('btnNext');

    const lessonTitle = document.getElementById('lessonTitle');
    const videoWrapper = document.getElementById('lessonVideoWrapper');
    const videoEl = document.getElementById('lessonVideo');
    const videoSource = document.getElementById('lessonVideoSource');
    const youtubeFrame = document.getElementById('lessonYoutube');
    const textWrapper = document.getElementById('lessonTextWrapper');

    let currentIndex = [...lessonItems].findIndex(el => el.classList.contains('active'));
    if (currentIndex === -1) currentIndex = 0;

    // ================= YOUTUBE =================
    function getYoutubeEmbed(url) {
        let videoId = '';

        if (url.includes('youtu.be')) {
            videoId = url.split('/').pop().split('?')[0];
        } else if (url.includes('youtube.com')) {
            const params = new URL(url).searchParams;
            videoId = params.get('v');
        }

        return videoId ? `https://www.youtube.com/embed/${videoId}` : null;
    }

    // ================= RENDER =================
    function renderLesson(item) {
        const title = item.dataset.title;
        const type = item.dataset.type;
        const content = item.dataset.content;

        lessonTitle.innerText = title;

        // reset
        youtubeFrame.src = '';
        youtubeFrame.classList.add('d-none');
        videoEl.pause();
        videoEl.classList.add('d-none');
        textWrapper?.classList.add('d-none');

        if (type === 'video') {
            videoWrapper.classList.remove('d-none');

            const yt = getYoutubeEmbed(content);

            if (yt) {
                youtubeFrame.src = yt;
                youtubeFrame.classList.remove('d-none');
            } else {
                videoSource.src = content;
                videoEl.load();
                videoEl.classList.remove('d-none');
            }

        } else {
            videoWrapper.classList.add('d-none');
            if (textWrapper) {
                textWrapper.innerHTML = content;
                textWrapper.classList.remove('d-none');
            }
        }
    }

    // ================= ACTIVE =================
    function updateActiveLesson(index) {
        if (index < 0 || index >= lessonItems.length) return;

        lessonItems.forEach(el => el.classList.remove('active'));
        lessonItems[index].classList.add('active');

        currentIndex = index;
        renderLesson(lessonItems[index]);
        updateNavButton();
    }

    // ================= BUTTON =================
    function updateNavButton() {
        // PREV
        btnPrev.disabled = currentIndex === 0;
        btnPrev.classList.toggle('btn-outline-secondary', btnPrev.disabled);
        btnPrev.classList.toggle('btn-outline-primary', !btnPrev.disabled);

        // NEXT
        btnNext.disabled = currentIndex === lessonItems.length - 1;
        btnNext.classList.toggle('btn-outline-secondary', btnNext.disabled);
        btnNext.classList.toggle('btn-primary', !btnNext.disabled);
    }

    // ================= EVENTS =================
    lessonItems.forEach((item, index) => {
        item.addEventListener('click', () => updateActiveLesson(index));
    });

    btnPrev.addEventListener('click', () => {
        if (currentIndex > 0) updateActiveLesson(currentIndex - 1);
    });

    btnNext.addEventListener('click', () => {
        if (currentIndex < lessonItems.length - 1) updateActiveLesson(currentIndex + 1);
    });

    // ================= INIT =================
    updateActiveLesson(currentIndex);
});
</script>
