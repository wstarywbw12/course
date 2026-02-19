<style>
    body {
        background-color: #fff;
    }

    .option-input {
        display: none;
    }

    .step-btn {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        font-weight: 600;
    }

    .step-btn.active {
        background-color: #0d6efd;
        color: #fff;
    }

    .option-card {
        border-radius: 12px;
        padding: 6px;
        cursor: pointer;
        border: 2px solid #eaeaea;
        transition: all 0.2s ease;
    }

    .option-card:hover {
        background-color: #f8f9fa;
    }

    .option-input:checked+.option-card {
        border: 2px solid #0d6efd;
        background-color: #f4f8ff;
    }

    .option-label {
        width: 25px;
        height: 25px;
        border-radius: 8px;
        border: 2px solid #0d6efd;
        color: #0d6efd;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 16px;
    }

    .option-input:checked+.option-card .option-label {
        background-color: #0d6efd;
        color: #fff;
    }

    .quiz-card {
        border-radius: 16px;
        border: 1px solid #eee;
    }

    .quiz-step {
         width: 28px;
        height: 28px;
    }


    .question-number {
        width: 28px;
        height: 28px;
        flex-shrink: 0;
        border-radius: 8px;
        font-weight: 600;
    }

    .border-success {
    border-width: 3px !important;
}

.border-danger {
    border-width: 3px !important;
}

</style>
