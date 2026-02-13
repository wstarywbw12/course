<style>
    /* ================= BASE ================= */
    .lesson-item {
        cursor: pointer;
        transition: all .2s ease;
        display: flex;
        gap: 12px;
        padding: 7px;
        border-radius: 10px;
        background: #f8f9fa;
        margin-bottom: 10px;
        align-items: center;
        border: 2px solid transparent;
    }

    .lesson-item:hover {
        background-color: #eef3ff;
    }

    /* ================= LIST ================= */
    .lesson-list {
        max-height: 500px;
        overflow-y: auto;
    }

    /* ================= STATES ================= */

    /* ACTIVE tapi BELUM COMPLETE → BIRU */
    .lesson-item.active:not(.completed) {
        background: #fff;
        border-color: #1e63ff;
    }

    /* COMPLETE (baik aktif atau tidak) → HIJAU */
    .lesson-item.completed {
        background: #fff;
        border-color: #28a745;
    }

    /* ================= CONTENT ================= */
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

    /* ================= ACTIVE (BELUM COMPLETE) ================= */
    .lesson-item.active:not(.completed) .lesson-number {
        background: #1e63ff;
        /* biru */
    }

    /* ================= COMPLETED (AKTIF / TIDAK) ================= */
    .lesson-item.completed .lesson-number {
        background: #28a745;
        /* hijau */
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
