<div class="list-group">
    <div class="lesson-list" id="lessonList">
        @foreach ($course->materials as $index => $lesson)
            @php
                $isComplete = optional($lesson->userActivity)->activity_type === 'complete';
            @endphp

            <div class="lesson-item
        {{ $isComplete ? 'completed' : '' }}" data-id="{{ $lesson->id }}"
                data-index="{{ $index }}" data-title="{{ $lesson->title }}" data-type="{{ $lesson->type }}"
                data-content="{{ e($lesson->content) }}" data-complete="{{ $isComplete ? 1 : 0 }}">

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

@include('pages.course.kanan.style')


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
    document.addEventListener('DOMContentLoaded', function() {

        const lessonItems = [...document.querySelectorAll('.lesson-item')];
        const btnPrev = document.getElementById('btnPrev');
        const btnNext = document.getElementById('btnNext');

        let currentIndex = 0;

        function findInitialIndex() {
            const firstIncomplete = lessonItems.findIndex(
                el => el.dataset.complete === "0"
            );

            return firstIncomplete !== -1 ?
                firstIncomplete :
                lessonItems.length - 1;
        }

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
                currentIndex === lessonItems.length - 1 ?
                'Selesai' :
                'Lanjut <i class="bi bi-arrow-right"></i>';
        }

        // CLICK LIST
        lessonItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                updateActiveLesson(index);
            });
        });

        // PREV
        btnPrev.addEventListener('click', () => {
            if (currentIndex > 0) updateActiveLesson(currentIndex - 1);
        });

        // NEXT + SWEET ALERT
        btnNext.addEventListener('click', () => {

            const activeLesson = lessonItems[currentIndex];
            const materialId = activeLesson.dataset.id;

            Swal.fire({
                title: 'Mantap!',
                text: 'Materi ini berhasil kamu selesaikan',
                icon: 'success',
                confirmButtonText: 'Lanjut',
                confirmButtonColor: '#1e63ff',
                allowOutsideClick: false
            }).then(result => {

                if (!result.isConfirmed) return;

                // SAVE ACTIVITY
                fetch(`/materials/${materialId}/complete`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]')
                            .getAttribute('content')
                    }
                });

                // MARK COMPLETE UI
                activeLesson.dataset.complete = "1";
                activeLesson.classList.add('completed');

                // NEXT
                if (currentIndex < lessonItems.length - 1) {
                    updateActiveLesson(currentIndex + 1);
                }
            });
        });

        // INIT AUTO ACTIVE
        updateActiveLesson(findInitialIndex());
    });
</script>
