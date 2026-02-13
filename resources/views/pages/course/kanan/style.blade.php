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